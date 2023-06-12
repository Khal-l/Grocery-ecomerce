<div class="title">Add Product</div>
<div class="content">

    <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">

            <div class="input-box">
                <span class="details">Product Name:</span>
                <input type="text" name="product_name" id="product_name" placeholder="Enter Product Name" required>
            </div>

            <div class="input-box">
                <span class="details">Product Price:</span>
                <input type="text" name="product_price" id="product_price" placeholder="Enter Product price" required>
            </div>

            <div class="input-box">
                <span class="details">Product Image:</span>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>

            <div class="input-box">
                <span class="details">Product Category:</span>
                <select name="category" id="Category" placeholder="Enter Product category" required>
                    <option value="Beverages">Beverages</option>
                    <option value="Bread">Bread</option>
                    <option value="Canned">Canned</option>
                </select>
            </div>
        </div>
        <div class="button">
            <input type="submit" name="submit" value="Add Product">
        </div>
        <?php
        if (isset($_POST['submit'])) {
            //retrieve the inputted information
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $category = $_POST['category'];
            $file = $_FILES['fileToUpload'];
            // get all the information stored in array FILES
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];
            //Split name to filename and extension
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            //allowed file extensions array
            $allowed = array('jpeg','jpg','png');

            if(in_array($fileActualExt, $allowed)){
                if($fileError===0){
                    if($fileSize<1000000){
                        $fileNameNew = implode('',explode(' ',$product_name)).".".$fileActualExt;
                        $fileDestination = './upload/'.$fileNameNew;
                        //save file to folder
                        move_uploaded_file($fileTmpName, ".".$fileDestination);
                        //now add the product to the database
                        include 'connection.php';
                        $stmt = $conn->prepare("INSERT INTO `Producttb`(`product_name`, `product_price`, `product_image`, `Category`) VALUES (?,?,?,?)");
                        $stmt->bind_param('ssss',$product_name, $product_price, $fileDestination, $category);
                        if($stmt->execute()){
                            echo "Successfully added product";
                        }else{
                            //failed to add product then echo error message and delete the uploaded image
                            echo "Failed to add product";
                            unlink($fileDestination);
                        }
                    }else{
                        echo "Your file is too large!";
                    }
                }else{
                    echo "there was an error uploading your file!";
                }
            }else{
                echo "You cannot upload files of this type!";
            }

        }

        ?>
    </form>
</div>