<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller 
{
    public function index()
    {


    	$this->display();
    	
    	
    }

    //七牛驱动上传
    public function uploadFile()
    {
    	$setting = C('UPLOAD_FILE_QINIU');


    	//转码时使用的队列名称 
  		$pipeline = '';

  		//要进行转码的转码操作   转换成mp4
  		$fops = "avthumb/mp4/s/640x360/vb/1.25m";

  		//可以对转码后的文件进行使用saveas参数自定义命名，当然也可以不指定文件会默认命名并保存在当间
  		$savekey = '###';
  		$fops = $fops.'|saveas/'.$savekey;

  		$policy = array(

  			'persistentOps' => $fops,
  			'persistentPipeline' => $pipeline,
  		);

  		$setting['driverConfig'] = array_merge($setting['driverConfig'], $policy);


    	$Upload = new \Think\Upload($setting);

    	$info = $Upload->uploadOne($_FILES['pic']);

    	$path = str_replace('/','_',$info['file']['savepath']);

    	$filename = $path.$info['file']['savename'];//七牛云保存的文件名称

    	if (!$info) {
    		$data = ['status'=>0,'msg'=>'上传失败，'.$Upload->getError()];
    	} else {

    		$data = [
    			'status'=>1,
    			'msg'   => '上传成功',
    			'size'  => $info['size'],
    			'ext'  => $info['ext'],
    			'link'  => $info['url'],
    		];
    	}

    }


}	
