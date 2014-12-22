<div class="pageheader">
    <h2><i class="fa fa-folder-o"></i>Accounts</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Master Data</li>
        <li class="active">Accounts</li>
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


 	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Accounting Code Management</h3>
		</div>


	<div class="panel-body">
	    <div class="row">
	        <div class="neraca col-md-12">
	      	<div class="col-md-6">
				<table class="table table-hidaction table-debet">
					<input type="hidden" name="account-name" class="account-name" value="debet"/>
					<thead>
						<tr role="row" class="heading">
							<th width="100%" colspan="4" style="text-align:center">
								PENDAPATAN
							</th>
						</tr>
						<tr role="row" class="heading">
							<th width="15%">
								Code
							</th>
							<th width="85%" colspan="3">
								Account Name
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rs_accounts as $acc) : ?>
							<?php if ($acc['tipe'] == 'PENDAPATAN') : ?>
								<tr class="group-content">
									<td class="account-id"><span class="text text-danger"><?php echo $acc['accounting_id']?></span></td>
									<td class="account-name" colspan="2"><strong><?php echo $acc['name']?></strong>
											</td>
					                <td class="table-action-hide">
									<a title="" data-placement="left" data-toggle="tooltip" class="glyphicon glyphicon-question-sign tooltips" 
										data-original-title="
											<?php if(isset($acc['description'])) : echo $acc['description']; 
											else : echo "No Information"; endif; ?>"></a>
					                  <a href="#"><i class="fa fa-pencil"></i></a>
					                  <a href="<?php echo base_url()?>master/accounts/delete/<?php echo $acc['accounting_id']?>" class="delete-row" 
					                  	onclick="return confirm('are you sure? you cannot abort this action once deleted')">
					                  	<i class="fa fa-trash-o"></i>
					                  </a>
					                </td>
								</tr>
								<?php if (isset($acc['children']) && count($acc['children'])) : ?>								
									<?php foreach ($acc['children'] as $item) : ?>
										<tr class="group-content">
											<td class="account-id"></td>
											<td class="account-id" width="10%">
												<span class="text text-danger"><?php echo $item['accounting_id']?></span>
											</td>
											<td class="account-name"><?php echo $item['name']?></td>
							                <td class="table-action-hide">
											<a title="" data-placement="left" data-toggle="tooltip" class="glyphicon glyphicon-question-sign tooltips" 
												data-original-title="
													<?php if(isset($item['description'])) : echo $item['description']; 
													else : echo "No Information"; endif; ?>"></a>
							                  <a href="#"><i class="fa fa-pencil"></i></a>
							                  <a href="<?php echo base_url()?>master/accounts/delete/<?php echo $item['accounting_id']?>" class="delete-row" 
							                  	onclick="return confirm('are you sure? you cannot abort this action once deleted')">
							                  	<i class="fa fa-trash-o"></i>
							                  </a>
							                </td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>							
								<tr class="group-content">
									<td class="account-id"></td>
									<td class="account-name" colspan="3">
										<a href="#" class="new-sub-account" 
											data-toggle="modal" data-target="#modal-subnew"
											onclick="new_submenu('<?=$acc['accounting_id']?>','<?=$acc['name']?>','<?=$acc['tipe']?>')"><i class="fa fa-plus"></i> NEW SUBCODE<a></td>
								</tr>	
							<?php endif; ?>
						<?php endforeach; ?>
						<tr class="group-content">
							<td class="account-name" colspan="4">
							<a href="#" class="new-sub-account" 
								data-toggle="modal" data-target="#modal-new-code"
								onclick="new_account('PENDAPATAN')"><i class="fa fa-plus"></i> NEW CODE<a>
							</td>
							</td>
						</tr>	
					</tbody>
				</table>
			</div>

			<div class="col-md-6">
				<table class="table table-hidaction table-credit">
					<input type="hidden" name="account-name" class="account-name" value="credit"/>
					<thead>
						<tr role="row" class="heading">
							<th width="100%" colspan="4" style="text-align:center">
								PENGELUARAN
							</th>
						</tr>
						<tr role="row" class="heading">
							<th width="15%">
								Code
							</th>
							<th width="85%" colspan="3">
								Account Name
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rs_accounts as $acc) : ?>
							<?php if ($acc['tipe'] == 'PENGELUARAN') : ?>
								<tr class="group-content">
									<td class="account-id"><span class="text text-danger"><?php echo $acc['accounting_id']?></span></td>
									<td class="account-name" colspan="2"><strong><?php echo $acc['name']?></strong>
											</td>
					                <td class="table-action-hide">
									<a title="" data-placement="left" data-toggle="tooltip" class="glyphicon glyphicon-question-sign tooltips" 
										data-original-title="
											<?php if(isset($acc['description'])) : echo $acc['description']; 
											else : echo "No Information"; endif; ?>"></a>
					                  <a href="#"><i class="fa fa-pencil"></i></a>
					                  <a href="<?php echo base_url()?>master/accounts/delete/<?php echo $acc['accounting_id']?>" class="delete-row" 
					                  	onclick="return confirm('are you sure? you cannot abort this action once deleted')">
					                  	<i class="fa fa-trash-o"></i>
					                  </a>
					                </td>
								</tr>
								<?php if (isset($acc['children']) && count($acc['children'])) : ?>								
									<?php foreach ($acc['children'] as $item) : ?>
										<tr class="group-content">
											<td class="account-id"></td>
											<td class="account-id" width="10%">
												<span class="text text-danger"><?php echo $item['accounting_id']?></span>
											</td>
											<td class="account-name"><?php echo $item['name']?></td>
							                <td class="table-action-hide">
											<a title="" data-placement="left" data-toggle="tooltip" class="glyphicon glyphicon-question-sign tooltips" 
												data-original-title="
													<?php if(isset($item['description'])) : echo $item['description']; 
													else : echo "No Information"; endif; ?>"></a>
							                  <a href="#"><i class="fa fa-pencil"></i></a>
							                  <a href="<?php echo base_url()?>master/accounts/delete/<?php echo $item['accounting_id']?>" class="delete-row" 
							                  	onclick="return confirm('are you sure? you cannot abort this action once deleted')">
							                  	<i class="fa fa-trash-o"></i>
							                  </a>
							                </td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>							
								<tr class="group-content">
									<td class="account-id"></td>
									<td class="account-name" colspan="3">
										<a href="#" class="new-sub-account" 
											data-toggle="modal" data-target="#modal-subnew"
											onclick="new_submenu('<?=$acc['accounting_id']?>','<?=$acc['name']?>','<?=$acc['tipe']?>')"><i class="fa fa-plus"></i> NEW SUBCODE<a></td>
								</tr>	
							<?php endif; ?>
						<?php endforeach; ?>
						<tr class="group-content">
							<td class="account-name" colspan="4">
							<a href="#" class="new-sub-account" 
								data-toggle="modal" data-target="#modal-new-code"
								onclick="new_account('PENDAPATAN')"><i class="fa fa-plus"></i> NEW CODE<a>
							</td>
							</td>
						</tr>	
					</tbody>
				</table>
			</div>
			
			</div>
	    </div>
	</div>        
	</div>
