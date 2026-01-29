<?php
include 'db_config.php';
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));

if (isset($_POST['delete'])) {
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: display.php");
}
?>
<fieldset style="width: 300px;">
    <legend><b>DELETE PRODUCT</b></legend>
    Name: <?=$row['name']?><br>
    Buying Price: <?=$row['buying_price']?><br>
    Selling Price: <?=$row['selling_price']?><br>
    Displayable: <?=$row['display']?><br>
    <hr>
    <form method="POST"><input type="submit" name="delete" value="Delete"></form>
</fieldset>