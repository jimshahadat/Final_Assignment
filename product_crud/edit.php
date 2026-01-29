<?php
include 'db_config.php';
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));

if (isset($_POST['update'])) {
    $display = isset($_POST['display']) ? "Yes" : "No";
    $sql = "UPDATE products SET name='{$_POST['name']}', buying_price='{$_POST['buying_price']}', 
            selling_price='{$_POST['selling_price']}', display='$display' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: display.php");
}
?>
<form method="POST">
    <fieldset style="width: 300px;">
        <legend><b>EDIT PRODUCT</b></legend>
        Name<br><input type="text" name="name" value="<?=$row['name']?>"><br>
        Buying Price<br><input type="number" name="buying_price" value="<?=$row['buying_price']?>"><br>
        Selling Price<br><input type="number" name="selling_price" value="<?=$row['selling_price']?>"><br>
        <hr>
        <input type="checkbox" name="display" <?=($row['display']=='Yes')?'checked':''?>> Display
        <hr>
        <input type="submit" name="update" value="SAVE">
    </fieldset>
</form>