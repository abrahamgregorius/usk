<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="login w-full h-screen flex flex-row">
        <div class="login-left w-full">
            <img class="object-center h-screen object-cover" src="https://images.unsplash.com/photo-1616077168639-f770d830e3d1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8YmFua3x8fHx8fDE3MDY3NTEyOTQ&ixlib=rb-4.0.3&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=1080" alt="">
        </div>
        <div class="login-right h-screen w-full flex flex-col gap-4 justify-center items-center">
            <div class="login-right-head">
                <h1 class="text-3xl font-semibold">Login</h1>
            </div>
            <div class="login-right-body">
                <form action="/login" class="flex gap-4 flex-col" method="POST">
                    @if(session('status'))
                        <div class="bg-red-600 text-white w-full p-2 rounded text-center">{{ session('status') }}</div>
                    @endif
                    @csrf
                    <div class="form-control  flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="username">
                    </div>
                    <div class="form-control  flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="bg-slate-300 outline-none px-4 py-2 rounded" autocomplete="off" id="password">
                    </div>
                    <div class="form-control">
                        <button class="w-full bg-blue-950 hover:bg-blue-900 transition text-white py-2 rounded ">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
