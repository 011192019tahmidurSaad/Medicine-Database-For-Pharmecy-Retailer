<?php
    require('connection.php');
 ?>
 <?php
     $store_count =0;
     $spend_count =0;
     $stock =0;
 ?>
 <?php
   session_start();
   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];
   if(!empty($user_first_name) && !empty($user_last_name)){
?>
<?php 
    $sql2 = "SELECT * FROM medicine";
    $query2 = $conn -> query($sql2);
    $data_list = array();
    while($data2 = mysqli_fetch_assoc($query2)){
        $medicine_id = $data2['medicine_id'];
        $medicine_name = $data2['medicine_name'];
        $data_list[$medicine_id] = $medicine_name;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
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
                    <form action="report.php" method="GET">
    Select Medicine Name:
        <select name="medicine_name" id="">
    <?php 
        $sql = "SELECT * FROM medicine";

        $query = $conn-> query($sql);
        while($data = mysqli_fetch_assoc($query)){
            $medicine_id = $data['medicine_id'];
            $medicine_name = $data['medicine_name'];
        
        
    ?>
        
            <option value="<?php echo $medicine_id; ?>"><?php echo $medicine_name; ?></option>
            <?php } ?>
        </select>
        
        <input type="submit" value="Generate Report" class="btn btn-secondary"></input>

<!-- Uses Subquery -->
        <h2 class="text-success">
            <?php 
                if(isset($_GET['medicine_name'])){
                $new_medicine_name = $_GET['medicine_name'];
                $subquery = "SELECT medicine_name
                             FROM medicine
                             WHERE medicine_id = (SELECT medicine_id
                                                    FROM medicine
                                                    WHERE medicine_id = $new_medicine_name
                                                    )";
                $query5 = $conn-> query($subquery);
                while($data5 = mysqli_fetch_array($query5)){
                    $store_medicine_name = $data5['medicine_name'];
                   

                }
            
               
                echo 'Report for : '. $store_medicine_name;
            } 
            ?>
        </h2>



    </form>
    <h3>Store Medicine</h3>
    <?php 
        if(isset($_GET['medicine_name'])){
            $medicine_name = $_GET['medicine_name'];
            
            $sql1 = "SELECT * FROM store_medicine
                    WHERE store_medicine_name = $medicine_name";
            $query1 = $conn-> query($sql1);
            

            
             echo "<table border='1' class='table table-secondary table-striped table-hover'> <tr><td> Store Date </td><td>Ammount </td></tr>";

            while($data1 = mysqli_fetch_array($query1)){
                 $store_medicine_quantity = $data1['store_medicine_quantity'];
                 $store_medicine_entry_date = $data1['store_medicine_entry_date'];
                 $store_medicine_name = $data1['store_medicine_name'];
                 $store_count += $store_medicine_quantity;

                
                 echo "<tr> <td>$store_medicine_entry_date</td><td>$store_medicine_quantity</td></tr>";
                

            }
            echo "</table>";
            
               

            

        }
        
        ?>
    <h3>Spend Medicine</h3>
    <?php 
        if(isset($_GET['medicine_name'])){
            $medicine_name = $_GET['medicine_name'];
            $sql3 = "SELECT * FROM spend_medicine
                    WHERE spend_medicine_name = $medicine_name";
            $query3 = $conn-> query($sql3);
            

            echo "<table border='1' class='table table-secondary table-striped table-hover'> <tr><td> Spend Date </td><td>Ammount </td></tr>";

            while($data3 = mysqli_fetch_array($query3)){
                 $spend_medicine_quantity = $data3['spend_medicine_quantity'];
                 $spend_medicine_entry_date = $data3['spend_medicine_entry_date'];
                 $spend_medicine_name = $data3['spend_medicine_name'];
                 $spend_count += $spend_medicine_quantity;

                //echo "<h2>$data_list[$spend_medicine_name]</h2>";
                
                 echo "<tr> <td>$spend_medicine_entry_date</td><td>$spend_medicine_quantity</td></tr>";
                 

            }
            echo "</table>";
        }
        $stock = $store_count-$spend_count;
        echo "<h2 class ='text-success'>Stock Now : $stock</h2>";
        
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
