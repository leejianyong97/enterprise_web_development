<!-- Edit topic -->
<div class="modal fade" id="editTopicModal" tabindex="-1" aria-labelledby="editTopicModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="editTopicModalLabel">Edit topic</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
					<!-- Body -->
					<div class="modal-body">
						<!-- Tab Content -->
						<div class="tab-content" id="editTopicModalTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<form id="manage-topic" action="">
									<!-- Form -->
									<div class="row mb-4">
										<label for="editTitleModalLabel" class="col-sm-3 col-form-label form-label">Title <i class="tio-help-outlined text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top"></i></label>
										<div class="col-sm-9">
											<div class="input-group input-group-sm-vertical">
												<input type="text" class="form-control" name="title" id="editTitleModalLabel" placeholder="Your Title" aria-label="Your Title">
											</div>
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label class="form-label">Description <span class="form-label-secondary">(Optional)</span></label>
										<div class="col-sm-12">
											<!-- Quill -->
											<div class="quill-custom">
												<div class="js-quill" id="content-description" style="height: 15rem;" data-hs-quill-options='{
													"placeholder": "Type your description...",
														"modules": {
															"toolbar": [
																["bold", "italic", "underline", "strike", "link", "blockquote", {"list": "bullet"}]
															]
														}
													}'>
												</div>
											</div>
											<!-- End Quill -->
										</div>
									</div>
									<!-- End Form -->

									<!-- Form -->
									<div class="row mb-4">
										<label for="editCategoriesModal" class="col-sm-3 col-form-label form-label">Category</label>
										<div class="col-sm-9">
											<!-- Select -->
											<div class="tom-select-custom mb-4">
												<select class="js-select form-select" id="editCategoriesModal" name="category_ids" autocomplete="off" data-hs-tom-select-options='{
														"placeholder": "Select Category"
														}'>
													<?php 
														$tag = $conn->query("SELECT * FROM categories ORDER BY name ASC");
														while($row= $tag->fetch_assoc()):
													?>
														<option value="<?= $row['id'] ?>" <?= isset($category_ids) && in_array($row['id'], explode(",",$category_ids)) ? "selected" : '' ?>>
															<?= $row['name'] ?>
														</option>
													<?php endwhile; ?>
												</select>
											</div>
											<!-- End Select -->
										</div>
									</div>
									<!-- End Form -->

									<div class="d-flex justify-content-end">
										<div class="d-flex gap-3">
											<button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
											<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save editd</button>
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
<!-- End Edit topic -->