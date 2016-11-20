<?php


namespace app\models;

use yii\base\Model;

class Upload extends Model{
	public $uploadFile;

	public function rules(){
		return [
                        //单文件上传规则  extensions 表示文件的扩展名，即后缀
			//['uploadFile' , 'file' , 'skipOnEmpty' => false , 'extensions' => 'jpg,png,jpeg' , 'uploadRequired' => '必须上传文件'],
                        //多文件上传规则
                        ['uploadFile' , 'file' , 'skipOnEmpty' => false , 'extensions' => 'jpg,png,jpeg' , 'uploadRequired' => '必须上传文件' , 'maxFiles' => 4],
		];
	}
        /**
         * 单文件上传
         * @return boolean
         */
	public function upload(){
            if($this->validate()){

                    //中文名称有点问题,上传后文件名乱码
                    //$this->uploadFile->saveAs('../runtime/' . $this->uploadFile->baseName . '.' . $this->uploadFile->extension);
                    //可以改为这种方式保存图片
                    $file_name = time().rand(0, 999999);
                    $this->uploadFile->saveAs('../runtime/' . $file_name . '.' . $this->uploadFile->extension);
                    return true;
            }
            return false;
	}    
        /**
         * 多文件上传
         * @return boolean
         */
	public function uploads(){
            if($this->validate()){
                //遍历取出数组中的文件并保存
                foreach($this->uploadFile as $file){
                    //中文名称有点问题,上传后文件名乱码
                    //$file -> saveAs('../runtime/'.$file->baseName . '.' . $file->extension);
                    //可以改为这种方式保存图片
                    $file_name = time().rand(0, 999999);                    
                    $file -> saveAs('../runtime/'.$file_name . '.' . $file->extension);
                }
                return true;
            }

            return false;
	}
        

}
