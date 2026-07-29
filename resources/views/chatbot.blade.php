@extends('layouts.app')

@section('title', 'Chatbot Asisten AI - Mitra Irigasi')

@section('content')
<div x-data="chatbotApp()" class="h-[calc(100vh-80px)] bg-slate-100 flex flex-col justify-between overflow-hidden">
    
    <!-- MAIN FULL CONTAINER -->
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 w-full h-full py-2 sm:py-4 flex flex-col">
        
        <div class="bg-white rounded-3xl border border-slate-200 shadow-lg flex flex-col h-full overflow-hidden relative">
            
            <!-- HEADER CHATBAR FULL -->
            <div class="px-5 py-4 bg-white border-b border-slate-100 flex items-center justify-between shrink-0 z-10 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="w-11 h-11 bg-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-md shadow-emerald-200 font-black text-sm">
                            AI
                        </div>
                        <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full"></span>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h1 class="text-base font-extrabold text-slate-900 leading-none">
                                Asisten AI Mitra Irigasi
                            </h1>
                            <span class="bg-emerald-100 text-emerald-800 text-[10px] font-extrabold px-2 py-0.5 rounded-md uppercase tracking-wider">
                                Online
                            </span>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Konsultasi Alat & Teknik Pengairan Lahan</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <!-- RESET BUTTON -->
                    <button 
                        @click="resetChat()" 
                        class="px-3 py-2 text-xs font-bold text-slate-500 hover:text-rose-600 bg-slate-100 hover:bg-rose-50 rounded-xl transition flex items-center gap-1.5"
                        title="Bersihkan Percakapan"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        <span class="hidden sm:inline">Reset Chat</span>
                    </button>
                    
                    <!-- WA DIRECT LINK -->
                    <a 
                        href="https://wa.me/6282142010020" 
                        target="_blank" 
                        class="px-3.5 py-2 text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 rounded-xl transition flex items-center gap-1.5 shadow-sm shadow-emerald-200"
                    >
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        <span class="hidden sm:inline">CS WA Admin</span>
                    </a>
                </div>
            </div>

            <!-- CHAT STREAM BODY (FULL SCROLLABLE AREA) -->
            <div id="chat-stream" class="grow p-4 sm:p-6 overflow-y-auto space-y-4 bg-slate-50/60">
                
                <template x-for="(msg, index) in messages" :key="index">
                    <div :class="msg.sender === 'user' ? 'justify-end' : 'justify-start'" class="flex items-start gap-2.5">
                        
                        <!-- BOT AVATAR -->
                        <template x-if="msg.sender === 'bot'">
                            <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 font-black text-xs shadow-sm mt-1">
                                AI
                            </div>
                        </template>

                        <!-- BUBBLE -->
                        <div 
                            :class="msg.sender === 'user' 
                                ? 'bg-emerald-600 text-white rounded-3xl rounded-tr-none px-5 py-3.5 max-w-[85%] sm:max-w-[70%] text-xs sm:text-sm font-medium shadow-md shadow-emerald-100' 
                                : 'bg-white text-slate-800 rounded-3xl rounded-tl-none px-5 py-4 max-w-[90%] sm:max-w-[75%] text-xs sm:text-sm leading-relaxed border border-slate-200/80 shadow-sm'"
                        >
                            <div class="whitespace-pre-line font-sans" x-text="msg.text"></div>
                            <span 
                                :class="msg.sender === 'user' ? 'text-emerald-200' : 'text-slate-400'" 
                                class="text-[9px] block text-right mt-1.5 font-mono"
                                x-text="msg.time"
                            ></span>
                        </div>

                        <!-- USER AVATAR -->
                        <template x-if="msg.sender === 'user'">
                            <div class="w-8 h-8 rounded-xl bg-slate-800 text-white flex items-center justify-center shrink-0 font-extrabold text-[10px] shadow-sm mt-1">
                                YOU
                            </div>
                        </template>
                    </div>
                </template>

                <!-- TYPING INDICATOR -->
                <div x-show="loading" class="flex items-start gap-2.5" style="display: none;">
                    <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 font-black text-xs shadow-sm">
                        AI
                    </div>
                    <div class="bg-white border border-slate-200/80 rounded-3xl rounded-tl-none px-5 py-3.5 shadow-sm">
                        <div class="flex items-center gap-1.5">
                            <span class="text-xs text-slate-400 font-medium mr-1">AI sedang berpikir</span>
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-bounce"></span>
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-bounce [animation-delay:0.2s]"></span>
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-bounce [animation-delay:0.4s]"></span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- QUICK SUGGESTIONS CHIPS -->
            <div x-show="messages.length <= 1" class="px-4 py-2.5 bg-white border-t border-slate-100 flex items-center gap-2 overflow-x-auto shrink-0">
                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider shrink-0">Saran:</span>
                <button @click="sendQuickPrompt('Rekomendasi komponen irigasi tetes untuk kebun cabai')" class="px-3 py-1.5 bg-slate-50 hover:bg-emerald-50 hover:text-emerald-600 border border-slate-200 rounded-xl text-xs text-slate-600 font-semibold transition shrink-0">
                    💡 Irigasi Kebun Cabai
                </button>
                <button @click="sendQuickPrompt('Bagaimana cara kerja Disc Filter?')" class="px-3 py-1.5 bg-slate-50 hover:bg-emerald-50 hover:text-emerald-600 border border-slate-200 rounded-xl text-xs text-slate-600 font-semibold transition shrink-0">
                    💧 Fungsi Disc Filter
                </button>
                <button @click="sendQuickPrompt('Berapa nomor kontak admin WhatsApp Mitra Irigasi?')" class="px-3 py-1.5 bg-slate-50 hover:bg-emerald-50 hover:text-emerald-600 border border-slate-200 rounded-xl text-xs text-slate-600 font-semibold transition shrink-0">
                    📞 Kontak WA Admin
                </button>
            </div>

            <!-- FULL BOTTOM INPUT BAR -->
            <div class="p-3 sm:p-4 bg-white border-t border-slate-200 shrink-0">
                <form @submit.prevent="sendMessage()" class="flex items-center gap-2 max-w-7xl mx-auto">
                    <input 
                        type="text" 
                        x-model="input" 
                        :disabled="loading"
                        placeholder="Ketik pertanyaan Anda tentang alat atau teknik irigasi..." 
                        class="grow px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition disabled:opacity-60"
                        x-ref="chatInput"
                    >
                    
                    <button 
                        type="submit" 
                        :disabled="loading || !input.trim()"
                        class="bg-emerald-600 hover:bg-emerald-700 disabled:bg-slate-300 text-white font-extrabold px-5 py-3.5 rounded-2xl transition shadow-md shadow-emerald-200 disabled:shadow-none flex items-center gap-2 cursor-pointer shrink-0"
                    >
                        <span class="hidden sm:inline text-xs">Kirim</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>

