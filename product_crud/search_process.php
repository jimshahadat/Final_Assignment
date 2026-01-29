<?php
include 'db_config.php';
$q = $_GET['q'];
$sql = "SELECT *, (selling_price - buying_price) AS profit FROM products 
        WHERE display='Yes' AND name LIKE '%$q%'";
$result = mysqli_query($conn, $sql);

echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>
        <tr><th>NAME</th><th>PROFIT</th><th></th><th></th></tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['profit']}</td>
            <td><a href='edit.php?id={$row['id']}'>edit</a></td>
            <td><a href='delete.php?id={$row['id']}'>delete</a></td>
          </tr>";
}
echo "</table>";
?>