<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use App\Models\Role;
use Illuminate\Support\Facades\Storage;


class UploadImageController extends Controller
{
    public function storage_upload($file,$file_base_path)
    {
              
        

        $folderPath = storage_path('/');  
        // dd($folderPath);

        $path = storage_path('/').''.$file_base_path;
        
        if(!File::isDirectory($path)){

            File::makeDirectory($path, 0777, true, true);
    
        }        
   
        //$file->move($destinationPath,$file->getClientOriginalName());
        $number = mt_rand(1000000000, 9999999999);
        $fileName = $number.''.time().'.'.$file->getClientOriginalExtension();  
        //dd(public_path('uploads'));
        $destination_path = $folderPath.''.$file_base_path;

       $file->move($destination_path, $fileName);
        
       $File_final_path = $file_base_path.''.$fileName;

    //    dd($File_final_path);
        
       return $File_final_path;  

    }

    
}
