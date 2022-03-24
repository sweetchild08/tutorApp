<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profiles;

class PrincipalController extends Controller
{
    public function index()
    {
        $principals=User::with('profile')->where('usertype','principal')->get();
        return view('admin.principal.index',compact('principals'));
    }
    public function store(RegisterRequest $request)
    {
        $data=array_merge($request->validated(),['usertype' => 'principal','password' => Hash::make($request->password)]);
        $user = User::create($data);
        if($user){
            $data=array_merge($request->validated(),['user_id' => $user->id]);
            Profiles::create($data);
            return response([
                'status'=>'success',
                'message'=>'Principal Added Successfully'
            ]);
        }
    }
    public function destroy(User $principal)
    {
        if($principal->delete())
            return response([
                'status'=>'success',
                'message'=>'Principal Deleted Successfully'
            ]);
        
    }
}
