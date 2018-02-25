<?php
ini_set('display_errors', 1);
include("config.php");

$connect = dbConnect("localhost","root","pass","solsystemDB");
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

    <link rel="stylesheet" href="style2.css">

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
    <div title="Play" class="btn btn-primary" onclick="startSolarSystem();"><i class="fa fa-play" aria-hidden="true"></i></div>
    <div title="Pause" class="btn btn-primary" onclick="pauseSolarSystem();"><i class="fa fa-pause" aria-hidden="true"></i></div>
  </div>
  <div id="siteText">
    <?php
      echo nl2br($site["Content"]);
    ?>
  </div>

  <!--
  <div id="mainSpaceContainer">
  <div id="spaceContainer">
    <div id="sun" planetOrder="1" class="planet">
      <img title="Solen" alt="Solen" src="images\planets\sun.png" />
      <div class="planetName">Solen</div>
    </div>

        <div id="orbit1" class="planetOrbit">
          <div class="pos">
            <div id="mercury" planetOrder="2" class="planet" >
              <div class="planetShadow"></div>
              <img title="Merkur" alt="Merkur" src="images\planets\mercury.png" />
              <div class="planetName">Merkur</div>
            </div>
          </div>
        </div>

        <div id="orbit2" class="planetOrbit">
          <div class="pos">
            <div id="venus" planetOrder="3" class="planet">
              <div class="planetShadow"></div>
              <img title="Venus" alt="Venus" src="images\planets\venus.png" />
              <div class="planetName">Venus</div>
            </div>
          </div>
        </div>

        <div id="orbit3" class="planetOrbit">
          <div class="pos">
            <div id="earth" planetOrder="4" class="planet">
              <div class="planetShadow"></div>
              <img title="Jorden" alt="Jorden" src="images\planets\earth.png" />
              <div class="planetName">Jorden</div>
            </div>
          </div>
        </div>

        <div id="orbit4" class="planetOrbit">
          <div class="pos">
            <div id="mars" planetOrder="5" class="planet">
              <div class="planetShadow"></div>
              <img title="Mars" alt="Mars" src="images\planets\mars.png" />
              <div class="planetName">Mars</div>
            </div>
          </div>
        </div>

        <div id="orbit5" class="planetOrbit">
          <div class="pos">
            <div id="jupiter" planetOrder="6" class="planet">
              <div class="planetShadow"></div>
              <img title="Jupiter" alt="Jupiter" src="images\planets\jupiter.png" />
              <div class="planetName">Jupiter</div>
            </div>
          </div>
        </div>

        <div id="orbit6" class="planetOrbit">
          <div class="pos">
            <div id="saturnShadow" planetOrder="7" class="planet"></div>
            <div id="saturn" planetOrder="7" class="planet">
              <img title="Saturn" alt="Saturn" src="images\planets\saturn.png" />
              <div class="planetName">Saturn</div>
            </div>
          </div>
        </div>

        <div id="orbit7" class="planetOrbit">
          <div class="pos">
            <div id="uranus" planetOrder="8" class="planet">
              <div class="planetShadow"></div>
              <img title="Uranus" alt="Uranus" src="images\planets\uranus.png" />
              <div class="planetName">Uranus</div>
            </div>
          </div>
        </div>

        <div id="orbit8" class="planetOrbit">
          <div class="pos">
            <div id="neptune" planetOrder="9" class="planet">
              <div class="planetShadow"></div>
              <img title="Neptun" alt="Neptun" src="images\planets\neptune.png" />
              <div class="planetName">Neptun</div>
            </div>
          </div>
        </div>

        <div id="orbit9" class="planetOrbit">
          <div class="pos">
            <div id="pluto" planetOrder="10" class="planet">
              <div class="planetShadow"></div>
              <img title="Pluto" alt="Pluto" src="images\planets\pluto.png" />
              <div class="planetName">Pluto</div>
            </div>
          </div>
        </div>


  </div>
</div>-->


<?php
generateFrontPage($planets);
generatePlanetMenuFpage($planetMenu);
?>
</body>

</html>
<?php
  dbDisconnect($connect);
?>
