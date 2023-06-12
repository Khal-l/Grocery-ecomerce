<?php
error_reporting(0);
include 'connection.php';
echo '<table class="table"<tr><th>ID</th><th>Name</th><th>Price</th><th>Image location</th><th>Category</th></tr>';

$id = $_POST['product_id'];
$sql = "SELECT `id`, `product_name`, `product_price`, `product_image`, `Category` FROM `Producttb` WHERE `id`=" . $id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['product_name'] . "</td><td>" . $row['product_price'] . "</td><td>" . $row['product_image'] . "</td><td>" . $row['Category'] . "</td></tr>";
        $image = $row['product_image'];
    }
    $sql = "DELETE FROM `Producttb` WHERE `Producttb`.`id` =" . $id;
    if (!$conn->query($sql)) {
        echo "Product does not exist";
    } else {
        echo "<span class='details' style='color:red;'>Product deleted successfully</span>";

        if (unlink(".".$image)) {
            echo "<span class='details' style='color:red;'>Product image deleted successfully</span>";
        }else{
            echo "<span class='details' style='color:red;'>Image Doesn't Exist</span>";
        }
    }
}
$conn->close();
?>
</table>