<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profiles;

class StudentsController extends Controller
{
    public function __construct(Request $request)
    {
    }

    public function index()
    {
        $students=User::with('profile')->where('usertype','student')->get();
        return view('student.index',compact('students'));
    }
    
    public function store(RegisterRequest $request)
    {
        $data=array_merge($request->validated(),['usertype' => 'student','password' => Hash::make($request->password)]);
        $user = User::create($data);
        if($user){
            $data=array_merge($request->validated(),['user_id' => $user->id]);
            Profiles::create($data);
            return response([
                'status'=>'success',
                'message'=>'Student Added Successfully'
            ]);
        }
    }
}
