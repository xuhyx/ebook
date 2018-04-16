<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 加载用户列表.
     */
    public function index(Request $request)
    {

        //判断用户是否搜索
        $data=$request->all();

        if(isset($data['search'])){
            //获得url
            $url="&search=".$data['search']."&searchCondition=".$data['searchCondition'];

            //判断搜索条件是否为状态
            if($data['searchCondition']=='status'){
                $data['search']=$data['search']=='激活'?1:0;
            }else if($data['searchCondition']=='auth'){
                if($data['search']=='超级管理员'){
                    $data['search']=0;
                }else if($data['search']=='系统管理员'){
                    $data['search']=1;
                }else{
                    $data['search']=2;
                }
            }

            //获得用户总数
            $count = User::where($data['searchCondition'],'like','%'.$data['search'].'%')->count();

            //获取用户信息
            $users = User::where($data['searchCondition'],'like','%'.$data['search'].'%')->paginate(10);
        }else{

            $count = User::count();
            //获取用户信息
            $users = User::paginate(10);

            //获得url
            $url='';
        }

        //计算页数
        $page=ceil($count/10);

        //解析模板
        return view('Admin/User/index',['res'=>$users,'page'=>$page,'url'=>$url,'count'=>$count]);
    }

    /**
     * 加载用户添加页面.
     */
    public function create()
    {
        //解析模板
        return view('Admin/User/add');
    }

    /**
     * 执行用户添加.
     */
    public function store(StoreUser $request)
    {
        //获取添加用户的信息
        $data=$request->except('_token','picture','password2');

        //设置闪存session
        $request->flashOnly('nickname','telephone','email');

        //获取上传图片
        $file= $request->file('picture');

        //图片保存路径
        $filePath='Libs/Uploads/headerPic/';

        //上传图片
        $filename=upFile($file,$filePath);

        //判断是否上传成功
        if($filename==false){
            return back()->with('warning','头像上传失败')->withInput();
            die;
        }

        //追加图片名称
        $data['picture']=$filename;

        //password加密
        $data['password']=md5($data['password']);

        //追加用户创建时间及更新时间
        $data['created_at']=date('Y-m-d H:i:s');
        $data['updated_at']=date('Y-m-d H:i:s');

        //上传数据库
        $res1=User::create($data);

        //判断是否保存成功
        if($res1){
            return redirect('/Admin/User')->with('success',$data['name'].'创建成功');
        }else{
            //删除图片
            delFile($filename,$filePath);
            return back()->with('warning',$data['name'].'创建失败')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * 加载编辑页面.
     */
    public function edit($id)
    {
        $data=User::find($id);
        //解析模板
        return view('Admin/User/edit',compact('data'));
    }

    /**
     * 执行用户修改.
     */
    public function update(UpdateUser $request, $id)
    {
        //获取需修改用户信息
        $data=$request->except('_token','_method');

        $newPassword=$data['password'];

        //判断密码是否修改
        $oldInfo=User::find($id);
        if($newPassword==$oldInfo['password']){
            $data=array_except($data,'password');
        }else{
            $data['password']=bcrypt($newPassword);
        }

        //判断数据库中是否已存在邮箱
        $count=User::where('email',$data["email"])->count();

        if($count==1 && $data["email"]!=$oldInfo['email']){
            return back()->with('warning','邮箱已存在');
            die;
        }

        //判断是否更新头像
        if(array_has($data,'picture')){
            //获取图片文件
            $file= $request->file('picture');

            //图片保存路径
            $savepath='Libs/Uploads/headerPic/';

            //上传图片
            $filename=upFile($file,$savepath);

            //判断是否上传成功
            if($filename==false){
                return back()->with('warning','头像上传失败');
                die;
            }

            //删除原有图片
            if($oldInfo['picture']!='unknow.jpg'){
                delFile($oldInfo['picture'],$savepath);
            }

            //追加图片名称
            $data['picture']=$filename;
        }

        //上传数据库
        $res1=User::where('id',$id)->update($data);

        //判断是否保存成功
        if($res1){
            return redirect('/Admin/User')->with('success',$data['name'].'修改成功');
        }else{
            return back()->with('warning',$data['name'].'修改失败');
        }
    }

    /**
     * 执行用户删除.
     */
    public function destroy($id)
    {
        //获取图片名
        $pic=User::find($id)->picture;

        //判断是否为admin账户
        $name=User::find($id)->name;
        if($name=='admin'){
            return back()->with('warning','admin账户无法删除');
            die;
        }

        //判断是否为登录账户
        $user=Auth::user()->name;
        if($name==$user){
            return back()->with('warning','无法删除'.$name.'账户');
            die;
        }

        //删除数据库中相应数据
        $res=User::destroy($id);

        //判断是否删除成功
        if($res==false){
            return back()->with('warning',$name.'删除失败');
            die;
        }

        //删除头像目录下图片
        if($pic!='unknow.jpg'){
            delFile($pic,'Libs/Uploads/headerPic/');
        }

        //回到列表界面
        return redirect('/Admin/User')->with('success',$name.'删除成功');
    }
}
