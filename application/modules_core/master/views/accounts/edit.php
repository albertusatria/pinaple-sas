<div class="pageheader">
    <h2><i class="fa fa-folder-o"></i>Account</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Master Data</li>
        <li><a href="<?php echo base_url();?>master/accounts">Accounts</a></li>
        <li class="active">Accounts Edit</li>
      </ol>
    </div>
</div>

<form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>master/accounts/edit_process">

    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $message; ?>
      </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">Edit Account</h4>
        </div>
        <div class="panel-body panel-body-nopadding">
          
			<div class="form-group">
	          <label class="col-sm-3 control-label">Account Code <span class="asterisk">*</span></label>
	          <div class="col-sm-2">
	            <input type="text" name="id_show" value="<?php echo $result->id?>" class="form-control" placeholder="Type accounts code's..." required disabled/>
              <input type="hidden" name="id" value="<?php echo $result->id?>" required/>
	          </div>
	        </div>
	        
	        <div class="form-group">
	          <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
	          <div class="col-sm-9">
	            <input type="text" name="name" class="form-control" placeholder="Type account name..." required value="<?php echo $result->name?>"/>
	          </div>
	        </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Group <span class="asterisk">*</span></label>
            <div class="col-sm-6">
              <input maxlength="20" size="20" type="text" name="group" class="form-control" placeholder="Type account group name..." required value="<?php echo $result->group?>"/>
            </div>
          </div>
	        
	        <div class="form-group">
	          <label class="col-sm-3 control-label">Description <span class="asterisk">*</span></label>
	          <div class="col-sm-9">
	            <textarea rows="5" name="description" class="form-control" placeholder="Type account description..." required><?php echo $result->description?></textarea>
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