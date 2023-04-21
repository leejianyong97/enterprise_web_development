<?php 
	include('./header.php'); 
	if (!isset($_SESSION['login_type']) || $_SESSION['login_type'] !== "1") {
		echo "<script>window.location.href = 'index.php';</script>";
		exit();
	}
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
					<li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Users</a></li>
					<li class="breadcrumb-item active" aria-current="page">Overview</li>
				</ol>
				</nav>

				<h1 class="page-header-title">Users</h1>
			</div>
			<!-- End Col -->
			<div class="col-sm-auto">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
					<i class="bi-person-plus-fill me-1"></i> Add user
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
						<input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
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
						"targets": [0, 5],
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
					<th>Role</th>
					<th>Email</th>
					<th>Create Date</th>
					<th>Action</th>
				</tr>
				</thead>

				<tbody>
					<?php
						$users = $conn->query("SELECT * FROM users ORDER BY username ASC");
						$i = 1;
						while($row= $users->fetch_assoc()):
					?>
					<tr>
						<td>
							<?= $i++ ?>
						</td>
						<td>
							<?= ucwords($row['username']) ?>
						</td>
						<td>
							<?php
								switch ($row['type']) {
									case '1':
										echo 'Admin';
										break;
									case '2':
										echo 'QACoordinator (Marketing)';
										break;
									case '3':
										echo 'QACoordinator (Purchasing)';
										break;
									case '4':
										echo 'QACoordinator (Human Resources)';
										break;
									case '5':
										echo 'QACoordinator (IT)';
										break;
									case '6':
										echo 'QACoordinator (Manufacturing)';
										break;
									case '7':
										echo 'Staff';
										break;
									default:
										echo 'invalid';
										break;
								}
							?>
						</td>
						<td>
							<?= $row['email'] ?>
						</td>
						<td>
							<?= $row['date_created'] ?>
						</td>
						<td>
							<button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal" id="openEditModalButton" 
								data-id="<?= $row['id'] ?>"
								data-username="<?= $row['username'] ?>"
								data-type="<?= $row['type'] ?>"
								data-email="<?= $row['email'] ?>"
							>
								<i class="bi-pencil-fill me-1"></i> Edit
							</button>
							<a class="btn btn-outline-danger btn-sm delete_user" href="javascript:void(0)" data-id = '<?= $row['id'] ?>'><i class="bi bi-trash"></i> Delete</a>
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

<!-- Edit user -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="editUserModalLabel">Edit user</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
					<!-- Body -->
					<div class="modal-body">
						<!-- Tab Content -->
						<div class="tab-content" id="editUserModalTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<form id="update-user" action="">
									<!-- Form -->
									<div class="row mb-4">
										<label for="editUsernameModalLabel" class="col-sm-3 col-form-label form-label">Username</label>
										<div class="col-sm-9">
											<div class="input-group input-group-sm-vertical">
												<input type="text" class="form-control" name="username" id="editUsernameModalLabel" placeholder="Your Username" aria-label="Your Username" value="">
											</div>
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="editEmailModalLabel" class="col-sm-3 col-form-label form-label">Email</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" name="email" id="editEmailModalLabel" placeholder="Email" aria-label="Email" value="">
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="editRoleModalLabel" class="col-sm-3 col-form-label form-label">Role</label>
										<div class="col-sm-9">
											<!-- Select -->
											<div class="tom-select-custom mb-4">
												<select class="js-select form-select" id="editRoleModalLabel" name="type" autocomplete="off" data-hs-tom-select-options='{
														"placeholder": "Select Role"
														}'>
													<option value="7">Staff</option>
													<option value="6">QACoordinator(Manufacturing)</option>
													<option value="5">QACoordinator (IT)</option>
													<option value="4">QACoordinator (Human Resources)</option>
													<option value="3">QACoordinator (Purchasing)</option>
													<option value="2">QACoordinator (Marketing)</option>
													<option value="1">Admin</option>
												</select>
											</div>
											<!-- End Select -->
										</div>
									</div>
									<!-- End Form -->

									<input type="hidden" name="id" id="id" value="">

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
<!-- End Edit user -->

<!-- Create user -->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="createUserModalLabel">Create user</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
					<!-- Body -->
					<div class="modal-body">
						<!-- Tab Content -->
						<div class="tab-content" id="createUserModalTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<form id="create-user" action="">
									<!-- Form -->
									<div class="row mb-4">
										<label for="createUsernameModalLabel" class="col-sm-3 col-form-label form-label">Username <i class="tio-help-outlined text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>
										<div class="col-sm-9">
											<div class="input-group input-group-sm-vertical">
												<input type="text" class="form-control" name="username" id="createUsernameModalLabel" placeholder="Your Username" aria-label="Your Username">
											</div>
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="createEmailModalLabel" class="col-sm-3 col-form-label form-label">Email</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" name="email" id="createEmailModalLabel" placeholder="Email" aria-label="Email" value="">
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="createPasswordModalLabel" class="col-sm-3 col-form-label form-label">Password</label>
										<div class="col-sm-9">
											<input type="password" class="form-control" name="password" id="createPasswordModalLabel" placeholder="Password" aria-label="Password" value="">
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="createRoleModalLabel" class="col-sm-3 col-form-label form-label">Role</label>
										<div class="col-sm-9">
											<!-- Select -->
											<div class="tom-select-custom mb-4">
												<select class="js-select form-select" id="createRoleModalLabel" name="type" autocomplete="off" data-hs-tom-select-options='{
														"placeholder": "Select Role"
														}'>
													<option value="7">Staff</option>
													<option value="6">QACoordinator(Manufacturing)</option>
													<option value="5">QACoordinator (IT)</option>
													<option value="4">QACoordinator (Human Resources)</option>
													<option value="3">QACoordinator (Purchasing)</option>
													<option value="2">QACoordinator (Marketing)</option>
													<option value="1">Admin</option>
												</select>
											</div>
											<!-- End Select -->
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
<!-- End Create user -->

<?php
	include('./footer.php'); 
?>

<script>
$(document).ready(function() {
	$(document).on('click', '#openEditModalButton', function(e) {
		const type = $(this).attr("data-type");
		
		$("#editUsernameModalLabel").val($(this).attr("data-username"));
		$("#editEmailModalLabel").val($(this).attr("data-email"));
		$("#id").val($(this).attr("data-id"));
		$('#editRoleModalLabel').val(type);
        $(`#editRoleModalLabel option[value="${type}"]`).attr('selected', 'selected');
        document.getElementById('editRoleModalLabel').tomselect.addItem(type);
	});

	$('.delete_user').click(function(){
        var user_id = $(this).data('id');
        var confirmation = confirm("Are you sure you want to delete this user?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=delete_user',
                data: {id:user_id},
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

$('#create-user').submit(function(e) {
	// Prevent form submission
	e.preventDefault();

	// Send AJAX request
	$.ajax({
		url: 'ajax.php?action=save_user',
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
				showMessage('Username already exists', false);
			}
		}
	});
});

$('#update-user').submit(function(e) {
	// Prevent form submission
	e.preventDefault();

	// Send AJAX request
	$.ajax({
		url: 'ajax.php?action=save_user',
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
				showMessage('Username already exists', false);
			}
		}
	});
});
</script>