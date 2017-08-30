<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Attach;

class UploadController extends Controller
{
    /**
     * 上传图片
     * @param Request $request
     * @return array
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('Filedata') && $request->file('Filedata')->isValid()) {
            $file = $request->file('Filedata');
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getClientSize();
//            $allows = array('png', 'jpeg', 'jpg');
//            if (!in_array($extension, $allows)) {
//                return ['info' => 0, 'msg' => '只能上传图片'];
//            }
            $max_size = 1024 * 1024 * 3;
            if ($fileSize > $max_size) {
                return ['info' => 0, 'msg' => '图片大小超出内存'];
            }
            $newImagesName = md5(time()) . random_int(5, 5) . "." . $extension;

            $file_path = 'upload/images';
            $path = $file->move($file_path, $newImagesName);
            $fileName = basename($path);

            return ['info' => 1, 'img' => '/upload/images/' . $fileName];
        }

    }

    /**
     * 上传多个附件
     * @param Request $request
     * @return array
     */
    public function uploadFile(Request $request)
    {
        if ($request->hasFile('Filedata') && $request->file('Filedata')->isValid()) {
            $file = $request->file('Filedata');
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getClientSize();
//            $allows = array('png', 'jpeg', 'jpg');
//            if (!in_array($extension, $allows)) {
//                return ['info' => 0, 'msg' => '只能上传图片'];
//            }
            $max_size = 1024 * 1024 * 3;
            if ($fileSize > $max_size) {
                return ['info' => 0, 'msg' => '附件大小超出内存'];
            }
//            if ($request->len > 3) {
//                return ['info' => 0, 'msg' => '一次最多上传三个'];
//            }
            $newImagesName = md5(time()) . random_int(5, 5) . "." . $extension;

            $file_path = 'upload/attach';
            $path = $file->move($file_path, $newImagesName);
            $fileName = basename($path);
            $attach = Attach::create(['url' => 'upload/attach/' . $fileName]);

            return ['info' => 1, 'img' => 'upload/attach/' . $fileName, 'attach_id' => $attach->id];
        }

    }

    /**
     * 文件下载
     */
    public function fileDownload($id)
    {
        $attach = Attach::where('id', $id)->first();
        return response()->download($attach['url']);
    }

    /**
     * 文件删除
     * @param $id
     */
    public function fileDelete(Request $request)
    {
        $id = $request->get('id');
        $attach = Attach::where('id', $id)->first();
        if (!$attach) {
            return ['info' => 0, 'msg' => '文件没有上传成功'];
        }
        if (is_file($attach['url'])) {
            unlink($attach['url']);
            Attach::destroy($request->id);
            return ['info' => 1, 'msg' => '删除成功'];

        }


    }

    /**
     *无限分类
     * @param $data
     * @param int $parent_id
     * @param int $count
     * @return array
     */
    public function tree(&$data, $parent_id = 0, $count = 1)
    {
        static $treeList;
        foreach ($data as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                $value['count'] = $count;
                $treeList [] = $value;
                unset($data[$key]);
                tree($data, $value['id'], $count + 1);
            }
        }
        return $treeList;
    }
}
