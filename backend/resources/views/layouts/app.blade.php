<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body x-data="{ open: false }">
    <header class="px-4 py-2 shadow">
        <div class="flex justify-between">
            <div class="flex items-center">
                <button data-menu class="p-4 -ml-3 focus:outline-none curson-pointer" type="button" @click="open = !open">
                    <svg class="fill-current w-5" viewBox="0 -21 384 384">
                        <path d="M362.668 0H21.332C9.578 0 0 9.578 0 21.332V64c0 11.754 9.578 21.332 21.332 21.332h341.336C374.422 85.332 384 75.754 384 64V21.332C384 9.578 374.422 0 362.668 0zm0 0M362.668 128H21.332C9.578 128 0 137.578 0 149.332V192c0 11.754 9.578 21.332 21.332 21.332h341.336c11.754 0 21.332-9.578 21.332-21.332v-42.668c0-11.754-9.578-21.332-21.332-21.332zm0 0M362.668 256H21.332C9.578 256 0 265.578 0 277.332V320c0 11.754 9.578 21.332 21.332 21.332h341.336c11.754 0 21.332-9.578 21.332-21.332v-42.668c0-11.754-9.578-21.332-21.332-21.332zm0 0" />
                    </svg>
                </button>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('media/logo.png') }}" alt="logo">
                </a>
            </div>

            <div class="flex items-center">
                @if(auth()->user()->type == 'admin')
                    <a href="{{ route('admin.messages') }}">
                        <button data-messages class="p-3 mr-2 focus:outline-none hover:bg-gray-200 hover:rounded-md" type="button">
                            <svg class="fill-current w-5" viewBox="0 0 512 512">
                                <path d="M339.392 258.624L512 367.744V144.896zM0 144.896v222.848l172.608-109.12zM480 80H32C16.032 80 3.36 91.904.96 107.232L256 275.264l255.04-168.032C508.64 91.904 495.968 80 480 80zM310.08 277.952l-45.28 29.824a15.983 15.983 0 01-8.8 2.624c-3.072 0-6.112-.864-8.8-2.624l-45.28-29.856L1.024 404.992C3.488 420.192 16.096 432 32 432h448c15.904 0 28.512-11.808 30.976-27.008L310.08 277.952z" />
                            </svg>
                        </button>
                    </a>
                @endif

                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:bg-gray-200 hover:rounded-md" type="button" x-data="{ open: false }" @click="open = true" :class="{ 'bg-gray-200 rounded-md': open }">
                    <span class="ml-4 text-sm hidden md:inline-block">Hi, {{ Auth::user()->name }}</span>
                    <svg class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>

                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 bg-white rounded border border-gray-400 shadow" x-show="open" @click.away="open = false">
                        <ul>
                            <li class="px-4 py-3 border-b hover:bg-gray-200"><a href="{{ route('profile') }}">My Profile</a></li>
                            <li class="px-4 py-3 hover:bg-gray-200"><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </button>

            </div>
        </div>
    </header>

    <div class="flex flex-row">
        <div x-cloak :class="{'-translate-x-full': !open, 'translate-x-0': open}" class="flex flex-col w-64 h-screen overflow-y-auto orange-bg border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 transform transition-transform duration-300 ease-in-out">
            <div class="sidebar text-center orange-bg">
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex flex-col items-start">
                        <p class="text-black text-sm ml-3">What's new</p>
                        <h1 class="font-bold text-black text-[15px] ml-3">{{ Auth::user()->name }}</h1>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
                @if(auth()->user()->type == 'admin')
                    <a href="{{ route('admin.dashboard') }}">
                @else
                    <a href="{{ route('user.dashboard') }}">
                @endif
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-white text-black">
                        <i class="bi bi-house-door-fill text-black"></i>
                        <span class="text-[15px] ml-4 text-black font-bold">Home</span>
                    </div>
                </a>
                @if(auth()->user()->type == 'admin')
                    <a href="{{ route('admin/articles') }}">
                @else
                    <a href="{{ route('articles') }}">
                @endif
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-white text-black">
                        <i class="bi bi-newspaper text-black"></i>
                        <span class="text-[15px] ml-4 text-black font-bold">Articles</span>
                    </div>
                </a>
                <a href="{{ route('profile') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-white text-black">
                        <i class="bi bi-person-circle text-black"></i>
                        <span class="text-[15px] ml-4 text-black font-bold">Profile</span>
                    </div>
                </a>
                <a href="{{ route('logout') }}">
                    <div class="my-4 bg-gray-600 h-[1px]"></div>
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-white text-black">
                        <i class="bi bi-box-arrow-in-right text-black"></i>
                        <span class="text-[15px] ml-4 text-black font-bold">Logout</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex flex-col w-full h-screen px-4 py-8 mt-10">
            <div>@yield('contents')</div>
        </div>
    </div>
</body>
</html>