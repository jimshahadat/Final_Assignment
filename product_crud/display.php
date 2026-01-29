<?php
include 'db_config.php';

echo "<h2>DISPLAY</h2>";

// Khali data jeno na ashe ebong Display "Yes" thakte hobe
$sql = "SELECT * FROM products WHERE display = 'Yes' AND name != ''";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>
            <tr>
                <th>NAME</th>
                <th>PROFIT</th>
                <th colspan='2'></th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        $profit = $row['selling_price'] - $row['buying_price'];
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$profit}</td>
                <td><a href='edit.php?id={$row['id']}'>edit</a></td>
                <td><a href='delete.php?id={$row['id']}'>delete</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No valid products to display.";
}
?>