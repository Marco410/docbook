

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
            <div class="breadcrumb-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-12">
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Registros Médicos</li>
                                </ol>
                            </nav>
                            <h2 class="breadcrumb-title">Registros Médicos</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->
            
            <!-- Page Content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        
                        <!-- Profile Sidebar -->
                        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                            <div class="profile-sidebar">
                                <div class="widget-profile pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="#" class="booking-doc-img">
                                            <img src="assets/img/patients/patient.jpg" alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3>Richard Wilson</h3>
                                            <div class="patient-details">
                                                <h5><i class="fas fa-birthday-cake"></i> 24 Jul 1983, 38 years</h5>
                                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo $__env->make('pacients.patient-profile-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								

                            </div>
                        </div>
                        <!-- / Profile Sidebar -->
                        
                        <div class="col-md-7 col-lg-8 col-xl-9">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body pt-0">
                                        
                                            <!-- Tab Menu -->
                                            <nav class="user-tabs mb-4">
                                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#pat_medicalrecords" data-toggle="tab">Registros Médicos</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#pat_prescription" data-toggle="tab">Preincripciones</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <!-- /Tab Menu -->
                                            
                                            <!-- Tab Content -->
                                            <div class="tab-content pt-0">
                                                
                                                <!-- Medical Records Tab -->
                                                <div id="pat_medicalrecords" class="tab-pane fade show active">
                                                    <div class="text-right">        
                                                        <a href="#" class="add-new-btn" data-toggle="modal" data-target="#add_medical_records_modal">Add Medical Records</a>
                                                    </div>
                                                    <div class="card card-table mb-0">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover table-center mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Date</th>
                                                                            <th>Description</th>
                                                                            <th>Attachment</th>
                                                                            <th>Orderd By</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>Richard Wilson</td>
                                                                            <td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                                            <td>Benzaxapine Croplex</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" title="Download attachment" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i></a>
                                                                            </td>
                                                                            <td>Your Self</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                    <i class="far fa-trash-alt"></i> 
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Vena</td>
                                                                            <td>3 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                                            <td>Rapalac Neuronium</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" title="Download attachment" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i></a>
                                                                            </td>
                                                                            <td>Your Self</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                    <i class="far fa-trash-alt"></i> 
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>Tressie</td>
                                                                            <td>1 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
                                                                            <td>Ombinazol Bonibamol</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" title="Download attachment" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i></a>
                                                                            </td>
                                                                            <td>Your Self</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                    <i class="far fa-trash-alt"></i> 
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4</td>
                                                                            <td>Richard Wilson</td>
                                                                            <td>30 Oct 2019 <span class="d-block text-info">9.00 AM</span></td>
                                                                            <td>Dantotate Dantodazole</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" title="Download attachment" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i></a>
                                                                            </td>
                                                                            <td>Your Self</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                    <i class="far fa-trash-alt"></i> 
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td>Christopher</td>
                                                                            <td>28 Oct 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                                            <td>Acetrace Amionel</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" title="Download attachment" class="btn btn-primary btn-sm"> <i class="fa fa-download"></i></a>
                                                                            </td>
                                                                            <td>Your Self</td>
                                                                            <td>
                                                                                <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                                                                    <i class="far fa-trash-alt"></i> 
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Medical Records Tab -->
                                                
                                                <!-- Prescription Tab -->
                                                <div class="tab-pane fade" id="pat_prescription">
                                                    <div class="card card-table mb-0">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-hover table-center mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Date</th>
                                                                            <th>Name</th>
                                                                            <th>Doctor</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
                                                                            <td>Prescription</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile">Dr. Ruby Perrin <span>Dental</span></a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-action">
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                                        <i class="far fa-eye"></i> View
                                                                                    </a>
                                                                                    
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                                        <i class="fas fa-print"></i> Print
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>3 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
                                                                            <td>Prescription</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile">Dr. Darren Elder <span>Dental</span></a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-action">
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                                        <i class="far fa-eye"></i> View
                                                                                    </a>
                                                                                    
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                                        <i class="fas fa-print"></i> Print
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>1 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
                                                                            <td>Prescription</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile">Dr. Deborah Angel <span>Cardiology</span></a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-action">
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                                        <i class="far fa-eye"></i> View
                                                                                    </a>
                                                                                    
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                                        <i class="fas fa-print"></i> Print
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4</td>
                                                                            <td>30 Oct 2019 <span class="d-block text-info">9.00 AM</span></td>
                                                                            <td>Prescription</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile">Dr. Sofia Brient <span>Urology</span></a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-action">
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                                        <i class="far fa-eye"></i> View
                                                                                    </a>
                                                                                    
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                                        <i class="fas fa-print"></i> Print
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td>28 Oct 2019 <span class="d-block text-info">6.00 PM</span></td>
                                                                            <td>Prescription</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile">Dr. Marvin Campbell <span>Ophthalmology</span></a>
                                                                                </h2>
                                                                            </td>
                                                                            <td>
                                                                                <div class="table-action">
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                                        <i class="far fa-eye"></i> View
                                                                                    </a>
                                                                                    
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                                        <i class="fas fa-print"></i> Print
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>6</td>
                                                                            <td>27 Oct 2019 <span class="d-block text-info">8.00 AM</span></td>
                                                                            <td>Prescription</td>
                                                                            <td>
                                                                                <h2 class="table-avatar">
                                                                                    <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                                                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                                                                    </a>
                                                                                    <a href="doctor-profile">Dr. Katharine Berthold <span>Orthopaedics</span></a>
                                                                                </h2>
                                                                            </td>
                                                                            <td >
                                                                                <div class="table-action">
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                                                                        <i class="far fa-eye"></i> View
                                                                                    </a>
                                                                                    
                                                                                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                                                                                        <i class="fas fa-print"></i> Print
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Prescription Tab -->
                                                    
                                            </div>
                                            <!-- Tab Content -->
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>      
            <!-- /Page Content -->
</div>
<!-- Medical Records Modal -->
        <div class="modal fade custom-modal custom-medicalrecord-modal" id="add_medical_records_modal" style="display: none;" data-select2-id="add_medical_records_modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Medical Records</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="medical_records_form" enctype="multipart/form-data">          
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Title Name</label>
                                        <input type="text" name="description" class="form-control" placeholder="Enter Title Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Patient</label>
                                        <select class="select">
                                            <option>Myself</option>
                                            <option>Child_1</option>
                                            <option>Self</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Hospital Name</label>
                                        <input type="text" name="hospital" class="form-control" placeholder="Enter name here..">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Upload</label>
                                        <div class="upload-medical-records">
                                            <input class="form-control" type="file" name="user_file" id="user_files_mr">
                                            <div class="upload-content">
                                                <div class="text-center">
                                                    <div class="upload-icon mb-2"><img src="assets/img/upload-icon.png" alt=""></div>
                                                    <h5>Drag &amp; Drop</h5>
                                                    <h6>or <span class="text-danger">Browse</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Symptoms</label>
                                        <input type="text" data-role="tagsinput" class="input-tags form-control" value="Fever, Fatigue" name="services" id="services">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="tratment_date" id="tratment_date">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <div class="submit-section text-center">
                                    <button type="submit" id="medical_btn" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Medical Records Modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\pixelar_doc\laravel-files\template\resources\views/pacients/medical-records.blade.php ENDPATH**/ ?>