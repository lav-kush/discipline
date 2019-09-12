<?php if($mcqLen > 0){ ?>
<div style="padding-left: 5% ">
<!-- <?php echo(generate_link('test', 'save_ans'));?> -->
<form method="post" action="mailto:lavlove000@mail.com?subject= Quiz 1;">
<h4>Check the answer to each multiple-choice question, and Click on the "Send MCQ" button to submit the information.</h4>
<?php
    $i = 0;
    $q_count = 1;
    $taskList = array();
    $x = "num_".$i;
    ?>
    <h3>Topic: <?php echo(${$x}['mcq_topic']); ?></h3>
    <?php
    $i = 0;
    while($i < $mcqLen) {
      $x = "num_".$i;
      ?>
    <p><?php echo($q_count); ?>.<pre> <?php echo(${$x}['mcq_question']); ?></pre>
    <input type="radio" name="q_<?php echo($q_count); ?>" value="<?php echo(${$x}['option1']); ?>">  <?php echo(${$x}['option1']); ?><BR>
    <input type="radio" name="q_<?php echo($q_count); ?>" value="<?php echo(${$x}['option2']); ?>">  <?php echo(${$x}['option2']); ?><BR>
    <input type="radio" name="q_<?php echo($q_count); ?>" value="<?php echo(${$x}['option3']); ?>">  <?php echo(${$x}['option3']); ?><BR>
    <input type="radio" name="q_<?php echo($q_count); ?>" value="<?php echo(${$x}['option4']); ?>">  <?php echo(${$x}['option4']); ?><BR>
    </p><BR>
  <?php
      $q_count++;
      $i++;
    } ?>
    <br><br>
    <input type="submit" value="Send MCQ" name="Save_Ans">
    <input type="reset" value="Clear Form">
</form>
</div>
<?php   } else{ ?>
	<h3> No Test For Today!</h3><hr>
<?php  } ?>

<br/>
<hr>