<div class="pageheader">
  <h2><i class="fa fa-home"></i> Dashboard </h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="index.html">Pinaple SAS</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </div>
</div>

<div class="contentpanel">
  
	<div class="row">

        <!-- total students -->
        <div class="col-sm-6 col-md-4">
          <div class="panel panel-dark panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="<?php echo base_url();?>bracket/images/is-user.png" alt="">
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Students</small>
                    <h1>1000+</h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
                
                <div class="row">
                  <div class="col-xs-3">
                    <small class="stat-label">KB</small>
                    <h4>50<span class="operator">+</span></h4>
                  </div>
                  
                  <div class="col-xs-3">
                    <small class="stat-label">TK</small>
                    <h4>50<span class="operator">+</span></h4>
                  </div>
                  <div class="col-xs-3">
                    <small class="stat-label">SD</small>
                    <h4>450<span class="operator">+</span></h4>
                  </div>
                  <div class="col-xs-3">
                    <small class="stat-label">SMP</small>
                    <h4>450<span class="operator">+</span></h4>
                  </div>

                </div><!-- row -->
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        <!-- end total students -->
		
        <!-- total earnings -->
        <!-- col-sm-6 -->
        <div class="col-sm-6 col-md-4">
          <div class="panel panel-success panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row earns">
                  <div class="col-xs-3">
                    <img src="<?php echo base_url();?>bracket/images/is-money.png" alt="">
                  </div>
                  <div class="col-xs-9">
                    <small class="stat-label">Today's Earnings</small>
                    <h1><span class="currency today-earns">800</span>k+</h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
                
                <div class="row last-earns">
                  <div class="col-xs-6">
                    <small class="stat-label">This Month</small>
                    <h4><span class="currency weeks-earns">8200 </span>k+</h4>
                  </div>
                  
                  <div class="col-xs-6">
                    <small class="stat-label">Last Month</small>
                    <h4><span class="currency months-earns">3200 </span>k+</h4>
                  </div>
                                  
                </div><!-- row -->
                  
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        <!-- end total earnings -->
        
        <!-- total loss -->
        <!-- col-sm-6 -->
        <div class="col-sm-6 col-md-4">
          <div class="panel panel-danger panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row earns">
                  <div class="col-xs-3">
                    <img src="<?php echo base_url();?>bracket/images/is-money.png" alt="">
                  </div>
                  <div class="col-xs-9">
                    <small class="stat-label">Today's Loss</small>
                    <h1><span class="currency today-earns">800</span>k+</h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
                
                <div class="row last-earns">
                  <div class="col-xs-6">
                    <small class="stat-label">This Month</small>
                    <h4><span class="currency weeks-earns">8200 </span>k+</h4>
                  </div>
                  
                  <div class="col-xs-6">
                    <small class="stat-label">Last Month</small>
                    <h4><span class="currency months-earns">3200 </span>k+</h4>
                  </div>
                                  
                </div><!-- row -->
                  
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        <!-- end total loss -->
        
	</div>
	
	<div class="row">

		<div class="col-sm-8">
			<div class="panel panel-default">
				<div class="panel-body">
	              <h5 class="subtitle">Budi Utama's Students </h5>
	              <p>Line Chart of Budi Utama's Total Students per Year</p>
				  <div id="total-student-graphic" style="height: 300px;"></div>	
				</div>
			</div>
		</div><!-- col-sm-7 -->        		
		<div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-body">
            <h5 class="subtitle mb5">Budi Utama's Classroom</h5>
            <p class="mb15">Classroom distribution in Budi Utama</p>
            <div id="class-room" style="text-align: center; height: 300px;"></div>
            </div><!-- panel-body -->
          </div><!-- panel -->
          
        </div><!-- col-sm-4 -->        		
	</div>  
</div><!-- contentpanel -->