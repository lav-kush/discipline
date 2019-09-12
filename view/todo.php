<div class="w3-panel w3-light-grey"  id="todo-panel">
	<div class="container-fluid w3-light-grey" id="latestNoticeDiv">
		<h2 class="w3-text-blue w3-myfont"><b>ToDo Panel</b></h2><br/>

      <form action="<?php echo(generate_link('todo', 'add_todo')); ?>" method="post">
       <p><label>User Name</label>
		<input class="w3-mobile w3-input w3-border w3-xlarge w3-border-black w3-round-large" style="width:auto" type='text'  id="user" onchange="isUserCorrect()" placeholder='user'  required>
        </p><br/>
       <p><label>Task</label>
		<input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='task' onchange="isTaskEntered()" id="task" placeholder='task' required>
        </p><br/>
        <p><label>Date</label>
		<input class="w3-input w3-border w3-xlarge" style="display: inline" value="<?php echo date("Y/m/d")?>" id = "taskDate"  name='taskDate' placeholder='date' readonly>
         </p><br/>
        <p><label>From Time</label>
		<input class="w3-input w3-border w3-xlarge" type="time"  id="fromTime" name='fromTime' placeholder='fromTime'  required>
        </p><br/>
       <p><label>To Time</label>
		<input class="w3-input w3-border w3-xlarge" type="time"  name='toTime' id="toTime" placeholder='toTime'  required onchange="isTimeCorrect()">
        </p><br/>
        <input class="w3-button w3-xlarge w3-blue w3-hover-cyan w3-ripple w3-round" style="float: right"  id="addTodo" type='submit' name='addTodo' value='Add Todo Task' disabled>
    </form>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError1" name='todoAddButtonError1' value="Enter User Name">Enter Correct User Name</h4>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError2" name='todoAddButtonError2' value="Enter Task">Enter User Task</h4>
    <h4 class="w3-red w3-ripple"  style="display:none;" id="todoAddButtonError3" name='todoAddButtonError3' value="Enter Correct Time">Enter Corrrect Time</h4>
   </div>
 </div>
<hr>
<h2 class="w3-text-blue w3-myfont"><b>Todo List</b></h2>


