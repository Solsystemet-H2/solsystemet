<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sol Systemet</title>

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
      $("#siteText").mCustomScrollbar({
        scrollInertia:100,
        mouseWheel:{ scrollAmount: 50 },
      });

      $(".planet").on("click",function(){
        window.location = "planet.php?id="+$(this).attr("id");
      });


      window.addEventListener("message", function (event) {
        document.getElementById("quizFrame").style.height = event.data;
      });

    });
    </script>
</head>
<body id="particles-js" class="centerMe">

<div id="backBtn" class="fixed"><a href="index.php"><i class="fa fa-chevron-left" aria-hidden="true"></i>Tilbage til solsystemet</a></div>


<iframe id="quizFrame" src="quiz.php" style="border:0px;"></iframe>


</body>

</html>
