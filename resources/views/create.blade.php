<html>
    <head>
        <title>Add Todo</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="w-screen h-screen grid place-items-center">
        <form action="/create-todo" method="POST" class="w-[300px] h-[300px]
        flex flex-col space-y-4 relative">
        @csrf
            <h1 class="text-3xl text-center">Add New Todo</h1>
            <input type="text" class="px-3 py-1 rounded-sm border-2 border-black" name="todo" id="todo" class="relative w-60 left-10">
            <input type="date" class="px-3 py-1 rounded-sm border-2 border-black" name="deadline" id="todo" class="relative w-60 left-10">
            <input type="submit" value="ADD TODO" class="bg-green-500 px-8 py-1 rounded-md w-40 cursor-pointer">
        </form>
    </body>
</html>