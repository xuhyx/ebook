<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;
use App\Http\Requests\UpdateArticle;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Cate;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * 加载文章列表.
     */
    public function index(Request $request)
    {
        //判断用户是否搜索
        $data=$request->all();
        if(isset($data['search'])){
            //获得url
            $url="&search=".$data['search']."&searchCondition=".$data['searchCondition'];

            //判断搜索条件
            if($data['searchCondition']=='nickname'){
                $user=User::where('name',$data['search'])->first();
                if(!empty($user)){
                    $articles=User::find($user['id'])
                        ->myArticle()
                        ->orderBy('created_at','desc')
                        ->paginate(10);

                    $count=User::find($user['id'])->myArticle()->count();
                }else{
                    $articles=[];
                    $count=0;
                }
            }else if($data['searchCondition']=='cate'){
                $cate=Cate::where('name',$data['search'])->first();
                if(!empty($cate)){
                        $articles=Cate::find($cate['id'])
                            ->article()
                            ->orderBy('created_at','desc')
                            ->paginate(10);
                        $count=Cate::find($cate['id'])->article()->count();
                }else{
                    $articles=[];
                    $count=0;
                }
            }else if($data['searchCondition']=='state'){
                $condition=$data['search']=='私有'?0:1;
                $count=Article::where('state',$condition)->count();
                $articles=Article::where('state',$condition)
                    ->orderBy('created_at','desc')
                    ->paginate(10);
            }else if($data['searchCondition']=='flag'){
                if($condition=$data['search']=='未审核'){
                    $condition=0;
                }else if($condition=$data['search']=='审核'){
                    $condition=1;
                }else{
                    $condition=2;
                }

                $count=Article::where('flag',$condition)->count();
                $articles=Article::where('flag',$condition)
                    ->orderBy('created_at','desc')
                    ->paginate(10);
            }else{
                //获取文章总数
                $count=Article::where($data['searchCondition'],'like','%'.$data['search'].'%')->count();
                //获取文章信息
                $articles=Article::where($data['searchCondition'],'like','%'.$data['search'].'%')
                    ->orderBy('created_at','desc')
                    ->paginate(10);
            }

        }else{
            //获取文章总数
            $count=Article::count();

            //获取文章信息
            $articles=Article::orderBy('created_at','desc')
                ->paginate(10);
            //获得url
            $url='';
        }


        //计算页数
        $page=ceil($count/10);

        //解析模板
        return view('Admin/Article/index',['res'=>$articles,'count'=>$count,'page'=>$page,'url'=>$url]);
    }
    /**
     * 加载我发布的文章列表.
     */
    public function myArticle(Request $request)
    {
        //判断用户是否搜索
        $data=$request->all();
        if(isset($data['search'])){
            if($data['searchCondition']=='cate'){
                $cate=Cate::where('name',$data['search'])->first();
                if(!empty($cate)){
                    $myArticle=Cate::find($cate['id'])
                        ->article()
                        ->where('id',Auth::id())
                        ->orderBy('created_at','desc')
                        ->paginate(10);
                    $count=Cate::find($cate['id'])->article()->count();
                }else{
                    $myArticle=[];
                    $count=0;
                }
            }else if($data['searchCondition']=='state'){
                $condition=$data['search']=='待审核'?0:1;
                $myArticle=Auth::user()
                    ->myArticle()
                    ->where('state',$condition)
                    ->orderBy('created_at','desc')
                    ->paginate(10);
                $count=Auth::user()->myArticle()->where('state',$condition)->count();
            }else if($data['searchCondition']=='flag'){
                if($condition=$data['search']=='未审核'){
                    $condition=0;
                }else if($condition=$data['search']=='审核'){
                    $condition=1;
                }else{
                    $condition=2;
                }

                $count=Auth::user()->myArticle()->where('flag',$condition)->count();
                $myArticle=Auth::user()
                    ->myArticle()
                    ->where('flag',$condition)
                    ->orderBy('created_at','desc')
                    ->paginate(10);
            }else{
                //获取文章总数
                $count=Auth::user()->myArticle()->where($data['searchCondition'],'like','%'.$data['search'].'%')->count();
                //获取文章信息
                $myArticle=Auth::user()
                    ->myArticle()
                    ->where($data['searchCondition'],'like','%'.$data['search'].'%')
                    ->orderBy('created_at','desc')
                    ->paginate(10);
            }
        }else{
            //获得我发布的文章
            $myArticle=Auth::user()->myArticle()->paginate(10);

            //获取文章总数
            $count=Auth::user()->myArticle()->count();
        }

        //计算页数
        $page=ceil($count/10);

        //解析模板
        return view('Admin/Article/myArticle',['res'=>$myArticle,'count'=>$count,'page'=>$page]);
    }
    /**
     * 加载文章添加界面.
     */
    public function create()
    {
        //获得分类数组
        $cates=Cate::where('pid',0)->get()->toArray();

        //解析模板
        return view('Admin/Article/add',compact('cates'));
    }

    /**
     * 执行文章添加.
     */
    public function store(StoreArticle $request)
    {
        //获取添加文章的信息
        $data=$request->except('_token','picture');

        //设置闪存session
        $request->flashOnly('title','descr','content');

        //获取图片
        $file= $request->file('picture');

        //上传路径
        $savepath='Libs/Uploads/articlePic/';

        //上传图片
        $filename=upFile($file,$savepath);

        //判断是否上传成功
        if($filename==false){
            return bakc()->with('warning','图片上传失败')->withInput();
            die;
        }

        //追加创建时间及更新时间
        $data['created_at']=date("Y-m-d H:i:s");
        $data['updated_at']=date("Y-m-d H:i:s");

        //追加图片名称
        $data['picture']=$filename;

        //追加文章作者ID
        $data['user_id']=Auth::id();

        //上传数据库
        $res1=Article::insert($data);

        //判断是否保存成功
        if($res1){
            return redirect('/Admin/Article')->with('success','文章创建成功');
        }else{
            //删除图片
            delFile($filename,$savepath);
            return back()->with('warning','文章创建失败')->withInput();
        }
    }

    /**
     * 加载文章详情.
     */
    public function show($id)
    {
        //获得编辑信息
        $data=Article::find($id);

        //解析模板
        return view('Admin/Article/details',compact('data'));
    }

    /**
     * 加载编辑界面.
     */
    public function edit($id)
    {
        //获得编辑信息
        $data=Article::find($id);

        //获得所属分类信息
        $cates=Cate::where('pid',0)->get()->toArray();

        //解析模板
        return view('Admin/Article/edit',compact('data','cates'));
    }

    /**
     * 修改文章.
     */
    public function update(UpdateArticle $request, $id)
    {
        //获取需修改文章信息
        $data=$request->except('_token','_method');

        //获取编辑前的信息
        $oldInfo=Article::find($id);

        //判断是否更新图片
        if(array_has($data,'picture')){

            //获取图片信息
            $file= $request->file('picture');

            //图片保存路径
            $savepath='Libs/Uploads/articlePic/';

            //保存图片
            $filename=upFile($file,$savepath);

            //判断是否上传成功
            if($filename==false){
                return back()->with('danger','图片上传失败');
                die;
            }

            //删除原有图片
            if($oldInfo['picture']!='unknow.jpg'){
                delFile($oldInfo['picture'],$savepath);
            }

            //追加文件名称
            $data['picture']=$filename;
        }

        //判断是否修改所属类别
        if($data['cate_id']==0){
            //不更新所属类别
            array_pull($data,'cate_id');
        }

        //更新数据库
        $res1=Article::where('id',$id)->update($data);

        //判断是否保存成功
        if($res1){
            return redirect('/Admin/Article/myArticle')->with('success','文章修改成功');
        }else{
            return back()->with('danger','文章修改失败');
        }
    }

    /**
     * 执行文章删除.
     */
    public function destroy($id)
    {
        //获取图片名
        $pic=Article::find($id)->picture;

        //删除数据库中相应数据
        $res=Article::destroy($id);

        //判断是否删除成功
        if($res==false){
            return back()->with('danger','文章删除失败');
            die;
        }

        //删除文章目录下图片
        if($pic!='unknow.jpg'){
            delFile($pic,'Libs/Uploads/articlePic/');
        }

        //回到列表界面
        return redirect('/Admin/Article')->with('success','文章删除成功');
    }
    /**
     * 执行审核.
     */
    public function verify($id)
    {
        $Article=Article::find($id);
        $Article->flag=1;
        $Article->save();

        return redirect("/Admin/Article")->with('success','文章已通过审核');


    }
    /**
     * 执行锁定.
     */
    public function unVerify($id)
    {
        $Article=Article::find($id);
        $Article->flag=2;
        $Article->save();

        return redirect("/Admin/Article")->with('success','文章已锁定');

    }
}
