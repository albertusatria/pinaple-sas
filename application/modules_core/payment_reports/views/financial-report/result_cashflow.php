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
		        						<td rowspan="7">1</td>
		        						<td><strong>Saldo</strong></td>
		        						<td>
		        							<span class="price" data-value="14010000" readonly>14010000</span></td>
		        						<td colspan="2" class="bank-value"><strong>Bank</strong></td>
		        					</tr>
			        				<?php $total = count($cash_out); ?>
									<?php $transfer = 0; foreach ($cash_out as $acc) : ?>
										<?php if ($acc['tipe'] == 'AKTIVA') : ?>
			        					<tr class="right-info">
			        						<td>&nbsp;</td>
			        						<td>&nbsp;</td>
			        						<td>Transfer <?php echo $acc['name']?></td>			        						
			        						<td><span class="price" data-value="<?php $acc['debet'] ?>" readonly>
			        							<?php echo ($acc['debet']) ?> </span>
				        						<?php $transfer = $transfer + $acc['debet'] ?>
			        						</td>
			        					</tr>
										<?php endif; ?>
									<?php endforeach; ?>
									<tr class="right-info kas-saldo">
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        						<td class="bank-name">Kas Besar (Debet - Kas Besar)</td>
		        						<td class="bank-value">
				        					<span class="price" data-value="0" readonly>0</span>
		        						</td>
		        					</tr>	

		        					<!-- /1st row-->	        								        					
		        					<tr class="right-info kas-saldo">
			        				<?php $total = count($rs_accounts); ?>
									<?php $pengeluaran = 0; foreach ($rs_accounts as $acc) : ?>
										<?php if ($acc['tipe'] == 'PENGELUARAN') : ?>
				        						<?php $pengeluaran = $pengeluaran + ($acc['debet'] - $acc['kredit']) ?>
											<?php if (isset($acc['children']) && count($acc['children'])) : ?>
												<?php foreach ($acc['children'] as $item) : ?>
						        						<?php $pengeluaran = $pengeluaran + ($item['debet'] - $item['kredit']) ?>
												<?php endforeach; ?>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>
		        						<td>&nbsp;</td>
		        						<td>&nbsp;</td>
		        						<td class="bank-name">Kas Kecil</td>
		        						<td class="bank-value">
				        					<span class="price" data-value="<?php echo $pengeluaran ?>" readonly><?php echo $pengeluaran ?></span>
		        						</td>
		        					</tr>
			        				<?php $total = count($rs_accounts); ?>
									<?php $num = 1; $pendapatan = 0; foreach ($rs_accounts as $acc) : ?>
										<?php if ($acc['tipe'] == 'PENDAPATAN') : ?>
			        					<tr>
			        						<td><?php echo $num ?></td>
			        						<td><?php echo $acc['name']?></td>			        						
											<?php if (isset($acc['children']) && count($acc['children'])) : ?>
											<td></td>
											<?php else : ?>								
			        						<td><span class="price" data-value="<?php echo ($acc['kredit'] - $acc['debet']) ?>" readonly>
			        							<?php echo ($acc['kredit'] - $acc['debet']) ?> </span>
				        						<?php $pendapatan = $pendapatan + ($acc['kredit'] - $acc['debet']) ?>
			        						</td>
			        						<td>&nbsp;</td>
			        						<td>&nbsp;</td>
											<?php endif; ?>
				        					</tr>
											<?php $num++ ?>
											<?php if (isset($acc['children']) && count($acc['children'])) : ?>
												<?php foreach ($acc['children'] as $item) : ?>
													<tr>
						        						<td></td>
						        						<td>&nbsp;&nbsp;&nbsp;<?php echo $item['name']?></td>			        						
						        						<td><span class="price" data-value="<?php echo ($item['kredit'] - $item['debet']) ?>" readonly>
						        							<?php echo ($item['kredit'] - $item['debet']) ?> </span>
						        						</td>
						        						<?php $pendapatan = $pendapatan + ($item['kredit'] - $item['debet']) ?>
						        						<td>&nbsp;</td>
						        						<td>&nbsp;</td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>

		        				</tbody>
		        				<tfoot>
		        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		        					<tr class="grand-total">
										<td colspan="2" class="total-label">Total</td>
				        					<td><span class="price" data-value="<?php echo $pendapatan ?>" readonly><?php echo $pendapatan ?></span></td>
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