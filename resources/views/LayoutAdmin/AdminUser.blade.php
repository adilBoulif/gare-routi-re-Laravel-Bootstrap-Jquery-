@extends('LayoutAdmin.Layout')
@section('content')

<h4>Utilisateur</h4>

<p>
   <a href=" {{ url('/Admin/User/ajouter') }}" class="btn btn-success"  > <i class="fas fa-plus-circle"></i> Ajouter</a> 
</p>
<table class="table">
    <tr>
        <th>
          Nom
        </th>
        <th>
            Email
        </th>
        <th></th>
        <th></th>
    </tr>

    @foreach($user as $s)
    
        <tr>
            <td>
                 {{$s->name}}
            </td>
            <td>
                 {{$s->email}}
            </td>
           

          
            <td>
            <a class="btn btn-primary" href="{{url('/Admin/User/edit',['id' => $s->id])}}"> <i class="fas fa-edit" > Modifier</i></a>  
            </td>
           
            <td>
              
                
                <form action="{{url('/Admin/User/delete',['id' => $s->id])}}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
<button class="btn btn-danger"type="submit" ><i class="fas fa-trash"> Supprimer</i> </button>             
                </form>
            </td>
            @endforeach
        </tr>


</table>
@endsection('content')