<?php 
$server = "";
$user = "root";
$pass = "";
$db = "kas_kelas";

$conn = mysqli_connect($server, $user, $pass, $db);

function registrasi($data) {
    global $conn;   

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $kpassword = mysqli_real_escape_string($conn, $data["kpassword"]);


    // cek usernanme sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user 
            WHERE username = '$username'");
            
            if( mysqli_fetch_assoc($result)) {
                echo"<script>
                    alert('username sudah ada');
                </script>";

                return false;
            }



    // cek konfirmasi password
    if( $password !== $kpassword) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
             </script>";

             return false;
    } 

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?>