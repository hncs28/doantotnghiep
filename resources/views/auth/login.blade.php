<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans bg-gradient-to-r from-blue-400 to-purple-500 min-h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md transform hover:scale-105 transition duration-300">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-8 text-center">Hi FPT xin chào!</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-6 relative">
                <label for="email" class="block text-gray-700 mb-2 font-medium">Email</label>
                <input name="email" type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 pl-10" required>
                <i class="fas fa-envelope absolute left-3 top-11 text-gray-400"></i>
            </div>
            @error('email')
            <div style="color: red" class="error">{{ $message }}</div>
        @enderror
            <div class="mb-6 relative">
                <label for="password" class="block text-gray-700 mb-2 font-medium">Password</label>
                <input name="password" type="password" id="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 transition duration-300 pl-10" required>
                <i class="fas fa-lock absolute left-3 top-11 text-gray-400"></i>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg hover:from-blue-700 hover:to-purple-700 transition duration-300 text-lg font-semibold transform hover:translate-y-[-2px]">Login</button>
        </form>
        <div class="mt-8 flex justify-center space-x-4">
            <button class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition duration-300"><i class="fab fa-facebook-f"></i></button>
            <button class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition duration-300"><i class="fab fa-google"></i></button>
            <button class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-500 transition duration-300"><i class="fab fa-twitter"></i></button>
        </div>
    </div>
</body>
</html>