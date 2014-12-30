<div class="pageheader">
  <h2><i class="fa fa-group"></i> Scholarship Allocation</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>General Reports</li>
      <li><a href="<?php echo base_url();?>report/scholarship_allocation">Scholarship Allocation</a></li>
      <li class="active">Student List</li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h4 class="panel-title">Student List of Scholarship Allocation: 
      <b><?php echo $scholarship->name; ?></b> - <label class="price"><?php echo $scholarship->amount?></label></h4>
      <p><?php echo $scholarship->description; ?></p>
      <br/>
      <a onclick="window.print()" class="btn btn-white print-report-button"><i class="fa fa-print"></i> Print Report</a>
    </div>
  
	<div class="panel-heading-print">
      <h4 class="panel-title">Laporan <br/>Alokasi Dana Beasiswa <?php echo $scholarship->name; ?></h4>
    </div>
  
    <div class="panel-body">    
    	<div class="row">
    	<div class="col-md-12">           
			  <table class="table table-bordered table-hover" id="datatable_orders">
			    <thead>
			    <tr role="row" class="heading">
			      <th width="5%">
			         No <!--<input type="checkbox" class="group-checkable">-->
			      </th>
			      <th width="10%">
			         NIS
			      </th>
			      <th width="20%">
			         Student Name
			      </th>
			      <th width="15%">
			         Class
			      </th>
			      <th width="15%">
			         Amount Allocation
			      </th>
			      <th width="30%">
			         Note
			      </th>
			    </tr>
			    </thead>
			    <tbody>
			      <?php if(empty($student)){ ?>
			        <tr><td colspan="6" align="center"> -- there are no students -- </td></tr>
			        <?php }else{ ?> 
			            <?php $no = 1; foreach ($student as $result): ?>
			        <tr>
			          <td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
			          <td><?php echo @$result->nis; ?></td>
			          <td><?php echo @$result->full_name; ?></td>
			          <td><?php echo @$result->class_name; ?></td>
			          <td align="right"><span style="float:left;">Rp </span><?php echo number_format(@$result->amount,2,',','.'); ?></td>
			          <td><?php echo @$result->notes; ?></td>
			        </tr>
			             <?php $no++; endforeach ; ?>
			        <?php } ?>
			    </tbody>
			    <?php if(!empty($student)):?>
				<tfoot>
					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr class="grand-total">
						<td colspan="4" class="total-label">Total</td>
    					<td><span class="price" data-value="0" readonly>0</span></td>
    					<td>&nbsp;</td>
					</tr>
				</tfoot>
				<?php endif;?>			    
			  </table>
    	</div>
    	</div>
    </div><!-- panel-body -->
    
    <div class="panel-footer">
        
    </div><!-- panel-footer -->    

  </div><!-- panel -->      
</div><!-- contentpanel -->