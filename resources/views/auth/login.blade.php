<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Enhanced Login Page</title>
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet"
        />
        <script
            src="https://kit.fontawesome.com/a076d05399.js"
            crossorigin="anonymous"
        ></script>
    </head>
    <body
        class="font-sans bg-gradient-to-r from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center"
    >
        <main
            class="bg-white p-12 rounded-3xl shadow-lg w-full max-w-md transition-transform transform hover:scale-105 duration-300"
        >
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">
                Welcome Back!
            </h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-6 relative">
                    <label
                        for="email"
                        class="block text-gray-700 mb-2 font-medium"
                        >Email</label
                    >
                    <input
                        name="email"
                        type="email"
                        id="email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 pl-10"
                        required
                        aria-describedby="emailError"
                    />
                    <i
                        class="fas fa-envelope absolute left-3 top-3 text-gray-400"
                    ></i>
                </div>
                @error('email')
                <div id="emailError" class="text-red-500 mb-4">
                    {{ $message }}
                </div>
                @enderror
                <div class="mb-6 relative">
                    <label
                        for="password"
                        class="block text-gray-700 mb-2 font-medium"
                        >Password</label
                    >
                    <input
                        name="password"
                        type="password"
                        id="password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 pl-10"
                        required
                        aria-describedby="passwordError"
                    />
                    <i
                        class="fas fa-lock absolute left-3 top-3 text-gray-400"
                    ></i>
                </div>
                @error('password')
                <div id="passwordError" class="text-red-500 mb-4">
                    {{ $message }}
                </div>
                @enderror
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-lg shadow-md hover:from-indigo-700 hover:to-purple-700 transition duration-300 text-lg font-semibold transform hover:translate-y-[-2px]"
                >
                    Login
                </button>
            </form>
            <div class="mt-8 flex justify-center space-x-4">
                <button
                    class="bg-blue-600 text-white p-3 rounded-full shadow-md hover:bg-blue-700 transition duration-300"
                    aria-label="Login with Facebook"
                >
                    <i class="fab fa-facebook-f"></i>
                </button>
                <button
                    class="bg-red-600 text-white p-3 rounded-full shadow-md hover:bg-red-700 transition duration-300"
                    aria-label="Login with Google"
                >
                    <i class="fab fa-google"></i>
                </button>
                <button
                    class="bg-blue-400 text-white p-3 rounded-full shadow-md hover:bg-blue-500 transition duration-300"
                    aria-label="Login with Twitter"
                >
                    <i class="fab fa-twitter"></i>
                </button>
            </div>
        </main>
    </body>
</html>