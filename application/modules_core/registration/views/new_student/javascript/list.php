<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mask.min.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap-wizard.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/dropzone.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
// General Setting
jQuery(document).ready(function() {

	// Chosen Select
	jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});
    
	// With Form Validation Wizard
	var $validator = jQuery("#regisForm").validate({
		highlight: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-error').addClass('validation-pass').css('margin-bottom', '12px');
		}
	});
	
	jQuery('#validationWizard').bootstrapWizard({
		tabClass: 'nav nav-pills nav-justified nav-disabled-click',
		onTabClick: function(tab, navigation, index) {
		  return false;
		},
		onNext: function(tab, navigation, index) {
		  var $valid = jQuery('#regisForm').valid();
		  if(!$valid) {
		    
		    $validator.focusInvalid();
		    return false;
		  }
		  jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		}
	});	
	
	jQuery("#tgl_lahir").mask("99/99/9999");
	jQuery("#tgl_lahir_wali").mask("99/99/9999");
	jQuery("#achievement_id").mask("9999");
	jQuery("#tglIjazah").mask("99/99/9999"); 
	jQuery("#tglIjazah").mask("99/99/9999");
	jQuery("#telepon").mask("(999) 9999-9999");
	jQuery("#handphone").mask("(9999) 9999-9999");
	jQuery("#penghasilan").mask("999.999.999.999");	  

	//End General Setting
});
</script>


<script type="text/javascript">
jQuery(document).ready(function() {

	//Js Handling Originate School
	jQuery("#others").change(function(){
	    if (jQuery("#others").is(':checked')){
			jQuery(".others").show();
	    }
	});
	jQuery("#bu").change(function(){
	    if (jQuery(this).is(':checked')){
			jQuery(".others").hide();
	    }
	});	
	//End Js Handling Originate School
	
	//Get All Unit & Jenjang
    var modelMakeJsonList = {"modelMakeTable" : 
        [
            {"modelMakeID" : "0","modelMake" : "Choose School Units"},        
            <?php $no = 1; foreach ($ls_unit as $unit): ?>
                {"modelMakeID" : "<?php echo $no ?>","modelMake" : "<?php echo $unit->name ?>"},
            <?php $no++; endforeach ; ?>
        ]};
	var modelTypeJsonList = {
	
	    <?php $no = 1; foreach ($ls_unit as $unit): ?>
	
	      "<?php echo $unit->name ?>" :
	        [
	            <?php for ($i = 1; $i <= $unit->stage; $i++) : ?>
	                {"modelTypeID" : "<?php echo $unit->id ?>","modelType" : "<?php echo $i ?>"}
	              <?php if ($i + 1 <= $unit->stage) : ?>
	              ,
	              <?php endif; ?>
	            <?php endfor; ?>
	        ],
	    <?php $no++; endforeach ; ?>		
			};

	
		//Now that the doc is fully ready - populate the lists   
		//Next comes the make
	      var ModelListItems= "";
	      for (var i = 0; i < modelMakeJsonList.modelMakeTable.length; i++){
	        ModelListItems+= "<option value='" + modelMakeJsonList.modelMakeTable[i].modelMakeID + "'>" + modelMakeJsonList.modelMakeTable[i].modelMake + "</option>";
	      }
	      $("#jenjangSekolah").html(ModelListItems);
	    
	    var updateSelectSchoolBox = function(make) {
	        console.log('updating with',make);
	        var listItems= "";
	        for (var i = 0; i < modelTypeJsonList[make].length; i++){
	            listItems+= "<option value='" + modelTypeJsonList[make][i].modelTypeID + "'>" + modelTypeJsonList[make][i].modelType + "</option>";
	        }
	        $("select#jenjangKelas").html(listItems);
	    }
	   
	    $("select#jenjangSekolah").on('change',function(){
	        var selectedMake = $('#jenjangSekolah option:selected').text();
	        updateSelectSchoolBox(selectedMake);
	    });    		
     //Get All Unit & Jenjang
});
</script>