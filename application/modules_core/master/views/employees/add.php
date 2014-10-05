    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Portal</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li>Master</li>
          <li><a href="<?php echo base_url();?>master/employees">Employees</a></li>
          <li class="active">Employee Add</li>
        </ol>
      </div>
    </div>

<form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>master/employees/add_process" enctype="multipart/form-data">
    
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
          <h4 class="panel-title">Employees Setup</h4>
          <p>Please give Employee Information</p>
        </div>
        <div class="panel-body panel-body-nopadding">
          
           <div class="form-group">
              <label class="col-sm-3 control-label">NIK *</label>
              <div class="col-sm-2">
                <input name="nik" class="form-control" maxlength="20" type="text" value="<?php echo $this->session->flashdata('nik'); ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Full Name *</label>
              <div class="col-sm-4">
                <input name="full_name" class="form-control" maxlength="50" type="text" value="<?php echo $this->session->flashdata('full_name'); ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nick Name</label>
              <div class="col-sm-2">
                <input name="nick_name" class="form-control" maxlength="20" type="text" value="<?php echo $this->session->flashdata('nick_name'); ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Sex *</label>
              <div class="col-sm-2">
                <select class="form-control input-sm mb15" name="sex" required>
                    <option value="">-- SELECT --</option>
                    <option value="L">Male / Laki-Laki</option>
                    <option value="P">Female / Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Birthplace</label>
              <div class="col-sm-3">
                <input name="pob" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('pob');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Birthday</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_lahir" />
                <input type="hidden" name="dob" id="h_lahir" value="<?php echo $this->session->flashdata('dob');?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-3">
                <input name="address" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('address');?>"/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">City</label>
              <div class="col-sm-3">
                <input name="city" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('$result->city');?>"/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Postal Code</label>
              <div class="col-sm-3">
                <input name="postal_code" type="postal_code" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('postal_code');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Religion</label>
              <div class="col-sm-2">
              <select class="form-control input-sm mb15" name="religion">
                  <option value="">-- SELECT --</option>
                  <option value="Budha" <?php if($this->session->flashdata('religion')=="Budha"){echo "selected='selected'";}?>>Budha</option>
                  <option value="Hindhu" <?php if($this->session->flashdata('religion')=="Hindhu"){echo "selected='selected'";}?>>Hindhu</option>
                  <option value="Islam" <?php if($this->session->flashdata('religion')=="Islam"){echo "selected='selected'";}?>>Islam</option>
                  <option value="Katolik" <?php if($this->session->flashdata('religion')=="Katolik"){echo "selected='selected'";}?>>Katolik</option>
                  <option value="Kong Hu Chu" <?php if($this->session->flashdata('religion')=="Kong Hu Chu"){echo "selected='selected'";}?>>Kong Hu Chu</option>
                  <option value="Kristen" <?php if($this->session->flashdata('religion')=="Kristen"){echo "selected='selected'";}?>>Kristen</option>
                  <!--
                    <?php foreach ($rs_class as $data) : ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->class; ?></option>
                    <?php endforeach ; ?>
                  -->
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Citizen *</label>
              <div class="col-sm-2">
                <select class="form-control input-sm mb15" name="citizen" required>
                    <option value="">-- SELECT --</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Cellphone</label>
              <div class="col-sm-3">
                <input name="cell_phone" type="text" class="form-control" maxlength="15" value="<?php echo $this->session->flashdata('cell_phone');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Homephone</label>
              <div class="col-sm-3">
                <input name="home_phone" type="text" class="form-control" maxlength="15" value="<?php echo $this->session->flashdata('home_phone');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-4">
                <input name="email" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('email');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Position</label>
              <div class="col-sm-2">
              <select class="form-control input-sm mb15" name="position">
                 <option value="">-- SELECT --</option>
                  <!--
                    <?php foreach ($rs_position as $data) : ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->position; ?></option>
                    <?php endforeach ; ?>
                  -->
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Class</label>
              <div class="col-sm-2">
              <select class="form-control input-sm mb15" name="class">
                  <option value="">-- SELECT --</option>
                  <option value="IA" <?php if($this->session->flashdata('class')=="IA"){echo "selected='selected'";}?>>IA</option>
                  <option value="IB" <?php if($this->session->flashdata('class')=="IB"){echo "selected='selected'";}?>>IB</option>
                  <option value="IC" <?php if($this->session->flashdata('class')=="IC"){echo "selected='selected'";}?>>IC</option>
                  <option value="ID" <?php if($this->session->flashdata('class')=="ID"){echo "selected='selected'";}?>>ID</option>
                  <option value="IIA" <?php if($this->session->flashdata('class')=="IIA"){echo "selected='selected'";}?>>IIA</option>
                  <option value="IIB" <?php if($this->session->flashdata('class')=="IIB"){echo "selected='selected'";}?>>IIB</option>
                  <option value="IIC" <?php if($this->session->flashdata('class')=="IIC"){echo "selected='selected'";}?>>IIC</option>
                  <option value="IID" <?php if($this->session->flashdata('class')=="IID"){echo "selected='selected'";}?>>IID</option>
                  <option value="IIIA" <?php if($this->session->flashdata('class')=="IIIA"){echo "selected='selected'";}?>>IIIA</option>
                  <option value="IIIB" <?php if($this->session->flashdata('class')=="IIIB"){echo "selected='selected'";}?>>IIIB</option>
                  <option value="IIIC" <?php if($this->session->flashdata('class')=="IIIC"){echo "selected='selected'";}?>>IIIC</option>
                  <option value="IIID" <?php if($this->session->flashdata('class')=="IIID"){echo "selected='selected'";}?>>IIID</option>
                  <option value="IVA" <?php if($this->session->flashdata('class')=="IVA"){echo "selected='selected'";}?>>IVA</option>
                  <option value="IVB" <?php if($this->session->flashdata('class')=="IVB"){echo "selected='selected'";}?>>IVB</option>
                  <option value="IVC" <?php if($this->session->flashdata('class')=="IVC"){echo "selected='selected'";}?>>IVC</option>
                  <option value="IVD" <?php if($this->session->flashdata('class')=="IVD"){echo "selected='selected'";}?>>IVD</option>
                  <option value="IVE" <?php if($this->session->flashdata('class')=="IVE"){echo "selected='selected'";}?>>IVE</option>
                  <!--
                    <?php foreach ($rs_class as $data) : ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->class; ?></option>
                    <?php endforeach ; ?>
                  -->
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Photo</label>
              <div class="col-sm-7">
                 <input name="uefile" class="form-control"  class="span5" type="file" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Start Date *</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_mulai" />
                <input type="hidden" name="start_date" id="h_mulai" value="<?php echo $this->session->flashdata('start_date');?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">End Date</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_keluar" />
                <input type="hidden" name="end_date" id="h_keluar" value="<?php echo $this->session->flashdata('end_date');?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">End / Out Note</label>
              <div class="col-sm-7 panel-body">
                <textarea name="note_out" placeholder="Enter text here..." class="form-control" rows="10"><?php echo $this->session->flashdata('note_out'); ?></textarea> 
              </div>
            </div>

        </div><!-- panel-body -->
        
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-primary">Submit</button>&nbsp;
                  <button class="btn btn-default" onclick="gotoback()">Cancel</button>
                </div>
             </div>
        </div><!-- panel-footer -->

        
      </div><!-- panel -->            
    </div><!-- contentpanel -->
    
</form>