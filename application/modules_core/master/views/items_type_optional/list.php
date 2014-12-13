<div class="pageheader">
    <h2><i class="fa fa-strikethrough"></i>Item Type Optional</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Master</li>
        <li class="active">Items Type Optional</li>
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

  <?php if ($eror != null ) : ?>
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Warning!</strong>   <?php echo $eror; ?>
  </div>
  <?php endif ; ?>

	<!-- Panel Top -->  
	<div class="row">
		<!-- Search Result -->
		<div class="col-md-8">
		  <div class="panel panel-default">
		  
		    <div class="panel-heading">
		      <div class="panel-btns">
		        <a href="#" class="minimize">−</a>
		      </div>
		      <h4 class="panel-title">Search Items Type Optional
		      <p>This is form to search current data of <strong> Items Type Optional </strong></p>
		    </div>
		    
			<div class="panel-body">
			  <div class="row row-pad-5">
				<div class="form-group">
				
				  <div class="col-lg-5">	  
					<select name="u_id" id="u_id" class="form-control input-sm" required>
			  				<option value="all"> All Unit </option>
		              <?php foreach ($ls_unit as $unit): ?>
		                  <?php if($unit->id!='0000'){ ?>
		                    <option value=<?php echo $unit->id ?> <?php if($unit->id==@$this->session->flashdata('u_id')){echo "selected='selected'";} ?> required>
		                    <?php echo $unit->name ?></option>
		                  <?php } ?>
		              <?php endforeach; ?>
					</select>
				  </div>

		          <div class="col-lg-5">
		            <input type="text" name="name" id="keyword" class="form-control" placeholder="Type student's Name or NIS..." required="">
		          </div>
		          
		          <div class="col-lg-2">
		            <a id="btnCari" class="btn btn-primary btn-block">Search</a>
		          </div>      
			                  	
			    </div>
			  </div><!-- row -->
			</div><!-- panel-body -->
		    
		  </div><!-- panel -->
		</div>
		
		<!-- Setup Items Type Optional-->
		<div class="col-md-4">
			<form id="newScholarship" method="POST" action="<?php echo base_url(); ?>master/items_type_optional/add_process" class="form-horizontal">
			  <div class="panel panel-default">
			      <div class="panel-heading">
			        <div class="panel-btns">
			          <a href="#" class="minimize maximize">&plus;</a>
			        </div>
			        <h4 class="panel-title">New Item Type Optional Form</h4>
			      </div>
			      <div class="panel-body" style="display:none;">
			        <div class="form-group">
			          <div class="col-sm-12">
			            <input type="text" name="name" class="form-control" placeholder="Type Item Type Name..." value="<?php echo $this->session->flashdata('name'); ?>" required />
			          </div>
			        </div>
			
			        <div class="form-group">
					  <div class="col-sm-12">
					  	<div class="input-group selec choose-new-levels">
					  		<select name="unit_id" id="jenjangSekolah" class="form-control input-sm">
					  				<option value=""> All Unit </option>
				              <?php foreach ($ls_unit as $unit): ?>
				                  <?php if($unit->id!='0000'){ ?>
				                    <option value=<?php echo $unit->id ?> <?php if($unit->id==@$this->session->flashdata('unit_id')){echo "selected='selected'";} ?>>
				                    <?php echo $unit->name ?></option>
				                  <?php } ?>
				              <?php endforeach; ?>
							</select>
		                </div>
					  </div>
					</div>

					<div class="form-group">
					  <div class="col-sm-12">
					  	<div class="input-group">
					  		<span class="input-group-addon">Rp</span>
					  		<input name="amount" type="text" class="form-control" placeholder="example: 300000" value="<?php echo $this->session->flashdata('amount'); ?>">
					  		<!--<span class="input-group-addon">.00</span>-->
		                </div>
					  </div>
					</div>
								        
			        <div class="form-group">
			          <div class="col-sm-12">
			            <textarea rows="5" name="description" class="form-control" placeholder="Type Item Type Description..." required><?php echo $this->session->flashdata('description'); ?></textarea>
			          </div>
			        </div>
			      </div><!-- panel-body -->
			      <div class="panel-footer" style="display:none">
			        <div class="row">
			          <div class="col-sm-9 col-sm-offset-3">
			            <button class="btn btn-primary">Submit</button>
			            <button type="reset" class="btn btn-default">Reset</button>
			          </div>
			        </div>
			      </div>
			    
			  </div><!-- panel -->
          </form>
		</div>
	</div>
	<!-- end Panel Top -->

<!-- Search Result -->
	<div class="row" id="searchResult"></div>
<!-- end Search Result --> 

</div><!-- contentpanel -->