</div>

<div class="modal fade in" id="modal-subnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="form-add-sub" action="<?php echo base_url() ?>master/accounts/add_sub_accounts" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Add new sub accounting code</span></h4>
      </div>
      <div class="modal-body">
	     <input type="hidden"  name="new_sub_tipe" id="add-sub-tipe" class="form-control" required/>
      	<div class="form-group">
	      	<label class="control-label">Parent Code</label>
	      	<input type="text" name="new_sub_parent_id" id="add-sub-parent-code" class="form-control" readonly required/>
	    </div>
      	<div class="form-group">
	      	<label class="control-label">Parent Name</label>
	      	<input type="text" id="add-sub-parent-name" class="form-control" readonly required/>
        </div>
      	<div class="form-group">
	      	<label class="control-label">New Sub Accounting Code</label>
	      	<input type="text" name="new_sub_accounting_id" id="add-sub-code" class="form-control" required/>
        </div>
      	<div class="form-group">
	      	<label class="control-label">New Sub Code Name</label>
	      	<input type="text" name="new_sub_name" id="add-sub-name" class="form-control" required/>
        </div>
      	<div class="form-group">
	      	<label class="control-label">New Sub Code Description</label>
	      	<textarea name="new_sub_description" id="add-sub-description" class="form-control"/></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save-new-sub">Save changes</button>
      </div>
    </form>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div>

<div class="modal fade in" id="modal-new-code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
    <form id="form-add-sub" action="<?php echo base_url() ?>master/accounts/add_accounts" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Add new accounting code</span></h4>
      </div>
      <div class="modal-body">
	     <input type="hidden"  name="new_sub_tipe" id="add-new-tipe" class="form-control" required/>
      	<div class="form-group">
	      	<label class="control-label">New Sub Accounting Code</label>
	      	<input type="text" name="new_sub_accounting_id" id="add-new-code" class="form-control" required/>
        </div>
      	<div class="form-group">
	      	<label class="control-label">New Sub Code Name</label>
	      	<input type="text" name="new_sub_name" id="add-new-name" class="form-control" required/>
        </div>
      	<div class="form-group">
	      	<label class="control-label">New Sub Code Description</label>
	      	<textarea name="new_sub_description" id="add-new-description" class="form-control"/></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary save-new-sub">Save changes</button>
      </div>
    </form>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div>