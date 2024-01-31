<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hair Cosmetic</title>
</head>
<body>
    <h1 class="text-center text-success">All Products</h1>

    <table class="table table-borderd-mb-5">
        <thead class="bg-info text-center">
            <tr>
                <th>Product ID</th>
                <th>Product title</th>
                <th>Product image</th>
                <th>Product price</th>
                <th>Product sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody class="bg-secondary text-light">

            <?php
                $get_products="Select * from `products`";
                $result=mysqli_query($con,$get_products);
                $number=0;

                while($row=mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_image=$row['product_image'];
                    $product_price=$row['product_price'];
                    $product_status=$row['status'];
                    $number++;
                    ?>
                    
                    <tr class='text-center'>
                    <td class="bg-warning">  <?php echo $number;?> </td>
                    <td>  <?php echo $product_title; ?></td>
                    <td class="bg-white">  <img width="70px" class="rounded border border-4 border-warning" src='./product_images/<?php echo $product_image ?>'/> </td>
                    <td>  <?php echo $product_price?></td>
                    
                    <td> <?php 
                            $get_count="select * from `order_pending` where product_id=$product_id";
                            $result_count=mysqli_query($con,$get_count);
                            $row_count=mysqli_num_rows($result_count);
                            echo $row_count;
                        ?></td>

                    <td>  <?php echo $product_status?></td>
                    <td class="bg-success"><a href='index.php?edit_product=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td class="bg-danger"><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                    <?php 
                }
                    ?>
        </tbody>
    </table>
</body>
</html>