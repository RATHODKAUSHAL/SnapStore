<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link class='h-14 w-20' href="{{ asset('assets/img/SnapStore.png') }}" rel="shortcut icon" />
    @vite('resources/css/app.css')
    <title>Snapstore</title>
</head>

<body class="bg-gray-200">
    
    <!-- Navbar -->
   
    <nav class="bg-gray-800 h-14 flex items-center justify-between px-6 shadow-lg">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center">
            <img class='h-10 w-14' src="{{ asset('assets/img/SnapStore.png') }}" alt="SnapStore" />
        </a>
        <div class="flex space-x-6 text-white">
            <a href="#" class="hover:text-gray-300 flex items-center">
                <i class="fas fa-user mr-2"></i> Profile
            </a>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <nav class="bg-gray-800 text-gray-300 text-sm border-r w-48 min-h-screen p-5 shadow-lg">
            <ul class="space-y-4">
                {{-- <!-- Dashboard --> --}}
                <li>
                    <a href="#" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-cube mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Users -->
                <li>
                    <a href="{{ route('users.index') }}" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-user mr-3"></i>
                        <span>Users</span>
                    </a>
                </li>

                <!-- Category -->
                <li>
                    <a href="{{ route('category.index') }}" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-tags mr-3"></i>
                        <span>Category</span>
                    </a>
                </li>

                <!-- Company -->
                <li>
                    <a href="#" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-building mr-3"></i>
                        <span>Company</span>
                    </a>
                </li>

                <!-- Product -->
                <li>
                    <a href="{{ route('product.index') }}" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-box mr-3"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('order.index') }}" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-box mr-3"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('heading.index') }}" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-box mr-3"></i>
                        <span>Heading</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('card.index') }}" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-box mr-3"></i>
                        <span>Card</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('seller.index') }}" class="flex items-center hover:text-white p-2 rounded">
                        <i class="fa-solid fa-user mr-3"></i>
                        <span>Seller</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            @yield('main')
        </main>
    </div>
    @yield('page-script')
</body>

</html>
