<?php
if (!empty($_GET['name'])) {
//Using Rest Api url
    $url = 'https://restcountries.eu/rest/v2/alpha/'. urldecode($_GET['name']); //replace "CLIENT-ID"
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

    <title> <?php echo $_GET['name']?> </title>
    <!-- Relate stylesheet -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div id="results">
         <!-- Display Selected Country Flag and Country Name -->
        <h1><img src="<?php echo  $array['flag'];?>" alt="" width="50px"> <?php echo  $array['name'];?></h1>
        <!-- Display Contents obtained From Json for the Specific Country -->
        <table>
            <tr>
                <td class="tit">Capital</td>
                <td><?php echo  $array['capital'];?></td>
            </tr>

            <tr>
                <td class="tit">Region</td>
                <td><?php echo  $array['region'];?></td>
            </tr>

            <tr>
                <td class="tit">Sub Region</td>
                <td><?php echo  $array['subregion'];?></td>
            </tr>

            <tr>
                <td class="tit">Population</td>
                <td><?php echo  $array['population'];?></td>
            </tr>

            <tr>
                <td class="tit">demonym</td>
                <td><?php echo  $array['demonym'];?></td>
            </tr>

            <tr>
                <td class="tit">area</td>
                <td><?php echo  $array['area'];?></td>
            </tr>


        </table>
        <br>
        <!-- Go to Previous Page -->
        <button onclick="goBack()">Go Back</button>

    </div>
<!-- Java Script function to Return back to Previous Page-->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>
