<?php 
    // include('./includes/connect.php'); 

    //get product
    function GetProduct(){
                    global $con;

                    //condition to check isset or not
                    if(!isset($_GET['category'])){
                        if(!isset($_GET['brand'])){

                    $select_query="select * from `products` order by rand() limit 0,9"; 
                    $result_query=mysqli_query($con,$select_query);

                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_discription'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];

                        echo "
                        <div class='col-md-4 mb-4'>
                        <div class='card' style='width: 18rem;'>
                                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>$product_price</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    
                                </div>
                        </div>
                        </div>
                        ";

                    }
                }
    }
}


    //get all product
    function GetAllProducts(){
        global $con;
        //condition to check isset or not
        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){

        $select_query="select * from `products` order by rand()"; 
        $result_query=mysqli_query($con,$select_query);

        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_discription'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];

            echo "
            <div class='col-md-4 mb-4'>
            <div class='card' style='width: 18rem;'>
                    <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                        <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

                    </div>
            </div>
            </div>
            ";

        }
    }
}
}



    //get unique category
    function GetUniqueCategory(){
        global $con;

        //condition to check isset or not
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];

        $select_query="select * from `products` where category_id=$category_id"; 
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No stock for this category.</h2>";
        }

        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_discription'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];

            echo "
            <div class='col-md-4 mb-4'>
            <div class='card' style='width: 18rem;'>
                    <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>$product_price</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                        <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

                    </div>
            </div>
            </div>
            ";

        }
    }
}



 //get unique Brand
 function GetUniqueBrand(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];

    $select_query="select * from `products` where brand_id=$brand_id"; 
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>This Brand not available for service.</h2>";
    }

    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_discription'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];

        echo "
        <div class='col-md-4 mb-4'>
        <div class='card' style='width: 18rem;'>
                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>$product_price</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>

                </div>
        </div>
        </div>
        ";

    }
}
}




    //get brand
    function GetBrand(){
        global $con;
        $select_brand="select * from `brand`";
                            $result_brand=mysqli_query($con,$select_brand);

                            //fetch data
                           
                            while($row_data=mysqli_fetch_assoc($result_brand)){
                                $brand_title=$row_data['brand_title'];
                                $brand_id=$row_data['brand_id'];

                                echo "
                                <li class='nav-item'>
                                    <a href='index.php?brand=$brand_id' class='nav-link text-center text-light'>$brand_title</a>
                                </li>
                                ";
                            }
    }



    //get category
    function GetCategory(){
        global $con;
        $select_cat="select * from `categories`";
                            $result_cat=mysqli_query($con,$select_cat);

                            //fetch data

                            while($row_data=mysqli_fetch_assoc($result_cat)){
                                $cat_title=$row_data['category_title'];
                                $cat_id=$row_data['category_id'];

                                echo "
                                <li class='nav-item'>
                                    <a href='index.php?category=$cat_id' class='nav-link text-center text-light'>$cat_title</a>
                                </li>
                                ";
                            }
    }


    //search product
    function SearchProduct() {
        global $con;

            if(isset($_GET['search_data_product'])){
                    $search_data_value=$_GET['search_data'];
                    $search_query="select * from `products` where product_keyword like '%$search_data_value%'"; 
                    $result_query=mysqli_query($con,$search_query);

                    $num_of_rows=mysqli_num_rows($result_query);
                    if ($num_of_rows==0) {
                        echo "<h2 class='text-center text-danger'>No match. No product found on this search.</h2>";
                    }

                    while($row=mysqli_fetch_assoc($result_query)){
                        $product_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_description=$row['product_discription'];
                        $category_id=$row['category_id'];
                        $brand_id=$row['brand_id'];
                        $product_image=$row['product_image'];
                        $product_price=$row['product_price'];

                        echo "
                        <div class='col-md-4 mb-4'>
                        <div class='card' style='width: 18rem;'>
                                <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>$product_price</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    
                                </div>
                        </div>
                        </div>
                        ";

                    }
                }
            }

        
            //product detail
            function ProductDetail(){
                global $con;

                if(isset($_GET['product_id'])){
                if(!isset($_GET['category'])){
                    if(!isset($_GET['brand'])){
                        $product_id=$_GET['product_id'];

                $select_query="select * from `products` where product_id='$product_id'"; 
                $result_query=mysqli_query($con,$select_query);

                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_discription'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];
                    $product_image=$row['product_image'];
                    $product_price=$row['product_price'];

                    echo "
                    <div class='col-md-6 mb-4'>
                    <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>$product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                                <a href='index.php' class='btn btn-secondary'>Go Home</a>

                            </div>
                    </div>
                    </div>";

                }
            }
}       
}
}

