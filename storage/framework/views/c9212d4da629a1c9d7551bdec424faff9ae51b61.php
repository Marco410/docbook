	<!-- jQuery -->
	<script src="/assets_admin/js/jquery-3.2.1.min.js"></script>

	<script src="/main/axios.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="/assets_admin/js/popper.min.js"></script>
        <script src="/assets_admin/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="/assets_admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<?php if(Route::is(['pagee'])): ?>
		<script src="/assets_admin/plugins/raphael/raphael.min.js"></script>    
		<script src="/assets_admin/plugins/morris/morris.min.js"></script>  
		<script src="/assets_admin/js/chart.morris.js"></script>
		<?php endif; ?>
		<!-- Form Validation JS -->
        <script src="/assets_admin/js/form-validation.js"></script>
		<!-- Mask JS -->
		<script src="/assets_admin/js/jquery.maskedinput.min.js"></script>
        <script src="/assets_admin/js/mask.js"></script>
			<!-- Select2 JS -->
			<script src="/assets_admin/js/select2.min.js"></script>
		
			<!-- Datetimepicker JS -->
			<script src="/assets_admin/js/moment.min.js"></script>
		<script src="/assets_admin/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Full Calendar JS -->
        <script src="/assets_admin/js/jquery-ui.min.js"></script>
        <script src="/assets_admin/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="/assets_admin/plugins/fullcalendar/jquery.fullcalendar.js"></script>
        <script src="/assets_admin/plugins/fullcalendar/locales-all.js"></script>
		<!-- Datatables JS -->
		<script src="/assets_admin/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="/assets_admin/plugins/datatables/datatables.min.js"></script>	
		<script src="/main/izitoast/js/iziToast.min.js"></script>	
		<!-- Custom JS -->
		<script  src="/assets_admin/js/script.js"></script>

        <?php if(Route::is(['registro'])): ?>
		<script  src="/assets_admin/js/view_controllers/auth.js"></script>
		<?php endif; ?>
		
		<?php if(Route::is(['especialidades'])): ?>
		<script  src="/assets_admin/js/view_controllers/especialidad.js"></script>
		<?php endif; ?>

		<?php if(Route::is(['roles'])): ?>
		<script  src="/assets_admin/js/view_controllers/role.js"></script>
		<?php endif; ?>
		
		<?php if(Route::is(['lista-doctor'])): ?>
		<script  src="/assets_admin/js/view_controllers/admin-doctor.js"></script>
		<?php endif; ?>

	

<?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/layout/partials/footer_admin-scripts.blade.php ENDPATH**/ ?>