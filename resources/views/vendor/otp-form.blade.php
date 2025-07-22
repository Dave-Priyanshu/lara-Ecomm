@php
// File path: /var/www/html/laravel/LaraEcomm/resources/views/vendor/otp-form.blade.php
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Become a Vendor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-8 max-w-lg">
        <div class="bg-white rounded-xl shadow-2xl p-8 transform transition-all duration-300 hover:shadow-xl">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2 text-center">Become a Vendor</h1>
            <p class="text-gray-600 mb-6 text-center">Enter your email to receive a verification OTP.</p>
            <form action="{{ route('vendor.send-otp') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ $user->email }}" readonly
                               class="block w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition duration-200">
                        <i class="fas fa-envelope absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex justify-between gap-4">
                    <button type="submit" class="w-full bg-orange-500 text-white px-4 py-3 rounded-lg font-medium hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 transition duration-200">
                        Send OTP
                    </button>
                    <a href="{{ route('home') }}" class="w-full bg-gray-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 text-center transition duration-200">
                        Back to Home
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>