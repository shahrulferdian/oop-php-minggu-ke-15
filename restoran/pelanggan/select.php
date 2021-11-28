<?php 

require_once "../dbcontroller.php";

$jumlahdata = $db->rowCOUNT("SELECT idpelanggan FROM tblpelanggan");
$bnyk = 3;

$hlm = ceil($jumlahdata / $bnyk);

if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p*$bnyk) - $bnyk;

}else {
    $mulai=0;
}

$sql = "SELECT * FROM tblpelanggan ORDER BY pelanggan ASC LIMIT $mulai,$bnyk";
$row = $db->getALL($sql);
$no=1+$mulai;

?>

<h3>pelanggan</h3>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>no</th>
            <th>pelanggan</th>
            <th>alamat</th>
            <th>telp</th>
            <th>email</th>
            <th>delete</th>
            <th>status</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($row as $r): ?>
        <tr>
            <?php 
            
                if ($r['aktif']==1) {
                    $status = 'aktif';
                }else {
                    $status = 'tidak aktif';        
                }
            
            ?>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['pelanggan'] ?> </td>
            <td><?php echo $r['alamat'] ?> </td>
            <td><?php echo $r['telp'] ?> </td>
            <td><?php echo $r['email'] ?> </td>
            <td><a href="?f=pelanggan&m=delete&id=<?php echo $r['idpelanggan']?>">delete</a></td>
            <td><a href="?f=pelanggan&m=update&id=<?php echo $r['idpelanggan']?>"><?php echo $status ?></a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php 
    for ($i = 1 ; $i <= $hlm ; $i++) {
        echo '<a href="?f=pelanggan&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>