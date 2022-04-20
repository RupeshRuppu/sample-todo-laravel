<html>
    <head>
        <title>Home Todos</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="w-screen h-screen bg-gradient-to-r from-violet-500 to-pink-300">

        <header class="w-screen h-20 flex justify-around items-center">
            <div class="flex-1 flex justify-center items-center">
                Todo List
            </div>
            <div class="flex flex-1 justify-center items-center space-x-5 text-sm sm:text-base">
                <a href="/todos" class="bg-blue-800 px-4 py-1 text-white rounded-sm">Home</a>
                <a href="/add-todo" class="text-blue-700">Add Todos</a>
                <a href="{{ route('logout') }}" class="bg-zinc-700 opacity-90 px-4 py-1 text-white rounded-sm">Logout</a>
            </div>
        </header>

        <hr />
        <h1 class="text-center p-5 text-3xl font-bold">
            Your Todos List
        </h1>
        <section class="relative w-screen h-[560px] flex flex-col">
            <div class="relative p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 space-x-3
            h-40">
                @foreach ($todos as $todo)
                <div class="bg-slate-100 h-[200px] flex items-center justify-around space-y-4 flex-col">
                    <h1 class="text-center text-2xl">{{ $todo['todotitle'] }}</h1>
                    <div class="flex space-x-8 justify-center items-center">
                        @if ($todo['todostatus'] === 1)
                            <p class="bg-green-400 px-6 py-1 rounded-md">Is Completed</p>
                        @else
                            <p class="bg-red-400 px-6 py-1 rounded-md">Is Completed</p>
                        @endif
                        <a href="/done-status/{{$todo['id']}}" class="bg-green-400 rounded-full w-10 h-10 flex justify-center items-center cursor-pointer">
                            <i class="fa-solid fa-check text-xl"></i>
                        </a>
                        <a href="/undone-status/{{$todo['id']}}" class="bg-red-300 rounded-full w-10 h-10 flex justify-center items-center cursor-pointer">
                            <i class="fa-solid fa-circle-xmark text-xl"></i>
                        </a>
                    </div>
                    <div class="space-x-5 flex justify-center">
                        <a href="/edit-todo/{{ $todo['id'] }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="/delete-todo/{{$todo['id']}}">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </body>
</html>