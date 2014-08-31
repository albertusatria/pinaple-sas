    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Unit </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li class="active">Units</li>
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

      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Unit</h3>
          <p>
        Don't Touch this data unless you're confident. <br><br>
            <a href="<?php echo base_url(); ?>setting/unit/add" data-title="Add Data" class="tip"><i class="fa fa-plus"></i> Add New Unit</a>
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
		                            <thead>
		                                <tr>
		                                    <th>#</th>
		                                    <th>ID</th>
		                                    <th>ID Parent</th>
                                        <th>Kategori</th>
		                                    <th>Nama Unit</th>
                                        <th>Kepala Unit</th>
                                        <th>No Registrasi</th>
		                                    <th style="width:10%;"></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1; foreach ($rs_unit as $result): ?>
		                                    <tr>
		                                        <td><?php echo $no; ?></td>
		                                        <td><?php echo $result->id_unit; ?></td>
                                            <td><?php echo $result->id_parent; ?></td>
                                            <td><?php echo $result->kategori; ?></td>
                                            <td><?php echo $result->unit; ?></td>
                                            <td><?php echo $result->nama_kepala_ref; ?></td>
                                            <td><?php echo $result->no_registrasi; ?></td>                                            
                                            <td>
	                                               <a href="<?php echo base_url(); ?>setting/unit/edit/<?php echo $result->id_unit; ?>">
	                                                <i class="fa fa-edit"></i></a>
	                                                &nbsp;&nbsp;
	                                                <i class="fa fa-trash-o" onclick="hapus(<?php echo $result->id_unit ?>,'<?php echo $result->unit ?>')"></i>
		                                        </td>
		                                    </tr>
		                                <?php $no++; endforeach ; ?>
		                            </tbody>           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->