<div class="w3-panel w3-light-grey"  id="todo-panel">
	<div class="container-fluid w3-light-grey" id="latestNoticeDiv">
		<h2 class="w3-text-blue w3-myfont"><b>ToDo Panel</b></h2><br/>

      <form action="<?php echo(generate_link('todo', 'add_todo')); ?>" method="post">
       <p><label>User Name</labe>
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
<div style="width: auto;">
  <div  style="background-color:#aaa;">
    <h2>Shivam Todos</h2>
    <table >
      <tr style="border: 1px solid black;background: white;">
        <th>TaskId</th>
        <th>Task</th>
        <th>Date</th>
        <th>From Time</th>
        <th>To Time</th>
        <th></th>
      </tr>
    <?php
    $i = 0;
    $taskList = array();
    while($i < $shivamCompletedTodosLen + $shivamTodoLen) {
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
           <td style="border: 1px solid #ddd;"><?php echo(${$x}['date']); ?></td>
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
  </table>
  </div>
<div class="w3-row">
  <div class="w3-col w3-container m2 l2 w3-yellow">
    <p>This part .</p>
  </div>
  <div class="w3-col w3-container m2 l2">  
    <p>This part</p>
  </div>
  <div class="w3-col w3-container m2 l2 w3-yellow">
    <p>This .</p>
  </div>
  <div class="w3-col w3-container m2 l2">  
    <p>This </p>
  </div>
  <div class="w3-col w3-container m2 l2 w3-yellow">
    <p>This part .</p>
  </div>
  <div class="w3-col w3-container m2 l2">  
    <p>This part</p>
  </div>
</div>
  <div  style="background-color:#bbb;">
    <h2>Lav Todos</h2>
    <table >
      <tr style="border: 1px solid black;background: white;">
        <th>TaskId</th>
        <th>Task</th>
        <th>Date</th>
        <th>From Time</th>
        <th>To Time</th>
        <th></th>
      </tr>
    <?php
    $i = $shivamCompletedTodosLen + $shivamTodoLen;
    $taskList = array();
    while($i < $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen) {
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
           <td style="border: 1px solid #ddd;"><?php echo(${$x}['date']); ?></td>
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
  </table>
  </div>
</div>
<hr>
<div id="assignment">
    <h2 class="w3-text-blue w3-myfont w3-padding-16"><b>Assignment submission</b></h2>
      <form action="<?php echo(generate_link('todo', 'upload_assignment')); ?>" method="post" enctype="multipart/form-data">
      <table>
      <tr class="w3-margin-bottom"> 
        <th style="width: 9%">TaskId</th>
        <th style="width: 19%">Select image to upload</th>
      </tr>
      <tr>
        <td>
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
        </td>
        <td>
          <input type="file" name="fileToUpload" id="fileToUpload">
        </td>
      </tr>
    </table>
    <br/>
    <table>
      <tr>
        <th>Any Other  Notes</th>
        <th style="width: 20%"><th>
      </tr>
        <tr>
         <td style="width: 40%">
           <textarea rows="4" cols="32%" name="anyNotes"></textarea> </td>
        <td>
          <input class="w3-button w3-blue w3-xlarge w3-hover-cyan w3-ripple w3-round" type="submit" value="Upload Image" name="submit">
            </td>
      </tr>
      <input type="hidden" name="todayDate" value="<?php echo date("Y/m/d")?>">
    </form>
    </table> 
</div>
<hr>
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
              $i = $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen;
              while($i < $shivamCompletedTodosLen + $shivamTodoLen + $lavTodoLen + $lavCompletedTodosLen + $uploadedAssignmentLen) {
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
<br/><br/><br/>


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
