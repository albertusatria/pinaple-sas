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
							<h4 class="range">Periode <?php echo $periode ?> <label class="periode-range"></label></h4>
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
										<th width="60%">
											Subjek
										</th>
										<th width="35%">
											Nominal
										</th>
									</tr>
		        				</thead>
		        				<tbody>
									<?php if($report_title == 'earns'):?>


										<?php $num = 1; $pendapatan = 0; foreach ($profit as $acc) : ?>

											<?php if ($acc['tipe'] == 'PENDAPATAN') : ?>

												<?php if (isset($acc['children']) && count($acc['children'])) : ?>
													<!-- headerf first -->
						        					<tr class="group-item">
						        						<td rowspan="<?php echo (count($acc['children'])+1); ?>"><?php echo $num ?></td>
						        						<td colspan="2"><strong><?php echo $acc['name']?></strong></td>
						        					</tr>
													<!-- calling child -->
													<?php foreach ($acc['children'] as $item) : ?>
						        					<tr class="single-item">
						        						<td><?php echo $item['name']?></td>		        					
						        						<td><span class="price" data-value="<?php echo ($item['kredit'] - $item['debet']) ?>" readonly>
						        							<?php echo ($item['kredit'] - $item['debet']) ?> </span>
							        						<?php $pendapatan = $pendapatan + ($item['kredit'] - $item['debet']) ?>
						        						</td>
						        					</tr>
													<?php endforeach; ?>
												<?php else : ?>
													<!-- don't have children -->

														<!-- cek if have period -->
														<?php if (isset($acc['period']) && count($acc['period'])) : ?>
															<!-- headerf first -->
								        					<tr class="group-item">
								        						<td rowspan="<?php echo (count($acc['period'])+2); ?>"><?php echo $num ?></td>
								        						<td colspan="2"><strong><?php echo $acc['name']?></strong></td>
								        					</tr>
															<!-- calling child -->
															<?php foreach ($acc['period'] as $item) : ?>
																	<?php if (isset($item['kelas']) && count($item['kelas'])) : ?>
											        					<tr class="single-item">
											        						<td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['period_year']?></td>		        					
											        					</tr>																
																		<!-- calling child -->
																		<?php foreach ($item['kelas'] as $x) : ?>
											        					<tr class="single-item">
											        						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $x['nama']?></td>		        					
											        						<td><span class="price" data-value="<?php echo ($x['kredit'] - $x['debet']) ?>" readonly>
											        							<?php echo ($x['kredit'] - $x['debet']) ?> </span>
												        						<?php $pendapatan = $pendapatan + ($x['kredit'] - $x['debet']) ?>
											        						</td>
											        					</tr>
																		<?php endforeach; ?>
																	<?php else : ?>
											        					<tr class="single-item">
											        						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $item['period_year']?></td>		        					
											        						<td><span class="price" data-value="<?php echo ($item['kredit'] - $item['debet']) ?>" readonly>
											        							<?php echo ($item['kredit'] - $item['debet']) ?> </span>
												        						<?php $pendapatan = $pendapatan + ($item['kredit'] - $item['debet']) ?>
											        						</td>
											        					</tr>																
																	<?php endif; ?>
															<?php endforeach; ?>
															<!-- cek if have class -->
														<?php else : ?>
								        					<tr class="single-item">
								        						<td><?php echo $num ?></td>
								        						<td><?php echo $acc['name']?></td>		        					
								        						<td><span class="price" data-value="<?php echo ($acc['kredit'] - $acc['debet']) ?>" readonly>
								        							<?php echo ($acc['kredit'] - $acc['debet']) ?> </span>
									        						<?php $pendapatan = $pendapatan + ($acc['kredit'] - $acc['debet']) ?>
								        						</td>
								        					</tr>														
														<?php endif; ?>
												<?php endif; ?>
												<?php $num++; ?>
											<?php endif; ?>


										<?php endforeach; ?> <!-- $rs_accounts -->     					


									<?php else :?>

										<?php $num = 1; $pengeluaran = 0; foreach ($rs_accounts as $acc) : ?>

											<?php if ($acc['tipe'] == 'PENGELUARAN') : ?>

												<?php if (isset($acc['children']) && count($acc['children'])) : ?>
													<!-- headerf first -->
						        					<tr class="group-item">
						        						<td rowspan="<?php echo (count($acc['children'])+1); ?>"><?php echo $num ?></td>
						        						<td colspan="2"><strong><?php echo $acc['name']?></strong></td>
						        					</tr>
													<!-- calling child -->
													<?php foreach ($acc['children'] as $item) : ?>
						        					<tr class="single-item">
						        						<td><?php echo $item['name']?></td>		        					
						        						<td><span class="price" data-value="<?php echo ($item['debet'] - $item['kredit']) ?>" readonly>
						        							<?php echo ($item['debet'] - $item['kredit']) ?> </span>
							        						<?php $pengeluaran = $pengeluaran + ($item['debet'] - $item['kredit']) ?>
						        						</td>
						        					</tr>
													<?php endforeach; ?>
	
												<?php else : ?>
													<!-- don't have children -->
						        					<tr class="single-item">
						        						<td><?php echo $num ?></td>
						        						<td><?php echo $acc['name']?></td>		        					
						        						<td><span class="price" data-value="<?php echo ($acc['debet'] - $acc['kredit']) ?>" readonly>
						        							<?php echo ($acc['debet'] - $acc['kredit']) ?> </span>
							        						<?php $pengeluaran = $pengeluaran + ($acc['debet'] - $acc['kredit']) ?>
						        						</td>
						        					</tr>
												<?php endif; ?>
											<?php $num++; ?>

											<?php endif; ?>


										<?php endforeach; ?> <!-- $rs_accounts -->

									<?php endif;?>
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
											<?php if($report_title == 'earns'):?>
					        					<td><span class="price" data-value="<?php echo $pendapatan ?>" readonly><?php echo $pendapatan ?></span></td>
											<?php else :?>
					        					<td><span class="price" data-value="<?php echo $pengeluaran ?>" readonly><?php echo $pengeluaran ?></span></td>
											<?php endif;?>										
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