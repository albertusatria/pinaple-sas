    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Portal</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/unit">Manage Unit</a></li>
          <li class="active">Setup Unit</li>
        </ol>
      </div>
    </div>

    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>setting/unit/add_process" enctype="multipart/form-data">
    
    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message; ?>
        </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="panel-close">&times;</a>
            <a href="#" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">Setup Unit</h4>
          <p>Please give Tahun Ajaran information</p>
        </div>
        <div class="panel-body panel-body-nopadding">
          
           <div class="form-group">
              <label class="col-sm-3 control-label">ID Unit *</label>
              <div class="col-sm-2">
                <input name="id_unit" class="form-control" maxlength="9" type="text" value="<?php echo $this->session->flashdata('id_unit'); ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Parent</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="id_parent">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_parent as $data) : ?>
                        <option value="<?php echo $data->id_unit; ?>"><?php echo $data->id_unit." | ".$data->unit; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Unit *</label>
              <div class="col-sm-4">
                <input name="unit" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('unit');?>" required/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Kategori *</label>
              <div class="col-sm-3">
                <select class="form-control input-sm mb15" name="kategori" required>
                    <option value="">-- SELECT --</option>
                    <option value="AKADEMIS">AKADEMIS</option>
                    <option value="NON AKADEMIS">NON AKADEMIS</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Jenjang *</label>
              <div class="col-sm-1">
                <input name="jenjang" type="text" class="form-control" maxlength="1" value="<?php echo $this->session->flashdata('jenjang');?>" required/>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Logo</label>
              <div class="col-sm-7">
                 <input name="unitfile" class="form-control"  class="span5" type="file" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kepala Unit</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="nama_kepala">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_kepala as $data) : ?>
                        <option value="<?php echo $data->nik; ?>"><?php echo $data->nama_lengkap; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Registrasi</label>
              <div class="col-sm-3">
                <input name="no_registrasi" type="text" class="form-control" maxlength="10" value="<?php echo $this->session->flashdata('no_registrasi');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Telpon</label>
              <div class="col-sm-3">
                <input name="no_telpon" type="text" class="form-control" maxlength="15" value="<?php echo $this->session->flashdata('no_telpon');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-4">
                <input name="email" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('email');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Alamat</label>
              <div class="col-sm-4">
                <input name="alamat" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('alamat');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kota</label>
              <div class="col-sm-3">
                <input name="kota" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('kota');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kecamatan</label>
              <div class="col-sm-3">
                <input name="kecamatan" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('kecamatan');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kelurahan</label>
              <div class="col-sm-3">
                <input name="kelurahan" type="text" class="form-control" maxlength="30" value="<?php echo $this->session->flashdata('kelurahan');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Fax</label>
              <div class="col-sm-3">
                <input name="no_fax" type="text" class="form-control" maxlength="15" value="<?php echo $this->session->flashdata('no_fax');?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Website</label>
              <div class="col-sm-4">
                <input name="website" type="text" class="form-control" maxlength="50" value="<?php echo $this->session->flashdata('website');?>"/>
              </div>
            </div>

        </div><!-- panel-body -->
        
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-primary">Submit</button>&nbsp;
                  <button class="btn btn-default" onclick="history.go(-1);">Cancel</button>
                </div>
             </div>
        </div><!-- panel-footer -->

        
      </div><!-- panel -->            
    </div><!-- contentpanel -->

</form>