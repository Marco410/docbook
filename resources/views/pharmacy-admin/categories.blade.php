@extends('layout.mainlayout_pharmacy_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Categories</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Categories</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Name</th>
													<th>Created date</th>
													<th class="text-right">Actions</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>01</td>
													
													<td>
														<h2 class="table-avatar">	
															Phytopathology‎
														</h2>
													</td>
													
													<td>01-May-2020-12:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>02</td>
													
													<td>
														<h2 class="table-avatar">	
															Family care
														</h2>
													</td>
													
													<td>03-May-2020-08:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>03</td>
													
													<td>
														<h2 class="table-avatar">	
															Cancer
														</h2>
													</td>
													
													<td>05-May-2020-06:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>04</td>
													
													<td>
														<h2 class="table-avatar">	
															Hair care
														</h2>
													</td>
													
													<td>06-May-2020-01:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>05</td>
													
													<td>
														<h2 class="table-avatar">	
															Skin care	
														</h2>
													</td>
													
													<td>05-May-2020-02:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>06</td>
													
													<td>
														<h2 class="table-avatar">	
															Rare diseases‎	
														</h2>
													</td>
													
													<td>06-May-2020-06:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>07</td>
													
													<td>
														<h2 class="table-avatar">	
															Baby care
														</h2>
													</td>
													
													<td>07-May-2020-12:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>08</td>
													
													<td>
														<h2 class="table-avatar">	
															Inflammations	
														</h2>
													</td>
													
													<td>07-May-2020-05:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>09</td>
													
													<td>
														<h2 class="table-avatar">	
															Sleep disorders‎
														</h2>
													</td>
													
													<td>07-May-2020-08:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>10</td>
													
													<td>
														<h2 class="table-avatar">	
															Infectious diseases‎	
														</h2>
													</td>
													
													<td>08-May-2020-02:00</td>

													<td class="text-right">
														<div class="actions">
															<a class="btn btn-sm bg-success-light" data-toggle="modal" href="#edit_specialities_details">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
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
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Category</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row form-row">
									<div class="col-12">
										<div class="form-group">
											<label>Category</label>
											<input type="text" class="form-control">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Category</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row form-row">
									<div class="col-12">
										<div class="form-group">
											<label>Category</label>
											<input type="text" class="form-control" value="Cardiology">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">Are you sure want to delete?</p>
								<button type="button" class="btn btn-primary">Save </button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
        </div>
		<!-- /Main Wrapper -->
@endsection