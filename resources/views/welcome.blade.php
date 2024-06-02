<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lost & Found</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

 
    <style>
        body {
            font-family: 'figtree', sans-serif;
            /* background-image: url('background.png'); */
             background-color: #62b1c9; 
            background-size: cover;
            background-position: center;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3182ce;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #2c5282;
        }

        .btn-secondary {
            background-color: #f56565;
        }

        .btn-secondary:hover {
            background-color: #e53e3e;
        }
    </style>
</head>
<body>
<div class="flex justify-center items-center">
    @if (Route::has('login'))
        <div class="fixed top-0 right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/home') }}" class="btn">Home</a>
            @else
                <a href="{{ route('login') }}" class="btn">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="text-center text-4xl font-bold">
        <h1>Lost & Found</h1>
        <p class="text-xl mt-4">Find what you've lost, recover what you've found</p>
    </div>
</div>
</body>
</html>
