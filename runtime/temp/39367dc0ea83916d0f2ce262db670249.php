<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\phpStudy\WWW\jxc\public/../app/view\outstorage\prints.html";i:1520043924;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />
    
    <title>Xenon仓库管理</title>

    <link rel="stylesheet" href="__JUNYUE__/static/css/bootstrap.css">
    <link rel="stylesheet" href="__JUNYUE__/static/css/xenon-core.css">
    <link rel="stylesheet" href="__JUNYUE__/static/css/xenon-forms.css">
    <link rel="stylesheet" href="__JUNYUE__/static/css/xenon-components.css">
    <link rel="stylesheet" href="__JUNYUE__/static/css/xenon-skins.css">
    <link rel="stylesheet" href="__JUNYUE__/static/css/custom.css">

    <script src="__JUNYUE__/static/js/jquery-1.11.1.min.js"></script>
    <script src="__JUNYUE__/static/js/jQuery.print.js"></script>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body class="page-body">
<div class="page-container">    

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">

                    <div class="row">   
                        <div class="pull-left">
                            <div class="form-group">
                                <label class="control-label">订单号</label>
                                <label class="control-label"><?php echo $info['sn']; ?></label>
                            </div>  
                        </div>
                        <div class="pull-right">
                            <img src="<?php echo url('/Instorage/barcode/sn/'.$info['sn']); ?>" alt="">
                         </div>
                    </div>

                    <div class="row" style="margin-top:20px;">   
                        <div class="pull-left col-xs-4">
                            <div class="form-group">
                                <label class="control-label">制单人</label>
                                <label class="control-label"><?php echo $info['author']; ?></label>
                            </div>  
                        </div>
                        <div class="pull-left">
                            <div class="form-group">
                                <label class="control-label">出库类型</label>
                                <label class="control-label"><?php echo $info['type']; ?></label>
                            </div>
                        </div>
                        <div class="pull-right">
                            <div class="form-group">
                                <label class="control-label">供应商</label>
                                <label class="control-label"><?php echo $info['supplier']; ?></label>
                            </div>
                        </div>        
                    </div>


                    <table class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr role="row">
                                <th>产品名称</th>
                                <th>产品编号</th>
                                <th>出库数</th>
                                <th>单价</th>
                                <th>仓库</th>
                                <th>单位</th>
                                <th>总价</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $lists = json_decode($info->res);
                        foreach( $lists as  $v ): ?>

                                <tr role="row" class="odd">
                                    <td>
                                        <label class="control-label"><?php echo $v[1]; ?></label>
                                    </td>
                                    <td> 
                                        <label class="control-label"><?php echo $v[0]; ?></label>
                                    </td>
                                    <td>
                                        <label class="control-label"><?php echo $v[2]; ?></label>
                                    </td>                                    
                                    <td>
                                        <label class="control-label"><?php echo $v[3]; ?></label>
                                    </td>
                                    <td>
                                        <label class="control-label"><?php echo $v[4]; ?></label>
                                    </td>
                                    <td>
                                        <label class="control-label"><?php echo $v[5]; ?></label>
                                    </td>
                                    <td>
                                        <label class="control-label"><?php echo $v[2]*$v[3]; ?></label>
                                    </td>
                                </tr>
                             <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label class="control-label">备注</label>
                                <label class="control-label"><?php echo $info['desc']; ?></label>
                            </div>  
                        </div>
                    </div>
                    
<!--                     <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <input type="button" class="control-label" onclick="p()">
                            </div>  
                        </div>
                    </div> -->

            </div>
        </div>
    </div>


<div>
</body>
</html>

<script>
$(function(){
   p(); 
});

function p(){
    $(".page-container").print();
}
</script>