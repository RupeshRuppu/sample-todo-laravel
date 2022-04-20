<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login/Register</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="w-screen h-screen flex flex-col">
  <header class="text-3xl font-semibold w-screen p-3">
      Create your own TodoList
  </header>
  <section class="w-screen flex-1 flex flex-col p-10 justify-center items-center
  space-y-5 lg:flex-row">
    <div class="flex-1 flex flex-col justify-center max-w-md">
        <h1 class="text-3xl font-bold">Sign in for using TodoList</h1>
        <p>Never ever miss the task you need to do</p>
    </div>
    <form action="{{ route('auth') }}" autocomplete="off" method="POST" class="p-10 flex-1 flex flex-col bg-zinc-100 max-w-sm
    space-y-5 rounded-sm">
        @csrf
        <div>
          <input class="px-2 py-1 w-full rounded-sm border-none outline-none" type="text" name="email" placeholder="Email address">
          @error('email')
          <div class="text-red-400">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <input class="px-2 w-full py-1 rounded-sm border-none outline-none" type="password" name="password" placeholder="Password">
          @error('password')
          <div class="text-red-400">{{ $message }}</div>
          @enderror
        </div>
        @if(Session::get('error')) 
          <div class="text-red-800 text-center">
              {{ Session::get('error') }}
          </div>
        @endif
        <input type="submit" value="Login/signup" class="cursor-pointer text-center py-1 text-white rounded-sm bg-blue-500">
        <hr>
        <p class="text-sm">If you are the user you will be logged in else you will be registerd as a new user.</p>
    </form>
  </section>
  <footer class="flex-1"></footer>
</body>
</html>