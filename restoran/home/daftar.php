<h3>daftar pelanggan</h3>

<div class="form-group">
    <form action="" method="post">
        <div class="form-group w-50">
            <label for="">palanggan</label>
            <input type="text" name="pelanggan" required placeholder="isi pelanggan" class="form-control">
        </div>
        
        <div class="form-group w-50">
            <label for="">alamat</label>
            <input type="text" name="alamat" required placeholder="isi alamat" class="form-control">
        </div>
        
        <div class="form-group w-50">
            <label for="">telp</label>
            <input type="text" name="telp" required placeholder="isi telp" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">email</label>
            <input type="email" name="email" required placeholder="email" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">password</label>
            <input type="password" name="password" required placeholder="password" class="form-control">
        </div>
        <div class="form-group w-50">
            <label for="">konfirmasi password</label>
            <input type="password" name="konfirmasi" required placeholder="password" class="form-control">
        </div>

        <div>
            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </div>
    </form>
</div>

<?php 

if (isset($_POST['simpan'])) {
    $pelanggan = $_POST['pelanggan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password===$konfirmasi) {
        $sql = "INSERT INTO tblpelanggan VALUES ('','$pelanggan','$alamat','$telp','$email','$password',1)";
        //echo $sql;
        $db->runSQL($sql);
        header("location:?f=home&m=info");
    }else {
        echo "<h2>pass not same</h2>";
    }

    
    // 
    // 
}

?>