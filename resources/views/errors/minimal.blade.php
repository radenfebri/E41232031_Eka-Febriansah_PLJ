<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>
    
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="{{ asset('error') }}/style.css" />
    
</head>

<body>
    
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>@yield('code')</h1>
            </div>
            <h2>@yield('title')</h2>
            <p>@yield('message')</p>
                @if (Auth::check())
                    <a href="{{ route('login') }}">Kembali ke Login</a>
                @else
                    <a href="{{ route('dashboard') }}">Kembali ke Dashbord</a>
                @endif
            </div>
        </div>
        
    </body>
    
    </html>