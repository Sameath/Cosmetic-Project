<?php 
    include('../includes/connect.php');

    if(isset($_POST['insert_brand'])){
        $brand_title=$_POST['brand_title'];

        //select data from database
        $select_query="select * from `brand` where brand_title='$brand_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);

        if($number>0){
            echo "<script>alert('This brand is present in database.')</script>";
        }else{
            $insert_query="Insert into `brand` (brand_title) values ('$brand_title')";
            $result=mysqli_query($con,$insert_query);

            if($result){
                echo "<script>alert('Brand has been inserted.')</script>";
            }
        }
    }
?>
<h2 class="text-center">Insert Brands</h2>

<form action="" class="mb-2" method="post">
    <div class="input-group w-90 mb-2">
        <div class="input-group mb-3">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands">
        </div>
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <div class="input-group mb-3">
            <input type="submit" class="form-control bg-info" name="insert_brand" value="Insert Brands">
        </div>
    </div>
</form>