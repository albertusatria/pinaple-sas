    <div class="pageheader">
      <h2><i class="fa fa-group"></i> School Year Management </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li>Initiation Data</li>
          <li class="active">School Year</li>
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
          <h3 class="panel-title">School Year Management</h3>
          <small> Don't Touch this data unless you're confident.</small>
        </div>
        <div class="panel-body">
          <a href="<?php echo base_url(); ?>initiation/school_year/add" data-title="Add Data" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New School Year</a>
          <div class="table-responsive">
            <table class="table table-striped">
		                            <thead>
		                                <tr>
		                                    <th>#</th>
		                                    <th>School Year</th>
		                                    <th>Start</th>
                                        <th>End</th>
		                                    <th>Status</th>
		                                    <th style="width:10%;"></th>
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
                                            <td style="text-align:center">
	                                              <a href="<?php echo base_url(); ?>initiation/school_year/edit/<?php echo $result->id; ?>">
	                                                <i class="fa fa-pencil"></i></a>
                                                  &nbsp;
                                                <a href="#" onclick="hapus('<?php echo $result->id ?>','<?php echo $result->name ?>')">
	                                                <i class="fa fa-trash-o"></i>
                                                </a>
		                                        </td>
		                                    </tr>
		                                <?php $no++; endforeach ; ?>
		                            </tbody>           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
      </div><!-- panel -->
        
    </div><!-- contentpanel -->