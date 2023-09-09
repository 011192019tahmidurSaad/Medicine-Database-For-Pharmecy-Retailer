<?php
    require('connection.php');
?>
<?php 
    $sql1 = "SELECT * FROM medicine";
    $query1 = $conn -> query($sql1);
    $data_list = array();
    while($data1 = mysqli_fetch_assoc($query1)){
        $medicine_id = $data1['medicine_id'];
        $medicine_name = $data1['medicine_name'];
        $data_list[$medicine_id] = $medicine_name;
    }
?>
<?php
   session_start();
   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];
   if(!empty($user_first_name) && !empty($user_last_name)){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Store Medicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
<div class="container bg-light">
        <div class="container-foluid border-bottom border-secondary"> <!--  topbar -->
              <?php include('bootstrap/topbar.php'); ?>
           
        </div><!-- end topbar -->
        <div class="container-foluid">
            <div class="row">
                <div class="col-sm-3 bg-light p-0 m-0">
                    <?php include('bootstrap/leftside_bar.php'); ?>
                </div>
                <div class="col-sm-9 border-start border-secondary">
                    <div class="container p-4 m-4">
                    <?php 
        $sql = "SELECT * FROM store_medicine";

        $query = $conn-> query($sql);
        echo "<table border='1' class='table table-secondary table-striped table-hover'> <tr>
              <th>Medicine Name</th>
              <th>Medicine Quantity </th>
              <th>Entry Date</th>
              <th>Expire Date</th>
              <th>Action</th></tr> ";
        while($data = mysqli_fetch_assoc($query)){
            $store_medicine_id = $data['store_medicine_id'];
            $store_medicine_name = $data['store_medicine_name'];
            $store_medicine_quantity = $data['store_medicine_quantity'];
            $store_medicine_entry_date = $data['store_medicine_entry_date'];
            $store_medicine_expire_date = $data['store_medicine_expire_date'];

            echo "<tr>
                  <td>$data_list[$store_medicine_name]</td>
                  <td>$store_medicine_quantity</td>
                  <td>$store_medicine_entry_date</td>
                  <td>$store_medicine_expire_date</td>
                  <td><a href ='edit_store_medicine.php?id= $store_medicine_id'  class='btn btn-secondary'>Edit</a>
                      <a href ='delete_store_medicine.php?id= $store_medicine_id'  class='btn btn-danger'>Delete</a>
                  </td></tr>";

        }
        echo"</table>";


        
        
    ?>
                    
                    

                </div> 
                    
                </div>
            </div>

        </div>
        <div class="border-top border-secondary">
        <?php include('bootstrap/bottom_bar.php'); ?>
        </div>

    </div>
    
</body>
</html>
<?php
   }
   else{
    header('location:login.php');
   }
 ?>