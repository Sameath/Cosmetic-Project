<?php 
    include('../includes/connect.php');

    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cat_title'];

        //select data from database
        $select_query="select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('This category is present in database.')</script>";
        }else{

        $insert_query="Insert into `categories` (category_title) values ('$category_title')";
        $result=mysqli_query($con,$insert_query);

        if($result){
            echo "<script>alert('Category has been inserted.')</script>";
        }
        }

    }
?>
<h2 class="text-center">Insert Categories</h2>

<form action="" class="mb-2" method="post">
    <div class="input-group w-90 mb-2">
        <div class="input-group mb-3">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <div class="input-group mb-3">
            <input type="submit" class="form-control bg-info" name="insert_cat" value="Insert Categories">
        </div>
    </div>
</form>