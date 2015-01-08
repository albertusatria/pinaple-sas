<?php
 /*
  * Author		: Albertus S Yudha
  * Description	: Block for Student Achievement(s)
 */
?>
<form method="post" action="<?php echo base_url(); ?>master/students/edit_achievement_process/<?php echo $rs_student->nis?>" class="form-horizontal">
<div class="row">                                                                        
  <?php $a = 1; for ($a=1;$a<=3;$a++) : ?>
    <input type="hidden" name="siswa_prestasi<?php echo $a?>[profil]" class="form-control" value="no" />
    <input type="hidden" name="siswa_prestasi<?php echo $a?>[id]" class="form-control" value="<?php echo @$ls_achievement[$a-1]['id'] ?>" />
  <div class="form-group">
      <label class="col-sm-2 control-label">Achivement Name <?php echo $a ?></label>
      <div class="col-sm-5">
        <input type="text" placeholder="Achievement Name, ex: Juara I Lomba Mewarnai" name="siswa_prestasi<?php echo $a?>[nama_prestasi]" class="form-control" 
        value="<?php echo @$ls_achievement[$a-1]['achievement'] ?>"/>
      </div>
    <div class="col-sm-2">
      <select class="form-control chosen-select" data-placeholder="Pilih Jenis Prestasi..." name="siswa_prestasi<?php echo $a?>[jenis_prestasi]">
        <option value="" selected>Type of Achievement </option>
        <option value="AKADEMIS" <?php if(@$ls_achievement[$a-1]['type']=="AKADEMIS"){ echo "selected";} ?>>Academic</option>
        <option value="NON AKADEMIS" <?php if(@$ls_achievement[$a-1]['type']=="NON AKADEMIS"){ echo "selected";} ?>>Non Academic</option>
      </select>
    </div>
    <div class="col-sm-2">
      <select class="form-control chosen-select" data-placeholder="Pilih tingkat Prestasi..." name="siswa_prestasi<?php echo $a?>[tingkat_prestasi]">
        <option value="INTERN" <?php if(@$ls_achievement[$a-1]['level']=="INTERN"){ echo "selected";} ?>>Intern</option>
        <option value="KOTA" <?php if(@$ls_achievement[$a-1]['level']=="KOTA"){ echo "selected";} ?>>City</option>
        <option value="PROPINSI" <?php if(@$ls_achievement[$a-1]['level']=="PROPINSI"){ echo "selected";} ?>>Province</option>
        <option value="NASIONAL" <?php if(@$ls_achievement[$a-1]['level']=="NASIONAL"){ echo "selected";} ?>>National</option>
        <option value="INTERNASIONAL" <?php if(@$ls_achievement[$a-1]['level']=="INTERNASIONAL"){ echo "selected";} ?>>International</option>
      </select>
    </div>
    <div class="col-sm-1">
      <input type="text" id="tahun_prestasi" name="siswa_prestasi<?php echo $a?>[tahun_prestasi]" class="form-control" placeholder="Year.." 
      value="<?php echo @$ls_achievement[$a-1]['year'] ?>" maxlength="4"/>
    </div>
  </div>
 <?php endfor; ?>
</div>
    <br/><br/>
    <button type="submit" class="btn btn-success btn-lg btn-block submit-form-regis">Submit Form</button>    
    <div class="clear-space"></div>
</form>