//get ip address 
    function getIPAddress() {  
    //whether ip is from the share internet  
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                        $ip = $_SERVER['HTTP_CLIENT_IP'];  
                }  
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            }  
        //whether ip is from the remote address  
            else{  
                    $ip = $_SERVER['REMOTE_ADDR'];  
            }  
            return $ip;  
        }  
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip;    



        //add to cart function
         function cart(){
            if(isset($_GET['add_to_cart'])){
                global $con;
                $get_ip_address = getIPAddress();

                $get_product_id=$_GET['add_to_cart'];
                $select_query="select * from `cart_details` where ip_address='$get_ip_address' and product_id='$get_product_id'";
                $result_query=mysqli_query($con,$select_query);
                $num_of_rows=mysqli_num_rows($result_query);

                if($num_of_rows>0){
                    echo "<script>alert('This Item is already present inside cart. ')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                
                }else{
                    $insert_query="Insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id, '$get_ip_address', 0)";
                    $result_query=mysqli_query($con,$insert_query);

                    echo "<script>alert('Item is added to cart. ')</script>";
                    echo "<script>window.open('index.php','_self')</script>";

                }



            }
         }



         //funciton to get cart item number
         function total_items(){
         if(isset($_GET['add_to_cart'])){
            global $con;
            $get_ip_address = getIPAddress();

            
            $select_query="select * from `cart_details` where ip_address='$get_ip_address'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_item=mysqli_num_rows($result_query);

            }else{
                global $con;
                $get_ip_address = getIPAddress();
    
                
                $select_query="select * from `cart_details` where ip_address='$get_ip_address'";
                $result_query=mysqli_query($con,$select_query);
                $count_cart_item=mysqli_num_rows($result_query);


            }
            echo $count_cart_item;

        }



        //total price function
        function total_price() {
            global $con;
            $get_ip_address = getIPAddress();
            $total=0;

            $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
            $result=mysqli_query($con,$cart_query);
            
            while($row=mysqli_fetch_array($result)){
                
                $product_id=$row['product_id'];
                $select_product="select * from `products` where product_id='$product_id'";
                $result_product=mysqli_query($con,$select_product);

                    while($row_product_price=mysqli_fetch_array($result_product)){

                        $product_price=array($row_product_price['product_price']);
                        $product_value=array_sum($product_price);
                        $total+=$product_value;
                    }
            }
            echo $total;

        }



        //get user order detail 
    function get_user_order_details(){
        global $con;
        $user_name=$_SESSION['user_name'];
        $get_details="select * from `user_table` where user_name='$user_name'";
        $result_query=mysqli_query($con,$get_details);

        while($row_query=mysqli_fetch_array($result_query)){
            $user_id=$row_query['user_id'];

            if(!isset($_GET['edit_account'])){
              if(!isset($_GET['my_orders'])){
                
                if(!isset($_GET['delete_account'])){
                    $get_order="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_order_query=mysqli_query($con,$get_order);
                    $row_count=mysqli_num_rows($result_order_query);

                        if($row_count>0){
                            echo "<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending orders. </h3>
                            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                        }else{
                            echo "<h3 class='text-center text-success my-5'>You have 0 pending orders. </h3>
                            <p class='text-center'><a href='../index.php' class='text-dark'>Explore product.</a></p>";
                        
                        }
                }
            }
        }
        }
    }
    
    
?>