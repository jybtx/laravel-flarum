<?php

namespace App\Handlers;

use Image;
use  Illuminate\Support\Str;

class ImageUploadHandler
{
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    /**
     * [上传图片]
     * @author jybtx
     * @date   2020-06-19
     * @param  [type]     $file      [description]
     * @param  [type]     $folder    [description]
     * @param  boolean    $max_width [description]
     * @return [type]                [description]
     */
    public function save($file, $folder, $max_width = false)
    {

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 如果上传的不是图片将终止操作
        if ( !in_array($extension, $this->allowed_ext)) return false;

        // 将图片移动到我们的目标存储路径中
        $thump = $file->store("public/$folder/". date("Ym/d", time()));

        // 如果限制了图片宽度，就进行裁剪
        if ($max_width && $extension != 'gif') {
            // 此类中封装的函数，用于裁剪图片
            $this->reduceSize(public_path() .str_replace('public', '/storage',$thump), $max_width);
        }        
        return str_replace('public', '/storage',$thump);
    }
    /**
     * [裁剪图片]
     * @author jybtx
     * @date   2020-06-19
     * @param  [type]     $file_path [description]
     * @param  [type]     $max_width [description]
     * @return [type]                [description]
     */
    public function reduceSize($file_path, $max_width)
    {
        // 先实例化，传参是文件的磁盘物理路径
        $image = Image::make($file_path);

        // 进行大小调整的操作
        $image->resize($max_width, null, function ($constraint) {

            // 设定宽度是 $max_width，高度等比例缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });

        // 对图片修改后进行保存
        $image->save();
    }
}