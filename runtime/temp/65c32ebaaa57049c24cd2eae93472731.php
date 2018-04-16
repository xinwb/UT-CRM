<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\phpStudy\WWW\jxc\public/../app/view\instorage\show.html";i:1520240494;}*/ ?>
<form class="validate" novalidate="novalidate">

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="field-2" class="control-label">订单号</label>
				<input type="text" class="form-control" name="sn" placeholder="订单号" value="<?php echo $info['sn']; ?>" disabled="disabled">
			</div>
		</div>
        <div class="col-md-8"> </div>
	</div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="field-2" class="control-label">制单人</label>
                <input type="text" class="form-control" name="author" placeholder="制单人" value="<?php echo $info['author']; ?>" disabled="disabled">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">入库类型</label>
                <input type="text" class="form-control" name="type" placeholder="入库类型" value="<?php echo $info['type']; ?>" disabled="disabled">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">供应商</label>
                <input type="text" class="form-control" name="supplier" placeholder="供应商" value="<?php echo $info['supplier']; ?>" disabled="disabled">
            </div>
        </div>
    </div>


    <table class="table table-striped table-bordered table-hover dataTable no-footer">
        <thead>
            <tr role="row">
                <th>物料编号</th>
                <th class="sorting_disabled" rowspan="1" colspan="1">
                    物料名称
                </th>
                <th class="sorting_disabled" rowspan="1" colspan="1">
                    入库数
                </th>

            </tr>
        </thead>
        <tbody>
        <?php
            $lists = json_decode($info->res);
        foreach( $lists as  $v ): ?>
                <tr role="row" class="odd">
                    <td>
                         <input type="text" class="form-control" value="<?php echo $v[0]; ?>" disabled="disabled">
                    </td>
                    <td>
                        <input type="text" class="form-control" value="<?php echo $v[1]; ?>" disabled="disabled">
                    </td>
                    <td><input type="text" class="form-control" value="<?php echo $v[2]; ?>" disabled="disabled"></td>

                </tr>
             <?php endforeach; ?>
        </tbody>
    </table>



	<div class="row">
		<div class="col-md-12">
			<div class="form-group no-margin">
				<label for="field-7" class="control-label">备注</label>
				<textarea class="form-control autogrow" name="desc" placeholder="备注" disabled="disabled"
                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 50px;"><?php echo $info['desc']; ?></textarea>
			</div>
		</div>
	</div>
</form>

