<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Link to the compiled CSS -->
     <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.main {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    padding: 20px;
    width: 300px;
}

.main h2 {
    color: #4caf50;
    margin-bottom: 20px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button[type="submit"] {
    padding: 10px;
    border-radius: 10px;
    border: none;
    background-color: #4caf50;
    color: white;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

.register-link {
    margin-top: 10px;
    text-align: center;
    font-size: 14px;
}

.error {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
}
     </style>

</head>

<body>
    <div class="main">
        <h2>Login</h2>

        @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />

            <button type="submit">Login</button>

            <div class="register-link">
                <a href="#">Forgot Password?</a>
                <p>Don't have an account? <a href="{{ route('registration') }}">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>
