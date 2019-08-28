<div class="w3-panel w3-light-grey"  id="todo-panel">
	<div class="container-fluid w3-light-grey" id="latestNoticeDiv">
		<h2 class="w3-text-blue w3-myfont"><b>ToDo Panel</b></h2><br/>

      <form action="<?php echo(generate_link('todo', 'add_todo')); ?>" method="post">
      <table style="width: 100%">
      <tr> <td>User Name</td><td>Task</td><td>Date</td>
      </tr>
      <tr>
        <td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='user' id="user" onchange="isUserCorrect()" placeholder='user'  required></td>
        <td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='task' onchange="isTaskEntered()" id="task" placeholder='task' required></td>
        <td>
          <input class="w3-input w3-border w3-xlarge" style="display: inline" value="<?php echo date("Y/m/d")?>" name='date' placeholder='date'  disabled>
            </td>  
      </tr></table>
       From Time: <input class="w3-input w3-border w3-xlarge" type="time" style="width: 33%; display: inline" id="fromTime" name='fromTime' placeholder='fromTime'  required>
       To Time: <input class="w3-input w3-border w3-xlarge" type="time" style="width: 33%; display: inline" name='toTime' id="toTime" placeholder='toTime'  required onchange="isTimeCorrect()">
        <input class="w3-button w3-xlarge w3-blue w3-hover-cyan w3-ripple w3-round" style="float: right"  id="addTodo" type='submit' name='addTodo' value='Add Todo Task' disabled>
    </form>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError1" name='todoAddButtonError1' value="Enter User Name">Enter Correct User Name</h4>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError2" name='todoAddButtonError2' value="Enter Task">Enter User Task</h4>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError3" name='todoAddButtonError3' value="Enter Correct Time">Enter Corrrect Time</h4>
   </div>
 </div>
<br/><br/>
<div id="todoListDiv">
    <h2 class="w3-text-blue w3-myfont"><b>Todo List</b></h2>
    <table >
      <tr style="border: 1px solid black;background: white;">
        <th>TaskId</th>
        <th>Task</th>
        <th>From Time</th>
        <th>To Time</th>
        <th></th>
      </tr>
    <?php
    $i = 0;
    $taskList = array();
    while($i < $completedTodosLen + $todoLen) {  
      $x = "num_".$i;
      ?>
      <form action="<?php echo(generate_link('todo', 'disable_todo')); ?>" method="post">

        <?php if(${$x}['status'] == 0){ array_push($taskList, ${$x}['taskId']);?>
        <tr class="column w3-light-blue w3-border w3-large">
          <?php }else{ ?>
            <tr class="w3-light-gray w3-border w3-large">
          <?php  }?>
          <input type="hidden" name="taskIdDisable" value="<?php echo(${$x}['taskId']); ?>">
          <td class="w3-center" style="border: 1px solid #ddd;" > <?php echo(${$x}['taskId']); ?>
          </td>
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
      </tr>
      </form>

      <?php
      $i++;
    } ?>
</div>
<div>
<form action="<?php echo(generate_link('todo', 'upload_assignment')); ?>" method="post" enctype="multipart/form-data">
      <table style="width: 100%"><br/ >
        <input type="hidden" name="todayDate" value="<?php echo date("Y/m/d")?>">
      <h2>Assignment submission</h2>
      <tr> <td>TaskId</td><td>Select image to upload</td><td></td>
      </tr>
      <tr>
        <td>
          <select class="w3-input w3-border w3-xlarge w3-border-black w3-round-large w3-center" name='taskId'>
            <?php
            $i = 0;
            while($i < count($taskList)) {
              ?>
              <option class="w3-center" value="<?php echo $taskList[$i] ?>"><?php echo $taskList[$i] ?></option>
            <?php 
            $i++;
          } ?>

          </select>
          <!-- <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='taskId' placeholder='taskId'  required> -->
        </td>
        <td>
          <input type="file" name="fileToUpload" id="fileToUpload">
          </td>
        <td>
          <input class="w3-button w3-blue w3-xlarge w3-hover-cyan w3-ripple w3-round" type="submit" value="Upload Image" name="submit">
            </td>  
      </tr>
    </table>
    </form>
</div>
<br/><br/><br/>

<script type="text/javascript">
 function isUserCorrect(){
    if(document.getElementById('user').value == null || document.getElementById('user').value=='' || !(document.getElementById('user').value =='shivam' || document.getElementById('user').value =='vishnu')){
    document.getElementById('todoAddButtonError1').style.display = 'block';
    return false;
    }
     document.getElementById('todoAddButtonError1').style.display = 'none';
    return true;
  }
  function isTaskEntered(){
    if(document.getElementById('task').value == null || document.getElementById('task').value ==''){
    document.getElementById('todoAddButtonError2').style.display = 'block';
    return false;
    }
     document.getElementById('todoAddButtonError2').style.display = 'none';
    return true;
  }
function isTimeCorrect() {
  alert(document.getElementById('user').value=='');
  $fromTime = document.getElementById("fromTime").value;
  $toTime = document.getElementById("toTime").value;
  if ($toTime >= $fromTime){
    document.getElementById('addTodo').disabled  = false;
    // alert(document.getElementById('addTodo'));
  }else{
    document.getElementById('addTodo').disabled  = false;
  }
}</script>