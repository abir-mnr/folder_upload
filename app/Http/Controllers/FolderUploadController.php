<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FolderUploadController extends Controller
{
    public function index(){
        return view('folderupload');
    }

    public function upload(Request $request){
        $files = $request->folder_upload;
        $date = new \DateTime('NOW', new \DateTimeZone("GMT+6"));
        $dateString = $date->format('Y-m-d-H-i-s');
        $dir = 'images/'.$dateString.'/';
        if(!empty($files)){
            mkdir(public_path($dir), 0777, true);
        }
        foreach($files as $file){
            $extentionPos = strripos($file->getClientOriginalName() ,'.');
            $name = substr($file->getClientOriginalName(), 0 , $extentionPos);
            $nameArr = explode('-', $name);
            try{
                file_put_contents(public_path($dir.$nameArr[0].'/'.$file->getClientOriginalName()), file_get_contents($file));
            }catch(\Exception $e){
                mkdir(public_path($dir.$nameArr[0].'/'), 0777, true);
                file_put_contents(public_path($dir.$nameArr[0].'/'.$file->getClientOriginalName()), file_get_contents($file));
            }
        }
        dd('uploaded');
    }
}
