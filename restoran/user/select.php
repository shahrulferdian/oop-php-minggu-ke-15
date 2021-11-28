<?php 

require_once "../dbcontroller.php";

$jumlahdata = $db->rowCOUNT("SELECT iduser FROM tbluser");
$bnyk = 3;

$hlm = ceil($jumlahdata / $bnyk);

if (isset($_GET['p'])) {
    $p=$_GET['p'];
    $mulai = ($p*$bnyk) - $bnyk;

}else {
    $mulai=0;
}

$sql = "SELECT * FROM tbluser ORDER BY user ASC LIMIT $mulai,$bnyk";
$row = $db->getALL($sql);
$no=1+$mulai;

?>
<div class="float-left">
    <a class="btn btn-primary" href="?f=user&m=insert" role="button">tambah data</a>
</div>

<h3>user</h3>

<table class="table table-bordered w-50">
    <thead>
        <tr>
            <th>no</th>
            <th>user</th>
            <th>email</th>
            <th>level</th>
            <th>delete</th>
            <th>status</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($row as $r): ?>
            <?php 
                if ($r['aktif']==1) {
                    $status='aktif';
                }else {
                    $status='ban';
                }
            ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['user'] ?> </td>
            <td><?php echo $r['email'] ?> </td>
            <td><?php echo $r['level'] ?> </td>
            <td><a href="?f=user&m=delete&id=<?php echo $r['iduser']?>">delete</a></td>
            <td><a href="?f=user&m=update&id=<?php echo $r['iduser']?>"><?php echo $status; ?></a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php 
    for ($i = 1 ; $i <= $hlm ; $i++) {
        echo '<a href="?f=user&m=select&p='.$i.'">'.$i.'</a>';
        echo '&nbsp &nbsp &nbsp';
    }

?>