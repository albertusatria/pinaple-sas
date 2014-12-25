<div class="pageheader">
    <h2><i class="fa fa-strikethrough"></i>Item Type Optional</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Master</li>
        <li class="active">Items Type Optional</li>
      </ol>
    </div>
</div>
        
<div class="contentpanel">

  <?php if ($message != null ) : ?>
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Well done!</strong>   <?php echo $message; ?>
  </div>
  <?php endif ; ?>

  <?php if ($eror != null ) : ?>
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Warning!</strong>   <?php echo $eror; ?>
  </div>
  <?php endif ; ?>

	<!-- Panel Top -->  
	<div class="row">
		<!-- Search Result -->
		<!--
		<div class="col-md-8">
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <div class="panel-btns">
		        <a href="#" class="minimize">−</a>
		      </div>
		      <h4 class="panel-title">Search Items Type Optional
		      <p>This is form to search current data of <strong> Items Type Optional </strong></p>
		    </div>
		    
			<div class="panel-body">
			  <div class="row row-pad-5">
				<div class="form-group">
				
				  <div class="col-lg-5">	  
					<select name="u_id" id="u_id" class="form-control input-sm" required>
			  				<option value="all"> All Unit </option>
		              <?php foreach ($ls_unit as $unit): ?>
		                  <?php if($unit->id!='0000'){ ?>
		                    <option value=<?php echo $unit->id ?> <?php if($unit->id==@$this->session->flashdata('u_id')){echo "selected='selected'";} ?> required>
		                    <?php echo $unit->name ?></option>
		                  <?php } ?>
		              <?php endforeach; ?>
					</select>
				  </div>

		          <div class="col-lg-5">
		            <input type="text" name="name" id="keyword" class="form-control" placeholder="Type student's Name or NIS..." required="">
		          </div>
		          
		          <div class="col-lg-2">
		            <a id="btnCari" class="btn btn-primary btn-block">Search</a>
		          </div>      
			                  	
			    </div>
			  </div>
			</div>		    
		  </div>
		</div>
		-->
		<div class="col-md-8">
		  <div class="panel panel-danger">
		    <div class="panel-heading">
		      <h4 class="panel-title">OPTIONAL ITEM LIST FOR PAYMENT</h4>
		      <p>This is all list that will appear ....</p>
		    </div>
			<!-- Table Results -->
			<div class="panel panel-default">
				<div class="panel-body">	
					<?php if ($message != null ) : ?>
						<?php if ($message == "Data successfully deleted"):?>
						<div class="alert alert-success">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				            ×</button>
				            <strong>Well done!</strong> <?php echo $message; ?>
						</div>
						<?php elseif ($message == "Data successfully edited"):?> 
						<div class="alert alert-success">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				            ×</button>
				            <?php echo $message; ?>
						</div>						
						<?php endif;?>
					<?php endif;?>
					<div class="row row-pad-5">        
				      <div class="table-responsive list-type-table">
				      <table class="table table-hidaction table-hover mb30">
				        <thead>
				          <tr>
				            <th width="10%">#</th>
				            <th width="35%">Item Name</th>
				            <th width="15%" style="text-align:center">Classified</th>
				            <th width="15%" style="text-align:center">Accounted to</th>
				            <th width="15%" style="text-align:center">Price</th>
				            <th width="10%"></th>
				          </tr>
				        </thead>
				        <tbody>
				       	<?php if(empty($rs_items_type)){ ?>
				       		<tr><td colspan="4" align="center"> -- there is no items type -- </td></tr>
				       	<?php }else{ ?>	
					        <?php $no = 1; foreach ($rs_items_type as $result): ?>
					          <tr>				          
					            <td><?php echo @$no; ?></td>
					            <td><strong><?php echo @$result->item_name; ?></strong>
					            	<br><small><?php echo @$result->description; ?></small></td>
					            <td style="text-align:center"><?php echo @$result->unit_name; ?>
								</td>
					            <td style="text-align:center"><?php echo @$result->accounting_code; ?>
								<a title="" data-placement="right" data-toggle="tooltip" class="glyphicon glyphicon-question-sign tooltips" 
									data-original-title="<?php echo @$result->code_name ?>"></a>
								</td>
								<td style="text-align:center"><?php echo @$result->amount ?></td>
								</td>
				                <td class="table-action-hide">
				                  <a href="<?php echo base_url(); ?>master/items_type/edit/<?php echo $result->id; ?>"><i class="fa fa-pencil"></i></a>
				                  <?php if ($result->mandatory == '0') : ?>
				                  <a href="#" class="delete-row" onclick="hapus(<?php echo $result->id ?>)">
				                  	<i class="fa fa-trash-o"></i>
				                  <?php endif; ?>
				                  </a>
				                </td>
					          </tr>
					         <?php $no++; endforeach ; ?>
				       	<?php } ?>
   				    
				        </tbody>
				      </table>
				      </div><!-- table-responsive -->
					</div>		
				</div><!-- panel-body -->
			</div><!-- 2nd panel -->		    		    
		  </div><!-- panel -->
        </div>	<!-- col-6 -->		

		<!-- Setup Items Type Optional-->
		<div class="col-md-4">
			<form id="newScholarship" method="POST" action="<?php echo base_url(); ?>master/items_type_optional/add_process" class="form-horizontal">
			  <div class="panel panel-info">
			      <div class="panel-heading">
			        <div class="panel-btns">
			          <a href="#" class="minimize maximize">&plus;</a>
			        </div>
			        <h4 class="panel-title">New Optional Payment</h4>
			      </div>
			      <div class="panel-body">
			        <div class="form-group">
			          <div class="col-sm-12">
			            <input type="text" name="name" class="form-control" placeholder="Type Item Type Name..." value="<?php echo $this->session->flashdata('name'); ?>" required />
			          </div>
			        </div>
			
			        <div class="form-group">
					  <div class="col-sm-12">
					  	<div class="input-group selec choose-new-levels">
	  			            <label class="control-label">Appear In <a title="" data-placement="left" data-toggle="tooltip" class="glyphicon glyphicon-question-sign tooltips" 
									data-original-title="The option will be appear for student in .. and classified to ..."></a></label>
					  		<select name="unit_id" id="jenjangSekolah" class="form-control input-sm" required>
					  				<option value=""> All Unit </option>
				              <?php foreach ($ls_unit as $unit): ?>
				                  <?php if($unit->id!='0000'){ ?>
				                    <option value=<?php echo $unit->id ?> <?php if($unit->id==@$this->session->flashdata('unit_id')){echo "selected='selected'";} ?>>
				                    <?php echo $unit->name ?></option>
				                  <?php } ?>
				              <?php endforeach; ?>
							</select>
		                </div>
					  </div>
					</div>

					<div class="form-group">
					  <div class="col-sm-12">
					  	<div class="input-group">
					  		<span class="input-group-addon">Rp</span>
					  		<input name="amount" type="text" class="form-control" placeholder="example: 300000" value="<?php echo $this->session->flashdata('amount'); ?>">
					  		<!--<span class="input-group-addon">.00</span>-->
		                </div>
					  </div>
					</div>
								        
			        <div class="form-group">
			          <div class="col-sm-12">
			            <textarea rows="5" name="description" class="form-control" placeholder="Type Item Type Description..." required><?php echo $this->session->flashdata('description'); ?></textarea>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-sm-12">
  			            <label class="control-label">Accounted to<span class="asterisk">*</span></label>
			          	<select class="form-control" name="accounting_code">
			          		<?php foreach($account as $acc) : ?>
				          		<option value="<?php echo $acc['accounting_id'] ?>"><?php echo $acc['name'] ?></option>
				          	<?php endforeach; ?>
			          	</select>
			          </div>
			        </div>
			      </div><!-- panel-body -->

			      <div class="panel-footer">
			        <div class="row">
			          <div class="col-sm-9 col-sm-offset-3">
			            <button class="btn btn-primary">Submit</button>
			            <button type="reset" class="btn btn-default">Reset</button>
			          </div>
			        </div>
			      </div>
			    
			  </div><!-- panel -->
          </form>
		</div>
	</div>
	<!-- end Panel Top -->

<!-- Search Result -->
	<div class="row" id="searchResult"></div>
<!-- end Search Result --> 

</div><!-- contentpanel -->