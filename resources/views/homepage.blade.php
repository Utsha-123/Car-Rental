<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <!-- Header Section -->
    <header class="relative bg-gray-800 py-10">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-4xl font-bold text-orange-500">Rentic</h1>
            <nav class="flex gap-6">
                <a href="#" class="text-gray-300 hover:text-white">Home</a>
                <a href="#" class="text-gray-300 hover:text-white">About</a>
                <a href="#" class="text-gray-300 hover:text-white">Cars</a>
                <a href="#" class="text-gray-300 hover:text-white">Blog</a>
                <a href="#" class="text-gray-300 hover:text-white">Contact</a>
            </nav>
            <button class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600">Sign In</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative text-center py-20 bg-gray-900">
        <div class="container mx-auto">
            <h2 class="text-6xl font-bold text-orange-500">Rent a car <br> and enjoy the trip</h2>
            <p class="text-gray-400 mt-4">Enjoy the ultimate driving experience. Choose from our wide selection of vehicles.</p>
        </div>
    </section>

    <!-- Recent Cars Section -->
    <section class="py-20 bg-gray-800">
        <div class="container mx-auto">
            <h3 class="text-4xl font-bold text-orange-500 mb-10">Recent Cars</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="bg-gray-700 p-6 rounded">
                    <img src="car1.jpg" alt="Car 1" class="rounded mb-4">
                    <h4 class="text-xl font-bold">BMW M340i</h4>
                    <p class="text-gray-400">Luxury Sedan</p>
                    <button class="mt-4 bg-orange-500 px-4 py-2 rounded hover:bg-orange-600">View Details</button>
                </div>
                <div class="bg-gray-700 p-6 rounded">
                    <img src="car2.jpg" alt="Car 2" class="rounded mb-4">
                    <h4 class="text-xl font-bold">Ford Mustang</h4>
                    <p class="text-gray-400">Classic Muscle</p>
                    <button class="mt-4 bg-orange-500 px-4 py-2 rounded hover:bg-orange-600">View Details</button>
                </div>
                <div class="bg-gray-700 p-6 rounded">
                    <img src="car3.jpg" alt="Car 3" class="rounded mb-4">
                    <h4 class="text-xl font-bold">Chevrolet Camaro</h4>
                    <p class="text-gray-400">Modern Muscle</p>
                    <button class="mt-4 bg-orange-500 px-4 py-2 rounded hover:bg-orange-600">View Details</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto">
            <h3 class="text-4xl font-bold text-orange-500 mb-10">What Clients Say</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-700 p-6 rounded">
                    <p class="text-gray-400 italic">"Rented a car last week and had the best experience! Highly recommend Rentic."</p>
                    <h4 class="text-xl font-bold mt-4">- Jane Doe</h4>
                </div>
                <div class="bg-gray-700 p-6 rounded">
                    <p class="text-gray-400 italic">"Great service and amazing car selection. Will rent again!"</p>
                    <h4 class="text-xl font-bold mt-4">- John Smith</h4>
                </div>
                <div class="bg-gray-700 p-6 rounded">
                    <p class="text-gray-400 italic">"Affordable and reliable cars. The process was so smooth!"</p>
                    <h4 class="text-xl font-bold mt-4">- Alex Johnson</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-800 py-10">
        <div class="container mx-auto flex justify-between">
            <div>
                <h4 class="text-2xl font-bold">Rentic</h4>
                <p class="text-gray-400">&copy; 2025 Rentic. All Rights Reserved.</p>
            </div>
            <div class="flex gap-4">
                <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>
