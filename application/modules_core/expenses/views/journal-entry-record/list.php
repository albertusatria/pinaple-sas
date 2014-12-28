    <div class="pageheader">
      <h2><i class="fa fa-book"></i>School Expenses</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li>School Expenses</li>
          <li class="active">Journal Entry Record</li>
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

      
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">Journal Entry Record</h3><br/>
        </div>
        <div class="panel-body">
        <form id="formJournal" class="form-horizontal">
        	<div class="row">
				<div class="col-sm-5">             
					<div class="form-group">
						<label class="col-sm-4 control-label">General Journal #</label>
						<div class="col-sm-8">
							<input type="text" name="journal_id" class="form-control" placeholder="input journal ID">
						</div>
					</div>
				</div>  
				<div class="col-sm-6">
					<div class="form-group">
						<label class="col-sm-4 control-label">Date</label>
						<div class="col-sm-8">
							<input type="text" name="journal_date" class="form-control" readonly placeholder="journal date, format : dd-mm-yyyy">
						</div>
					</div>				    				    				
				</div>      	
        	</div>
        	<hr/>
        	<div class="table-responsive">
        	<a href="#" data-title="Add Row" class="add-row"><i class="fa fa-plus"></i> Add Row</a>
	            <table class="table table-journal">
	            <thead>
	              <tr>
	                <th>Acct #</th>
	                <th>Name</th>
	                <th>Debit</th>
	                <th>Credit</th>
	              </tr>
	            </thead>
	            <tbody>
	              <tr>
					<td class="acct-id"><span class="editable-label editable-click">ACC-101</span></td>	              
	                <td class="name">
	                    <label class="editable-label editable-click">Rent</label>
	                </td>
	                <td class="activa-debit" data-value="0"><span class="editable editable-click">0</span></td>
	                <td class="activa-credit" data-value="0"><span class="editable editable-click">0</span></td>
	              </tr>
	              <tr>
					<td>ACC-102</td>	              
	                <td>
	                    <div><strong>Prepaid Rent</strong></div>
	                </td>
	                <td class="activa-debit" data-value="0"><span class="editable editable-click">0</span></td>
	                <td class="activa-credit" data-value="0"><span class="editable editable-click">0</span></td>
	              </tr>
	            </tbody>
	          </table>
          </div>
          <table class="table table-total">
                <tbody>
                    <tr>
                        <td><strong>Total Debit :</strong></td>
                        <td class="total-debit" data-value="0">0</td>
                    </tr>
                    <tr>
                        <td><strong>Total Credit :</strong></td>
                        <td class="total-credit" data-value="0">0</td>
                    </tr>
                    <tr>
                        <td><strong>Out of Balance :</strong></td>
                        <td class="out-balance" data-value="0">0</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right btn-invoice">
                <button class="btn btn-primary mr5"><i class="fa fa-check-circle-o mr5"></i> Record</button>
                <button class="btn btn-white"> Cancel</button>
            </div>
        </form>
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->