<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resources;

class VideoController extends Controller
{
    public function index()
    {
        $videos=Resources::where('type','video')->get();
        return view('resources.video',compact('videos'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'videos.*' => 'required|mimes:mp3,wmv,m4a'
        //     ]);
            // dd($request->file('videos'));
            $file= new Resources();
            if($files=$request->file('videos')) {
                foreach($files as $f){
                    $name = time().'_'.$f->getClientOriginalName();
                    $filePath = $f->storeAs('videos', $name, 'public');
                    $file->user_id=auth()->user()->id;
                    $file->title = time().'_'.$f->getClientOriginalName();
                    $file->type = 'video';
                    $file->location = $filePath;
                    $file->save();
                }
    
                return response([
                    'status'=>'success'
                ]);
            }
    }
    public function destroy(Resources $video)
    {
        if($video->delete())
        return response([
            'status'=>'success',
            'message'=>'Teacher Deleted Successfully'
        ]);
    }
}
