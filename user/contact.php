<?php
$name = $Eremail = $phone = $phoneError = $feedback = $nameError = $email = $phno ="";
include('../include/userNavbar.php');
            echo"<br><br><br>";
?>

<?php
        if(isset($_POST["save"])){
            $flag = 1;         
            $feedback = $_POST["feedback"];
            $date = date('d-m-y');

            if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",$_POST["name"])){
                $nameError="* Only characters are allowed";
                $flag=1;
            }else if(strlen($_POST["name"]) > 30){
                $nameError = "* Only 30 characters accepted";
                $flag=1;}
            else
                $name=$_POST["name"];
    

              if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$_POST['email'])){
                $Eremail = "Invalid email format";
                $flag = 0;
              }else{
                $email = $_POST["email"];
              }
              
              if(!is_numeric($_POST["phno"])){
                $phoneError="* Please enter a valid number";
              }else if(!preg_match("/^[0-9]{10}$/",$_POST["phno"])){
                    $phoneError = "* Invalid Number";
                    $flag=0;
              }else{
                        $phone = $_POST["phno"];
                    }

            include('../include/database.php'); 
            $sql = "insert into contact values (slno, '".$name."', '".$email."', '".$phone."', '".$feedback."','".$date."')";


            if($flag == 1){
                if(mysqli_query($con,$sql)){
                    echo"<script>alert('Your FeedBack Is Saved With Us');</script>";
                    echo"<script> window.location.href = 'index.php';</script>";
            }else{
                    echo"<script>alert('Something Went Wrong..');</script>";
            }
        }
    }
?>

    <h1 style='color: red; font-family: San-Serif' class='mt-5 mb-3 text-center'>Contact Us</h1>
    <div class='container'>
        <form action="?" method="POST">
            <p style='margin : 0px;'>Please Enter Your Name:</p>
                <span><input required style='margin-bottom: -22px; width : 60%' type='text' name='name' value='<?php if(isset($_POST['save'])) echo $name; ?>' class='form-control' ><br>
                <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$nameError."</p>"; ?></span>

                <p style='margin : 0px;'>Please Enter Your Email:</p>
                <input required style='margin-bottom: -22px; width : 60%' type='text' name='email' value='<?php if(isset($_POST['save'])) echo $email; ?>' class='form-control'><br>
                <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$Eremail."</p>"; ?>
               
                <p style='margin : 0px;'>Please Enter Phone No: </p>
                <input required style='margin-bottom: -22px; width : 60%' type='text' name='phno' value='<?php if(isset($_POST['save'])) echo $phone; ?>' class='form-control'><br>
                <?php  if(isset($_POST["save"])) echo "<p style='font-size: 12px; color:red';>".$phoneError."</p>"; ?>


                <textarea required name='feedback' placeholder='Please Enter Your Queries, Feedbacks Here.' style='width : 60%' class='form-control'><?php if(isset($_POST['save'])) echo $feedback; ?></textarea><br>
            <button name='save' class='btn btn-success'>SUBMIT</button><br><br>
        </form>
    </div>
<?php
    include('../include/abtPage.php');
    include('../include/footer.php');
?>
    