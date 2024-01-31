

<h3 class="text-center text-success">All Payments</h3>
<table class="table table-borderd mt-5">
    <thead class="bg-info text-center">

        <?php 
            $get_payment="Select * from `user_payment`";
            $result=mysqli_query($con,$get_payment);
            $row_count=mysqli_num_rows($result);
            echo "
            <tr>
                <th>SN</th>
                <th>Invoice number</th>
                <th>Amount</th>
                <th>Payment mode</th>
                <th>Order date</th>
                <th>Delete</th>
            </tr>
        </thead>
    
        <tbody class='bg-secondary text-center text-light'>";

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No payments yet.</h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){

                $order_id=$row_data['order_id'];
                $payment_id=$row_data['payment_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_mode'];
                $order_date=$row_data['date'];


                $number++;
                ?>

                 
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $invoice_number ?></td>
                    <td><?php echo $amount ?></td>
                    <td><?php echo $payment_mode ?></td>
                    <td><?php echo $order_date ?></td>

                                      
                    <td><a href='index.php?delete_listPayment=<?php echo $order_id ?>' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payments" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_listPayment=<?php echo $order_id ?>'class='text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>