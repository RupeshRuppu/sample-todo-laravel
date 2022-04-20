<html>
    <head>
        <title>Home Todos</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="w-screen h-screen bg-gradient-to-r from-violet-500 to-pink-300 flex flex-col">

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

        <section class="flex-1 grid place-items-center">
            <form action="/update-todo/{{$id}}" method="POST" class="w-[300px] h-[250px] bg-white shadow-lg shadow-slate-400
            flex flex-col justify-around items-center space-y-3">

                @csrf
            
                <h1 class="text-2xl">Update your todo</h1>
                <input type="text" name="todo" id="todo" class="bg-slate-200 px-5 py-2" value="{{ $content }}">
                <input class="bg-green-500 rounded-sm px-6 py-1 cursor-pointer" type="submit" value="UPDATE">
            </form>
        </section>

    </body>
</html