<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGoods;
use App\Http\Requests\UpdateGoods;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Cate;
use App\Model\Goods;
use App\Model\Press;


class GoodsController extends Controller
{

    /**
     * 加载书籍列表的方法
     *
     */
    public function index(Request $request)
    {
        //判断用户是否搜索
        $data=$request->all();

        if(isset($data['search'])){
            //获得url
            $url="&search=".$data['search']."&searchCondition=".$data['searchCondition'];

            //判断搜索条件是否为上架,热销,新品
            if($data['searchCondition']=='isSale'||$data['searchCondition']=='isHot'||$data['searchCondition']=='isNew'){
                $condition=$data['search']=='是'?1:0;
                $count=Goods::where($data['searchCondition'],$condition)->count();
                $goods=Goods::where($data['searchCondition'],$condition)
                    ->paginate(10);
            }else if($data['searchCondition']=='cate'){
                $cate=Cate::where('name',$data['search'])->first();
                if(!empty($cate)){
                    $count=$cate->goods()->count();
                    $goods=$cate->goods()->paginate(10);
                }else{
                    $count=0;
                    $goods=[];
                }
            }else if($data['searchCondition']=='press'){
                $press=Cate::where('name',$data['search'])->first();
                if(!empty($press)){
                    $count=$press->goods()->count();
                    $goods=$press->goods()->paginate(10);
                }else{
                    $count=0;
                    $goods=[];
                }
            }else{
                $count=Goods::where($data['searchCondition'],'like','%'.$data['search'].'%')->count();
                $goods=Goods::where($data['searchCondition'],'like','%'.$data['search'].'%')
                    ->paginate(10);
            }


        }else{
            //获取书籍总数
            $count=Goods::count();

            //获取书籍信息
            $goods=Goods::orderBy('id')
                ->paginate(10);

            //获得url
            $url='';
        }

        //计算页数
        $page=ceil($count/10);

        //解析模板
        return view('Admin/Goods/index',['res'=>$goods,'count'=>$count,'page'=>$page,'url'=>$url]);
    }

    /**
     * 加载书籍添加页面的方法
     */
    public function create()
    {
        //获得书籍所属类别分类
        $cates=Cate::where('pid',0)->get()->toArray();

        //获得出版社信息
        $presses=Press::all();

        //解析模板
        return view('Admin/Goods/add',['cates'=>$cates,'presses'=>$presses]);

    }

    /**
     * 执行加载的方法
     */
    public function store(StoreGoods $request)
    {
        //获得书籍信息
        $data=$request->except('_token','gimg');

        //设置闪存session
        $request->flashOnly('gname','isSale','gstock','isHot','isNew','brandId','gDesc','gPrise','gauthor');

        //判断是否新增出版社
        if($data['press_id']==0){
            if(isset($data['press_name'])){
                //从$data中移除press_name并返回键值对
                $press_name=array_pull($data,'press_name');

                //执行出版社新增操作
                $brandId=press::insertGetId(['name'=>$press_name]);

                //修改出版社id
                if($brandId){
                    $data['press_id ']=$brandId;
                }else{
                    return back()->with('danger','出版社新增失败')->withInput();
                    die;
                }
            }else{
                return bakc()->with('warning','出版社名称不能为空')->withInput();
                die;
            }
        }

        //获取图片
        $file= $request->file('gimg');

        //图片保存路径
        $savepath='Libs/Uploads/goodsPic/';

        //上传图片
        $filename=upFile($file,$savepath);

        //判断是否上传成功
        if($filename==false){
            return back()->with('danger','图片上传失败')->withInput();
            die;
        }

        //追加图片名称
        $data['gimg']=$filename;


        //追加创建时间及更新时间
        $data['created_at']=date("Y-m-d H:i:s");
        $data['updated_at']=date("Y-m-d H:i:s");

        //上传数据库
        $res1=Goods::insert($data);

        //判断是否保存成功
        if($res1){
            return redirect('/Admin/Goods')->with('success','书籍创建成功');
        }else{
            //删除图片
            delFile($filename,$savepath);
            return back()->with('danger','书籍创建失败')->withInput();
        }
    }
    /**
     * 加载详情页的方法
     */
    public function show($id)
    {
        //获得该书籍详细信息
        $goods=Goods::find($id);

        //获得该书籍所属类别的path
        $path=Cate::find($goods['cate_id'])->path;
        $path=explode(',', $path);

        //获得父类别名称
        foreach ($path as $key => $value) {
            if($value!=0){
                $cate_name[]=Cate::find($value)->name;
            }else{
                $cate_name=[];
            }
        }
        $goods['cate_name']=implode('/', $cate_name).'/'.$goods->cate->name;

        //解析详情页模板
        return view('Admin/Goods/details',['goods'=>$goods]);
    }

