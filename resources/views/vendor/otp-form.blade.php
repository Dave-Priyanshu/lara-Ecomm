<!DOCTYPE html>
<html>
<head>
    <title>Become a Vendor</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Become a Vendor</h1>
        <form action="{{ route('vendor.send-otp') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="btn-primary">Send OTP</button>
        </form>
    </div>
</body>
</html>