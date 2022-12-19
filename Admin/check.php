<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
         crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
    </head>
<body style="background-color: aquamarine;" class="container-fluid" vclass="sb-nav-fixed">
        
        <?php 
         include('../include/database.php'); 

            $sql = "select cname,sname,kingdom,img,udate from herbariumcontect";

            echo"<br><h2 style='text-align:center;'class='font'>Flora Database</h2><br>";
            echo"<div class='container-fluid' id='divv' style='overflow-x:auto;'>";
            echo"<center><table id='usetTable' border='1' width='1200'>";
            echo"<thead><th>Image</th><th>Common Name</th><th>Biogical Name</th><th>Family Name</th><th>Posted On</th></thead><tbody>";
    
            if ($result = mysqli_query($con, $sql)) 
            // Fetch one and one row
            while ($row = mysqli_fetch_assoc($result)) {
                echo"<tr>";
                echo "<td>".$row["img"]."</td>";
                echo "<td>".$row["cname"]."</td>";
                echo "<td>".$row["sname"]."</td>";
                echo "<td>".$row["kingdom"]."</td>";
                echo "<td>".$row["udate"]."</td>";
                echo"</tr>";
            }
        
            mysqli_close($con);
            echo"</table></tbody></center></div>";           
    ?>





        <script>
            $(document).ready(function() {
                $('#usetTable').DataTable();
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
</body>
</html>