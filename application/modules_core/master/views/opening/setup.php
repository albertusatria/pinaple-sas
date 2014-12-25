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


 	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>Opening Balance for period <?php echo $opening_year['name'] ?></h3>
			<small>This setup is set manually once. Afterward, the opening balance will be automatically set by system.</small>
		</div>


	<div class="panel-body">
	    <div class="row">
	        <div class="neraca col-md-12">
      		<form action="<?php echo base_url()?>master/opening_balance/save_opening_balance" method="POST">
	      	<div class="form-group">
		      	<div class="col-md-6">
		      		<label class="form-label">Opening Balance Date</label>
		      		<div>
		    	        <input type="text" placeholder="Opening Balance Date: dd-mm-yyyy" name="opening_date" 
		    	        	id="tgl_opening" class="form-control" required readonly>
	    	        </div>
		      	</div>
	      	</div>
	      	<div class="col-md-12">
				<table class="table table-hidaction table-striped table-debet">
					<!-- <input type="hidden" name="account-name" class="account-name" value="debet"/> -->
					<thead>
						<tr role="row" class="heading">
							<th width="15%">
								Code
							</th>
							<th width="50%" colspan="2">
								Account Name
							</th>
							<th width="15%" style="text-align:center">
								D/K
							</th>
							<th width="20%" style="text-align:center">
								Amount
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($setup['setup_status'] == 0) : ?>
						<?php $i=0;foreach ($rs_accounts as $acc) : ?>
							<?php if ($acc['tipe'] == 'AKTIVA') : ?>
								<tr class="group-content">
									<input name="balance_value[<?=$i?>][accounting_year]" type="hidden" value="<?php echo $opening_year['opening_id']?>">
									<input name="balance_value[<?=$i?>][accounting_id]" type="hidden" value="<?php echo $acc['accounting_id']?>">
									<td class="account-id" style="vertical-align:middle"><span class="text text-danger"><?php echo $acc['accounting_id']?></span></td>
									<td class="account-name" colspan="2" style="vertical-align:middle"><strong><?php echo $acc['name']?></strong></td>
									<td style="vertical-align:middle">
										<select name="balance_value[<?=$i?>][amount_type]" class="form-control">
											<option value="D" selected>Debet</option>
											<option value="K">Kredit</option>
										</select>
									</td>
									<td style="vertical-align:middle"><input type="text" name="balance_value[<?=$i?>][amount]" class="form-control input-sm" value="0"/> </td>
								</tr>
								<?php if (isset($acc['children']) && count($acc['children'])) : ?>								
									<?php foreach ($acc['children'] as $item) : ?>
										<tr class="group-content">
											<td class="account-id"></td>
											<td class="account-id" width="10%">
												<span class="text text-danger"><?php echo $item['accounting_id']?></span>
											</td>
											<td class="account-name"><?php echo $item['name']?></td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>							
							<?php endif; ?>
							<?php $i++ ?>
						<?php endforeach; ?>
						<?php else : ?>
						<?php $i=0;foreach ($rs_accounts as $acc) : ?>
							<?php if ($acc['tipe'] == 'AKTIVA') : ?>
								<tr class="group-content">
									<td class="account-id" style="vertical-align:middle"><span class="text text-danger"><?php echo $acc['accounting_id']?></span></td>
									<td class="account-name" colspan="2" style="vertical-align:middle"><strong><?php echo $acc['name']?></strong></td>
									<td style="vertical-align:middle">
										<?php echo $acc['amount_type'] ?>										
									</td>
									<td style="vertical-align:middle"><?php echo $acc['amount']?></td>
								</tr>
								<?php if (isset($acc['children']) && count($acc['children'])) : ?>								
									<?php foreach ($acc['children'] as $item) : ?>
										<tr class="group-content">
											<td class="account-id"></td>
											<td class="account-id" width="10%">
												<span class="text text-danger"><?php echo $item['accounting_id']?></span>
											</td>
											<td class="account-name"><?php echo $item['name']?></td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>							
							<?php endif; ?>
							<?php $i++ ?>
						<?php endforeach; ?>

						<?php endif; ?>
					</tbody>
				</table>
				<?php if ($setup['setup_status'] == 0) : ?>
				<button type="submit" class="btn btn-primary">Simpan</button>
				<?php endif; ?>
			</div>
			</form>
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