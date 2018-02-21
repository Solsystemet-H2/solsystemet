<?php
  include("config.php");

  $connect = DbConnect("localhost","root","","solsystemdb");
  $planet = SelectRow($connect, "planet", "Name", "Solen", "", "");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet - <?php echo $planet["name"]; ?></title>

    <link rel="stylesheet" href="planetStyle.css">

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

  $("#planetInfo").mCustomScrollbar({
    scrollInertia:100,
    mouseWheel:{ scrollAmount: 50 },
  });
});
</script>
</head>

<body id="particles-js">
  <div id="mainContainer">
    <div class="container">
      <div class="row">
        <div id="planetImageContainer" class="col-md-6 col-sm-12 editable">
          <img title="Planet Navn" alt="Planet Navn" id="planetImage" src="images/planetsRealistic/mars.png" />
        </div>
        <div id="planetInfoContainer" class="col-md-6 col-sm-12 editable">
          <h1 id="planetName"><?php echo $planet["Name"]; ?></h1>
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
              echo nl2br($planet["Descreption"]);
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="planetMenu">
    <div id="sun" class="planet">
      <img title="Solen" alt="Solen" src="images\planets\sun.png" />
      <div class="planetName">Solen</div>
    </div>
    <div id="mercury" class="planet" >
      <img title="Merkur" alt="Merkur" src="images\planets\mercury.png" />
      <div class="planetName">Merkur</div>
    </div>
    <div id="venus" class="planet">
      <img title="Venus" alt="Venus" src="images\planets\venus.png" />
      <div class="planetName">Venus</div>
    </div>
    <div id="earth" class="planet">
      <img title="Jorden" alt="Jorden" src="images\planets\earth.png" />
      <div class="planetName">Jorden</div>
    </div>
    <div id="mars" class="planet">
      <img title="Mars" alt="Mars" src="images\planets\mars.png" />
      <div class="planetName">Mars</div>
    </div>
    <div id="jupiter" class="planet">
      <img title="Jupiter" alt="Jupiter" src="images\planets\jupiter.png" />
      <div class="planetName">Jupiter</div>
    </div>
    <div id="saturn" class="planet">
      <img title="Saturn" alt="Saturn" src="images\planets\saturn.png" />
      <div class="planetName">Saturn</div>
    </div>
    <div id="uranus" class="planet">
      <img title="Uranus" alt="Uranus" src="images\planets\uranus.png" />
      <div class="planetName">Uranus</div>
    </div>
    <div id="neptune" class="planet">
      <img title="Neptun" alt="Neptun" src="images\planets\neptune.png" />
      <div class="planetName">Neptun</div>
    </div>
    <div id="pluto" class="planet">
      <img title="Pluto" alt="Pluto" src="images\planets\pluto.png" />
      <div class="planetName">Pluto</div>
    </div>
  </div>
</body>

</html>
<?php
  DbDisconnect($connect);
?>
