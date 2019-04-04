<?php
    $error=''; $weatherReport="";
    
    if($_GET){
        if($_GET["city"] ==""){
        
            $error='<div class="alert alert-danger"><p>Please enter the name of a city first</p></div>';
            
        } else {
        
            $cityName = $_GET["city"];
            
            $cityName = str_replace(" ", "-", $cityName);
            
            $cityURL = "https://www.weather-forecast.com/locations/".$cityName;
            
            $file_headers = @get_headers($cityURL);
            
            if ($file_headers[0] == 'HTTP/1.1 404 Not Found'){
            
                $error='<div class="alert alert-danger"><p>Sorry, we could not find that city.</p></div>';
                
            
            } else {
            
                $fullForecast = file_get_contents($cityURL);
                
                $partialForecast = explode('<p class="b-forecast__table-description-content"><span class="phrase">', $fullForecast);
                
                if (sizeof($partialForecast) > 1){
                
                    $partialForecast = explode('</span>', $partialForecast[1]);
                
                    $weatherReport = '<div class="alert alert-success"><p><strong> The 3-day Forecast for '.$_GET["city"].':</strong></p>';
                
                    $weatherReport .= '<p>'.$partialForecast[0].'</p></div>';
                
                } else {
                
                    $error = '<div class="alert alert-danger"><p>Sorry, we had diffculty processing the data format. Please let <a href="mailto:grungebunnie@protonmail.com">grungebunnie@protonmail.com</a> know of the error.</p></div>';
                
                }
            
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Weather Scraper</title>
  </head>
  <body>
    <div id="background">
        <div class="container">
            <div class="content">
                <h1><b>How's the Weather over There?</b></h1>
                <br />
                <p><b>Please enter the name of a major city.</b></p>
                
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="cityQuery" name="city" aria-describedby="enterCity" placeholder="Enter city name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        <div><? echo $error.$weatherReport; ?></div> 
        </div>
        
        <div id="footer" class="content">
            <p>Image credit: David Cruz. Weather data courtesy of <a href="https://www.weather-forecast.com/">www.weather-forecast.com</a></p>
        </div>
    </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
