<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needer Dashboard - Blood Donation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            background: linear-gradient(180deg, #b91c1c, #dc2626);
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .welcome-header {
            background: linear-gradient(90deg, #dc2626, #b91c1c);
            border-radius: 12px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            background: #dc2626;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #b91c1c;
        }

        .btn-secondary {
            background: #16a34a;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-secondary:hover {
            background: #15803d;
        }

        .table-container {
            max-height: 300px;
            overflow-y: auto;
        }

        .chat-container {
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .chat-message {
            background: #ffffff;
            border-radius: 8px;
            padding: 10px 15px;
            margin: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .chat-input {
            border: 1px solid #81d4fa;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .chat-input:focus {
            border-color: #4fc3f7;
            outline: none;
        }

        .emoji {
            font-size: 40px;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar w-64 fixed h-full text-white shadow-lg">
            <div class="p-6 text-center">
                <h3 class="text-2xl font-bold flex items-center justify-center">
                    <i class="fas fa-tint text-white mr-2"></i> Blood Donation
                </h3>
            </div>
            <nav class="mt-4">
                <a href="#" class="block py-3 px-6 text-lg font-medium hover:text-white">
                    <i class="fas fa-home mr-2"></i> Dashboard
                </a>
                <a href="#" class="block py-3 px-6 text-lg font-medium hover:text-white">
                    <i class="fas fa-hand-holding-heart mr-2"></i> Request Blood
                </a>
                <a href="#" class="block py-3 px-6 text-lg font-medium hover:text-white">
                    <i class="fas fa-history mr-2"></i> Donation History
                </a>
                <a href="#" class="block py-3 px-6 text-lg font-medium hover:text-white">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="block w-full py-3 px-6 text-lg font-medium text-white hover:text-white hover:bg-opacity-80 focus:outline-none">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8">
            <!-- Welcome Header -->
            <div class="welcome-header text-white p-8 mb-8">
                <h2 class="text-3xl font-bold">Welcome, {{ session('username') }}!</h2>
                <p class="mt-2 text-lg">Your compassion saves lives. Let's make a difference together.</p>
            </div>

            <!-- Dashboard Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- User Details Card -->
                <div class="card p-6">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-user-circle text-red-600 mr-2"></i> Your Profile
                    </h3>
                    <div class="mt-4 space-y-2">
                        <p><span class="font-medium text-gray-600">Username:</span> {{ session('username') }}</p>
                        <p><span class="font-medium text-gray-600">Email:</span> {{ session('email') }}</p>
                        <p><span class="font-medium text-gray-600">Phone:</span> {{ session('phone') }}</p>
                        <p><span class="font-medium text-gray-600">Location:</span> {{ session('location') }}</p>
                    </div>
                    <a href="#" class="mt-4 inline-block px-6 py-2 text-white btn-primary rounded-lg">Edit Profile</a>
                </div>

                <!-- Quick Actions Card -->
                <div class="card p-6">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-heartbeat text-red-600 mr-2"></i> Quick Actions
                    </h3>
                    <p class="mt-2 text-gray-600">Need blood urgently or ready to donate? Take action now!</p>
                    <div class="mt-4 flex space-x-4">
                        <a href="#" class="px-6 py-2 text-white btn-primary rounded-lg">Request Blood</a>
                        <a href="#" class="px-6 py-2 text-white btn-secondary rounded-lg">Donate Blood</a>
                    </div>
                </div>
            </div>

            <!-- Donor List and Chatbot -->
            <div class="mt-8">
                <div class="card p-6">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-users text-red-600 mr-2"></i> Available Donors
                    </h3>
                    <div class="table-container mt-4">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-red-50 text-gray-700">
                                    <th class="p-3">Name</th>
                                    <th class="p-3">Location</th>
                                    <th class="p-3">Phone</th>
                                    <th class="p-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($donors as $donor)
                                <tr class="border-b">
                                    <td class="p-3">{{ $donor->username }}</td>
                                    <td class="p-3">{{ $donor->location }}</td>
                                    <td class="p-3">{{ $donor->phone }}</td>
                                    <td class="p-3">
                                        <a href="tel:{{ $donor->phone }}" class="text-blue-600 hover:underline">
                                            <i class="fas fa-phone mr-1"></i> Contact
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-3 text-center text-gray-600">No donors available at the moment.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- AI Chatbot -->
                    <div class="chat-container mt-6">
                        <div class="flex justify-center mb-4">
                            <span class="emoji">😊</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 text-center mb-4">Blood Donation AI Assistant</h3>
                        <p class="text-center text-gray-600 mb-4">Ask me about blood donation or health tips!</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <div class="card p-3">
                                    <p class="text-sm text-gray-700">Enter your question here...</p>
                                </div>
                                <div class="card p-3">
                                    <p class="text-sm text-gray-600">I can help with donation tips or FAQs!</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <div class="card p-3">
                                    <p class="text-sm text-gray-700">Try asking: "How does blood donation work?"</p>
                                </div>
                                <div class="card p-3">
                                    <p class="text-sm text-gray-600">Get personalized advice now!</p>
                                </div>
                            </div>
                        </div>
                        <div id="chatMessages" class="mt-4 space-y-2"></div>
                        <div class="mt-4 flex space-x-2">
                            <input type="text" id="chatInput" class="chat-input flex-1 p-2" placeholder="Type your question...">
                            <button id="sendButton" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Send</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="mt-8">
                <div class="card p-6">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-list-alt text-red-600 mr-2"></i> Recent Activity
                    </h3>
                    <ul class="mt-4 space-y-3">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-tint text-red-500 mr-2"></i> Requested A+ blood on {{ date('Y-m-d') }}
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-donate text-green-500 mr-2"></i> Donated blood on {{ date('Y-m-d', strtotime('-10 days')) }}
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-user-edit text-blue-500 mr-2"></i> Updated profile on {{ date('Y-m-d', strtotime('-5 days')) }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Load the Google Generative AI SDK (using unpkg as a reliable CDN) -->

    <script>
        // Global functions
        function appendMessage(message, colorClass) {
            const chatMessages = document.getElementById('chatMessages');
            const messageDiv = document.createElement('div');
            messageDiv.className = `chat-message ${colorClass} text-sm`;
            messageDiv.innerHTML = message.replace('\*',''); // <-- change here
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function onScriptLoad() {
            console.log('Google Generative AI SDK loaded successfully.');
            window.genAI = window.GoogleGenerativeAI; // global access
        }

        function onScriptError() {
            console.error('Failed to load Google Generative AI SDK.');
            appendMessage('AI: Error - Failed to load AI SDK. Please try again later.', 'text-red-600');
        }

        const chatInput = document.getElementById('chatInput');
        const sendButton = document.getElementById('sendButton');

        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        sendButton.addEventListener('click', debounce(async () => {
            const Rules = "You are a chatbot that specializes only in answering questions about blood related problems" +
                "Rules:" +
                "-Only answer questions that are specifically about blood related. -" +
                "If a user asks a question that is not related to blood related, respond with:" +
                "I'm sorry, but I can only assist with questions related to blood related." +
                "Keep your answers clear short about 3 or max 5 lines in paragraph only, concise, and easy" +
                "for anyone to understand. -" +
                 + " You dont need to add any speacal characters in the responce";
            const prompt = chatInput.value.trim();
            if (!prompt) return;

            appendMessage('You: ' + prompt, 'text-blue-600');
            chatInput.value = '';

            try {
                const response = await fetch('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=APIKEY', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        contents: [{
                            parts: [{
                                text: Rules + prompt
                            }]
                        }]
                    })
                });

                const data = await response.json();
                const responseText = data.candidates?.[0]?.content?.parts?.[0]?.text || "AI couldn't respond.";
                appendMessage('AI: ' + responseText, 'text-green-600');
            } catch (error) {
                console.error(error);
                appendMessage('AI: Error - Something went wrong.', 'text-red-600');
            }
        }, 300));

        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendButton.click();
            }
        });
    </script>

</body>
</html>
