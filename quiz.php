<?php
ini_set('display_errors', 1); //Enable phgp errors
?>
<!DOCTYPE html>
<html>
<head>

<!-- Load javascript files and style sheets start -->
<link rel="stylesheet" href="scripts/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="scripts/font-awesome/css/font-awesome.min.css">

<script src="scripts/slickSquiz/JS/jquery-1.7.min.js"></script>

<script src="scripts/slickSquiz/JS/slickQuiz.js"></script>

<link href="scripts/slickSquiz/CSS/reset.css" media="screen" rel="stylesheet" type="text/css">
<link href="scripts/slickSquiz/CSS/slickQuiz.css" media="screen" rel="stylesheet" type="text/css">
<link href="scripts/slickSquiz/CSS/master.css" media="screen" rel="stylesheet" type="text/css">

<link href="quizStyle.css" media="screen" rel="stylesheet" type="text/css">
<!-- Load javascript files and style sheets end -->
<script>
$(function () { //When DOM is ready do the following
    $('#spaceQuiz').slickQuiz(); //Generates quiz from the jQuery plugin slickQuiz

    window.addEventListener("resize", function () {
        resizeNotify();
    });
});

$(window).on("load",function(){ //runs rezizeNotify every half second
  window.setInterval(function(){
    resizeNotify();
  }, 500);
});

function resizeNotify() { //sends a message to parent with size if located inside iframe
    window.parent.postMessage($('body').height() + "px", "*");
}

</script>
<?php
  include("scripts/slickSquiz/JS/slickQuiz-config.php"); //includes the config file for the slickQuiz plugin
?>
</head>
<!--body contains the elements changed in the config file-->
<body id="spaceQuiz">
  <div class="test">
    <h1 class="quizName"></h1>
    <div class="quizArea">
        <div class="quizHeader">
            <a class="startQuiz btn btn-info btn-lg" href="">Start quizzen <i class="fa fa-rocket" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="quizResults">
        <h3 class="quizScore">Dit resultat: <span></span></h3>
        <h3 class="quizLevel"><strong>Satus:</strong> <span></span></h3>
        <div class="quizResultsCopy"></div>
    </div>
  </div>
</body>
</html>
