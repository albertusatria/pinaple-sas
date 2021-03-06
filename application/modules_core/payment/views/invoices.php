<div class="pageheader">
    <h2><i class="fa fa-folder-open-o"></i>Invoice Management</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li class="active">Student Payment &nbsp;/&nbsp; Invoices Management</li>
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
		          <h4 class="panel-title">Invoices</h4>
		        </div><!-- panel-heading -->
		        
		        <div class="panel-body">

 					<div class="table-container">
						<div class="table-actions-wrapper">
							<div class="col-md-4 col-sm-12 right bulk-actions">
								<button class="btn btn-sm btn-success table-group-action-submit"><i class="fa fa-check"></i> Submit</button>							
							<select class="table-group-action-input form-control input-inline input-small input-sm">
								<option value="">Select...</option>
								<option value="Cancel">Cancel</option>
								<option value="Cancel">Hold</option>
								<option value="Cancel">On Hold</option>
								<option value="Close">Close</option>
							</select>
							<label class="bulk-label">Bulk Actions</label>
							</div>
						</div>
						<table class="table table-striped table-bordered table-hover" id="datatable_orders">
						<thead>
						<tr role="row" class="heading">
							<th width="2%">
								 <input type="checkbox" class="group-checkable">
							</th>
							<th width="10%">
								 Invoice Order&nbsp;#
							</th>
							<th width="10%">
								 Invoice&nbsp;Date
							</th>
							<th width="15%">
								 Bill to NIS
							</th>
							<th width="10%">
								 Institution
							</th>
							<th width="10%">
								 Status
							</th>
							<th width="12%">
								 Actions
							</th>
						</tr>
						<tr role="row" class="filter">
							<td>
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="order_id">
							</td>
							<td>
								<div class="input-group">
									<input type="text" class="form-control datepicker" placeholder="From">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>								
								<div class="input-group">
									<input type="text" class="form-control datepicker" placeholder="To">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								</div>								
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm" name="order_customer_nis" placeholder="Bill to student, input NIS">
							</td>
							<td>
								<select name="order_status" class="form-control form-filter input-sm">
									<option value="">Select...</option>
									<option value="TK">TK</option>
									<option value="SMP">SMP</option>
									<option value="SMA">SMA</option>
								</select>
							</td>
							<td>
								<select name="order_status" class="form-control form-filter input-sm">
									<option value="">Select...</option>
									<option value="pending">Pending</option>
									<option value="closed">Closed</option>
									<option value="hold">On Hold</option>
									<option value="fraud">Fraud</option>
								</select>
							</td>
							<td class="actions">
								<div class="margin-bottom-5">
									<button class="btn btn-sm btn-warning filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
								</div>
								<button class="btn btn-sm btn-info filter-cancel"><i class="fa fa-times"></i> Reset</button>
							</td>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" class="checkable"></td>
								<td>#123123</td>
								<td>06 January 2013</td>
								<td>Simon M</td>
								<td>SD</td>
								<td>Paid</td>
								<td><a href="#">View Order</a></td>
							</tr>
						</tbody>
						</table>
						</div>
					</div>										
		        </div>
		        <!-- /panel-body -->	        
			</div>
			<!-- /panel -->
  		</div>
  		<!-- /col-md-12 -->
  	</div>
  	<!-- /row -->

</div><!-- /contentpanel -->