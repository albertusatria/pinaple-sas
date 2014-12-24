<?php
 /*
  * Author		: Albertus S Yudha
  * Description	: Block for Student Basic Information
 */
?>
<form method="post" action="#" class="form-horizontal">
	<!-- Personal Info -->
	<div class="form-group">
        <h4 class="col-sm-4 text-danger">Personal Information </h4>
    </div>
    <hr/>
	<div class="form-group">
		<label class="col-sm-3 control-label">Full Name <span class="asterisk">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="full_name" class="form-control" value="R. Agoeng Bhimasta">
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label">Nickname</label>
		<div class="col-sm-9">
			<input type="text" name="nickname" class="form-control" value="Bimo">
		</div>
	</div>		
	<div class="form-group validation-pass" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Place &amp; Date of Birth <span class="asterisk">*</span></label>
		<div class="col-sm-3">
			<input type="text" name="place_birth" placeholder="Place of Birth, ex. : Yogyakarta, ..."
			class="form-control" value="Yogyakarta">
		</div>
		<div class="col-sm-3">
			<input type="text" placeholder="Date of Birth: dd-mm-yyyy" name="dob" id="tgl_lahir"
			class="form-control hasDatepicker valid" required="" maxlength="10" autocomplete="off" value="12-12-1991">
			<input type="hidden" name="siswa[siswa_tgl_lahir]" id="hidden_dob" value="2014-12-10">
		</div>
	</div>	
	<div class="form-group" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Gender <span class="asterisk">*</span></label>
		<div class="col-sm-9 checkbox-list">
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="laki-laki" value="L" name="gender" required="" checked>
				<label for="laki-laki">Male</label>
			</div>
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="perempuan" value="P" name="gender" required="">
				<label for="perempuan">Female</label>
			</div>
			<label class="error" for="gender" style="display: none;"></label>
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label">Address <span class="asterisk">*</span></label>
		<div class="col-sm-9">
			<textarea class="form-control" rows="5" placeholder="Address">Tegal Lempuyangan</textarea>
		</div>
	</div>		
	<div class="form-group">
		<label class="col-sm-3 control-label">Religion</label>
		<div class="col-sm-4">
			<select id="religion" class="form-control chosen-select"  data-placeholder="Choose Religion..." name="religion_student">
			  <option value=""></option>
			  <option value="ISLAM">Moslem</option>
			  <option value="KRISTEN">Christian</option>
			  <option value="KATHOLIK" selected>Catholic</option>
			  <option value="HINDU">Hindu</option>
			  <option value="BUDHA">Budha</option>                          
			  <option value="KONG HU CHU">Kong Hu Chu</option>                          
			</select>
		</div>
    </div>	
	<div class="form-group" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Citizen <span class="asterisk">*</span></label>
		<div class="col-sm-9 checkbox-list">
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="wni" value="wni" name="citizen" required="" checked>
				<label for="wni">Indonesia</label>
			</div>
			<div class="rdio rdio-primary radio-inline">
				<input type="radio" id="wna" value="wna" name="citizen" required="">
				<label for="wna">Foreign</label>
			</div>
			<label class="error" for="gender" style="display: none;"></label>
		</div>
	</div>	    
	<!-- /end Personal Info -->
	
	<!-- Family Info -->
	<div class="form-group">
        <h4 class="col-sm-4 text-danger">Family Information </h4>
    </div>
    <hr/>	
	<div class="form-group validation-pass" style="margin-bottom: 12px;">
		<label class="col-sm-3 control-label">Children number ... of ... <span class="asterisk">*</span></label>
		<div class="col-sm-3">
			<input type="text" name="place_birth" placeholder="children number ..."
			class="form-control" value="4">
		</div>
		<div class="col-sm-3">
			<input type="text" name="place_birth" placeholder="children number ..."
			class="form-control" value="4">
		</div>
	</div>	    
</form>