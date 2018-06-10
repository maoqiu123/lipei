<?php
/**
 * Created by PhpStorm.
 * User: maoqiu
 * Date: 2018/6/10
 * Time: 下午3:07
 */
namespace app\index\controller;

use think\Request;
use think\Validate;
use think\Db;

class Upload
{
    public function uploadAdd(){
        $request = Request::instance();
        $data = $request->param();
        $validate = new Validate([
            'name'  => 'require|max:25',
            'id_card' => 'require'
        ]);
        if (!$validate->check($data)) {
            return json([
                'code'=>1001,
                'message'=>$validate->getError()
            ]);
        }
        $id = Db::table('user_info')->insertGetId($data);
        return view('index',['data'=>$data]);
    }


}
