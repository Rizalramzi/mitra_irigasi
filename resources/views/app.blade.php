<!doctype html>
<html lang="id" class="h-full bg-zinc-950 text-zinc-100 dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Asisten Chatbot Mitra Irigasi</title>
    <!-- Fonts from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Custom scrollbar to keep it sleek */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: rgba(63, 63, 70, 0.4);
            border-radius: 9999px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: rgba(63, 63, 70, 0.8);
        }

        /* Pulse animation for typing indicator */
        @keyframes dotPulse {

            0%,
            100% {
                transform: translateY(0);
                opacity: 0.4;
            }

            50% {
                transform: translateY(-4px);
                opacity: 1;
            }
        }

        .typing-dot {
            animation: dotPulse 1.4s infinite ease-in-out;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }
    </style>
</head>

<body class="h-full flex overflow-hidden">

    <!-- Main Outer Container -->
    <div class="flex flex-1 overflow-hidden h-full">

        <!-- Sidebar - Hidden on mobile, visible on desktop -->
        <aside class="hidden md:flex md:w-80 flex-col bg-zinc-900 border-r border-zinc-800 shrink-0">
            <!-- Logo / Brand -->
            <div class="p-6 border-b border-zinc-800">
                <div class="flex items-center gap-3">
                    <div
                        class="h-10 w-10 rounded-xl bg-emerald-600 flex items-center justify-center shadow-lg shadow-emerald-900/30">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15a4.5 4.5 0 0 0 4.5 4.5H18a3.75 3.75 0 0 0 1.332-7.257 3 3 0 0 0-3.758-3.848 5.25 5.25 0 0 0-10.233 2.33A4.502 4.502 0 0 0 2.25 15Z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-lg leading-tight text-white">Mitra Irigasi</h2>
                        <p class="text-xs text-zinc-400">Custom AI Assistant</p>
                    </div>
                </div>
            </div>

            <!-- Info / Context Indicators -->
            <div class="flex-1 p-6 space-y-6 overflow-y-auto custom-scrollbar">
                <div>
                    <span class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Informasi Status</span>
                    <div class="mt-2 flex items-center gap-2">
                        <span class="relative flex h-2.5 w-2.5">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </span>
                        <span class="text-sm font-medium text-zinc-300">Asisten siap menjawab</span>
                    </div>
                </div>

                <div>
                    <span class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Topik Utama</span>
                    <ul class="mt-2 space-y-2 text-sm text-zinc-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Otomatisasi Irigasi Pintar</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Produk Mitra-Moist & Hydro</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Kontak & Hubungan Bisnis</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Garansi perangkat keras 1 tahun</span>
                        </li>
                    </ul>
                </div>

                <div class="pt-4 border-t border-zinc-800">
                    <span class="text-xs font-semibold tracking-wider text-zinc-500 uppercase">Pertanyaan Populer</span>
                    <div class="mt-2 space-y-2">
                        <button onclick="sendQuickMessage('Siapa saja mitra dari Mitra Irigasi?')"
                            class="w-full text-left text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-300 p-2.5 rounded-lg border border-zinc-750 transition duration-150">
                            "Siapa saja mitra dari Mitra Irigasi?"
                        </button>
                        <button onclick="sendQuickMessage('Apa visi dari Mitra Irigasi')"
                            class="w-full text-left text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-300 p-2.5 rounded-lg border border-zinc-750 transition duration-150">
                            "Apa visi dari Mitra Irigasi"
                        </button>
                        <button onclick="sendQuickMessage('Bagaimana cara menghubungi tim support?')"
                            class="w-full text-left text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-300 p-2.5 rounded-lg border border-zinc-750 transition duration-150">
                            "Bagaimana cara menghubungi tim support?"
                        </button>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-6 border-t border-zinc-800 text-xs text-zinc-500">
                <p>© 2026 Mitra Irigasi.</p>
                <p class="mt-1">Powered by Gemini AI (v1beta)</p>
            </div>
        </aside>

        <!-- Main Chat Area -->
        <main class="flex-1 flex flex-col bg-zinc-950 overflow-hidden relative">

            <!-- Header -->
            <header
                class="flex items-center justify-between px-6 py-4 border-b border-zinc-900 bg-zinc-900/40 backdrop-blur-md">
                <div class="flex items-center gap-3">
                    <div class="md:hidden h-8 w-8 rounded-lg bg-emerald-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15a4.5 4.5 0 0 0 4.5 4.5H18a3.75 3.75 0 0 0 1.332-7.257 3 3 0 0 0-3.758-3.848 5.25 5.25 0 0 0-10.233 2.33A4.502 4.502 0 0 0 2.25 15Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-semibold text-white leading-normal text-sm md:text-base">CS Assistant Mitra
                            Irigasi</h1>
                        <p class="text-xs text-zinc-400">Menyediakan info valid & solusi teknologi pengairan cerdas</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span
                        class="hidden md:inline-flex items-center px-2 py-1 rounded bg-zinc-800 text-zinc-400 text-xs font-mono font-medium">Model:
                        GEMINI-2.5</span>
                    <button onclick="clearChat()"
                        class="text-zinc-400 hover:text-white p-2 rounded-lg hover:bg-zinc-800 transition duration-150"
                        title="Bersihkan Chat">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Message Field -->
            <div id="messagesContainer" class="flex-1 overflow-y-auto p-6 space-y-6 custom-scrollbar">

                <!-- Bot Welcome Message -->
                <div class="flex gap-4 max-w-3xl">
                    <div
                        class="h-8 w-8 rounded bg-emerald-600 flex items-center justify-center shrink-0 shadow-lg text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5">
                            <path
                                d="M10 2a6 6 0 0 0-6 6v3.586l-.707.707A1 1 0 0 0 4 14h12a1 1 0 0 0 .707-1.707L16 11.586V8a6 6 0 0 0-6-6zM10 18a3 3 0 0 1-3-3h6a3 3 0 0 1-3 3z" />
                        </svg>
                    </div>
                    <div class="bg-zinc-900 border border-zinc-800/80 rounded-2xl rounded-tl-sm px-4 py-3 shadow-md">
                        <p class="text-sm leading-relaxed text-zinc-100">
                            Halo! Selamat datang di layanan asisten virtual Mitra Irigasi 🌱.
                        </p>
                        <p class="text-sm leading-relaxed mt-2 text-zinc-300">
                            Haloo, namaku MinRig, asisten virtual dari Mitra Irigasi. Senang bertemu denganmu! 🌿
                        </p>
                        <p class="text-sm leading-relaxed mt-2 text-zinc-300">
                            Aku siap membantu kamu dengan informasi seputar produk kami, Ada yang ingin kamu tanyakan?
                        </p>
                    </div>
                </div>

                <!-- Interactive Suggestion Chips (Shows on mobile too) -->
                <div id="suggestionChips" class="flex flex-wrap gap-2 pt-2 max-w-3xl pl-12">
                    <button onclick="sendQuickMessage('Jelaskan detail mengenai produk sensor Mitra-Moist!')"
                        class="bg-zinc-900 hover:bg-zinc-800 text-zinc-300 text-xs px-3.5 py-2 rounded-full border border-zinc-850 hover:border-zinc-700 transition duration-150">
                        💡 Detail Mitra-Moist
                    </button>
                    <button onclick="sendQuickMessage('Apakah ada garansi sistem otomatisasi alat?')"
                        class="bg-zinc-900 hover:bg-zinc-800 text-zinc-300 text-xs px-3.5 py-2 rounded-full border border-zinc-850 hover:border-zinc-700 transition duration-150">
                        🛡️ Informasi Garansi
                    </button>
                    <button onclick="sendQuickMessage('Di mana alamat kantor Mitra Irigasi?')"
                        class="bg-zinc-900 hover:bg-zinc-800 text-zinc-300 text-xs px-3.5 py-2 rounded-full border border-zinc-850 hover:border-zinc-700 transition duration-150">
                        📍 Hubungi Kantor Mitra
                    </button>
                </div>

                <!-- Dynamic Chat Rows will append here -->

                <!-- Typing Indicator (Initially Hidden) -->
                <div id="typingIndicator" class="hidden gap-4 max-w-3xl">
                    <div class="h-8 w-8 rounded bg-emerald-600 flex items-center justify-center shrink-0 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5">
                            <path
                                d="M10 2a6 6 0 0 0-6 6v3.586l-.707.707A1 1 0 0 0 4 14h12a1 1 0 0 0 .707-1.707L16 11.586V8a6 6 0 0 0-6-6zM10 18a3 3 0 0 1-3-3h6a3 3 0 0 1-3 3z" />
                        </svg>
                    </div>
                    <div
                        class="bg-zinc-900 border border-zinc-800/80 rounded-2xl rounded-tl-sm px-5 py-4 shadow-md flex items-center gap-1.5 min-w-17.5 justify-center">
                        <span class="h-2 w-2 rounded-full bg-zinc-400 typing-dot"></span>
                        <span class="h-2 w-2 rounded-full bg-zinc-400 typing-dot"></span>
                        <span class="h-2 w-2 rounded-full bg-zinc-400 typing-dot"></span>
                    </div>
                </div>

            </div>

            <!-- Input Bar Form -->
            <div class="p-6 border-t border-zinc-900 bg-zinc-905">
                <form id="chatForm" onsubmit="handleChatSubmit(event)"
                    class="max-w-3xl mx-auto relative flex items-center">
                    <input type="text" id="messageInput" placeholder="Ketik pertanyaan tentang Mitra Irigasi..."
                        class="w-full bg-zinc-900 border border-zinc-800/80 text-white rounded-xl py-3.5 pl-4 pr-14 focus:outline-none focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 text-sm shadow-inner"
                        autocomplete="off" />
                    <button type="submit" id="sendButton"
                        class="absolute right-2 px-3.5 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-500 transition duration-150 flex items-center justify-center shadow-lg hover:shadow-emerald-990/20">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4">
                            <path
                                d="M3.105 2.289a.75.75 0 0 0-.826.95l1.414 4.925A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.896 28.896 0 0 0 15.293-7.154.75.75 0 0 0 0-1.115A28.897 28.897 0 0 0 3.105 2.289Z" />
                        </svg>
                    </button>
                </form>
            </div>

        </main>
    </div>

    <!-- Client-side Logic Script -->
    <script>
        let messageHistory = [];

        // Add a message into the chat logs container
        function appendMessage(sender, text) {
            const container = document.getElementById('messagesContainer');
            const typingBox = document.getElementById('typingIndicator');

            // Element for row
            const messageRow = document.createElement('div');
            messageRow.className = 'flex gap-4 max-w-3xl ' + (sender === 'user' ? 'ml-auto flex-row-reverse' : '');

            // Avatar SVG/Icon
            const iconDiv = document.createElement('div');
            if (sender === 'user') {
                iconDiv.className = 'h-8 w-8 rounded bg-zinc-800 flex items-center justify-center shrink-0 text-zinc-300';
                iconDiv.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.992 6.992 0 0 0 10 17a6.992 6.992 0 0 0 4.793-2.61A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd" />
            </svg>
          `;
            } else {
                iconDiv.className = 'h-8 w-8 rounded bg-emerald-600 flex items-center justify-center shrink-0 text-white';
                iconDiv.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
              <path d="M10 2a6 6 0 0 0-6 6v3.586l-.707.707A1 1 0 0 0 4 14h12a1 1 0 0 0 .707-1.707L16 11.586V8a6 6 0 0 0-6-6zM10 18a3 3 0 0 1-3-3h6a3 3 0 0 1-3 3z" />
            </svg>
          `;
            }

            // Message body box
            const textDiv = document.createElement('div');
            textDiv.className = sender === 'user' ?
                'bg-emerald-700/80 border border-emerald-600/40 rounded-2xl rounded-tr-sm px-4 py-3 shadow-md max-w-xl text-white text-sm' :
                'bg-zinc-900 border border-zinc-800/80 rounded-2xl rounded-tl-sm px-4 py-3 shadow-md max-w-xl text-zinc-100 text-sm';

            // Parse simple markdown-like bold text **text** and linebreaks
            const formattedText = parseMarkdown(text);
            textDiv.innerHTML = `<p class="leading-relaxed whitespace-pre-wrap">${formattedText}</p>`;

            messageRow.appendChild(iconDiv);
            messageRow.appendChild(textDiv);

            // Insert before typing indicator
            container.insertBefore(messageRow, typingBox);
            scrollToBottom();
        }

        // Quick markdown formatter for bolding (`**words**`)
        function parseMarkdown(text) {
            return text
                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                .replace(/\*(.*?)\*/g, '<em>$1</em>');
        }

        // Smooth scroll to messages bottom
        function scrollToBottom() {
            const container = document.getElementById('messagesContainer');
            container.scrollTo({
                top: container.scrollHeight,
                behavior: 'smooth'
            });
        }

        // Submit handle
        async function handleChatSubmit(event) {
            if (event) event.preventDefault();

            const input = document.getElementById('messageInput');
            const query = input.value.trim();
            if (!query) return;

            // Clear input, show typing
            input.value = '';
            hideSuggestionChips();

            // 1. Add user bubble
            appendMessage('user', query);
            messageHistory.push({
                sender: 'user',
                text: query
            });

            // 2. Show loading dots
            const typingBox = document.getElementById('typingIndicator');
            typingBox.classList.remove('hidden');
            typingBox.classList.add('flex');
            scrollToBottom();

            // Disable elements during transit
            setControls(false);

            // 3. Request
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const response = await fetch('/api/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // hapus X-CSRF-TOKEN — tidak perlu di api.php
                    },
                    body: JSON.stringify({
                        messages: messageHistory
                    })
                });

                const data = await response.json();
                typingBox.classList.add('hidden');
                typingBox.classList.remove('flex');

                if (response.ok && data.reply) {
                    appendMessage('bot', data.reply);
                    messageHistory.push({
                        sender: 'bot',
                        text: data.reply
                    });
                } else {
                    const errorText = data.reply ||
                        "Maaf, terjadi ketidakcocokan data di server. Coba kirim ulang pesan Anda.";
                    appendMessage('bot', `⚠️ ${errorText}`);
                }
            } catch (error) {
                typingBox.classList.add('hidden');
                typingBox.classList.remove('flex');
                appendMessage('bot',
                    "⚠️ Gagal mengirim pesan. Pastikan sambungan jaringan Anda aktif dan server web berjalan.");
                console.error('Fetch error:', error);
            } finally {
                setControls(true);
                scrollToBottom();
            }
        }

        // Send chip text
        function sendQuickMessage(text) {
            document.getElementById('messageInput').value = text;
            handleChatSubmit(null);
        }

        function hideSuggestionChips() {
            const chips = document.getElementById('suggestionChips');
            if (chips) {
                chips.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => chips.classList.add('hidden'), 200);
            }
        }

        function showSuggestionChips() {
            const chips = document.getElementById('suggestionChips');
            if (chips) {
                chips.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
            }
        }

        function setControls(enabled) {
            const input = document.getElementById('messageInput');
            const btn = document.getElementById('sendButton');
            input.disabled = !enabled;
            btn.disabled = !enabled;
            if (enabled) {
                input.focus();
            }
        }

        // Reset flow
        function clearChat() {
            const container = document.getElementById('messagesContainer');
            const rows = container.querySelectorAll('.flex.gap-4.max-w-3xl');

            // Remove all rows except the greeting and typing indicator
            rows.forEach((row, index) => {
                // Keep index 0 (welcome model) and skip typing box (#typingIndicator)
                if (index > 0 && row.id !== 'typingIndicator') {
                    row.remove();
                }
            });

            messageHistory = [];
            showSuggestionChips();
        }
    </script>
</body>

</html>
