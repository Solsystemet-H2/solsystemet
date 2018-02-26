<?php
ini_set('display_errors', 1);
include("config.php");

$connect = dbConnect("localhost","root","","solsystemdb2");
$site = selectRow($connect, "Site", "*", "ID", "1", "", "", "", "");
$planets = selectRow($connect, "Planet", "*", "", "", "", "PlanetsOrder", "ASC", true);
$planetMenu = selectRow($connect, "Planet", "*", "", "", "", "PlanetsOrder", "ASC", true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet</title>

    <link rel="stylesheet" href="style.css">

    <script src="scripts/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="scripts/bootstrap/css/bootstrap.min.css">
    <script src="scripts\bootstrap\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="scripts/mCustomScrollbar/mCustomScrollbar.min.css">
    <script src="scripts\mCustomScrollbar\mCustomScrollbar.min.js"></script>

    <link rel="stylesheet" href="scripts/font-awesome/css/font-awesome.min.css">

    <script src="scripts\particles.js\particles.min.js"></script>



<script>
$(function() {
  particlesJS.load('particles-js', 'scripts/particles.js/spaceBG.json', function() {});
  $("#siteText").mCustomScrollbar({
    scrollInertia:150,
    mouseWheel:{ scrollAmount: 20 },
  });

  $(".planet").on("click",function(){
    window.location = "planet.php?id="+$(this).attr("planetOrder");
  });

  $("#orbit1, #orbit1 .pos, #mercury .planetShadow").css("animation-delay", "-"+randomStartPos(3)+"s");
  $("#orbit2, #orbit2 .pos, #venus .planetShadow").css("animation-delay", "-"+randomStartPos(7)+"s");
  $("#orbit3, #orbit3 .pos, #earth .planetShadow").css("animation-delay", "-"+randomStartPos(12)+"s");
  $("#orbit4, #orbit4 .pos, #mars .planetShadow").css("animation-delay", "-"+randomStartPos(23)+"s");
  $("#orbit5, #orbit5 .pos, #jupiter .planetShadow").css("animation-delay", "-"+randomStartPos(142)+"s");
  $("#orbit6, #orbit6 .pos, #saturnShadow .planetShadow").css("animation-delay", "-"+randomStartPos(353)+"s");
  $("#orbit7, #orbit7 .pos, #uranus .planetShadow").css("animation-delay", "-"+randomStartPos(1008)+"s");
  $("#orbit8, #orbit8 .pos, #neptune .planetShadow").css("animation-delay", "-"+randomStartPos(1977)+"s");
  $("#orbit9, #orbit9 .pos, #pluto .planetShadow").css("animation-delay", "-"+randomStartPos(3500)+"s");

});

function randomStartPos(maxNum){
  return Math.floor(Math.random() * (maxNum - 0 + 1)) + 0;
}

function pauseSolarSystem(){
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

function startSolarSystem(){
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
  <div id="siteText">
    <?php
      echo nl2br($site["Content"]);
    ?>
  </div>
  <?php
  generateFrontPage($planets);
  generatePlanetMenuFpage($planetMenu);
  ?>
</body>

</html>
<?php
  dbDisconnect($connect);
?>
