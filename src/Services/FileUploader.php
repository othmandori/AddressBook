<?php


namespace App\Services;


use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $file_upload_dir;

    public function __construct($file_upload_dir)
    {
        $this->file_upload_dir = $file_upload_dir;
    }

    public function upload(UploadedFile $file){
        $file_name = uniqid() . "." . $file->getClientOriginalExtension();
        $file->move($this->file_upload_dir, $file_name);
        return $file_name;
    }

    public function remove($name){
        if ($name == null){
            return;
        }
        $filesystem = new Filesystem();
        $filesystem->remove([$this->file_upload_dir.'/'.$name]);
    }
}