<div class="pageheader">
    <h2><i class="fa fa-users"></i>Students</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>      
        <li>Registration Data </li>
        <li class="active">New Student</li>
      </ol>
    </div>
</div>

<form id="regisForm" class="form" method="POST" action="<?php echo base_url(); ?>registration/new_student/add_process">
        
    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>   <?php echo $message; ?>
        </div>
      <?php endif ; ?>
      
    <div class="row">
        
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-btns">
                <a href="#" class="panel-close">&times;</a>
                <a href="#" class="minimize">&minus;</a>
              </div>
              <h4 class="panel-title">New Student Registration Form</h4>
              <p>Use this form to add <strong>new student</strong><br>
                <span class="asterisk">*</span> required</p>
            </div>
            <div class="panel-body panel-body-nopadding">
              
              <!-- BASIC WIZARD -->
              <div id="validationWizard" class="basic-wizard">
                
                <ul class="nav nav-pills nav-justified" id="form-regis-siswa">
                  <li class="info-siswa"><a href="#vtab1" data-toggle="tab"><span>Step 1:</span> Registration Info. </a></li>
                  <li class="asal-sekolah"><a href="#vtab2" data-toggle="tab"><span>Step 2:</span> Student Information </a></li>
                  <li class="prestasi"><a href="#vtab3" data-toggle="tab"><span>Step 3:</span> Student Achievements </a></li>
                  <li class="info-wali"><a href="#vtab4" data-toggle="tab"><span>Final Step</span> Parents Info. </a></li>
                </ul>

                
                  <div class="tab-content">

                  <!--   Informasi Siswa   -->
                  <div class="tab-pane" id="vtab1">
                    
          <!-- besok diset lagi ini -->
          <div class="form-group">
            <label class="col-sm-3 control-label">Academic Year <span class="asterisk">*</span></label>
            <div class="col-sm-3">
              <input type="text" name="siswa_tahun_mulai" class="form-control" value="<?php echo $active_school_year->name ?>" disabled />
              <input type="hidden" name="siswa[siswa_tahun_mulai]" class="form-control" value="<?php echo $active_school_year->id ?>" />
              <input type="hidden" name="siswa[profil]" class="form-control" value="yes" />
            </div>
          </div>                                 

       

		<div class="form-group origin-BU">
          <label class="col-sm-3 control-label">Last School Origin <span class="asterisk">*</span></label>
          <div class="col-sm-8">
            <div class="rdio rdio-primary">
              <input type="radio" id="bu" value="BUDI-UTAMA" name="siswa[siswa_sekolah_asal]" required="" >
              <label for="bu">Budi Utama</label>
            </div><!-- rdio -->
            <div class="rdio rdio-primary">
              <input type="radio" value="OTHERS" id="others" name="siswa[siswa_sekolah_asal]" checked>
              <label for="others">Others</label>
            </div><!-- rdio -->
      			<div class="last-school others" style="width:400px;margin-left:20px;">
      			  <input type="text" name="siswa[siswa_originschool]" placeholder="Please Input Last School Name" class="form-control" />
      			  <p class="text-info" style="font-size:11px;">* Leave this field if Budi Utama is their first school</p>
      			</div>
			     <label class="error" for="siswa[siswa_sekolah_asal]"></label>
          </div>
    </div>

    <div class="form-group origin-BU">
          <label class="col-sm-3 control-label">Registration Type <span class="asterisk">*</span></label>
          <div class="col-sm-8">
            <div class="rdio rdio-primary">
              <input type="radio" id="new" value="NEW" name="siswa[registration_type]" required="" checked>
              <label for="new">NEW STUDENT</label>
            </div><!-- rdio -->
            <div class="rdio rdio-primary">
              <input type="radio" value="TRANSFER" id="transfer" name="siswa[registration_type]">
              <label for="transfer">TRANSFER STUDENT</label>
            </div><!-- rdio -->
          </div>
    </div>

		<div class="form-group">
		  <label class="col-sm-3 control-label">Grades <span class="asterisk">*</span></label>
		  <div class="col-sm-3">
		    <select name="siswa[siswa_jenjang]" id="jenjangSekolah" class="form-control" required>
		     <option value="" selected="selected">Choose School Units</option>		                      					      
		    </select>
		    <label class="error" for="jenjangSekolah"></label>
		  </div>
		   <div class="col-sm-3">
		    <select name="siswa[siswa_kelas]" id="jenjangKelas" class="form-control" required>
		      <option value="" selected="selected">Choose Units Level</option>		                      					      
		    </select>
		    <label class="error" for="jenjangKelas"></label>
		  </div>					  
		</div> 

                                       					
          <div class="form-group">
            <label class="col-sm-3 control-label">NIS <span class="asterisk">*</span></label>
            <div class="col-sm-6">
              <input type="text" name="siswa[siswa_nis]" placeholder="Nama Induk Siswa / No Pendaftaran" class="form-control" required />
              <div id='nis_availability_result'>
              	<img class="loading-image-nis" src="<?php echo base_url()?>bracket/images/loaders/loader1.gif" alt="loaders nim">
              	<p class="nis-result"></p>
              </div> 
            </div>
            <div class="col-sm-2">
            	<a class="btn btn-maroon" id="check-nis">Check NIS availability</a>
            </div>
          </div>
                                        
          <br><br>
                      
                  </div>
				  <!--   End Informasi Siswa   -->
				  
				  <!-- Informasi Asal Sekolah -->
				  <div class="tab-pane" id="vtab2">
 
          <div class="form-group">
            <label class="col-sm-3 control-label">Full Name <span class="asterisk">*</span></label>
            <div class="col-sm-6">
              <input type="text" name="siswa[siswa_nama_lengkap]" placeholder="Full Name" class="form-control" required />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Nickname</label>
            <div class="col-sm-3">
              <input type="text" name="siswa[siswa_nama_panggilan]" placeholder="Nickname" class="form-control" />
            </div>
          </div>                      
                      
          <div class="form-group">
            <label class="col-sm-3 control-label">Gender <span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <div class="rdio rdio-primary">
                <input type="radio" id="laki-laki" value="L" name="siswa[siswa_jk]" required/>
                <label for="laki-laki">Male</label>
              </div>
              <div class="rdio rdio-primary">
                <input type="radio" id="perempuan" value="P" name="siswa[siswa_jk]" required/>
                <label for="perempuan">Female</label>
              </div>
              <label class="error" for="siswa[siswa_jk]"></label>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Place & Date of Birth <span class="asterisk">*</span></label>
            <div class="col-sm-3">
              <input type="text" name="siswa[siswa_tempat_lahir]" placeholder="Place of Birth, ex. : Yogyakarta, ..." class="form-control" required/>
            </div>
            <div class="col-sm-3">
              <input type="text" placeholder="Date of Birth: dd-mm-yyyy" name="siswa[siswa_tgl_lahir_show]" id="tgl_lahir" class="form-control" required>
              <input type="hidden" name="siswa[siswa_tgl_lahir]" id="hidden_dob">
            </div>
          </div>           
                      
          <div class="form-group">
            <label class="col-sm-3 control-label">Children number ... of ...<span class="asterisk">*</span></label>
            <div class="col-sm-3">
               <input type="text" placeholder="children number ..." name="siswa[siswa_anak_ke]" class="form-control" required/>
            </div> 
            <div class="col-sm-3">
              <input type="text" placeholder="from ..." name="siswa[siswa_saudara]" class="form-control" required/>
            </div>   
          </div>

		 <div class="form-group">
          <label class="col-sm-3 control-label">Religion</label>
          <div class="col-sm-3">
            <select id="religion" class="form-control chosen-select"  data-placeholder="Choose Religion..." name="siswa[siswa_agama]">
              <option value=""></option>
              <option value="ISLAM">Moslem</option>
              <option value="KRISTEN">Christian</option>
              <option value="KATHOLIK">Catholic</option>
              <option value="HINDU">Hindu</option>
              <option value="BUDHA">Budha</option>                          
              <option value="KONG HU CHU">Kong Hu Chu</option>                          
            </select>
          </div>
        </div>                        

        <div class="form-group">
          <label class="col-sm-3 control-label">Citizen <span class="asterisk">*</span></label>
		  <div class="col-sm-8">
              <div class="rdio rdio-primary">
                <input type="radio" id="ina_siswa" value="WNI" name="siswa[siswa_kewarganegaraan]" required="">
                <label for="ina_siswa">Indonesian</label>
              </div>
              <div class="rdio rdio-primary">
                <input type="radio" id="foreign_siswa" value="WNA" name="siswa[siswa_kewarganegaraan]" required="">
                <label for="foreign_siswa">Foreign</label>
              </div>
			  <label class="error" for="siswa[siswa_kewarganegaraan]"></label>
		  </div>
        </div>
            
            <br>              

				  </div>
				  <!-- End Informasi Asal Sekolah -->
				  

          <!-- Student Achievement -->
          <div class="tab-pane" id="vtab3">                                                                        

            <?php $a = 1; for ($a=1;$a<=3;$a++) : ?>
              <input type="hidden" name="siswa_prestasi<?php echo $a?>[profil]" class="form-control" value="no" />
 					  <div class="form-group">
                <label class="col-sm-2 control-label">Achivement Name <?php echo $a ?></label>
                <div class="col-sm-5">
                  <input type="text" placeholder="Achievement Name, ex: Juara I Lomba Mewarnai" name="siswa_prestasi<?php echo $a?>[nama_prestasi]" class="form-control" />
                </div>
              <div class="col-sm-2">
                <select class="form-control chosen-select" data-placeholder="Pilih Jenis Prestasi..." name="siswa_prestasi<?php echo $a?>[jenis_prestasi]">
                  <option value="" selected>Type of Achievement </option>
                  <option value="AKADEMIS">Academics</option>
                  <option value="NON AKADEMIS">Non Academics</option>
                </select>
              </div>
              <div class="col-sm-2">
                <select class="form-control chosen-select" data-placeholder="Pilih tingkat Prestasi..." name="siswa_prestasi<?php echo $a?>[tingkat_prestasi]">
                  <option value="" selected>Choose Achievement Regional</option>
                  <option value="INTERN">Intern</option>
                  <option value="KOTA">City</option>
                  <option value="PROVINCE">Province</option>
                  <option value="NATIONAL">National</option>
                  <option value="INTERNATIONAL">International</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" id="tahun_prestasi" name="siswa_prestasi<?php echo $a?>[tahun_prestasi]" class="form-control" placeholder="Achievement Year..." />
              </div>

              </div>
           <?php endfor; ?>
                                                      
          <br>

        </div> <!-- end of tab data tambahan -->
                  <!--   Informasi Wali  -->
                  <div class="tab-pane" id="vtab4">                      

            <div class="form-group">
                <h4 class="col-sm-4 text-danger">Father Information </h4>
            </div>
            <hr/>                                        

            <div class="form-group">
                <label class="col-sm-3 control-label">Full Name <span class="asterisk">*</span></label>
                <div class="col-sm-6">
                  <input type="text" name="siswa[nama_lengkap_ayah]" placeholder="nama lengkap ayah" class="form-control" required />
                </div>
            </div>

           <div class="form-group">
              <label class="col-sm-3 control-label">Place & Date of Birth</label>
              <div class="col-sm-2">
                <input type="text" name="siswa[tempat_lahir_ayah]" placeholder="Place of Birth, ex. : Yogyakarta, ..." class="form-control"/>
              </div>
              <div class="col-sm-3">
                <input type="text" placeholder="Date of Birth: dd-mm-yyyy" name="siswa[tgl_lahir_ayah_show]" id="tgl_lahir_ayah" class="form-control">
                <input type="hidden" name="siswa[tgl_lahir_ayah]" id="hidden_dob_ayah">
              </div>
            </div>                        

            <div class="form-group">
              <label class="col-sm-3 control-label">Phone/Cellphone Number</label>
              <div class="col-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input type="text" name="siswa[hp_ayah]" placeholder="Father's phone number" class="form-control">
                </div>
              </div>              
            </div>     
            
			<div class="form-group">
              <label class="col-sm-3 control-label">Address <span class="asterisk">*</span></label>
              <div class="col-sm-6">
                <input type="text" name="siswa-mother-address" placeholder="Address where student's father life" class="form-control" id="fathAddress" required/>
              </div>                       
            </div>                                                      

	   		 <div class="form-group">
	              <label class="col-sm-3 control-label">Jobs</label>
	              <div class="col-sm-2">
	                <input type="text" placeholder="Father Jobs" name="siswa[pekerjaan_ayah]" class="form-control">
	              </div>
	          </div>            

            <div class="form-group">
              <label class="col-sm-3 control-label">Monthly Salary (in rupiah)</label>
              <div class="col-sm-3">
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input type="text" placeholder="Ex : 3000000" id="penghasilan-ayah" name="siswa[penghasilan_ayah]" class="form-control" required>
                  <span class="input-group-addon">.00</span>
                </div>
                <label class="error" for="penghasilan-ayah"></label>
              </div>
            </div>                                                           

            <div class="form-group">
              <label class="col-sm-3 control-label">Nationality</label>
			  <div class="col-sm-8">
	              <div class="rdio rdio-primary">
	                <input type="radio" id="ina_ayah" value="ina" name="siswa[kewarganegaraan_ayah]" required="">
	                <label for="ina_ayah">Indonesian</label>
	              </div>
	              <div class="rdio rdio-primary">
	                <input type="radio" id="foreign_ayah" value="foreign" name="siswa[kewarganegaraan_ayah]" required="">
	                <label for="foreign_ayah">Foreign</label>
	              </div>
				  <label class="error" for="siswa[kewarganegaraan_ayah]"></label>
			  </div>              
            </div>
            
            <br/><br/>
            
            <div class="form-group">
                <h4 class="col-sm-4 text-danger">Mother Information </h4>
            </div>
            <hr/>                                        

            <div class="form-group">
                <label class="col-sm-3 control-label">Full Name <span class="asterisk">*</span></label>
                <div class="col-sm-6">
                  <input type="text" name="siswa[nama_lengkap_ibu]" placeholder="nama lengkap ibu" class="form-control" required />
                </div>
            </div>

           <div class="form-group">
              <label class="col-sm-3 control-label">Place & Date of Birth</label>
              <div class="col-sm-2">
                <input type="text" name="siswa[tempat_lahir_ibu]" placeholder="Place of Birth, ex. : Yogyakarta, ..." class="form-control"/>
              </div>
              <div class="col-sm-3">
                <input type="text" placeholder="Date of Birth: dd-mm-yyyy" name="siswa[tgl_lahir_ibu_show]" id="tgl_lahir_ibu" class="form-control">
                <input type="hidden" name="siswa[tgl_lahir_ibu]" id="hidden_dob_ibu">
              </div>
            </div>                        

            <div class="form-group">
              <label class="col-sm-3 control-label">Phone/Cellphone Number</label>
              <div class="col-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input type="text" name="siswa[hp_ibu]" placeholder="Mother's phone number" class="form-control">
                </div>
              </div>              
            </div>                                              

			<div class="form-group">
              <label class="col-sm-3 control-label">Address <span class="asterisk">*</span></label>
              <div class="col-sm-6">
                <input type="text" name="siswa-mother-address" placeholder="Address where student's mother life" class="form-control" id="momAddress" required/>
              </div>                       
            </div> 

        	 <div class="form-group">
                  <label class="col-sm-3 control-label">Jobs</label>
                  <div class="col-sm-2">
                    <input type="text" placeholder="Mothers Jobs" name="siswa[pekerjaan_ibu]" class="form-control">
                  </div>
              </div>            

            <div class="form-group">
              <label class="col-sm-3 control-label">Monthly Salary (in rupiah)</label>
              <div class="col-sm-3">
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input type="text" placeholder="Ex : 3000000" id="penghasilan-ibu" name="siswa[penghasilan_ibu]" class="form-control" required>
                  <span class="input-group-addon">.00</span>
                </div>
				<label class="error" for="penghasilan-ibu"></label>
              </div>
            </div>                                                           

            <div class="form-group">
              <label class="col-sm-3 control-label">Nationality</label>
			  <div class="col-sm-8">
	              <div class="rdio rdio-primary">
	                <input type="radio" id="ina_ibu" value="ina" name="siswa[kewarganegaraan_ibu]" required="">
	                <label for="ina_ibu">Indonesian</label>
	              </div>
	              <div class="rdio rdio-primary">
	                <input type="radio" id="foreign_ibu" value="foreign" name="siswa[kewarganegaraan_ibu]" required="">
	                <label for="foreign_ibu">Foreign</label>
	              </div>
				  <label class="error" for="siswa[kewarganegaraan_ibu]"></label>	              
			  </div>              
            </div>

            <br/><br/>

            <div class="form-group">
              <h4 class="col-sm-4 control-label text-danger ">Student Address Information<span class="asterisk">*</span></h4>
            </div>  

            <hr/>

            <div class="form-group">
              <label class="col-sm-3 control-label">Student life with</label>
              <div class="col-sm-3">
                <select class="form-control chosen-select student-address" data-placeholder="Student life with ..." name="siswa[tinggal_bersama]">
                  <option value="Parents" selected>Parents</option>
                  <option value="Father">Father</option>
                  <option value="Mother">Mother</option>
                  <option value="Family Siblings">Family Siblings</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Address<span class="asterisk">*</span></label>
              <div class="col-sm-6">
                <input type="text" name="siswa[alamat_lengkap]" placeholder="Address where student's life" class="form-control" id="studAddress" required/>
              </div>                       
            </div>  
                  
            <div class="form-group">
              <label class="col-sm-3 control-label">Phone/Cellphone Number</label>
              <div class="col-sm-3">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
                <input type="text" name="siswa[telpon_rumah]" placeholder="Phone/Cellphone Number" class="form-control">
                </div>
              </div>
            </div> 

            <br/><br/>                                  

            <div class="form-group">
                <h4 class="col-sm-8 control-label text-danger">Home Teacher Information (please fill this info if students not life with their parents) </h4>
            </div>
            <hr/>                                        

            <div class="form-group">
                <label class="col-sm-3 control-label">Home Teacher Name</label>
                <div class="col-sm-6">
                  <input type="text" name="siswa[nama_lengkap_wali]" placeholder="nama lengkap wali" class="form-control" />
                </div>
            </div>                                           

            <div class="form-group">
                <label class="col-sm-3 control-label">Home Teacher Jobs</label>
                <div class="col-sm-2">
                  <input type="text" placeholder="Home Teacher Job" name="siswa[pekerjaan_wali]" class="form-control">
                </div>
            </div>            

			  <div class="form-group">
				  <label class="col-sm-3 control-label">Citizen</label>
				  <div class="col-sm-8">
			          <div class="rdio rdio-primary">
			            <input type="radio" id="ina" value="ina" name="siswa[kewarganegaraan_wali]" required="">
			            <label for="ina">Indonesian</label>
			          </div>
			          <div class="rdio rdio-primary">
			            <input type="radio" id="foreign" value="foreign" name="siswa[kewarganegaraan_wali]" required="">
			            <label for="foreign">Foreign</label>
			          </div>
					  <label class="error" for="siswa[kewarganegaraan_wali]"></label>
				  </div>              
				</div>
            
            <br/><br/>
                                                                                                                                                      

           <button type="submit" class="btn btn-success btn-lg btn-block submit-form-regis">Submit Form</button>    
                                              
            <div class="clear-space"></div>                   

          </div>
          <!--  end Parent Info    -->
          
                  
                </div><!-- tab-content -->
                <ul class="pager wizard">
                	<li class="previous"><a href="javascript:void(0)">Previous</a></li>
                	<li class="next"><a href="javascript:void(0)">Next</a></li>
				        </ul>                
                
              </div><!-- #validationWizard -->
              
            </div><!-- panel-body -->
          </div><!-- panel -->
        </div><!-- col-md-12 -->
        
                
    </div><!-- contentpanel -->
</form>