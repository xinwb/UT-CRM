<?php
namespace app\controller;
use app\service\UserService;
use PHPEXcel_IOFactory;
use PHPExcel;

class Excel extends Base
{
    //物料管理
    /*---------------导出Excel---------------*/
    function proExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('product')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '类别')
            ->setCellValue('B1', '编码')
            ->setCellValue('C1', '名称')
            ->setCellValue('D1', '型号')
            ->setCellValue('E1', '规格')
            ->setCellValue('F1', '单位')
            ->setCellValue('G1', '颜色')
            ->setCellValue('H1', '仓库')
            ->setCellValue('I1', '库位')
            ->setCellValue('J1', '供应商')
            ->setCellValue('K1', '客户')
            ->setCellValue('L1', '价格')
            ->setCellValue('M1', '状态');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['category']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['sn']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['nbsn']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['spec']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['unit']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['color']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $sql[$i-2]['storage']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $sql[$i-2]['location']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $sql[$i-2]['supplier']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $sql[$i-2]['customer']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $sql[$i-2]['price']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $sql[$i-2]['status']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('product');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="物料管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function proInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    $data[$k]['category'] = $v[0];
                    $data[$k]['sn'] = $v[1];
                    $data[$k]['name'] = $v[2];
                    $data[$k]['nbsn'] = $v[3];
                    $data[$k]['spec'] = $v[4];
                    $data[$k]['unit'] = $v[5];
                    $data[$k]['color'] = $v[6];
                    $data[$k]['storage'] = $v[7];
                    $data[$k]['location'] = $v[8];
                    $data[$k]['supplier'] = $v[9];
                    $data[$k]['customer'] = $v[10];
                    $data[$k]['price'] = $v[11];
                    $data[$k]['status'] = $v[12];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('product')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }

    //物料类别
    function cateExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('category')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '类别名称')
            ->setCellValue('C1', '上级名称')
            ->setCellValue('D1', '状态')
            ->setCellValue('E1', '创建时间');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['pid']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['status']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['add_time']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('category');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="物料类别.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function cateInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    // $data[$k]['id'] = $v[0];
                    $data[$k]['name'] = $v[1];
                    $data[$k]['pid'] = $v[2];
                    $data[$k]['status'] = $v[3];
                    $data[$k]['add_time'] = $v[4];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('category')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }

    //客户管理
    function cusExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('customer')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '编号')
            ->setCellValue('C1', '名称')
            ->setCellValue('D1', '联系人')
            ->setCellValue('E1', '电话')
            ->setCellValue('F1', '邮箱')
            ->setCellValue('G1', '传真')
            ->setCellValue('H1', '状态')
            ->setCellValue('I1', '创建时间');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['sn']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['contact']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['email']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['fax']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $sql[$i-2]['status']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $sql[$i-2]['add_time']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('customer');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="客户管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function cusInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    // $data[$k]['id'] = $v[0];
                    $data[$k]['sn'] = $v[1];
                    $data[$k]['name'] = $v[2];
                    $data[$k]['contact'] = $v[3];
                    $data[$k]['phone'] = $v[4];
                    $data[$k]['email'] = $v[5];
                    $data[$k]['fax'] = $v[6];
                    $data[$k]['status'] = $v[7];
                    $data[$k]['add_time'] = $v[8];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('customer')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }

    //入库管理
    function insExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('order')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '入库单号')
            ->setCellValue('B1', '制造者')
            ->setCellValue('C1', '采购单号')
            ->setCellValue('D1', '供应商')
            ->setCellValue('E1', '入库类型')
            ->setCellValue('F1', '创建时间')
            ->setCellValue('G1', '出入库');


        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for($i = 2;$i <= $count+1; $i++)
        {   
            if($sql[$i-2]['state'] == 1){
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['sn']);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['author']);
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['supplier']);
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['type']);
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['add_time']);
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['state']);
            }
        }

    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('order');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="入库管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function insInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    $data[$k]['sn'] = $v[0];
                    $data[$k]['author'] = $v[1];
                    $data[$k]['sl'] = $v[2];
                    $data[$k]['supplier'] = $v[3];
                    $data[$k]['type'] = $v[4];
                    $data[$k]['add_time'] = $v[5];
                    $data[$k]['state'] = $v[6];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('order')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }


    //库位管理
    function locExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('location')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '仓库编号')
            ->setCellValue('C1', '仓库名称')
            ->setCellValue('D1', '所属仓库')
            ->setCellValue('E1', '状态')
            ->setCellValue('F1', '创建时间');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['sn']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['storage']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['status']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['add_time']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('location');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="库位管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function locInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    // $data[$k]['id'] = $v[0];
                    $data[$k]['sn'] = $v[1];
                    $data[$k]['name'] = $v[2];
                    $data[$k]['storage'] = $v[3];
                    $data[$k]['status'] = $v[4];
                    $data[$k]['add_time'] = $v[5];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('location')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }


    //出库管理
    function outExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('order')->select();
        // dump($sql);die;

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '出库单号')
            ->setCellValue('B1', '制单者')
            ->setCellValue('C1', '供应商')
            ->setCellValue('D1', '出库类型')
            ->setCellValue('E1', '创建时间')
            ->setCellValue('F1', '出入库');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for($i = 2;$i <= $count+1; $i++)
        {   
            if($sql[$i-2]['state'] == 2){
                $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['sn']);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['author']);
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['supplier']);
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['type']);
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['add_time']);
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['state']);
            }
        }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('order');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="出库管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function outInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    $data[$k]['sn'] = $v[0];
                    $data[$k]['author'] = $v[1];
                    $data[$k]['supplier'] = $v[2];
                    $data[$k]['type'] = $v[3];
                    $data[$k]['add_time'] = $v[4];
                    $data[$k]['state'] = $v[5];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('order')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }


    //仓库管理
    function stoExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('storage')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '仓库编号')
            ->setCellValue('C1', '仓库名称')
            ->setCellValue('D1', '联系人')
            ->setCellValue('E1', '电话')
            ->setCellValue('F1', '状态')
            ->setCellValue('G1', '创建时间');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['sn']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['contact']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['status']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['add_time']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('storage');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="仓库管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function stoInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    // $data[$k]['id'] = $v[0];
                    $data[$k]['sn'] = $v[1];
                    $data[$k]['name'] = $v[2];
                    $data[$k]['contact'] = $v[3];
                    $data[$k]['phone'] = $v[4];
                    $data[$k]['status'] = $v[5];
                    $data[$k]['add_time'] = $v[6];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('storage')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }


    //供应商管理
    function supExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('supplier')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '编号')
            ->setCellValue('C1', '名称')
            ->setCellValue('D1', '联系人')
            ->setCellValue('E1', '电话')
            ->setCellValue('F1', '邮箱')
            ->setCellValue('G1', '传真')
            ->setCellValue('H1', '状态')
            ->setCellValue('I1', '创建时间');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['sn']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['contact']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['email']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['fax']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $sql[$i-2]['status']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $sql[$i-2]['add_time']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('supplier');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="供应商管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function supInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    // $data[$k]['id'] = $v[0];
                    $data[$k]['sn'] = $v[1];
                    $data[$k]['name'] = $v[2];
                    $data[$k]['contact'] = $v[3];
                    $data[$k]['phone'] = $v[4];
                    $data[$k]['email'] = $v[5];
                    $data[$k]['fax'] = $v[6];
                    $data[$k]['status'] = $v[7];
                    $data[$k]['add_time'] = $v[8];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('supplier')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }


    //计量单位
    function unitExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('unit')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '单位名称')
            ->setCellValue('C1', '状态')
            ->setCellValue('D1', '创建时间');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['status']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['add_time']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('unit');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="计量单位.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function unitInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    // $data[$k]['id'] = $v[0];
                    $data[$k]['name'] = $v[1];
                    $data[$k]['status'] = $v[2];
                    $data[$k]['add_time'] = $v[3];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('unit')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }


    //员工管理
    function userExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('user')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '用户名')
            ->setCellValue('B1', '真实姓名')
            ->setCellValue('C1', '电话')
            ->setCellValue('D1', '邮箱');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['username']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['truename']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['phone']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['eamil']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('user');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="员工管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function userInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    $data[$k]['username'] = $v[0];
                    $data[$k]['truename'] = $v[1];
                    $data[$k]['phone'] = $v[2];
                    $data[$k]['eamil'] = $v[3];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('user')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }



    //查询管理
    function listExport()
    {
        $path = dirname(__FILE__);
        vendor("PHPExcel.Classes.PHPExcel");
        vendor("PHPExcel.Classes.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.Clasees.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.Clasees.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPEXcel_Writer_Excel5($objPHPExcel);
        $sql = db('product')->select();

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ID')
            ->setCellValue('B1', '编码')
            ->setCellValue('C1', '名称')
            ->setCellValue('D1', '类别')
            ->setCellValue('E1', '单位')
            ->setCellValue('F1', '数量')
            ->setCellValue('G1', '单价')
            ->setCellValue('H1', '仓库')
            ->setCellValue('I1', '供应商')
            ->setCellValue('J1', '客户')
            ->setCellValue('K1', '状态');


        /*--------------开始从数据库提取信息插入Excel表中------------------*/


        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['sn']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['category']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['unit']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['num']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['price']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $sql[$i-2]['storage']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $sql[$i-2]['supplier']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $sql[$i-2]['customer']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $sql[$i-2]['status']);
    }
    /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('product');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="物料管理.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
    /*---------------导入Excel---------------*/
    public function listInto()
    {
        if (!empty ($_FILES ['file_stu'] ['name'])) {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode(".", $_FILES ['file_stu'] ['name']);
            $file_type = $file_types [count($file_types) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower($file_type) != "xlsx") {
                $this->error('不是Excel文件，重新上传');
            }
            /*设置上传路径*/
            $savePath = ROOT_PATH . 'public' . DS . 'upload' . DS;

            /*以时间来命名上传的文件*/
            $str = date('Ymdhis');
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy($tmp_file, $savePath . $file_name)) {
                $this->error('上传失败');
            }
            require THINK_PATH.'Library/ExcelToArrary.class.php';//导入excelToArray类
            $ExcelToArrary=new \ExcelToArrary();//实例化

            $res=$ExcelToArrary->read($savePath.$file_name,"UTF-8",$file_type);//传参,判断office2007还是office2003
            /*对生成的数组进行数据库的写入*/
            foreach ($res as $k => $v) {
                if ($k > 1) {
                    // $data[$k]['id'] = $v[0];
                    $data[$k]['sn'] = $v[1];
                    $data[$k]['name'] = $v[2];
                    $data[$k]['category'] = $v[3];
                    $data[$k]['unit'] = $v[4];
                    $data[$k]['num'] = $v[5];
                    $data[$k]['price'] = $v[6];
                    $data[$k]['storage'] = $v[7];
                    $data[$k]['supplier'] = $v[8];
                    $data[$k]['customer'] = $v[9];
                    $data[$k]['status'] = $v[10];
//                    $data ['password'] = sha1('111111');
                }
            }
            //插入的操作最好放在循环外面
            $result = db('product')->insertAll($data);
            //var_dump($result);
            $this->success('上传成功！');
        }
    }
}
