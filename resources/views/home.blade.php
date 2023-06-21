<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    
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
            </ul>
        </nav>

        <section>
            <h2>Home</h2>
            <p>Coming Soon....</p>
        </section>
    </div>    
</body>
</html>