@extends('LayoutAdmin.Layout')
@section('content')

<h2>Ajouter</h2>



    <div class="form-horizontal">
        <h4>Société du transport</h4>
        <hr />
        @if(count($errors->all())>0)
@foreach($errors->all() as $err)
<div class="alert alert-danger">{{$err}}</div>
@endforeach
@endif
        <form action="{{ url('/Admin/Trajet/edit',['id' => $tra->id]) }}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">

        <div class="form-group">
        <label for="name" class="control-label col-md-2" > Depart</label>
           
            <div class="col-md-10">
            <select name="depart" id="depart" class="form-control " >


                  <option value="Casablanca"{{($tra->depart=="Casablanca")? 'selected' :''}}  >Casablanca</option>
                  <option value="Rabat"{{($tra->depart=="Rabat")? 'selected' :''}} >Rabat</option>

</select>
                
            </div>
        </div>
        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Destination</label>
           
        <div class="col-md-10">
            <select name="destination" id="destination" class="form-control ">


            <option value="Casablanca" {{($tra->destination=="Casablanca")? 'selected' :''}} >Casablanca</option>
                  <option value="Rabat" {{($tra->destination=="Rabat")? 'selected' :''}}>Rabat</option>


</select>
                
            </div>
        </div>
       
        <div class="row">
            <div class="form-group  col-md-6  " style="padding-left: 193px;">
                <label for="appt" >Depart:</label>
                <input type="time" id="appt" name="h_dep" value="{{$tra->h_dep}}">


               
            </div>

            <div class="form-group col-md-6 ">
                <label for="appt">Arrive:</label>
                <input type="time" id="appt" name="h_dest" value="{{$tra->h_dest}}">


              
            </div>
        </div>
        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Date</label>
           
            <div class="col-md-10">
            <input type="date" class="form-control" id="d_dep" name="d_dep" value="{{$tra->d_dep}}" >
                
            </div>
        </div>
     
        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Prix</label>
           
            <div class="col-md-10">
            <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix" value="{{$tra->prix}}">
                
            </div>
        </div>
        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Societe</label>
           
            <div class="col-md-10">
            <select name="SocTransid" id="SocTransid" class="form-control ">

@foreach($societes as $soc)
 <option value="{{$soc->id}}"{{($tra->SocTransid==$soc->id)? 'selected' :''}} >{{$soc->nom}} </option>
@endforeach
</select>
            </div>
        </div>
        

       

       

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Modifier" class="btn btn-primary" />
            </div>
        </div>
    </div>
    </form>

<div>
   Retourner à la Liste
</div>
@endsection('content')