<!DOCTYPE html>
<html lang="en">
    <?php include("../header.php");
    $main_page = 'contract';
    $sub_page = 'add';
    ?>
	<body class="menubar-hoverable header-fixed " onload = "PageLoad()">

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
							<li class="active">Edit</li>
						</ol>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
							<div class="card-head card-head-lg style-primary ">
								<header>Announcement Form</header>
							</div><div class="card-body">
								<form class="form-horizontal" role="form">
									<div class="row">
										<div class="col-lg-2">
											<!-- NULL -->
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="txtAnnouncementID" class="col-sm-3 control-label text-bold">Announcement ID</label>
												<div class="col-sm-9">
													<div class="input-group date">
														<div class="input-group-content">
															<input type="text" class="form-control" id="txtAnnouncementID" >
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-2">
											<!-- NULL -->
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="txtTopic" class="col-sm-3 control-label text-bold">Topic</label>
												<div class="col-sm-9">
													<div class="input-group date">
														<div class="input-group-content">
															<input type="text" class="form-control" id="txtTopic" >
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-2">
											<!-- NULL -->
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="ddlType" class="col-sm-3 control-label text-bold">Type</label>
												<div class="col-sm-5">
													<select id = "ddlType" class ="form-control" style="margin-top:16px; " >
														<option value=""><label> (select type) </label></option>
														<option value="News">News</option>
														<option value="Announcement">Announcement</option>
														<option value="Activity">Activity</option>
													</select>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-2">
											<!-- NULL -->
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="txtDetail" class="col-sm-3 control-label text-bold">Detail</label>
												<div class="col-sm-9">
													<div class="input-group date">
														<div class="input-group-content">
															<textarea rows="10" cols ="50" class="form-control" id="txtDetail"></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-2">
											<!-- NULL -->
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="txtUpdateBy" class="col-sm-3 control-label text-bold">Update By</label>
												<div class="col-sm-9">
													<div class="input-group date">
														<div class="input-group-content">
															<input type="text" class="form-control" id="txtUpdateBy" >
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 text-right">
							<button type="button" class="btn btn-danger btn-lg" style="margin-right: 10px;" id ="btnCancle">Cancle</button>
							<button type="button" class="btn btn-primary btn-lg" id="btnSave">Save</button>
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
	</body>

	<!-- BEGIN FOOTER -->
	<footer>
	<?php include '../footer.php';
	?>
	</footer>
	<!-- END FOOTER -->

</html>
	<!-- BEGIN SCRIPT -->
	<script>

	/* GET VALUE FROM URL*/
	function getUrlParamArray(param){
		param = param.replace(/([\[\](){}*?+^$.\\|])/g, "\\$1");
		var value = [];
		var regex = new RegExp("[?&]" + param + "=([^&#]*)", "g");
		var url   = decodeURIComponent(window.location.href);
		var match = null;
		while (match = regex.exec(url)) {
			value.push(match[1]);
		}    
		return value;
	}

	/* ON PAGE LOAD EVENT*/
	function PageLoad(){
		var AnnouncementID = getUrlParamArray("AnnouncementID")[0];
		$('#txtAnnouncementID').val(AnnouncementID);
		$('#txtAnnouncementID').attr('disabled',true);

		/* QUERY DATA FROM ANNOUNCEMENT ID */
  		$.ajax({
			type: "POST",
			url: "php/GetData.php",
			data: {AnnouncementID :AnnouncementID  },
			success: function(response){
				console.log(response);
				var data = $.parseJSON(response);
				$('#txtTopic').val(data.Announcement.Topic);
				$('#txtUpdateBy').val(data.Announcement.UpdateBy);
			    $('#ddlType').val(data.Announcement.Type);
			    $('#txtDetail').text(data.Announcement.Detail);
			}
		});
	}
	
	/* CANCLE BUTTON EVENT */
	$( '#btnCancle' ).click(function() {
		location.href = "view.php";
	});

	/* SAVE BUTTON EVENT */
	$( '#btnSave' ).click(function() {
		/* UPDATE TO DATABASE */
		$.ajax({
			type: "POST",
			url: "php/Update.php",
			data: {
				Topic:$('#txtTopic').val(),
				Type:$('#ddlType').val(),
                AnnouncementID: $('#txtAnnouncementID').val(),
                Detail: $('#txtDetail').val(),
                UpdateBy: $('#txtUpdateBy').val()
			},
			success: function(response){
				if(response == 1){
					alert("Announcement Updated Success");
					location.href = 'view.php';
				}
				else{
					alert("Error log : " + response);
				}			
			}
		});
	});
	</script>