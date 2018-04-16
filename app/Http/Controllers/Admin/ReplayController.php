<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Replay;
use App\Model\User;

class ReplayController extends Controller
{
    /**
     * 加载回复列表.
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
                    $data['search']=$condition->id;
                }
            }
            //获得评论总数
            $count = Replay::where($data['searchCondition'],$data['search'])->count();

            //获取评论信息
            $res = Replay::where($data['searchCondition'],$data['search'])->paginate(10);



        }else{
            $res=Replay::paginate(10);

            $count=Replay::count();

            //获得url
            $url='';
        }

        $page=ceil($count/10);

        //解析
        return view('Admin.Replay.index',compact('res','count','page','url'));
    }



    /**
     * 删除回复.
     */
    public function destroy($id)
    {
        $res=Replay::destroy($id);

        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('danger','删除失败');
        }
    }
}
