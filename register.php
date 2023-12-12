<?php 

require 'function.php';

// jika registrasi berhasil maka akan dialihkan ke form login
if( isset($_POST["register"])) {
    if( registrasi($_POST) > 0 ) {
        echo "
            <script>
                alert('user baru berhasil ditambahkan!');
                window.location.href = 'login.php';
            </script>;
        ";
    } else {
        echo mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;
        }

        body {
            background-image: url('image/bg1.jpeg');
            background-position: center;
            background-size: cover;
        }
    </style>
    <title>Register Area</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width:100%">
            <div class="col-md-6">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="row">
                            <form action="" method="post">
                                <div class="card-header mb-3">
                                    <strong>Registrasi</strong>
                                </div>

                                <input type="text" class="form-control" name="username" placeholder="Username" autofocus autocomplete="off" required>
                                <input type="password" class="form-control mt-3" name="password" placeholder="Password" autofocus autocomplete="off" required>
                                <input type="password" class="form-control mt-3" name="kpassword" placeholder="Konfirmasi password" autofocus autocomplete="off" required>

                                <button type="submit" class="btn btn-outline-primary btn-kirim mt-3" name="register">Kirim</button>
                                <a href="login.php" class="btn btn-outline-secondary mt-3">Login</a>

                                <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                                  <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                  <span role="status">Loading...</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>