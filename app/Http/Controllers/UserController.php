<?php

namespace App\Http\Controllers;
use App\User;
use App\SocTrans;
use Illuminate\Http\Request;
use Auth;
class UserController extends Controller
{
    //
    public function login(){
        return view();

    }
    public function authe(Request $req){
        if(Auth::attempt(['email'=> $req->email,'password'=> $req->password])){
            return view('LayoutAdmin.HomeAdmin')->with(['Societes'=>SocTrans::all()]);   
        }else{
            return view('LayoutAdmin.login')->with(['fail'=>'Email ou password est incorect']);     
        }
      }   
      public function logout(){
        Auth::logout();
        return view('LayoutAdmin.login');  

    }
    public function create(){
        return view("LayoutAdmin.AjoUser");

    }
    public function store(Request $request){
       User::create([
            'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
       ]);
       return view('LayoutAdmin.Adminuser')->with(['msg'=>'l ajout success','user'=>User::all()]);
    }
    public function edit($id)
    {
        return view('LayoutAdmin.ModifUser')->with(['user'=>User::findOrfail($id)]);
    }
    public function update(Request $request, $id)
    {
        $soc=User::findOrfail($id);
        if($request->password!=null){
            $soc->password=bcrypt($request->password);
       }
      
            $soc->name=$request->name; 
            $soc->email=$request->email;
           
           
            
            $soc->update();
           
    
    return view('LayoutAdmin.Adminuser')->with(['msg'=>'modification success','user'=>User::all()]);
       
    }
    public function destroy($id)
    {
        $soc=User::findOrfail($id);
        $soc->delete();
        return view('LayoutAdmin.AdminUser')->with(['msg'=>'suppression success','user'=>User::all()]);
    }
   
}
