<?php
  include("config.php");

  $connect = dbConnect("localhost","root","pass","solsystemDB");
  $planet = selectRow($connect, "Planet", "*", "PlanetsOrder", $_GET["id"], "", "", "", "");
  $planetMenu = selectRow($connect, "Planet", "*", "", "", "", "PlanetsOrder", "ASC", true);

  $lowestPlanet = selectRow($connect, "Planet", "*", "", "", "1", "PlanetsOrder", "ASC", "");
  $higestPlanet = selectRow($connect, "Planet", "*", "", "", "1", "PlanetsOrder", "DESC", "");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet - <?php echo $planet["Name"]; ?></title>

    <link rel="stylesheet" href="planetStyle.css">

    <script src="scripts/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="scripts/bootstrap/css/bootstrap.min.css">
    <script src="scripts\bootstrap\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="scripts/mCustomScrollbar/mCustomScrollbar.min.css">
    <script src="scripts\mCustomScrollbar\mCustomScrollbar.min.js"></script>

    <link rel="stylesheet" href="scripts/font-awesome/css/font-awesome.min.css">

    <script src="scripts\particles.js\particles.min.js"></script>


<script>
var currID;
var minPlanetOrder;
var maxPlanetOrder;

$(function() {
  particlesJS.load('particles-js', 'scripts/particles.js/spaceBG.json', function() {});

  $("#planetInfo").mCustomScrollbar({
    scrollInertia:100,
    mouseWheel:{ scrollAmount: 50 },
  });

  $("#prevPlanet").on("click",function(){
    window.location = "planet.php?id="+$(this).attr("id");
  });

  currID = parseInt(GetURLParameter("id"));

  minPlanetOrder = <?php echo $lowestPlanet["PlanetsOrder"]; ?>;
  maxPlanetOrder = <?php echo $higestPlanet["PlanetsOrder"]; ?>;

  if(currID == minPlanetOrder){
    $("#prevPlanet").hide();
  }
  if(currID == maxPlanetOrder){
    $("#nextPlanet").hide();
  }

  $("#prevPlanet").on("click",function(){
    if(currID > minPlanetOrder){
      currID--;
      window.location = "planet.php?id="+currID;
    }
  });
  $("#nextPlanet").on("click",function(){
    if(currID < maxPlanetOrder){
      currID++;
      window.location = "planet.php?id="+currID;
    }
  });
});


function GetURLParameter(param){
    var pageURL = window.location.search.substring(1);
    var urlVariables = pageURL.split('&');
    for (var i = 0; i < urlVariables.length; i++){
        var parameterName = urlVariables[i].split('=');
        if (parameterName[0] == param){
            return parameterName[1];
        }
    }
}
</script>
</head>

<body id="particles-js">
  <div id="backBtn"><a href="index.php"><i class="fa fa-chevron-left" aria-hidden="true"></i>Tilbage til solsystemet</a></div>
  <div id="planetNavigateContainer">
    <div id="planetNavigateCenter">
      <div id="prevPlanet" class="planetNavigateBtn"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
      <div id="nextPlanet" class="planetNavigateBtn"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
    </div>
  </div>

    <div class="container">
      <div class="row">
        <div id="titleContainer" class="col-md-12 col-sm-12 editable">
          <h1 id="planetName"><?php echo $planet["Name"]; ?></h1>
        </div>
      </div>
      <div class="row">
        <div id="planetImageContainer" class="col-md-6 col-sm-12 editable">
          <img title="<?php echo $planet["Name"]; ?>" alt="<?php echo $planet["Name"]; ?>" id="planetImage" src="<?php echo $planet["RealisticImage"]; ?>" />
        </div>
        <div id="planetInfoContainer" class="col-md-6 col-sm-12 editable">
          <div id="planetInfo">
            <table id="planetFacts">
              <tr>
                <td>Størrelse:</td>
                <td><?php echo $planet["Size"]; ?></td>
              </tr>
              <tr>
                <td>Vægt:</td>
                <td><?php echo $planet["Mass"]; ?></td>
              </tr>
              <tr>
                <td>Tyngdekraft:</td>
                <td><?php echo $planet["Gravity"]; ?></td>
              <tr>
              </tr>
                <td>Distance fra solen:</td>
                <td><?php echo $planet["DistanceFromSun"]; ?></td>
              </tr>
            </table>
            <?php
              echo nl2br($planet["Description"]);
            ?>
          </div>
        </div>
      </div>
    </div>

  <?php
    generatePlanetMenu($planetMenu);
  ?>
</body>

</html>
<?php
  dbDisconnect($connect);
?>
