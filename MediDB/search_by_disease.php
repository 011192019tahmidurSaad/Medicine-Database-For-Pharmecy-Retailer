<?php
    require('connection.php');
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
    <title>Search By Disease</title>
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
                        <h5>Medicine For disease :</h5>
                         <?php
                             $id = $_GET['disease'];
                             $sql1 = "SELECT disease_name FROM disease_category
                                     WHERE disease_id = $id"; 
                            $query1 = $conn-> query($sql1);
                            $data_disease = mysqli_fetch_assoc($query1);
                            $name = $data_disease['disease_name'];
                            echo "<h3 class='text-success'>$name</h3>"
                         ?>
                         
                        <hr>


                    <?php 
                    $id = $_GET['disease'];
                        if(isset($_GET['disease'])){
                         $sql2 = "SELECT * FROM medicine
                                  WHERE disease = $id";
                         $query2 = $conn -> query($sql2);
                         }
                               echo "<table border='1' class='table table-secondary table-striped table-hover'> <tr>
                              <th>Medicine Category </th>
                              <th>Medicine Code </th>
                              <th>Medicine Type </th>
                               ";
                        while($data = mysqli_fetch_assoc($query2)){
                            $medicine_id = $data['medicine_id'];
                            $medicine_name = $data['medicine_name'];
                            $medicine_code = $data['medicine_code'];
                            $medicine_type = $data['medicine_type'];
                            
                
                            echo "<tr>
                                  <td>$medicine_name</td>
                                  <td>$medicine_code</td>
                                  <td>$medicine_type</td>
                                  </tr>";
                
                        }
                        echo"</table>";
        
        
                     ?>
                     <a href="list_of_medicine.php"class ="btn btn-secondary">Back</a>
    
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