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
					<p> Choose the following template below to generate financial report.</p>
				</div>
				<div class="panel-body">
					<div class="form-group" style="margin-bottom:0;">
				      <label class="col-sm-3 control-label">Template Report <span class="asterisk">*</span></label>
				      <div class="col-sm-9">
				        <select id="report" class="form-control input-sm" required="" onchange="Report.selectReport()">
				          <option value="">Choose one of the following report template</option>
				          <option value="a01">Monthly Profit & Loss - A01</option>
				          <option value="a02">Daily Profit - A02</option>
				          <option value="a03">Daily Loss - A03</option>
				          <option value="a04">Daily Cashflow - A04</option>
				          <option value="a05">Yearly Profit & Loss Statement - A05</option>
				          <!--<option value="custom">Custom Financial Report</option>-->
				        </select>
				        <label class="error" for="report"></label>	
				      </div>
				    </div>
				    <!-- /form-group -->
				    
					<div class="form-group range-report">
						<label class="col-sm-3 control-label">Date <span class="asterisk">*</span></label>
						<div class="col-sm-3">
							<div id="reportrange" class="btn default">
								<i class="fa fa-calendar"></i>
								&nbsp; <span>
								</span>
								<b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>				    
					<!-- /form-group date range -->
															
				    <div class="form-group wrapper-option-label">
				    	<h1 class="option-label fancy"><span>Custom Report</span></h1>		       
				    </div>
				</div>
				<!-- /panel-body -->
				
				<div class="panel-footer">
	                <div class="row">
						<div class="col-sm-7 col-sm-offset-5">
							<button class="btn btn-primary" id="generate-report">Generate</button>
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