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

    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #1a202c;
            color: #ffffff;
        }
        ul {
            display: flex;
            padding: 0;
        }
        li {
            text-decoration: none;
            list-style: none;
            padding-left: 10%;
            padding-top: 10%
        }
        nav {
            display: flex;
            margin: 0px 5%;
            width: 90%;
            text-align: left;
            justify-content: space-between;
        }
        section {
            text-align: center;
            justify-content: center;
        }
        h1 {
            text-transform: uppercase;
        }
    </style>

</head>
<body class="antialiased">
    <div class="container">
        <nav>
            <h1>Complete-It</h1>
            <ul>
                <li>Home</li>
                <li>Login</li>
                <li>Register</li>
            </ul>
        </nav>

        <section>
            <h2>About Us</h2>
            <p>Coming Soon....</p>
        </section>
    </div>    
</body>
</html>