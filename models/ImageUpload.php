<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
	public $image;

	public function rules()
	{
		return [
			// [['image'],'required'],
			[['image'],'file','extensions'=>'jpeg,jpg,png'],
		];
	}

	public function uploadFile(UploadedFile $file, $currentImage)
	{
		$this->image = $file;

		if($this->validate())
		{
			$this->deleteCurrentImage($currentImage); // если заменяем одну картинку другой, то удаляем старую картинку.
			return $this->DownloadImage(); // возвращаем результат работы uploadFile (имя картинки), чтобы потом сохранить это имя в базе данных.
		}

	}

	private function getFolder()
	{
		return Yii::getAlias('@web').'uploads/';
	}

	private function generateFilename()
	{
		return strtolower(md5(uniqid($this->image->baseName)).'.'.$this->image->extension);
	}

	public function deleteCurrentImage($currentImage)
	{
		if($this->fileExists($currentImage))
		{
			unlink($this->getFolder().$currentImage);
		}
	}

	public function fileExists($currentImage)
	{
		if(!empty($currentImage) && $currentImage != null)
		{
			return file_exists($this->getFolder().$currentImage);
		}
	}

	public function DownloadImage()
	{
		$filename = $this->generateFilename(); // генерируем имя загружаемой картинки
		$this->image->saveAs($this->getFolder().$filename); // сохраняем картинку в папку
		return $filename; // возвращаем имя картинки, чтобы затем сохранить ее в базе данных
	}
}