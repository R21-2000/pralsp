<?php
session_start();

// Gantilah dengan koneksi database Anda
$conn = mysqli_connect("localhost", "root", "", "kasir");

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Pastikan tabel yang digunakan sesuai dengan nama tabel sebenarnya
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['idUser'] = $row['idUser']; // Simpan idUser ke dalam sesi jika diperlukan
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $row['level'];

        // Sesuaikan dengan nama file dashboard yang sebenarnya
        header('Location: dashboard.php');
        exit();
    } else {
        $message = '<label>Wrong Username or Password</label>';
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Additional styles for customization -->
    <style>
        body {
            background-image: url(img/loginn.jpg);
            background-size: fill;
            background-position: center;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: baseline;
            justify-content: center;
        }

        .card {
            border-radius: 40% 20%;
        }
        .btn-primary:hover {
             background-color: #037DFF;
        }
    </style>
</head>

<body>

    <div class="container">
        <section class="container-fluid mb-4">
            <section class="row justify-content-left">
                <section class="col-12 col-sm-6 col-md-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0" style="background-color:#B0B0B0">
                            <div class="p-4">

                            <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Otsu</h1>
                                </div>
                                <form class="user" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" placeholder="Username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary hover">Masuk</button>
                                    <!-- <label>
                                        <input type="checkbox" checked="checked" name="remember"> Remember me
                                    </label> -->
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="#">Forgot Password?</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
    </div>

</body>

</html>