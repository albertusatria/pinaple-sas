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
							<?php if($report_title == 'earns'):?>
								<h4>Laporan Total Pendapatan Harian</h4>
							<?php else :?>
								<h4>Laporan Total Pengeluaran Harian</h4>
							<?php endif;?>
							<h4>SMP BUDI UTAMA</h4>
							<h4 class="range">Periode 31 Desember 2014 <label class="periode-range"></label></h4>
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
										<th width="40%">
											Subjek
										</th>
										<th width="55%">
											 Nominal
										</th>
									</tr>
		        				</thead>
		        				<tbody>
		        					<tr class="group-item">
		        						<td rowspan="4">1</td>
		        						<td colspan="2"><strong>Seragam</strong></td>
		        					</tr>
		        					<tr class="single-item">
		        						<td>Siswa Baru (14/15)</td>		        					
		        						<td>
		        							<span class="price" data-value="100000" readonly>100000</span>
		        						</td>
		        					</tr>
		        					<tr class="single-item">
		        						<td>Siswa Baru (15/16)</td>		        					
		        						<td>
		        							<span class="price" data-value="100000" readonly>100000</span>
		        						</td>
		        					</tr>
		        					<tr class="total-item">
		        						<td>&nbsp;</td>		        					
		        						<td class="amount">
		        							<span class="price" data-value="200000" readonly>200000</span>
		        						</td>
		        					</tr>
		        					<!-- /group-item-->
		        					<tr class="group-item">
		        						<td rowspan="3">2</td>
		        						<td colspan="2"><strong>Pendapatan Lain-lain</strong></td>
		        					</tr>
		        					<tr class="single-item">
		        						<td>Pengembalian Fieldtrip</td>				
		        						<td>
		        							<span class="price" data-value="0" readonly>0</span>
		        						</td>
		        					</tr>
		        					<tr class="total-item">
		        						<td>&nbsp;</td>		        					
		        						<td class="amount">
		        							<span class="price" data-value="0" readonly>0</span>
		        						</td>
		        					</tr>		        					
		        				</tbody>
		        				<tfoot>
		        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		        					<tr class="grand-total">
										<td colspan="2" class="total-label">
											<?php if($report_title == 'earns'):?>
												Total Pendapatan Harian SMP
											<?php else :?>
												Total Pengeluaran Harian SMP
											<?php endif;?>										
										</td>
			        					<td><span class="price" data-value="2649500" readonly>2649500</span></td>
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