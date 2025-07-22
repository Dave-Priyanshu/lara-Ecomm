@php
// File path: /var/www/html/laravel/LaraEcomm/resources/views/vendor/verify-otp.blade.php
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-8 max-w-lg">
        <div class="bg-white rounded-xl shadow-2xl p-8 transform transition-all duration-300 hover:shadow-xl">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2 text-center">Verify OTP</h1>
            <p class="text-gray-600 mb-6 text-center">Enter the 6-digit OTP sent to your email.</p>
            @if (session('status'))
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6 text-center flex items-center justify-center">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('status') }}
                </div>
            @endif
            @error('otp')
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 text-center flex items-center justify-center">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                </div>
            @enderror
            <form action="{{ route('vendor.verify-otp') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-6">
                    <label for="otp" class="block text-sm font-medium text-gray-700 mb-2">OTP Code</label>
                    <div class="relative">
                        <input type="text" id="otp" name="otp" class="block w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition duration-200" required>
                        <i class="fas fa-lock absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex justify-between gap-4">
                    <button type="submit" class="w-full bg-orange-500 text-white px-4 py-3 rounded-lg font-medium hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 transition duration-200">
                        Verify OTP
                    </button>
                    <a href="{{ route('home') }}" class="w-full bg-gray-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 text-center transition duration-200">
                        Back to Home
                    </a>
                </div>
            </form>
            <form action="{{ route('vendor.resend-otp') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-3 rounded-lg font-medium hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 transition duration-200">
                    Resend OTP
                </button>
            </form>
        </div>
    </div>
</body>
</html>