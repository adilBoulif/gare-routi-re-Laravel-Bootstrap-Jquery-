<?php

namespace App\Http\Controllers;
use App\SocTrans;
use App\Trajet;
use Illuminate\Http\Request;
use App\Http\Requests\validationTrajet;
class TrajetController extends Controller
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
        return view('LayoutAdmin.AjoTrajet')->with(['societes'=>SocTrans::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validationTrajet $request)
    {
        Trajet::create([
            'depart'=>$request->depart,
            'destination'=>$request->destination,
            'h_dep'=>$request->h_dep,
           'h_dest'=>$request->h_dest,
            'd_dep'=>$request->d_dep,
            'prix'=>$request->prix,
            'SocTransid'=>$request->SocTransid
          ]);
          return redirect('/Admin/Trajet');
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
        return view('LayoutAdmin.ModifTrajet')->with(['tra'=>Trajet::findOrfail($id),'societes'=>SocTrans::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tra=Trajet::findOrfail($id);
        
      
        $tra->depart=$request->depart;
        $tra->destination=$request->destination;
        $tra->h_dep=$request->h_dep;
        $tra->h_dest=$request->h_dest;
        $tra->d_dep=$request->d_dep;
        $tra->prix=$request->prix;
        $tra->SocTransid=$request->SocTransid;
            
           
            
        $tra->update();
           
    
        return redirect('/Admin/Trajet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $soc=Trajet::findOrfail($id);
        $soc->delete();
        return redirect('/Admin/Trajet');
    }
    public function recherche(Request $request)
    {
       
        
    /*   
        $query->where([
            ['depart', '=', $request->depart],
            ['destination', '=', $request->destination]
        ])*/
        $pass=$request->num;
        return view('LayoutAdmin.recherche')->with(['tra'=>Trajet::where([
            ['depart', '=',  $request->depart],
            ['destination', '=', $request->destination],
            ['d_dep', '=', $request->date],
           
        ])->get(),'nump'=>$pass]);
    }

}
