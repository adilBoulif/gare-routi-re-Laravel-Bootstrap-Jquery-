<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validationSociete;
use App\SocTrans;
class SocTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view ("LayoutAdmin.AjouterSoc");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validationSociete $request)
    {
        $image = null;
        if ($files = $request->file('image')) {
            $proImage = time().'.'.$files->getClientOriginalExtension(); 
            $request->image->move(public_path('images'), $proImage);
        
            $image = $proImage;}
      SocTrans::create([
        'nom'=>$request->nom,
        'email'=>$request->email,
        'tel'=>$request->tel,
       'adresse'=>$request->adresse,
        'image'=>$image
      ]);
      return view('LayoutAdmin.HomeAdmin')->with(['Societes'=>SocTrans::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('LayoutAdmin.ModifSoc')->with(['soc'=>SocTrans::findOrfail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(validationSociete $request, $id)
    {
        $soc=SocTrans::findOrfail($id);
        if($request->image==null){
        if($request->hasFile('image')){
            $files = $request->file('image');
            $proImage = time().'.'.$files->getClientOriginalExtension(); 
            $request->image->move(public_path('images'), $proImage);
        
            $image = $proImage;  
            $soc->image=$image;
        }}
      
            $soc->nom=$request->nom; 
            $soc->email=$request->email;
            $soc->tel=$request->tel;
            $soc->adresse=$request->adresse;
           
            
            $soc->update();
           
    
    return view('LayoutAdmin.HomeAdmin')->with(['msg'=>'modification success','Societes'=>SocTrans::all()]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soc=SocTrans::findOrfail($id);
        $soc->delete();
        return view('LayoutAdmin.HomeAdmin')->with(['msg'=>'suppression success','Societes'=>SocTrans::all()]);
    }
}
