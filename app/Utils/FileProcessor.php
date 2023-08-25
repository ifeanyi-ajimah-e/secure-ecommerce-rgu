<?php

namespace App\Utils;

use Illuminate\Support\Facades\File;

class FileProcessor{

    public static function storeImage($theImage, $folder = 'images', $path = 'allimages') : string {
            $imageName1 = time(). $theImage->getClientOriginalName();
            $imageDirPath1 = '/'. $folder .'/'. $path. '/';
            $theImage->move( $folder .'/' .$path ,$imageName1);
            $imageId = $imageDirPath1 . $imageName1;
            
            return $imageId;
    }

    public static function storeFile($theDocument, $folder = 'documents', $path = 'alldocuments') : string {
            $documentName = time(). $theDocument->getClientOriginalName();
            $imageDirPath1 = '/'. $folder .'/'. $path. '/';
            $theDocument->move( $folder .'/' .$path ,$documentName);
            $fileId = $imageDirPath1 . $documentName;
            
            return $fileId;
    }

    public static function updateImage($newImage, $oldImagePath = 'null', $folder = 'images', $path = 'allimages') : string{ 
            
        $imagePath = public_path($oldImagePath);
        if(File::exists($imagePath)) {
            File::delete($imagePath);
        }
       
        $imageName1 = time(). $newImage->getClientOriginalName();
            $imageDirPath1 = '/'. $folder .'/'. $path. '/';
            $newImage->move( $folder .'/' .$path ,$imageName1);
            $imageId = $imageDirPath1 . $imageName1;
            
            return $imageId;
    }

}






