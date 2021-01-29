<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

//Khai báo để dùng chung Storage thông qua Traits
trait StorageImageTrait{
    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        //check file có đc upload k
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs($foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }
    //Upload nhieu file
    public function storageTraitUploadMutiple($file, $foderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($foderName . '/' . auth()->id(), $fileNameHash);
        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $dataUploadTrait;
    }
}
