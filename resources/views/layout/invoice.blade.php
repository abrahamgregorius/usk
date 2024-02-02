<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SakuSiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer>
        window.print()
    </script>
</head>
<body>
    <div class="app flex w-full h-screen justify-center flex-col gap-1 items-center">
        <div class="invoice flex flex-col border border-slate-700 p-8 gap-2">
            <div class="invoice-head">
                <a href="/student/invoice/{{ $code }}">
                    <h1 class="text-3xl font-semibold">
                        {{ $code }}
                    </h1>
                </a>
                {{ $transactions[0]->created_at }}
            </div>
            <div class="w-full h-[1px] bg-black"></div>
            <div class="invoice-body">
                @foreach ($transactions as $item)
                    <p class="text-xl font-semibold">{{ $item->product->name }}</p>
                    <p>Price: ${{ $item->product->price }}</p>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
