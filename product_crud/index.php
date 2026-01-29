<?php
include 'db_config.php';

$error = "";

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $buying = $_POST['buying_price'];
    $selling = $_POST['selling_price'];
    $display = isset($_POST['display']) ? "Yes" : "No";

    // VALIDATION: Jodi kono ghor khali thake
    if (empty($name) || empty($buying) || empty($selling)) {
        $error = "Please fill up all fields!";
    } else {
        $sql = "INSERT INTO products (name, buying_price, selling_price, display) 
                VALUES ('$name', '$buying', '$selling', '$display')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: display.php");
            exit();
        }
    }
}
?>

<form method="POST">
    <fieldset style="width: 300px;">
        <legend><b>ADD PRODUCT</b></legend>
        
        <?php if($error != "") { echo "<p style='color:red;'>$error</p>"; } ?>
        
        Name<br><input type="text" name="name"><br>
        Buying Price<br><input type="number" name="buying_price"><br>
        Selling Price<br><input type="number" name="selling_price"><br>
        <hr>
        <input type="checkbox" name="display"> Display
        <hr>
        <input type="submit" name="save" value="SAVE">
    </fieldset>
</form>