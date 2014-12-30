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
		  <div class="panel panel-info" id="resultReport">
				<div class="panel-heading">
					<h5 class="panel-title">Financial Report for <label><?php echo $id?></label></h5>
					<p><a href="<?php echo base_url()?>payment_reports/financial_report"><i class="fa fa-reply"></i> Back to generate form page</a></p>
				</div>
				<div class="panel-body report-body">
					<div class="row">
					<a onclick="window.print()" class="btn btn-white print-report-button"><i class="fa fa-print"></i> Print Report</a>
						<div class="col-md-12 report-title">
							<h4>Laporan Kas Harian</h4>
							<h4>SMP BUDI UTAMA</h4>
							<h4 class="range">Periode Desember 2014 <label class="periode-range"></label></h4>
						</div>
					</div>
					<div class="row">
			        	<div class="col-md-12">
			        		<!-- Earns Table -->
		        			<table class="table table-bordered table-cashflow">
		        				<thead>
									<tr role="row" class="heading">
										<th width="5%">
											No
										</th>
										<th width="20%">
											Subjek
										</th>
										<th width="25%">
											 Nominal
										</th>
										<th width="25%">
											 Keterangan
										</th>
										<th width="25%">
											 Nominal
										</th>
									</tr>
		        				</thead>
		        				<tbody>
		        					<tr>
		        						<td rowspan="5">1</td>
		        						<td><strong>Saldo</strong></td>
		        						<td>
		        							<span class="price" data-value="14010000" readonly>14010000</span></td>
		        						<td colspan="2" class="bank-value"><strong>Bank</strong></td>
		        					</tr>
		        					<tr class="right-info">
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        						<td class="bank-name">BRI Tunai</td>
		        						<td class="bank-value">
		        							<span class="price" data-value="14000000">14000000</span>
		        						</td>
		        					</tr>
		        					<tr class="right-info">
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        						<td class="bank-name">BRI Transer</td>
		        						<td class="bank-value">
		        							<span class="price" data-value="11725000">11725000</span>
		        						</td>
		        					</tr>
									<tr class="right-info">
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        						<td class="bank-name">BRI Cek</td>
		        						<td class="bank-value">
		        							<span class="price" data-value="0">0</span>
		        						</td>
		        					</tr>
									<tr class="right-info kas-saldo">
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        						<td class="bank-name">Kas Besar</td>
		        						<td class="bank-value">
		        							<span class="price" data-value="13381150" readonly>13381150</span>
		        						</td>
		        					</tr>	
		        					<!-- /1st row-->	        								        					
		        					<tr class="right-info kas-saldo">
		        						<td>2</td>
		        						<td class="item-label">Formulir</td>
		        						<td class="item-value">
		        							<span class="price" data-value="0">0</span>
		        						</td>
		        						<td class="bank-name">Kas Kecil</td>
		        						<td class="bank-value">
		        							<span class="price" data-value="100" readonly>100</span>
		        						</td>
		        					</tr>
									<tr>
		        						<td>&nbsp;</td>
		        						<td class="item-label">DPP</td>
		        						<td class="item-value">
		        							<span class="price" data-value="20500000">20500000</span>
		        						</td>
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        					</tr>
									<tr>
		        						<td>&nbsp;</td>
		        						<td class="item-label">SPP</td>
		        						<td class="item-value">
		        							<span class="price" data-value="1565500">1565500</span>
		        						</td>
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        					</tr>
									<tr>
		        						<td>&nbsp;</td>
		        						<td class="item-label">Seragam</td>
		        						<td class="item-value">
		        							<span class="price" data-value="1300000">1300000</span>
		        						</td>
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        					</tr>		        							        							        									<tr>
		        						<td>&nbsp;</td>
		        						<td class="item-label">Pendapatan Lain-lain</td>
		        						<td class="item-value">
		        							<span class="price" data-value="0">0</span>
		        						</td>
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        					</tr>
		        				</tbody>
		        				<tfoot>
		        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		        					<tr class="grand-total">
										<td colspan="2" class="total-label">Total</td>
			        					<td><span class="price" data-value="2649500" readonly>2649500</span></td>
			        					<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        					</tr>
		        					<tr class="debit-total">
										<td colspan="2" class="total-label">Total Debet</td>
			        					<td><span class="price" data-value="40501150" readonly>40501150</span></td>
			        					<td>&nbsp;</td>
			        					<td><span class="price" data-value="40501150" readonly>40501150</span></td>
		        					</tr>			        					
		        				</tfoot>
		        			</table>
			        		<!-- /Cashflow Table -->
			        	</div>
		        	</div>	
		        	<!-- /row -->
		        				
		        	<div class="row">
			        	<div class="col-md-6 creator">
							<h5>Dibuat,</h5>
							<h5 class="person-in-charge">Bhimasta</h5>        		
						</div>
			        	<div class="col-md-6 creator">
							<h5>Menyetujui,</h5>
							<h5 class="supervisor">Megadewandanu</h5>
						</div>
		        	</div>
				</div>
		  </div>
	  </div>
  </div>
  
  
</div><!-- contentpanel -->