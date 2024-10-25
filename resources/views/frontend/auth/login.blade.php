<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link class='h-14 w-20' href="{{ asset('assets/img/SnapStore.png') }}" rel="shortcut icon" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body class="h-full bg-white">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-16 w-auto cursor-pointer" src="{{ asset('assets/img/SnapStore.png') }}" alt="Your Company">
          
        </div>
      
        <div class="mt-10 p-10 sm:mx-auto sm:w-full sm:max-w-sm shadow-lg border border-black rounded-md">
            <div>
                <h2 class=" text-center text-2xl leading-9 tracking-tight">Sign in</h2>
            </div>
          <form action="{{ route('auth.login-submit') }}" class="space-y-6" method="POST">
            @csrf
            @if(@session('error'))
            <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ session('error') }}</p> 
        @endif
            <div>
              <label for="email" class="block text-sm font-medium leading-6">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required class="block p-2 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
                @if($errors->has('email'))
            <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ $errors->first('email') }}</p> 
        @endif
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6">Password</label>
                @if($errors->has('password'))
                <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ $errors->first('password') }}</p> 
            @endif
                <div class="text-sm">
                  <a href="#" class="font-semibold text-orange-600 hover:text-orange-500">Forgot password?</a>
                </div>
              </div>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block p-2  w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-orange-600 px-3 py-1.5 text-sm font-semibold leading-6  shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 text-white focus-visible:outline-offset-2 focus-visible:outline-orange-600">Sign in</button>
            </div>

            <div class="flex items-center justify-center">
                <p class="text-[11px]">By continuing, you agree to Amazon's <a href="" class="text-blue-600 underline">  Conditions of Use </a> and <a href="" class="text-blue-600 underline"> Privacy Notice.</a></p>
            </div>
          </form>
          
        </div>

        <div class="flex text-center items-center justify-center mt-10">

            <a href="" class="text-sm text-gray-500">New to Snapstore?</a>
        </div>
        <div  class="flex text-center items-center justify-center mt-7">
            <a href="{{ route('signin.index') }}" class="text-[13px] hover:bg-gray-100 w-1/4 p-1 border-black border shadow-md rounded-md">Create Your Snapstore Account</a>
        </div>
      </div>


</body>
</html>