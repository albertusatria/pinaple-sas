<?php
 /*
  * Author		: Albertus S Yudha
  * Description	: Block for Student Invoice History
 */
?>
<table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
<thead>
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
	<th width="17%">
		 Amount
	</th>
	<th width="17%">
		 Scholarship
	</th>
	<th width="17%">
		 Paid
	</th>
	<th width="19%">
		 Last Paid Date
	</th>
</tr>
</thead>
<tbody>
	<?php if(empty($ls_invoices)){ ?>
   		<tr><td colspan="7" align="center"> -- there is no invoices -- </td></tr>
   	<?php }else{ ?>	
        <?php $no = 1; foreach ($ls_invoices as $result): ?>
          <tr>
          	<td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
			<td><?php echo @$result->item_name; ?></td>
			<td><?php echo @$result->qty; ?></td>
			<td><?php echo @$result->amount; ?></td>
			<td><?php echo @$result->scholarship; ?></td>
			<td><?php echo @$result->amount_paid; ?></td>
			<td><?php echo @$result->last_payment_date; ?></td>
          </tr>
         <?php $no++; endforeach ; ?>
   	<?php } ?>
</tbody>
</table>