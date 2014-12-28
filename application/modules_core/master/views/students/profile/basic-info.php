<?php
 /*
  * Author		: Albertus S Yudha
  * Description	: Block for Student Basic Information
 */
?>
<form method="post" action="<?php echo base_url(); ?>master/students/edit_profile_process/<?php echo $rs_student->nis?>" class="form-horizontal">
<input type="hidden" name="siswa[siswa_nis]" value="<?php echo $rs_student->nis?>">
	<!-- Personal Info -->
	<div class="form-group">
        <h4 class="col-sm-4 text-danger">Personal Information </h4>
    </div>
    <hr/>
	<div class="form-group">
		<label class="col-sm-3 control-label">Full Name<span class="asterisk">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="siswa[siswa_nama_lengkap]" class="form-control" value="<?php echo $rs_student->full_name?>" placeholder="Student Full Name..">
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label">Nick Name</label>
		<div class="col-sm-9">
			<input type="text" name="siswa[siswa_nama_panggilan]" class="form-control" value="<?php echo $rs_student->nick_name?>">
		</div>
	</div>		
	<div class="form-group validation-pass" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Place &amp; Date of Birth <span class="asterisk">*</span></label>
		<div class="col-sm-3">
			<input type="text" name="siswa[siswa_tempat_lahir]" placeholder="ex.: Yogyakarta, ..."
			class="form-control" value="<?php echo $rs_student->pob?>">
		</div>
		<div class="col-sm-3">
			<input type="text" placeholder="Date of Birth: dd-mm-yyyy" name="siswa[siswa_tgl_lahir_show]" id="tgl_lahir" 
			class="form-control" required value="<?php echo date('d-m-Y',strtotime($rs_student->dob)); ?>">
            <input type="hidden" name="siswa[siswa_tgl_lahir]" id="hidden_dob" value="<?php echo $rs_student->dob?>">
		</div>
	</div>	
	<div class="form-group" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Gender <span class="asterisk">*</span></label>
		<div class="col-sm-9 checkbox-list">
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="laki-laki" value="L" name="siswa[siswa_jk]" required="" <?php if($rs_student->sex=="L"){ echo "checked";} ?>>
				<label for="laki-laki">Male</label>
			</div>
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="perempuan" value="P" name="siswa[siswa_jk]" required="" <?php if($rs_student->sex=="P"){ echo "checked";} ?>>
				<label for="perempuan">Female</label>
			</div>
			<label class="error" for="gender" style="display: none;"></label>
		</div>
	</div>
	<div class="form-group validation-pass" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Children number ... of ... <span class="asterisk">*</span></label>
		<div class="col-sm-3">
			<input type="text" name="siswa[siswa_anak_ke]" placeholder="children number ..."
			class="form-control" value="<?php echo $rs_student->children_to ?>">
		</div>
		<div class="col-sm-3">
			<input type="text" name="siswa[siswa_saudara]" placeholder="children number ..."
			class="form-control" value="<?php echo $rs_student->sibling_number ?>">
		</div>
	</div>
	<div class="form-group">
      <label class="col-sm-3 control-label">Student life with</label>
      <div class="col-sm-3">
        <select class="form-control chosen-select student-address" data-placeholder="Student life with ..." name="siswa[tinggal_bersama]" value="<?php echo $rs_student->stay_with ?>">
          <option value=""> - select - </option>
          <option value="Ayah dan Ibu" <?php if($rs_student->stay_with=="Ayah dan Ibu"){ echo "selected";} ?>>Parents</option>
          <option value="Ayah" <?php if($rs_student->stay_with=="Ayah"){ echo "selected";} ?>>Father</option>
          <option value="Ibu" <?php if($rs_student->stay_with=="Ibu"){ echo "selected";} ?>>Mother</option>
          <option value="Saudara" <?php if($rs_student->stay_with=="Saudara"){ echo "selected";} ?>>Family Siblings</option>
          <option value="Lain-lain" <?php if($rs_student->stay_with=="Lain-lain"){ echo "selected";} ?>>Others</option>
        </select>
      </div>
    </div>	
	<div class="form-group">
		<label class="col-sm-3 control-label">Address <span class="asterisk">*</span></label>
		<div class="col-sm-9">
			<textarea class="form-control" rows="5" placeholder="ex.: Yogyakarta, ..." name="siswa[alamat_lengkap]"><?php echo $rs_student->living_address ?></textarea>
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
	<div class="form-group">
		<label class="col-sm-3 control-label">Religion</label>
		<div class="col-sm-4">
			<select id="religion" class="form-control chosen-select"  data-placeholder="Choose Religion..." name="siswa[siswa_agama]">
			  <option value=""></option>
			  <option <?php if($rs_student->religion=="ISLAM"){ echo "selected";} ?> value="ISLAM">Moslem</option>
			  <option <?php if($rs_student->religion=="KRISTEN"){ echo "selected";} ?> value="KRISTEN">Christian</option>
			  <option <?php if($rs_student->religion=="KATHOLIK"){ echo "selected";} ?> value="KATHOLIK">Catholic</option>
			  <option <?php if($rs_student->religion=="HINDU"){ echo "selected";} ?> value="HINDU">Hindu</option>
			  <option <?php if($rs_student->religion=="BUDHA"){ echo "selected";} ?> value="BUDHA">Budha</option>                          
			  <option <?php if($rs_student->religion=="KONG HU CHU"){ echo "selected";} ?> value="KONG HU CHU">Kong Hu Chu</option>                          
			</select>
		</div>
    </div>	
	<div class="form-group" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Nationality <span class="asterisk">*</span></label>
		<div class="col-sm-9 checkbox-list">
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="WNI" value="WNI" name="siswa[siswa_kewarganegaraan]" required="" <?php if($rs_student->nationality=="WNI"){ echo "checked";} ?>>
				<label for="WNI">Indonesian</label>
			</div>
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="WNA" value="WNA" name="siswa[siswa_kewarganegaraan]" required="" <?php if($rs_student->nationality=="WNA"){ echo "checked";} ?>>
				<label for="WNA">Foreign</label>
			</div>
			<label class="error" for="gender" style="display: none;"></label>
		</div>
	</div>	    
	<!-- /end Personal Info -->

	<br/><br/>

	<div class="form-group">
        <h4 class="col-sm-4 text-danger">Father Information </h4>
    </div>
    <hr/>                                        

    <div class="form-group">
        <label class="col-sm-3 control-label">Full Name <span class="asterisk">*</span></label>
        <div class="col-sm-6">
          <input type="text" name="siswa[nama_lengkap_ayah]" placeholder="Father Full Name.." class="form-control" required value="<?php echo $rs_student->father_full_name ?>"/>
        </div>
    </div>

   	<div class="form-group">
      <label class="col-sm-3 control-label">Place & Date of Birth</label>
      <div class="col-sm-2">
        <input type="text" name="siswa[tempat_lahir_ayah]" placeholder="ex.: Yogyakarta, ..." class="form-control" value="<?php echo $rs_student->father_pob ?>"/>
      </div>
      <div class="col-sm-3">
        <input type="text" placeholder="Date of Birth: dd-mm-yyyy" name="siswa[tgl_lahir_ayah_show]" id="tgl_lahir_ayah" class="form-control" value="<?php echo date('d-m-Y',strtotime($rs_student->father_dob)); ?>">
        <input type="hidden" name="siswa[tgl_lahir_ayah]" id="hidden_dob_ayah" value="<?php echo $rs_student->father_dob; ?>" >
      </div>
    </div>                        

    <div class="form-group">
      <label class="col-sm-3 control-label">Phone/Cellphone Number</label>
      <div class="col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
          <input type="text" name="siswa[hp_ayah]" placeholder="Father's phone number" class="form-control" value="<?php echo $rs_student->father_cell_phone ?>">
        </div>
      </div>              
    </div>     
