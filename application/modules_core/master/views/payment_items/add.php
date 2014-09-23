    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Portal</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>master/payment_items/">Manage Payment Items</a></li>
          <li class="active">Manage Payment Item for School Year <?php echo $r_sy->name; ?></li>
        </ol>
      </div>
    </div>

<form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>master/payment_items/add_process">
    
    <input type="hidden" name="school_year_id" value="<?php echo $r_sy->id; ?>"/>

    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message; ?>
        </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">School Year Costs Setup <?php echo $r_sy->name; ?></h4>
          <p>Please give Administration Cost for School Year Information</p>
        </div>
        <div class="panel-body panel-body-nopadding">
          
           <div class="form-group">
              <label class="col-sm-3 control-label">Unit Name *</label>
              <div class="col-sm-4">
                <select class="form-control input-sm mb15" name="unit_id" required>
                    <option value="">-- SELECT --</option>
                    <?php foreach ($rs_unit as $data) : ?>
                        <option value="<?php echo $data->id; ?>"
                        <?php 
                        if($data->id==$this->session->flashdata('unit_id')){echo "selected='selected'";} 
                        if($data->id==$u_id){echo "selected='selected'";} 
                        ?>
                        ><?php echo $data->name; ?></option>
                    <?php endforeach ; ?>
                </select>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-3 control-label">Item Type *</label>
              <div class="col-sm-2">
                <select class="form-control input-sm mb15" name="item_type_id" required>
                    <option value="">-- SELECT --</option>
                    <?php foreach ($rs_it as $data) : ?>
                        <option value="<?php echo $data->id; ?>"
                         <?php if($data->id==$this->session->flashdata('item_type_id')){echo "selected='selected'";} ?>
                        ><?php echo $data->name; ?></option>
                    <?php endforeach ; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Amount (Rp)</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" maxlength="10" name="amount" value="<?php echo $this->session->flashdata('amount'); ?>" required/>
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