<?php 
       $_POST["fecha"]=htmlspecialchars($_POST["fecha"]);

       $date = $_POST["fecha"];

       date_default_timezone_set('America/Mexico_City');
       $currentDate = date('Y-m-d', time());

       if($date > $currentDate){
        echo '<script>alert("there is no picture on that day Yet");</script>';
       }
       else{
       $your_date = date("Y-m-d", strtotime($date));
       echo $your_date;
   
       if(isset($_POST["fecha"]) && !empty($_POST["fecha"]) ){

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.nasa.gov/planetary/apod?date='.$your_date.'&api_key=DEMO_KEY');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $phoneList = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($phoneList);

        echo "<h4>".$jsonArrayResponse->title."</h4>";
        echo "<p>".$jsonArrayResponse->explanation."</p>";

        $link = $jsonArrayResponse->url;

        echo "<img src='".$link."'  width='500' height='600'>";
                
       }else{
           echo '<script>alert("Make sure to enter all the data (Year-Month-Day)");</script>';
       }
    }
   
?>