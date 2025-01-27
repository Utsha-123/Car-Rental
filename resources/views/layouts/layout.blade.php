<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- for admin panel (sidebar ) -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">


</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">
            <a href="#" class="text-white flex items-center space-x-2 px-4">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-2xl font-extrabold">Dashboard</span>
            </a>

            <nav>
                <a href="{{url('/categories')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    Categories
                </a>
                <a href="{{url('/product')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    Products
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <header class="flex justify-between items-center p-4 bg-white shadow-md">
                <div class="flex items-center space-x-4">
                    <button id="sidebarToggle" class="text-gray-500 focus:outline-none md:hidden">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <i class="fa-solid fa-user"></i>
                    <h1 class="text-xl font-semibold">Welcome, User</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-200">
                        Logout
                    </button>
                </div>
            </header>

             <!-- Page Content -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-6">
            @yield('content')
            </main>
    
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
    }

    sidebarToggle.addEventListener('click', toggleSidebar);

    // Close sidebar when clicking outside of it
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickToggleButton = sidebarToggle.contains(event.target);

        if (!isClickInsideSidebar && !isClickToggleButton && !sidebar.classList.contains('-translate-x-full')) {
            toggleSidebar();
        }
    });

    // Update sidebar state on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('-translate-x-full');
        } else {
            sidebar.classList.add('-translate-x-full');
        }
    });
});


    </script>
</body>
</html>   
