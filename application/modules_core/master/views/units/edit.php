    <div class="pageheader">
      <h2><i class="fa fa-sort-numeric-desc"></i> Manage Unit </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>master/units">Manage Unit</a></li>
          <li class="active">Edit Unit</li>
        </ol>
      </div>
    </div>

    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>master/units/edit_process" enctype="multipart/form-data">
    
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
          <h4 class="panel-title">Edit Unit</h4>
          <p>Field(s) with<em class="danger">*</em> mark is requried.</p>
        </div>
        <div class="panel-body panel-body-nopadding">
          
           <div class="form-group">
              <label class="col-sm-3 control-label">ID Unit<em class="danger">*</em></label>
              <div class="col-sm-2">
                <input disabled class="form-control" maxlength="9" type="type" value="<?php echo $result->id; ?>" required />
                <input name="id" class="form-control" maxlength="9" type="hidden" value="<?php echo $result->id; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Parent</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="parent_id">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_parent as $data) : ?>
                        <option <?php if($result->parent_id==$data->id){ echo "selected='selected'";}?>
                        value="<?php echo $data->id; ?>"><?php echo $data->id." | ".$data->name; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Unit Name<em class="danger">*</em></label>
              <div class="col-sm-4">
                <input name="name" type="text" class="form-control" maxlength="50" value="<?php echo $result->name;?>" required/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Category<em class="danger">*</em></label>
              <div class="col-sm-3">
                <select class="form-control input-sm mb15" name="category" required>
                    <option value="">-- SELECT --</option>
                    <option <?php if($result->category=="akademis"){ echo "selected='selected'";}?> value="AKADEMIS">AKADEMIS</option>
                    <option <?php if($result->category=="non akademis"){ echo "selected='selected'";}?> value="NON AKADEMIS">NON AKADEMIS</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Level<em class="danger">*</em></label>
              <div class="col-sm-1">
                <input name="stage" type="text" class="form-control" maxlength="1" value="<?php echo $result->stage;?>" required/>
              </div>
            </div>
            
<!--             <div class="form-group">
              <label class="col-sm-3 control-label">Logo</label>
              <div class="col-sm-7">
                 <input name="unitfile" class="form-control"  class="span5" type="file" />
              </div>
            </div>
 -->
            <div class="form-group">
              <label class="col-sm-3 control-label">Unit Chief</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="headmaster_id">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_kepala as $data) : ?>
                        <option <?php if($result->headmaster_id==$data->nik){ echo "selected='selected'";}?>
                        value="<?php echo $data->nik; ?>"><?php echo $data->full_name; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Registration</label>
              <div class="col-sm-3">
                <input name="registration_number" type="text" class="form-control" maxlength="10" value="<?php echo $result->registration_number;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Phone</label>
              <div class="col-sm-3">
                <input name="phone" type="text" class="form-control" maxlength="15" value="<?php echo $result->phone;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-4">
                <input name="address" type="text" class="form-control" maxlength="50" value="<?php echo $result->address;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">City</label>
              <div class="col-sm-3">
                <input name="city" type="text" class="form-control" maxlength="30" value="<?php echo $result->city;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">District</label>
              <div class="col-sm-3">
                <input name="district" type="text" class="form-control" maxlength="30" value="<?php echo $result->district;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Village</label>
              <div class="col-sm-3">
                <input name="village" type="text" class="form-control" maxlength="30" value="<?php echo $result->village;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Fax</label>
              <div class="col-sm-3">
                <input name="fax" type="text" class="form-control" maxlength="15" value="<?php echo $result->fax;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-4">
                <input name="email" type="text" class="form-control" maxlength="50" value="<?php echo $result->email;?>"/>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 control-label">Website</label>
              <div class="col-sm-4">
                <input name="web" type="text" class="form-control" maxlength="50" value="<?php echo $result->web;?>"/>
              </div>
            </div>

        </div><!-- panel-body -->
        
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-primary">Submit</button>&nbsp;
                  <button class="btn btn-default" onclick="history.go(-1);">Cancel</button>
                </div>
             </div>
        </div><!-- panel-footer -->

        
      </div><!-- panel -->            
    </div><!-- contentpanel -->

</form>