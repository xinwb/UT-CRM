<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:58:"D:\phpStudy\WWW\jxc\public/../app/view\location\index.html";i:1520818621;s:40:"D:\phpStudy\WWW\jxc\app\view\layout.html";i:1514905474;s:47:"D:\phpStudy\WWW\jxc\app\view\public\header.html";i:1520320449;s:45:"D:\phpStudy\WWW\jxc\app\view\public\menu.html";i:1520487435;s:47:"D:\phpStudy\WWW\jxc\app\view\public\footer.html";i:1520314781;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>UT仓库管理</title>

	<!-- <link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic">  -->
	<!-- <link rel="stylesheet" href="__JUNYUE__/static/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="__JUNYUE__/static/css/fonts/fontawesome/css/font-awesome.min.css">
 -->
	<link rel="stylesheet" href="__JUNYUE__/static/css/bootstrap.css">
	<link rel="stylesheet" href="__JUNYUE__/static/css/xenon-core.css">
	<link rel="stylesheet" href="__JUNYUE__/static/css/xenon-forms.css">
	<link rel="stylesheet" href="__JUNYUE__/static/css/xenon-components.css">
	<link rel="stylesheet" href="__JUNYUE__/static/css/xenon-skins.css">
	<link rel="stylesheet" href="__JUNYUE__/static/css/custom.css">
    <link href="__JUNYUE__/static/css/font-awesome.css" rel="stylesheet">
	<script src="__JUNYUE__/static/js/jquery-1.11.1.min.js"></script>

	<!-- toast -->
	<link rel="stylesheet" type="text/css" href="__JUNYUE__/static/js/toastr/toastr.css" />
	<script type="text/javascript" src="__JUNYUE__/static/js/toastr/toastr.js"></script>


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
</head>
<body class="page-body">



	<!-- settings -->
	<div class="settings-pane">
			
		<a href="#" data-toggle="settings-pane" data-animate="true">
			&times;
		</a>
		
		<div class="settings-pane-inner">
			
			<div class="row">
				
				<div class="col-md-4">
					
					<div class="user-info">
						
						<div class="user-image">
							<a href="extra-profile.html">
								<img src="__JUNYUE__/static/images/user-2.png" class="img-responsive img-circle" />
							</a>
						</div>
						
						<div class="user-details">
							
							<h3>
								<a href="extra-profile.html"><?php echo $my_info->truename; ?></a>
								
								<!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
								<span class="user-status is-online"></span>
							</h3>
							
							<p class="user-title"><?php echo $my_info->username; ?></p>
							
							<div class="user-links">
								<a href="extra-profile.html" class="btn btn-primary">编辑资料</a>
								<a href="extra-profile.html" class="btn btn-success">升级</a>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
				<!-- <div class="col-md-8 link-blocks-env">
					
					<div class="links-block left-sep">
						<h4>
							<span>通知</span>
						</h4>
						
						<ul class="list-unstyled">
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
								<label for="sp-chk1">消息</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
								<label for="sp-chk2">事件</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
								<label for="sp-chk3">更新</label>
							</li>
							<li>
								<input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
								<label for="sp-chk4">服务器的正常运行时间</label>
							</li>
						</ul>
					</div>
					
					<div class="links-block left-sep">
						<h4>
							<a href="#">
								<span>帮助</span>
							</a>
						</h4>
						
						<ul class="list-unstyled">
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									支持中心
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									反馈意见
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									隐私政策
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa-angle-right"></i>
									服务条款
								</a>
							</li>
						</ul>
					</div>
					
				</div> -->
				
			</div>
		
		</div>
		
	</div>
	<!-- end - settings -->

	
	<div class="page-container">
	<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				
				<header class="logo-env">
					
					<!-- logo -->
					<div class="logo">
						<h4 style="color:#ffffff; font-weight: bold;">UT企业管理系统</h4>
					</div>
					
					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">7</span>
						</a>

						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>

					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<div class="settings-icon">
						<a href="#" data-toggle="settings-pane" data-animate="true">
							<i class="linecons-cog"></i>
						</a>
					</div>

				</header>

				<!-- 菜单 -->
				<?php
