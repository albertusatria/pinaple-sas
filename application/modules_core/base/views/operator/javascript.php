			</div>
			<!-- // Content END -->

			<div class="clearfix"></div>
			<!-- // Sidebar menu & content wrapper END -->

			<div id="footer" class="hidden-print">

				<!--  Copyright Line -->
				<div class="copy">&copy; 2014 - Mahatala Medis 1.0
				</div>
				<!--  End Copyright Line -->

			</div>

			<!-- // Footer END -->

		</div>
		<!-- // Main Container Fluid END -->


		<!-- Global -->
		<script data-id="App.Config">
			var App = {};
			var basePath = '',
				commonPath = '<?php echo base_url(); ?>resource/themes/masteroperator/',
				rootPath = '<?php echo base_url(); ?>',
				DEV = false,
				componentsPath = '<?php echo base_url(); ?>resource/themes/masteroperator/components/';

			var primaryColor = '#3695d5',
				dangerColor = '#b55151',
				successColor = '#609450',
				infoColor = '#4a8bc2',
				warningColor = '#ab7a4b',
				inverseColor = '#45484d';

			var themerPrimaryColor = primaryColor;
		</script>

		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/library/bootstrap/js/bootstrap.min.js?v=v1.0.2&sv=v0.0.1"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.0.2&sv=v0.0.1"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/plugins/breakpoints/breakpoints.js?v=v1.0.2&sv=v0.0.1"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/plugins/preload/pace/pace.min.js?v=v1.0.2&sv=v0.0.1"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/plugins/preload/pace/preload.pace.init.js?v=v1.0.2&sv=v0.0.1"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/core/js/animations.init.js?v=v1.0.2"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/core/js/sidebar.main.init.js?v=v1.0.2"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/core/js/sidebar.discover.init.js?v=v1.0.2"></script>
		<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/core/js/core.init.js?v=v1.0.2"></script>

		<?php if ($this->session->userdata('page_title') != 'Operator Dashboard') : ?>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/tables/responsive/assets/lib/js/footable.min.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/tables/responsive/assets/custom/js/tables-responsive-footable.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/inputmask/assets/lib/jquery.inputmask.bundle.min.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/inputmask/assets/custom/inputmask.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/bootstrap-switch/assets/lib/js/bootstrap-switch.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/bootstrap-switch/assets/custom/js/bootstrap-switch.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/bootstrap-timepicker/assets/lib/js/bootstrap-timepicker.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/bootstrap-timepicker/assets/custom/js/bootstrap-timepicker.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/select2/assets/lib/js/select2.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/elements/select2/assets/custom/js/select2.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/file_manager/plupload/assets/lib/plupload.full.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/file_manager/plupload/assets/lib/jquery.plupload.queue/jquery.plupload.queue.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/common/forms/file_manager/plupload/assets/custom/plupload.init.js?v=v1.0.2&sv=v0.0.1"></script>
		<?php else : ?>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/lib/jquery.flot.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/lib/jquery.flot.resize.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/lib/plugins/jquery.flot.tooltip.min.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/custom/js/flotcharts.common.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/custom/js/flotchart-line-2.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/custom/js/flotchart-mixed-1.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/flot/assets/custom/js/flotchart-bars-horizontal.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/easy-pie/assets/lib/js/jquery.easy-pie-chart.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/easy-pie/assets/custom/easy-pie.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/sparkline/jquery.sparkline.min.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/charts/sparkline/sparkline.init.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/maps/vector/assets/lib/jquery-jvectormap-1.2.2.min.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/maps/vector/assets/lib/maps/jquery-jvectormap-world-mill-en.js?v=v1.0.2&sv=v0.0.1"></script>
			<script src="<?php echo base_url(); ?>resource/themes/masteroperator/components/modules/admin/maps/vector/assets/custom/maps-vector.world-map-markers.init.js?v=v1.0.2&sv=v0.0.1"></script>
		<?php endif ; ?>

	<script type='text/javascript'>
		$(function () {
			var scntDiv = $('#p_scents1');
			var i = $('#p_scents1 li').size() + 1;

			$('#addScnt1').live('click', function () {
				$('<li id="new_record1" class="plupload_delete"><div class="plupload_file_name"><select class="form-control" name="tindakan_id[]" style="width:100%; position:relative;"><option value="">-- Pilih --</option><?php foreach ($rs_tindakan as $data) : ?><option value="<?php echo $data['tindakan_id']; ?>"><?php echo $data['tindakan_nama']; ?> - Rp. <?php echo number_format($data['tindakan_harga'], 2); ?></option><?php endforeach ; ?></select></div><div class="plupload_file_action"></div><div class="plupload_file_status"></div><div class="plupload_file_size"></div><div class="plupload_clearer">&nbsp;</div></li>').appendTo(scntDiv);
				i++;
				return false;
			});

			$('#remScnt1').live('click', function () {
				if (i > 2) {
					$(this).parents('li#new_record1').remove();
					i--;
				}
				return false;
			});
		});
	</script>

	<script type='text/javascript'>
		$(function () {
			var scntDiv = $('#p_scents_tindakan_obat');
			var i = $('#p_scents_tindakan_obat li').size() + 1;

			$('#addScnt_tindakan_obat').live('click', function () {
				$('<li id="new_record_tindakan_obat" class="plupload_delete"><div class="plupload_file_name"><select class="form-control" name="tindakan_obat_id[]" style="width:100%; position:relative;"><option value="">-- Pilih --</option><?php foreach ($rs_obat as $data) : ?><option value="<?php echo $data['obat_id']; ?>"><?php echo $data['obat_nama']; ?> - Rp. <?php echo number_format($data['obat_harga'], 2); ?></option><?php endforeach ; ?></select></div><div class="plupload_file_action"></div><div class="plupload_file_status"><input class="form-control" maxlength="3" id="qty" name="tindakan_qty[]" type="number" placeholder="qty" /></div><div class="plupload_file_size"></div><div class="plupload_clearer">&nbsp;</div></li>').appendTo(scntDiv);
				i++;
				return false;
			});

			$('#rem_tindakan_obat').live('click', function () {
				if (i > 2) {
					$(this).parents('li#new_record_tindakan_obat').remove();
					i--;
				}
				return false;
			});
		});
	</script>

	<script type='text/javascript'>
		$(function () {
			var scntDiv = $('#p_scents2');
			var i = $('#p_scents2 li').size() + 1;

			$('#addScnt2').live('click', function () {
				$('<li id="new_record2" class="plupload_delete"><div class="plupload_file_name"><select class="form-control" name="obat_id[]" style="width:100%; position:relative;"><option value="">-- Pilih --</option><?php foreach ($rs_obat as $data) : ?><option value="<?php echo $data['obat_id']; ?>"><?php echo $data['obat_nama']; ?> - Rp. <?php echo number_format($data['obat_harga'], 2); ?></option><?php endforeach ; ?></select></div><div class="plupload_file_action"></div><div class="plupload_file_status"><input class="form-control" maxlength="3" id="qty" name="qty[]" type="number" placeholder="qty" /></div><div class="plupload_file_size"></div><div class="plupload_clearer">&nbsp;</div></li>').appendTo(scntDiv);
				i++;
				return false;
			});

			$('#remScnt2').live('click', function () {
				if (i > 2) {
					$(this).parents('li#new_record2').remove();
					i--;
				}
				return false;
			});
		});
	</script>

	<script type='text/javascript'>
		$(function () {
			var scntDiv = $('#p_scents3');
			var i = $('#p_scents3 li').size() + 1;

			$('#addScnt3').live('click', function () {
				$('<li id="new_record3"><div class="plupload_file_name" style="width:100px;"><input class="form-control" maxlength="3" id="oksigen_id" name="oksigen_id[]" type="number" placeholder="Menit" /></div><div class="input-group bootstrap-timepicker" style="width:125px;"><input type="text" name="oksigen_from[]" class="form-control timepicker"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span></div><div class="plupload_clearer">&nbsp;</div></li>').appendTo(scntDiv);
				i++;
				return false;
			});

			$('#remScnt3').live('click', function () {
				if (i > 2) {
					$(this).parents('li#new_record3').remove();
					i--;
				}
				return false;
			});
		});
	</script>

	<script type='text/javascript'>
		$(function () {
			var scntDiv = $('#paramedis');
			var i = $('#paramedis li').size() + 1;

			$('#addParamedis').live('click', function () {
				var user_id = document.getElementById('user_id').value;
				var drh_tgl = document.getElementById('drh_tgl').value;
				var drh_jam = document.getElementById('drh_jam').value;

				$('<li id="new_record_paramedis" class=""><div class="plupload_file_name"><h5><input type="hidden" name="users_id[]" value="' + user_id + '" />' + document.getElementById('user_id').options[document.getElementById('user_id').selectedIndex].text + '</h5></div><div class="plupload_file_action"><h5><input type="hidden" name="drh_tgl[]" value="' + drh_tgl + '" />' + drh_tgl + '</h5></div><div class="plupload_file_status"><h5><input type="hidden" name="drh_jam[]" value="' + drh_jam + '" />' + drh_jam + '</h5></div><div class="plupload_file_size"> <a href="#" id="remParamedis">Remove</a></div><div class="plupload_clearer">&nbsp;</div></li>').appendTo(scntDiv);
				i++;
				return false;
			});

			$('#remParamedis').live('click', function () {
				if (i > 2) {
					$(this).parents('li#new_record_paramedis').remove();
					i--;
				}
				return false;
			});
		});
	</script>

	<script type="text/javascript">
		function tipe_kelas() {
			var rtr_id = document.getElementById('rtr_id').value;
			if (rtr_id == 3) {
				$.getJSON('<?php echo base_url(); ?>medical/pendaftaran/get_tipe_kelas', function(result) {
					output = '<div class="form-group"><label class="col-md-3 control-label" for="rtr_id">Tipe Kelas</label><div class="col-md-8"><select class="form-control" id="rtk_id" name="rtk_id" style="width:100%;" required>';
					output += '<option value="">-- Pilih --</option>';
					for (var i = 0; i < result.length; i++) {
						output += '<option value="' + result[i].rtk_id + '">' + result[i].rtk_name + '</option>';
					};
					output += '</select></div></div>';

					document.getElementById("tipe_kelas").innerHTML = output;

					output = '<div class="form-group"><label class="col-md-3 control-label" for="mr_ambulance">Ambulance</label><div class="col-md-3"><select class="form-control" id="mr_ambulance" name="mr_ambulance" style="width:100%;" onchange="ambulance()" required>';
					output += '<option value="no">TIDAK</option>';
					output += '<option value="yes">YA</option>';
					output += '</select></div></div>';

					document.getElementById("ambulance").innerHTML = output;
				});
			} else {
				document.getElementById("tipe_kelas").innerHTML = "";
				document.getElementById("ambulance").innerHTML = "";
			};
		}
	</script>

	<script type="text/javascript">
		function ambulance() {
			var mr_ambulance = document.getElementById('mr_ambulance').value;
			if (mr_ambulance == "yes") {
				var output = '<div class="form-group"><label class="col-md-3 control-label" for="mr_ambulance_km">Jarak KM</label><div class="col-md-2">';
				output += '<input class="form-control" maxlength="3" id="mr_ambulance_km" name="mr_ambulance_km" type="text" required />';
				output += '</div></div>';

				output += '<div class="form-group"><label class="col-md-3 control-label" for="mr_ambulance_harga">Biaya Ambulance</label><div class="col-md-5">';
				output += '<input class="form-control" maxlength="11" id="mr_ambulance_harga" name="mr_ambulance_harga" type="text" required />';
				output += '</div></div>';

				output += '<div class="form-group"><label class="col-md-3 control-label" for="mr_ambulance_ket">Keterangan</label><div class="col-md-8">';
				output += '<textarea class="form-control" name="mr_ambulance_ket" rows="10"></textarea>';
				output += '</div></div>';

				document.getElementById("ambulance_detail").innerHTML = output;
			} else {
				document.getElementById("ambulance_detail").innerHTML = "";
			}
		}
	</script>
