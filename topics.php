<?php include('header.php');?>

<?php
	if (isset($_POST['liked'])) {
		$topic_id = $_POST['topic_id'];
		$result = mysqli_query($conn, "SELECT * FROM topics WHERE id=$topic_id Limit 1");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];
		$user_id = $_SESSION['login_id'];

		mysqli_query($conn, "INSERT INTO likes (user_id, topic_id) VALUES ($user_id, $topic_id)");
		mysqli_query($conn, "UPDATE topics SET likes=$n+1 WHERE id=$topic_id");

		echo $n+1;
		exit();
	}

	if (isset($_POST['unliked'])) {
		$topic_id = $_POST['topic_id'];
		$result = mysqli_query($conn, "SELECT * FROM topics WHERE id=$topic_id Limit 1");
		$row = mysqli_fetch_array($result);
		$n = $row['likes'];
		$user_id = $_SESSION['login_id'];

		mysqli_query($conn, "DELETE FROM likes WHERE topic_id=$topic_id AND user_id=$user_id");
		mysqli_query($conn, "UPDATE topics SET likes=$n-1 WHERE id=$topic_id");
		
		echo $n-1;
		exit();
	}
?>

<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-end">
          <div class="col-sm">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-no-gutter">
                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Topics</a></li>
                <li class="breadcrumb-item active" aria-current="page">Overview</li>
              </ol>
            </nav>

            <h1 class="page-header-title">Topics</h1>
          </div>
          <!-- End Col -->

			<div class="col-sm-auto">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTopicModal" id="openCreateModalButton" >
					<i class="bi-receipt me-1"></i> Add topic
				</button>
			</div>
        </div>
        <!-- End Row -->
      </div>
      <!-- End Page Header -->

		<div id="alert-msg">
			
		</div>

      <div class="row justify-content-lg-center">
        <div class="col-lg-12">

          <!-- Step -->
          <ul class="step">
		  	<?php
				$sortsel = "datecreate";
				if(isset($_POST['sortbutton'])){
					if (!empty($_POST['sortselect'])){
						$sortsel = $_POST['sortselect'];
					}
				}
				$tag = $conn->query("SELECT * FROM categories order by name asc");
				while($row= $tag->fetch_assoc()):
					$tags[$row['id']] = $row['name'];
				endwhile;
					
				$topic = $conn->query("SELECT t.*, t.date_created AS datecreate ,u.username AS uname, c.name AS cname FROM topics t INNER JOIN users u on u.id = t.user_id INNER JOIN categories c ON t.category_ids = c.id ORDER BY $sortsel DESC");
				while($row= $topic->fetch_assoc()):
					$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
					unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
					$desc = strtr(html_entity_decode($row['content']),$trans);
					$desc=str_replace(array("<li>","</li>"), array("",","), $desc);
					// $view = $conn->query("SELECT * FROM forum_views where topic_id=".$row['id'])->num_rows;
					$comments = $conn->query("SELECT * FROM comments where topic_id=".$row['id'])->num_rows;
					$replies = $conn->query("SELECT * FROM replies where comment_id in (SELECT id FROM comments where topic_id=".$row['id'].")")->num_rows;
			?>
            <!-- Step Item -->
            <li class="step-item">
              <div class="step-content-wrapper">
                <div class="step-avatar">
                  	<img class="step-avatar" src="./assets/img/160x160/img1.jpg" alt="Image Description">
                </div>

                <div class="step-content">
                  <h5 class="mb-2"><?= $row['uname'] ?></h5>

                  <p class="fs-5 mb-1">created date to the topics <a class="text-uppercase" href="#"><i class="bi bi-calendar-week"></i> <?= date('M d, Y h:i A',strtotime($row['datecreate'])) ?></a></p>

					<?php if($_SESSION['login_id'] == $row['user_id'] || $_SESSION['login_type'] == 1): ?>
						<div class="col-sm-12">
							<div class="d-flex">
								<div class="h5" style="margin-left: 3px">
									<span class="badge bg-soft-primary text-primary rounded-pill">
										<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#createTopicModal" id="openEditModalButton" 
										data-id="<?= $row['id'] ?>"
										data-title="<?= $row['title'] ?>"
										data-content="<?= $row['content'] ?>"
										data-category_ids="<?= $row['category_ids'] ?>"
										><i class="bi-pencil-fill me-1"></i> Edit</a>
									</span> 
								</div>
								
								<div class="h5" style="margin-left: 3px">
									<span class="badge bg-soft-danger text-danger rounded-pill">
										<a class="delete_topic" href="javascript:void(0)" data-id="<?= $row['id']; ?>" style="color: rgba(var(--bs-danger-rgb),var(--bs-text-opacity))!important;"><i class="bi-trash me-1"></i> Delete</a>
									</span> 
								</div>
							</div>
						</div>
					<?php endif; ?>

                  <ul class="list-group list-group-sm">
                    <!-- List Item -->
                    <li class="list-group-item">
                      <div class="row gx-1">
                        <div class="col-sm-12">
                          <div class="d-flex">
							<h5><?= $row['title'] ?></h5>
                          </div>
                        </div>

						<div class="col-sm-12 mb-1">
                          <div class="d-flex">
							 
							<?php foreach(explode(",",$row['category_ids']) as $cat): ?>
								<?php 
									// echo ($cat > 1) ? " / ".$tags[$cat] : '<p style="margin-bottom: 0"><i class="bi-patch-check-fill text-primary"></i><b> Tag : '.$tags[$cat]; 
								?>
								<?= '<p style="margin-bottom: 0"><i class="bi-patch-check-fill text-primary"></i><b> Tag : '.$tags[$cat]; ?>
							<?php endforeach; ?>
							</b></p>
                          </div>
                        </div>

						<div class="col-sm-12">
							<div class="d-flex">
								<p style="margin-bottom: 0">Description:</p>
							</div>
                        </div>

						<div class="col-sm-9 mb-3">
							<?= $desc ?>
                        </div>

                        <div class="col-sm-12">
                          <div class="d-flex">
							<!-- <div class="h5" style="margin-bottom: 0"><span class="badge bg-secondary rounded-pill"><?= number_format($view) ?> View/s</span></div> -->
							<!-- <div class="h5" style="margin-bottom: 0; margin-left: 3px"><span class="badge bg-primary rounded-pill"><a href="view_forum.php?id=<?= $row['id']; ?>" style="color: rgba(var(--bs-white-rgb),var(--bs-text-opacity))!important;"><?= number_format($comments) ?> Comments <?= $replies > 0 ? " and ".number_format($replies).' Replies':'' ?></a></span></div> -->
							<div class="h5" style="margin-bottom: 0; margin-left: 3px"><span class="badge bg-primary rounded-pill"><a href="view_forum.php?id=<?= $row['id']; ?>" style="color: rgba(var(--bs-white-rgb),var(--bs-text-opacity))!important;"><?= number_format($comments) ?> Comments</a></span></div>
							<div class="h5" style="margin-bottom: 0; margin-left: 3px"><span class="badge bg-primary rounded-pill">
							<?php 
								$user_id = $_SESSION['login_id'];
								$results = mysqli_query($conn, "SELECT * FROM likes WHERE user_id=$user_id AND topic_id=".$row['id']."");

								if (mysqli_num_rows($results) == 1 ): ?>
									<span><a href="" class="unlike" data-id="<?= $row['id']; ?>" style="color:#fff"><i class="bi bi-hand-thumbs-down"></i> <?= $row['likes']; ?> Likes</a></span> 
								<?php else: ?>
									<span><a href="" class="like" data-id="<?= $row['id']; ?>" style="color:#fff"><i class="bi bi-hand-thumbs-up"></i> <?= $row['likes']; ?> likes</a></span> 
								<?php endif ?>
							</div>
                          </div>

                        </div>
                        <!-- End Col -->
                      </div>
                      <!-- End Row -->
                    </li>
                    <!-- End List Item -->
                  </ul>
                </div>

				
              </div>
            </li>
            <!-- End Step Item -->
			<?php endwhile; ?>
          </ul>
          <!-- End Step -->
        </div>
      </div>
      <!-- End Row -->
    </div>
    <!-- End Content -->