$request= \think\Request::instance();

?>
				<ul id="main-menu" class="main-menu">

					<?php if(is_array($_menuList['father']) || $_menuList['father'] instanceof \think\Collection || $_menuList['father'] instanceof \think\Paginator): $i = 0; $__LIST__ = $_menuList['father'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li>
							<a href="<?php echo url($vo->controller.'/'.$vo->action); ?>">
								<i class="<?php echo $vo['ico']; ?>"></i>
								<span class="title"><?php echo $vo['name']; ?></span>
							</a>
							<?php if($vo['controller'] == ''): ?>
							<ul>
							<?php if(is_array($_menuList['child']) || $_menuList['child'] instanceof \think\Collection || $_menuList['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $_menuList['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;if($vv['pid'] == $vo['id']): ?>
									<li class=" <?php echo $vv->controller; ?>-<?php echo $vv->action; ?>">
										<a href="<?php echo url($vv->controller.'/'.$vv->action); ?>"><span class="title"><?php echo $vv['name']; ?></span></a>
									</li>
								<?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
			
					<!-- <li>
			            <a href="#" class="menu-dropdown">
			                <i class="menu-icon fa fa-user"></i>
			                <span class="menu-text">系统设置</span>
			                <i class="menu-expand"></i>
			            </a>
			            <ul class="submenu">
			                <li>
			                    <a href="http://localhost/junyue/Public/index.php/admin/lst.html">
			                                    <span class="menu-text">
			                                        员工管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			        </li>

			        <li>
			            <a href="#" class="menu-dropdown">
			                <i class="menu-icon fa fa-file"></i>
			                <span class="menu-text">仓库作业</span>
			                <i class="menu-expand"></i>
			            </a>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Instorage/index'); ?>">
			                                    <span class="menu-text">
			                                        入库管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Outstorage/index'); ?>">
			                                    <span class="menu-text">
			                                        出库管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Product/lists'); ?>">
			                                    <span class="menu-text">
			                                        查询管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			        </li>

			        <li>
			            <a href="#" class="menu-dropdown">
			                <i class="menu-icon fa fa-file-text"></i>
			                <span class="menu-text">基本设置</span>
			                <i class="menu-expand"></i>
			            </a>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Storage/index'); ?>">
			                                    <span class="menu-text">
			                                        仓库管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Location/index'); ?>">
			                                    <span class="menu-text">
			                                        库位管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Supplier/index'); ?>">
			                                    <span class="menu-text">
			                                        供应商管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Customer/index'); ?>">
			                                    <span class="menu-text">
			                                        客户管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Unit/index'); ?>">
			                                    <span class="menu-text">
			                                        计量单位                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Category/index'); ?>">
			                                    <span class="menu-text">
			                                        物料类别                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Product/index'); ?>">
			                                    <span class="menu-text">
			                                        物料管理                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			        </li> -->

			        <!-- <li>
			            <a href="#" class="menu-dropdown">
			                <i class="menu-icon fa fa-chain"></i>
			                <span class="menu-text">友情连接</span>
			                <i class="menu-expand"></i>
			            </a>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('link/lst'); ?>">
			                                    <span class="menu-text">
			                                        链接列表                                    </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			        </li>

			        <li>
			            <a href="#" class="menu-dropdown">
			                <i class="menu-icon fa fa-gear"></i>
			                <span class="menu-text">系统</span>
			                <i class="menu-expand"></i>
			            </a>
			            <ul class="submenu">
			                <li>
			                    <a href="<?php echo url('Conf/conf'); ?>">
			                                    <span class="menu-text">
			                                        配置项                               </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			                <li>
			                    <a href="<?php echo url('Conf/lst'); ?>">
			                                    <span class="menu-text">
			                                        配置列表                                   </span>
			                        <i class="menu-expand"></i>
			                    </a>
			                </li>
			            </ul>
			        </li> -->
				</ul>

<script>
	var className = '<?php echo $request->controller(); ?>-<?php echo $request->action(); ?>'
	$("."+className).addClass('active');
	$("."+className).parent().parent().addClass('active open');
	$("."+className).parent().show();
</script>

			</div>

		</div>


		<div class="main-content">

			<!-- User Info, Notifications and Menu Bar -->
			<nav class="navbar user-info-navbar" role="navigation">

				<!-- 通知类的东西 -->
				<ul class="user-info-menu left-links list-inline list-unstyled">

					<!-- <li class="hidden-sm hidden-xs">
						<a href="#" data-toggle="sidebar">
							<i class="fa-bars"></i>
						</a>
					</li>

					<li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-envelope-o"></i>
							<span class="badge badge-green">15</span>
						</a>

						<ul class="dropdown-menu messages">
							<li>

								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">

									<li class="active">
										<a href="#">
											<span class="line">
												<strong>吕克Chartier</strong>
												<span class="light small">- 昨天</span>
											</span>

											<span class="line desc small">
												这不是我们的第一个项目，它是其余最好的.
											</span>
										</a>
									</li>

									<li class="active">
										<a href="#">
											<span class="line">
												<strong>萨尔玛Nyberg</strong>
												<span class="light small">- 2天前</span>
											</span>

											<span class="line desc small">
												哦，他果断地认为友谊如此依恋一切.
											</span>
										</a>
									</li>

									<li>
										<a href="#">
											<span class="line">
												海登卡特赖特
												<span class="light small">- 一个星期前</span>
											</span>

											<span class="line desc small">
												谁是她的新主人。如果你需要同样的怀疑.
											</span>
										</a>
									</li>

									<li>
										<a href="#">
											<span class="line">
												桑德拉艾伯
												<span class="light small">- 16天前</span>
											</span>

											<span class="line desc small">
												所以注意必须按规定否则存在的方向.
											</span>
										</a>
									</li>
								</ul>
								
							</li>
							
							<li class="external">
								<a href="blank-sidebar.html">
									<span>查看全部</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>
						</ul>
					</li>
					

					<li class="dropdown hover-line">
						<a href="#" data-toggle="dropdown">
							<i class="fa-bell-o"></i>
							<span class="badge badge-purple">7</span>
						</a>
							
						<ul class="dropdown-menu notifications">
							<li class="top">
								<p class="small">
									<a href="#" class="pull-right">马克都读</a>
									你有 <strong>3</strong> 新通知.
								</p>
							</li>
							
							<li>
								<ul class="dropdown-menu-list list-unstyled ps-scrollbar">
									<li class="active notification-success">
										<a href="#">
											<i class="fa-user"></i>
											
											<span class="line">
												<strong>新用户注册</strong>
											</span>
											
											<span class="line small time">
												30秒前
											</span>
										</a>
									</li>
									
									<li class="active notification-secondary">
										<a href="#">
											<i class="fa-lock"></i>
											
											<span class="line">
												<strong>隐私设置已更改</strong>
											</span>
											
											<span class="line small time">
												3小时的针
											</span>
										</a>
									</li>
									
									<li class="notification-primary">
										<a href="#">
											<i class="fa-thumbs-up"></i>
											
											<span class="line">
												<strong>有人特别喜欢这个</strong>
											</span>
											
											<span class="line small time">
												2分钟前
											</span>
										</a>
									</li>
									
								</ul>
							</li>
							
							<li class="external">
								<a href="#">
									<span>查看全部通知</span>
									<i class="fa-link-ext"></i>
								</a>
							</li>
						</ul>
					</li>
					
				</ul> -->
				
				
				
				<ul class="user-info-menu right-links list-inline list-unstyled">
					
					<!-- <li class="search-form">
						
						<form method="get" action="extra-search.html">
							<input type="text" name="s" class="form-control search-field" placeholder="关键字..." />
							
							<button type="submit" class="btn btn-link">
								<i class="linecons-search"></i>
							</button>
						</form>
						
					</li> -->
					
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown" >
							<img src="__JUNYUE__/static/images/admin.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								<?php echo $my_info->truename; ?>
								<i class="fa-angle-down"></i>
							</span>
						</a>
						
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<!-- <li>
								<a href="#edit-profile">
									<i class="fa-edit"></i>
									新的岗位
								</a>
							</li>
							<li>
								<a href="#settings">
									<i class="fa-wrench"></i>
									设置
								</a>
							</li>
							<li>
								<a href="#profile">
									<i class="fa-user"></i>
									资料
								</a>
							</li>
							<li>
								<a href="#help">
									<i class="fa-info"></i>
									帮助
								</a>
							</li> -->
							<li class="last">
								<a href="<?php echo url('Login/quit'); ?>">
									<i class="fa-lock"></i>
									注销
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
				
			</nav>
			<script>
			jQuery(document).ready(function($)
			{
				$('a[href="#layout-variants"]').on('click', function(ev)
				{
					ev.preventDefault();
					
					var win = {top: $(window).scrollTop(), toTop: $("#layout-variants").offset().top - 15};
					
					TweenLite.to(win, .3, {top: win.toTop, roundProps: ["top"], ease: Sine.easeInOut, onUpdate: function()
						{
							$(window).scrollTop(win.top);
						}
					});
				});
			});
			</script>
 

    <!-- Imported scripts on this page -->
    <script src="__JUNYUE__/static/js/rwd-table/js/rwd-table.min.js"></script>
    <script src="__JUNYUE__/static/js/datatables/js/jquery.dataTables.min.js"></script>

    <!-- <link rel="stylesheet" href="/static/css/xenon-forms.css"> -->

    <!-- Imported scripts on this page -->
    <script src="__JUNYUE__/static/js/datatables/dataTables.bootstrap.js"></script>
    <script src="__JUNYUE__/static/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
    <script src="__JUNYUE__/static/js/datatables/tabletools/dataTables.tableTools.min.js"></script>

<div class="page-title">  
    
    <div class="breadcrumb-env pull-left">
        
        <ol class="breadcrumb bc-1">
            <li>
                <a href="<?php echo url('Location/index'); ?>"><i class="fa-home"></i>首页</a>
            </li>
            <li>
                <a href="">基本设置</a>
             </li>
            <li class="active">
                <strong>库位管理</strong>
            </li>
        </ol>
                    
    </div>       
</div>



<div class="row">
                <div class="col-md-12">
                

<!-- ******************************************************************************************************** -->                        


            
            <!-- Removing search and results count filter -->
            <div class="panel panel-default">
                <div class="panel-heading btn-toolbar">
                    <!-- <h3 class="panel-title">员工列表</h3> -->
                    <div class="btn-group focus-btn-group">
                        <button class="btn btn-default btn-primary" onclick="showAjaxModal();">
                            <span class="fa-plus"></span> 添 加
                        </button>
                    </div>

                    <div class="btn-group dropdown-btn-group pull-right">
                        
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">过滤某列数据
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="checkbox-row">
                                <div class="cbr-replaced cbr-checked">
                                    <div class="cbr-input">
                                        <input type="checkbox" name="toggle-id916bcee584545-col-1" id="toggle-id916bcee584545-col-1" value="id916bcee584545-col-1" class="cbr cbr-done"></div>
                                    <div class="cbr-state">
                                        <span></span>
                                    </div>
                                </div>
                                <label for="toggle-id916bcee584545-col-1">用户名</label>
                            </li>
                        </ul>
                        <form action="<?php echo url('Excel/locInto'); ?>" enctype="multipart/form-data" method="post">
                            <input  type="file" class="btn btn-default" name="file_stu"/>
                            <input type="submit" class="btn btn-default" value="导入" />
                        </form>
                        <form action="<?php echo url('Excel/locExport'); ?>" enctype="multipart/form-data" method="post" >
                            <input type="submit" class="btn btn-default" value="导出">
                        </form>
                    </div>                    

                </div>
                <div class="panel-body">
                    

        
    

                    <!-- searach -->
                    <div class="btn-toolbar">

                        <form class="form-inline" style="margin-bottom:15px;" class="search-tool">
                            <span>
                                <label class="control-label">库位名称</label>   
                                <input type="text" class="form-control" placeholder="仓库名称" name="name" value="<?php echo \think\Request::instance()->get('name'); ?>"> 
                            </span>
                            
                            <span style="margin-left: 15px;">
                                <label class="control-label">库位编号</label>      
                                <input type="text" class="form-control" placeholder="仓库编号" name="sn" value="<?php echo \think\Request::instance()->get('sn'); ?>">
                            </span>

                            <span style="margin-left: 15px;">
                                <label class="control-label">所属仓库</label>
                                <select class="form-control" name="storage">
                                    <option value="0">全部</option>
                                    <?php if(is_array($storage) || $storage instanceof \think\Collection || $storage instanceof \think\Paginator): $i = 0; $__LIST__ = $storage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo->id; ?>" 
                                            <?php if(\think\Request::instance()->get('storage') == $vo['id']): ?> selected="selected" <?php endif; ?> >
                                            <?php echo $vo['name']; ?>
                                        </option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>   
                            </span>

                            <span style="margin-left: 15px;">
                                <label class="control-label">库位状态</label>
                                <select class="form-control" name="status">
                                    <option value="" 
                                        <?php if(\think\Request::instance()->get('status') == ' '): ?> selected="selected" <?php endif; ?>
                                    >全部</option>
                                    <option value="0" 
                                        <?php if(\think\Request::instance()->get('status') == '0'): ?> selected="selected" <?php endif; ?>
                                    >正常</option>
                                    <option value="1" 
                                        <?php if(\think\Request::instance()->get('status') == '1'): ?> selected="selected" <?php endif; ?>
                                    >废弃</option>
                                </select>   
                            </span>

                            <span style="margin-left: 15px;">
                                <button class="btn btn-default btn-primary" type="submit" style="margin-top:10px;">
                                    <span class="fa-search"></span> 搜 索
                                </button> 
                            </span>
                        
                        </form>
                        
                    </div>
                    <!-- searach -->


                    <script type="text/javascript">
                    jQuery(document).ready(function($)
                    {
                        $("#example-2").dataTable({
                            dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                            dom: "t" + "<'row'<'col-xs-6'><'col-xs-6'>>",
                            aoColumns: [
                                {bSortable: false},
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                {bSortable: false}
                            ],
                        });
                        
                        // Replace checkboxes when they appear
                        var $state = $("#example-2 thead input[type='checkbox']");
                        
                        $("#example-2").on('draw.dt', function()
                        {
                            cbr_replace();
                            
                            $state.trigger('change');
                        });
                        
                        // Script to select all checkboxes
                        $state.on('change', function(ev)
                        {
                            var $chcks = $("#example-2 tbody input[type='checkbox']");
                            
                            if($state.is(':checked'))
                            {
                                $chcks.prop('checked', true).trigger('change');
                            }
                            else
                            {
                                $chcks.prop('checked', false).trigger('change');
                            }
                        });
                    });
                    </script>
                    

                    <table class="table table-bordered table-striped" id="example-2">
                        <thead>
                            <tr>
                                <th class="no-sorting">
                                    <input type="checkbox" class="cbr">
                                </th>
                                <th>ID</th>
                                <th>仓库编号</th>
                                <th>仓库名称</th>
                                <th>所属仓库</th>
                                <th>状态</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        
                        <tbody class="middle-align">
                        
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>

                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td> #<?php echo $user['id']; ?> </td>
                                <td> <?php echo $user['sn']; ?> </td>
                                <td> <?php echo $user['name']; ?> </td>
                                <td> <?php echo $user->findStorage->name; ?> </td>
                                <td> <?php echo $user['status']==0?'正常':'废弃'; ?> </td>
                                <td> <?php echo date('Y-m-d H:i:s',$user->add_time); ?> </td>
                                <td>
                                    <a href="javascript:;" 
                                        class="btn btn-secondary btn-sm btn-icon icon-left" 
                                        onclick="editAjaxModal('<?php echo url('/Location/edit/id/'.$user->id); ?>')" >
                                        编辑
                                    </a>
                                    
                                    <a ref="javascript:;" class="btn btn-danger btn-sm btn-icon icon-left" onclick="del('<?php echo $user['id']; ?>')">
                                        删除
                                    </a>

                                </td>
                            </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_info" id="example-3_info" role="status" aria-live="polite"> 共<?php echo count( $list ); ?> 行数据</div></div>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="example-3_paginate">

                            </div>
                        </div>
                    </div>                  

                </div>
            </div>



<!-- *********************************************************************************************************************** -->


    <!-- Modal add (Ajax Modal)-->
    <div class="modal fade " id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">添加库位</h4>
                </div>
                
                <div class="modal-body">
                    Content is loading...
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-info" onclick="add_from()">确定</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit (Ajax Modal)-->
    <div class="modal fade " id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">编辑库位</h4>
                </div>
                
                <div class="modal-body">
                    Content is loading...
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-info" onclick="edit_from()">确定</button>
                </div>
            </div>
        </div>
    </div>    

<script type="text/javascript">
    //add
    function showAjaxModal(){
        jQuery('#modal-add').modal('show', {backdrop: 'static'});
        
        jQuery.ajax({
            url: "<?php echo url('Location/create'); ?>",
            success: function(response)
            {
                jQuery('#modal-add .modal-body').html(response);
            }
        });
    }

    function add_from(){
        var res = $(".add-form").serializeArray();

        $.post("<?php echo url('Location/save'); ?>", res,function(data){
            if( data.error>0 ){
                toastr.error( data.msg );  
            }else{
                toastr.success( data.msg );  
                jQuery('#modal-add').modal('hide');
                location.reload();
            }
        }, "json");

    }

    //edit
    function editAjaxModal(url){
        jQuery('#modal-edit').modal('show', {backdrop: 'static'});
        
        jQuery.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal-edit .modal-body').html(response);
            }
        });
    }
    function edit_from(){
        var res = $(".edit_from").serializeArray();

        $.post("<?php echo url('Location/update'); ?>", res,function(data){
            if( data.error>0 ){
                toastr.error( data.msg );  
            }else{
                toastr.success( data.msg );  
                jQuery('#modal-edit').modal('hide');
                location.reload();
            }
        }, "json");

    }

    //del
    function del(id){
        if( confirm("确定要删除吗？") ){
            $.post("<?php echo url('Location/delete'); ?>", {id:id},function(data){
                if( data.error>0 ){
                    toastr.error( data.msg );  
                }else{
                    toastr.success( data.msg );  
                    location.reload();
                }
            }, "json");
        } 

    }
</script>
			<!-- Main Footer -->

			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1" >
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<!-- <div class="footer-text">
						&copy; 2014 
						<strong>Xenon</strong> 
						More Templates <a href="http://www.xmwxgn.com/" target="_blank" title="无限光年网络学院">无限光年网络学院</a> - Collect from <a href="http://www.xmwxgn.com/" title="网页模板" target="_blank">网页模板</a>
					</div> -->
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>
		
			
		
		
	</div>
	
	



	<!-- Bottom Scripts -->
	<script src="__JUNYUE__/static/js/bootstrap.min.js"></script>
	<script src="__JUNYUE__/static/js/TweenMax.min.js"></script>
	<script src="__JUNYUE__/static/js/resizeable.js"></script>
	<script src="__JUNYUE__/static/js/joinable.js"></script>
	<script src="__JUNYUE__/static/js/xenon-api.js"></script>
	<script src="__JUNYUE__/static/js/xenon-toggles.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="__JUNYUE__/static/js/xenon-custom.js"></script>

</body>
</html>