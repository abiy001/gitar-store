<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['pelanggan'])) {
    header('Location: login.php');
    exit();
}

// Get customer details from session
$user = $_SESSION['pelanggan'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <style>
        
    
       
        .profile-card {
            margin-top: 40px;
            border-radius: 15px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-card .card-header {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px;
            align-items: center;
            flex:none;
        }
        .profile-card .card-body {
            padding: 30px;
        }
        .profile-card .avatar {
            width: 120px;
            height: 120px;
            object-fit: cover;
            margin-bottom: 20px;
            
        }
        .profile-card .form-control-plaintext {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 10px;
        }
      
    </style>
</head>
<body class="font-[poppins]">
    <nav class="flex justify-between z-20 items-center bg-emerald-600 p-4 h-16 w-full text-white z-index-20 ">         
        <div class="font-semibold text-3xl pl-6">
            <h1>Helmstore.</h1>
        </div>
    </nav>
    <div class="container">
        <div class="profile-card mx-auto" style="max-width: 600px;">
            <div class="card-header items-center justify-center">
                <h2>User Profile</h2>
            </div>
            <div class="card-body ">
                <div class="mb-3">
                    <label class="form-label text-right font-semibold">Name</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['pelanggan']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label text-right font-semibold">Username</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['user']) ? htmlspecialchars($_SESSION['user']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label text-right font-semibold">No telepon</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['no_telepon']) ? htmlspecialchars($_SESSION['no_telepon']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label text-right font-semibold">Address</label>
                    <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['address']) ? htmlspecialchars($_SESSION['address']) : 'Pelanggan tidak tersedia'; ?>">
                </div>
                <div class="flex flex-col">
                    <a href="lobby.php" class="btn bg-zinc-600 text-white hover:bg-zinc-700">Back to Home</a>
                    <a href="logout.php" class="text-blue-600 text-center underline">Logout</a>
                </div>
                <!-- <a  href='profil.php?aksi=edit&id=" . $tb_user['id']. "' class='btn btn-primary btn-sm'>EDIT PROFIL</a> -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>