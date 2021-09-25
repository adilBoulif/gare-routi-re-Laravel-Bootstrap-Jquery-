@extends('LayoutAdmin.Layout')
@section('content')

<h4>Les offres</h4>

<p>
   <a href=" {{ url('/Admin/Trajet/ajouter') }}"class="btn btn-success"  > <i class="fas fa-plus-circle"></i> Ajouter</a> 
</p>
<table class="table">
    <tr>
        <th>
        Depart
        </th>
        <th>
            Destination
        </th>
       

        <th>
        H_Depart
        </th>
        <th>
        H_Destination
        </th>
        <th>
         Date
        </th>
        <th>
        Prix
        </th>
        <th>
      Societe
        </th>
        <th></th>
    </tr>

    @foreach($Trajets as $s)
    
        <tr>
            <td>
                 {{$s->depart}}
            </td>
            <td>
                 {{$s->destination}}
            </td>
           

            <td>
                 {{$s->h_dep}}
            </td>
            <td>
               {{$s->h_dest }}
            </td>
            <td>
               {{$s->d_dep }}
            </td>
            <td>
               {{$s->prix }}
            </td>
            <td>
               {{$s->relationSociete->nom }}
            </td>
            <td>
            <a class="btn btn-primary" href="{{url('/Admin/Trajet/edit',['id' => $s->id])}}"> <i class="fas fa-edit" ></i></a> 
            </td>
            <td>
             
           
                <form action="{{url('/Admin/Trajet/delete',['id' => $s->id])}}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
<button class="btn btn-danger"type="submit" ><i class="fas fa-trash"></i> </button>             
                </form>  
                 
            </td>
            @endforeach
        </tr>


</table>
@endsection('content')