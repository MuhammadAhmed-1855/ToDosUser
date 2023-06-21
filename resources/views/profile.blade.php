<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/styles.css">

</head>
<body class="antialiased">
    <div class="container">
        <nav>
            <h1>Complete-It</h1>
            <ul>
                @auth
                    <li>
                        <form action="/dashboard" method="get">
                            <button type="submit">Dashboard</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                    <li>
                        <form action="/profile" method="get">
                            <button type="submit">Profile</button>
                        </form>
                    </li>
                @else
                    <li>
                        <form action="/home" method="get">
                            <button type="submit">Home</button>
                        </form>
                    </li>
                    <li>
                        <form action="/loginview" method="get">
                            <button type="submit">Login</button>
                        </form>
                    </li>
                    <li>
                        <form action="/registerview" method="get">
                            <button type="submit">Register</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>

        <section>
            <h2>Profile</h2>
            <p>Welcome, 
                <strong>
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Guest
                    @endauth
                </strong>
            </p>
        </section>
    </div>    
</body>
</html>