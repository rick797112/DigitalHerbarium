<?php
    session_start();
    if(isset($_SESSION["username"])){
     
    }else{
        header("Location: index.php");
    }
       
?>

<?php  include('../include/adminNavbar.php'); 

        $flag = 0;
        $cname = $cnameError = $fname = $fnameError = $bname = $bnameError = $desp = $despError = $rlink = $rlinkError = $ImageError = "";

        if(isset($_POST["save"])){

          $target_dir = "Image/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));  

           if ($_FILES["fileToUpload"]["size"] > 1000000) {
            $ImageError = " Sorry, your file is too large. Try Less than 1mb file";
            $flag=1;
          }

          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
              $ImageError =  " Sorry, only JPG, JPEG, PNG  files are allowed.";
              $flag = 1;
            }

           if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",$_POST["cname"])){
              $cnameError="* Only characters are allowed";
              $flag=1;
          }else if(strlen($_POST["cname"]) > 100){
              $cnameError = "* Only 100 characters accepted";
              $flag=1;}
          else
              $cname = $_POST["cname"];



              if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",$_POST["fname"])){
                $fnameError="* Only characters are allowed";
                $flag=1;
            }else if(strlen($_POST["fname"]) > 30){
                $fnameError = "* Only 30 characters accepted";
                $flag=1;}
            else
                $fname = $_POST["fname"];



              if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",$_POST["bname"])){
                  $bnameError="* Only characters are allowed";
                  $flag=1;
              }else if(strlen($_POST["bname"]) > 30){
                  $bnameError = "* Only 30 characters accepted";
                  $flag=1;}
              else
                  $bname = $_POST["bname"];



                
              if(strlen($_POST["desp"]) > 4999){
                    $despError = "* Only 5000 characters accepted";
                    $flag=1;}
                else
                    $desp = $_POST["desp"];

            
                    if(strlen($_POST["rlink"]) > 4999){
                      $rlinkError = "* Only 5000 characters accepted";
                      $flag=1;}
                  else
                      $rlink = $_POST["rlink"];
            
            
            $dou = date("Y-m-d");
            



            include('../include/database.php');

            if($flag == 0){
              move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
              $sql = "insert into herbariumcontect values (slno,'".$dou."','".$cname."','".$bname."','".$fname."','".$desp."','".$target_file."','".$rlink."')";
            
              if(mysqli_query($con,$sql)){
                  header('Location: infosave.php');
              }else{
                echo"<script> alert('Something Went Wrong');</script>";
            }
            }
        }

    ?>

<body>
<br><br><br><br><br><br>
    <div class="row justify-content-center">

      <div class="col-md-8">

        <div class="card">
          <h4 class="card-header">Fill Information Of Flora </h4>
          <div class="card-body">
        <form action="?" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label class="font-weight-bold" for="name">Common Name:</label>
            <input required class="form-control" type="text" value="<?php if(isset($_POST['save'])) echo $cname; ?>" name="cname" placeholder="Enter common Name">
            <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$cnameError."</p>"; ?>
          </div>

         

          <div class="form-group">
            <label class="font-weight-bold" for="name">Biological Name:</label>
            <input required class="form-control" type="text" value="<?php if(isset($_POST['save'])) echo $bname; ?>" name="bname" placeholder="Enter biological Name">
            <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$bnameError."</p>"; ?>
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="name">Family Name:</label>
            <input required class="form-control" type="text" value="<?php if(isset($_POST['save'])) echo $fname; ?>" name="fname" placeholder="Enter The Family">
            <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$fnameError."</p>"; ?>
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="bio">Description:</label>
            <textarea  required class="form-control"  name="desp" id="" cols="30" rows="10" placeholder="Enter The Details"><?php if(isset($_POST['save'])) echo $desp; ?></textarea>
            <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$despError."</p>"; ?>
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="bio">Related Links:</label>
            <label style="font-size:12px; color:red;" class="font-weight-bold">**Only http or https links will be accepted</label>
            <textarea required class="form-control" name="rlink" id="" cols="30" rows="10" placeholder="Enter The Details"><?php if(isset($_POST['save'])) echo $rlink; ?></textarea>
            <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$rlinkError."</p>"; ?>
          </div>

          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload Image</label>
            <input required type="file" name="fileToUpload" id="fileToUpload" class="form-control" id="inputGroupFile01">
            <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$ImageError."</p>"; ?>
          </div>

          <button name="save" class="btn btn-success">Submit Form</button>

        </form>
          </div>
        </div>  
      </div>
    </div>



   
</body>
</html>