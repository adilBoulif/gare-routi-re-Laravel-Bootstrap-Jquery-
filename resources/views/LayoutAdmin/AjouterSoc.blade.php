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
        <form action="{{ url('/Admin/Societe/ajouter') }}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">

        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Nom</label>
           
            <div class="col-md-10">
            <input type="text" class="form-control" id="titre" name="nom" placeholder="nom">
                
            </div>
        </div>
        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Email</label>
           
            <div class="col-md-10">
            <input type="text" class="form-control" id="titre" name="email" placeholder="email">
                
            </div>
        </div>
        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Telephone</label>
           
            <div class="col-md-10">
            <input type="text" class="form-control" id="titre" name="tel" placeholder="telephone">
                
            </div>
        </div>
        <div class="form-group">
        <label for="name" class="control-label col-md-2"> Adresse</label>
           
            <div class="col-md-10">
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="adreese">
                
            </div>
        </div>

     

        

        <div class="form-group">
            <div class="control-label col-md-2" style="text-align: left;">Image </div>
            <div class="col-md-10">
                <input type="file" name="image" id="image" />
              
            </div>

        </div>

       

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input type="submit" value="Ajouter" class="btn btn-primary" />
            </div>
        </div>
    </div>
    </form>

<div>
   Retourner à la Liste
</div>
@endsection('content')