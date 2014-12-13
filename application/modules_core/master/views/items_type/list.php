<div class="pageheader">
    <h2><i class="fa fa-folder-o"></i>Items Type</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Master Data</li>
        <li class="active">Items Type</li>
      </ol>
    </div>
</div>
<div class="contentpanel">

	<div class="row">
		<div class="col-md-6">
		  <div class="panel panel-default">
		  
		    <div class="panel-heading">
		      <h4 class="panel-title">List Items Type</h4>
		      <p>List of all available Items Type</p>
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
				            <th>No #</th>
				            <th>Items Type Name</th>
				            <th>Description</th>
				            <th></th>
				          </tr>
				        </thead>
				        <tbody>
				       	<?php if(empty($rs_items_type)){ ?>
				       		<tr><td colspan="4" align="center"> -- there is no items type -- </td></tr>
				       	<?php }else{ ?>	
					        <?php $no = 1; foreach ($rs_items_type as $result): ?>
					          <tr>				          
					            <td><?php echo @$no; ?></td>
					            <td><?php echo @$result->name; ?></td>
					            <td class="price"><?php echo @$result->description; ?></td>
				                <td class="table-action-hide">
				                  <a href="<?php echo base_url(); ?>master/items_type/edit/<?php echo $result->id; ?>"><i class="fa fa-pencil"></i></a>
				                  <a href="#" class="delete-row" onclick="hapus(<?php echo $result->id ?>)">
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
			<form id="newPacket" method="POST" action="<?php echo base_url(); ?>master/items_type/add_items" class="form-horizontal">
			  <div class="panel panel-default">
			      <div class="panel-heading">
			        <div class="panel-btns">
			          <a href="#" class="minimize">&minus;</a>
			        </div>
			        <h4 class="panel-title">New Items Type Form</h4>
			        <p>Please provide the name and description for new item type.</p>
					<!--<p style="color:#428bca;">(ID is not the same as Number on left side.)</p>-->      			        
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