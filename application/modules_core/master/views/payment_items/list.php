<div class="pageheader">
    <h2><i class="fa fa-money"></i>Payment Items</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li class="active">Payment Configuration&nbsp;&nbsp;/&nbsp;&nbsp;Payment Items</li>
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

	<div class="row">
		<div class="col-md-12">
		  <div class="panel panel-default">
		  
		    <div class="panel-heading">
		      <div class="panel-btns">
		        <a href="#" class="minimize">−</a>
		      </div>
		      <h4 class="panel-title">Manage Payment Items</h4>
		      <p>This is form to search Payment Items based on <strong> academic year </strong> and <strong>units</strong></p>
		      <br/>
		      <a href="#" data-title="Add Data" class="tip" ><span onclick="tambah();"><i class="fa fa-plus" ></i> Add New Payment Items</span></a>
		    </div>
		    
		    <form method="POST" action="<?php echo base_url(); ?>master/payment_items">
		    <div class="panel-body">
		      <div class="row row-pad-5">
		        <div class="col-lg-3">
		          <select id='sy_id' class="form-control chosen-select" data-placeholder="Choose Academic Year..." name='sy_id' required>
					  	<?php foreach ($rs_school_year as $result): ?>
					  	<option value="<?php echo $result->id; ?>" <?php if($result->id==$sy_id){echo "selected='selected'";} ?>
					  	><?php echo $result->name; ?><?php if($result->status=='aktif'){echo " (AKTIF)";} ?>
					  	</option>                  
		          		<?php endforeach; ?>
		          </select>
		        </div>
		        <div class="col-lg-4">
		          <select id='u_id' class="form-control chosen-select" data-placeholder="Choose Units..." name='u_id' required>
					  	<?php foreach ($rs_unit as $result): ?>
					  	<option value="<?php echo $result->id; ?>" <?php if($result->id==$u_id){echo "selected='selected'";} ?>
					  	><?php echo $result->name; ?></option>                  
		          		<?php endforeach; ?>                 
		          </select>
		        </div>
		        <div class="col-lg-2">
					<button class="btn btn-primary btn-block">Search</button>
		        </div>
		      </div><!-- row -->
		    </div><!-- panel-body -->
		    </form>
		    
		  </div><!-- panel -->
          
			<!-- Table Results -->
			<div class="panel panel-default">
				<div class="panel-body">			
					<div class="row row-pad-5">        
				      <div class="table-responsive">
				      <table class="table table-hidaction table-hover mb30">
				        <thead>
				          <tr>
				            <th>#</th>
				            <th>Items Name</th>
				            <th>Cost</th>
				            <th></th>
				          </tr>
				        </thead>
				        <tbody>
				       	<?php if(empty($rs_items)){ ?>
				       		<tr><td colspan="4" align="center"> -- there are no items -- </td></tr>
				       	<?php }else{ ?>	
					        <?php $no = 1; foreach ($rs_items as $result): ?>
					          <tr>				          
					            <td><?php echo @$no; ?></td>
					            <td><?php echo @$result->item_name; ?></td>
					            <td class="price"><?php echo @$result->item_amount; ?></td>
				                <td class="table-action-hide">
				                  <a href="<?php echo base_url(); ?>master/payment_items/edit/<?php echo $result->sy_id; ?>/<?php echo $result->id; ?>"><i class="fa fa-pencil"></i></a>
				                  <a><i class="fa fa-trash-o" onclick="hapus(<?php echo $result->id ?>)"></i></a>
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
          
        </div>	<!-- col-12 -->			
        
	</div>
</div>