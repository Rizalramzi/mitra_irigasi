<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Visitor - Mitra Irigasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-10">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Registrasi Visitor</h2>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 w-full p-2 border rounded-md">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full p-2 border rounded-md">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor WhatsApp / HP</label>
                <input type="text" name="phone_number" value="{{ old('phone_number') }}" required class="mt-1 w-full p-2 border rounded-md">
                @error('phone_number') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                <textarea name="address" required class="mt-1 w-full p-2 border rounded-md">{{ old('address') }}</textarea>
                @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tujuan Kunjungan</label>
                <select name="visitor_purpose" required class="mt-1 w-full p-2 border rounded-md">
                    <option value="Pesan barang">Pesan barang</option>
                    <option value="Konsultasi teknis">Konsultasi teknis</option>
                    <option value="Lain-lain">Lain-lain</option>
                </select>
                @error('visitor_purpose') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="mt-1 w-full p-2 border rounded-md">
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required class="mt-1 w-full p-2 border rounded-md">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md font-bold hover:bg-blue-700">
                Daftar Sekarang
            </button>
        </form>

        <p class="mt-4 text-center text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 underline">Login</a></p>
    </div>
</body>
</html>