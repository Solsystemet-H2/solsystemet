<?php
  ini_set('display_errors', 1);
  include($_SERVER['DOCUMENT_ROOT']."/config.php");

  //$connect = dbConnect("localhost","root","","solsystemdb2");
  $connect = dbConnect("localhost","root","pass","solsystemDB");
  $questions = selectRow($connect, "Question", "*", "", "", "", "", "", true);
  $levels = selectRow($connect, "Level", "*", "", "", "", "LevelID", "ASC", true);
  $quiz = selectRow($connect, "Quiz", "*", "", "", "", "", "", "");
?>
<script>
var quizJSON = {
    "info": {
        "name":    "<?php echo $quiz["Title"];?>",
        "main":    "<?php echo $quiz["Subtitle"];?>",
        "results": "<?php echo $quiz["EndResult"];?>",
        <?php
        $ii = 1;
        while($levelRow = $levels->fetch_array(MYSQLI_ASSOC)){
          echo '"Level'.$ii.'":'. ["Level"];
        $ii++;
        "level":  ,
        ?>


        "level2":  "Jeopardy Contender",
        "level3":  "Jeopardy Amateur",
        "level4":  "Jeopardy Newb",
        "level5":  "Stay in school, kid..." // no comma here
    },
    "questions": [

      <?php

      $i = 1;
      while($row = $questions->fetch_array(MYSQLI_ASSOC)){
        $answers = selectRow($connect, "AnswerOption", "*", "QuestionID", $row["QuestionID"], "", "", "", true);
        ?>
        {
            "q": "<?php echo $row["Question"];?>",
            "a": [
              <?php

                $i2 = 1;
                while($row2 = $answers->fetch_array(MYSQLI_ASSOC)){
                  ?>
                    {"option": "<?php echo $row2["Answer"];?>",      "correct": <?php if($row2["CorrectAnswer"] == 1){echo "true";}else{echo "false";}?>},
                  <?php
                }
                ?>
            ],
            "correct": "<span id ='correct'><?php echo $row["CorrectText"];?></span>",
            "incorrect": "<span id = 'inCorrect'><?php echo $row["IncorrectText"];?></span>" // no comma here
        },
        <?php
      }
      ?>
    ]
};
</script>
