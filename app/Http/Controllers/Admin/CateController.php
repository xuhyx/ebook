<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cate;

class CateController extends Controller
{
    /**
     * 获得分类数组的方法
     */
    public static function getCatesByPid($id)
    {
        //查询父类下所有的子类信息
        $res=Cate::where('pid',$id)->get()->toArray();

        //定义存储封装之后数组信息的变量
        $data=[];
        //遍历分类信息
        foreach ($res as $key => $val) {
            $val['sub']=self::getCatesByPid($val['id']);
            $data[]=$val;
        }

        //将信息返回
        return $data;
    }
    /**
     * 发送json的方法
     */
    public function json($id)
    {
        //获得父类分类
        $cates=Cate::where('pid',$id)->get();

        // 解析模板
        return response()->json($cates);
    }
    /**
     * 加载分类列表.
     */
    public function index(Request $request)
    {
        //判断是否搜索
        if(isset($request->search)){
            $count=Cate::where($request->searchCondition,'like','%'.$request->search.'%')->count();
            $cates=Cate::where($request->searchCondition,'like','%'.$request->search.'%')->get()->toArray();
        }else{
            $count=Cate::where('pid',0)->count();
            $cates=Cate::where('pid',0)->get()->toArray();
        }

        return view('Admin/Cate/index',['res'=>$cates,'pid'=>0,'count'=>$count]);
    }
    /**
     * 加载类列表的方法
     */
    public function details($id)
    {
        if($id==0){
            return redirect('Admin/Cate');
        }
        //获得该父类下的所有一级分类
        $count=Cate::where('pid',$id)->count();
        $cates=Cate::where('pid',$id)->get()->toArray();

        //获得该类型的父集面包屑
        $cate=Cate::find($id);

        //获得父级分类
        $path=array_except(explode(',',$cate['path']),0);

        //根据父级分类获得父级类型名称及其父级id
        $pathName=[];
        foreach ($path as $v){
            $name=Cate::find($v)->name;
            $pid=Cate::find($v)->pid;
            array_push($pathName,['pid'=>$pid,'name'=>$name]);
        }
        array_push($pathName,['pid'=>$cate['pid'],'name'=>$cate['name']]);

        //解析
        return view('Admin/Cate/index',['res'=>$cates,'pid'=>$id,'pathName'=>$pathName,'count'=>$count]);
    }
    /**
     * 加载添加分类界面.
     */
    public function create()
    {
        //获得父类分类
        $cates=Cate::where('pid',0)->get()->toArray();

        // 解析模板
        return view('Admin/Cate/add',['cates'=>$cates,'flag'=>0,'id'=>0]);
    }
    /**
     * 加载指定类添加页面的方法
     */
    public function add($id)
    {

        //获得父类分类
        $cates=Cate::where('pid',$id)->get()->toArray();


        // 解析模板
        return view('Admin/Cate/add',['cates'=>$cates,'flag'=>1,'id'=>$id]);
    }
    /**
     * 添加分类.
     */
    public function store(Request $request)
    {
        //获得父类ID
        $pid=$request->pid;

        //获得分类信息
        $data=$request->except('_token');

        if($pid==0){
            //追加父类信息路径
            $data['path']=0;
            $path[0]['pid']=0;
        }else{
            //获得父类信息路径
            $path=Cate::find($data['pid']);

            //追加父类信息路径
            $data['path']=$path['path'].','.$pid;
        }

        //追加创建时间及更新时间
        $data['created_at']=date("Y-m-d H:i:s");
        $data['updated_at']=date("Y-m-d H:i:s");

        //执行父类信息添加
        $res=Cate::insert($data);

        //判断
        if($res){
            return redirect('Admin/Cate/details/'.$path['pid'])->with('success', $data['name'].'类添加成功');
        }else{
            return back()->with('warning', $data['name'].'类添加失败');
        }
    }

    /**
     * 加载编辑界面.
     */
    public function edit($id)
    {
        //获得需要编辑的信息
        $data=Cate::find($id);

        //获得父类名称及编号
        $path=$data->path;

        $arr=explode(',', $path);

        $fa=[];
        foreach($arr as $v){
            if($v!=0){
                $res=Cate::find($v);
                array_push($fa, $res);
            }
        }
        $res=Cate::find($id);

        array_push($fa, $res);

        return view('Admin/Cate/edit',['data'=>$data,'fa'=>$fa]);
    }

    /**
     * 执行类型编辑.
     */
    public function update(Request $request, $id)
    {
        //获得分类信息
        $name=$request->except('_token','pid')['name'];
        $pid=Cate::find($id)->pid;

        //执行父类修改
        $res=Cate::where('id',$id)->update(['name'=>$name]);

        //判断
        if($res){
            return redirect('Admin/Cate/details/'.$pid)->with('success', $name.'类修改成功');
        }else{
            return back()->with('warning', $name.'类修改失败');
        }
    }

    /**
     * 删除分类.
     */
    public function destroy($id)
    {
        //判断是否有子类
        $count=Cate::where('pid',$id)->count();
        if($count>0){
            return back()->with('warning', '该类拥有子类,无法删除,请删除其所有子类后再删除该类');
            die;
        }

        //获得父级id
        $pid=Cate::find($id)->pid;

        //执行删除
        $res=Cate::destroy($id);

        //判断是否删除成功
        if($res){
            return back()->with('success', '删除成功');
        }else{
            return back()->with('danger','删除失败');
        }
    }
}
