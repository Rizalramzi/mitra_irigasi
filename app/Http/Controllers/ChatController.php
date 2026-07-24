<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'messages' => 'required|array',
            'messages.*.sender' => 'required|string|in:user,bot',
            'messages.*.text' => 'required|string',
        ]);

        $inputMessages = $request->input('messages');

        // Map client messages to Gemini API content format
        $contents = [];
        foreach ($inputMessages as $msg) {
            $role = ($msg['sender'] === 'user') ? 'user' : 'model';
            $contents[] = [
                'role' => $role,
                'parts' => [
                    ['text' => $msg['text']]
                ]
            ];
        }

        // Load company instruction context
        $companyInfoPath = storage_path('app/company_info.txt');
        $companyInfo = file_exists($companyInfoPath) ? file_get_contents($companyInfoPath) : 'No information available.';

        $systemInstruction = "You are a customer service chatbot assistant for the company 'Mitra Irigasi'.\n" .
            "Your job is to answer customer questions politely, helpfully, and professionally, using ONLY the facts about the company provided below:\n\n" .
            $companyInfo . "\n\n" .
            "Guidelines:\n" .
            "1. Answer in the same language as the user's inquiry (like Indonesian or English).\n" .
            "2. If the user asks about something not covered in the company details (e.g. details about competitors, non-company items, or general trivia not related to Mitra Irigasi's scope), politely reply that you do not have that information, and offer to connect them to a representative.\n" .
            "3. State that you are an automated assistant for Mitra Irigasi when appropriate.\n" .
            "4. Keep your responses concise, friendly, and professional. Avoid making up details.";

        $apiKey = config('gemini.api_key');
        $model = config('gemini.model', 'gemini-2.5-flash');

        if (empty($apiKey)) {
            return response()->json([
                'reply' => "Halo! API Key Gemini belum diatur di server (silakan isi `GEMINI_API_KEY` di file `.env`).\n\nMeskipun demikian, saya siap membantu setelah konfigurasi selesai!"
            ]);
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

        try {
            $body = [
                'contents' => $contents,
                'systemInstruction' => [
                    'parts' => [
                        ['text' => $systemInstruction]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.3,
                    'maxOutputTokens' => 9999999,
                ]
            ];

            Log::debug('Sending request to Gemini API for Mitra Irigasi...', ['url' => "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent"]);
            
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->timeout(15)->post($url, $body);

            if ($response->successful()) {
                $data = $response->json();
                $replyText = $data['candidates'][0]['content']['parts'][0]['text'] ?? "Maaf, sistem tidak mengembalikan hasil. Silakan coba kembali.";
                return response()->json([
                    'reply' => $replyText
                ]);
            }

            Log::error('Gemini API Response failure: ' . $response->status(), ['body' => $response->body()]);
            return response()->json([
                'reply' => "Waduh, koneksi ke asisten AI sedang mengalami gangguan (status code: " . $response->status() . "). Silakan coba beberapa saat lagi."
            ], 500);

        } catch (\Exception $e) {
            Log::error('Gemini Controller Exception: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json([
                'reply' => "Terjadi kesalahan internal pada server saat memproses pertanyaan Anda."
            ], 500);
        }
    }
}
