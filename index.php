<?php
ini_set('display_errors', 1); //Enable phgp errors
include("config.php"); //Include our php config file, that contains our php functions

//$connect = dbConnect("localhost","root","","solsystemdb2"); //Local DB connect string
$connect = dbConnect("localhost","root","pass","solsystemDB"); //Server DB connect string
$site = selectRow($connect, "Site", "*", "ID", "1", "", "", "", ""); //Select frontpage site text
$planets = selectRow($connect, "Planet", "*", "", "", "", "PlanetsOrder", "ASC", true); //Select all planets and order them by thier order in the solar system
$planetMenu = selectRow($connect, "Planet", "*", "", "", "", "PlanetsOrder", "ASC", true); //Select all planets again for the menu and order them by thier order in the solar system
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet</title>

    <!-- Load javascript files and style sheets start -->
    <link rel="stylesheet" href="style.css">

    <script src="scripts/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="scripts/bootstrap/css/bootstrap.min.css">
    <script src="scripts\bootstrap\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="scripts/mCustomScrollbar/mCustomScrollbar.min.css">
    <script src="scripts\mCustomScrollbar\mCustomScrollbar.min.js"></script>

    <link rel="stylesheet" href="scripts/font-awesome/css/font-awesome.min.css">

    <script src="scripts\particles.js\particles.min.js"></script>
    <!-- Load javascript files and style sheets end -->
<script>
$(function() { //When DOM is ready do the following
  particlesJS.load('particles-js', 'scripts/particles.js/spaceBG.json', function() {}); //Create the "stars" (particles) using the particlesJS Jquery plugin

  $("#siteText").mCustomScrollbar({ //Add custom scrollbar using the mCustomSCrollbar jQuery Plugin
    scrollInertia:150,
    mouseWheel:{ scrollAmount: 20 },
  });

  $(".planet").on("click",function(){ //When a planet is clicked
    window.location = "planet.php?id="+$(this).attr("planetOrder"); //Send it to the planet.php site along with it's custom attribute planetOrder
  });

  //Make the all the planets start from a random position start
  $("#orbit1, #orbit1 .pos, #mercury .planetShadow").css("animation-delay", "-"+randomStartPos(3)+"s");
  $("#orbit2, #orbit2 .pos, #venus .planetShadow").css("animation-delay", "-"+randomStartPos(7)+"s");
  $("#orbit3, #orbit3 .pos, #earth .planetShadow").css("animation-delay", "-"+randomStartPos(12)+"s");
  $("#orbit4, #orbit4 .pos, #mars .planetShadow").css("animation-delay", "-"+randomStartPos(23)+"s");
  $("#orbit5, #orbit5 .pos, #jupiter .planetShadow").css("animation-delay", "-"+randomStartPos(142)+"s");
  $("#orbit6, #orbit6 .pos, #saturnShadow .planetShadow").css("animation-delay", "-"+randomStartPos(353)+"s");
  $("#orbit7, #orbit7 .pos, #uranus .planetShadow").css("animation-delay", "-"+randomStartPos(1008)+"s");
  $("#orbit8, #orbit8 .pos, #neptune .planetShadow").css("animation-delay", "-"+randomStartPos(1977)+"s");
  $("#orbit9, #orbit9 .pos, #pluto .planetShadow").css("animation-delay", "-"+randomStartPos(3500)+"s");
  //Make the all the planets start from a random position end
});

function randomStartPos(maxNum){ //Returns a random number between 0 and and a max user defined number
  return Math.floor(Math.random() * (maxNum - 0 + 1)) + 0;
}

function pauseSolarSystem(){ //Pause the solar system by adding a class containing: "animation-play-state: paused;"
  $("#orbit1, #orbit1 .pos, #mercury .planetShadow").addClass("pauseAnimation");
  $("#orbit2, #orbit2 .pos, #venus .planetShadow").addClass("pauseAnimation");
  $("#orbit3, #orbit3 .pos, #earth .planetShadow").addClass("pauseAnimation");
  $("#orbit4, #orbit4 .pos, #mars .planetShadow").addClass("pauseAnimation");
  $("#orbit5, #orbit5 .pos, #jupiter .planetShadow").addClass("pauseAnimation");
  $("#orbit6, #orbit6 .pos, #saturnShadow .planetShadow").addClass("pauseAnimation");
  $("#orbit7, #orbit7 .pos, #uranus .planetShadow").addClass("pauseAnimation");
  $("#orbit8, #orbit8 .pos, #neptune .planetShadow").addClass("pauseAnimation");
  $("#orbit9, #orbit9 .pos, #pluto .planetShadow").addClass("pauseAnimation");
}

function startSolarSystem(){ //Continues the solar system by removing a class containing: "animation-play-state: paused;"
  $("#orbit1, #orbit1 .pos, #mercury .planetShadow").removeClass("pauseAnimation");
  $("#orbit2, #orbit2 .pos, #venus .planetShadow").removeClass("pauseAnimation");
  $("#orbit3, #orbit3 .pos, #earth .planetShadow").removeClass("pauseAnimation");
  $("#orbit4, #orbit4 .pos, #mars .planetShadow").removeClass("pauseAnimation");
  $("#orbit5, #orbit5 .pos, #jupiter .planetShadow").removeClass("pauseAnimation");
  $("#orbit6, #orbit6 .pos, #saturnShadow .planetShadow").removeClass("pauseAnimation");
  $("#orbit7, #orbit7 .pos, #uranus .planetShadow").removeClass("pauseAnimation");
  $("#orbit8, #orbit8 .pos, #neptune .planetShadow").removeClass("pauseAnimation");
  $("#orbit9, #orbit9 .pos, #pluto .planetShadow").removeClass("pauseAnimation");
}
</script>
</head>

<body id="particles-js">
  <div id="title">Sol Systemet</div>
  <div id="subTitle">Klik på en planet for at få flere informationer</div>
  <div id="solarSystemControls">
    <div title="Play" class="btn btn-info" onclick="startSolarSystem();"><i class="fa fa-play" aria-hidden="true"></i></div>
    <div title="Pause" class="btn btn-info" onclick="pauseSolarSystem();"><i class="fa fa-pause" aria-hidden="true"></i></div>
  </div>
  <div id="quizButton">
  <a title="Prøv vores Quiz her" class="btn btn-primary" href="QuizSide.php">Prøv vores Quiz her</a>
</div>
  <div id="siteText">
    <?php
      echo nl2br($site["Content"]); //Gets the site content from the database from the field in the database called: "Content"
    ?>
  </div>
  <?php
  generateFrontPage($planets); //Generate the solar system and send along our database query to the PHP function
  generatePlanetMenuFpage($planetMenu); //Generate responsive planet menu and send along our database query to the PHP function
  ?>
</body>

</html>
<?php
  dbDisconnect($connect); //Closes the connection to the database
?>
