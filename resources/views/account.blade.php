<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body class="bg-blue-50 font-sans">
    <div class="flex h-screen">
        <!-- Vertical Menu -->
        <nav class="bg-blue-800 text-white w-64 space-y-6 py-7 px-2">
            <div class="flex items-center space-x-4 px-4">
                <i class="fas fa-chart-line text-2xl"></i>
                <span class="text-2xl font-extrabold">ThreeFPTT</span>
            </div>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                </li>
                <li>
                    <a href="/payment"
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
                        <button type="submit"
                            class="w-full text-left block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-hidden overflow-y-auto">
            <h2 class="text-3xl font-bold mb-6 text-blue-900">Customer Overview</h2>

            <!-- Info Boxes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($contracts as $contract)
                    <!-- Box 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-blue-700">Contract Code</h3>
                            <i class="fas fa-users text-3xl text-blue-500"></i>
                        </div>
                        <p class="text-3xl font-bold mt-4 text-blue-900">{{ $contract->contractID }}</p>
                    </div>

                    <!-- Box 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-blue-700">Service Name</h3>
                            <i class="fas fa-dollar-sign text-3xl text-blue-500"></i>
                        </div>
                        <p class="text-3xl font-bold mt-4 text-blue-900">{{ $contract->serviceName }}</p>
                    </div>

                    <!-- Box 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-400">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-blue-600">Price</h3>
                            <i class="fas fa-shopping-cart text-3xl text-blue-400"></i>
                        </div>
                        <p class="text-3xl font-bold mt-4 text-blue-800">{{ $contract->servicePrice }} VND/month</p>
                    </div>

                    <!-- Box 4 -->
                    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-400">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-blue-600">Validate until</h3>
                            <i class="fas fa-calendar-alt text-3xl text-blue-400"></i>
                        </div>
                        <p class="text-3xl font-bold mt-4 text-blue-800">{{ $contract->validateuntil }}</p>
                    </div>

                    <!-- Modem Information and Turn Off Form -->
                    <div class="container mx-auto px-4 py-8">
                        <div class="bg-white rounded-lg shadow-md p-6 max-w-md mx-auto">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-2xl font-semibold">Modem Information</h2>
                                <form id="offForm-{{ $contract->contractID }}" action="api/mqtt/publishoff/{{ $contract->contractID }}"
                                    method="POST" onsubmit="submitForm(event, '{{ $contract->contractID }}')">
                                    @csrf
                                    <button
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Turn
                                        off</button>
                                </form>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">Model: <span class="font-semibold">{{ $contract->routerName }}</span></p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">Status:
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Online
                                    </span>
                                </p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">Signal Strength:</p>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">Connected Devices: <span class="font-semibold">5</span></p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">IP Address: <span class="font-semibold">192.168.1.1</span></p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">MAC Address: <span class="font-semibold">{{ $contract->MACaddress }}</span></p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">Firmware Version: <span class="font-semibold">v2.5.1</span></p>
                            </div>

                            <div class="mb-4">
                                <p class="text-gray-600">WiFi Name: <span class="font-semibold">SuperFast_5G</span></p>
                            </div>

                            <div class="mb-4">
                                <details class="bg-gray-100 rounded-lg">
                                    <summary class="cursor-pointer font-semibold p-3">Extended Features</summary>
                                    <div class="p-3">
                                        <p class="mb-2">Channel: <span class="font-semibold">6</span></p>
                                        <p class="mb-2">Download: <span class="font-semibold">{{ $contract->bandwidth }} mb/s</span></p>
                                        <p class="mb-2">Encryption: <span class="font-semibold">WPA3</span></p>
                                        <p class="mb-2">DHCP: <span class="font-semibold">Enabled</span></p>
                                        <div class="mt-4">
                                            <h3 class="font-semibold mb-2">Additional Controls:</h3>
                                            <div class="flex space-x-2">
                                                <a href="https://www.speedtest.net/" target="_blank">
                                                <button
                                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Speed Test</button></a>
                                                <button
                                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </details>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function submitForm(event, contractID) {
            event.preventDefault(); // Prevent default form submission

            const form = document.getElementById('offForm-' + contractID); // Dynamically select the form using contractID
            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest', // For Laravel to recognize it as AJAX
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Handle success
                    console.log(data); // Log the response data for debugging
                    alert('Turn off successful for contract ' + contractID); // Show a success message
                })
                .catch(error => {
                    // Handle error
                    console.error('Error:', error);
                    alert('An error occurred for contract ' + contractID +
                    '. Please try again.'); // Show an error message
                });
        }
    </script>
</body>

</html>
