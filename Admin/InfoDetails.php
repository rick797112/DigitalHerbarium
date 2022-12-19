<?php
    session_start();
    if(isset($_SESSION["username"])){
     
    }else{
        header("Location: login.php");
    }
       
?>

        <?php  
            if(isset($_GET['Slno'])){
                $slno = $_GET['Slno'];
            }else{
                header('Location : index.php');
            }

            include('../include/adminNavbar.php');
            echo"<br><br><br>";
            include('../include/database.php'); 

            echo"<h1 style='color: red; font-family: San-Serif' class='mt-5 mb-3 text-center'>Detail Information</h1>";
            echo "<br>";
            echo "<div class='container'>";
            echo "<section class='row'>";
            echo"<div class='col-md-6 col-sm-12'>";
           
                $sql = "select * from herbariumcontect where slno = '".$slno."'";
                
                if ($result = mysqli_query($con, $sql)) 
                // Fetch one and one row
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<img style='border-radius: 10px; margin: auto; width: 100%; height: 350px' alt='Flora' src=".$row["img"].">";
                        echo "<br></div>";

                        echo"<div class='col-md-6 col-sm-12'>";

                        echo "<p style='margin : 0px; font-size: 20px; font-family: San-Serif'><b style='font-size : 1.5rem;'>Classification :- </b> <br>Common Name : ";
                        echo $row["cname"]. "</p>";

                        echo "<p style='margin : 0px; font-size: 20px; font-family: San-Serif'>Biogical Name : ";
                        echo $row["sname"]."</p>";

                        echo "<p style='font-size: 20px; font-family: San-Serif'>Family : ";
                        echo $row["kingdom"] ."</p>";
                        echo "<br>";

                        echo "</div></div><div class='container'>";
                        echo "<b><p style='font-size: 35px; font-family: San-Serif' class='mt-5'>Description</p></b>";
                        echo $row["description"];

                        echo "<b><p style='font-size: 30px; font-family: San-Serif'; class='mt-5' >Related Links</p></b>";

                        $linkText =  $row["rlink"]; 

                        $text = strip_tags($linkText);
                        $textLinks = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a style="text-decoration:none;" href="$1" target="_blank" rel="nofollow">$1</a>', $text);
                        echo $textLinks;
                        echo "<br></div>";                  
                }


                echo "</section>";
        
            mysqli_close($con);     
    ?>


        ?>
</body>
</html>
