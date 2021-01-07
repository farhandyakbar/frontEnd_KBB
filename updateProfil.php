
<?php
    include('koneksi.php');
    session_start();
    if(isset($_POST['btn_update'])){
        $username = $_POST['username']; 
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];

        $sql = "UPDATE pelanggan SET username = '$username', password = '$password', alamat = '$alamat', no_telp = '$no_telp' WHERE id ='". $_SESSION['user_id']."'";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            die;
        }
        echo("<script>alert('Berhasil Memperbarui Profil')</script>");
        echo ("<script>location.href='index.php'</script>");
    }