<?php
 /*
  * Author		: Albertus S Yudha
  * Description	: Block for Student Invoice History
 */
?>
<?php if(empty($ls_invoices)){ ?>
<table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
		<tr><td colspan="8" align="center"> -- there is no invoices -- </td></tr>
</table>
	<?php }else{ $py=''?>	
	<table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
    <?php $no = 1; foreach ($ls_invoices as $result): ?>
      <?php if($py!=$result->period_year){ $py=$result->period_year; $no = 1;?>
        <tr>
          	<th colspan="8">School Year: <?php echo $py; ?><span style="float:right;"><?php echo @$result->class_level; ?> - <?php echo @$result->class_name; ?></span></th>
        </tr>
		<tr role="row" class="heading">
			<th width="2%">
				 No <!--<input type="checkbox" class="group-checkable">-->
			</th>
			<th width="26%">
				 Name
			</th>
			<th width="2%">
				 Qty
			</th>
			<th width="16%">
				 Amount
			</th>
			<th width="16%">
				 Scholarship
			</th>
			<th width="16%">
				 Paid
			</th>
			<th width="19%">
				 Last Paid Date
			</th>
			<th width="3%">
				 Delete
			</th>
		</tr>
      <?php } ?>
      	<tr>
	      	<td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
			<td><?php echo @$result->item_name; if($result->period_name){ echo " (".@$result->period_name.")";} ?></td>
			<td><?php echo @$result->qty; ?></td>
			<td align="right"><span style="float:left;">Rp </span><?php echo number_format(@$result->amount,2,',','.'); ?></td>
			<td align="right"><span style="float:left;">Rp </span><?php echo number_format(@$result->scholarship,2,',','.'); ?></td>
			<td align="right"><span style="float:left;">Rp </span><?php echo number_format(@$result->amount_paid,2,',','.'); ?></td>
			<td>
				<?php 
					if(@$result->last_payment_date>'2000-01-01')
						echo date('d F Y',strtotime(@$result->last_payment_date));
					else
						echo "-"; 
				?>
			</td>
			<td align="center">
				<?php if($result->status=="UNPAID" && @$result->amount_paid==0){ ?>
				<a href="#" class="delete-row" onclick="hapus('<?php echo $result->id ?>','<?php echo $result->item_name ?>','<?php echo $result->nis ?>')">
				<i class="fa fa-trash-o"></i></a>
				<?php } ?>
			</td>
    	</tr>
    <?php $no++; endforeach ; ?>
</table>
<?php } ?>
