    <div class="pageheader">
      <h2><i class="fa fa-sort-numeric-desc"></i> Manage Unit </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>master/units">Manage Unit</a></li>
          <li class="active">Add Unit</li>
        </ol>
      </div>
    </div>

    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>master/units/add_process" enctype="multipart/form-data">
    
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
          <h4 class="panel-title">Add Unit</h4>
          <p>Field(s) with<em class="danger">*</em> mark is requried.</p>
        </div>
        <div class="panel-body panel-body-nopadding">
          
           <div class="form-group">
              <label class="col-sm-3 control-label">ID Unit<em class="danger">*</em></label>
              <div class="col-sm-2">
                <input name="id" class="form-control" maxlength="9" type="text" value="<?php echo $this->session->flashdata('id'); ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Parent</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="parent_id">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_parent as $data) : ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->id." | ".$data->name; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Unit Name<em class="danger">*</em></label>
              <div class="col-sm-4">
                <input name="name" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('name');?>" required/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Category<em class="danger">*</em></label>
              <div class="col-sm-3">
                <select class="form-control input-sm mb15" name="category" required>
                    <option value="">-- SELECT --</option>
                    <option value="AKADEMIS">AKADEMIS</option>
                    <option value="NON AKADEMIS">NON AKADEMIS</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Stage<em class="danger">*</em></label>
              <div class="col-sm-1">
                <input name="stage" type="text" class="form-control" maxlength="1" value="<?php echo $this->session->flashdata('stage');?>" required/>
              </div>
            </div>
            <!-- 
            <div class="form-group">
              <label class="col-sm-3 control-label">Logo</label>
              <div class="col-sm-7">
                 <input name="unitfile" class="form-control"  class="span5" type="file" />
              </div>
            </div>
            -->
            <div class="form-group">
              <label class="col-sm-3 control-label">Chief / Headmaster of this unit</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="headmaster_id">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_kepala as $data) : ?>
                        <option value="<?php echo $data->nik; ?>"><?php echo $data->full_name; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Registration</label>
              <div class="col-sm-3">
                <input name="registration_number" type="text" class="form-control" maxlength="10" value="<?php echo $this->session->flashdata('registration_number');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Phone</label>
              <div class="col-sm-3">
                <input name="phone" type="text" class="form-control" maxlength="15" value="<?php echo $this->session->flashdata('phone');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-4">
                <input name="address" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('address');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">City</label>
              <div class="col-sm-3">
                <input name="city" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('city');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">District</label>
              <div class="col-sm-3">
                <input name="district" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('district');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Village</label>
              <div class="col-sm-3">
                <input name="village" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('village');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Fax</label>
              <div class="col-sm-3">
                <input name="fax" type="text" class="form-control" maxlength="15" value="<?php echo $this->session->flashdata('fax');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-4">
                <input name="email" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('email');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Website</label>
              <div class="col-sm-4">
                <input name="web" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('web');?>"/>
              </div>
            </div>

        </div><!-- panel-body -->
        
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-primary">Submit</button>&nbsp;
                  <a href="" class="btn btn-default" onclick="history.go(-1);">Cancel</a>
                </div>
             </div>
        </div><!-- panel-footer -->

        
      </div><!-- panel -->            
    </div><!-- contentpanel -->

</form>