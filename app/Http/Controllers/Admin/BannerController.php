<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\storeBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Http\Controllers\Controller;
use App\Model\Banner;

class BannerController extends Controller
{
    /**
     * 加载轮播图列表.
     */
    public function index(Request $request)
    {
        //判断用户是否搜索
        $data=$request->all();

        if(isset($data['search'])){
            //获得url
            $url="&search=".$data['search']."&searchCondition=".$data['searchCondition'];

            //判断搜索条件是否为状态
            if($data['searchCondition']=='flag'){
                $data['search']=$data['search']=='激活'?1:0;
            }else if($data['searchCondition']=='flag'){
                if($data['search']=='首页图片'){
                    $data['search']=0;
                }else if($data['search']=='广告图片'){
                    $data['search']=1;
                }else{
                    $data['search']=2;
                }
            }

            //获得图片总数
            $count = Banner::where($data['searchCondition'],$data['search'])->count();

            //获取图片信息
            $users = Banner::where($data['searchCondition'],$data['search'])->paginate(10);
        }else{
            $res=Banner::paginate(10);

            $count=Banner::count();

            //获得url
            $url='';
        }

        $page=ceil($count/10);

        //解析
        return view('Admin.Banner.index',compact('res','count','page','url'));
    }

    /**
     * 加载轮播图添加界面.
     */
    public function create()
    {
        return view('Admin.Banner.add');
    }

    /**
     * 执行图片添加.
     */
    public function store(storeBannerRequest $request)
    {
        //获取信息
        $data=$request->except('_token');

        //获取图片
        $file=$request->file('name');

        //图片上传路径
        $savepath='Libs/Uploads/BannerPic/';

        //上传图片
        $filename=upFile($file,$savepath);

        //判断图片是否上传成功
        if($filename==false){
            return back()->with('danger','图片上传失败');
            die;
        }

        //追加图片名称
        $data['name']=$filename;

        //追加创建时间
        $data['created_at']=date('Y-m-d H:i:s');

        //执行上传
        $res=Banner::insert($data);

        //判断是否上传成功
        if($res){
            return redirect('Admin/Banner')->with('success','图片上传成功');
        }else{
            delFile($filename,$savepath);
            return back()->with('danger','图片上传失败');
        }
        dd($data);
    }

    /**
     * 加载编辑界面.
     */
    public function edit($id)
    {
        //获取信息
        $data=Banner::find($id);

        //解析
        return view('Admin.Banner.edit',compact('data'));
    }

    /**
     * 执行修改.
     */
    public function update(UpdateBannerRequest $request, $id)
    {
        //获取信息
        $data=$request->except('_token','_method');

        //判断是否修改图片
        if(array_has($data,'name')){
            //获取图片
            $file=$request->file('name');

            //图片上传路径
            $savepath='Libs/Uploads/BannerPic/';

            //上传
            $filename=upFile($file,$savepath);

            //判断是否上传成功
            if($file==false){
                return back()->with('danger','图片上传失败');
            }

            //追加图片名称
            $data['name']=$filename;
        }

        //执行修改
        $res=Banner::where('id',$id)->update($data);

        //判断
        if($res){
            return redirect('Admin/Banner')->with('success','修改成功');
        }else{
            return back()->with('danger','修改失败');
        }

        dd($data);
    }

    /**
     * 删除.
     */
    public function destroy($id)
    {
        //获得图片名
        $name=Banner::find($id)->name;

        //删除数据库中数据
        $res=Banner::destroy($id);

        //判断
        if($res){
            //删除图片
            delFile($name,'Libs/Uploads/BannerPic/');
            return redirect('Admin/Banner')->with('success','删除成功');
        }else{
            return back()->with('danger','删除失败');
        }
    }

    /**
     * 锁定
     */
    public function lock($id){
        $banner=Banner::find($id);
        $banner->flag=-1;
        $banner->save();

        return back()->with('success','已锁定');
    }

    /**
     * 激活
     */
    public function active($id){
        $banner=Banner::find($id);
        $banner->flag=1;
        $banner->save();

        return back()->with('success','已激活');
    }
}
