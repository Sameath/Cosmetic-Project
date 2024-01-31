<?php 
    if(isset($_GET['edit_brand'])){
        $edit_brand=$_GET['edit_brand'];
        
        //get brand query
        $get_brand="SELECT * FROM `brand` WHERE brand_id='$edit_brand'";
        $result=mysqli_query($con,$get_brand);
        $row=mysqli_fetch_assoc($result);

        //get brand title
        $brand_title=$row['brand_title'];
        
    }


    if(isset($_POST['edit_brand'])){
        $cat_title=$_POST['brand_title'];

        //update query
        $update_brand = "UPDATE `brand` SET brand_title='$cat_title' WHERE brand_id='$edit_brand'";
        $result_cat=mysqli_query($con,$update_brand);
            if($result_cat){
                echo "<script>alert('brand update success.')</script>";
                echo "<script>window.open('./index.php?view_brands','_self')</script>";

            }

    }

?>






<div class="container mt-3 ">
    <h1 class="text-center text-success">Edite brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">brand title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" require="require" value="<?php echo $brand_title; ?>">
        </div>

        <input type="submit" value="Update brand" class="btn btn-info px-3 mb-3" name="edit_brand">
    </form>
</div>