<div  style="background-color:#aaa;">
    <h2>Shivam Todos</h2>
    <?php
    $i = 0;
    $taskList = array();
    while($i < $shivamCompletedTodosLen + $shivamTodoLen) {
      $x = "num_".$i;
      ?>
      <form action="<?php echo(generate_link('todo', 'disable_todo')); ?>" method="post">
        <?php if(${$x}['status'] == 0){ array_push($taskList, ${$x}['taskId']);?>
        <div class="w3-row w3-light-blue w3-border  w3-large">
          <?php }else{ ?>
              <div class="w3-row w3-light-gray w3-border">
          <?php  }?>
          <input type="hidden" name="taskIdDisable" value="<?php echo(${$x}['taskId']); ?>">
          <div class="w3-col w3-container m2 l2">    <p>TaskId: <?php echo(${$x}['taskId']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>Task: <?php echo(${$x}['task']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>Date: <?php echo(${$x}['date']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>From Time: <?php echo(${$x}['fromTime']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>To Time: <?php echo(${$x}['toTime']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">
          <?php if(${$x}['status'] == 0){ ?>
            <input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" id="disableTodoButton" type='submit' name='disableTodo' value='Task Done'>
          <?php }else{ ?>
            Completed <?php }?>
          </div>
        </div>
      </div>
      </form>

      <?php
      $i++;
    } ?>
  </div>

  <div  style="background-color:#bbb;">
    <h2>Lav Todos</h2>
    <?php
    $i = $shivamCompletedTodosLen + $shivamTodoLen;
    $taskList = array();
    while($i < $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen) {
      $x = "num_".$i;
      ?>
      <form action="<?php echo(generate_link('todo', 'disable_todo')); ?>" method="post">
        <?php if(${$x}['status'] == 0){ array_push($taskList, ${$x}['taskId']);?>
        <div class="w3-row w3-light-blue w3-border  w3-large">
          <?php }else{ ?>
              <div class="w3-row w3-light-gray w3-border">
          <?php  }?>
          <input type="hidden" name="taskIdDisable" value="<?php echo(${$x}['taskId']); ?>">
          <div class="w3-col w3-container m2 l2">    <p>TaskId: <?php echo(${$x}['taskId']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>Task: <?php echo(${$x}['task']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>Date: <?php echo(${$x}['date']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>From Time: <?php echo(${$x}['fromTime']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">    <p>To Time: <?php echo(${$x}['toTime']); ?></p>     </div>
          <div class="w3-col w3-container m2 l2">
          <?php if(${$x}['status'] == 0){ ?>
            <input class="w3-button w3-red w3-hover-cyan w3-ripple w3-round" id="disableTodoButton" type='submit' name='disableTodo' value='Task Done'>
          <?php }else{ ?>
            Completed <?php }?>
          </div>
        </div>
      </div>
      </form>

      <?php
      $i++;
    } ?>
  </div>
<hr>
<div id="assignment">
    <h2 class="w3-text-blue w3-myfont w3-padding-16"><b>Assignment submission</b></h2>
      <form action="<?php echo(generate_link('todo', 'upload_assignment')); ?>" method="post" enctype="multipart/form-data">
      <p><label>TaskId</label>
          <select style="width: 70%" class="w3-input w3-border w3-xlarge w3-border-black w3-round-large w3-center" name='taskId'>
              <?php
              $i = 0;
              while($i < count($taskList)) {
                ?>
                <option class="w3-center" value="<?php echo $taskList[$i] ?>"><?php echo $taskList[$i] ?></option>
              <?php 
              $i++;
            } ?>
          </select>
        </p><br/>
      <p><label>Date</label>
          <input type="file" name="fileToUpload" id="fileToUpload">
     </p><br/>
    <p><label style="text-align: center;">Any Other  Notes</label></p><br/>
          <textarea rows="4"  name="anyNotes" style="width: 100%"></textarea><br/>
     <input class="w3-button w3-blue w3-xlarge w3-hover-cyan w3-ripple w3-round" type="submit" value="Upload Image" name="submit">
      <input type="hidden" name="todayDate" value="<?php echo date("Y/m/d")?>">
    </form>
</div>
<hr>
<h2 class="w3-text-blue w3-myfont"><b>Test Section </b>
<?php if($mcqLen > 0){ ?>
<span class="w3-button w3-blue w3-hover-red w3-text-white w3-round w3-xlarge" style="margin-top:-1%" onclick="location.href='<?php echo(generate_link('test', 'home')); ?>'"><b>START TEST</b></span>
<hr><br/>
<!-- 
<div style="padding-left: 5% ">
<form method="post" action="mailto:lavlove000@mail.com?subject= Quiz 1" enctype="text/plain">
Check the answer to each multiple-coice question, and click on the "Send MCQ" button to submit the information.
<?php
    $i = $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen;
    $q_count = 1;
    $taskList = array();
    $x = "num_".$i;
    ?>
    <h3>Topic: <?php echo(${$x}['mcq_topic']); ?></h3>
    <?php
    $i = $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen;
    while($i < $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen  + $mcqLen) {
      $x = "num_".$i;
      ?>
    <p><?php echo($q_count); ?>.<pre> <?php echo(${$x}['mcq_question']); ?></pre>
    <input type="radio" name="q_<?php echo($count); ?>_option1" value="<?php echo(${$x}['option1']); ?>">  <?php echo(${$x}['option1']); ?><BR>
    <input type="radio" name="q_<?php echo($count); ?>_option2" value="<?php echo(${$x}['option2']); ?>">  <?php echo(${$x}['option2']); ?><BR>
    <input type="radio" name="q_<?php echo($count); ?>_option3" value="<?php echo(${$x}['option3']); ?>">  <?php echo(${$x}['option3']); ?><BR>
    <input type="radio" name="q_<?php echo($count); ?>_option4" value="<?php echo(${$x}['option4']); ?>">  <?php echo(${$x}['option4']); ?><BR>
    </p><BR>
  <?php
      $q_count++;
      $i++;
    } ?>
    <br><br>
    <input type="submit" value="Send MCQ">
    <input type="reset" value="Clear Form">
</form>
</div> -->
<?php   } else{ ?>
	<h3> No Test For Today!</h3><hr>
<?php  } ?>
</h2>
<br/>
<?php
  $fileList = [];
?>
<div>
  <h4> Send Assignment section </h4>
  <input class="w3-quarter w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='admin' id="admin" onchange="isAdminCorrect()" placeholder='admin id'  required>
    <div id="sendMailDiv" style="display: none;">
       <select class="w3-quarter w3-input w3-border w3-xlarge w3-border-black w3-round-large w3-center" name='sendMailTaskId' id="sendMailTaskId" onchange="changeFileName()">
              <?php
              $i = $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen + $mcqLen;
              while($i < $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen + $uploadedAssignmentLen + $mcqLen) {
                $x = "num_".$i;
                ?>
                <option class="w3-center" value="<?php echo(${$x}['taskId']); ?>"><?php echo(${$x}['taskId']); ?></option>
              <?php
              $fileList [ ${$x}['taskId'] ] = ${$x}['fileName'];
              $i++;
            } ?>
          </select>
          <input class="w3-quarter w3-input w3-border w3-xlarge" style="display: inline" value="" id = "fileName"  name='fileName' readonly>
          <!-- <h3 class="w3-quarter" id="fileName">file  </h3> -->
          <h3 class="w3-quarter" id="arrayUploadedAssignment" style="display: none;"> File Name: <?php echo $fileList; ?></h3>
          <input class="w3-quarter w3-xlarge w3-button w3-blue w3-hover-cyan w3-ripple w3-round" id="disableTodoButton" type='submit' name='sendMailButton' value='Send Mail' onclick="sendMail()">
    </div>
</div>
<br/>
<hr>

<script type="text/javascript">
  var fileMap = JSON.parse('<?php echo json_encode($fileList); ?>');
  function changeFileName(){
    document.getElementById('fileName').value = "File Name: ".concat(fileMap[document.getElementById('sendMailTaskId').value]);
  }
  function sendMail(){
    // path = UPLOAD_IMG_PATH;
    // alert(path);
    // var msg = "<?php echo  shell_exec("python ") ?>";
    // alert(msg);
    // var val = "<?php echo implode("~", array_values($fileList)); ?>".split("~");
    // var temp= "<?php echo implode("~", array_keys($fileList)); ?>".split("~");
    // alert( document.getElementById('sendMailTaskId').value)
  }
function isAdminCorrect(){
    // alert("File Name: ".concat(fileMap[document.getElementById('sendMailTaskId').value]));
    // alert("File Name: " + values[document.getElementById('sendMailTaskId').value]);
    if(document.getElementById('admin').value == null || document.getElementById('admin').value=='' || !(document.getElementById('admin').value =='shivam' || document.getElementById('admin').value =='vishnu')){
    document.getElementById('sendMailDiv').style.display = 'none';
    return false;
    }
     document.getElementById('sendMailDiv').style.display = 'block';
     document.getElementById('fileName').value = "File Name: ".concat(fileMap[document.getElementById('sendMailTaskId').value]);
    return true;
  }
 function isUserCorrect(){
    if(document.getElementById('user').value == null || document.getElementById('user').value=='' || !(document.getElementById('user').value =='shivam' || document.getElementById('user').value =='vishnu')){
    document.getElementById('todoAddButtonError1').style.display = 'block';
    document.getElementById('addTodo').disabled  = true;
    return false;
    }
     document.getElementById('todoAddButtonError1').style.display = 'none';
    return true;
  }
  function isTaskEntered(){
    if(document.getElementById('task').value == null || document.getElementById('task').value ==''){
    document.getElementById('todoAddButtonError2').style.display = 'block';
    document.getElementById('addTodo').disabled  = true;
    return false;
    }
     document.getElementById('todoAddButtonError2').style.display = 'none';
    return true;
  }
function isTimeCorrect() {
  $fromTime = document.getElementById("fromTime").value;
  $toTime = document.getElementById("toTime").value;
  if ($toTime >= $fromTime){
    document.getElementById('addTodo').disabled  = false;
    // alert(document.getElementById('addTodo'));
  }else{
    document.getElementById('addTodo').disabled  = true;
  }
}</script>
