<?php
    session_start();
    if(isset($_SESSION["username"])){
     
    }else{
        header("Location: login.php");
    }
       
?>

<?php  
            include('../include/adminNavbar.php');
            echo"<br><br><br>";
            include('../include/database.php'); 

            echo"<h2 style='color: red; font-family: San-Serif' class='mt-5 mb-3 text-center'>Recent Posts</h2>"; 
            echo "<section style='display: flex; justify-content: center; flex-wrap : wrap; align-items: center;'>";           
                         $sql = "select img from herbariumcontect limit 3";

                         if ($result = mysqli_query($con, $sql)) 
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<img style='margin: 15px;' height='300' width='300' src=../Admin/".$row['img'].">";
                            }

                            echo "</section>";

            $sql = "select slno,cname,sname,kingdom,img,udate from herbariumcontect";
            echo"<br><h2 style='color: red; font-family: Georgia, serif; text-align:center;'class='font'>Flora Database</h2><br>";
            echo"<div class='container-fluid' id='divv' style='overflow-x:auto;'>";
            echo"<center><table id='usetTable' border='1' width='1200'>";
            echo"<thead><th>Operation</th><th>Image</th><th>Common Name</th><th>Biogical Name</th><th>Family Name</th><th>Posted On</th></thead><tbody>";
    
            if ($result = mysqli_query($con, $sql)) 
            // Fetch one and one row
            while ($row = mysqli_fetch_assoc($result)){
                echo"<tr>";
                echo "<td style='text-align: center;'><a href='updateinfo.php?Slno=$row[slno]'><i style='color : blue' class='fa-solid fa-pen-to-square'></i></a> / <a style='text-decoration:none' href='deleteInfo.php?Slno=$row[slno]'><i style='color:red;' class='fa-solid fa-trash'></i></a></td>";
                echo "<td><a href='InfoDetails.php?Slno=$row[slno]'><img alt='Flora' height='70px' width='100px' src=".$row["img"]."></a></td>";
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
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script> 
</body>
</html>