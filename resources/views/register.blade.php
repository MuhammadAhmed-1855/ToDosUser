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
        section {
            text-align: center;
            justify-content: center;
        }
        nav {
            display: flex;
            margin: 0px 5%;
            width: 90%;
            text-align: left;
            justify-content: space-between;
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
            <form action="{{ route('register') }}" method="post" accept="UTF-8">
                {{ csrf_field() }}

                <br><br><br><br>

                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Muhammad Ahmed" required>

                <br><br><br><br>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email address" required>
                
                <br><br><br><br>

                <label fors="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
                
                <br><br><br><br>

                <label for="password_confirmation">Confirm</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password" required>

                <br><br><br><br>

                <button type="submit">Login</button>
            </form>
        </section>
    </div>    
</body>
</html>