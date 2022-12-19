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
            $sql = "select * from herbariumcontect where slno= '".$_GET["Slno"]."'";

            echo "<div class='container'>";
            echo"<h1 style='font-family: poppin;'>Edit Information....</h1>";
            echo"<p style='font-family: poppin;'>Note: This will <b style='color:green;' >update</b> all your data permanentaly and you will be able to change it later.</p><br>";
            echo "<form method='post' enctype='multipart/form-data'";
    
                if ($result = mysqli_query($con, $sql)) 
                // Fetch one and one row
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<br><img alt='Flora' height='150px' width='250px' src=".$row["img"]."><br><br>";
                    //echo "<input type='text' name='imge' style='display:none;' value='".$row['img']."'>";
                    echo "<h3>Change Image: </h3><input name='image' class='form-control' style='width: 50%;' type='file'><br>";
                    echo "<h3>Common Name: </h3><input name='cname'class='form-control' style='width: 50%;' type='text' value='".$row["cname"]."'><br>";
                    echo "<h3>Scientific Name: </h3><input name='sname' class='form-control' style='width: 50%;' type='text' value='".$row["sname"]."'><br>";
                    echo "<h3>Kingdom: </h3><input name='kingdom' class='form-control' style='width: 50%;' type='text' value='".$row["kingdom"]."'><br>";
                    echo "<h3>Description: </h3><textarea name='desp' row='20' col='8' class='form-control' type='text'>".$row["description"]."</textarea><br>";
                    echo "<h3>Important Links: </h3><input name='link' class='form-control' style='width: 50%;' type='text' value='".$row["rlink"]."'><br>";
                
                }

            echo "<button name='update' class='btn btn-success'> UPDATE</button>&nbsp;&nbsp;";
            echo "<button name='cancel' class='btn btn-danger'> CANCEL</button>";
            echo "</form>";
            echo "</div><br><br>";


            if(isset($_POST["cancel"])){
                echo"<script>
                    window.location.assign('index.php');
                </script>";
            }

            if(isset($_POST["imge"])){
                echo "image";
            }


           if(isset($_POST["update"])){
                $cname = $_POST['cname'];
                $sname = $_POST['sname'];
                $desp = $_POST['desp'];
                $kingdom = $_POST['kingdom'];
                $img = $_POST['img'];
                $rlink = $_POST['link'];

                $sql = "update herbariumcontect set cname='".$cname."', sname='".$sname."', description='".$desp."', rlink='".$rlink."', kingdom='".$kingdom."' where slno='".$_GET['Slno']."'";
                echo "$sql;";    
                if (mysqli_query($con, $sql)){
                        echo"<script>
                        alert('Data Successfully Updated');
                        window.location.assign('index.php');
                        </script>";
                    }else{
                        echo"alert('Something Went Wrong...')";
                    }
            }


?>