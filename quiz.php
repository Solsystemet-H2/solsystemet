<!DOCTYPE html>
<html>
<head>
<script src="scripts/slickSquiz/JS/jquery-1.7.min.js"></script>
<script src="scripts/slickSquiz/JS/slickQuiz-config.js"></script>
<script src="scripts/slickSquiz/JS/slickQuiz.js"></script>

<link href="scripts/slickSquiz/CSS/reset.css" media="screen" rel="stylesheet" type="text/css">
<link href="scripts/slickSquiz/CSS/slickQuiz.css" media="screen" rel="stylesheet" type="text/css">
<link href="scripts/slickSquiz/CSS/master.css" media="screen" rel="stylesheet" type="text/css">

<link href="quizStyle.css" media="screen" rel="stylesheet" type="text/css">

<script>
$(function () {
    $('#spaceQuiz').slickQuiz();

    window.addEventListener("resize", function () {
        resizeNotify();
    });
});

$(window).on("load",function(){
  window.setInterval(function(){
    resizeNotify();
  }, 500);
});

function resizeNotify() {
    window.parent.postMessage($('body').height() + "px", "*");
}
</script>
</head>
<body id="spaceQuiz">
  <div class="test">
    <h1 class="quizName"></h1>
    <div class="quizArea">
        <div class="quizHeader">
            <a class="startQuiz" href="">Get Started!</a>
        </div>
    </div>
    <div class="quizResults">
        <h3 class="quizScore">You Scored: <span></span></h3>
        <h3 class="quizLevel"><strong>Ranking:</strong> <span></span></h3>
        <div class="quizResultsCopy"></div>
    </div>
  </div>
</body>
</html>
