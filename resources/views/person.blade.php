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
                    <a href="{{ route('getpayment') }}"
                        class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                        <i class="fas fa-chart-bar mr-2"></i>Payment
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

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-hidden overflow-y-auto">
            <h2 class="text-3xl font-bold mb-6 text-blue-900">Personal Information</h2>

            <!-- Personal Info Form -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-azure-500">
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="fullName" class="block text-sm font-medium text-blue-700">Full Name</label>

                            <div>{{ $contract->name }}</div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-blue-700">Phone</label>
                            <a>{{ $contract->userPhone }}</a>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-blue-700">Email</label>
                            <a>{{ $contract->email }}</a>
                        </div>
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-blue-700">Address</label>
                            <a>{{ $contract->userAddress }}</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-6 space-y-4">
                <form action="{{ route('change.password.form') }}" method="GET">
                    @csrf
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        Change Password
                    </button>
                </form>

            </div>
        </div>
</body>

</html>
