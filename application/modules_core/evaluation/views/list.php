<?php
$val = '';
$this->load->model('placement/m_class');
?>



    <div class="pageheader">
      <h2><i class="fa fa-gavel"></i>Students Grades</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/students">Students</a></li>
          <li class="active">Students Grades</li>
        </ol>
      </div>
    </div>
        
    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>   <?php echo $message; ?>
    </div>
      <?php endif ; ?>
    <!-- <form id="daftarUlang"> -->

      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">Filter</h4>
          <p><span class="asterisk">*</span> required</p>
        </div><!-- panel-heading -->
        <div class="panel-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">School Year</label>
        <div class="col-sm-2">
          <input type="text" name="grades[tahun-ajaran]" value="2014/2015" class="form-control" disabled/>
        </div>
      </div>                           
      <div class="form-group">
        <label class="col-sm-2 control-label">School Grades<span class="asterisk">*</span></label>
        <div class="col-sm-3">
          <select style="margin-top:8px;" name="grades[siswa_jenjang]" id="jenjangSekolah" class="form-control" required>
           <option value="" selected="selected">Choose School Grade</option>                                          
          </select>
          <label class="error" for="jenjangSekolah"></label>
        </div>
         <div class="col-sm-3">
          <select style="margin-top:8px;" name="grades[siswa_kelas]" id="jenjangKelas" class="form-control" required>
            <option value="" selected="selected">Choose Class Grade</option>                                         
          </select>
          <label class="error" for="jenjangKelas"></label>
        </div>                  
      </div>          
        </div>
      <div class="panel-footer">
          <!-- <input type="button" id="cariSiswa" class="btn btn-warning" value="Cari" /> -->
      </div>
    <!-- </form> -->
      </div><!-- panel -->      

    </div><!-- contentpanel -->

  <form id="kesimpulan">

  <input type="hidden" value="0" id="jumlah_siswa">
    
   <div class="contentpanel panel-email" id="studentsList">

        <div class="row">            
            <div class="col-sm-9 col-lg-12">
                
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="pull-right" id="ksmpl">
                            <input type="button" id="saveKesimpulan" class="btn btn-warning" value="Save" />
                        </div><!-- pull-right -->                       
                        
                        <div class="pull-right" id="graduation">
                            <div class="btn-group mr10">
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="LULUS" title="Lulus"><i class="glyphicon glyphicon-ok"></i></button>
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="TIDAK LULUS" title="Tidak Lulus"><i class="glyphicon glyphicon-remove-circle"></i></button>
                            </div>
                                                        
                        </div><!-- pull-right --> 
                                                
                         <!-- if jenjang = max, add 'disabled' class on each button -->
                        <div class="pull-right" id="nextLevel">
                            <div class="btn-group mr10">
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="NAIK KELAS" title="Naik Kelas"><i class="glyphicon glyphicon-upload"></i></button>
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="TINGGAL KELAS" title="Tinggal Kelas"><i class="glyphicon glyphicon-exclamation-sign"></i></button>
                            </div>
                                                        
                        </div><!-- pull-right -->                       


                        
                        <div class="ckbox ckbox-success check-all">
                            <input type="checkbox" id="checkboxAll">
                            <label for="checkboxAll"></label>
                        </div>
                        
                        <div class="students-title-grades">
                          <h5 class="subtitle mb5">Students List</h5>
                            <p class="text-muted">Showing 15 students of 15 students</p>                        
                        </div>
                        
                        <div class="table-responsive">
                            <table id="rekapTagihan" class="table table-grades table-email">
                              <tbody>

                              </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        
                    </div><!-- panel-body -->
                </div><!-- panel -->
                
            </div><!-- col-sm-9 -->
            
        </div><!-- row -->
    
    </div> 
    </form>