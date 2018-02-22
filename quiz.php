<html lang = "en">

<head>

<script src="scripts/slickSquiz/JS/jquery-1.7.min.js"></script>
<script src="scripts/slickSquiz/JS/slickQuiz-config.js"></script>
<script src="scripts/slickSquiz/JS/slickQuiz.js"></script>

<link href="scripts/slickSquiz/CSS/reset.css" media="screen" rel="stylesheet" type="text/css">
<link href="scripts/slickSquiz/CSS/slickQuiz.css" media="screen" rel="stylesheet" type="text/css">
<link href="scripts/slickSquiz/CSS/master.css" media="screen" rel="stylesheet" type="text/css">


<script>
$(function () {
    $('#spaceQuiz').slickQuiz();

    window.addEventListener("resize", function () {
        resizeNotify();
    });
    $("body").on("click",function(){
      resizeNotify();
    });
});

function resizeNotify() {
    parent.postMessage($('body').height() + "px", "*");
}
</script>

</head>
<body id="spaceQuiz">
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
</body>
</html>
