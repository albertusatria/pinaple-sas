<div class="pageheader">
    <h2><i class="fa fa-money"></i>Financial Report</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li class="active">Payment Reports &nbsp;/&nbsp; Financial Report</li>
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
		  <!-- Form -->
		  <form id="generateForm" action="#" class="form-horizontal" novalidate="novalidate">
		  <div class="panel panel-info" id="generateReport">
				<div class="panel-heading">
					<h5 class="panel-title">Generate Financial Report</h5>
					<p> Choose the following template below or create a custom setting to generate financial report.</p>
				</div>
				<div class="panel-body">
					<div class="form-group" style="margin-bottom:0;">
				      <label class="col-sm-3 control-label">Template Report <span class="asterisk">*</span></label>
				      <div class="col-sm-9">
				        <select id="report" class="form-control input-sm" required="">
				          <option value="">Choose one of the following report template</option>
				          <option value="a01">Monthly Profit & Loss - A01</option>
				          <option value="a02">Daily Profit - A02</option>
				          <option value="a03">Daily Loss - A03</option>
				          <option value="a04">Daily Cashflow - A04</option>
				          <option value="a05">Yearly Profit & Loss Statement - A05</option>
				          <option value="custom">Custom Financial Report</option>		                      
				        </select>
				        <label class="error" for="report"></label>	
				      </div>
				    </div>
				    <!-- /form-group -->
				    
					<div class="form-group range-daily">
						<label class="col-sm-3 control-label">Date <span class="asterisk">*</span></label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="text" class="form-control datepicker-daily" placeholder="dd/mm/yyyy" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>				    
					<!-- /form-group date daily -->
					
					<div class="form-group range-monthly">
						<label class="col-sm-3 control-label">Date <span class="asterisk">*</span></label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="text" class="form-control datepicker-monthly-from" placeholder="dd/mm/yyyy" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
						<div class="col-sm-3">
							<label class="range-label">To</label>
							<div class="input-group">
								<input type="text" class="form-control datepicker-monthly-to" placeholder="dd/mm/yyyy" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>				    
					<!-- /form-group date monthly -->

					<div class="form-group range-yearly">
						<label class="col-sm-3 control-label">Date <span class="asterisk">*</span></label>
						<div class="col-sm-3">
							<div class="input-group">
								<input type="text" class="form-control datepicker-yearly-from" placeholder="yyyy" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
						<div class="col-sm-3">
							<label class="range-label">To</label>
							<div class="input-group">
								<input type="text" class="form-control datepicker-yearly-to" placeholder="yyyy" id="datepicker">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>				    
					<!-- /form-group date yearly -->
															
				    <div class="form-group wrapper-option-label">
				    	<h1 class="option-label fancy"><span>Custom Report</span></h1>		       
				    </div>
				</div>
				<!-- /panel-body -->
				
				<div class="panel-footer">
	                <div class="row">
						<div class="col-sm-7 col-sm-offset-5">
							<button class="btn btn-primary">Generate</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
	                </div>
				</div>
				<!-- /panel-body -->
		  </div>
		  </form>
		  <!-- /Form -->
	  </div>
  </div>
  
  
</div><!-- contentpanel -->

<!-- Modal -->
<div class="modal fade-full" id="confirmationPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran</h4>
      </div>
      <div class="modal-body">
        <div class="payer-info">
          <div class="col-sm-6">
            Nis : <span id="konfirmasiNIS"> - </span> <br>
            Nama : <strong><input type="text" id="konfirmasiNama" placeholder="Payer name here ..." readonly></strong><br>
          </div>
          <div class="col-sm-6">
            Unit : <span id="konfirmasiUnit"> - </span> <br>
            Kelas : <span id="konfirmasiKelas"> - </span> <br>
          </div>

        </div>
        <div class="table-item">
        </div>
		
		<h3>Metode Pembayaran</h3>
        <hr/>
        <div class="metode-pembayaran">

	      <div class="col-sm-12">
	        <select id="paymentMethodOption" class="form-control input-sm" required>
	          <option value="">Choose one from available method below</option>
	          <?php foreach ($payment_methods as $methods) : ?>
	            <option value="<?php echo $methods['accounting_id'] ?>"><?php echo $methods['name'] ?></option>
	          <?php endforeach; ?>
	        </select>
	        <label class="error" for="fruits"></label>
	      </div>        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="doPayment">Bayar dan Cetak</button>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->