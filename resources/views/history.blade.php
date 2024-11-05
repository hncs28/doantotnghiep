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
                <span class="text-2xl font-extrabold">Dashboard</span>
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
                        <button type="submit"
                            class="w-full text-left block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-center mb-8">Request Information</h1>
            @if($requests->isEmpty())
            <h2 class="text-xl font-semibold mb-4">Nothing</h2>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($requests as $request)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <ul class="space-y-2">
                            <li><span class="font-medium">Request ID:</span> {{ $request->requestID }}</li>
                            <li><span class="font-medium">User:</span> {{ $request->name }}</li>
                            <li><span class="font-medium">Detail :</span> {{ $request->detailName }}</li>
                            @if(empty($request->requestdetail))
                            <li><span class="font-medium">Request Detail:</span> Not Given</li>
                        @else
                            <li><span class="font-medium">Request Detail:</span> {{ $request->requestdetail }}</li>
                        @endif
                            <li><span class="font-medium">Date Created:</span> {{ $request->created_at }}</li>
                            <li><span class="font-medium">Request State:</span> {{ $request->requestState }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</body>

</html>
