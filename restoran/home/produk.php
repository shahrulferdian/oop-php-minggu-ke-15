
<h3>menu</h3>


<div>
    <?php 
    
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $where = "WHERE idkategori=$id";
        $id="&id=".$id;
    }else{
        $where="";
        $id="";
    }

    ?>
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

        <?php if(!empty($row)) { ?>
        <?php foreach($row as $r): ?>
            <div class="card" style="width: 10rem; float:left; margin:10px;">
            <img style="height: 150px; width:" src="upload/<?php echo $r['gambar'] ?> " class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo $r['menu'] ?></h5>
            <p class="card-text"><?php echo $r['harga'] ?> </p>
            <a class="btn btn-primary" href="?f=home&m=beli&id=<?php echo $r['idmenu'] ?>" role="button">beli</a>
            </div>
</div>
        
        <?php endforeach ?>
        <?php } ?>

<div style="clear: both;">
<?php 
    for ($i = 1 ; $i <= $hlm ; $i++) {
        echo '<a href="?f=home&m=produk&p='.$i.$id.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }
?>
</div>
