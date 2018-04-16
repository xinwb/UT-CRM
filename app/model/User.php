<?php
namespace app\model;
use think\Model;

class User extends Model
{
	protected $pk = 'id';
	// protected $table = 'think_user';
	public function createuser($data)
	{
		if(empty($data) || !is_array($data)){
			return false;
		}
		if($data['password']){
			$data['password']=md5($data['password']);
		}
		// if($data['userPassword']){
		// 	$data['userPassword']=md5($data['userPassword']);
		// }
		if($this->save($data)){
			return true;
		}else{
			return false;
		}
	}

	public function getuser()
	{
		return $this::paginate(10);
	}

	public function saveuser($data,$users)
	{
		// if(!$data['username']){
  //   		return 2;
  //   	}
  //       if(!$data['password']){
  //           return 3;
  //       }
  //       if(!$data['phone'] || !preg_match("/^1[34578]{1}\d{9}$/",$data['phone'])){
  //           return 4;
  //       }
  //       if(!$data['eamil'] || !preg_match("/^1[34578]{1}\d{9}$/",$data['eamil'])){
  //           return 4;
  //       }
  //       if(!$data['truename']){
  //           return 5;
  //       }
    	return $this -> save(['username' => $data['username'],'password' => md5($data['password']),'phone' => $data['phone'],'eamil' => $data['eamil'],'truename' => $data['truename']],['id' => $data['id']]);
	}
}

