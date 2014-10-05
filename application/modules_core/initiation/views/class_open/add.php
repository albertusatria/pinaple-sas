<div class="pageheader">
  <h2><i class="fa fa-group"></i> Manage Classes</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>Initiation Data</li>
      <li><a href="<?php echo base_url();?>initiation/class_open">Class Open</a></li>
      <li><a href="<?php echo base_url();?>initiation/class_open/class_list/<?php echo $unit->id ?>">Menu <?php echo $unit->name ?></a></li>
      <li class="active">Class Add</li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">Add Class on Unit <?php echo $unit->name; ?></h4>
      <p>Please fill the new extra information below</p>
    </div>
    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>initiation/class_open/add_process">

    <input type="hidden" name="unit_id" value="<?php echo $unit->id ?>">
    <input type="hidden" name="school_year_id" value="<?php echo $active_school_year->id ?>">

    <div class="panel-body panel-body-nopadding">
      
        <div class="form-group">
          <label class="col-sm-3 control-label">Class Name</label>
          <div class="col-sm-7">
            <input name="class_name" class="form-control" maxlength="100" type="text" value="<?php echo $this->session->flashdata('class_name'); ?>" required />
            <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Class Stage</label>
          <div class="col-sm-7">
            <select class="form-control input-sm" name="class_level" required>
              <option value="">-- SELECT STAGE--</option>
              <?php $no = 1; for ($i=1; $i <= $unit->stage; $i++) : ?>
                  <option value="<?php echo $i ?>" <?php if($this->session->flashdata('class_level') == $i) : echo "selected"; endif; ?> > <?php echo $i ?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
      
        <div class="form-group">
          <label class="col-sm-3 control-label">Homeroom Teacher 1 </label> optional
          <div class="col-sm-7">
            <select class="form-control input-sm" name="class_homeroom1">
              <option value="">-- SELECT TEACHER 1--</option>
              <?php foreach ($coaches as $coach) : ?>
                <option value="<?php echo $coach->nik ?>" <?php if($this->session->flashdata('class_homeroom1') == $coach->nik) : echo "selected"; endif; ?> > <?php echo $coach->full_name?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

      
        <div class="form-group">
          <label class="col-sm-3 control-label">Homeroom Teacher 2 </label> optional
          <div class="col-sm-7">
            <select class="form-control input-sm" name="class_homeroom2">
              <option value="">-- SELECT TEACHER 2--</option>
              <?php foreach ($coaches as $coach) : ?>
                <option value="<?php echo $coach->nik ?>" <?php if($this->session->flashdata('class_homeroom2') == $coach->nik) : echo "selected"; endif; ?> > <?php echo $coach->full_name?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>            
      
    </div><!-- panel-body -->
    
    <div class="panel-footer">
         <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <button class="btn btn-primary">Save</button>&nbsp;
              <a href="<?php echo base_url()?>initiation/class_open/class_list/<?php echo $unit->id ?>" class="btn btn-default">Back</a>
            </div>
         </div>
      </div><!-- panel-footer -->

      </form>
    
  </div><!-- panel -->      
</div><!-- contentpanel -->