<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profiles;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers=User::with('profile')->where('usertype','teacher')->get();
        return view('admin.teachers.index',compact('teachers'));
    }
    public function store(RegisterRequest $request)
    {
        $data=array_merge($request->validated(),['usertype' => 'teacher','password' => Hash::make($request->password)]);
        $user = User::create($data);
        if($user){
            $data=array_merge($request->validated(),['user_id' => $user->id]);
            Profiles::create($data);
            return response([
                'status'=>'success',
                'message'=>'Teacher Added Successfully'
            ]);
        }
    }
    public function destroy(User $teacher)
    {
        if($teacher->delete())
            return response([
                'status'=>'success',
                'message'=>'Teacher Deleted Successfully'
            ]);
        
    }
}
