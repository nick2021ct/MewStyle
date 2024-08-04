<?php 
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait{
    public function uploadImage(Request $request,$inputName, $path){
        if($request->hasFile($inputName)){
           
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalName();
            $imageName = uniqid().'_'.$ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    public function updateImage(Request $request, $inputName, $path, $oldPath=null){

        if($request->hasFile($inputName)){
           
            if(File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalName();
            $imageName = uniqid().'_'.$ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
            return $oldPath;
        
    }

    public function deleteImage(?string $path){
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }

    public function uploadManyImages(Request $request, $inputName, $path, $model, $modelInput)
    {
        $uploadedPaths = [];
        if($request->hasFile($inputName)){
            foreach ($request->file($inputName) as $image){
                $ext = $image->getClientOriginalName();
                $imageName = uniqid().'_'.$ext; 
                $image->move(public_path($path), $imageName);    
                $fullPath = $path . $imageName;

                $model->create([$modelInput => $fullPath]);

                $uploadedPaths[] = $fullPath;
            }
        }
        return $uploadedPaths;

    }

    public function updateManyImages(Request $request, $inputName, $path, $model, $modelInput, $oldImages)
    {
        $uploadedPaths = [];
        if($request->hasFile($inputName)){
            foreach ($request->file($inputName) as $image){

                foreach ($oldImages as $oldImage) {
                    if (File::exists($oldImage)) {
                        File::delete($oldImage);
                    }
                    $model->where($modelInput, $oldImage)->delete();
                }

                $ext = $image->getClientOriginalName();
                $imageName = uniqid().'_'.$ext; 
                $image->move(public_path($path), $imageName);    
                $fullPath = $path . $imageName;

                $model->create([$modelInput => $fullPath]);

                $uploadedPaths[] = $fullPath;
            }
        }
        return $uploadedPaths;

    }

    
}
