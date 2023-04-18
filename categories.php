<?php 
	include('./header.php'); 
?>

<main id="content" role="main" class="main">
    <!-- Content -->
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-end">
			<div class="col-sm mb-2 mb-sm-0">
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-no-gutter">
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Category</a></li>
					<li class="breadcrumb-item active" aria-current="page">Overview</li>
				</ol>
				</nav>

				<h1 class="page-header-title">Category & Tags</h1>
			</div>
			<!-- End Col -->

			<div class="col-sm-auto">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
					<i class="bi-folder2-open me-1"></i> Add Category
				</button>
			</div>
			<!-- End Col -->
			</div>
			<!-- End Row -->
		</div>
		<!-- End Page Header -->

		<div id="alert-msg">
			
		</div>

		<!-- Card -->
		<div class="card">
			
			<!-- Header -->
			<div class="card-header card-header-content-md-between">
				<div class="mb-2 mb-md-0">
					<form>
					<!-- Search -->
					<div class="input-group input-group-merge input-group-flush">
						<div class="input-group-prepend input-group-text">
						<i class="bi-search"></i>
						</div>
						<input id="datatableSearch" type="search" class="form-control" placeholder="Search categorys" aria-label="Search categorys">
					</div>
					<!-- End Search -->
					</form>
				</div>

				<div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">
					<!-- Datatable Info -->
					<div id="datatableCounterInfo" style="display: none;">
						<div class="d-flex align-items-center">
							<span class="fs-5 me-3">
							<span id="datatableCounter">0</span>
							Selected
							</span>
							<a class="btn btn-outline-danger btn-sm" href="javascript:;">
							<i class="bi-trash"></i> Delete
							</a>
						</div>
					</div>
					<!-- End Datatable Info -->
				</div>
			</div>
			<!-- End Header -->

			<!-- Table -->
			<div class="table-responsive datatable-custom position-relative">
			<table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
					"columnDefs": [{
						"targets": [0, 4],
						"orderable": false
						}],
					"order": [],
					"info": {
						"totalQty": "#datatableWithPaginationInfoTotalQty"
					},
					"search": "#datatableSearch",
					"entries": "#datatableEntries",
					"pageLength": 5,
					"isResponsive": false,
					"isShowPaging": false,
					"pagination": "datatablePagination"
					}'>
				<thead class="thead-light">
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Description</th>
					<th>Create Date</th>
					<th>Action</th>
				</tr>
				</thead>

				<tbody>
					<?php
						$categorys = $conn->query("SELECT * FROM categories ORDER BY name ASC");
						$i = 1;
						while($row= $categorys->fetch_assoc()):
					?>
					<tr>
						<td>
							<?= $i++ ?>
						</td>
						<td>
							<?= $row['name'] ?>
						</td>
						<td>
							<?= $row['description'] ?>
						</td>
						<td>
							<?= $row['date_created'] ?>
						</td>
						<td>
							<button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal" id="openEditModalButton" 
								data-id="<?= $row['id'] ?>"
								data-name="<?= $row['name'] ?>"
								data-description="<?= $row['description'] ?>"
							>
								<i class="bi-pencil-fill me-1"></i> Edit
							</button>
							<a class="btn btn-outline-danger btn-sm delete_category" href="javascript:void(0)" data-id = '<?= $row['id'] ?>'><i class="bi bi-trash"></i> Delete</a>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
			</div>
			<!-- End Table -->

			<!-- Footer -->
			<div class="card-footer">
				<div class="row justify-content-center justify-content-sm-between align-items-sm-center">
					<div class="col-sm mb-2 mb-sm-0">
					<div class="d-flex justify-content-center justify-content-sm-start align-items-center">
						<span class="me-2">Showing:</span>

						<!-- Select -->
						<div class="tom-select-custom">
						<select id="datatableEntries" class="form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
									"searchInDropdown": false,
									"hideSearch": true
								}'>
							<option value="5" selected>5</option>
							<option value="10">10</option>
							<option value="15">15</option>
						</select>
						</div>
						<!-- End Select -->

						<span class="text-secondary me-2">of</span>

						<!-- Pagination Quantity -->
						<span id="datatableWithPaginationInfoTotalQty"></span>
					</div>
					</div>
					<!-- End Col -->

					<div class="col-sm-auto">
					<div class="d-flex justify-content-center justify-content-sm-end">
						<!-- Pagination -->
						<nav id="datatablePagination" aria-label="Activity pagination"></nav>
					</div>
					</div>
					<!-- End Col -->
				</div>
			</div>
			<!-- End Footer -->
		</div>
		<!-- End Card -->
	</div>
    <!-- End Content -->
</main>

