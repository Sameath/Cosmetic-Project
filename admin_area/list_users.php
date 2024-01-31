

<h3 class="text-center text-success">All Users</h3>
<table class="table table-borderd mt-5">
    <thead class="bg-info text-center">

        <?php 
            $get_user="Select * from `user_table`";
            $result=mysqli_query($con,$get_user);
            $row_count=mysqli_num_rows($result);
            echo "
            <tr>
                <th>List user</th>
                <th>Username</th>
                <th>User email</th>
                <th>User image</th>
                <th>User address</th>
                <th>User mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
    
        <tbody class='bg-secondary text-center text-light'>";

        if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Users yet.</h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){

                
                $user_id=$row_data['user_id'];
                $user_name=$row_data['user_name'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];



                $number++;
                ?>

                 
                <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $user_name ?></td>
                    <td><?php echo $user_email ?></td>
                    
                    <td>  <img width="70px" class="rounded border border-4 border-warning" src='../user_area/user_images/<?php echo $user_image ?>'/> </td>

                    <td><?php echo $user_address ?></td>
                    <td><?php echo $user_mobile ?></td>


                    <td class="bg-danger"><a href='index.php?delete_listuser=<?php echo $user_id ?>' type="button" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_listuser=<?php echo $user_id ?>'class='text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>