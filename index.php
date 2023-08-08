<?php
if(array_key_exists('submit',$_GET)){
  if(!$_GET['city']){
    $error = "sorry,Your input filed is empty";
  }
  if($_GET['city']){
    $apiData = file_get_contents("https://api.openweathermap.org/data/2.5/forecast?q=".$_GET['city']."&appid=1a0c40f3fe216a61cc1d38beeacfdd9e");
    $weather = json_decode($apiData, true);

    $cityname = $weather['city']['name'];
    $country = $weather['city']['country'];
    // C = K - 273.15
    $tempC = $weather['list']['0']['main']['temp'] - 273;
    $tempareture =intval($tempC)."&deg;C";
    //max temperature
    $maxt = $weather['list']['0']['main']['temp_max'] - 273;
    $maxtemp =intval($maxt)."&deg;C";
    //min temperature
    $mint = $weather['list']['0']['main']['temp_min'] - 273;
    $mintemp =intval($mint)."&deg;C";
    //wind
    $wind = $weather['list']['0']['wind']['speed'];
    //humidity
    $humidity = $weather['list']['0']['main']['humidity'];
    //icon
    $icon = $weather['list']['0']['weather'][0]['icon']; 
    //weathercondition
    $weathecondition = $weather['list']['0']['weather']['0']['description'];
    
    //saturday
    $iconsa = $weather['list']['6']['weather'][0]['icon']; 
    $tempsa = $weather['list']['6']['main']['temp'] - 273;
    $tempareturesa =intval($tempsa)."&deg;C";
    $windsa = $weather['list']['6']['wind']['speed'];
    $humiditysa = $weather['list']['6']['main']['humidity'];

    //sunday
    $iconsu = $weather['list']['15']['weather'][0]['icon'];
    $tempsu = $weather['list']['15']['main']['temp'] - 273;
    $tempareturesu =intval($tempsu)."&deg;C";
    $windsu = $weather['list']['15']['wind']['speed'];
    $humiditysu = $weather['list']['15']['main']['humidity'];

    //Monday
    $iconmo = $weather['list']['22']['weather'][0]['icon']; 
    $tempmo = $weather['list']['22']['main']['temp'] - 273;
    $tempareturemo =intval($tempmo)."&deg;C";
    $windmo = $weather['list']['22']['wind']['speed'];
    $humiditymo = $weather['list']['22']['main']['humidity'];

    //Tuesday
    $icontu = $weather['list']['31']['weather'][0]['icon']; 
    $temptu = $weather['list']['31']['main']['temp'] - 273;
    $tempareturetu =intval($temptu)."&deg;C";
    $windtu = $weather['list']['31']['wind']['speed'];
    $humiditytu = $weather['list']['31']['main']['humidity'];

    //Wednesday
    $iconwe = $weather['list']['38']['weather'][0]['icon'];
    $tempwe = $weather['list']['38']['main']['temp'] - 273;
    $tempareturewe =intval($tempwe)."&deg;C"; 
    $windwe = $weather['list']['38']['wind']['speed'];
    $humiditywe = $weather['list']['38']['main']['humidity'];

  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Weather App</title>
</head>

<body>

    <div class="container">
        <div class="current-info">
            <div class="date-container">
                <div>
                    <form action="" method="GET">
                        <div class="form">
                            <div class="input">
                                <center>
                                    <h2>Enter a City Name</h2>
                                </center>
                                <input name="city" class="city-input" type="text" placeholder="City Name">
                                <button name="submit" class="search-btn">Search</button>
                            </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="today">
            <h2><?php echo $cityname."-".$country;?></h2>
            <h3>Temperature : <?php echo $tempareture ;?></h3>
        </div>
    </div>


    </div>

    <div class="future-forecast">
        <div class="today" id="current-temp">
            <?php echo "<img src='https://openweathermap.org/img/wn/".$icon."@2x.png'>";?>
            <div class="other">
                <div class="day">Today</div>
                <h5>Temperature:<?php echo $tempareture ;?></h5>
                <h5>Wind : <?php echo $wind ;?> M/S</h5>
                <h5>Humidity : <?php echo $humidity;?>%</h5>
            </div>
        </div>

        <div class="weather-forecast" id="weather-forecast">
            <div class="weather-forecast-item">
                <div class="day">SAT</div>
                <p><?php echo "<img src='https://openweathermap.org/img/wn/".$iconsa."@2x.png'>";?></p>
                <h6>Temp : <?php echo $tempareturesa ;?></h6>
                <h6>Wind: <?php echo $windsa ;?> M/S</h6>
                <h6>Humidity : <?php echo $humiditysa;?>%</h6>
            </div>
            <div class="weather-forecast-item">
                <div class="day">SUN</div>
                <p><?php echo "<img src='https://openweathermap.org/img/wn/".$iconsu."@2x.png'>";?></p>
                <h6>Temp : <?php echo $tempareturesu ;?></h6>
                <h6>Wind: <?php echo $windsu ;?> M/S</h6>
                <h6>Humidity : <?php echo $humiditysu;?>%</h6>
            </div>
            <div class="weather-forecast-item">
                <div class="day">MON</div>
                <p><?php echo "<img src='https://openweathermap.org/img/wn/".$iconmo."@2x.png'>";?></p>
                <h6>Temp : <?php echo $tempareturemo ;?></h6>
                <h6>Wind: <?php echo $windmo;?> M/S</h6>
                <h6>Humidity : <?php echo $humiditymo;?>%</h6>
            </div>
            <div class="weather-forecast-item">
                <div class="day">TUES</div>
                <p><?php echo "<img src='https://openweathermap.org/img/wn/".$icontu."@2x.png'>";?></p>
                <h6>Temp : <?php echo $tempareturetu ;?></h6>
                <h6>Wind: <?php echo $windtu ;?> M/S</h6>
                <h6>Humidity : <?php echo $humiditytu;?>%</h6>
            </div>
            <div class="weather-forecast-item">
                <div class="day">WED</div>
                <p><?php echo "<img src='https://openweathermap.org/img/wn/".$iconwe."@2x.png'>";?></p>
                <h6>Temp : <?php echo $tempareturewe ;?></h6>
                <h6>Wind: <?php echo $windwe ;?> M/S</h6>
                <h6>Humidity : <?php echo $humiditywe;?>%</h6>
            </div>
            <div class="weather-forecast-item">
                <div class="day">FRI</div>
                <p><?php echo "<img src='https://openweathermap.org/img/wn/".$iconsu."@2x.png'>";?></p>
                <h5>Temperature:<?php echo $tempareture ;?></h5>
                <h5>Wind : <?php echo $wind ;?> M/S</h5>
                <h5>Humidity : <?php echo $humidity;?>%</h5>
            </div>
        </div>
    </div>

</body>

</html>