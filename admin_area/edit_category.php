<?php 
    if(isset($_GET['edit_category'])){
        $edit_category=$_GET['edit_category'];
        
        //get category query
        $get_categories="SELECT * FROM `categories` WHERE category_id='$edit_category'";
        $result=mysqli_query($con,$get_categories);
        $row=mysqli_fetch_assoc($result);

        //get category title
        $category_title=$row['category_title'];
        
    }


    if(isset($_POST['edit_category'])){
        $cat_title=$_POST['category_title'];

        //update query
        $update_category = "UPDATE `categories` SET category_title='$cat_title' WHERE category_id='$edit_category'";
        $result_cat=mysqli_query($con,$update_category);
            if($result_cat){
                echo "<script>alert('Category update success.')</script>";
                echo "<script>window.open('./index.php?view_categories','_self')</script>";

            }

    }

?>






<div class="container mt-3 ">
    <h1 class="text-center text-success">Edite Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" require="require" value="<?php echo $category_title; ?>">
        </div>

        <input type="submit" value="UPdate Category" class="btn btn-info px-3 mb-3" name="edit_category">
    </form>
</div>

