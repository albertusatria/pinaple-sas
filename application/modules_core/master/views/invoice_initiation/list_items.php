<div class="pageheader">
    <h2><i class="fa fa-folder-o"></i>Setup Invoice Packet</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Payment Configuration</li>
        <li><a href="<?php echo base_url();?>master/invoice_initiation" >Setup Invoice Packet</a></li>
        <li class="active">Edit Packet Item List</li>
      </ol>
    </div>
</div>
<div class="contentpanel">

	<div class="row">
		<div class="col-md-6">
		  <div class="panel panel-primary">
		  
		    <div class="panel-heading">
		      <h4 class="panel-title"><?php echo @$r_packet->name; ?></h4>
		      <small>List of selected items</small>
		    </div>
			<!-- Table Results -->
			<div class="panel panel-default">
					<form id="newItemstype" method="POST" 
					action="<?php echo base_url(); ?>master/invoice_initiation/edit_amount" class="form-horizontal">
			        <input type="hidden" name="packet_id_amount" value="<?php echo $r_packet->id; ?>" required />		        
				<div class="panel-body">	
					<?php if ($message_amount != null ) : ?>
						<?php if ($message_amount != "Data successfully edited"):?>
						<div class="alert alert-success">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				            ×</button>
				            <strong>Well done!</strong> <?php echo $message_amount; ?>
						</div>
						<?php elseif ($message_amount == "Data successfully edited"):?> 
						<div class="alert alert-success">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
				            ×</button>
				            <?php echo $message_amount; ?>
						</div>						
						<?php endif;?>
					<?php endif;?>
					<div class="row row-pad-5">        
				      <div class="table-responsive">
				      <table class="table table-hidaction table-hover mb30" id="priceTable">
				        <thead>
				          <tr>
				            <th style="text-align:center">#</th>
				            <th>Packet Items Name</th>
				            <th>Please add Default Amount</th>
				            <th></th>
				          </tr>
				        </thead>
				        <tbody>
				       	<?php if(empty($rs_packet_items)){ ?>
				       		<tr><td colspan="4" align="center"> -- there is no packet -- </td></tr>
				       	<?php }else{ ?>	
					        <?php $no = 1; foreach ($rs_packet_items as $result): ?>
					          <tr>				          
					            <td style="vertical-align:middle;text-align:center"><?php echo @$no; ?></td>
					            <td style="vertical-align:middle">
									<input type="hidden" class="form-control" name="data[<?php echo $no; ?>][id]" value="<?php echo @$result->id; ?>">
					            	<?php echo @$result->item_type_name; ?> <?php if ($result->period_id != NULL) : echo "( Bulan " . $result->period_name . " )"; endif; ?></td>					      
					            <td><input type="text" class="form-control price" name="data[<?php echo $no; ?>][amount]" value="<?php echo @$result->amount; ?>"></td>
				                <td class="table-action-hide" style="vertical-align:middle;text-align:center">				                 
				                  <a href="#" class="delete-row" 
				                  onclick="hapus(<?php echo $result->id ?>,'<?php echo $result->item_type_name ?>',<?php echo $r_packet->id;?>)">
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
			      <div class="panel-footer">
			        <div class="row">
			          <div class="col-sm-9 col-sm-offset-3">
			            <button class="btn btn-primary">Submit</button>
			            <button type="reset" class="btn btn-default">Reset</button>
			          </div>
			        </div>
			      </div>
				</form>
			    
			</div><!-- 2nd panel -->		    		    
		  </div><!-- panel -->
        </div>	<!-- col-6 -->			

		<div class="col-md-6">
			<form id="newItemstype" method="POST" action="<?php echo base_url(); ?>master/invoice_initiation/add_item" class="form-horizontal">
			  <div class="panel panel-default">
			      <div class="panel-heading">
			        <div class="panel-btns">
			          <a href="#" class="minimize">&minus;</a>
			        </div>
			        <h4 class="panel-title">Add new Item to this Packet</h4>
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
			        
			        <input type="hidden" name="packet_id" value="<?php echo $r_packet->id; ?>" required />		        
			        <div class="form-group">
			          <label class="col-sm-3 control-label">Item Name <span class="asterisk">*</span></label>
			          <div class="col-sm-9">
			           <input type="hidden" value="" name="payment_type" id="inputType">
			           <select class="form-control input-xs" name="item_type_id" id="inputName" required>
	                   <option value="">-- SELECT --</option>
	                   <?php foreach ($rs_items_type as $result): ?>
	                    <option value="<?php echo @$result->id; ?>" 
	                  	<?php if($this->session->flashdata('item_type_id')==$result->id){ echo "selected='selected'"; } ?>
	                    ><?php echo @$result->name; ?>
	                    </option>
		               <?php endforeach ; ?>
		               </select>
			          </div>
			        </div>

			      </div><!-- panel-body -->
			      <div class="panel-footer">
			        <div class="row">
			          <div class="col-sm-9 col-sm-offset-3">
			            <button class="btn btn-primary">Add!</button>
			            <!-- <button type="reset" class="btn btn-default">Reset</button> -->
			          </div>
			        </div>
			      </div>
			    
			  </div><!-- panel -->
          </form>
        </div>	<!-- col-6 -->	
        
	</div>
</div>