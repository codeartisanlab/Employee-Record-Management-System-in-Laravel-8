<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Dashboard
    public function index(){
        $data=Employee::select('id','created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }

        return view('index',['data'=>$data,'months'=>$months,'monthCount'=>$monthCount]);
    }

    // Login
    public function login(){
        return view('login');
    }

    // Submit Login
    public function submit_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $checkAdmin=Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        if($checkAdmin>0){
            session(['adminLogin',true]);
            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg','Invalid username/password!!');
        }
    }

    // Logout
    public function logout(){
        session()->forget('adminLogin');
        return redirect('admin/login');
    }
}
