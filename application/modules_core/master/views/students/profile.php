<div class="pageheader">
    <h2><i class="fa fa-smile-o"></i>Student Information #&nbsp;<?php echo $rs_student->nis?></h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Master</li>
        <li><a href="<?php echo base_url();?>master/students">Student Management</a></li>
        <li class="active">Student Information</li>
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
  	
  	<div class="row">
  		<div class="col-md-12">
		  	<div class="panel panel-default">
		        <?php //echo "Isi Active: ".$this->session->flashdata('act')." & ".$act;?>
		        <div class="panel-body">
		        	<!-- Nav tabs -->
			        <ul class="nav nav-tabs nav-justified">
			          <li <?php if(@$act=="BI"){ echo "class=\"active\"";}?>><a href="#basicInfo" data-toggle="tab"><strong>Basic Information</strong></a></li>
			          <li <?php if(@$act=="SA"){ echo "class=\"active\"";}?>><a href="#studentAchievement" data-toggle="tab"><strong>Student Achievement(s)</strong></a></li>
			          <li <?php if(@$act=="IH"){ echo "class=\"active\"";}?>><a href="#invoiceHistory" data-toggle="tab"><strong>Invoice History</strong></a></li>
			          <li <?php if(@$act=="SH"){ echo "class=\"active\"";}?>><a href="#studyHistory" data-toggle="tab"><strong>Study History</strong></a></li>
			        </ul>
			        
					<!-- Tab panes Content -->
			        <div class="tab-content">
						<div class="tab-pane <?php if(@$act=="BI"){ echo "active";}?>" id="basicInfo">
							<?php echo $this->load->view('master/students/profile/basic-info')?>
						</div>
						<div class="tab-pane <?php if(@$act=="SA"){ echo "active";}?>" id="studentAchievement">
							<?php echo $this->load->view('master/students/profile/student-achievement')?>
						</div>
						<div class="tab-pane <?php if(@$act=="IH"){ echo "active";}?>" id="invoiceHistory">
							<?php echo $this->load->view('master/students/profile/invoice-history')?>
						</div>
						<div class="tab-pane <?php if(@$act=="SH"){ echo "active";}?>" id="studyHistory">
							<?php echo $this->load->view('master/students/profile/study-history')?>
						</div>
			        </div>
			        <!-- /Tab panes Content -->
		        </div>
		        <!-- /panel-body -->
		        
			</div>
			<!-- /panel -->
  		</div>
  		<!-- /col-md-12 -->
  	</div>
  	<!-- /row -->

</div><!-- /contentpanel -->