<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">
    <nav>
        <ul>
            <li><a href="/CMS/Contracts">Contracts</a></li>
            <li><a href="/CMS/Users">Users</a></li>
            <li><a href="/CMS/TechRequests">Tech-Requests</a></li>
            <li><a href="/CMS/PayRequests">Pay-Requests</a></li>
            <li><a href="/CMS/FormaRequests">Forma-Requests</a></li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button> Logout</button>
        </form>
    </nav>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Request Information</h1>
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Request ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">User Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Detail Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Request Detail</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Request State</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($requests as $request)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $request->requestID }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $request->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $request->detailName }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $request->requestdetail }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $request->requestState }}</td>
                        @if($request->requestState == 'Đã xử lý')
                        <td class="px-6 py-4 whitespace-nowrap"><button class="bg-blue-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Approved</button></td>
                        @else
                        <form action="/CMS/TechRequests/update/{{ $request->requestID }}" method="POST">
                            @csrf
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Approve</button>
                        </td>
                    </form>
                    @endif
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Nunito', sans-serif;
        font-size: 16px;
        background-color: #f8f9fa;
        color: #333;
    }

    nav {

        background-color: #1d3557;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.2);
    }

    nav ul {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        font-weight: 600;
        padding: 10px 15px;
        transition: all 0.3s ease;
        border-radius: 5px;
    }

    nav ul li a:hover {
        background-color: #457b9d;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .logout-btn {
        background-color: #e63946;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #d62828;
    }

    .page-header {
        text-align: center;
        margin: 60px 0;
        font-size: 42px;
        font-weight: bold;
        color: #1d3557;
    }
</style>