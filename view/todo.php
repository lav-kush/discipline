<div class="w3-panel w3-card-2 w3-light-grey"  id="todo-panel">
	<div class="container-fluid w3-light-grey" id="latestNoticeDiv">
		<h2 class="w3-text-blue w3-myfont"><b>ToDo Panel</b></h2><br/>
         </div>
<form action="uploader" method="post" enctype="multipart/form-data">
    <table>
    <tr> Name: <input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='name' placeholder='name'  required></tr>
    <tr> <td>Add Task: </td><td><input class="w3-input w3-border w3-xlarge w3-border-black w3-round-large" type='text' name='newTodo' placeholder='newTodo'  required></td>
    <td><input class="w3-button w3-blue w3-hover-cyan w3-ripple w3-round"  id="AddTodo" type='submit' name='addTodo' value='Add Todo'></td></tr>
    <br/>
    <tr>Select image to upload:    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit"></tr>
      </table>
</form>
</div>
