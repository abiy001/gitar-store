<?php
    include "koneksi.php";

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $no_telephone = $_POST['no_telephone'];
        $address = $_POST['address'];
        $sql = mysqli_query($koneksi, "INSERT INTO user(name, username, password, no_telephone, address, role) VALUE ('$name', '$username','$password','$no_telephone', '$address', 'pelanggan')");

      if ($sql) {
        header('Location: login.php');
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<main class="form-signin w-100 m-auto">
  <form method="POST" enctype="multipart/form-data">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="name" placeholder="Password">
      <label for="name">name</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="username">
      <label for="username">username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="username">
      <label for="password">password</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="no_telephone" placeholder="no_telephone">
      <label for="no_telephone">no telephone</label>
    </div>
    <div class="form-floating">
      <input type="textarea" class="form-control" name="address" placeholder="address">
      <label for="address">address</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" name="save" type="submit">Sign in</button>
  </form>
</main>
</body>
</html>