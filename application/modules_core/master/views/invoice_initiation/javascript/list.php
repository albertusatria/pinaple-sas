<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    
	// Show aciton upon row hover
	jQuery('.table-hidaction tbody tr').hover(function(){
	  jQuery(this).find('.table-action-hide a').animate({opacity: 1});
	},function(){
	  jQuery(this).find('.table-action-hide a').animate({opacity: 0});
	});
  
    
	// Basic Form
	jQuery("#newPacket").validate({
		highlight: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	},
		success: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-error').css('margin-bottom', '-20px');
		}
	});
  
	//Get All Unit & Jenjang
    var modelMakeJsonList = {"modelMakeTable" : 
        [
            {"modelMakeID" : "0","modelMake" : "Choose School Grades"},        
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
<script type="text/javascript">
  function hapus(no,nama){
    if(confirm('Are you sure to delete '+nama+' item?'))
      window.location = "<?php echo base_url(); ?>master/invoice_initiation/delete/"+no;
  }
</script>

