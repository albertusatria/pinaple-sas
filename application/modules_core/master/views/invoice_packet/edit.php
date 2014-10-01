<div class="pageheader">
    <h2><i class="fa fa-folder-o"></i>Packet</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li><a href="<?php echo base_url();?>master/invoice_packet" >Invoice Packet</a></li>
        <li class="active">Packet</li>
      </ol>
    </div>
</div>

<form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>master/invoice_packet/edit_process">

    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message; ?>
      </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Edit Packet</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
        
          <input type="hidden" name="id" value="<?php echo $result->id?>" required/> 
	        <div class="form-group">
	          <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
	          <div class="col-sm-9">
	            <input type="text" name="name" class="form-control" placeholder="Type Items Type name..." required value="<?php echo $result->name?>"/>
	          </div>
	        </div>
	        
          <div class="form-group">
            <label class="col-sm-3 control-label">Unit <span class="asterisk">*</span></label>
            <div class="col-sm-8">
            <select name="unit_id" class="form-control">
              <?php foreach ($rs_unit as $unit): ?>
                  <?php if($result->id!='0000'){ ?>
                    <option value=<?php echo $unit->id ?> <?php if($unit->id==$result->unit_id){echo "selected='selected'";} ?> required>
                    <?php echo $unit->name ?></option>
                  <?php } ?>
              <?php endforeach; ?>
            </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Stage <span class="asterisk">*</span></label>
            <div class="col-sm-2">
              <select name="stage" class="form-control">
          
                  <option value="1" required>1</option>
                  <option value="2" required>2</option>
                  <option value="3" required>3</option>
                  <option value="4" required>4</option>
                  <option value="5" required>5</option>
                  <option value="6" required>6</option>
                  
                </select>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">New Student <span class="asterisk">*</span></label>
            <div class="col-sm-3">
              <select name="for_new_student" class="form-control" >
        
                <option value="FALSE"  <?php if($result->for_new_student=='FALSE'){echo "selected='selected'";} ?>  required>NO</option>
                <option value="TRUE" <?php if($result->for_new_student=='TRUE'){echo "selected='selected'";} ?> required>YES</option>
                                  
              </select>
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