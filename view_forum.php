<?php include 'header.php' ?>

<style>
	.step-item {
		margin-bottom: 2.25rem !important;
	}
</style>
<?php
if(isset($_GET['id']))
{
	$qry = $conn->query("SELECT t.*,u.username FROM topics t inner join users u on u.id = t.user_id where t.id= ".$_GET['id']);

	foreach($qry->fetch_array() as $k => $val){
		$$k=$val;
	}

	$comments = $conn->query("SELECT c.*,u.username,u.email FROM comments c inner join users u on u.id = c.user_id where c.topic_id= ".$_GET['id']." order by unix_timestamp(c.date_created) asc");
	$com_arr= array();

	while($row= $comments->fetch_assoc())
	{
		$com_arr[] = $row;
	}

	$replies = $conn->query("SELECT r.*,u.username,u.email FROM replies r inner join users u on u.id = r.user_id where r.comment_id in (SELECT id FROM comments where topic_id= ".$_GET['id'].") order by unix_timestamp(r.date_created) asc");
	$rep_arr= array();

	while($row= $replies->fetch_assoc())
	{
		$rep_arr[$row['comment_id']][] = $row;
	}

	if($user_id != $_SESSION['login_id'])
	{
		$chk = $conn->query("SELECT * FROM forum_views WHERE topic_id=$id AND user_id='{$_SESSION['login_id']}'")->num_rows;
		if($chk <= 0)
		{
			$conn->query("INSERT INTO forum_views SET  topic_id=$id , user_id='{$_SESSION['login_id']}'");
		}
	}

	$view = $conn->query("SELECT * FROM forum_views WHERE topic_id=$id")->num_rows;
	$tags = array();	

	if(!empty($category_ids))
	{
		$tag = $conn->query("SELECT * FROM categories where id in ($category_ids) order by name asc");
		while($row= $tag->fetch_assoc()):
			$tags[$row['id']] = $row['name'];
		endwhile;
	}
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
							<li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Comment</a></li>
							<li class="breadcrumb-item active" aria-current="page">Overview</li>
						</ol>
					</nav>
					<h1 class="page-header-title">Comment</h1>
				</div>
				<!-- End Col -->
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
					<!-- Step Item -->
					<li class="step-item">
						<div class="step-content-wrapper">
							<div class="step-content">
								<div style="display: flex; justify-content: space-between;">
									<h4 class="mb-2"><?= ucwords($username) ?></h4>
									<p class="fs-5 mb-1"><a class="text-uppercase" href="#"><i class="bi bi-calendar-week"></i> <?= date('M d, Y h:i A',strtotime($date_created)) ?></a></p>
								</div>

								<ul class="list-group list-group-sm">
									<!-- List Item -->
									<li class="list-group-item">
										<div class="row gx-1">
											<div class="col-sm-12 mb-1">
												<div style="display: flex; justify-content: space-between;">
												<h4><?= $title ?></h4>
												<?php foreach(explode(',',$category_ids) as $t): ?>
													<?= '<p style="margin-bottom: 0"><i class="bi-patch-check-fill text-primary"></i><b> Tag : '.$tags[$t]; ?>
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
												<?= html_entity_decode($content) ?>
											</div>

										</div>
									</li>
									<!-- End List Item -->
								</ul>
							</div>
						</div>
					</li>

					<!-- End Step Item -->
					<li class="step-item">
						<div class="step-content-wrapper">
							<div class="step-content">
								<form id="manage-comment" action="">
									<!-- Form -->
									<div class="row">
										<label class="form-label">Description <span class="form-label-secondary">(Optional)</span></label>
										<div class="col-sm-12">
											<!-- Quill -->
											<div class="quill-custom">
												<div class="js-quill" id="content-description" style="height: 10rem;" data-hs-quill-options='{
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
									<input type="hidden" name="id" value="">
									<input type="hidden" name="topic_id" value="<?php echo isset($id) ? $id : '' ?>">

									<div class="d-flex justify-content-end mt-3">
										<div class="d-flex gap-3">
											<button type="submit" class="btn btn-primary">Save comment</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</li>
					<!-- End Step Item -->

					<?php foreach($com_arr as $row): ?>
					<!-- Step Item -->
					<li class="step-item">
						<div class="step-content-wrapper">
							<div class="step-avatar">
								<img class="step-avatar" src="./assets/img/160x160/img1.jpg" alt="Image Description">
							</div>

							<div class="step-content">
								<div style="display: flex; justify-content: space-between;">
									<h5 class="mb-2"><?= ucwords($row['username']) ?></h5>
									<p class="fs-5 mb-1"><a class="text-uppercase" href="#"><i class="bi bi-calendar-week"></i> <?= date('M d, Y h:i A',strtotime($row['date_created'])) ?></a></p>
								</div>

								<?php if($_SESSION['login_id'] == $row['user_id'] || $_SESSION['login_type'] == 1): ?>
									<div class="col-sm-12">
										<div class="d-flex">
											<div class="h5" style="margin-left: 3px">
												<span class="badge bg-soft-danger text-danger rounded-pill">
													<a class="delete_comment" href="javascript:void(0)" data-id="<?= $row['id']; ?>" style="color: rgba(var(--bs-danger-rgb),var(--bs-text-opacity))!important;"><i class="bi-trash me-1"></i> Delete</a>
												</span> 
											</div>
										</div>
									</div>
								<?php endif; ?>

								<ul class="list-group list-group-sm">
									<!-- List Item -->
									<li class="list-group-item">
									<div class="row gx-1">
										<div class="col-sm-9 mb-5">
											<?= html_entity_decode($row['comment']) ?>
										</div>
									</div>
									<!-- End Row -->
									</li>
									<!-- End List Item -->
								</ul>
							</div>
						</div>
					</li>
					<!-- End Step Item -->
					<?php endforeach; ?>
				</ul>
				<!-- End Step -->
			</div>
		</div>
    </div>
    <!-- End Content -->
</main>

<?php include 'footer.php' ?>

<script>
	$('.delete_topic').click(function(){
		_conf("Are you sure to delete this topic?","delete_topic",[$(this).attr('data-id')],'mid-large')
	})
	function delete_topic($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_topic',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	$('.delete_comment').click(function(){
        var comment_id = $(this).data('id');
        var confirmation = confirm("Are you sure you want to delete this comment?");
        if (confirmation) {
            $.ajax({
                type: "POST",
                url: 'ajax.php?action=delete_comment',
                data: {id:comment_id},
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

	$('#manage-comment').submit(function(e){
		e.preventDefault()
		
		if ($("#content-description").length) {
			var html = $('#content-description').children().first().html();
		}

		var formData = $(this).serializeArray();
		formData.push({ name: 'comment', value: html });

		console.log(formData);
		$.ajax({
			url:'ajax.php?action=save_comment',
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
		})
	})

    // $('.delete_topic').click(function(){
    //     _conf("Are you sure to delete this topic?","delete_topic",[$(this).attr('data-id')],'mid-large')
    // })

    // function delete_topic($id){
    //     start_load()
    //     $.ajax({
    //         url:'ajax.php?action=delete_topic',
    //         method:'POST',
    //         data:{id:$id},
    //         success:function(resp){
    //             if(resp==1){
    //                 alert_toast("Successfully deleted",'success')
    //                 setTimeout(function(){
    //                     location.reload()
    //                 },1500)

    //             }
    //         }
    //     })
    // }

    // $('.delete_reply').click(function(){
    //     _conf("Are you sure to delete this reply?","delete_reply",[$(this).attr('data-id')],'mid-large')
    // })

    // function delete_reply($id){
    //     start_load()
    //     $.ajax({
    //         url:'ajax.php?action=delete_reply',
    //         method:'POST',
    //         data:{id:$id},
    //         success:function(resp){
    //             if(resp==1){
    //                 alert_toast("Successfully deleted",'success')
    //                 setTimeout(function(){
    //                     location.reload()
    //                 },1500)

    //             }
    //         }
    //     })
    // }
</script>
