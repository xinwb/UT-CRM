<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\phpStudy\PHPTutorial\WWW\junyue\public/../app/view\unit\create.html";i:1514978670;}*/ ?>
	<!-- Imported scripts on this page -->
<!-- 	<script src="/static/js/jquery-validate/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="/static/css/xenon-forms.css"> -->




<form class="validate add-form" novalidate="novalidate">

	<div class="row">	
		<div class="col-md-12">
			
			<div class="form-group">
				<label for="field-2" class="control-label">单位名称</label>
				
				<input type="text" class="form-control" name="name" placeholder="单位名称" >
			</div>	
		
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			
			<div class="form-group">
                <label class="control-label">单位状态</label>
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