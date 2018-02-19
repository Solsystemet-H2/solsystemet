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
    <img id="sun" class="planet" src="images\planets\sun.png" />
    <img id="mercury" class="planet" src="images\planets\mercury.png" />
    <img id="venus" class="planet" src="images\planets\venus.png" />
    <img id="earth" class="planet" src="images\planets\earth.png" />
    <img id="mars" class="planet" src="images\planets\mars.png" />
    <img id="jupiter" class="planet" src="images\planets\jupiter.png" />
    <img id="saturn" class="planet" src="images\planets\saturn.png" />
    <img id="uranus" class="planet" src="images\planets\uranus.png" />
    <img id="neptune" class="planet" src="images\planets\neptune.png" />
    <img id="pluto" class="planet" src="images\planets\pluto.png" />
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
