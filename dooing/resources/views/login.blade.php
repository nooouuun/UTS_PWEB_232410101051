<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <title>Login</title>
</head>
<body class="h-full text-xl">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="w-40 h-40 mx-auto" src="{{ asset('images/dooing.png') }}" alt="Logo">
            <h2 class=" text-center text-2xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            @if($errors->has('login'))
                <div class="mb-4 text-sm text-center text-red-600">
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form class="space-y-6" action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-900">Username</label>
                    <div class="mt-2">
                        <input type="text" name="username" id="username" autocomplete="username" required
                               value="{{ old('username') }}"
                               class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                               class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit"
                    class="flex w-full justify-center rounded-md bg-[#6B7C88] px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-[#4B5F6A] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#5C7481]">
                    Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
