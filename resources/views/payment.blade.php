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
                <span class="text-2xl font-extrabold">Dashboard</span>
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

        <div class="flex-grow container mx-auto px-4 py-8">
            @if($paymentContracts->isEmpty())
                <p class="text-center text-xl font-semibold">Bạn đã thanh toán hết hóa đơn</p>
            @else
                <h1 class="text-3xl font-bold mb-8 text-center">Payment Bills</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach ($paymentContracts as $contract)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-semibold">Bill Details</h2>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-600">Bill Number: <span class="font-semibold">{{ $contract->contractID }}</span></p>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-600">Status: 
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            </p>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-600">Amount Due:</p>
                            <p class="text-3xl font-bold text-green-600">{{ $contract->servicePrice }} VND</p>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray-600">Service: <span class="font-semibold">{{ $contract->serviceName }}</span></p>
                        </div>
                        <div class="flex justify-between items-center">
                            <form action="/checkout/{{ $contract->contractID }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center justify-center px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">
                                    <i class="fas fa-credit-card mr-2"></i>
                                    Pay Now
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
