<!DOCTYPE html>
<html lang="en">
    <?php include("../header.php"); 
    $main_page = 'Announcement';
    $sub_page = 'Add';
    ?>
	<body class="menubar-hoverable header-fixed ">

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
							<li class="active">Create</li>
						</ol>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
							<div class="card-head card-head-lg style-primary ">
								<header>Create Annoucement Form</header>
							</div>
							<div class="card-body">
								<form class="form-horizontal" role="form">

									<div class="row">
										<div class="col-lg-2">
											<!-- NULL -->
										</div>
										<div class="col-lg-4">
											<div class="form-group">
												<label for="txtEmployeeID" class="col-sm-3 control-label text-bold">Topic Name</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" id="txtTopicName" >
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
												<label for="txtType" class="col-sm-3 control-label text-bold">Announcement Type</label>
												<div class="col-sm-6">
													<select id="ddlType" name="ddlType" class="form-control">
														<option value="">&nbsp;</option>
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
													<textarea rows="10" class="form-control" id="txtDetail"> </textarea> 
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
													<input type="text" class="form-control" id="txtUpdateBy" >
												</div>
											</div>
										</div>
									</div>

							</div>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 text-right">
							<button type="button" class="btn btn-danger btn-lg" style="margin-right: 10px;" id="btnReset">Reset</button>
							<button type="button" class="btn btn-primary btn-lg" id="btnSubmit">Submit</button>
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
    <?php include '../footer.php';?>
    </footer>
    <!-- END FOOTER -->

    <!-- BEGIN SCRIPT -->
	<script type="text/javascript">
		/* SUBMIT BUTTON ONCLICK EVENT */
		$("#btnSubmit").click(function(){
			if(RequiredField()){
				/* INSERT TO DATABASE EVENT*/
				$.ajax({
	               type: "POST",
	               url: "php/Insert.php",
	               data: {
	               		Topic: $('#txtTopicName').val(),
		                Type: $('#ddlType').val(),
		                Detail: $('#txtDetail').val(),
		                UpdateBy: $('#txtUpdateBy').val(),
			                
		            },
	               success: function(response){                    
	                   	if(response == 1){
	                   		alert("Announcement created success");
	                   		location.reload();
	                   	}
	                   	else{
	                   		alert("Error log : " + response);
	                   	}
	               }
       			});
			}
		});

		/* RESET BUTTON ONCLICK EVENT */
		$("#btnReset").click(function(){
			$('#txtTopicName').val(""); 
			$('#ddlType').val(""); 
			$('#txtDetail').val("");
			$('#txtUpdateBy').val(""); 
		});

		/* TEXTBOX CHECKING */
		function RequiredField(){
				if( $('#txtTopicName').val() == ""){
					alert("Please fill Topic Name");
					return false;
				}
				else if($('#ddlType').val() == ''){
					alert("Please select Announcement Type");
					return false;
				}
				else if($('#txtDetail').val() == ''){
					alert("Please fill Detail");
					return false;
				}
				else if($('#txtUpdateBy').val() == ''){
					alert("Please fill Update Name");
					return false;
				}
				else{
					return true;
				}
		}
	</script>
	<!-- END SCRIPT -->

</html>

