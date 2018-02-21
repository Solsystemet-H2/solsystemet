<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet - Planet navn</title>

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
          <h1 id="planetName">Planet navn</h1>
          <div id="planetInfo">
            <?php
              echo nl2br('
              <strong>Lorem:</strong> Ipsum
              <strong>Lorem:</strong> Ipsum
              <strong>Lorem:</strong> Ipsum
              <strong>Lorem:</strong> Ipsum
              <strong>Lorem:</strong> Ipsum

              Solen, vores eneste stjerne i solsystemet.
Solen er den som er afgørende for næsten alt liv på Jorden.
Solen er lavet af brint og helium, og ja, det er det der får din stemme til at lyde sjovt.
Solen er meget vigtig at have da det er den der giver varme og lys.
Solen er rigtig rigtig rigtig langt væk fra Jorden, faktisk er den så lang væk at der skal 1,4 milliarder fodboldbaner til før du kan komme til solen fra Jorden.
Men siden Solen er så langt væk så for at den kan varme vores Jord skal den jo også være rigtig varm.
Solen er ekstrem varm, den er 5.507 grader varm, og det er 55 gange så varmt som når man koger vand og jo varmere noget bliver jo mere skifter det farve.
Man kan se det på metal, vis du ser et jernrør og nogen varmer det op, så vil det gå fra orange, til rød til hvid, og det er derfor der er hvidt lys udenfor og ikke blåt eller grønt.
Symbolet for Solen i astronomien er en cirkel med en prik i centrum: ☉. I øvrigt anvendes ordet "sol" også som synonym for "stjerne".');
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
