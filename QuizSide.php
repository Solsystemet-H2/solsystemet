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




<iframe id="quizFrame" src="quiz.php"></iframe>


</body>

</html>
