<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    private function getDataPath(){
        $cwd=getcwd();
        $path=$cwd."/".C('DATA_PATH');
        return $path;
    }


    public function index(){
        $basePath=$this->getDataPath();
        $dir=I('dir');
        if($dir==""){
            $current=$basePath;
            $this->title="code browser";
        }else{
            $current=base64_decode($dir);
            $array=explode("/",$current);
            $this->title=$array[count($array)-1];
        }
        $files=scandir($current);
        $list=[];
        foreach($files as $key=>$val){
            if($val!="." && $val!=".."){
                $list[]=[
                    'name'=>$val,
                    'is_file'=>is_file($current."/".$val),
                    'dir'=> $current."/".$val
                ];
            }
        }
        $this->list=$list;
        $this->current=$basePath;
        $this->display();
    }



    public function view(){
        $dir=I('dir');
        if($dir==""){
            die();
        }else{
            $current=base64_decode($dir);
        }
        $array=explode("/",$current);
        $this->title=$array[count($array)-1];
        $text=file_get_contents($current);
        $this->text=$text;
        $this->display();

    }

}