    /**
     * 加载编辑页面的方法
     */
    public function edit($id)
    {
        //获得编辑书籍信息
        $goods=Goods::find($id);
        //获得所有出版社信息
        $press=press::all();

        //获得所属分类信息
        $cates=Cate::where('pid',0)->get()->toArray();

        //解析模板
        return view('Admin/Goods/edit',['goods'=>$goods,'press'=>$press,'cates'=>$cates]);
    }

    /**
     * 执行书籍修改的方法
     */
    public function update(UpdateGoods $request, $id)
    {
        //获取修改书籍信息
        $goods=$request->except('_token','_method');

        //获取该书籍的原有信息
        $oldInfo=Goods::find($id);

        //判断是否新增出版社
        if(isset($goods['press_name'])){
            //从$goods中移除press_name并返回键值对
            $press_name=array_pull($goods,'press_name');

            //执行出版社新增操作
            $brandId=press::insertGetId(['name'=>$press_name]);

            //修改出版社id
            if($brandId){
                $goods['press_id']=$brandId;
            }else{
                return back()->with('danger','出版社新增失败')->withInput();
                die;
            }
        }

        //判断是否更新图片
        if(array_has($goods,'gimg')){
            //获取图片
            $file= $request->file('gimg');

            //图片保存路径
            $savepath='Libs/Uploads/goodsPic/';

            //上传图片
            $filename=upFile($file,$savepath);

            //判断是否上传成功
            if($filename==false){
                return back()->with('danger','图片上传失败');
                die;
            }

            //删除原有图片
            if($oldInfo('gimg')!='unknow.jpg'){
                delFile($oldInfo['gimg'],$savepath);
            }
            //追加文件名称
            $goods['gimg']=$filename;

        }

        //判断是否修改所属类别
        if($goods['cate_id']==0){
            //不更新所属类别
            array_pull($goods,'cate_id');
        }

        //更新数据库
        $res1=Goods::where('id',$id)->update($goods);

        //判断是否保存成功
        if($res1){
            return redirect('/Admin/Goods')->with('success','书籍修改成功');
        }else{
            return back()->with('danger','书籍修改失败');
        }
    }

    /**
     * 执行书籍删除的方法
     */
    public function destroy($id)
    {
        //获取图片名
        $pic=Goods::find($id)->gimg;

        //删除数据库中相应数据
        $res=Goods::destroy($id);

        //判断是否删除成功
        if($res==false){
            return back()->with('danger','书籍删除失败');
            die;
        }

        //删除书籍目录下图片
        if($pic!='unknow.jpg'){
            delFile($pic,'Libs/Uploads/goodsPic/');
        }

        //回到列表界面
        return redirect('/Admin/Goods')->with('success','书籍删除成功');
    }
    /**
     * 上架.
     */
    public function sale($id){
        $goods=Goods::find($id);
        $goods->isSale=1;
        $goods->save();
        return back()->with('success','上架成功');
    }
    /**
     * 下架.
     */
    public function unSale($id){
        $goods=Goods::find($id);
        $goods->isSale=0;
        $goods->save();
        return back()->with('success','下架成功');
    }
    /**
     * 新品.
     */
    public function new($id){
        $goods=Goods::find($id);
        $goods->isNew=1;
        $goods->save();
        return back()->with('success','设置为新品');
    }
    /**
     * 取消新品.
     */
    public function unNew($id){
        $goods=Goods::find($id);
        $goods->isNew=0;
        $goods->save();
        return back()->with('success','取消新品');
    }
    /**
     * 热销.
     */
    public function hot($id){
        $goods=Goods::find($id);
        $goods->isHot=1;
        $goods->save();
        return back()->with('success','设置为热销');
    }
    /**
     * 取消热销.
     */
    public function unHot($id){
        $goods=Goods::find($id);
        $goods->isHot=0;
        $goods->save();
        return back()->with('success','取消热销');
    }
}
