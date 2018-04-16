<?php
namespace app\service;
use think\Request,
	app\model\User,
	app\model\Unit,
	app\model\Product,
	app\model\Storage,
	app\model\Category,
	app\model\Customer,
	app\model\Supplier,
	app\model\Location,
	app\model\Order,
	app\model\Menu,
	app\validate\ProductValidate;

class UserService
{

    public function page(){

        return User::where('status',0)->paginate(10);
    }

    public function _init(){

    	return [
    		'username'	=>	Username::all(     [ 'status' => 0 ] ),
    		'password'	=>	Password::all( [ 'status' => 0 ] ),
    		'phone'		=>	Phone::all( [ 'status' => 0 ] ),
    		'eamil'		=>	Eamil::all( [ 'status' => 0 ] ),
    		'truename'	=>	Truename::all(  [ 'status' => 0 ] ),
    		'location'	=>	Location::all( [ 'status' => 0 ] ),
    		// 'category'	=>	Category::all( [ 'status' => 0 ] ),
    	];
    }

    // 保存数据
    public function save(){
    	Request::instance()->isPost() || die('request not  post!');
    	
		$param = Request::instance()->param();	//获取参数
		$error = $this->_validate($param); 		// 是否通过验证

		if( is_null( $error ) ){

			if( Product::get(['name' => $param['name'] ]) ){
				return ['error'	=>	100,'msg'	=>	'名称已经存在'];
				exit();	
			}

			$product 			= new Product();
			$product->username 	= $param['username'];
			$product->password 	= $param['password'];
			$product->phone 	= $param['phone'];
			$product->eamil 	= $param['eamil'];
			$product->truename 	= $param['truename'];
			// $product->category 	= $param['category'];
			// $product->color 	= $param['color'];
			// $product->unit 		= $param['unit'];
			// $product->cjsn 		= $param['cjsn'];
			// $product->storage 	= $param['storage'];
			// $product->location 	= $param['location'];
			// $product->supplier 	= $param['supplier'];
			// $product->customer 	= $param['customer'];
			// $product->price 	= $param['price'];
			// $product->desc 		= $param['desc'];
			// // $product->status 	= $param['status'];
			// $product->add_time 	= time();

			// 检测错误
			if( $product->save() ){
				return ['error'	=>	0,'msg'	=>	'保存成功'];
			}else{
				return ['error'	=>	100,'msg'	=>	'保存失败'];	
			}
			
		}else{
			return ['error'	=>	100,'msg'	=>	$error];
		}

    }


    public function edit($id){
    	return Product::get($id);
    }


    public function update(){
    	Request::instance()->isPost() || die('request not  post!');
    	
		$param = Request::instance()->param();	//获取参数
		$error = $this->_validate($param); 		// 是否通过验证

		if( is_null( $error ) ){

			$product = Product::get($param['id']);
			$product->username 	= $param['username'];
			$product->password 	= $param['password'];
			$product->phone 	= $param['phone'];
			$product->eamil 	= $param['eamil'];
			$product->truename 	= $param['truename'];
			// $product->category 	= $param['category'];
			// $product->category 	= $param['category'];
			// $product->sn 		= $param['sn'];
			// $product->name 		= $param['name'];
			// $product->nbsn 		= $param['nbsn'];
			// $product->spec 		= $param['spec'];
			// $product->color 	= $param['color'];
			// $product->unit 		= $param['unit'];
			// $product->cjsn 		= $param['cjsn'];
			// $product->storage 	= $param['storage'];
			// $product->location 	= $param['location'];
			// $product->supplier 	= $param['supplier'];
			// $product->customer 	= $param['customer'];
			// $product->price 	= $param['price'];
			// $product->desc 		= $param['desc'];
			$product->status 	= $param['status'];
			// 检测错误
			if( $product->save() ){
				return ['error'	=>	0,'msg'	=>	'修改成功'];
			}else{
				return ['error'	=>	100,'msg'	=>	'修改失败'];	
			}
		}else{
			return ['error'	=>	100,'msg'	=>	$error];
		}


    }

    public function delete($id){
    	if( Product::destroy($id) ){
    		return ['error'	=>	0,'msg'	=>	'删除成功'];
    	}else{
    		return ['error'	=>	100,'msg'	=>	'删除失败'];	
    	}

		// 支持批量删除多个数据
		// User::destroy('1,2,3');
		// // 或者
		// User::destroy([1,2,3]);
    }


    // 验证器
    private function _validate($data){
		// 验证
		$validate = validate('ProductValidate');
		if(!$validate->check($data)){
			return $validate->getError();
		}
    }
  


}
