<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans bg-gradient-to-br from-blue-400 via-indigo-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 md:p-10 rounded-3xl shadow-2xl w-full max-w-lg transform hover:scale-105 transition duration-300">
        <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-8 text-center">Join Us Today</h1>
        <form class="space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="relative">
                <label for="name" class="block text-gray-700 mb-2 font-medium">Full Name</label>
                <input name="name" type="text" id="name" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 pl-10" required>
                <i class="fas fa-user absolute left-3 top-11 text-gray-400"></i>
            </div>
            <div class="relative">
                <label for="email" class="block text-gray-700 mb-2 font-medium">Email</label>
                <input name="email" type="email" id="email" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 pl-10" required>
                <i class="fas fa-envelope absolute left-3 top-11 text-gray-400"></i>
            </div>
            <div class="relative">
                <label for="phone" class="block text-gray-700 mb-2 font-medium">Phone</label>
                <input name="userPhone" type="tel" id="phone" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 pl-10" required>
                <i class="fas fa-phone absolute left-3 top-11 text-gray-400"></i>
            </div>
            <div class="relative">
                <label for="address" class="block text-gray-700 mb-2 font-medium">Address</label>
                <textarea id="address" name="address" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 pl-10" rows="3" required></textarea>
                <i class="fas fa-home absolute left-3 top-11 text-gray-400"></i>
            </div>
            <div class="relative">
                <label for="password" class="block text-gray-700 mb-2 font-medium">Password</label>
                <input name="password" type="password" id="password" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 pl-10" required>
                <i class="fas fa-lock absolute left-3 top-11 text-gray-400"></i>
            </div>
            <div class="relative">
                <label for="confirm-password" class="block text-gray-700 mb-2 font-medium">Confirm Password</label>
                <input type="password" id="confirm-password" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 pl-10" required>
                <i class="fas fa-lock absolute left-3 top-11 text-gray-400"></i>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 rounded-lg hover:from-blue-700 hover:to-purple-700 transition duration-300 text-lg font-semibold transform hover:translate-y-[-2px] shadow-lg">Create Account</button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">By registering, you agree to our <a href="#" class="text-blue-600 hover:text-blue-800 transition duration-300 underline">Terms</a> and <a href="#" class="text-blue-600 hover:text-blue-800 transition duration-300 underline">Privacy Policy</a></p>
        </div>
        <div class="mt-8 text-center">
            <p class="text-gray-600">Already have an account? <a href="#" class="text-purple-600 font-semibold hover:text-purple-800 transition duration-300 underline">Log in</a></p>
        </div>
        <div class="mt-8 flex justify-center space-x-4">
            <button class="bg-blue-500 text-white p-3 rounded-full hover:bg-blue-600 transition duration-300 shadow-md"><i class="fab fa-facebook-f"></i></button>
            <button class="bg-red-500 text-white p-3 rounded-full hover:bg-red-600 transition duration-300 shadow-md"><i class="fab fa-google"></i></button>
            <button class="bg-black text-white p-3 rounded-full hover:bg-gray-800 transition duration-300 shadow-md"><i class="fab fa-apple"></i></button>
        </div>
    </div>
</body>
</html>