<?php
    session_start();
    if(isset($_SESSION["username"])){
     
    }else{
        header("Location: index.php");
    }
       
?>
<?php  include('../Include/adminNavbar.php'); ?>
                <div class="container text-center">
                    <?php
                         echo"<br><br><br><br><br>";
                        echo"<h1 style='color: red; font-family: San-Serif' class='mt-5 mb-3 text-center'>Our Gallery</h1>";
                         include('../Include/database.php'); 
             
                         $sql = "select img from herbariumcontect";

                         if ($result = mysqli_query($con, $sql)) 
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<img style='margin: 15px;' height='300' width='300' src=../Admin/".$row['img'].">";
                            }

                            
                    ?>
    <body>
</html>