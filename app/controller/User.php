<?php
namespace app\controller;
use app\service\UserService;
use app\model\User as UserModel;

class User extends Base
{
    protected $service;
    public function __construct(UserService $service)
    {
        parent::__construct();
        $this->service = $service;
    }  

    public function index()
    {
		$this->assign(['list'	=>	$this->service->page()]);
        return view();
    }

    public function getList(){
    	return [];
    }

    public function create()
    {
        if(request()->isPost()){
        $user = new UserModel();
            if($user->createuser(input('post.'))){
                $this->success('添加员工成功！',url('user/index'));
            }else{
                $this->error('添加员工失败！',url('user/index'));
            }
            return;
          }
            return view();
        // $this->assign( $this->service->_init() );
        return view();
    }


    public function save()
    {
        return $this->service->save();
    }

    public function edit($id){
        $users = db('user')->find($id);
        if(request()->isPost()){
            $data = input('post.');
            $user = new UserModel();
            // if($user -> saveuser($data,$users) == '2'){
            //     $this->error('用户名不得为空！');
            // }
            // if($user -> saveuser($data,$users) == '3'){
            //   $this->error('密码不得为空！');
            // }
            // if($user -> saveuser($data,$users) == '4'){
            //   $this->error('请填写正确的手机号码！');
            // }
            // if($user -> saveuser($data,$users) == '5'){
            //   $this->error('邮箱不得为空！');
            // }
            // if($user -> saveuser($data,$users) == '6'){
            //   $this->error('姓名不得为空！');
            // }

            if($user -> saveuser($data,$users) !== false){
                    $this->success('修改员工成功！',url('user/index'));
                }else{
                    $this->error('修改员工失败！');//自己返回，不需要跳转
                }
            return;
        }
    if(!$users){
        $this->error('该员工不存在');
    }
    $this->assign('user',$users);
    return view();
    }

    public function update(){
        return $this->service->update();
    }

    public function delete($id){
        return $this->service->delete($id);
    }
}

