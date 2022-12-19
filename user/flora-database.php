<?php
    include('../include/userNavbar.php');
    echo "<br><br><br><br>";
?>


<?php

    include('../include/database.php');
    $sql = "select slno,cname,sname,kingdom,img,udate from herbariumcontect";
    echo"<div class='container-fluid' id='divv' style='overflow-x:auto;'>";
    echo"<center><table id='usetTable' border='1'>";
    echo"<thead><th>Image</th><th>Common Name</th><th>Biogical Name</th><th>Family Name</th><th>Posted On</th></thead><tbody>";

    if ($result = mysqli_query($con, $sql)) 
    // Fetch one and one row
    while ($row = mysqli_fetch_assoc($result)){
        echo"<tr>";
        echo "<td><a href='InfoDetails.php?Slno=$row[slno]'><img alt='Flora' height='70px' width='100px' src=".'../Admin/'.$row["img"]."></a></td>";
        echo "<td>".$row["cname"]."</td>";
        echo "<td>".$row["sname"]."</td>";
        echo "<td>".$row["kingdom"]."</td>";
        echo "<td>".$row["udate"]."</td>";
        echo"</tr>";
    }

    mysqli_close($con);
    echo"</table></tbody></center></div></div>"; 

    include('../include/footer.php');
   
    
?>


<script>
            $(document).ready(function() {
                $('#usetTable').DataTable();
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script> 