<?php
    include 'koneksi.php';

    session_start();
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password' ");
        if (mysqli_num_rows($login) > 0) {
            $data = mysqli_fetch_assoc($login);
            if($data['role'] == "admin") {
                $_SESSION['admin'] = $username;
                header('Location: dasbor.php');
            } elseif($data['role'] == "pelanggan") {
                $_SESSION['username'] = $data['username'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['no_telephone'] = $data['no_telephone'];
                $_SESSION['address'] = $data['address'];
                $_SESSION['id_user'] = $data['id'];
                header("Location: lobby.php");
            }
        } else {
            echo "wrong username and password";
            header("location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


</head>
<body class="h-screen">
<!-- 
    <img class="flex fixed justify-center bg-no-repeat bg-cover bg-center" src="https://img.freepik.com/free-vector/gradient-glassmorphism-background_23-2149447863.jpg" alt=""> -->
    <form class="m-72" method="POST">
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

        <div class="form-floating">
            <input type="text" class="form-control" name="username" placeholder="username">
            <label>username</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <label>Password</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me">
            <label class="form-check-label">Remember me</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit" name="login">log in</button>
        <div class="flex flex-nowrap">
            <h1>belum punya akun?</h1> 
              <a class="text-blue-400 underline-offset-1" href="register.php"><p>Sign up</p></a>    
        </div>
    </form>
</body>
</html>