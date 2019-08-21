<div class="tab" style="padding: 30px 0;">
  <h4>Topper's View</h4>
  <button class="tablinks" id="defaultOpen" onclick="openCity(event, 'JET')"><strong>JET</strong></button>
  <button class="tablinks" onclick="openCity(event, 'Paris')"><strong>Paris</strong></button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')"><strong>Tokyo</strong></button>
</div>
<hr style="border: 1px solid black;" />

<div id="JET" class="tabcontent" style="height: 100%;display: inline;">
			<img style="width: 40%;height: 100%;" src="<?php echo(IMAGE_PATH); ?>toper_jet1.jpg" alt="">
      <img style="width: 40%;;height: 100%; border-left:2px solid red;" src="<?php echo(IMAGE_PATH); ?>toper_jet1.jpg" alt="">
</div>
</br></br></br></br></br>
<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
document.getElementById("defaultOpen").click();
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>