<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Contract</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Add New Contract</h1>
        <form id="contractForm" class="bg-white rounded-lg shadow-md p-6 w-full max-w-md mx-auto" action="/CMS/Contracts/store" method="POST">
            @csrf
            <div class="mb-4">
                <label for="contractID" class="block text-sm font-medium text-gray-700 mb-1">Contract ID</label>
                <input type="text" id="contractID" name="contractID" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">UserID</label>
                <input type="text" id="userID" name="userID" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label for="serviceID" class="block text-sm font-medium text-gray-700 mb-1">Service</label>
                <select id="serviceID" name="serviceID" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled>Select a service</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->serviceID }}">{{ $service->serviceName }}</option>
                    @endforeach
                </select>                
            </div>
            <div class="mb-6">
                <label for="validUntil" class="block text-sm font-medium text-gray-700 mb-1">Valid Until</label>
                <input type="date" id="validateuntil" name="validateuntil" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out">Add Contract</button>
            </div>
        </form>
    </div>
</body>
</html>