<!--            
	<div class="form-group">
      <label class="col-sm-3 control-label">Address <span class="asterisk">*</span></label>
      <div class="col-sm-6">
        <input type="text" name="siswa-mother-address" placeholder="Address where student's father life" class="form-control" id="fathAddress" required/>
      </div>                       
    </div>                                                      
-->
	<div class="form-group">
      <label class="col-sm-3 control-label">Jobs</label>
      <div class="col-sm-2">
        <input type="text" placeholder="Father Jobs" name="siswa[pekerjaan_ayah]" class="form-control" value="<?php echo $rs_student->father_job ?>">
      </div>
  	</div>            

    <div class="form-group">
      <label class="col-sm-3 control-label">Monthly Salary (in rupiah)</label>
      <div class="col-sm-3">
        <div class="input-group">
          <span class="input-group-addon">Rp</span>
          <input type="text" placeholder="Ex : 3000000" id="penghasilan-ayah" name="siswa[penghasilan_ayah]" class="form-control" required value="<?php echo $rs_student->father_salary ?>">
          <span class="input-group-addon">.00</span>
        </div>
        <label class="error" for="penghasilan-ayah"></label>
      </div>
    </div>                                                           

    <div class="form-group">
      <label class="col-sm-3 control-label">Nationality</label>
	  <div class="col-sm-8">
          <div class="rdio rdio-primary">
            <input type="radio" id="ina_ayah" value="WNI" name="siswa[kewarganegaraan_ayah]" required="" <?php if($rs_student->father_citizen=="WNI"){ echo "checked";} ?>>
            <label for="ina_ayah">Indonesian</label>
          </div>
          <div class="rdio rdio-primary">
            <input type="radio" id="foreign_ayah" value="WNA" name="siswa[kewarganegaraan_ayah]" required="" <?php if($rs_student->father_citizen=="WNA"){ echo "checked";} ?>>
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
          <input type="text" name="siswa[nama_lengkap_ibu]" placeholder="Mother Full Name.." class="form-control" required value="<?php echo $rs_student->mother_full_name ?>"/>
        </div>
    </div>

   	<div class="form-group">
      <label class="col-sm-3 control-label">Place & Date of Birth</label>
      <div class="col-sm-2">
        <input type="text" name="siswa[tempat_lahir_ibu]" placeholder="ex.: Yogyakarta, ..." class="form-control" value="<?php echo $rs_student->mother_pob ?>"/>
      </div>
      <div class="col-sm-3">
        <input type="text" placeholder="Date of Birth: dd-mm-yyyy" name="siswa[tgl_lahir_ibu_show]" id="tgl_lahir_ibu" class="form-control" value="<?php echo date('d-m-Y',strtotime($rs_student->mother_dob)); ?>">
        <input type="hidden" name="siswa[tgl_lahir_ibu]" id="hidden_dob_ibu" value="<?php echo $rs_student->mother_dob; ?>">
      </div>
    </div>                        

    <div class="form-group">
      <label class="col-sm-3 control-label">Phone/Cellphone Number</label>
      <div class="col-sm-4">
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
          <input type="text" name="siswa[hp_ibu]" placeholder="Mother's phone number" class="form-control" value="<?php echo $rs_student->mother_cell_phone ?>">
        </div>
      </div>              
    </div>                                              
