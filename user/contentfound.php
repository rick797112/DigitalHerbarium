
<?php  include('../Include/userNavbar.php'); ?>
    
    <div class="container">
            <?php
                echo"<br><br><br>";
                echo"<h1 style='color: black; font-family: San-Serif' class='mt-5 mb-3'>Search Results</h1>";

                    if(isset($_POST['save'])){
                        $search = $_POST['search'];
                        $strlen=strlen($search);

                        $first= intval($strlen * (35/100));
                        $second=intval($strlen * (35/100));
                        $third=intval($strlen * 30/100);



                        $first_part=substr($search,0,$first);
                        $second_part=substr($search,$first,$second);
                        $third_part=substr($search,($first+$second));

                        $sql = "select slno,description,img,cname,sname from herbariumcontect where cname like '%".$search."%' OR sname like '%".$search."%'";

                        include('../Include/database.php'); 
                        if ($result = mysqli_query($con, $sql)){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo"<a href='InfoDetails.php?Slno=$row[slno]'><img style='float: left; margin: 15px 15px 0px 0px' alt='Flora' height='120px' width='150px' src=".'../Admin/'.$row["img"]."></a>";
                                echo"<p>".$row['description']."</p>";    
                                echo"<p style='margin : 0px;'><b>Common Name : ".$row['cname']." </b></p>";
                                echo"<p><b>Scientific Name : ".$row['sname']." </b></p>";
                            }
                        }
                        
                        if(mysqli_num_rows($result) < 1){
                            $sql = "select slno,description,img,cname,sname from herbariumcontect where cname like '%".$first_part."%' OR cname like '%".$second_part."%' OR cname like '%".$third_part."%' OR sname like '%".$first_part."%' OR sname like '%".$second_part."%' OR sname like '%".$third_part."%' ";
                            if ($result = mysqli_query($con, $sql)){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo"<a href='InfoDetails.php?Slno=$row[slno]'><img style='float: left; margin: 15px 15px 0px 0px' alt='Flora' height='120px' width='150px' src=".'../Admin/'.$row["img"]."></a>";
                                    echo"<p>".$row['description']."</p>";    
                                    echo"<p style='margin : 0px;'><b>Common Name : ".$row['cname']." </b></p>";
                                    echo"<p><b>Scientific Name : ".$row['sname']." </b></p>";
                                }
                            }
                            
                            if(mysqli_num_rows($result) < 1){
                                echo "<h3>Sorry No Results Were Found.....</h3>";
                            }
                        }
                    }
            
            ?>
    </div>
