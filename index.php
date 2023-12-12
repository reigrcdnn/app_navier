<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Area</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }

        body {
            background-image: url('image/bg2.jpeg');
            background-position: center;
            background-size: cover;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width:100%;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white fs-4">
                        <strong>KONFIRMASI PEMBAYARAN KAS</strong>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
                            <strong>Terimakasih!</strong> Konfirmasi pembayaran kas telah berhasil.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" name="submit-to-google-sheet">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumblah" class="form-label">Jumblah</label>
                                <input type="number" class="form-control" name="jumblah" placeholder="Masukkan jumblah yang telah dibayar" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" placeholder="Masukkan tanggal pembayaran" required>
                            </div>
                            <div class="mb-3">
                                <label for="penerima" class="form-label">Penerima</label>
                                <select class="form-select" name="penerima" required>
                                    <option selected>Telah membayar ke</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Ketua kelas">Ketua kelas</option>
                                    <option value="Wakil ketua kelas">Wakil ketua kelas</option>
                                </select>
                            </div>
                            <div class="text-center">
                                    
                                <button type="submit" class="btn btn-outline-primary mt-3 btn-submit" name="submit">Submit</button>
                                        
                                <button type="button" class="btn btn-danger mt-3 d-none btn-logout" onclick="logout()">Logout</button>
                                        
                                <button class="btn btn-primary btn-loading d-none" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                    <span role="status">Loading...</span>
                                </button>
                            </div>                       
                        </form>
                    </div>
                    <div class="card-footer text-body-secondary bg-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbzdAoXByJaB0KMYvnRR0o_3TUR42Ts9rC7aTlctZfrLizxjUbD9b9H2iII-aV67-gLuIg/exec'
        const form = document.forms['submit-to-google-sheet'];
        const btnSubmit = document.querySelector('.btn-submit');
        const btnLoading = document.querySelector('.btn-loading');
        const btnLogout = document.querySelector('.btn-logout');
        const myAlert = document.querySelector('.my-alert');

        form.addEventListener('submit', e => {
            e.preventDefault()
            // ketika tombol submit diklik 
            // tampilkan tombol loading, hilangkan tombol submit
            btnLoading.classList.toggle('d-none');
            btnSubmit.classList.toggle('d-none');

            fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            .then(response => {
                // tampilkan tombol submit hilangkan tombol loading
                btnLoading.classList.toggle('d-none');
                btnSubmit.classList.toggle('d-none');
                // tampilkan alert 
                myAlert.classList.toggle('d-none');
                // tampilkan tombol logout
                btnLogout.classList.toggle('d-none');
                // reset isi form
                form.reset();
                console.log('Success!', response)})
            .catch(error => console.error('Error!', error.message))
        })


        function logout() {
            console.log("Berhasil logout");
            window.location.href = "login.php";
            history.pushState(null, null, "login.php");
        }
    </script>
  </body>
</html>