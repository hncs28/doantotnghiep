<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Personal Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-blue-50 font-sans">
    <form action="{{ route('request-store') }}" method="POST" id="supportForm">
        @csrf
        <div class="flex h-screen">
            <nav class="bg-blue-800 text-white w-64 space-y-6 py-7 px-2">
                <div class="flex items-center space-x-4 px-4">
                    <i class="fas fa-chart-line text-2xl"></i>
                    <span class="text-2xl font-extrabold">HiFPT</span>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="/account" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('getpayment') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-chart-bar mr-2"></i>Payment
                        </a>
                    </li>
                    <li>
                        <a href="/payment-history" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-chart-bar mr-2"></i>Payment History
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('infor') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-users mr-2"></i>Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('request') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-cog mr-2"></i>Request
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('history') }}"
                            class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-cog mr-2"></i>Request History
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                                <button type="submit" class="fas fa-cog mr-2">Logout</button>
                        </form>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="container mx-auto px-4 py-8">
                <h1 class="text-3xl font-bold text-center mb-8">Hỗ trợ</h1>
                <div class="flex justify-center">
                    <div id="availableRequests"
                        class="bg-white rounded-lg shadow-md p-6 w-full max-w-md transition-all duration-500 ease-in-out transform">
                        <h2 class="text-xl font-semibold mb-4">Yêu cầu</h2>
                        <ul class="space-y-4" id="requestList">
                            <li>
                                @foreach ($supports as $support)
                                    <button type="button"
                                        class="w-full text-left px-4 py-2 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded transition duration-300 ease-in-out"
                                        aria-label="Select Request {{ $support->supportID }}"
                                        onclick="selectRequest({{ $support->supportID }})"
                                        name="supports">
                                        {{ $support->supportName }}
                                    </button>
                                @endforeach
                            </li>
                        </ul>
                    </div>

                    <div id="requestOptions"
                        class="hidden bg-white rounded-lg shadow-md p-6 ml-8 w-full max-w-md transition-all duration-500 ease-in-out transform translate-x-full opacity-0">
                        <h2 class="text-xl font-semibold mb-4">Chi tiết</h2>

                        <div id="request1Options" class="hidden space-y-4">
                            <h3 class="text-lg font-medium">Yêu cầu hỗ trợ</h3>
                            <select id="request1Select" name="detail"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                aria-label="Select an option for Request 1">
                                <option value="" disabled selected>Select an option</option>
                                @foreach ($technical as $tech)
                                    <option value="{{ $tech->detailID }}">{{ $tech->detailName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="request2Options" class="hidden space-y-4">
                            <h3 class="text-lg font-medium">Hỗ trợ thủ tục</h3>
                            <select name="detail"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                aria-label="Select an option for Request 2">
                                <option value="" disabled selected>Select an option</option>
                                @foreach ($formality as $forma)
                                    <option value="{{ $forma->detailID }}">{{ $forma->detailName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="request3Options" class="hidden space-y-4">
                            <h3 class="text-lg font-medium">Hỗ trợ cước phí</h3>
                            <select name="detail"
                                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                aria-label="Select an option for Request 3">
                                <option value="" disabled selected>Select an option</option>
                                @foreach ($payment as $pay)
                                    <option value="{{ $pay->detailID }}">{{ $pay->detailName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="requestDetails" class="block text-sm font-medium text-gray-700 mb-1">Request Details</label>
                    <textarea id="requestDetails" name="requestDetails" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Enter details about your request"></textarea>
                </div>

                <div class="mt-8 text-center">
                    <button id="submitBtn" type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out"
                        aria-label="Submit Request">
                        Submit Request
                    </button>
                </div>

                <div id="errorMessage" class="hidden mt-4 p-4 bg-red-100 text-red-700 rounded" role="alert"></div>
            </div>
        </div>
    </form>

    <script>
        function selectRequest(requestId) {
            // Prevent form submission when selecting options
            event.preventDefault();

            // Show request details on the right
            document.querySelectorAll('[id$="Options"]').forEach(el => el.classList.add('hidden'));
            document.getElementById(`request${requestId}Options`).classList.remove('hidden');

            // Enable submit button when a request is selected
            document.getElementById('submitBtn').disabled = false;
            document.getElementById('errorMessage').classList.add('hidden');

            // Animate options panel
            document.getElementById('availableRequests').classList.add('transition-transform', 'duration-500',
                'ease-in-out', 'transform', '-translate-x-1/4');
            const requestOptions = document.getElementById('requestOptions');
            requestOptions.classList.remove('hidden', 'translate-x-full', 'opacity-0');
            setTimeout(() => {
                requestOptions.classList.add('translate-x-0', 'opacity-100');
            }, 50);
        }

        function showError(message) {
            const errorElement = document.getElementById('errorMessage');
            errorElement.textContent = message;
            errorElement.classList.remove('hidden');
        }
    </script>
</body>

</html>
