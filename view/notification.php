<section class="whatsnew">
    <div class="wrapper">
    	<div class="w3-bar-block">
		     <h1 style="text-align:center; text-decoration:underline; color:#162e94;">
		     	<a href="<?php echo(generate_link('main', 'home')); ?>">
		           Welcome To DISCIPLINE</a>
			  </h1>
			 <div>
			   <h5 style="text-align:center"> DISCIPLINE is a pioneer institute in the field of coaching for Competitive Exams.</br>
	            New heights of success were scaled year after year.  </h5>
			 <h5 style="text-align:center;font-weight:bold;">	Necessity is mother of invention but here it is the Mother of Miracle. A Miracle which has grown manifold.</br>-
				<span style="color:red;"> DISCIPLINE.</span></h5>
			 </div>
		</div>
        <!-- <div class="heading-block whatsnew">
            <h2>Recent updates on DISCIPLINE</h2>
        </div> -->
    	</br></br>
        <div class="row-block">
            <div class="column-block" style="width: 100%">
                <div class="heading fa fa fa-star-o english"><span>What’s New</span></div>
                <div class="content" tabindex="5000" style="overflow: hidden; outline: none;">
                    <ul>
                    	<?php
						    $i = 0;
						    $x = "num_$i";

						    while($i < $len) {
								if (strtotime(${$x}['start_time']) <= strtotime($curr_time) && strtotime(${$x}['end_time']) >= strtotime($curr_time)) {
								?>
								<li><span class="fa fa-calendar"> Start: <?php echo(${$x}['start_time']); ?>      End: <?php echo(${$x}['end_time']); ?></span>
                                 <p><a href="https://www.drishtiias.com/to-the-points/Paper2/cooperative-and-competitive-federalism-in-india"><?php echo(${$x}['info']); ?></a></p></li>
					    <?php }
							$i++;
							$x = "num_$i";
					    }?>
					</ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!--july gigs--><!-- 
<div class="w3-bar-block">
		 <div class="gigs" > 
		     <h1 style="width:100%; text-align: center;"> JULY GIGS !
			 </h1><br>
			 <h2 style="width:50%; "> Date  </h2> 
			 <h2 style="width: 50%;"> Description</h2> 
			 <section class="whatsnew">
			 	<div class="row-block"> 
			 		<div class="column-block"> <div class="heading english"><span>Date</span></div> </div><div class="spacer"></div>
				 	<div class="column-block"><div class="heading english"><span>Description</span></div></div>
				</div>
				
			    <marquee direction ="up" style="border:#cfd7da 2px solid; height:auto;">

						<section class="whatsnew">
						        <div class="row-block">
						            <div class="column-block">
						                <div class="content" tabindex="5000" style="overflow: hidden; outline: none;">
						                    <ul>
						                        <li class="fa fa-calendar"><span style="color: black;font-weight:bold; margin-left: 1%;font-size:24px;">19 Jun 2019</span></li>
						                        <li><span class="icon-calender">15 Jun 2019</span></li>
						                     </ul>
						                </div>
						            </div>
						            <div class="spacer"></div>
						            <div class="column-block">
						                <div class="content" tabindex="5001" style="overflow: hidden; outline: none;">
						                    <ul>
						                        <li>
						                            <p><a style="color: black;font-weight:bold;" href="https://www.youtube.com/embed/IozsNXDzAWI" target="_blank">SCO Summit 2019 sdsadas adsadSAD ad ASD SAD AS Da sd asd asd sa d asd sa da dwewqewqe wqe qw e qwe qw e we wq e qwe qw e wq e qwe qw e qw e wqe wq eq we qw e we w e qe q we w e qw ewq e qw e wq eqw e qw e wqe w e wqe qw e wqe wq e qwe wq e qe qw e w e qwwe And India - Audio Article (Video)</a></p>
						                        </li>
						                        <li>
						                            <p><a href="https://www.youtube.com/embed/0xMOfGw4NvI" target="_blank">Current News Bulletin for IAS/PCS - (07th - 13th June, 2019) (Video)</a></p>
						                             </li>                    
						                         </ul>
						                </div>
						            </div>
						        </div>
						</section>
		   </marquee>
		</section>
   </div>
</div> -->