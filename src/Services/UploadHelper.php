<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadHelper{
    /**
     * @var string
     */
    private $uploadPath;

    /**
     * Upload Constructor
     */
    public function __construct(string $uploadPath)
    {
        $this->uploadPath = $uploadPath;
    }

    public function uploadImage(UploadedFile $file){
        $path = $this->uploadPath;
        $nameFile = uniqid().'-'.$file->getClientOriginalName();
        $file->move($path, $nameFile);

        return $nameFile;
    }
}