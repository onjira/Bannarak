<!DOCTYPE html>
<html lang="en">
    <?php include("../header.php"); 
	$main_page = 'Announcement';
    $sub_page = 'view';
    ?>
	<body class="menubar-hoverable header-fixed ">
		<form id="frmViewAnnouncement">
		<!-- BEGIN HEADER-->
		<?php include '../headerbar.php';?>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">
			<!-- BEGIN CONTENT-->
			<div id="content">
				<section>
					<div class="section-header">
						<ol class="breadcrumb">
							<li>Announcement</li>
							<li class="active">View and Edit</li>
						</ol>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
							<div class="card-body">
									<div class="row">
										<div class="col-lg-1 text-center btn-lg" style="margin-top:15px;">
											<i class="fa fa-search"></i>
										</div>
									<div class="col-lg-2">
										<form class="form">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="txtTopic">
												<label for="txtTopic">Topic</label>
											</div>
										</form>
									</div>
									<div class="col-lg-2">
										<form class="form">
											<select id = "ddlType" class ="form-control" style="margin-top:16px; "  >
												<option value=""><label> (select type) </label></option>
												<option value="News">News</option>
												<option value="Announcement">Announcement</option>
												<option value="Activity">Activity</option>
											</select>
										</form>
									</div>
									<div class="col-lg-2">
										<form class="form">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="txtStartFrom" name="datepicker">
												<label for="txtStartFrom">Start Date</label>
											</div>
										</form>
									</div>
									<div class="col-lg-2">
										<form class="form">
											<div class="form-group floating-label">
												<input type="text" class="form-control" id="txtStartTo" name="datepicker">
												<label for="txtStartTo">End Date</label>
											</div>
										</form>
									</div>
									<div class="col-lg-1 text-center text-xl">
										<button type="submit" class="btn btn-flat btn-primary ink-reaction"
										style="margin-top: 15px; margin-left: 20px;" id="btnSearch">Search</button>	
									</div>
								</div>
									</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-head card-head-lg style-primary">
									<header>Information</header>
								</div>
								<div class="card-body">
									<table class="table table-hover" id="tbFromQuery">
									  	<tr class='text-bold'><td class = 'num'>ID</td><td>Topic</td><td>Type</td><td>Detail</td><td>Date</td><td>By</td></tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<?php
		        include '../menubar.php';
		    ?>
			<!-- END MENUBAR -->
		</div>
		<!-- END BASE -->
	</form>
	</body>

	<!-- BEGIN FOOTER -->
	<footer>
	<?php include '../footer.php';
	?>
	</footer>
	<!-- END FOOTER -->

	<!-- BEGIN SCRIPT-->
	<script>

		/* SEARCH BUTTON ONCLICK EVENT */
		$('#btnSearch').click(function(){
			/* Filter Checking */
			var Topic = "",Type = "",StartFrom = "",StartTo = "";
			if($('#txtTopic').val() != "") Topic = $('#txtTopic').val();
			if($('#ddlType').val() != "") Type = $('#ddlType').val();
			if($('#txtStartFrom').val() != "") 	StartFrom = $('#txtStartFrom').val();
			if($('#txtStartTo').val() != "") 	StartTo = $('#txtStartTo').val();

			/*Search Event (ajax call 'php/Search.php')*/
			$.ajax({
				type: "POST",
				url: "php/Search.php",
				data: { 
						Topic: Topic,
						Type: Type,
						StartFrom: StartFrom,
						StartTo: StartTo
					},
				success: function(response){
					$('#tbFromQuery').html(response);
					console.log(response);
				}
			});
		});

		/* UPDATE BUTTON ONCLICK EVENT */
		function toEdit( AnnouncementID ){
			$('#frmViewAnnouncement').attr('action','edit.php');
			$('#frmViewAnnouncement').attr('method','GET');
			$('#frmViewAnnouncement').append("<input type='hidden' name='AnnouncementID' value='"+AnnouncementID+"' />");
			$('#frmViewAnnouncement').submit();
		}

	</script>
	<!-- END SCRIPT -->
</html>

