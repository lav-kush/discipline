<div class="w3-panel w3-light-grey"  id="todo-panel">
	<div class="container-fluid w3-light-grey" id="latestNoticeDiv">
		<h2 class="w3-text-blue w3-myfont"><b>ToDo Panel</b></h2><br/>

      <form action="<?php echo(generate_link('todo', 'add_todo')); ?>" method="post">
      <table style="width: 100%">
      <tr> <td>User Name</td><td>Task</td><td>Date</td>
      </tr>
      <tr>
        <td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='user' placeholder='user'  required></td>
        <td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='task' placeholder='task'  required></td>
        <td>
          <input class="w3-input w3-border w3-xlarge" style="display: inline" value="<?php echo date("Y/m/d")?>" name='date' placeholder='date'  disabled>
            </td>  
      </tr></table>
       From Time: <input class="w3-input w3-border w3-xlarge" type="time" style="width: 33%; display: inline" id="fromTime" name='fromTime' placeholder='fromTime'  required>
       To Time: <input class="w3-input w3-border w3-xlarge" type="time" style="width: 33%; display: inline" name='toTime' id="toTime" placeholder='toTime'  required onchange="isTimeCorrect()">
        <input class="w3-button w3-xlarge w3-blue w3-hover-cyan w3-ripple w3-round" style="float: right"  id="addTodo" type='submit' name='addTodo' value='Add Todo Task' disabled>
    </form>
    </table>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError1" name='todoAddButtonError1' value="Enter User Name">Enter User Name</h4>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError2" name='todoAddButtonError2' value="Enter Task">Enter User Task</h4>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError3" name='todoAddButtonError3' value="Enter Correct Time">Enter Corrrect Time</h4>
   </div>
<br/><br/>
<div id="todoListDiv">
    <h2 class="w3-text-blue w3-myfont"><b>Todo List</b></h2>
    <table class="row">
      <tr class="column" style="border: 1px solid black;background: white;">
        <th>Task</th>
        <th>From Time</th>
        <th>To Time</th>
        <th></th>
      </tr>
    <?php
    $i = 0;
    while($i < $completedTodosLen + $todoLen) {  
      $x = "num_".$i;
      ?>
      <form action="<?php echo(generate_link('todo', 'disable_todo')); ?>" method="post">
        <?php if(${$x}['status'] == 0){ ?>
        <tr class="column w3-light-blue w3-border w3-large">
          <?php }else{ ?>
            <tr class="w3-light-gray w3-border w3-large">
          <?php  }?>
           <td style="border: 1px solid #ddd;"><?php echo(${$x}['task']); ?></td>
          <td style="border: 1px solid #ddd;"><?php echo(${$x}['fromTime']); ?></td>
           <td style="border: 1px solid #ddd;"><?php echo(${$x}['toTime']); ?></td>
        <td>
          <?php if(${$x}['status'] == 0){ ?>
            <input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" id="disableTodoButton" type='submit' name='disableTodo' value='Task Done'>
          <?php }else{ ?>
            Completed <?php }?>
          </td>
        </tr>
      </form>

      <?php
      $i++;
    } ?>


<form action="uploader" method="post" enctype="multipart/form-data">
    <table>
    <tr>Select image to upload:    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit"></tr>
      </table>
</form>
</div>
<script type="text/javascript">
 // function isUserCorrect(){
  //   alert(document.getElementById('user').value);
  //   if(document.getElementById('user').value == null){
  //   document.getElementById('todoAddButtonError1').style.display = 'block';
  //   return false;
  //   }
  //   return true;
  // }
  // function isTaskEntered(){
  //   alert(document.getElementById('task').value);
  //   if(document.getElementById('task').value == null){
  //   document.getElementById('todoAddButtonError2').style.display = 'block';
  //   return false;
  //   }
  //   return true;
  // }
function isTodoCorrect() {
  $fromTime = document.getElementById("fromTime").value;
  $toTime = document.getElementById("toTime").value;
  // if(document.getElementById('addTodo').value == null){
  //   document.getElementById('todoAddButtonError1').style.display = 'block';
  // }
  if ($toTime >= $fromTime){
    document.getElementById('addTodo').disabled  = false;
    alert(document.getElementById('addTodo'));
  }
}</script>