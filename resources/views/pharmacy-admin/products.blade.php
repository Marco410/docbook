@extends('layout.mainlayout_pharmacy_admin')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Products</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Products</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="add-product" class="btn btn-primary float-right mt-2">Add New</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-md-12">
						
							<!-- Recent Orders -->
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>#</th>
													<th>Product Name</th>
													<th>Category</th>
													<th>Price</th>
													<th>Quantity</th>
													<th>Discount</th>
													<th>Expire</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>8</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product10.jpg" alt="product image"></span>
															Lysofranil Dorzostin
														</h2>
													</td>
													<td>Hair care</td>
													<td>$10</td>
													<td>22</td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>7</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product2.jpg" alt="product image"></span>
															Adderall
														</h2>
													</td>
													<td>Phytopathology‎</td>
													<td>$10</td>
													<td>22</td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>6</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product11.jpg" alt="product image"></span>
															Ergorinex Caffeigestin
														</h2>
													</td>
													<td>Hair care</td>
													<td>$15</td>
													<td>22</td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>5</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product12.jpg" alt="product image"></span>
															Acetrace Amionel
														</h2>
													</td>
													<td>Body care</td>
													<td>$10</td>
													<td>22</td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>4</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product1.jpg" alt="product image"></span>
															Actamin
														</h2>
													</td>
													<td>Phytopathology‎</td>
													<td>$22</td>
													<td><span class="btn btn-sm bg-danger-light">THERE ONLY 5</span></td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product13.jpg" alt="product image"></span>
															Rapalac Neuronium
														</h2>
													</td>
													<td>Skin care</td>
													<td>$16</td>
													<td>213</td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product.jpg" alt="product image"></span>
															Abilify
														</h2>
													</td>
													<td>Phytopathology‎</td>
													<td>$22</td>
													<td><span class="btn btn-sm bg-danger-light">THERE ONLY 2</span></td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
												</tr>
												<tr>
													<td>1</td>
													<td>
														<h2 class="table-avatar">
															<span class="avatar avatar-sm mr-2"><img class="avatar-img" src="../assets_pharmacy/img/product/product14.jpg" alt="product image"></span>
															Cordacriptine Mardipine
														</h2>
													</td>
													<td>Skin care</td>
													<td>$22</td>
													<td><span class="btn btn-sm bg-danger-light">THERE ONLY 2</span></td>
													<td>0%</td>
													<td><span class="btn btn-sm bg-danger-light">THE PRODUCT IS EXPIRED</span></td>
													<td>
														<div class="actions">
															<a class="btn btn-sm bg-success-light" href="edit-product">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="javascript:void(0);" class="btn btn-sm bg-danger-light" data-toggle="modal" data-target="#deleteConfirmModal">
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
							<!-- /Recent Orders -->
							
						</div>
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->

		<!-- Model -->
		<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="acc_title">Delete</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<p id="acc_msg">are you sure you want to delete?</p>
					</div>
					<div class="modal-footer">
						<a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
						<button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modele -->
@endsection