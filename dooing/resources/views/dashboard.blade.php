<!DOCTYPE html>
<html lang="en" class="h-full bg-[#C8D5D7]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body class="flex flex-col min-h-screen text-xl bg-[#C8D5D7] text-white">
   
    @include('components.navbar')

    <div class="flex-1" x-data="{ menuOpen: false }">
        <main>
            <div class="bg-[#C8D5D7]">
                <div class="mx-auto max-w-6xl px-6 py-6">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Selamat datang, {{ request('username') }}!</h1>
                    <p class="text-gray-700">Berikut ringkasan to-do dan profil kamu.</p>
                </div>
            </div>

            <div class="bg-[#C8D5D7] py-10">
                <div class="mx-auto max-w-6xl px-6">
                    <div class="grid gap-6 gap-y-10 lg:grid-cols-3 lg:grid-rows-2 justify-items-center">

                        <div class="relative lg:row-span-2 min-h-[300px] w-full">
                            <div class="absolute inset-px rounded-lg bg-white lg:rounded-l-[2rem]"></div>
                            <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] lg:rounded-l-[calc(2rem+1px)]">
                                <div class="px-8 pt-6 sm:px-10 sm:pt-8">
                                    <p class="text-2xl font-semibold text-gray-950">Completed Tasks</p>
                                    <p class="mt-1 text-base text-gray-600">Daftar tugas yang telah selesai.</p>
                                </div>
                                <div class="flex-1 pl-10 pr-8 pb-6 overflow-auto">
                                    @php
                                        $completedTasks = array_filter($tasks, fn($t) => $t['completed']);
                                    @endphp
                                    @if (count($completedTasks) > 0)
                                        <ul class="mt-4 space-y-2 text-lg">
                                            @foreach($completedTasks as $task)
                                                <li class="flex justify-between items-center text-gray-800">
                                                    <span class="truncate max-w-[70%]">{{ $task['name'] }}</span>
                                                    <span class="text-sm text-gray-500 whitespace-nowrap">({{ ucfirst($task['category']) }})</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="mt-4 text-base text-gray-500">Belum ada task selesai.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 lg:rounded-l-[2rem]"></div>
                        </div>

                        <div class="relative max-lg:row-start-1 min-h-[200px] w-full">
                            <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-t-[2rem]"></div>
                            <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-t-[calc(2rem+1px)]">
                                <div class="px-8 pt-6 sm:px-10 sm:pt-8">
                                    <p class="text-2xl font-semibold text-gray-950">To Do (Personal)</p>
                                    <p class="mt-1 text-base text-gray-600">Tugas pribadi yang belum selesai.</p>
                                </div>
                                <div class="flex-1 pl-10 pr-8 pb-6 overflow-auto">
                                    @php
                                        $personalTasks = array_filter($tasks, fn($t) => $t['category'] === 'personal' && !$t['completed']);
                                    @endphp
                                    @if (count($personalTasks) > 0)
                                        <ul class="mt-4 space-y-2 text-lg">
                                            @foreach($personalTasks as $task)
                                                <li class="text-gray-800">{{ $task['name'] }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="mt-4 text-base text-gray-500">Tidak ada task personal.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-t-[2rem]"></div>
                        </div>

                        <div class="relative max-lg:row-start-3 lg:col-start-2 lg:row-start-2 min-h-[200px] w-full">
                            <div class="absolute inset-px rounded-lg bg-white"></div>
                            <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)]">
                                <div class="px-8 pt-6 sm:px-10 sm:pt-8">
                                    <p class="text-2xl font-semibold text-gray-950">To Do (Team)</p>
                                    <p class="mt-1 text-base text-gray-600">Tugas tim yang belum selesai.</p>
                                </div>
                                <div class="flex-1 pl-10 pr-8 pb-6 overflow-auto">
                                    @php
                                        $teamTasks = array_filter($tasks, fn($t) => $t['category'] === 'team' && !$t['completed']);
                                    @endphp
                                    @if (count($teamTasks) > 0)
                                        <ul class="mt-4 space-y-2 text-lg">
                                            @foreach($teamTasks as $task)
                                                <li class="text-gray-800">{{ $task['name'] }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="mt-4 text-base text-gray-500">Tidak ada task team.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5"></div>
                        </div>

                        <div class="relative lg:row-span-2 min-h-[300px] w-full">
                            <div class="absolute inset-px rounded-lg bg-white max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]"></div>
                            <div class="relative flex h-full flex-col overflow-hidden rounded-[calc(theme(borderRadius.lg)+1px)] max-lg:rounded-b-[calc(2rem+1px)] lg:rounded-r-[calc(2rem+1px)]">
                                <div class="px-8 pt-6 sm:px-10 sm:pt-8 text-center">
                                    <p class="text-2xl font-semibold text-gray-950">Profil Pengguna</p>
                                </div>
                                <div class="flex flex-col items-center justify-center flex-1 px-8 pb-10">
                                    <img src="https://bookingagentinfo.com/wp-content/uploads/2022/06/Louis-Partridge-Contact-Information.jpg"
                                         alt="Foto Profil" class="w-28 h-28 rounded-full object-cover shadow mb-4">
                                    <p class="text-xl font-bold text-gray-900">{{ $user['name'] }}</p>
                                    <p class="text-base text-gray-600">{{ $user['email'] }}</p>
                                    <p class="text-sm text-gray-500">Username: {{ $user['username'] }}</p>
                                </div>
                            </div>
                            <div class="pointer-events-none absolute inset-px rounded-lg shadow ring-1 ring-black/5 max-lg:rounded-b-[2rem] lg:rounded-r-[2rem]"></div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Footer --}}
    @include('components.footer')
</body>
</html>
