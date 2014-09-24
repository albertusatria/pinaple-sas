    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Extrakurikuler</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>inititation/extra_open">Extra</a></li>
          <li><a href="<?php echo base_url();?>inititation/extra_open/extra_list"><?php echo $unit->name ?></a> </li>
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
                <select class="form-control input-sm" name="extra_coach1" required>
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
                <select class="form-control input-sm" name="extra_coach2" required>
                  <option value="">-- SELECT COACH 2--</option>
                  <?php foreach ($coaches as $coach) : ?>
                    <option value="<?php echo $coach->nik ?>" <?php if($this->session->flashdata('extra_coach1') == $coach->nik) : echo "selected"; endif; ?> > <?php echo $coach->full_name?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>            

           <div class="form-group">
              <label class="col-sm-3 control-label">Monthly Cost / Student</label>
              <div class="col-sm-7">
                <input name="extra_price" class="form-control" maxlength="100" type="text" value="<?php echo $this->session->flashdata('extra_price'); ?>" required />
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-primary">Save</button>&nbsp;
                  <button class="btn btn-default">Back</button>
                </div>
             </div>
          </div><!-- panel-footer -->

          </form>
        
      </div><!-- panel -->      
    </div><!-- contentpanel -->
    
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

<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
jQuery("#sasPanel").validate({
  messages: {
    extra_name : "Extra Name is required.",
    extra_price : "Monthly Cost /Student is required."
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
  jQuery('#datepicker').datepicker();
  
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
