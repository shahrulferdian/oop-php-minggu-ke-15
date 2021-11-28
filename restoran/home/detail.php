<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

}
$jumlahdata = $db->rowCOUNT("SELECT idorderdetail FROM vorderdetail WHERE idorder = $id");
$bnyk = 3;

$hlm = ceil($jumlahdata / $bnyk);

if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p*$bnyk) - $bnyk;

}else {
    $mulai=0;
}

$sql = "SELECT * FROM vorderdetail WHERE idorder = $id ORDER BY idorderdetail ASC LIMIT $mulai,$bnyk";
$row = $db->getALL($sql);
$no=1+$mulai;

?>

<h3>detail</h3>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>no</th>
            <th>tgl</th>
            <th>menu</th>
            <th>harga</th>
            <th>jumlah</th>
        </tr>
    </thead>

    <tbody>
    <?php if(!empty($row)) { ?>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['tglorder'] ?> </td>
            <td><?php echo $r['menu'] ?> </td>
            <td><?php echo $r['harga'] ?> </td>
            <td><?php echo $r['jumlah'] ?> </td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>

<?php 
    for ($i = 1 ; $i <= $hlm ; $i++) {
        echo '<a href="?f=home&m=detail&id='..'&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>