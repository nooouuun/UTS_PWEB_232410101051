@extends('layouts.app')
@section('content')

<div class="flex items-center justify-center min-h-[calc(100vh-4rem)] px-4">
    <div class="w-full max-w-xl bg-white rounded-xl shadow p-6 text-center">
        <h2 class="text-base font-semibold text-gray-900">Informasi Akun</h2>

        <div class="flex justify-center mt-4">
            <img src="https://bookingagentinfo.com/wp-content/uploads/2022/06/Louis-Partridge-Contact-Information.jpg"
                    alt="Avatar"
                    class="w-24 h-24 rounded-full object-cover border-2 border-gray-300">
        </div>

        <div class="mt-6 space-y-4 text-left">
            <div class="flex items-center gap-4">
                <label class="w-1/3 text-sm font-medium text-gray-900">Username</label>
                <input type="text" value="{{ $user['username'] }}" disabled
                        class="flex-1 bg-gray-100 border rounded-md px-3 py-2 text-gray-700">
            </div>

            <div class="flex items-center gap-4">
                <label class="w-1/3 text-sm font-medium text-gray-900">Nama</label>
                <input type="text" value="{{ $user['name'] }}" disabled
                        class="flex-1 bg-gray-100 border rounded-md px-3 py-2 text-gray-700">
            </div>

            <div class="flex items-center gap-4">
                <label class="w-1/3 text-sm font-medium text-gray-900">Email</label>
                <input type="email" value="{{ $user['email'] }}" disabled
                        class="flex-1 bg-gray-100 border rounded-md px-3 py-2 text-gray-700">
            </div>

            <div class="flex items-center gap-4">
                <label class="w-1/3 text-sm font-medium text-gray-900">Password</label>
                <input type="password" value="******" disabled
                        class="flex-1 bg-gray-100 border rounded-md px-3 py-2 text-gray-700">
            </div>
        </div>
    </div>
</div>
@endsection

