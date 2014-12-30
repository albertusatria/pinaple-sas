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
							<h4>Laporan Pendapatan dan Biaya</h4>
							<h4>KB-TK-SD-SMP BUDI UTAMA</h4>
							<h4 class="range">Periode <?php echo $periode ?> <label class="periode-range"></label></h4>
						</div>
					</div>
					<div class="row">
			        	<div class="col-md-12">
			        		<!-- Earns Table -->
			        		<div class="col-md-6">
			        			<table class="table table-bordered table-striped table-earns">
			        				<thead>
			        					<tr>
			        						<th colspan="3">Pendapatan</th>
			        					</tr>
										<tr role="row" class="heading">
											<th width="5%">
												No
											</th>
											<th width="60%">
												Akun
											</th>
											<th width="35%">
												 Nominal
											</th>
										</tr>
			        				</thead>
			        				<tbody>
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
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										<?php endif; ?>
									<?php endforeach; ?>
			        				</tbody>
			        				<tfoot>

<!-- 			        					<?php if ( ($num-1) < ($total - ($num - 1)) ) : ?>
			        						<?php for ($i=0; $i < ($total - ($num-1) - ($num-1)); $i++) : ?>
					        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			        						<?php endfor; ?>
				        				<?php endif ?>
			        					<tr><td><?=$num-1?></td><td><?=$total?></td><td><?=($total - ($num-1) - ($num-1))?></td></tr>
 -->			        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>			
			        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>			
			        					<tr class="grand-total">
											<td colspan="2" class="total-label">Total Pendapatan</td>
				        					<td><span class="price" data-value="<?php echo $pendapatan ?>" readonly><?php echo $pendapatan ?></span></td>
			        					</tr>
			        					<tr><td colspan="2"></td><td>&nbsp;</td></tr>
			        					<tr class="debit-total">
											<td colspan="2" class="total-label">Total Debet</td>
				        					<td><span class="price" data-value="<?php echo $pendapatan ?>" readonly><?php echo $pendapatan ?></span></td>
			        					</tr>			        					
			        				</tfoot>
			        			</table>
			        		</div>
			        		<!-- /Earns Table -->
			        		
			        		<!-- Loss Table -->
			        		<div class="col-md-6">
			        			<table class="table table-bordered table-striped table-loss">
			        				<thead>
			        					<tr>
			        						<th colspan="3">Pengeluaran</th>
			        					</tr>			        				
										<tr role="row" class="heading">
											<th width="5%">
												No
											</th>
											<th width="60%">
												Akun
											</th>
											<th width="35%">
												 Nominal
											</th>
										</tr>
			        				</thead>
			        				<tbody>

									<?php $num = 1; $pengeluaran = 0; foreach ($rs_accounts as $acc) : ?>
										<?php if ($acc['tipe'] == 'PENGELUARAN') : ?>
			        					<tr>
			        						<td><?php echo $num ?></td>
			        						<td><?php echo $acc['name']?></td>			        						
											<?php if (isset($acc['children']) && count($acc['children'])) : ?>
											<td></td>
											<?php else : ?>								
			        						<td><span class="price" data-value="<?php echo ($acc['debet'] - $acc['kredit']) ?>" readonly>
			        							<?php echo ($acc['debet'] - $acc['kredit']) ?> </span>
				        						<?php $pengeluaran = $pengeluaran + ($acc['debet'] - $acc['kredit']) ?>
			        						</td>
											<?php endif; ?>
				        					</tr>
											<?php if (isset($acc['children']) && count($acc['children'])) : ?>
												<?php foreach ($acc['children'] as $item) : ?>
													<tr>
						        						<td></td>
						        						<td>&nbsp;&nbsp;&nbsp;<?php echo $item['name']?></td>			        						
						        						<td><span class="price" data-value="<?php echo ($acc['debet'] - $acc['kredit']) ?>" readonly>
						        							<?php echo ($acc['debet'] - $acc['kredit']) ?> </span>
							        						<?php $pengeluaran = $pengeluaran + ($item['debet'] - $item['kredit']) ?>
						        						</td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
											<?php $num++ ?>
										<?php endif; ?>										
									<?php endforeach; ?>
			        				</tbody>
			        				<tfoot>
			        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			        					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>			
			        					<tr class="grand-total">
											<td colspan="2" class="total-label">Total Biaya</td>
				        					<td><span class="price" data-value="<?php echo $pengeluaran ?>" readonly><?php echo $pengeluaran ?></span></td>
			        					</tr>
			        					<tr class="information-of-balance">
			        						<?php $defisit = $pendapatan - $pengeluaran ?>
											<td colspan="2" class="total-label">Surplus/Defisit</td>
				        					<td><span class="price" data-value="<?php echo $defisit ?>" readonly>
				        						<?php if ($defisit >= 0) : ?>
			        								<?php echo $defisit ?>
					        					<?php else : ?>
			        								(<?php echo $defisit ?>)
						        				<?php endif; ?>
				        						</span></td>
			        					</tr>
			        					<tr class="debit-total">
											<td colspan="2" class="total-label">Total Debet</td>
				        					<td><span class="price" data-value="200" readonly><?php echo $pendapatan ?></span></td>
			        					</tr>
			        				</tfoot>
			        			</table>	
			        		</div>
			        		<!-- /Loss Table -->
			        	</div>
		        	</div>	
		        	<!-- /row -->
		        	<!-- 
		        	<div class="row">
						<div class="col-md-6 col-md-6 wrapper-table-inventaris">
			        		<table class="table table-bordered table-inventaris">
								<tr>
									<td colspan="2">Inventaris</td>
									<td><span class="price" data-value="2000" readonly>2000</span></td>
								</tr>
			        		</table>
			        	</div>		        	
		        	</div>		
		        	 -->	
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