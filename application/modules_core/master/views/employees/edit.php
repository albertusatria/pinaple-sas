    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Portal</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>master/employees">Employee Manage</a></li>
          <li class="active">Employee Setup</li>
        </ol>
      </div>
    </div>

    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>master/employees/edit_process" enctype="multipart/form-data">
    
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
                <input class="form-control" maxlength="20" type="text" value="<?php echo $result->nik; ?>" disabled/>
                <input name="nik" class="form-control" maxlength="20" type="hidden" value="<?php echo $result->nik; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Full Name *</label>
              <div class="col-sm-4">
                <input name="full_name" class="form-control" maxlength="50" type="text" value="<?php echo  $result->full_name; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nick Name</label>
              <div class="col-sm-2">
                <input name="nick_name" class="form-control" maxlength="20" type="text" value="<?php echo  $result->nick_name; ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Sex *</label>
              <div class="col-sm-2">
                <select class="form-control input-sm mb15" name="sex" required>
                    <option value="">-- SELECT --</option>
                    <option value="L" <?php if($result->sex=="L"){ echo "selected='selected'"; }?> >Male (Laki-Laki)</option>
                    <option value="P" <?php if($result->sex=="P"){ echo "selected='selected'"; }?> >Female (Perempuan)</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Birthplace</label>
              <div class="col-sm-3">
                <input name="pob" type="text" class="form-control" maxlength="30" value="<?php echo  $result->pob;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Birthday</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_lahir"
                value="<?php echo date("d-m-Y",strtotime($result->dob));?>" />
                <input type="hidden" name="dob" id="h_lahir" value="<?php echo $result->dob; ?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Address</label>
              <div class="col-sm-3">
                <input name="address" type="text" class="form-control" maxlength="30" value="<?php echo  $result->address;?>"/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">City</label>
              <div class="col-sm-3">
                <input name="city" type="text" class="form-control" maxlength="30" value="<?php echo  $result->city;?>"/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Postal Code</label>
              <div class="col-sm-3">
                <input name="pob" type="postal_code" class="form-control" maxlength="30" value="<?php echo  $result->postal_code;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Religion</label>
              <div class="col-sm-2">
                <input name="religion" type="text" class="form-control" maxlength="15" value="<?php echo  $result->religion;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Citizen *</label>
              <div class="col-sm-2">
                <select class="form-control input-sm mb15" name="citizen" required>
                    <option value="">-- SELECT --</option>
                    <option value="WNI" <?php if($result->citizen=="WNI"){ echo "selected='selected'"; }?> >WNI</option>
                    <option value="WNA" <?php if($result->citizen=="WNA"){ echo "selected='selected'"; }?> >WNA</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Cellphone</label>
              <div class="col-sm-3">
                <input name="cell_phone" type="text" class="form-control" maxlength="15" value="<?php echo $result->cell_phone;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Homephone</label>
              <div class="col-sm-3">
                <input name="home_phone" type="text" class="form-control" maxlength="15" value="<?php echo $result->home_phone;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-4">
                <input name="email" type="text" class="form-control" maxlength="50" value="<?php echo $result->email;?>"/>
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
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_mulai" 
                value="<?php echo date("d-m-Y",strtotime($result->start_date));?>" />
                <input type="hidden" name="start_date" id="h_mulai" value="<?php echo $result->start_date;?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">End Date</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_keluar" 
                value="<?php echo date("d-m-Y",strtotime($result->end_date));?>"/>
                <input type="hidden" name="end_date" id="h_keluar" value="<?php echo $result->end_date;?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">End / Out Note</label>
              <div class="col-sm-7 panel-body">
                <textarea name="note_out" placeholder="Enter text here..." class="form-control" rows="10"><?php echo $result->note_out; ?></textarea> 
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
 


<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery.autogrow-textarea.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/dropzone.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/colorpicker.js"></script>

<script src="<?php echo base_url();?>bracket/js/wysihtml5-0.3.0.min.js"></script> 
<script src="<?php echo base_url();?>bracket/js/bootstrap-wysihtml5.js"></script> 
<script src="<?php echo base_url();?>bracket/js/ckeditor/ckeditor.js"></script> 
<script src="<?php echo base_url();?>bracket/js/ckeditor/adapters/jquery.js"></script> 

<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
jQuery("#sasPanel").validate({
  messages: {
    nik : "NIK is required.",
    full_name : "Full Name is required.",    
    sex : "Sex is required."
    citizen: "Citizen is required."
    },
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    }  
});
</script>
<script>
jQuery(document).ready(function(){
    
  // Chosen Select
  jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});
  
  // Tags Input
  jQuery('#tags').tagsInput({width:'auto'});
   
  // Textarea Autogrow
  jQuery('#autoResizeTA').autogrow();
  
  // Color Picker
  if(jQuery('#colorpicker').length > 0) {
     jQuery('#colorSelector').ColorPicker({
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
                jQuery('#colorpicker').val('#'+hex);
            }
     });
  }
  
  // Color Picker Flat Mode
    jQuery('#colorpickerholder').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            jQuery('#colorpicker3').val('#'+hex);
        }
    });
   
  // Date Picker
  jQuery('#datepicker_lahir').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_lahir' ,
      altFormat: 'yy-mm-dd'
    });

  jQuery('#datepicker_mulai').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_mulai' ,
      altFormat: 'yy-mm-dd'
    });

  jQuery('#datepicker_keluar').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_keluar' ,
      altFormat: 'yy-mm-dd'
    });
  
  jQuery('#datepicker-inline').datepicker();
  
  jQuery('#datepicker-multiple').datepicker({
    numberOfMonths: 3,
    showButtonPanel: true
  });
  
  // Spinner
  var spinner = jQuery('#spinner').spinner();
  spinner.spinner('value', 0);
  
  // Input Masks
  jQuery("#date").mask("99/99/9999");
  jQuery("#phone").mask("(999) 999-9999");
  jQuery("#ssn").mask("999-99-9999");
  
  // Time Picker
  jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});
  
});
</script>


