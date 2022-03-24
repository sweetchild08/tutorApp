<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Resources;

class AudioController extends Controller
{
    public function index()
    {
        $audios=Resources::where('type','audio')->get();
        return view('resources.audio',compact('audios'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'audios.*' => 'required|mimes:mp3,wmv,m4a'
        //     ]);
            // dd($request->file('audios'));
            $file= new Resources();
            if($files=$request->file('audios')) {
                foreach($files as $f){
                    $name = time().'_'.$f->getClientOriginalName();
                    $filePath = $f->storeAs('audios', $name, 'public');
                    $file->user_id=auth()->user()->id;
                    $file->title = time().'_'.$f->getClientOriginalName();
                    $file->type = 'audio';
                    $file->location = $filePath;
                    $file->save();
                }
    
                return response([
                    'status'=>'success'
                ]);
            }
    }
    public function destroy(Resources $audio)
    {
        if(Storage::disk('public')->delete($audio->location))
            if($audio->delete()){
                
                return response([
                    'status'=>'success',
                    'message'=>'Audio Deleted Successfully'
                ]);
            }
    }
}
