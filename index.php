<?php
include("config.php");

$connect = dbConnect("localhost","root","pass","solsystemDB");
$site = selectRow($connect, "site", "*", "ID", "1", "", "", "", "");
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
    scrollInertia:100,
    mouseWheel:{ scrollAmount: 50 },
  });

  $(".planet").on("click",function(){
    window.location = "planet.php?id="+$(this).attr("planetOrder");
  });
});
</script>
</head>

<body id="particles-js">
  <div id="title">Sol Systemet</div>
  <div id="siteText">
    <?php
      echo nl2br($site["Content"]);
    ?>
  </div>
  <div id="spaceContainer">
    <div id="sun" planetOrder="1" class="planet">
      <img title="Solen" alt="Solen" src="images\planets\sun.png" />
      <div class="planetName">Solen</div>
    </div>
    <div id="mercury" planetOrder="2" class="planet" >
      <img title="Merkur" alt="Merkur" src="images\planets\mercury.png" />
      <div class="planetName">Merkur</div>
    </div>
    <div id="venus" planetOrder="3" class="planet">
      <img title="Venus" alt="Venus" src="images\planets\venus.png" />
      <div class="planetName">Venus</div>
    </div>
    <div id="earth" planetOrder="4" class="planet">
      <img title="Jorden" alt="Jorden" src="images\planets\earth.png" />
      <div class="planetName">Jorden</div>
    </div>
    <div id="mars" planetOrder="5" class="planet">
      <img title="Mars" alt="Mars" src="images\planets\mars.png" />
      <div class="planetName">Mars</div>
    </div>
    <div id="jupiter" planetOrder="6" class="planet">
      <img title="Jupiter" alt="Jupiter" src="images\planets\jupiter.png" />
      <div class="planetName">Jupiter</div>
    </div>
    <div id="saturn" planetOrder="7" class="planet">
      <img title="Saturn" alt="Saturn" src="images\planets\saturn.png" />
      <div class="planetName">Saturn</div>
    </div>
    <div id="uranus" planetOrder="8" class="planet">
      <img title="Uranus" alt="Uranus" src="images\planets\uranus.png" />
      <div class="planetName">Uranus</div>
    </div>
    <div id="neptune" planetOrder="9" class="planet">
      <img title="Neptun" alt="Neptun" src="images\planets\neptune.png" />
      <div class="planetName">Neptun</div>
    </div>
    <div id="pluto" planetOrder="10" class="planet">
      <img title="Pluto" alt="Pluto" src="images\planets\pluto.png" />
      <div class="planetName">Pluto</div>
    </div>
    <div id="orbit1" class="planetOrbit"></div>
    <div id="orbit2" class="planetOrbit"></div>
    <div id="orbit3" class="planetOrbit"></div>
    <div id="orbit4" class="planetOrbit"></div>
    <div id="orbit5" class="planetOrbit"></div>
    <div id="orbit6" class="planetOrbit"></div>
    <div id="orbit7" class="planetOrbit"></div>
    <div id="orbit8" class="planetOrbit"></div>
    <div id="orbit9" class="planetOrbit"></div>
  </div>
</body>

</html>
<?php
  dbDisconnect($connect);
?>
