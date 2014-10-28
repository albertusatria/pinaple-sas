<div class="pageheader">
  <h2><i class="fa fa-group"></i> Manage Pendaftaran</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>      
      <li><a href="<?php echo base_url();?>registration/new_student">New Student</a></li>
      <li class="active">Import Excel</li>
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
      <div class="panel-btns">
        <a href="#" class="panel-close">&times;</a>
        <a href="#" class="minimize">&minus;</a>
      </div>
      <h4 class="panel-title">Import Excel to the Student Database</h4>
      <p>Add ew students from excel</p>
    </div>

  <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>registration/new_student/import_process" enctype="multipart/form-data">
    <div class="panel-body panel-body-nopadding">
      <div class="form-group">
        <label class="col-sm-4 control-label">File Excel 
        (<a href="<?php echo base_url(); ?>registration/new_student/format_excel"><span class="glyphicon glyphicon-download-alt"></span></a>.xls) 
        <span class="asterisk">*</span></label>
        <div class="col-sm-4">
      		<div class="fallback">
      			<input name="userfile" type="file" />
      		</div>                         
        </div>
      </div>                         
    </div><!-- panel-body -->
    <div class="panel-footer">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-primary">Import!</button>&nbsp;
          <button class="btn btn-default">Cancel</button>
        </div>
      </div>
    </div><!-- panel-footer -->
  </form>
    
  </div><!-- panel -->      
</div><!-- contentpanel -->