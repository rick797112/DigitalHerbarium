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
            $sql = "select cname,sname,kingdom,img,udate from herbariumcontect where slno= '".$_GET["Slno"]."'";

            echo "<div class='container'>";
            echo"<h1 style='font-family: poppin;'>Are you sure you want to delete?</h1>";
            echo"<p style='font-family: poppin;'>Note: This will <b style='color:red;' >delete</b> all your data permanentaly and you may not be able to recover it later.</p><br>";
            echo "<form method='post' ";
    
                if ($result = mysqli_query($con, $sql)) 
                // Fetch one and one row
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<br><img alt='Flora' height='150px' width='250px' src=".$row["img"]."><br><br>";
                    echo "<h3>Common Name: </h3><input class='form-control' style='width: 50%;' type='text' disabled value='".$row["cname"]."'><br>";
                    echo "<h3>Scientific Name: </h3><input class='form-control' style='width: 50%;' type='text' disabled value='".$row["sname"]."'><br>";
                    echo "<h3>Kingdom: </h3><input class='form-control' style='width: 50%;' type='text' disabled value='".$row["kingdom"]."'><br>";
                    echo "<h3>Last Updated On: </h3><input class='form-control' style='width: 50%;' type='text' disabled value='".$row["udate"]."'><br>";
                }

            echo "<button name='delete' class='btn btn-danger'> DELETE</button>&nbsp;&nbsp;";
            echo "<button name='cancel' class='btn btn-danger'> CANCEL</button>";
            echo "</form>";
            echo "</div><br><br>";


            if(isset($_POST["cancel"])){
                header("Location: index.php");
            }

            if(isset($_POST["delete"])){
                $sql = "delete from herbariumcontect where slno= '".$_GET["Slno"]."'";
                    if (mysqli_query($con, $sql)){
                        echo"<script>
                        alert('Data Successfully Deleted');
                        window.location.assign('index.php');
                        </script>";
                    }else{
                        echo"alert('Something Went Wrong...')";
                    }
            }


?>