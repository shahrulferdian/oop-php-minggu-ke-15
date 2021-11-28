<?php 
$email = $_SESSION['pelanggan'];
$jumlahdata = $db->rowCOUNT("SELECT idorder FROM vorder WHERE email = '$email'");
$bnyk = 3;

$hlm = ceil($jumlahdata / $bnyk);

if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p*$bnyk) - $bnyk;

}else {
    $mulai=0;
}

$sql = "SELECT * FROM vorder WHERE email = '$email' ORDER BY tglorder DESC LIMIT $mulai,$bnyk";
$row = $db->getALL($sql);
$no=1+$mulai;

?>

<h3>histori</h3>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>no</th>
            <th>tgl</th>
            <th>total</th>
            <th>detail</th>
        </tr>
    </thead>

    <tbody>
    <?php if(!empty($row)) { ?>
        <?php foreach($row as $r): ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['tglorder'] ?> </td>
            <td><?php echo $r['total'] ?> </td>
            <td><a href="?f=home&m=detail&id=<?php echo $r['idorder'] ?>">detail</a></td>
        </tr>
        <?php endforeach ?>
        <?php } ?>
    </tbody>
</table>

<?php 
    for ($i = 1 ; $i <= $hlm ; $i++) {
        echo '<a href="?f=home&m=histori&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>