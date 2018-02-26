<?php
  ini_set('display_errors', 1);
  include($_SERVER['DOCUMENT_ROOT']."/config.php");

  //$connect = dbConnect("localhost","root","","solsystemdb2");
  $connect = dbConnect("localhost","root","pass","solsystemDB");
  $questions = selectRow($connect, "Question", "*", "", "", "", "", "", true);
?>
<script>
var quizJSON = {
    "info": {
        "name":    "Test Your Knowledge!!",
        "main":    "<p>Think you're smart enough to be on Jeopardy? Find out with this super crazy knowledge quiz!</p>",
        "results": "<h5>Learn More</h5><p>Etiam scelerisque, nunc ac egestas consequat, odio nibh euismod nulla, eget auctor orci nibh vel nisi. Aliquam erat volutpat. Mauris vel neque sit amet nunc gravida congue sed sit amet purus.</p>",
        "level1":  "Jeopardy Ready",
        "level2":  "Jeopardy Contender",
        "level3":  "Jeopardy Amateur",
        "level4":  "Jeopardy Newb",
        "level5":  "Stay in school, kid..." // no comma here
    },
    "questions": [

      <?php
      $resultCount = mysqli_num_rows ($questions);
      $i = 1;
      while($row = $questions->fetch_array(MYSQLI_ASSOC)){
        $answers = selectRow($connect, "AnswerOption", "*", "QuestionID", $row["QuestionID"], "", "", "", true);
        ?>
        {
            "q": "<?php echo $row["Question"];?>",
            "a": [
              <?php
                $resultCount2 = mysqli_num_rows ($answers);
                $i2 = 1;
                while($row2 = $answers->fetch_array(MYSQLI_ASSOC)){
                  ?>
                    {"option": "<?php echo $row2["Answer"];?>",      "correct": <?php if($row2["CorrectAnswer"] == 1){echo "true";}else{echo "false";}?>},
                  <?php
                }
                ?>
            ],
            "correct": "<?php echo $row["CorrectText"];?>",
            "incorrect": "<?php echo $row["IncorrectText"];?>" // no comma here
        },
        <?php
      }
      ?>
    ]
};
</script>
