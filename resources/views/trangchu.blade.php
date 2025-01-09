<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ThreeFPTT - Internet and More</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {

            font-family: 'Roboto', sans-serif;

        }
    </style>
</head>

<body class="bg-blue-900 text-white ">
    <div class="banner">
        <nav class="flex justify-between items-center p-6">
            <div class="text-2xl font-bold">ThreeFPTT</div>
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-gray-300 font-bold">Trang chủ</a></li>
                <li>
                    <a href="#" class="hover:text-gray-300 font-bold" onclick="scrollToDiv()">Giới thiệu</a>
                </li>
                <li><a href="/login" class="hover:text-gray-300 font-bold">Đăng nhập</a></li>

            </ul>
        </nav>

        <div class="banner h-screen flex items-center justify-start">

            <div class="container mx-auto w-[800px] ">
                <div class="row flex flex-col space-y-10 w-[600px] p-8">


                    <div class="col-md-6 col-xs-12 flex flex-col justify-start space-y-6">
                        <div class="content-banner">

                            <h1 class="text-6xl font-bold leading-tight">
                                <div>Internet 123</div>
                                <div class="d-flex">
                                    <span class="text-6xl">và hơn thế</span>
                                </div>
                            </h1>
                            <!-- Description for Desktop -->
                            <div class="description hidden md:block text-xl leading-relaxed">
                                <!-- Increased font size -->
                                ThreeFPTT là Ứng dụng được phát triển bởi 123Telecom, cung cấp những tính năng phục vụ
                                khách hàng trong việc
                                quản lý toàn trình các dịch vụ Internet.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Row (Download Section) -->
                <div class="col-md-6 col-xs-12 flex space-y-6 md:space-y-0 md:space-x-4">
                    <!-- QR Code -->
                    <div class="qr-code">
                        <img src="https://hi-static.fpt.vn/sys/hifpt/pnc_pdx/landingpage-hifpt-v7.5/qr-code.png"
                            alt="QR code" class="w-24">
                    </div>

                    <!-- Button Wrapper -->
                    <div class="button-wrapper flex flex-col space-y-4">
                        <!-- App Store Button -->
                        <a href="https://apps.apple.com/vn/app/hi-fpt/id1144417173?l=vi" target="_blank"
                            class="button-download">
                            <img src="https://hi-static.fpt.vn/sys/hifpt/pnc_pdx/landingpage-hifpt-v7.5/appstore.png"
                                alt="App Store" class="w-36">
                        </a>
                        <!-- Google Play Button -->
                        <a href="https://play.google.com/store/apps/details?id=com.rad.hifpt" target="_blank"
                            class="button-download">
                            <img src="https://hi-static.fpt.vn/sys/hifpt/pnc_pdx/landingpage-hifpt-v7.5/google-play.png"
                                alt="Google Play" class="w-36">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="soluong" id="soluong">
        <div class="container mx-auto px-4 py-10">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-gray-700">Số người cài đặt ứng dụng ThreeFPTT</h1>
            </div>

            <!-- Counter Section -->
            <div class="flex justify-center space-x-2 my-8">
                <div class="bg-black text-white p-4 text-4xl font-bold rounded-lg shadow-lg">9</div>
                <div class="dot"></div>
                <div class="bg-black text-white p-4 text-4xl font-bold rounded-lg shadow-lg">5</div>
                <div class="bg-black text-white p-4 text-4xl font-bold rounded-lg shadow-lg">6</div>
                <div class="bg-black text-white p-4 text-4xl font-bold rounded-lg shadow-lg">7</div>
                <div class="dot"></div>
                <div class="bg-black text-white p-4 text-4xl font-bold rounded-lg shadow-lg">0</div>
                <div class="bg-black text-white p-4 text-4xl font-bold rounded-lg shadow-lg">7</div>
                <div class="bg-black text-white p-4 text-4xl font-bold rounded-lg shadow-lg">9</div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl font-bold text-blue-600">9 TRIỆU +</div>
                    <div class="mt-2 text-gray-600">Lượt tải xuống ứng dụng</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl font-bold text-blue-600">1.3 TRIỆU +</div>
                    <div class="mt-2 text-gray-600">Người dùng truy cập hàng tháng</div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl font-bold text-blue-600">7 TRIỆU +</div>
                    <div class="mt-2 text-gray-600">Lượt tương tác trên ứng dụng mỗi tháng</div>
                </div>
            </div>
        </div>

        <body class="bg-gray-100">
            <div class="container mx-auto px-4 py-10">
                <!-- Header Title -->
                <div class="text-center mb-8">
                    <h2 class="text-5xl font-bold text-blue-600">5 siêu tiện lợi</h2>
                    <p class="text-2xl text-gray-600">khi sử dụng ThreeFPTT</p>
                </div>

                <!-- Benefits Section -->
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4 text-center">
                    <!-- Benefit Item 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-center mb-4">
                            <img src="/storage/settings.png" alt="Icon 1" class="w-12 h-12">
                        </div>
                        <div class="text-lg font-bold text-gray-800">Bảo trì siêu tốc</div>
                    </div>

                    <!-- Benefit Item 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-center mb-4">
                            <img src="/storage/transfer.png" alt="Icon 2" class="w-12 h-12">
                        </div>
                        <div class="text-lg font-bold text-gray-800">Giao dịch siêu tiện</div>
                    </div>

                    <!-- Benefit Item 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-center mb-4">
                            <img src="/storage/credit-card.png" alt="Icon 3" class="w-12 h-12">
                        </div>
                        <div class="text-lg font-bold text-gray-800">Thanh toán siêu nhanh</div>
                    </div>

                    <!-- Benefit Item 4 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-center mb-4">
                            <img src="/storage/letter-f.png" alt="Icon 4" class="w-12 h-12">
                        </div>
                        <div class="text-lg font-bold text-gray-800">Tích G-Gold siêu khủng</div>
                    </div>

                    <!-- Benefit Item 5 -->
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="flex justify-center mb-4">
                            <img src="/storage/giftbox.png" alt="Icon 5" class="w-12 h-12">
                        </div>
                        <div class="text-lg font-bold text-gray-800">Đổi quà siêu gọn</div>
                    </div>
                </div>
            </div>
    </div>

    </div>
    </div>
    </div>
    </div>
