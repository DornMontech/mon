			<div class="panel-body">
			
				<?php 
					$tquery = mysql_query("SELECT * FROM `target` WHERE cid ='".$cid."'" ORDER BY target_id DESC LIMIT 1);
					$trest = mysql_fetch_array($tquery);
					
				?>
			
			
                    Progress Bar <?php echo $trest["start_date"]; ?><br/>
							<div class="outer">
							
								<div class = "inner"></div>
								
							</div>
							
					</div>
                
			
			
			
						<?php 
							$total = 500;
							$current = 160;
							$percent = round(($current / $total) * 100,1);
							?>
							<style type="text/CSS">
								.outer{
									height:26px;
									width:100%;
									border:solid 1px #000;									
									}
								.inner{
									height:25px;
									width:<?php echo $percent ?>%;
									border-right:solid 1px #000;
									border-bottom:solid 1px #000;
									/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#b7deed+0,71ceef+50,21b4e2+51,b7deed+100;Shape+1+Style */
									background: #b7deed; /* Old browsers */
									background: -moz-linear-gradient(top,  #b7deed 0%, #71ceef 50%, #21b4e2 51%, #b7deed 100%); /* FF3.6-15 */
									background: -webkit-linear-gradient(top,  #b7deed 0%,#71ceef 50%,#21b4e2 51%,#b7deed 100%); /* Chrome10-25,Safari5.1-6 */
									background: linear-gradient(to bottom,  #b7deed 0%,#71ceef 50%,#21b4e2 51%,#b7deed 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
									filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#b7deed',GradientType=0 ); /* IE6-9 */

									}
							</style>						
						   
						<br/>