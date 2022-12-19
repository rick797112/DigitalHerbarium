<?php

    require('../vendor/autoload.php');

    if(isset($_GET['Slno'])){
        $slno = $_GET['Slno'];
    }else{
        header('Location : index.php');
    }
    
    include('../include/database.php');

    $sql = "select * from herbariumcontect where slno = '".$slno."'";

    $res = mysqli_query($con, $sql);

    if(mysqli_num_rows($res) > 0){
        while ($row = mysqli_fetch_assoc($res)){

            $linkText =  $row["rlink"]; 

            $text = strip_tags($linkText);
            $textLinks = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a style="text-decoration:none;" href="$1" target="_blank" rel="nofollow">$1</a>', $text);
          
            $data = "<p style='font-size:20px; font-family:San-Serif; color:red;'>".$row["cname"]."<p>";
            $data.= "<img style='border-radius: 10px; margin: auto; width: 100%; height: 350px' alt='Flora' src=../Admin/".$row["img"].">";
            $data.= "<br></div>";

            $data.= "<div class='col-md-6 col-sm-12'>";
            $data.= "<p style='margin : 0px; font-size: 20px; font-family: San-Serif'><b style='font-size : 1.5rem;'>Classification :- </b> <br>Common Name : ";
            $data.= $row["cname"]. "</p>";

            $data.= "<p style='margin : 0px; font-size: 20px; font-family: San-Serif'>Biogical Name : ";
            $data.= $row["sname"]."</p>";

            $data.= "<p style='font-size: 20px; font-family: San-Serif'>Family : ";
            $data.= $row["kingdom"] ."</p>";
            $data.= "<br>";

            $data.= "</div></div><div class='container'>";
            $data.= "<b><p style='font-size: 35px; font-family: San-Serif' class='mt-5'>Description</p></b>";
            $data.= $row["description"];

            $data.= "<b><p style='font-size: 30px; font-family: San-Serif'; class='mt-5' >Related Links</p></b>";
            $data.= $textLinks; 
            $data.= "<br></div>";    
        }
    }else{
        $data.='<p> Data Not Found </p>';
    }

    $mpdf=new \Mpdf\Mpdf();
    $mpdf->WriteHTML($data);
    $file = time().'.pdf';
    $mpdf->output($file,'D');

?>