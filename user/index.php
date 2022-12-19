<?php  
            include('../include/userNavbar.php');
            echo"<br><br><br>";
         
?>
    <div style='position: absolute; width: 100%; z-index: 1; margin-top: 40px;' class="row justify-content-center">  
                        <div class="search" style="background: transparent;">  
                            <form style="background: transparent; border: 0px;" action="contentfound.php" method="post" class="card card-sm">  
                                <div class="card-body row no-gutters align-items-center">  
                                    <div class="col-auto">  
                                        <i class="fas fa-search h4 text-body"> </i>  
                                    </div>  
                                         <div class="col">  
                                        <input style="font-size: 1rem;" name="search" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords here...?" >  
                                    </div>  
                                    <div class="col-auto">  
                                    &nbsp;&nbsp;<button style="font-size: 1rem; padding: 7px;" name="save" class="btn btn-lg btn-success" type="submit"> Search </button>  
                                    </div>  
                                     
                                </div>  
                            </form>  
                        </div>  
                    </div>  
    </div>

    <?php
            include('../include/database.php'); 
            include('../include/Coursal.php');
            echo"<h1 style='font-size: 40px; font-weight: 600; letter-spacing: 2px; color: #1b4332;; font-family: San-Serif' class='mt-5 mb-3 text-center'>RECENT POST</h1>"; 
            echo"<div class='container-fluid'>";     
            echo "<section style='justify-content: center; flex-direction:row;' class='row'>";    
                         $sql = "select * from herbariumcontect order by slno DESC limit 6";

                         if ($result = mysqli_query($con, $sql)) 
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <div class="card" style="padding: 10px; margin: 20px; width: 22rem;">
                                    <img style='height:18rem; ' src='../Admin/<?php echo $row['img'] ?>' class="card-img-top" alt='Image'>
                                    <div class="card-body">
                                    <?php
                                    echo"<a style='text-decoration:none;' href='InfoDetails.php?Slno=$row[slno]'>";
                                    ?>
                                    <h5 class="card-title"><?php echo $row['cname'] ?></h5></a>
                                        <p style='margin:0px;' class="card-text"><b>Scientific Name : </b><?php echo $row['sname'] ?></p>
                                        <p class="card-text"><b>Family : </b> <?php echo $row['kingdom'] ?></p>
                                    </div>
                                </div>
                           <?php }

            echo "</div></section>";
            
            
            include('../include/abtPage.php');
            include('../include/footer.php');
    ?>
</body>
</html>