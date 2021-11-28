<div class="float-left">
    <a class="btn btn-primary" href="?f=menu&m=insert" role="button">tambah data</a>
</div>
<h3>menu</h3>

<?php 

if (isset($_POST['opsi'])) {
    $opsi=$_POST['opsi'];

    $where = "WHERE idkategori = $opsi ";
}else {
    $opsi=0;
    $where = "";
}

?>

<div>
    <?php 
    $row=$db->getALL("SELECT * FROM tblkategori ORDER BY kategori ASC");
    ?>
<form action="" method="post">
    <select name="opsi" id="" onchange="this.form.submit()">
        <?php foreach($row as $r): ?>
        <option <?php if($r['idkategori']==$opsi) echo "selected"; ?> value="<?php echo $r['idkategori'] ?>"><?php echo $r['kategori'] ?></option>
        <?php endforeach ?>
    </select>
</form>
</div>

<?php 
$jumlahdata = $db->rowCOUNT("SELECT idmenu FROM tblmenu $where");
$bnyk = 3;

$hlm = ceil($jumlahdata / $bnyk);

if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p*$bnyk) - $bnyk;

}else {
    $mulai=0;
}

$sql = "SELECT * FROM tblmenu $where ORDER BY menu ASC LIMIT $mulai,$bnyk";
$row = $db->getALL($sql);
$no=1+$mulai;

?>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>no</th>
            <th>menu</th>
            <th>harga</th>
            <th>gambar</th>
            <th>delete</th>
            <th>update</th>
        </tr>
    </thead>

    <tbody>
        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['menu'] ?> </td>
            <td><?php echo $r['harga'] ?> </td>
            <td><img style="width: 40px;" src="../upload/<?php echo $r['gambar'] ?> "alt=""></td>
            <td><a href="?f=menu&m=delete&id=<?php echo $r['idmenu']?>">delete</a></td>
            <td><a href="?f=menu&m=update&id=<?php echo $r['idmenu']?>">update</a></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>

<?php 
    for ($i = 1 ; $i <= $hlm ; $i++) {
        echo '<a href="?f=menu&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>
