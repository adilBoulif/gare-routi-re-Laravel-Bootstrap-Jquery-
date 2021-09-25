<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trajet;
use App\Reservation;
use Cart;
use App;
use Stripe\Stripe;
use Stripe\Charge;

class ReservationController extends Controller
{
    public function AddToCart(Request $request,$id)
    {
        $tra=Trajet::findOrFail($id);
        $article=Cart::add([
            'id'=>$tra->id,
            'name'=>$tra->depart,
            'weight' => 550,
            'qty'=>$request->pf,
            'price'=>$tra->prix,
            
        ]);
        Cart::associate( $article->rowId,'App\Trajet');
        return view('LayoutAdmin.payment');
    }
    public function AffichCart(Request $request)
    {
      return view('LayoutAdmin.payment');
    }
    public function SuppCart(Request $request)
    {
        Cart::destroy();
        return view('LayoutAdmin.HomeRech');
    }
    public function payment(Request $request)
    {
        
        Stripe::setApiKey('sk_test_51ISNBoI0x6NmKCyPOhjxIaeSzQDTv5aqKdnculp8v5v0YE2vfJxaXFULANrVmEwopDbAVMza04ppPfKPVstuKJSO00uA2u88C4');
        $token=request()->stripeToken;
        $charge=Charge::create(array(
            
            "amount" =>round(Cart::subtotal(),2)*100,
            "currency"=>"usd",
            "description"=>"gare",
            "source"=>$token
        ));
        Reservation::create([
            'depart'=>$request->depart,
            'destination'=>$request->destination,
            'h_dep'=>$request->h_dep,
           'h_dest'=>$request->h_dest,
            'd_dep'=>$request->d_dep,
            'prix'=>$request->price,
            'client'=>'adelbf6@gmail.com',
            'societe'=>$request->societe
          ]);
        Cart::destroy();
      /* $pdf=App::Make('dompdf.wrapper');
       $pdf->loadHTML('<h1> hello </h1>' );

      
       return $pdf->stream();*/
       $data = ['depart' => $request->depart, 'destination'=>$request->destination, 'h_dep'=>$request->h_dep,
       'h_dest'=>$request->h_dest,
        'd_dep'=>$request->d_dep,
        'prix'=>$request->price,  'societe'=>$request->societe];
        $pdf = \PDF::loadView('generate_pdf', $data);
  
        return $pdf->download('Ticket.pdf');
        return view('LayoutAdmin.HomeRech');
    }
    public function  DeleteReser($id)
    {
       
        $soc=Reservation::findOrfail($id);
        $soc->delete();
        return view('LayoutAdmin/AdminReservation')->with(['reserv'=>Reservation::all()]);
    }
   
}