</main>

<!-- Create topic -->
<div class="modal fade" id="createTopicModal" tabindex="-1" aria-labelledby="createTopicModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="createTopicModalLabel">Create topic</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
					<!-- Body -->
					<div class="modal-body">
						<!-- Tab Content -->
						<div class="tab-content" id="createTopicModalTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<form id="manage-topic" action="">
									<!-- Form -->
									<div class="row mb-4">
										<label for="createTitleModalLabel" class="col-sm-3 col-form-label form-label">Title <i class="tio-help-outlined text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top"></i></label>
										<div class="col-sm-9">
											<div class="input-group input-group-sm-vertical">
												<input type="text" class="form-control" name="title" id="createTitleModalLabel" placeholder="Your Title" aria-label="Your Title">
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
										<label for="categoriesModal" class="col-sm-3 col-form-label form-label">Category</label>
										<div class="col-sm-9">
											<!-- Select -->
											<div class="tom-select-custom mb-4">
												<select class="js-select form-select" id="categoriesModal" name="category_ids" autocomplete="off" data-hs-tom-select-options='{
														"placeholder": "Select Category"
														}'>
													<?php 
														$tag = $conn->query("SELECT * FROM categories ORDER BY name ASC");
														while($row= $tag->fetch_assoc()):
													?>
														<option value="<?= $row['id'] ?>">
															<?= $row['name'] ?>
														</option>
													<?php endwhile; ?>
												</select>
											</div>
											<!-- End Select -->
										</div>
									</div>
									<!-- End Form -->

									<input type="hidden" name="id" value="">

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
<!-- End Create topic -->

