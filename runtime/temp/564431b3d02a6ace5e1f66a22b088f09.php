<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"D:\phpStudySetup\PHPTutorial\WWW\junyue\public/../app/view\category\create.html";i:1514978626;}*/ ?>





<form class="validate add-form" novalidate="novalidate">

	<div class="row">	
		<div class="col-md-12">
			
			<div class="form-group">
				<label for="field-2" class="control-label">类别名称</label>
				
				<input type="text" class="form-control" name="name" placeholder="类别名称" >
			</div>	
		
		</div>
	</div>


	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">上级分类</label>
                <select class="form-control" name="pid">
                    <option value="0"  >默认</option> 

                    <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </select>  
			</div>	
		</div> 
		<div class="col-md-6">
			<div class="form-group">
                <label class="control-label">类别状态</label>
                <select class="form-control" name="status">
                    <option value="0"  >正常</option>
                    <option value="1"  >废弃</option>
                </select>  
			</div>	
		</div> 
    </div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group no-margin">
				<label for="field-7" class="control-label">备注</label>
				
				<textarea class="form-control autogrow" name="desc" placeholder="备注" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
			</div>	
		</div>
	</div>

	
</form>