<?php
    include('z_part/header.php');
    // session_start();
?>
<div class="wrapper fixed__footer">
    <?php
        include('z_part/navbar.php')
    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>


    <body>
        <div class="container">
            <?php  
                $sqlSelect = "SELECT * FROM pelanggan where id ='".$_SESSION['user_id']."'";
                $resultSelect = mysqli_query($conn, $sqlSelect);
                $profil = mysqli_fetch_assoc($resultSelect);                                                    
            ?>
            <form id="updateForm" action="updateProfil.php" method="POST">
                <div class="form-group">
                    <h3>Profil Pengguna</h3>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" name="username" data-parsley-trigger="change"
                        required="" value="<?= $profil['username'] ?>">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" class="form-control" id="password" name="password" data-parsley-trigger="change"
                        required="" value="<?= $profil['password'] ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" name="alamat" id="alamat"><?= $profil['alamat'] ?></textarea>
                </div>
                <div>
                    <label>No. Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" data-parsley-trigger="change"
                        required="" value="<?= $profil['no_telp'] ?>">
                </div>
                <div class="row">
                    <div class="ml-3 mt-3">
                        <p class="text-left">
                            <button type="submit" name="btn_update" class="btn btn-space btn-primary">Update</button>
                            <button class="btn btn-space btn-secondary" data-dismiss="modal">Cancel</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
    </body>
    <?php
        include('z_part/quickview.php')
        ?>

    <?php
        include('z_part/script.php')
    ?>

    </html>