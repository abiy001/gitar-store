<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data pelanggan</title>
    <style>
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center ">Sign Up</h2>
        <form method="POST" enctype="multipart/form-data">
        <div>
            <label for="name"> Name:</label>
            <input type="text" id="name" name="nama" placeholder="Name...">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email addess...">
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username...">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="*">
        </div>
        <div>
            <label for="number">no hp:</label>
            <input type="number" id="number" name="no_hp" placeholder="no hp....">
        </div>
        <div>
            <label for="alamat">alamat:</label>
            <input type="text" id="alamat" name="alamat" placeholder="alamat...">
        </div>
        <div>
            <input type="checkbox" id="agree-terms" name="agree-terms">
            <label for="agree-terms">I agree to the Terms of User</label>
        </div>
        <button type="submit" name="submit">Sign Up</button>
        <a href="#">Sign in</a>
        </form>
    </div>
</body>
</html>