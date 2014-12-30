    <div class="pageheader">
      <h2><i class="fa fa-sort-numeric-desc"></i> Manage Unit </h2>
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

      
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Unit</h3>
          <small>
            You can edit the general information for each Unit here. For security and integration reason, you cannot create unit yourself
            <!-- <a href="<?php echo base_url(); ?>master/units/add" data-title="Add Data" class="tip"><i class="fa fa-plus"></i> Add New Unit</a> -->
          </small>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
		                            <thead>
		                                <tr>
		                                    <th>ID</th>
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
		                                        <td><?php echo $result->id; ?></td>
                                            <td><?php echo $result->category; ?></td>
                                            <td><?php echo $result->name; ?></td>
                                            <td><?php echo $result->headmaster_name; ?></td>
                                            <td><?php echo $result->registration_number; ?></td>                                            
                                            <td style="text-align:center">
	                                               <a href="<?php echo base_url(); ?>master/units/edit/<?php echo $result->id; ?>">
	                                                <i class="fa fa-edit"></i></a>
	                                                &nbsp;&nbsp;
	                                                <!-- <a href="#" onclick="hapus(<?php echo $result->id ?>,'<?php echo $result->name ?>')"><i class="fa fa-trash-o"></i></a> -->
		                                        </td>
		                                    </tr>
		                                <?php $no++; endforeach ; ?>
		                            </tbody>          
                               </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->