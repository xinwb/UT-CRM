<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\phpStudy\PHPTutorial\WWW\junyue\public/../app/view\user\edit.html";i:1514978670;}*/ ?>
	<!-- Imported scripts on this page -->
<!-- 	<script src="/static/js/jquery-validate/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="/static/css/xenon-forms.css"> -->




<form class="validate edit_from" novalidate="novalidate">

	<div class="row">
		<div class="col-md-6">
			
			<div class="form-group">
				<label for="field-1" class="control-label">单位编号</label>
				<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
				<input type="text" class="form-control" placeholder="单位编号" value="#<?php echo $info['id']; ?>" disabled="disabled">
			</div>	
			
		</div>
		
		<div class="col-md-6">
			
			<div class="form-group">
				<label for="field-2" class="control-label">单位名称</label>
				<input type="text" class="form-control" name="name" placeholder="单位名称" value="<?php echo $info['name']; ?>">
			</div>	
		
		</div>
	</div>


	<div class="row">
		<div class="col-md-12">
			
			<div class="form-group">
                <label class="control-label">单位状态</label>
                <select class="form-control" name="status">
                    <option value="0" <?php if($info['status'] == '0'): ?> selected="selected" <?php endif; ?> >正常</option>
                    <option value="1" <?php if($info['status'] == '1'): ?> selected="selected" <?php endif; ?> >废弃</option>
                </select>  
			</div>	
		
		</div> 
    </div>


	<div class="row">
		<div class="col-md-12">
			<div class="form-group no-margin">
				<label for="field-7" class="control-label">备注</label>
				
				<textarea class="form-control autogrow" name="desc" placeholder="备注" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"><?php echo $info['desc']; ?></textarea>
			</div>	
		</div>
	</div>

	
</form>