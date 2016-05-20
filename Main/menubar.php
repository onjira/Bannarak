<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="#">
							<span class="text-lg text-bold text-primary ">BANNARAK&nbsp;ADMIN</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

					<!-- BEGIN Employee -->
					<li class="gui-folder <?php if ($main_page == 'Announcement')echo 'active'; ?>">
						<a>
							<div class="gui-icon"><i class="md md-announcement"></i></div>
							<span class="title">Announcement</span>
						</a>
						<!--start submenu -->
						<ul>
							<li class="<?php if ($main_page == 'Announcement' && $sub_page == 'Add')echo 'active'; ?>"><a href="../Announcement/Add.php" ><span class="title">Create</span></a></li>
							<li class="<?php if ($main_page == 'Announcement' && $sub_page == 'view')echo 'active'; ?>"><a href="../Announcement/view.php" ><span class="title">View/Edit</span></a></li>
						</ul><!--end /submenu -->
					</li><!--end /menu-li -->
					<!-- END Employee -->	

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2014</span> <strong>Rtjol-Bannarak</strong>
						</small>
					</div>

				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->