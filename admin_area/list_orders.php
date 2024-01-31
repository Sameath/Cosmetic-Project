

<h3 class="text-center text-success">All Orders</h3>
<table class="table table-borderd mt-5">
    <thead class="bg-info text-center">

        <?php 
            $get_order="Select * from `user_orders`";
            $result=mysqli_query($con,$get_order);
            $row_count=mysqli_num_rows($result);
            echo "
            <tr>
                <th>SN</th>
                <th>Due Amount</th>
                <th>Invoice number</th>
                <th>Total product</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
    
        <tbody class='bg-secondary text-center text-light'>";

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No orders yet.</h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $user_id=$row_data['user_id'];
                $amount_due=$row_data['amount_due'];
                $invoice_number=$row_data['invoice_number'];
                $total_product=$row_data['total_products'];
                $order_date=$row_data['order_date'];
                $order_status=$row_data['order_status'];

                $number++;
                ?>

                 
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $amount_due ?></td>
                    <td><?php echo $invoice_number ?></php></td>
                    <td><?php echo $total_product ?></td>
                    <td><?php echo $order_date ?></td>
                    <td class="bg-success"><?php echo $order_status ?></td>

                                      
                    <td class="bg-danger"><a href='index.php?delete_listOrder=<?php echo $order_id ?>' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>

            </tr>
            <?php 
            }
            
            }
        ?>
        
       
    </tbody>
</table>

<!-- Alert YES or NO when click on delete btn  -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3>Are you sure you want to delete this.</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_listOrder=<?php echo $order_id ?>'class='text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>