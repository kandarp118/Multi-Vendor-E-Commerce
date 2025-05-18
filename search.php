<?php
include('connection.php');
if (isset($_POST['search'])) 
{
$n=$_POST['search'];
$sq="SELECT p_id,p_name FROM product WHERE p_name LIKE '%$n%'";
$sqr=mysqli_query($c,$sq);
while ($fr = MySQLi_fetch_array($sqr)) {
?>
<!-- <form action="detail.php" method="post" class="dropdown-item text-center text-truncate" style="max-width: 420px;">
    <input type="hidden" name="p_id" value="<?= $fp[''] ?>">
    <button type="submit" class="btn rounded-5">
    <?= $fr['p_name'] ?>
    </button>
</form> -->
<a class="dropdown-item text-center text-truncate" style="max-width: 420px;" href="detail.php?p_id=<?= $fr['p_id'] ?>"><?= $fr['p_name'] ?></a>
<?php
}}
?>