<!--
	<div class="form-group">
      <label class="col-sm-3 control-label">Address <span class="asterisk">*</span></label>
      <div class="col-sm-6">
        <input type="text" name="siswa-mother-address" placeholder="Address where student's mother life" class="form-control" id="momAddress" required/>
      </div>                       
    </div> 
-->
	<div class="form-group">
          <label class="col-sm-3 control-label">Jobs</label>
          <div class="col-sm-2">
            <input type="text" placeholder="Mothers Jobs" name="siswa[pekerjaan_ibu]" class="form-control" value="<?php echo $rs_student->mother_job ?>">
          </div>
    </div>            

    <div class="form-group">
      <label class="col-sm-3 control-label">Monthly Salary (in rupiah)</label>
      <div class="col-sm-3">
        <div class="input-group">
          <span class="input-group-addon">Rp</span>
          <input type="text" placeholder="Ex : 3000000" id="penghasilan-ibu" name="siswa[penghasilan_ibu]" class="form-control" required value="<?php echo $rs_student->mother_salary ?>">
          <span class="input-group-addon">.00</span>
        </div>
		<label class="error" for="penghasilan-ibu"></label>
      </div>
    </div>                                                           

    <div class="form-group">
      <label class="col-sm-3 control-label">Nationality</label>
	  <div class="col-sm-8">
          <div class="rdio rdio-primary">
            <input type="radio" id="ina_ibu" value="WNI" name="siswa[kewarganegaraan_ibu]" required="" <?php if($rs_student->mother_citizen=="WNI"){ echo "checked";} ?>>
            <label for="ina_ibu">Indonesian</label>
          </div>
          <div class="rdio rdio-primary">
            <input type="radio" id="foreign_ibu" value="WNA" name="siswa[kewarganegaraan_ibu]" required="" <?php if($rs_student->mother_citizen=="WNA"){ echo "checked";} ?>>
            <label for="foreign_ibu">Foreign</label>
          </div>
		  <label class="error" for="siswa[kewarganegaraan_ibu]"></label>	              
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
          <input type="text" name="siswa[nama_lengkap_wali]" placeholder="nama lengkap wali" class="form-control" value="<?php echo $rs_student->guardian_full_name ?>"/>
        </div>
    </div>                                           

    <div class="form-group">
        <label class="col-sm-3 control-label">Home Teacher Jobs</label>
        <div class="col-sm-2">
          <input type="text" placeholder="Home Teacher Job" name="siswa[pekerjaan_wali]" class="form-control" value="<?php echo $rs_student->guardian_job ?>">
        </div>
    </div>            

  	<div class="form-group">
	  <label class="col-sm-3 control-label">Nationality</label>
	  <div class="col-sm-8">
          <div class="rdio rdio-primary">
            <input type="radio" id="ina" value="WNI" name="siswa[kewarganegaraan_wali]" required="" <?php if($rs_student->guardian_citizen=="WNI"){ echo "checked";} ?>>
            <label for="ina">Indonesian</label>
          </div>
          <div class="rdio rdio-primary">
            <input type="radio" id="foreign" value="WNA" name="siswa[kewarganegaraan_wali]" required="" <?php if($rs_student->guardian_citizen=="WNA"){ echo "checked";} ?>>
            <label for="foreign">Foreign</label>
          </div>
		  <label class="error" for="siswa[kewarganegaraan_wali]"></label>
	  </div>              
	</div>
            
    <br/><br/>
    <button type="submit" class="btn btn-success btn-lg btn-block submit-form-regis">Submit Form</button>    
    <div class="clear-space"></div>   
</form>