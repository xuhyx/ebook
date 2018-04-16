<?php
//上传文件
function upFile($file,$filePath){

    if ($file->isValid()) {

        //获取文件的原文件名 包括扩展名
        $originalName = $file->getClientOriginalName();

        //获取文件的扩展名
        $ext=$file->getClientOriginalExtension();

        //获取文件的类型
        $type=$file->getClientMimeType();

        //获取文件的绝对路径，但是获取到的在本地不能打开
        $realPath =$file->getRealPath();

        //要保存的文件名 时间+扩展名
        $filename=date('YmdHis') . '_' . uniqid() .'.'.$ext;

        $savepath = config('constants.img_uf') .$filePath;

        //保存文件
        $bool= $file->move($savepath,$filename);

        //判断是否上传成功
        if($bool==false){
            return false;
        }
        //返回文件名
        return $filename;
    }else{
        return false;
    }
}
//删除图片
function delFile($filename,$savepath){
    $path=config('constants.img_uf') .$savepath.$filename;
    if(file_exists($path)){
        @unlink ($path);
    }
}
//判断图片类型
function picType($type){
    switch ($type){
        case 0:
            return "首页图片";
        break;
        case 1:
            return "广告图片";
        break;
        case 2:
            return "详情页图片";
        break;
        default:
        break;
    }
}