<?php include('footer.php');?>

<script>
	$(document).ready(function(){
		$('.like').on('click', function(){
			var topic_id = $(this).data('id');
		
			$.ajax({
				url: 'topics.php',
				type: 'post',
				data: {
					'liked': 1,
					'topic_id': topic_id
				},
				success: function(response){
				}
			});
		});

		$('.unlike').on('click', function(){
			var topic_id = $(this).data('id');

			$.ajax({
				url: 'topics.php',
				type: 'post',
				data: {
					'unliked': 1,
					'topic_id': topic_id
				},
				success: function(response){
				}
			});
		});
	});
	
	$(document).on('click', '#openCreateModalButton', function(e) {
		$("input[name='title']").val("");
		$('#categoriesModal').val("");
		$('#content-description').children().first().html("");
		$("input[name='id']").val("");
	});

	$(document).on('click', '#openEditModalButton', function(e) {
		const category = $(this).attr("data-category_ids");

		$("input[name='title']").val($(this).attr("data-title"));
		$('#categoriesModal').val(category);
        $(`#categoriesModal option[value="${category}"]`).attr('selected', 'selected');
        document.getElementById('categoriesModal').tomselect.addItem(category);
		$('#content-description').children().first().html($(this).attr("data-content"));
		$("input[name='id']").val($(this).attr("data-id"));
	});

	$('#manage-topic').submit(function(e){
		// Prevent form submission
		e.preventDefault();
		if ($("#content-description").length) {
			var html = $('#content-description').children().first().html();
		}

		var formData = $(this).serializeArray();
		formData.push({ name: 'content', value: html });

		// Send AJAX request
		$.ajax({
			url: 'ajax.php?action=save_topic',
			method:'POST',
			data:formData,
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
					showMessage('Something error!', false);
				}
			}
		});
	})

	$('.edit_topic').click(function(){
		uni_modal("Edit Topic","cw_topic_manage.php?id="+$(this).attr('data-id'),'mid-large')
	})

	$('.delete_topic').click(function(){
        var topic_id = $(this).data('id');
        var confirmation = confirm("Are you sure you want to delete this topic?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=delete_topic',
                data: {id:topic_id},
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
</script>