</body>
<footer class="bg-white text-gray-600 body-font">
    <div class="container mx-auto py-8 flex flex-wrap md:flex-nowrap">
        <!-- VE NOMAD INC Column -->
        <div class="w-full md:w-1/3 flex flex-col items-start">
            <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">VỀ CHÚNG TÔI</h2>
            <p class="text-sm">CÔNG TY ABCX</p>
            <p class="text-sm">Website: <a href="#" class="text-blue-500">www.ABC.com</a></p>
            <p class="text-sm">Phone: +1 (234) 567 8910</p>
        </div>
        <!-- Links Column -->
        <div class="w-full md:w-1/3 flex flex-col items-start mt-4 md:mt-0">
            <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">Links</h2>
            <nav class="list-none mb-10">
                <li><a href="#" class="text-gray-600 hover:text-gray-800">One page landing</a></li>
                <li><a href="#" class="text-gray-600 hover:text-gray-800">Email</a></li>
                <li><a href="#" class="text-gray-600 hover:text-gray-800">Help desk</a></li>
            </nav>
        </div>
        <!-- COPYRIGHT NOTICE TONIGHT Column -->
        <div class="w-full md:w-1/3 flex flex-col items-start mt-4 md:mt-0">
            <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">COPYRIGHT NOTICE TONIGHT</h2>
            <p class="text-sm">© 2024 VE NOMAD INC. All rights reserved.</p>
            <div class="flex space-x-3 mt-2">
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-gray-600 hover:text-gray-800"><i class="fab fa-google-plus-g"></i></a>
            </div>
        </div>
    </div>
</footer>

</html>
<style>
    .banner {
        background-image: url("/storage/c.png");
        background-size: 100%
    }

    .soluong {
        background-color: azure;
    }

    .nangcap {
        background-color: rgb(194, 192, 192);
    }
</style>
<script>
    function scrollToDiv() {
        const element = document.getElementById("soluong");
        if (element) {
            element.scrollIntoView({
                behavior: "smooth"
            });
        }
    }
</script>
