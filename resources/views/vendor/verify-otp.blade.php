<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Verify OTP</h1>
        @if (session('status'))
            <p class="text-green-600">{{ session('status') }}</p>
        @endif
        <form action="{{ route('vendor.verify-otp') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="otp" class="block text-sm font-medium">Enter OTP</label>
                <input type="text" id="otp" name="otp" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('otp')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn-primary">Verify OTP</button>
        </form>
    </div>
</body>
</html>