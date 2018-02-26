<?php
  ini_set('display_errors', 1);//Enable phgp errors
  include($_SERVER['DOCUMENT_ROOT']."/config.php"); //tba

  //$connect = dbConnect("localhost","root","","solsystemdb2");
  $connect = dbConnect("localhost","root","pass","solsystemDB"); //Server DB connect string
  $questions = selectRow($connect, "Question", "*", "", "", "", "", "", true); //Select question text
  $levels = selectRow($connect, "Level", "*", "", "", "", "LevelID", "ASC", true); //Select level text
  $quiz = selectRow($connect, "Quiz", "*", "", "", "", "", "", ""); //Select quiz title, main and results
?>
<script>
var quizJSON = { //JSON file for the slickQuiz plugin
    "info": {
        "name":    "<?php echo $quiz["Title"];?>",
        "main":    "<?php echo $quiz["Subtitle"];?>",
        "results": "<?php echo $quiz["EndResult"];?>",
        <?php
        $ii = 1;
        while($levelRow = $levels->fetch_array(MYSQLI_ASSOC)){ //while there are entrys in the table, keep going and echo the value
          echo '"level'.$ii.'":"'.$levelRow["Level"].'",';
        $ii++;
}
        ?>



    },
    "questions": [

      <?php

      $i = 1;
      while($row = $questions->fetch_array(MYSQLI_ASSOC)){//while there are entrys in the table, keep going and echo the value
        $answers = selectRow($connect, "AnswerOption", "*", "QuestionID", $row["QuestionID"], "", "", "", true);
        ?>
        {
            "q": "<?php echo $row["Question"];?>",
            "a": [
              <?php

                $i2 = 1;
                while($row2 = $answers->fetch_array(MYSQLI_ASSOC)){// for each question loop trough answers for that question and echo
                  ?>
                    {"option": "<?php echo $row2["Answer"];?>",      "correct": <?php if($row2["CorrectAnswer"] == 1){echo "true";}else{echo "false";}?>},
                  <?php
                }
                ?>
            ],
            "correct": "<span id ='correct'><?php echo $row["CorrectText"];?></span>", //text for correct answer
            "incorrect": "<span id = 'inCorrect'><?php echo $row["IncorrectText"];?></span>" // text for incorrect answer
          },
        <?php
      }
      ?>
    ]
};
</script>
