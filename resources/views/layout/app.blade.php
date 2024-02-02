<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SakuSiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="sidebar fixed bg-blue-950 h-full w-[250px]">
        <div class="sidebar-head w-full h-[8rem] flex justify-center items-center">
            <h1 class="text-3xl text-white">SakuSiswa</h1>
        </div>
        <div class="sidebar-body flex flex-col gap-2 px-4 mt-[1rem]">
            @if(auth()->user()->role == 'admin')
                <a href="/" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == '/') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7z"/></svg>
                    Home
                </a>
                <a href="/admin/users" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'admin/users') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg>
                    Users
                </a>
                <a href="/admin/transactions" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'admin/transactions') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-1.25 0-2.125-.875T3 19v-2q0-.425.288-.712T4 16h2V2.6q0-.175.15-.238t.275.063l.725.725q.15.15.35.15t.35-.15l.8-.8Q8.8 2.2 9 2.2t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.725-.725q.125-.125.275-.063T21 2.6V19q0 1.25-.875 2.125T18 22zm12-2q.425 0 .713-.288T19 19V5H8v11h8q.425 0 .713.288T17 17v2q0 .425.288.713T18 20M10 7h4q.425 0 .713.288T15 8q0 .425-.288.713T14 9h-4q-.425 0-.712-.288T9 8q0-.425.288-.712T10 7m0 3h4q.425 0 .713.288T15 11q0 .425-.288.713T14 12h-4q-.425 0-.712-.288T9 11q0-.425.288-.712T10 10m7-1q-.425 0-.712-.288T16 8q0-.425.288-.712T17 7q.425 0 .713.288T18 8q0 .425-.288.713T17 9m0 3q-.425 0-.712-.288T16 11q0-.425.288-.712T17 10q.425 0 .713.288T18 11q0 .425-.288.713T17 12"/></svg>
                    Transactions
                </a>
            @endif
            @if(auth()->user()->role == 'shop')
                <a href="/" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == '/') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7z"/></svg>
                    Home
                </a>
                <a href="/shop/products" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'shop/products') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 8v11h14V8h-3v6.375q0 .575-.475.863t-.975.037L12 14l-2.55 1.275q-.5.25-.975-.038T8 14.376V8zm0 13q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25zM10 8v4.75l2-1l2 1V8zM5 8h14z"/></svg>
                    Products
                </a>
                <a href="/shop/transactions" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'shop/transactions') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-1.25 0-2.125-.875T3 19v-2q0-.425.288-.712T4 16h2V2.6q0-.175.15-.238t.275.063l.725.725q.15.15.35.15t.35-.15l.8-.8Q8.8 2.2 9 2.2t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.725-.725q.125-.125.275-.063T21 2.6V19q0 1.25-.875 2.125T18 22zm12-2q.425 0 .713-.288T19 19V5H8v11h8q.425 0 .713.288T17 17v2q0 .425.288.713T18 20M10 7h4q.425 0 .713.288T15 8q0 .425-.288.713T14 9h-4q-.425 0-.712-.288T9 8q0-.425.288-.712T10 7m0 3h4q.425 0 .713.288T15 11q0 .425-.288.713T14 12h-4q-.425 0-.712-.288T9 11q0-.425.288-.712T10 10m7-1q-.425 0-.712-.288T16 8q0-.425.288-.712T17 7q.425 0 .713.288T18 8q0 .425-.288.713T17 9m0 3q-.425 0-.712-.288T16 11q0-.425.288-.712T17 10q.425 0 .713.288T18 11q0 .425-.288.713T17 12"/></svg>
                    Transactions
                </a>
                @endif
                @if(auth()->user()->role == 'bank')
                    <a href="/" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == '/') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7z"/></svg>
                        Home
                    </a>
                    <a href="/bank/withdraw" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'bank/withdraw') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19.75q-2.6-.675-4.3-2.8T0 12q0-2.825 1.7-4.95T6 4.25v2.1q-1.775.6-2.887 2.15T2 12q0 1.95 1.113 3.5T6 17.65zm8 .25q-3.325 0-5.663-2.337T6 12q0-3.325 2.338-5.663T14 4q1.65 0 3.1.625t2.55 1.725l-1.4 1.4q-.825-.825-1.912-1.287T14 6q-2.5 0-4.25 1.75T8 12q0 2.5 1.75 4.25T14 18q1.25 0 2.338-.462t1.912-1.288l1.4 1.4q-1.1 1.1-2.55 1.725T14 20m6-4l-1.4-1.4l1.6-1.6H13v-2h7.2l-1.6-1.6L20 8l4 4z"/></svg>
                        Withdraw
                    </a>
                    <a href="/bank/topup" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'bank/topup') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15 16h3q.425 0 .713-.288T19 15V9q0-.425-.288-.712T18 8h-3q-.425 0-.712.288T14 9v6q0 .425.288.713T15 16m1-2v-4h1v4zm-7 2h3q.425 0 .713-.288T13 15V9q0-.425-.288-.712T12 8H9q-.425 0-.712.288T8 9v6q0 .425.288.713T9 16m1-2v-4h1v4zm-3 1V9q0-.425-.288-.712T6 8q-.425 0-.712.288T5 9v6q0 .425.288.713T6 16q.425 0 .713-.288T7 15m-5 3V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20H4q-.825 0-1.412-.587T2 18"/></svg>
                        Topup
                    </a>
                    <a href="/bank/transactions/pending" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'bank/transactions/pending') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9 3V1h6v2zm2 11h2V8h-2zm1 8q-1.85 0-3.488-.712T5.65 19.35q-1.225-1.225-1.937-2.863T3 13q0-1.85.713-3.488T5.65 6.65q1.225-1.225 2.863-1.937T12 4q1.55 0 2.975.5t2.675 1.45l1.4-1.4l1.4 1.4l-1.4 1.4Q20 8.6 20.5 10.025T21 13q0 1.85-.713 3.488T18.35 19.35q-1.225 1.225-2.863 1.938T12 22"/></svg>
                        Pending Transactions
                    </a>
                    <a href="/bank/transactions" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'bank/transactions') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-1.25 0-2.125-.875T3 19v-2q0-.425.288-.712T4 16h2V2.6q0-.175.15-.238t.275.063l.725.725q.15.15.35.15t.35-.15l.8-.8Q8.8 2.2 9 2.2t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.725-.725q.125-.125.275-.063T21 2.6V19q0 1.25-.875 2.125T18 22zm12-2q.425 0 .713-.288T19 19V5H8v11h8q.425 0 .713.288T17 17v2q0 .425.288.713T18 20M10 7h4q.425 0 .713.288T15 8q0 .425-.288.713T14 9h-4q-.425 0-.712-.288T9 8q0-.425.288-.712T10 7m0 3h4q.425 0 .713.288T15 11q0 .425-.288.713T14 12h-4q-.425 0-.712-.288T9 11q0-.425.288-.712T10 10m7-1q-.425 0-.712-.288T16 8q0-.425.288-.712T17 7q.425 0 .713.288T18 8q0 .425-.288.713T17 9m0 3q-.425 0-.712-.288T16 11q0-.425.288-.712T17 10q.425 0 .713.288T18 11q0 .425-.288.713T17 12"/></svg>
                        Transactions
                    </a>
                @endif
            @if(auth()->user()->role == 'student')
                <a href="/" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == '/') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 21V9l8-6l8 6v12h-6v-7h-4v7z"/></svg>
                    Home
                </a>
                <a href="/student/products" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'student/products') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 8v11h14V8h-3v6.375q0 .575-.475.863t-.975.037L12 14l-2.55 1.275q-.5.25-.975-.038T8 14.376V8zm0 13q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25zM10 8v4.75l2-1l2 1V8zM5 8h14z"/></svg>
                    Products
                </a>
                <a href="/student/withdraw" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'student/withdraw') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19.75q-2.6-.675-4.3-2.8T0 12q0-2.825 1.7-4.95T6 4.25v2.1q-1.775.6-2.887 2.15T2 12q0 1.95 1.113 3.5T6 17.65zm8 .25q-3.325 0-5.663-2.337T6 12q0-3.325 2.338-5.663T14 4q1.65 0 3.1.625t2.55 1.725l-1.4 1.4q-.825-.825-1.912-1.287T14 6q-2.5 0-4.25 1.75T8 12q0 2.5 1.75 4.25T14 18q1.25 0 2.338-.462t1.912-1.288l1.4 1.4q-1.1 1.1-2.55 1.725T14 20m6-4l-1.4-1.4l1.6-1.6H13v-2h7.2l-1.6-1.6L20 8l4 4z"/></svg>
                    Withdraw
                </a>
                <a href="/student/topup" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'student/topup') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15 16h3q.425 0 .713-.288T19 15V9q0-.425-.288-.712T18 8h-3q-.425 0-.712.288T14 9v6q0 .425.288.713T15 16m1-2v-4h1v4zm-7 2h3q.425 0 .713-.288T13 15V9q0-.425-.288-.712T12 8H9q-.425 0-.712.288T8 9v6q0 .425.288.713T9 16m1-2v-4h1v4zm-3 1V9q0-.425-.288-.712T6 8q-.425 0-.712.288T5 9v6q0 .425.288.713T6 16q.425 0 .713-.288T7 15m-5 3V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20H4q-.825 0-1.412-.587T2 18"/></svg>
                    Topup
                </a>
                <a href="/student/cart" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'student/cart') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 22q-.825 0-1.412-.587T5 20q0-.825.588-1.412T7 18q.825 0 1.413.588T9 20q0 .825-.587 1.413T7 22m10 0q-.825 0-1.412-.587T15 20q0-.825.588-1.412T17 18q.825 0 1.413.588T19 20q0 .825-.587 1.413T17 22M6.15 6l2.4 5h7l2.75-5zM5.2 4h14.75q.575 0 .875.513t.025 1.037l-3.55 6.4q-.275.5-.737.775T15.55 13H8.1L7 15h11q.425 0 .713.288T19 16q0 .425-.288.713T18 17H7q-1.125 0-1.7-.987t-.05-1.963L6.6 11.6L3 4H2q-.425 0-.712-.288T1 3q0-.425.288-.712T2 2h1.625q.275 0 .525.15t.375.425zm3.35 7h7z"/></svg>
                    Cart
                </a>
                <a href="/student/transactions" class="text-white px-4 py-1 rounded flex flex-row items-center gap-3 @if(Route::current()->uri() == 'student/transactions') bg-blue-900 @endif transition hover:bg-blue-800 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-1.25 0-2.125-.875T3 19v-2q0-.425.288-.712T4 16h2V2.6q0-.175.15-.238t.275.063l.725.725q.15.15.35.15t.35-.15l.8-.8Q8.8 2.2 9 2.2t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.8-.8q.15-.15.35-.15t.35.15l.8.8q.15.15.35.15t.35-.15l.725-.725q.125-.125.275-.063T21 2.6V19q0 1.25-.875 2.125T18 22zm12-2q.425 0 .713-.288T19 19V5H8v11h8q.425 0 .713.288T17 17v2q0 .425.288.713T18 20M10 7h4q.425 0 .713.288T15 8q0 .425-.288.713T14 9h-4q-.425 0-.712-.288T9 8q0-.425.288-.712T10 7m0 3h4q.425 0 .713.288T15 11q0 .425-.288.713T14 12h-4q-.425 0-.712-.288T9 11q0-.425.288-.712T10 10m7-1q-.425 0-.712-.288T16 8q0-.425.288-.712T17 7q.425 0 .713.288T18 8q0 .425-.288.713T17 9m0 3q-.425 0-.712-.288T16 11q0-.425.288-.712T17 10q.425 0 .713.288T18 11q0 .425-.288.713T17 12"/></svg>
                    Transactions
                </a>
            @endif


        </div>
        <div class="sidebar-foot fixed bottom-4 left-4">
            <form action="/logout" method="POST">
                @csrf
                <button class="text-white px-4 py-2 bg-blue-900 transition hover:bg-blue-800 rounded">Logout</button>
            </form>
        </div>
    </div>
    <div class="content ml-[250px] p-8">
        @yield('content')
    </div>
</body>
</html>
