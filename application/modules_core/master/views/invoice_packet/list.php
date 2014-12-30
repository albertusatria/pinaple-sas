<div class="pageheader">
    <h2><i class="fa fa-folder-o"></i>Setup Packet Template</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Payment Configuration</li>
      	<li class="active">Setup Packet Template</li>
      </ol>
    </div>
</div>
<div class="contentpanel">

	<div class="row">
		<div class="col-md-6">
		  <div class="panel panel-primary">
		  
		    <div class="panel-heading">
		      <h4 class="panel-title">List Packet Template</h4>
		      <small>List of all template</small>
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
				      <div class="table-responsive">
				      <table class="table table-hidaction table-striped table-hover mb30">
				        <thead>
				          <tr>
				            <th width="10%">No.</th>
				            <th width="70%">Packet Name</th>
				            <!--<th width="20%" align="right" style="text-align:right;">Desc.</th>-->
				            <th></th>
				          </tr>
				        </thead>
				        <tbody>
				       	<?php if(empty($rs_packet)){ ?>
				       		<tr><td colspan="4" align="center"> -- there is no packet -- </td></tr>
				       	<?php }else{ ?>	
					        <?php $no = 1; foreach ($rs_packet as $result): ?>
					          <tr>				          
					            <td><?php echo @$no; ?></td>
					            <td><strong class="text text-danger"><?php echo @$result->name; ?></strong>
					            	<br>
					            	<?php echo @$result->unit_name; ?>
					            	<br>
					            	<?php if ($result->for_new_student == 'TRUE') : ?>
					            		Untuk Siswa Baru ( Jenjang : <?php echo @$result->stage; ?> )
					            	<?php else : ?>
					            		Untuk Siswa Lama ( Jenjang : <?php echo @$result->stage; ?> )
						            <?php endif; ?>
					            	</td>
					            <!--<td class="price"><?php echo @$result->description; ?></td>-->
				                <td class="table-action-hide">
				                  <a href="<?php echo base_url(); ?>master/invoice_packet/edit/<?php echo $result->id; ?>"><i class="fa fa-pencil"></i></a>
				                  <a href="<?php echo base_url(); ?>master/invoice_packet/list_items/<?php echo $result->id; ?>"><i class="fa fa-file"></i></a>
				                  <a href="#" class="delete-row" onclick="hapus('<?php echo $result->id ?>','<?php echo $result->name ?>')">
				                  	<i class="fa fa-trash-o"></i>
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

		<div class="col-md-6">
			<form id="newItemstype" method="POST" action="<?php echo base_url(); ?>master/invoice_packet/add" class="form-horizontal">
			  <div class="panel panel-default">
			      <div class="panel-heading">
			        <div class="panel-btns">
			          <a href="#" class="minimize">&minus;</a>
			        </div>
			        <h4 class="panel-title">New Template Form</h4>
			        <small>Please provide the name and description for new packet.</small>		      			        
			      </div>
			      <div class="panel-body">
					<?php if ($message != null ) : ?>
						<?php if ($message == "Data successfully added"):?>
						<div class="alert alert-success">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				            <strong>Well done!</strong> <?php echo $message; ?>
						</div>
						<?php elseif ($message == "Data successfully deleted"):?>
						 
						<?php elseif ($message == "Data successfully edited"):?> 
						 
						<?php else : ?>
						<div class="alert alert-danger">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				            <?php echo $message; ?>
						</div>					
						<?php endif ; ?>
					<?php endif;?>
			        		        
			        <div class="form-group">
			          <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
			          <div class="col-sm-9">
			            <input type="text" name="name" class="form-control" placeholder="Type Items Type name..." required />
			          </div>
			        </div>
			        
					<div class="form-group">
					  <label class="col-sm-3 control-label">Grades <span class="asterisk">*</span></label>
					  <div class="col-sm-5">
					    <select name="unit_id" id="jenjangSekolah" class="form-control input-sm" required>
					     <option value="" selected="selected">Choose School Units</option>
					    </select>
					    <!-- <label class="error" for="jenjangSekolah"></label> -->
					  </div>
					   <div class="col-sm-4">
					    <select name="stage" id="jenjangKelas" class="form-control input-sm" required>
					      <option value="" selected="selected">Choose Units Level</option>
					    </select>
					    <!-- <label class="error" for="jenjangKelas"></label> -->
					  </div>					  
					</div> 			        
					
			        <div class="form-group">
			          <label class="col-sm-3 control-label">New Student <span class="asterisk">*</span></label>
			          <div class="col-sm-3">
			            <select name="for_new_student" class="form-control input-sm" >
				    
				            <option value="FALSE" required>NO</option>
				            <option value="TRUE" required>YES</option>
				           				          	
			          	</select>
			          </div>
			        </div>

			        <div class="form-group">
			          <label class="col-sm-3 control-label">Description <span class="asterisk">*</span></label>
			          <div class="col-sm-9">
			            <textarea rows="5" name="description" class="form-control" placeholder="Type Items Type description..." required></textarea>
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
        </div>	<!-- col-6 -->	
        
	</div>
</div>