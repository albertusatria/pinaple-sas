<div class="pageheader">
    <h2><i class="fa fa-smile-o"></i>Student Information #&nbsp;<?php echo $nis?></h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li><a href="<?php echo base_url();?>student/manage">Student Management</a></li>
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
		        
		        <div class="panel-body">
		        	<!-- Nav tabs -->
			        <ul class="nav nav-tabs nav-justified">
			          <li class="active"><a href="#basicInfo" data-toggle="tab"><strong>Basic Information</strong></a></li>
			          <li><a href="#studentAchievement" data-toggle="tab"><strong>Student Achievement(s)</strong></a></li>
			          <li><a href="#invoiceHistory" data-toggle="tab"><strong>Invoice History</strong></a></li>
			          <li><a href="#studyHistory" data-toggle="tab"><strong>Study History</strong></a></li>
			        </ul>
			        
					<!-- Tab panes Content -->
			        <div class="tab-content">
						<div class="tab-pane active" id="basicInfo">
							<?php echo $this->load->view('student/profile/basic-info')?>
						</div>
						<div class="tab-pane" id="studentAchievement">
							<?php echo $this->load->view('student/profile/student-achievement')?>
						</div>
						<div class="tab-pane" id="invoiceHistory">
							<?php echo $this->load->view('student/profile/invoice-history')?>
						</div>
						<div class="tab-pane" id="studyHistory">
							<?php echo $this->load->view('student/profile/study-history')?>
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