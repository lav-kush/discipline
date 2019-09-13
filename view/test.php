<?php 
if($end_time != -1){
  $current_time = date("H:i:s");
  $date1 = strtotime("2016-09-12 ". $current_time);
  $date2 = strtotime("2018-09-12 ".$end_time); 
  $diff = abs($date2 - $date1);
  $years = floor($diff / (365*60*60*24));
  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
  $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
  $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60)/ 60);
  $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
?>
<h4> Left Time <?php echo ($hours.'Hr:'.$minutes.'Min: '.$seconds.'Sec'); }?></h4>
<?php if($mcqLen > 0){ ?>
<div style="padding-left: 5% ">
<!--mailto:lavlove000@mail.com?subject= Quiz 1;   -->
<form method="post" action="<?php echo(generate_link('test', 'save_ans'));?>">
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
    <!-- <input type="hidden" name="q_id_<?php echo($q_count); ?>" value="<?php echo(${$x}['mcq_q_id']); ?>"> -->
    <p><?php echo($q_count); ?>.<pre> <?php echo(${$x}['mcq_question']); ?></pre>
    <input type="radio" name="q_<?php echo(${$x}['mcq_q_id']); ?>" value="<?php echo(${$x}['option1']); ?>">  <?php echo(${$x}['option1']); ?><BR>
    <input type="radio" name="q_<?php echo(${$x}['mcq_q_id']); ?>" value="<?php echo(${$x}['option2']); ?>">  <?php echo(${$x}['option2']); ?><BR>
    <input type="radio" name="q_<?php echo(${$x}['mcq_q_id']); ?>" value="<?php echo(${$x}['option3']); ?>">  <?php echo(${$x}['option3']); ?><BR>
    <input type="radio" name="q_<?php echo(${$x}['mcq_q_id']); ?>" value="<?php echo(${$x}['option4']); ?>">  <?php echo(${$x}['option4']); ?><BR>
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
  <br/><br/><br/><br/>
	<h3 style="text-align: center"> No Test For Today!</h3>
  <h4 style="text-align: center">Enjoy!</h4><hr>
<?php  } ?>
<br/><br/><br/><br/>
<br/>
<hr>
