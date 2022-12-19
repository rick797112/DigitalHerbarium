<?php
    session_start();
    if(isset($_SESSION["username"])){
     
    }else{
        header("Location: index.php");
    }
       
?>
<?php  include('../include/adminNavbar.php');  ?>

<br><br><br><br><br><br>

            
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<div style='width: 100px; height:100px; margin: auto;' class="loader">
</div>
<p style='width: 100px; height:100px; margin: auto;' class="load"></p>
</body>
</html>


            <script> 
                alert('Data Successfully Stored'); 
                const load = document.querySelector(".load");
                load.textContent = "Please Wait Submitting....";
                setTimeout(function(){
                    window.location.href = 'info.php';
                    
                }, 2000);          
            </script>
    </body>
</html>