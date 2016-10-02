<div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Set a new budget target
                         
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <!---chart place----->
						   
						   	<form method="post" autocomplete="off">
							<div class="col-md-12 clearfix">
							<div class="col-md-11" style="background-color:#F6F6F6;">
								<div class="table-responsive">
									<table class="table">										
										 <?php   if ( isset($errMSG) ) {  
												?>
												<div class="form-group">
				 <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
					<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
					</div>
				 </div>
                <?php
				   }
				   ?>
						<tbody>
							<tr>
								<td class="col-md-2" style="vertical-align: middle">
									<div class="form-group">
										Target Name:<input type = "text" name = "tname" id = "tname" maxlenth= "20" required />
									</div></td>
								<td class="col-md-3" style="vertical-align: middle">
									<div class="form-group">
										Target will achieve in days:
										<input type="number" id="enddate" name="enddate" min="1" step="1" required />
									</div></td>
								<td class="col-md-2" style="vertical-align: middle">
									<div class="form-group">
										Target Budget($):<input type = "number" name = "budget" id = "budget" min= "0" step="5" required />
											</div></td></tr>
						</tbody>
							<tr>
								<td colspan="3">
									<div class=" pull-right">
										<button type="submit" class="btn btn-block btn-primary" name="btn-add">Add</button>
									</div>
									</td>
							</tr>
				</table>
														
						</div>
											<!-- /.panel-body -->
					</div>
					</div>	
				</form>
									   
						   
						   
						   
						   
                        </div>
                        <!-- /.panel-body -->
