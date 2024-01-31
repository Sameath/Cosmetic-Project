
<?php 
            if(isset($_GET['edit_product'])){
                $edit_id=$_GET['edit_product'];
                $get_data="Select * from `products` where product_id=$edit_id";
                $result=mysqli_query($con,$get_data);
                $row=mysqli_fetch_assoc($result);

                $product_title=$row['product_title'];
                $product_discription=$row['product_discription'];
                $product_keyword=$row['product_keyword'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                $product_image=$row['product_image'];
                $product_price=$row['product_price'];


                //fetching category name
                $select_category ="SELECT * FROM `categories` WHERE category_id=$category_id";
                $result_category=mysqli_query($con,$select_category);
                $row_category=mysqli_fetch_assoc($result_category);
                $category_title=$row_category['category_title'];
                


                //fetching brand name
                $select_brand ="SELECT * FROM `brand` WHERE brand_id=$brand_id";
                $result_brand=mysqli_query($con,$select_brand);
                $row_brand=mysqli_fetch_assoc($result_brand);
                $brand_title=$row_brand['brand_title'];
                
            }
        ?>

    <div class="container mt-5">
        <h1 class="text-center">Edit product</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline m-auto w-50 mt-4">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" require="require" value="<?php echo $product_title ?>">
            </div>

            <div class="form-outline m-auto w-50 mt-4">
                <label for="product_desc" class="form-label">Product desceiption</label>
                <input type="text" name="product_desc" id="product_desc" class="form-control" require="require" value="<?php echo $product_discription?>">
            </div>

            <div class="form-outline m-auto w-50 mt-4">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" require="require" value="<?php echo $product_keyword ?>">
            </div>

            <div class="form-outline m-auto w-50 mt-4">
            <label for="product_category" class="form-label">Product category</label>
                
                <select name="product_category" class="form-select">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                        <?php 
                            $select_category_all ="SELECT * FROM `categories`";
                            $result_category_all=mysqli_query($con,$select_category_all);
                           while( $row_category_all=mysqli_fetch_assoc($result_category_all)){
                                $category_title=$row_category_all['category_title'];
                                $category_id=$row_category_all['category_id'];
                                echo "<option value='$category_id'>$category_title</option>";
                           };
                        ?>

                </select>    
            </div>

            <div class="form-outline m-auto w-50 mt-4">
            <label for="product_brand" class="form-label">Product brand</label>
                
                <select name="product_brand" class="form-select">
                    <option value="<?php echo $brand_title ?>"> <?php echo $brand_title ?></option>
                    <?php 
                            $select_brand_all ="SELECT * FROM `brand`";
                            $result_brand_all=mysqli_query($con,$select_brand_all);
                           while( $row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                                $brand_title=$row_brand_all['brand_title'];
                                $brand_id=$row_brand_all['brand_id'];
                                echo "<option value='$brand_id'>$brand_title</option>";
                           };
                        ?>
                </select>    
            </div>

            <div class="form-outline m-auto w-50 mt-4">
                <label for="product_image" class="form-label">Product image</label>
                <div class="d-flex">
                    <input type="file" name="product_image" id="product_image" class="form-control w-90 m-auto" require="require">
                    <img src="./product_images/<?php echo $product_image ?>" alt="" width="90px" >
                </div>
            </div>

            <div class="form-outline m-auto w-50 mt-4">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" require="require" value="<?php echo $product_price ?>">
            </div>

            <div class="text-center">
                <input type="submit" value="Update product" name="edit_product" class="btn btn-info px-3 m-3">
            </div>
        </form>
    </div>

    <!-- edit product -->
    <?php
        if(isset($_POST['edit_product'])){
            $product_title=$_POST['product_title'];
            $product_desc=$_POST['product_desc'];
            $product_keyword=$_POST['product_keyword'];
            $product_category=$_POST['product_category'];
            $product_brand=$_POST['product_brand'];
            $product_image=$_FILES['product_image']['name'];
            $temp_image=$_FILES['product_image']['tmp_name'];
            $product_price=$_POST['product_price'];

            if($product_title=='' or $product_desc=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_image=='' or $product_price==''){
                echo "<script>alert('Please fill all the fields and continue the process.')</script>";
            }else{
                move_uploaded_file($temp_image,"./product_images/$product_image");
                
                //query to update products
                $update_product="UPDATE `products` SET category_id='$product_category', brand_id='$product_brand', product_title='$product_title', product_discription='$product_desc', product_keyword='$product_keyword', product_price='$product_price', product_image='$product_image', date=NOW() WHERE product_id='$edit_id'";
                $result_update=mysqli_query($con,$update_product);
                    if($result_update){
                        echo "<script>alert('Update success.')</script>";
                        echo "<script>window.open('./index.php','_self')</script>";

                    }
            }

        }
                           
    ?>
