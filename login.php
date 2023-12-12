<?php 
require 'function.php';

if( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username 
    if( mysqli_num_rows($result) === 1) {
        

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){


            header("Location: index.php");
            exit();
        } 
    }
    $error = true;
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
    <title>Login Area</title>
</head>
<body>
    <section id="login">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width:100%">
                <div class="col-md-6">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            <div class="row">
                                <form action="" method="post">
                                <div class="card-header mb-3">
                                    <strong>Login</strong>
                                </div>
                                <?php 
                                if( isset($error)) : ?>
                                <p style="color: red; font-style: italic; text-align: center; font-size: 18px;">
                                * username atau password salah!</p>
                                <?php endif;?>
                                <input 
                                    class="form-control"
                                    type="text"
                                    name="username"
                                    placeholder="Username"
                                    autofocus
                                    autocomplete="off"
                                    required
                                  >
                                <input 
                                    class="form-control mt-3"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    autofocus
                                    autocomplete="off"
                                    required
                                  >
                                
                                <button type="submit" class="btn btn-outline-primary btn-kirim mt-3" name="login">Login</button>
                                <a href="register.php" class="btn btn-outline-secondary mt-3">Register</a>
                                
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>