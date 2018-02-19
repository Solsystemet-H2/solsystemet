<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet</title>

    <link rel="stylesheet" href="style.css">

    <script src="scripts/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet" href="scripts/bootstrap/css/bootstrap.min.css">
    <script src="scripts\bootstrap\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="scripts/font-awesome/css/font-awesome.min.css">

    <script src="scripts\particles.js\particles.min.js"></script>


<script>
$(window).on("load",function(){
  particlesJS.load('particles-js', 'scripts/particles.js/spaceBG.json', function() {});
});
</script>
</head>

<body id="particles-js">
  <div id="title">Sol Systemet</div>
  <div id="spaceContainer">
    <div  id="sun" class="planet"><img src="images\planets\sun.png" /><div class="planetName">Solen</div></div>
    <div id="mercury" class="planet" ><img src="images\planets\mercury.png" /><div class="planetName">Merkur</div></div>
    <div id="venus" class="planet"><img src="images\planets\venus.png" /><div class="planetName">Venus</div></div>
    <div id="earth" class="planet"><img src="images\planets\earth.png" /><div class="planetName">Jorden</div></div>
    <div id="mars" class="planet"><img src="images\planets\mars.png" /><div class="planetName">Mars</div></div>
    <div id="jupiter" class="planet"><img src="images\planets\jupiter.png" /><div class="planetName">Jupiter</div></div>
    <div id="saturn" class="planet"><img src="images\planets\saturn.png" /><div class="planetName">Saturn</div></div>
    <div id="uranus" class="planet"><img src="images\planets\uranus.png" /><div class="planetName">Uranus</div></div>
    <div id="neptune" class="planet"><img src="images\planets\neptune.png" /><div class="planetName">Neptun</div></div>
    <div id="pluto" class="planet"><img src="images\planets\pluto.png" /><div class="planetName">Pluto</div></div>
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
