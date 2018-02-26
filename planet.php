<?php
  include("config.php");

  //$connect = dbConnect("localhost","root","","solsystemdb2"); //Local DB connect string
  $connect = dbConnect("localhost","root","pass","solsystemDB"); //Server DB connect string
  $planet = selectRow($connect, "Planet", "*", "PlanetsOrder", $_GET["id"], "", "", "", ""); //Select all planets
  $planetMenu = selectRow($connect, "Planet", "*", "", "", "", "PlanetsOrder", "ASC", true);//Select all planets again for the menu and order them by thier order in the solar system

  $lowestPlanet = selectRow($connect, "Planet", "*", "", "", "1", "PlanetsOrder", "ASC", ""); //Select the planet with the lowest planet order
  $higestPlanet = selectRow($connect, "Planet", "*", "", "", "1", "PlanetsOrder", "DESC", ""); //Select the planet with the higest planet order
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet - <?php echo $planet["Name"]; //Get the name of the current planet from the Database from the field Name ?></title>
    <!-- Load javascript files and style sheets start -->
    <link rel="stylesheet" href="planetStyle.css">

    <script src="scripts/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="scripts/bootstrap/css/bootstrap.min.css">
    <script src="scripts\bootstrap\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="scripts/mCustomScrollbar/mCustomScrollbar.min.css">
    <script src="scripts\mCustomScrollbar\mCustomScrollbar.min.js"></script>

    <link rel="stylesheet" href="scripts/font-awesome/css/font-awesome.min.css">

    <script src="scripts\particles.js\particles.min.js"></script>
    <!-- Load javascript files and style sheets end -->
<script>
//Define global variables
var currID;
var minPlanetOrder;
var maxPlanetOrder;

$(function() { //When DOM is ready do the following
  particlesJS.load('particles-js', 'scripts/particles.js/spaceBG.json', function() {}); //Create the "stars" (particles) using the particlesJS Jquery plugin

  $("#planetInfo").mCustomScrollbar({ //Add custom scrollbar using the mCustomSCrollbar jQuery Plugin
    scrollInertia:100,
    mouseWheel:{ scrollAmount: 50 },
  });

  currID = parseInt(GetURLParameter("id")); //Get the value in the URL called id

  minPlanetOrder = <?php echo $lowestPlanet["PlanetsOrder"]; ?>; //Sets the lowest planet order from the database with PHP
  maxPlanetOrder = <?php echo $higestPlanet["PlanetsOrder"]; ?>; //Sets the higest planet order from the database with PHP

  if(currID == minPlanetOrder){ //If the current planet order is the lowest
    $("#prevPlanet").hide(); //Hide the previous planet button
  }
  if(currID == maxPlanetOrder){ //If the current planet order is the higest
    $("#nextPlanet").hide(); //Hide the next planet button
  }

  $("#prevPlanet").on("click",function(){ //On previous planet button click
    if(currID > minPlanetOrder){ //If the current id higher than lowest planet order
      currID--; //Subtract one from our current ID
      window.location = "planet.php?id="+currID; //Send the user to the this page again and set the id to the value of variable of "currID"
    }
  });
  $("#nextPlanet").on("click",function(){ //On next planet button click
    if(currID < maxPlanetOrder){ //If the current id lower than higest planet order
      currID++; //Adds one to our current ID
      window.location = "planet.php?id="+currID; //Send the user to the this page again and set the id to the value of variable of "currID"
    }
  });
});


function GetURLParameter(param){ //Get a user defined parameter from the URL
    var pageURL = window.location.search.substring(1); //Get all the parameters entered in the URL
    var urlVariables = pageURL.split('&'); //Split all the parameters on "&" to get all the individual parameters
    for (var i = 0; i < urlVariables.length; i++){//For every parameters
        var parameterName = urlVariables[i].split('='); //Get the name each parameter everytime the loop runs
        if (parameterName[0] == param){ //If the current parameter name is equal to the userdefined
            return parameterName[1]; //Return the value of the parameter
        }
    }
}
</script>
</head>

<body id="particles-js">
  <div id="backBtn"><a href="index.php"><i class="fa fa-chevron-left" aria-hidden="true"></i>Tilbage til solsystemet</a></div>
  <div id="quizBtn"><a href="QuizSide.php"><i class="fa fa-chevron-right" aria-hidden="true"></i>Prøv vores quiz her!</a></div>
  <div id="planetNavigateContainer">
    <div id="planetNavigateCenter">
      <div id="prevPlanet" class="planetNavigateBtn"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
      <div id="nextPlanet" class="planetNavigateBtn"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
    </div>
  </div>

    <div class="container">
      <div class="row">
        <div id="titleContainer" class="col-md-12 col-sm-12 editable">
          <h1 id="planetName"><?php echo $planet["Name"]; //Get the name from the database ?></h1>
        </div>
      </div>
      <div class="row">
        <div id="planetImageContainer" class="col-md-6 col-sm-12 editable">
          <img title="<?php echo $planet["Name"]; //Get the name from the database?>" alt="<?php echo $planet["Name"]; //Get the name from the database?>" id="planetImage" src="<?php echo $planet["RealisticImage"]; //Get the realistic image of the planet from the database ?>" />
        </div>
        <div id="planetInfoContainer" class="col-md-6 col-sm-12 editable">
          <div id="planetInfo">
            <table id="planetFacts">
              <tr>
                <td>Størrelse:</td>
                <td><?php echo $planet["Size"]; //Get the size info from the database ?></td>
              </tr>
              <tr>
                <td>Vægt:</td>
                <td><?php echo $planet["Mass"]; //Get the mass info from the database ?></td>
              </tr>
              <tr>
                <td>Tyngdekraft:</td>
                <td><?php echo $planet["Gravity"]; //Get the gravity info from the database ?></td>
              <tr>
              </tr>
                <td>Distance fra solen:</td>
                <td><?php echo $planet["DistanceFromSun"]; //Get the distance from sun info from the database ?></td>
              </tr>
            </table>
            <?php
              echo nl2br($planet["Description"]); //Get the planet description from the database
            ?>
          </div>
        </div>
      </div>
    </div>

  <?php
    generatePlanetMenu($planetMenu); //Generate the planet menu and send along our database query to the PHP function
  ?>
</body>

</html>
<?php
  dbDisconnect($connect); //Closes the connection to the database
?>
