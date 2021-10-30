<script src="/assets_admin/js/jquery-3.2.1.min.js"></script>

<script src="/main/axios.min.js"></script>
		<!-- Bootstrap Core JS -->
		<script src="/assets/js/popper.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<!-- Swiper JS -->
		<script src="/assets/plugins/swiper/js/swiper.min.js"></script>
		<!-- Datetimepicker JS -->
		<script src="/assets/js/moment.min.js"></script>
		<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Full Calendar JS -->
        <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="/assets/plugins/fullcalendar/jquery.fullcalendar.js"></script>
		<script src="/assets/plugins/fullcalendar/locales-all.js"></script>
		
		<script src="/main/izitoast/js/iziToast.min.js"></script>
		<!-- Datatables JS -->
		<script src="/assets_admin/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="/assets_admin/plugins/datatables/datatables.min.js"></script>	
		<!-- Sticky Sidebar JS -->
        <script src="/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
         <!-- Apex JS -->
		<script src="/assets/plugins/apex/apexcharts.min.js"></script>
		<!-- Select2 JS -->
		<script src="/assets/plugins/select2/js/select2.min.js"></script>
			<!-- Fancybox JS -->
			<script src="/assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		<!-- Dropzone JS -->
		<script src="/assets/plugins/dropzone/dropzone.min.js"></script>
		
		<!-- Bootstrap Tagsinput JS -->
		<script src="/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		
		<!-- Profile Settings JS -->
		<script src="/assets/js/profile-settings.js"></script>
		<!-- Circle Progress JS -->
		<script src="/assets/js/circle-progress.min.js"></script>
		<!-- Owl Carousel JS -->
		<script src="/assets/js/owl.carousel.min.js"></script>
		<!-- Slick JS -->
		<script src="/assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="/assets/js/script.js"></script>
		@if(Route::is(['map-grid','map-list']))
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
		<script src="/assets/js/map.js"></script>
		@endif

		@if(Route::is(['pa-registro-paso1']))
		<script src="/assets_admin/js/view_controllers/pacients.js"></script>
		@endif

		@if(Route::is(['registro-paso1']))
		<script src="/assets/js/view_controllers/doctors_vs.js"></script>
		@endif
		
		@if (Route::is(['citas']))
		<script  src="/assets_admin/js/view_controllers/citas.js"></script>
		@endif
		
		@if (Route::is(['mis-pacientes','paciente-nuevo']))
		<script  src="/assets/js/view_controllers/doctors_vs.js"></script>
		@endif
		
		@if (Route::is(['historial','perfil-paciente']))
		<script  src="/assets/js/view_controllers/historial/alergias_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/vacunas_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/medicamentos_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/motivo_consultarapida_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/articulos_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/estudios_vs.js"></script>
		<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
		<script>
			var txtConsulta;
			var notas_historial;
			ClassicEditor
			.create( document.querySelector( '#txtconsulta_rapida' ) )
			.then(editor =>{
				txtConsulta = editor;
			})
			.catch( error => {
				console.error( error );
			} );
			
			ClassicEditor
			.create( document.querySelector( '#notas_historial' ) )
			.then(editor2 =>{
				notas_historial = editor2;
			})
			.catch( error => {
				console.error( error );
			} );
			</script>
		<script  src="/assets/js/view_controllers/historial/heredo_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/gineco_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/patologicos_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/npatologicos_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial_vs.js"></script>
		<script  src="/assets/js/view_controllers/historial/historial_tables_vs.js"></script>
		@endif
		
		@if (Route::is(['caja']))
		<script  src="/assets/js/view_controllers/cajas_vs.js"></script>
		@endif

		@if (Route::is(['pagos']))
		<script  src="/assets/js/view_controllers/pagos_vs.js"></script>
		@endif

		@if (Route::is(['reportes']))
		<script  src="/assets/js/view_controllers/reportes_vs.js"></script>
		@endif