<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Login</title>
</head>
<body>
    <section class="py-[7.69rem] bg-gradient-to-b from-sky-500 to-sky-300 flex items-center justify-center min-h-screen">
        <div class="flex items-center justify-center px-4 py-10 mx-auto rounded-2xl bg-white/50 gap-10 md:px-10">
            <img src="/img/logo-login-big-idn.svg" class="h-64 w-64 hidden md:block" alt="">
            <div class="bg-white px-6 py-4 rounded-xl w-full min-w-[50vw]">
                <img src="/img/logo-login-small-idn.svg" class="mx-auto h-16 w-16 mb-8" alt="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label class="text-gray-500" for="email">Email</label><br>
                    <input class="rounded-full border-2 border-gray-400 mt-2 mb-5 w-full focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="email" id="email" name="email" placeholder="hr@gmail.com"><br>

                    <label class="text-gray-500" for="password">Password</label><br>
                    <input class="rounded-full border-2 border-gray-400 mt-2 mb-3 w-full focus:border-sky-500 focus:ring-1 focus:ring-sky-500" type="password" id="password" name="password" placeholder="Masukan Password">

                    <a class="block text-right text-sm text-gray-400 hover:text-sky-400" href="#">Lupa Password?</a>

                    <button class="bg-sky-500 w-full text-white text-sm py-2 mt-7 font-bold rounded-full hover:bg-sky-600">MASUK</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
