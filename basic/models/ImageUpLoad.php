<?php
<<<<<<< HEAD
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model{
=======

namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpLoad extends Model{
>>>>>>> origin/main

    public $image;

    public function rules()
    {
<<<<<<< HEAD
        return [
=======
        return[
>>>>>>> origin/main
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

<<<<<<< HEAD

=======
>>>>>>> origin/main
    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;

<<<<<<< HEAD
        if($this->validate())
=======
        if ($this->validate())
>>>>>>> origin/main
        {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
<<<<<<< HEAD

    }

    private function getFolder()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFilename()
=======
    }

    public function getFolder()
    {
      return  \Yii::getAlias('@web') . 'uploads/';
    }

    public function generateFileName()
>>>>>>> origin/main
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentImage)
    {
<<<<<<< HEAD
        if($this->fileExists($currentImage))
=======
        if ($this->fileExist($currentImage))
>>>>>>> origin/main
        {
            unlink($this->getFolder() . $currentImage);
        }
    }

<<<<<<< HEAD
    public function fileExists($currentImage)
    {
        if(!empty($currentImage) && $currentImage != null)
=======
    public function fileExist($currentImage)
    {
        if (!empty($currentImage) && $currentImage != null)
>>>>>>> origin/main
        {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage()
    {
<<<<<<< HEAD
        $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}
=======
        $fileName = $this->generateFileName();
        $this->image->saveAs($this->getFolder() . $fileName);
        return $fileName;
    }
}
>>>>>>> origin/main