<script>
    function chatbotApp() {
        return {
            input: '',
            loading: false,
            messages: [
                {
                    sender: 'bot',
                    text: 'Halo! Saya Asisten AI Mitra Irigasi. Ada yang bisa saya bantu terkait peralatan irigasi, panduan teknis, atau konsultasi pengairan?',
                    time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                }
            ],

            init() {
                this.scrollToBottom();
            },

            sendQuickPrompt(text) {
                this.input = text;
                this.sendMessage();
            },

            async sendMessage() {
                const query = this.input.trim();
                if (!query || this.loading) return;

                const timeNow = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

                this.messages.push({
                    sender: 'user',
                    text: query,
                    time: timeNow
                });

                this.input = '';
                this.loading = true;
                this.scrollToBottom();

                const payloadMessages = this.messages.map(m => ({
                    sender: m.sender,
                    text: m.text
                }));

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    const response = await fetch("{{ route('chatbot.send') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ messages: payloadMessages })
                    });

                    const data = await response.json();

                    this.messages.push({
                        sender: 'bot',
                        text: data.reply || 'Maaf, sistem tidak memberikan respon.',
                        time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                    });

                } catch (error) {
                    console.error('Chat error:', error);
                    this.messages.push({
                        sender: 'bot',
                        text: 'Maaf, terjadi kendala koneksi ke server. Silakan coba lagi.',
                        time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                    });
                } finally {
                    this.loading = false;
                    this.scrollToBottom();
                    this.$nextTick(() => {
                        this.$refs.chatInput.focus();
                    });
                }
            },

            resetChat() {
                if (confirm('Apakah Anda ingin mengosongkan riwayat percakapan?')) {
                    this.messages = [
                        {
                            sender: 'bot',
                            text: 'Riwayat percakapan telah dibersihkan. Silakan ajukan pertanyaan baru!',
                            time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                        }
                    ];
                }
            },

            scrollToBottom() {
                this.$nextTick(() => {
                    const container = document.getElementById('chat-stream');
                    if (container) {
                        container.scrollTop = container.scrollHeight;
                    }
                });
            }
        };
    }
</script>
@endsection