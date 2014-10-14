<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mask.min.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap-wizard.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript" language="javascript">
  function hapus(no,id,nama){
    if(confirm('Are you sure to delete '+nama+'?')) {
      window.location = "<?php echo base_url(); ?>administration/extras_second/delete/"+no+"/"+id;      
    }
    return false;
  }
</script>

<script type="text/javascript">
/*
$( document ).ready(function() {
   $('#gradesSiswa').on('click', '#btnRight', function(){
        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
        return false;
    });

   $('#gradesSiswa').on('click', '#btnLeft', function(){
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
        return false;
    });   
});
*/
</script>

<script type="text/javascript">
/*
$( document ).ready(function() {
    var modelMakeJsonList = {"modelMakeTable" : 
        [
            {"modelMakeID" : "0","modelMake" : "Pilih jenjang sekolah"},        
            <?php $no = 1; foreach ($ls_unit as $unit): ?>
                {"modelMakeID" : "<?php echo $no ?>","modelMake" : "<?php echo $unit->unit ?>"},
            <?php $no++; endforeach ; ?>
        ]};
var modelTypeJsonList = {

    <?php $no = 1; foreach ($ls_unit as $unit): ?>

      "<?php echo $unit->unit ?>" :
        [
            <?php for ($i = 1; $i <= $unit->jenjang; $i++) : ?>
                {"modelTypeID" : "<?php echo $unit->id_unit ?>","modelType" : "<?php echo $i ?>"}
              <?php if ($i + 1 <= $unit->jenjang) : ?>
              ,
              <?php endif; ?>
            <?php endfor; ?>
        ],
    <?php $no++; endforeach ; ?>    
    };
    console.log( "ready!" );

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
});*/
</script>