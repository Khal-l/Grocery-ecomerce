<div class="title">Show Products</div>
<div class="content-table">
    <table class="table">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image location</th>
            <th>Category</th>
        </tr>
        
        <?php
        include 'connection.php';
        $sql = "SELECT `id`, `product_name`, `product_price`, `product_image`, `Category` FROM `Producttb`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['product_name'] . "</td><td>" . $row['product_price'] . "</td><td>" . $row['product_image'] . "</td><td>" . $row['Category'] . "</td></tr>";
            }
        } else {
            echo " 0 results";
        }
        $conn->close();
        ?>

    </table>
</div>