<!-- Edit category -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="editCategoryModalLabel">Edit category</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
					<!-- Body -->
					<div class="modal-body">
						<!-- Tab Content -->
						<div class="tab-content" id="editCategoryModalTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<form id="update-category" action="">
									<!-- Form -->
									<div class="row mb-4">
										<label for="editCategoryNameModalLabel" class="col-sm-3 col-form-label form-label">Category Name</label>
										<div class="col-sm-9">
											<div class="input-group input-group-sm-vertical">
												<input type="text" class="form-control" name="name" id="editCategoryNameModalLabel" placeholder="Your Category Name" aria-label="Your Category Name" value="">
											</div>
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="editDescriptionModalLabel" class="col-sm-3 col-form-label form-label">Description</label>
										<div class="col-sm-9">
											<textarea name="description" class="form-control" id="editDescriptionModalLabel" cols="30" rows="10"></textarea>
										</div>
									</div>
									<!-- End Form -->

									<input type="hidden" name="id" value="">

									<div class="d-flex justify-content-end">
										<div class="d-flex gap-3">
											<button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
											<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- End Tab Content -->
					</div>
					<!-- End Body -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Edit category -->

<!-- Create category -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="createCategoryModalLabel">Create category</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
					<!-- Body -->
					<div class="modal-body">
						<!-- Tab Content -->
						<div class="tab-content" id="createCategoryModalTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<form id="create-category" action="">
									<!-- Form -->
									<div class="row mb-4">
										<label for="createCategoryNameModalLabel" class="col-sm-3 col-form-label form-label">Categoryname <i class="tio-help-outlined text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>
										<div class="col-sm-9">
											<div class="input-group input-group-sm-vertical">
												<input type="text" class="form-control" name="name" id="createCategoryNameModalLabel" placeholder="Your Category Name" aria-label="Your Category Name">
											</div>
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="crateDescriptionModalLabel" class="col-sm-3 col-form-label form-label">Description</label>
										<div class="col-sm-9">
											<textarea name="description" class="form-control" id="crateDescriptionModalLabel" cols="30" rows="10"></textarea>
										</div>
									</div>
									<!-- End Form -->

									<div class="d-flex justify-content-end">
										<div class="d-flex gap-3">
											<button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
											<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save created</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- End Tab Content -->
					</div>
					<!-- End Body -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Create category -->

<?php
	include('./footer.php'); 
?>

<script>
$(document).ready(function() {
	$(document).on('click', '#openEditModalButton', function(e) {
		$("input[name='name']").val($(this).attr("data-name"));
		$("textarea[name='description']").val($(this).attr("data-description"));
		$("input[name='id']").val($(this).attr("data-id"));
	});

	$('.delete_category').click(function(){
        var category_id = $(this).data('id');
        var confirmation = confirm("Are you sure you want to delete this category?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=delete_category',
                data: {id:category_id},
                success: function(response){
                    if(response==1){
						$('#alert-msg').html(`<div class="alert alert-success">Successfully deleted</div>`);
						$('#alert-msg').delay(2000).fadeOut('slow');
						setTimeout(() => location.reload(), 2000);
					}
                }
            });
        }
    });
});

$('#create-category').submit(function(e) {
	// Prevent form submission
	e.preventDefault();

	// Send AJAX request
	$.ajax({
		url: 'ajax.php?action=save_category',
		method:'POST',
		data:$(this).serialize(),
		success:function(response) {
			function showMessage(message, isSuccess) {
				const status = isSuccess ? 'success' : 'danger';
				$('#alert-msg').html(`<div class="alert alert-${status}">${message}</div>`);
				$('#alert-msg').delay(2000).fadeOut('slow');
				setTimeout(() => location.reload(), 2000);
			}

			if (response == 1) {
				showMessage('Created successfully!', true);
			} else if (response == 2) {
				showMessage('Updated successfully!', true);
			} else {
				showMessage('Categoryname already exists', false);
			}
		}
	});
});

$('#update-category').submit(function(e) {
	// Prevent form submission
	e.preventDefault();

	// Send AJAX request
	$.ajax({
		url: 'ajax.php?action=save_category',
		method:'POST',
		data:$(this).serialize(),
		success:function(response) {
			console.log(response);
			function showMessage(message, isSuccess) {
				const status = isSuccess ? 'success' : 'danger';
				$('#alert-msg').html(`<div class="alert alert-${status}">${message}</div>`);
				$('#alert-msg').delay(2000).fadeOut('slow');
				setTimeout(() => location.reload(), 2000);
			}

			if (response == 1) {
				showMessage('Created successfully!', true);
			} else if (response == 2) {
				showMessage('Updated successfully!', true);
			} else {
				showMessage('Categoryname already exists', false);
			}
		}
	});
});
</script>