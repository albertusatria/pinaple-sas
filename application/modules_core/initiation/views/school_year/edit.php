<div class="pageheader">
  <h2><i class="fa fa-group"></i> Manage Portal</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li><a href="<?php echo base_url();?>initiation/school_year">School Year</a></li>
      <li class="active">School Year Edit</li>
    </ol>
  </div>
</div>

<form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>initiation/school_year/edit_process">
<input type="hidden" name="id" value="<?php echo $result->id ?>">

<div class="contentpanel">

  <?php if ($message != null ) : ?>
  <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message; ?>
    </div>
  <?php endif ; ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-btns">
        <a href="#" class="panel-close">&times;</a>
        <a href="#" class="minimize">&minus;</a>
      </div>
      <h4 class="panel-title">School Year Setup</h4>
      <p>Please give School Year information</p>
    </div>
    <div class="panel-body panel-body-nopadding">
      
       <div class="form-group">
          <label class="col-sm-3 control-label">School Year Name *</label>
          <div class="col-sm-2">
            <input name="name" class="form-control" maxlength="9" type="text" value="<?php echo $result->name; ?>" required />
            <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
          </div>
          <label class="col-sm-2 control-label">format: "xxxx-xxxx"</label>
        </div>

       <div class="form-group">
          <label class="col-sm-3 control-label">Mulai *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" maxlength="10" placeholder="dd-mm-yyyy" id="datepicker_mulai" value="<?php echo date("d-m-Y",strtotime($result->start));?>" required/>
            <input type="hidden" name="start" id="h_mulai" value="<?php echo $result->start?>">
            <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Akhir *</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" maxlength="10" placeholder="dd-mm-yyyy" id="datepicker_akhir" value="<?php echo date("d-m-Y",strtotime($result->end));?>" required/>
            <input type="hidden" name="end" id="h_akhir" value="<?php echo $result->end?>">
            <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Status *</label>
          <div class="col-sm-2">
            <select class="form-control input-sm mb15" name="status" required>
                <option value="">-- SELECT --</option>
                <option value="aktif" <?php if($result->status=="aktif"){ echo "selected='true'";}?> >AKTIF</option>
                <option value="tidak aktif" <?php if($result->status=="tidak aktif"){ echo "selected='true'";}?>>TIDAK AKTIF</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Phase *</label>
          <div class="col-sm-2">
            <select class="form-control input-sm mb15" name="phase" required>
                <option value="">-- SELECT --</option>
                <option value="CLOSE" <?php if($result->phase=="CLOSE"){ echo "selected='true'";}?>>CLOSE</option>
                <option value="FIRST" <?php if($result->phase=="FIRST"){ echo "selected='true'";}?>>FIRST</option>
                <option value="PMB" <?php if($result->phase=="PMB"){ echo "selected='true'";}?>>PMB</option>
                <option value="PREP" <?php if($result->phase=="PREP"){ echo "selected='true'";}?>>PREP</option>
                <option value="RESULT" <?php if($result->phase=="RESULT"){ echo "selected='true'";}?>>RESULT</option>
                <option value="SECOND" <?php if($result->phase=="SECOND"){ echo "selected='true'";}?>>SECOND</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-7 panel-body">
            <textarea name="description" placeholder="Enter text here..." class="form-control" rows="10"><?php echo $result->description; ?></textarea>
          </div>
        </div>
      
    </div><!-- panel-body -->
    
    <div class="panel-footer">
         <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <button class="btn btn-primary">Submit</button>&nbsp;
              <button class="btn btn-default" onclick="gotoback();">Cancel</button>
            </div>
         </div>
    </div><!-- panel-footer -->

    
  </div><!-- panel -->            
</div><!-- contentpanel -->

      </form>