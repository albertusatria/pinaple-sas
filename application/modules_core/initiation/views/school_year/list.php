    <div class="pageheader">
      <h2><i class="fa fa-group"></i> School Year Management </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li class="active">School Year Management</li>
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
          <h3 class="panel-title">School Year Management</h3>
          <p>
        Don't Touch this data unless you're confident. <br><br>
            <a href="<?php echo base_url(); ?>initiation/school_year/add" data-title="Add Data" class="tip"><i class="fa fa-plus"></i> Add New School Year</a>
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
		                            <thead>
		                                <tr>
		                                    <th>#</th>
		                                    <th>School Year</th>
		                                    <th>Start</th>
                                        <th>End</th>
		                                    <th>Status</th>
		                                    <th style="width:33%;"></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                <?php $no = 1; foreach ($rs_school_year as $result): ?>
		                                    <tr>
		                                        <td><?php echo $no; ?></td>
		                                        <td><?php echo $result->name; ?></td>
		                                        <td><?php echo date("d-m-Y",strtotime($result->start)); ?></td>
		                                        <td><?php echo date("d-m-Y",strtotime($result->end)); ?></td>
		                                        <td><?php echo strtoupper($result->status); ?></td>
                                            <td>
	                                              <a href="<?php echo base_url(); ?>initiation/school_year/edit/<?php echo $result->id; ?>">
	                                                <i class="fa fa-pencil"></i></a>
	                                                &nbsp;&nbsp;
                                               <!-- <a href="<?php echo base_url(); ?>initiation/school_year/list_costs/<?php echo $result->id; ?>">
                                                  <i class="fa fa-file"></i></a> -->
                                                  &nbsp;&nbsp;
	                                                <i class="fa fa-trash-o" onclick="hapus(<?php echo $result->id ?>,'<?php echo $result->name ?>')"></i>
		                                        </td>
		                                    </tr>
		                                <?php $no++; endforeach ; ?>
		                            </tbody>           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->