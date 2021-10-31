<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use App\Http\Resources\UploadResource;
class UploadsController extends Controller
{
    public function index()
    {
        $upload = upload::all();
        return response([ 'file uploads' =>
        UploadResource::collection($upload),
        'message' => 'Get all file uploads Successful'], 200);
    }
    function store_image(Request $request){
        $upload = new Upload();
        $image=$request->file('file');
        if ($request->hasFile('file')) {
            $new_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/image'),$new_name);
            $path = "uploads/image/$new_name";
            $upload->file = $path;
            $upload->save();
            return response([
                'file' => new UploadResource($upload),
                'message' => 'Upload success'],
                200);
        }else {
            return response()->json('Upload Null');
        }
    }
}
