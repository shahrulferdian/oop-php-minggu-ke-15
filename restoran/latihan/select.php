<div style="margin-left: 80px;">

<h3> <a href="http://localhost/php-mysql/restoran/kategori/insert.php">tambah data</a></h3>

<?php 
require_once "../function.php";

if (isset($_GET['update'])) {
    $id = $_GET['update'];
    require_once "update.php";
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    require_once "delete.php";
}

echo '<br>';

$sql = "SELECT idkategori FROM tblkategori";
$result = mysqli_query($koneksi, $sql);

$jumlahdata = mysqli_num_rows($result);



$mulai = 0;
$bnyk = 3;

$hlm = ceil($jumlahdata / $bnyk);

for ($i = 1 ; $i <= $hlm ; $i++) {
    echo '<a href="?p='.$i.'">'.$i.'</a>';
    echo '&nbsp &nbsp &nbsp';
}
echo '<br> <br>';
if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p*$bnyk) - $bnyk;

}else {
    $mulai=0;
}

$sql = "SELECT * FROM tblkategori LIMIT $mulai, $bnyk";
$result = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($result);

echo '

<table border="1px">
    <tr>
        <th>no</th>
        <th>kategori</th>
        <th>hapus</th>
        <th>update</th>
    </tr>
';
$no = $mulai+1;
if ($jumlah > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$no++.'</td>';
        echo '<td>'.$row['kategori'].'</td>';
        echo '<td><a href="?hapus='.$row['idkategori'].'">'.'hapus'.'</a></td>';
        echo '<td><a href="?update='.$row['idkategori'].'">'.'update'.'</a></td>';
        echo '</tr>';
    }
}
echo '</table>';

?>
</div>

