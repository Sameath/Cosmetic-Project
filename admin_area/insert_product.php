<!-- connect file -->
<?php 
    include('../includes/connect.php');

    if(isset($_POST['insert_product'])){

        $product_title=$_POST['product_title'];

        $product_description=$_POST['product_description'];

        $product_keywords=$_POST['product_keywords'];

        $product_category=$_POST['product_category'];

        $product_brand=$_POST['product_brands'];

        $product_price=$_POST['product_price'];

        $product_status="true";

        //accessing image
        $product_image=$_FILES['product_image']['name'];
        //accessing tmp name
        $temp_image=$_FILES['product_image']['tmp_name'];

        //checking empty condition
        if($product_title=='' or $product_description=='' 
            or $product_keywords=='' or $product_category=='' 
            or $product_brand=='' or $product_price=='' or $product_image==''){
                
                echo "<script>alert('Please fill all the field.')</script>";
                exit();

        }else{

            //move image that user input into folder
            move_uploaded_file($temp_image,"./product_images/$product_image");

            //insert query
            $insert_products="Insert into `products` (product_title, product_discription, product_keyword, category_id, brand_id, product_image, product_price, date, status) 
                            values ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$product_image', '$product_price', NOW(), '$product_status')";

            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo "<script>alert('Product inserted.')</script>";
            }
        }

        



    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- font awsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <!-- Bootstrap js link -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Insert Product-Admin Dashboard</title>
</head>
<body class="bg-light">
    <div class="container">
        <h1 class="text-center mt-3">Insert Products</h1>

        <!-- form -->
        <form action="" method="post" class="text-center" enctype="multipart/form-data">
                
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" require>
                </div>


                <!-- description-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" require>
                </div>


                <!-- keyword-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" require>
                </div>


                <!-- select category-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_category" id="" class="form-select">
                        <option value="">Select Category</option>

                            <?php 
                                $select_query="select * from `categories`";
                                $result_query=mysqli_query($con,$select_query);
                                while ($row = mysqli_fetch_assoc($result_query)) {
                                    $cat_title=$row['category_title'];
                                    $cat_id=$row['category_id'];

                                    echo "
                                        <option value='$cat_id'>$cat_title</option>
                                    ";

                                }
                            ?>

                    </select>
                </div>


                <!-- select brand-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brands" id="" class="form-select">
                        <option value="">Select Brand</option>

                        <?php 
                                $select_query="select * from `brand`";
                                $result_query=mysqli_query($con,$select_query);
                                while ($row = mysqli_fetch_assoc($result_query)) {
                                    $brand_title=$row['brand_title'];
                                    $brand_id=$row['brand_id'];

                                    echo "
                                        <option value='$brand_id'>$brand_title</option>
                                    ";

                                }
                            ?>
                        
                    </select>
                </div>


                <!-- Image-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image" class="form-label">Product image</label>
                    <input type="file" name="product_image" id="product_image" class="form-control"require>
                </div>


                <!-- price-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" require>
                </div>


                <!-- submit btn-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">    
                </div>

        </form>
    </div>
    
</body>
</html>