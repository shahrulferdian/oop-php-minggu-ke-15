<?php 

require_once "../dbcontroller.php";

$jumlahdata = $db->rowCOUNT("SELECT idkategori FROM tblkategori");
$bnyk = 3;

$hlm = ceil($jumlahdata / $bnyk);

if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p*$bnyk) - $bnyk;

}else {
    $mulai=0;
}

$sql = "SELECT * FROM tblkategori ORDER BY kategori ASC LIMIT $mulai,$bnyk";
$row = $db->getALL($sql);
$no=1+$mulai;

?>
<div class="float-left">
    <a class="btn btn-primary" href="?f=kategori&m=insert" role="button">tambah data</a>
</div>

<h3>kategori</h3>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>no</th>
            <th>kategori</th>
            <th>delete</th>
            <th>update</th>
        </tr>
    </thead>

    <tbody>
    <?php if(!empty($row)) { ?>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['kategori'] ?> </td>
            <td><a href="?f=kategori&m=delete&id=<?php echo $r['idkategori']?>">delete</a></td>
            <td><a href="?f=kategori&m=update&id=<?php echo $r['idkategori']?>">update</a></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>

<?php 
    for ($i = 1 ; $i <= $hlm ; $i++) {
        echo '<a href="?f=kategori&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>