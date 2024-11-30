<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-blue-50 font-sans">
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
                    <a href="/payment" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-chart-bar mr-2"></i>Payment
                    </a>
                </li>
                <li>
                    <a href="/payment-history" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-chart-bar mr-2"></i>Payment History
                    </a>
                </li>
                <li>
                    <a href="{{ route('infor') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-users mr-2"></i>Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('request') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
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
                        <button type="submit" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700 w-full text-left">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <main class="flex-1 p-8">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Payment History</h1>
                <p class="text-gray-600">View all your recent transactions</p>
            </div>

            <!-- Payment History Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Recent Transactions</h2>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-sm font-medium text-gray-500 border-b">
                                    <th class="pb-4 pr-6">Date</th>
                                    <th class="pb-4 pr-6">Description</th>
                                    <th class="pb-4 pr-6">Amount</th>
                                    <th class="pb-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach ($history as $hs)
                                <tr class="text-sm text-gray-800">
                                    <td class="py-4 pr-6">{{ $hs->updated_at }}</td>
                                    <td class="py-4 pr-6">{{ $hs->serviceName }}</td>
                                    <td class="py-4 pr-6">{{ $hs->servicePrice }} VND</td>
                                    <td class="py-4"><span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">Completed</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>