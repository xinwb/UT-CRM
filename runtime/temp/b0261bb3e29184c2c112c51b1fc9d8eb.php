<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\phpStudy\WWW\jxc\public/../app/view\instorage\create.html";i:1520494122;}*/ ?>



<form class="validate add-form" novalidate="novalidate">

	<div class="row">	
		<div class="col-md-12">
			<div class="form-group">
				<label for="field-2" class="control-label">编号</label>
				<input type="text" class="form-control" name="sn" placeholder="编号" value="SN<?php echo date('Ymdhis',time()); ?><?php echo rand(10000,99999); ?>">
                <!-- value="SN<?php echo date('Ymdhis',time()); ?><?php echo rand(10000,99999); ?>" -->
			</div>	
		</div>
        <div class="col-md-8"> </div>
	</div>

    <div class="row">   
        <div class="col-md-12">
            <div class="form-group">
                <label for="field-2" class="control-label">采购单号</label>
                <input type="text" class="form-control" name="sl" placeholder="采购单号" value="">
                <!-- value="SN<?php echo date('Ymdhis',time()); ?><?php echo rand(10000,99999); ?>" -->
            </div>  
        </div>
        <div class="col-md-8"> </div>
    </div>


    <div class="row">   
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-2" class="control-label">制单人</label>
                <input type="text" class="form-control" name="author" placeholder="制单人" value="<?php echo $my_info->truename; ?>">
            </div>  
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">入库类型</label>
                <select class="form-control" name="type">
                    <option value="采购入库" >采购入库</option>
                    <option value="销售退货" >销售退货</option>
                </select>  
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">供应商</label>
                <select class="form-control" name="supplier">
                        <option value="默认" >默认</option>
                        <?php if(is_array($supplier) || $supplier instanceof \think\Collection || $supplier instanceof \think\Paginator): $i = 0; $__LIST__ = $supplier;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['name']; ?>"><?php echo $vo['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>  
            </div>
        </div>        
    </div>


    <table class="table table-striped table-bordered table-hover dataTable no-footer">
        <thead>
            <tr role="row">
                <th></th>
                <th class="sorting_disabled" rowspan="1" colspan="1">
                    编码    名称    规格    颜色   
                </th>
                <th class="sorting_disabled" rowspan="1" colspan="1">
                    入库数
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr role="row" class="odd order-list">
                <td>
                    <a href="javascript:void(0);" onclick="add_list(this)">增加</a> 
                </td>
                <td>
                    <select name="product[]" class="form-control">
                        <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['sn']; ?>_<?php echo $vo['name']; ?>_<?php echo $vo['price']; ?>_<?php echo $vo['storage']; ?>_<?php echo $vo['unit']; ?>"><?php echo $vo['sn']; ?> &nbsp; <?php echo $vo['name']; ?> &nbsp; <?php echo $vo['spec']; ?> &nbsp; <?php echo $vo['color']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select> 
                </td>
                <td>
                    <input type="text" class="form-control" value="" name="num[]">
                </td>
                <td>
                	<a class="delete" href="javascript:void(0)" onclick="del_list(this)">删除</a>
                </td>
            </tr>

        </tbody>
    </table>




	<div class="row">
		<div class="col-md-12">
			<div class="form-group no-margin">
				<label for="field-7" class="control-label">备注</label>
				<textarea class="form-control autogrow" name="desc" placeholder="备注" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
			</div>	
		</div>
	</div>

	
</form>






<script>

function add_list(obj){
    // $(obj).parent().parent().hide();
    $(obj).parent().parent().clone().appendTo( $(obj).parent().parent().parent() );
}

function del_list(obj){
    $(obj).parent().parent().remove();
}

</script>