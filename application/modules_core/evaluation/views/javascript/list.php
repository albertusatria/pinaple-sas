<script src="<?php echo base_url()?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.cookies.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url()?>bracket/js/custom.js"></script>

<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>


<script>
jQuery(document).ready(function(){
  //Check
    $('#rekapTagihan').on('click', '.checkboxStud', function(){
        var t = jQuery(this);
        if(t.is(':checked')){
            t.closest('tr').addClass('selected');
        } else {
            t.closest('tr').removeClass('selected');
        }
    });
        
    $('#studentsList').on('click', '#checkboxAll', function(){
        if(this.checked) { // check select status
            $('.checkboxStud').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
                $(this).closest('tr').addClass('selected');
            });
        }else{
            $('.checkboxStud').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                $(this).closest('tr').removeClass('selected');                
            });         
        }
    });   
    
});
</script>



<script type="text/javascript">
$( document ).ready(function() {
    var modelMakeJsonList = {"modelMakeTable" : 
        [
            {"modelMakeID" : "0","modelMake" : "Choose Grade School"},        
            <?php $no = 1; foreach ($ls_unit as $unit) :  if($unit->id!='0000'){  ?>
                {"modelMakeID" : "<?php echo $unit->stage ?>","modelMake" : "<?php echo $unit->name ?>"},
            <?php $no++; } endforeach ; ?>
        ]};

var modelTypeJsonList = {

  //ambil kelas aktif yang ada

    <?php $no = 1; foreach ($ls_unit as $unit): ?>

      "<?php echo $unit->name ?>" :
        [
            //setiap yang unitnya sama
            <?php $kelass = $this->m_class->get_open_class_by_u_sy($unit->id,$year->id) ?>
            <?php $count = COUNT($kelass) ?>
            <?php $nos = 1; foreach ($kelass as $kelas) : ?>
                {"modelTypeID" : "<?php echo $kelas->id ?>","modelTypeJenjang" : "<?php echo $kelas->level ?>","modelType" : "<?php echo $kelas->name ?>"}
                //setiap kelas ditampilkan
                <?php if ($nos < $count) : ?>
                  ,
                <?php endif ?>
                <?php $nos++ ?>
            <?php endforeach; ?>
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
            listItems+= "<option value='" + modelTypeJsonList[make][i].modelTypeID + "' id='" + modelTypeJsonList[make][i].modelTypeJenjang + "'  >" + modelTypeJsonList[make][i].modelType + "</option>";
        }
        $("#jenjangKelas").html(listItems);

                
        query_siswa();

    }

    function query_siswa() {
                var item = {};
                var number = 1;
                var val = $("#jenjangKelas option:selected").attr('value');
                item[number] = {};
                item[number]['id_buka'] = val;
                console.log(val);
                
                $.ajax({
                  type: "POST",
                  url: CI_ROOT+"evaluation/evaluations/student_list",
                  data: item,
                   success: function(data)
                   {

                      var table = $("#rekapTagihan");
                      table.find("tr").remove();

                      console.log(data);
                      var index;
                      var nama; var status;
                      for (index = 0; index < data.length; ++index) {
                          id = data[index]['id'];
                          nis = data[index]['nis'];
                          nama = data[index]['full_name'];
                          kesimpulan = data[index]['conclusion'];
                          if ((kesimpulan === 'LULUS') || (kesimpulan === 'NAIK KELAS') ) {
                          $('#rekapTagihan > tbody:first').append(
                            '<tr class="student-row-'+index+'">'+
                            '<td>'+
                            '<div class="ckbox ckbox-success">'+
                            '<input class="checkboxStud" type="checkbox" id="checkbox'+index+'" name="checkbox'+nis+'[nis]">'+
                            '<label for="checkbox'+index+'"></label>'+
                            '</div>'+
                            '<div class="input-hidden">'+
                            '<input class="id'+index+'" type="hidden" name="checkbox'+index+'[id]" value="'+id+'">'+
                            '<input class="simpul'+index+' sim" type="hidden" name="sim" value="'+kesimpulan+'">'+                            
                            '</div>'+
                            '</td>'+
                            '<td>'+
                            '<div class="media">'+
                            '<div class="media-body">'+
                            '<h5 class="pull-right status-siswa text-success">'+kesimpulan+'</h5>'+
                            '<h5 class="text-primary">'+nama+'</h5>'+
                            '</div>'+
                            '</div>'+
                            '</td>'+
                            '</tr>'); 
                          }
                          else {
                          $('#rekapTagihan > tbody:first').append(
                            '<tr class="student-row-'+index+'">'+
                            '<td>'+
                            '<div class="ckbox ckbox-success">'+
                            '<input class="checkboxStud" type="checkbox" id="checkbox'+index+'" name="checkbox'+nis+'[nis]">'+
                            '<label for="checkbox'+index+'"></label>'+
                            '</div>'+
                            '<div class="input-hidden">'+                            
                            '<input class="id'+index+'" type="hidden" name="checkbox'+index+'[id]" value="'+id+'">'+
                            '<input class="simpul'+index+' sim" type="hidden" name="sim" value="'+kesimpulan+'">'+                            
                            '</div>'+                            
                            '</td>'+
                            '<td>'+
                            '<div class="media">'+
                            '<div class="media-body">'+
                            '<h5 class="pull-right status-siswa text-danger">'+kesimpulan+'</h5>'+
                            '<h5 class="text-primary">'+nama+'</h5>'+
                            '</div>'+
                            '</div>'+
                            '</td>'+
                            '</tr>'); 
                          }
      
                            console.log('berhasil');
                      } //end of for
                            var maxJenjang = $("#jenjangSekolah option:selected").attr('value');
                            console.log('max jenjang : ' + maxJenjang);

                            var val = $("#jenjangKelas option:selected").attr('value');
                            console.log('id_buka : ' + val);

                            var jenj = $("#jenjangKelas option:selected").attr('id');
                            console.log('jenjang kelas : ' + jenj);
                      if (index != 0)
                      {
                        if(maxJenjang == jenj)
                        {
                          $('#graduation button').removeClass('disabled');      
                          $('#nextLevel button').addClass('disabled');        
                        }
                        else
                        {
                          $('#nextLevel button').removeClass('disabled');
                          $('#graduation button').addClass('disabled');
                        }
                      }
                      else 
                      {
                          $('#graduation button').addClass('disabled');      
                          $('#nextLevel button').addClass('disabled');        
                      }


                   },

                   error: function (jqXHR, textStatus, errorThrown)
                   {
                      console.log('student list atas gagal');
                   }
                });      
    }

    $("select#jenjangSekolah").on('change',function(){
        var selectedMake = $('#jenjangSekolah option:selected').text();
        updateSelectSchoolBox(selectedMake);
        $('#graduation button').addClass('disabled');      
        $('#nextLevel button').addClass('disabled');        
    }); 


    $("select#jenjangKelas").on('change',function(){
        query_siswa();
    }); 


    //ganti
    $('#studentsList').on('click', 'button', function(){
    var status = $(this).attr('value');

    if ((status == "LULUS") || (status == "NAIK KELAS"))
    {
      $('tr.selected .status-siswa').replaceWith('<h5 class="pull-right status-siswa text-success">'+status+'</h5>');
      $('tr.selected .sim').attr('value',status);
      //update nilai dari input yang dipilih
    }
    
    if ((status == "TIDAK LULUS") || (status == "TINGGAL KELAS"))
    {
      $('tr.selected .status-siswa').replaceWith('<h5 class="pull-right status-siswa text-danger">'+status+'</h5>');
      $('tr.selected .sim').attr('value',status);
    }                                 
    });     


    var nomer = 1;
    $('#daftarUlang').on('click', '#cariSiswa', function(){
      console.log('berhasil');
      var valid = $('#daftarUlang').valid();
      if(valid)
      { 
        query_siswa();
      }
      nomer++;  
      return false;   
    });

    $('#kesimpulan').on('click', '#saveKesimpulan', function(){
      var item = {};
      var jumlah_siswa = 0;
      var number = 1;
      var val = $("#jenjangKelas option:selected").attr('value');
      item[number] = {};
      item[number]['id_buka'] = val;
      console.log(val);
      
      //get jumlah
      $.ajax({
        type: "POST",
        url: CI_ROOT+"evaluation/evaluations/student_list",
        data: item,
         success: function(data)
         {
            console.log(data);
            var jumlah_siswa = data.length;
            console.log('jumlah siswa : ' + jumlah_siswa);

            var items = {};
            for (var number = 0; number < jumlah_siswa; number++) {
                  // form    = 'tr .student-row-'+number;
              items[number] = {};
              items[number]['id']            = $('.id'+number).attr('value');
              items[number]['kesimpulan']    = $('.simpul'+number).attr('value');
              console.log(items[number]);
            };

            $.ajax({
            type: "POST",
            url: CI_ROOT+"evaluation/evaluations/update_kesimpulan",
            data: items,
             success: function(data)
             {
                console.log(data);
                alert('date berhasil diupdate');
             },
             error: function (data)
             {
                console.log('kesimpulan gagal');
             } //end of for
            }); 
         },
         error: function (data)
         {
            console.log('student list bawah gagal');
         }
      });     

    });

 
});
</script>