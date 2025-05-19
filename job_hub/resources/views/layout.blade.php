<!DOCTYPE html>
<html lang="en" data-theme="corporate">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobHub Portal</title>
    <link rel="shortcut icon" href="{{ asset("/icon.svg") }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.24/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="m-0 p-0 box-border h-screen">
    <nav class="flex justify-between items-center p-2 bg-[#F2F2F2] sticky top-0 z-50">
        <div>
            <a href="/"><img src="{{ asset("/icon.svg")}}" alt="" class="size-12"></a>
        </div>
        <div class="flex items-center gap-8">
            @auth
                <h2 class="text-xl font-bold">Welcome {{ Auth::user()->username }}</h2>
                <form action="{{ route("logout") }}" method="post">
                    @csrf
                    <button class="flex items-center gap-2 btn btn-sqaure btn-warning rounded-xl" type="submit">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </i>
                        <span>Logout</span>
                    </button>
                </form>
                <button class="btn btn-square btn-primary rounded-xl w-20">
                    <a href="{{ route("create") }}">Create Listing</a>
                </button>
                <button class="btn btn-square btn-info rounded-xl w-20">
                    <a href="{{ route("manage") }}">Manage Listings</a>
                </button>
            @else
                <button class="btn btn-square p-0.5 flex">
                    <a href="{{ route("login") }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                        </svg>
                        <span>Login</span>
                    </a>
                </button>
                <button class="btn btn-square flex">
                    <a href="{{ route("signup") }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                        </svg>
                        <span>SignUp</span>
                    </a>
                </button>
            @endauth
        </div>
    </nav>
    <div>
        @yield("content")
    </div>
</body>
</html>
