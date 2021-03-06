<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\User;


class CommentController extends Controller
{
    /**
     * 加载评论列表.
     */
    public function index(Request $request)
    {
        //判断用户是否搜索
        $data=$request->all();

        if(isset($data['search'])){
            //获得url
            $url="&search=".$data['search']."&searchCondition=".$data['searchCondition'];

            //判断搜索条件是否为状态
            if($data['searchCondition']=='user_id'){
                $condition=User::where('name',$data['search'])->first();
                if(!empty($condition)){
                    $count=Comment::where('user_id',$condition->id)->count();
                    $res=Comment::where('user_id',$condition->id)->paginate(10);
                }
            }else if($data['searchCondition']=='goodsid'){
                $count=Comment::where('bmId',$data['search'])->where('cmtType',1)->count();
                $res=Comment::where('bmId',$data['search'])->where('cmtType',1)->paginate(10);
            }else if($data['searchCondition']=='articleid'){
                $count=Comment::where('bmId',$data['search'])->where('cmtType',0)->count();
                $res=Comment::where('bmId',$data['search'])->where('cmtType',0)->paginate(10);
            }else{
                //获得评论总数
                $count = Comment::where($data['searchCondition'],$data['search'])->count();

                //获取评论信息
                $res = Comment::where($data['searchCondition'],$data['search'])->paginate(10);
            }


        }else{
            $res=Comment::paginate(10);

            $count=Comment::count();

            //获得url
            $url='';
        }

        $page=ceil($count/10);

        //解析
        return view('Admin.Comment.index',compact('res','count','page','url'));
    }



    /**
     * 删除评论.
     */
    public function destroy($id)
    {
        //同时删除该评论下的回复
        Comment::find($id)->replay()->delete();

        //删除评论
        $res=Comment::destroy($id);


        if($res){
            return redirect('Admin/Comment')->with('success','评论删除成功');
        }else{
            return back()->with('danger','评论删除失败');
        }
    }
}
