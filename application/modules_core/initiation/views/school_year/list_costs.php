    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Tahun Ajaran </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/tahun_ajaran/">Manage Tahun Ajaran</a></li>
          <li class="active">Manage Tahun Ajaran <?php echo $r_ta->tahun_ajaran; ?></li>
        </ol>
      </div>
    </div>
        
    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong> <?php echo $message; ?>
        </div>
      <?php endif ; ?>

      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Cost Tahun Ajaran <?php echo $r_ta->tahun_ajaran; ?></h3>
          <p>
        Don't Touch this data unless you're confident. <br><br>
            <a href="<?php echo base_url(); ?>setting/tahun_ajaran/add_cost/<?php echo $r_ta->id; ?>" data-title="Add Data" class="tip"><i class="fa fa-plus"></i> Add New Cost Tahun Ajaran <?php echo $r_ta->tahun_ajaran; ?></a>
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
		                            <thead>
		                                <tr>
		                                    <th>#</th>
                                        <th>Unit Name</th>
		                                    <th>Item Cost Name</th>
                                        <th colspan="2" style="width:15%;">Amount</th>
		                                    <th style="width:33%;"></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1; foreach ($rs_ta_costs as $result): ?>
		                                    <tr>
		                                        <td><?php echo $no; ?></td>		                                        
		                                        <td><?php echo $result->unit_name; ?></td>
		                                        <td><?php echo $result->item_name; ?></td>
                                            <td>Rp</td>
                                            <td style="text-align:right">
                                            <?php echo number_format($result->item_amount,2,',','.') ?>
                                            </td>
                                            <td style="text-align:center">
	                                              <a href="<?php echo base_url(); ?>setting/tahun_ajaran/edit_cost/<?php echo $r_ta->id; ?>/<?php echo $result->ac_id; ?>">
	                                                <i class="fa fa-pencil"></i></a>
	                                                &nbsp;&nbsp;
	                                                <i class="fa fa-trash-o" onclick="hapus(
                                                  <?php echo $r_ta->id ?>,
                                                  <?php echo $result->ac_id ?>,
                                                  '<?php echo $result->unit_name.": ".$result->item_name ?>'
                                                  )"></i>
		                                        </td>
		                                    </tr>
		                                <?php $no++; endforeach ; ?>
		                            </tbody>           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->
    
<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script>
  jQuery(document).ready(function() {
    
    jQuery('#table1').dataTable();
    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
  
  });
</script>
<script type="text/javascript" language="javascript">
  function hapus(ta,no,nama){
    if(confirm('Yakin akan menghapus '+nama+' ini?'))
      window.location = "<?php echo base_url(); ?>setting/tahun_ajaran/delete_cost/"+ta+"/"+no;
  }
</script>

