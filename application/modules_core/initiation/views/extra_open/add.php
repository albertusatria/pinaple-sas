<div class="pageheader">
  <h2><i class="fa fa-group"></i> Manage Extrakurikuler</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>Initiation Data</li>
      <li><a href="<?php echo base_url();?>initiation/extra_open">Extra Open</a></li>
      <li><a href="<?php echo base_url();?>initiation/extra_open/extra_list/<?php echo $unit->id ?>">Menu <?php echo $unit->name ?></a> </li>
      <li class="active">Add Extra</li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">Add Extra on Unit <?php echo $unit->name; ?></h4>
      <p>Please fill the new extra information below</p>
    </div>
    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>initiation/extra_open/add_process">

    <input type="hidden" name="unit_id" value="<?php echo $unit->id ?>">
    <input type="hidden" name="school_year_id" value="<?php echo $active_school_year->id ?>">

    <div class="panel-body panel-body-nopadding">
      
        <div class="form-group">
          <label class="col-sm-3 control-label">Extra Name</label>
          <div class="col-sm-7">
            <input name="extra_name" class="form-control" maxlength="100" type="text" value="<?php echo $this->session->flashdata('extra_name'); ?>" required />
            <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Coach 1 </label> optional
          <div class="col-sm-7">
            <select class="form-control input-sm" name="extra_coach1">
              <option value="">-- SELECT COACH 1--</option>
              <?php foreach ($coaches as $coach) : ?>
                <option value="<?php echo $coach->nik ?>" <?php if($this->session->flashdata('extra_coach1') == $coach->nik) : echo "selected"; endif; ?> > <?php echo $coach->full_name?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

      
        <div class="form-group">
          <label class="col-sm-3 control-label">Coach 2 </label> optional
          <div class="col-sm-7">
            <select class="form-control input-sm" name="extra_coach2">
              <option value="">-- SELECT COACH 2--</option>
              <?php foreach ($coaches as $coach) : ?>
                <option value="<?php echo $coach->nik ?>" <?php if($this->session->flashdata('extra_coach1') == $coach->nik) : echo "selected"; endif; ?> > <?php echo $coach->full_name?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>            

       <div class="form-group">
          <label class="col-sm-3 control-label">Monthly Cost / Student</label>
          <div class="col-sm-3">
          <div class="input-group">
            <span class="input-group-addon">Rp</span>
            <input name="extra_price" class="form-control" maxlength="100" type="text" placeholder="Ex : 3000000" value="<?php echo number_format($this->session->flashdata('extra_price'),0,'',''); ?>" required />
            <span class="input-group-addon">.00</span>
            <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
          </div>
          </div>
        </div>
      
    </div><!-- panel-body -->
    
    <div class="panel-footer">
         <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <button class="btn btn-primary">Save</button>&nbsp;
              <a href="<?php echo base_url()?>initiation/extra_open/extra_list/<?php echo $unit->id ?>" class="btn btn-default">Back</a>
            </div>
         </div>
      </div><!-- panel-footer -->

      </form>
    
  </div><!-- panel -->      
</div><!-- contentpanel --> 