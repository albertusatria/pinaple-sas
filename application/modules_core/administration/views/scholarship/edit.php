<div class="pageheader">
    <h2><i class="fa fa-folder-o"></i>Packet</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Administration School</li>
        <li><a href="<?php echo base_url();?>administration/scholarship" >Scholarship</a></li>
        <li class="active">Scholarship Edit</li>
      </ol>
    </div>
</div>

<form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>administration/scholarship/edit_process">

    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message; ?>
      </div>
      <?php endif ; ?>
      <?php if ($eror != null ) : ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $eror; ?>
      </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Edit Scholarship</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        
          <input type="hidden" name="id" value="<?php echo $result->id?>" required/> 
          <input type="hidden" name="school_year_id" value="<?php echo $result->school_year_id?>" required/> 
	        <div class="form-group">
	          <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
	          <div class="col-sm-9">
	            <input type="text" name="name" class="form-control" placeholder="Type Items Type name..." required value="<?php echo $result->name?>"/>
	          </div>
	        </div>
	        
			    <div class="form-group">
            <label class="col-sm-3 control-label">Amount <span class="asterisk">*</span></label>
            <div class="col-sm-3">
              <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input name="amount" type="text" class="form-control" placeholder="example: 3000000" value="<?php echo $result->amount?>">
                <!--<span class="input-group-addon">.00</span>-->
              </div>
            </div>
          </div>

	        <div class="form-group">
	          <label class="col-sm-3 control-label">Description <span class="asterisk">*</span></label>
	          <div class="col-sm-9">
	            <textarea rows="5" name="description" class="form-control" placeholder="Type Items Type description..." required><?php echo $result->description?></textarea>
	          </div>
	        </div>          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-primary">Submit</button>&nbsp;
                  <a class="btn btn-default" onclick="gotoback();">Cancel</a>
                </div>
             </div>
        </div><!-- panel-footer -->
        
      </div><!-- panel -->            
    </div><!-- contentpanel -->

</form>