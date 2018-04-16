<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"D:\phpStudy\WWW\jxc/app/view\product\create.html";i:1520238481;}*/ ?>
	<!-- Imported scripts on this page -->
<!-- 	<script src="/static/js/jquery-validate/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="/static/css/xenon-forms.css"> -->




<form class="validate add-form" novalidate="novalidate">

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="field-2" class="control-label">编号</label>

				<input type="text" class="form-control" name="sn" placeholder="编号" value="<?php echo uniqid(); ?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="field-2" class="control-label">名称</label>

				<input type="text" class="form-control" name="name" placeholder="名称" >
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="field-2" class="control-label">厂家编号</label>

				<input type="text" class="form-control" name="cjsn" placeholder="厂家编号" value="<?php echo uniqid(); ?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="field-2" class="control-label">型号</label>

				<input type="text" class="form-control" name="nbsn" placeholder="型号" >
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">默认类别</label>
                <select class="form-control" name="category">
                    <option value="0"  >默认</option>

                    <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">单位</label>
                <select class="form-control" name="unit">
                    <?php if(is_array($unit) || $unit instanceof \think\Collection || $unit instanceof \think\Paginator): $i = 0; $__LIST__ = $unit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
			</div>
		</div>
    </div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">仓库</label>
                <select class="form-control" name="storage">
                    <?php if(is_array($storage) || $storage instanceof \think\Collection || $storage instanceof \think\Paginator): $i = 0; $__LIST__ = $storage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">默认库位</label>
                <select class="form-control" name="location">
                    <?php if(is_array($location) || $location instanceof \think\Collection || $location instanceof \think\Paginator): $i = 0; $__LIST__ = $location;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
			</div>
		</div>
    </div>


	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">默认供应商</label>
                <select class="form-control" name="supplier">
                    <?php if(is_array($supplier) || $supplier instanceof \think\Collection || $supplier instanceof \think\Paginator): $i = 0; $__LIST__ = $supplier;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">默认客户</label>
                <select class="form-control" name="customer">
                    <?php if(is_array($customer) || $customer instanceof \think\Collection || $customer instanceof \think\Paginator): $i = 0; $__LIST__ = $customer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
			</div>
		</div>
    </div>


	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="field-2" class="control-label">规格</label>

				<input type="text" class="form-control" name="spec" placeholder="规格" value="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="field-2" class="control-label">价格</label>

				<input type="text" class="form-control" name="price" placeholder="价格" >
			</div>
		</div>
	</div>
<!--
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
                <label class="control-label">产品状态</label>
                <select class="form-control" name="status">
                    <option value="0"  >正常</option>
                    <option value="1"  >废弃</option>
                </select>
			</div>
		</div>
    </div> -->

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="field-2" class="control-label">颜色</label>

				<input type="text" class="form-control" name="color" placeholder="颜色" >
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group no-margin">
				<label for="field-7" class="control-label">备注</label>

				<textarea class="form-control autogrow" name="desc" placeholder="备注" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
			</div>
		</div>
	</div>

</form>