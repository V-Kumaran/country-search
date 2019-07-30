
<?php
//Access Api Details in Json Format using Country Name
error_reporting(0);
if (!empty($_GET['search'])) {

    $url = 'https://restcountries.eu/rest/v2/name/'. urlencode($_GET['search']); //replace "CLIENT-ID"
    $json = file_get_contents($url);
    $array = json_decode($json, true);

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Country Search </title>
    <!-- Relate stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="topnav">
       <!-- Home Route -->
       <a href="../search">Country Explorer</a>

        <div class="search-container">

            <input type="text" name="search">
            <button type="submit">Search</button>
        </div>
    </form>
    <br>
    <!-- Relate stylesheet -->
    <div id="results">

        <div class="row">

            <?php

   //Check for empty search
        if(!empty($_GET['search']))
        {
  //Empty Search or Wrong search has status 404
        if(!empty($array) && $array['status']!=404 )
        {
  //Iterate each values
        foreach ($array as $key) {

            ?>
            <div class="col-4">
              <!-- On Clicking Image and Text passing Country Alpha2code to view.php Page -->
                <a href="view.php/?name=<?php echo $key['alpha2Code']?>">
                  <!-- Display Items as Cards -->
                    <div class="card">
                        <img src="<?php echo $key['flag']?>" alt="Avatar" style="width:100%;height:200px">
                        <div class="container">
                            <h4><b><?php echo $key['name']?></b></h4>

                        </div>
                    </div>
                </a></div>

            <?php
        }
        }

        //Condition for Wrong Data
        else
            {
                echo "<h1 align='center' style='color:red'>Sorry No data Found!!!</h1>";
            }
        }

        //Condition at the start of page without any Data
         else
         {
             echo "<h1 align='center'>Search to Discover Conuntries</h1>";
         }

    ?>
        </div>
    </div>
</body>
</html>
