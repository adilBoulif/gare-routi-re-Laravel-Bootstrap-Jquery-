@extends('LayoutAdmin.Layout')
@section('content')

<h4>Société du transport</h4>

<p>
   <a href=" {{ url('/Admin/Societe/ajouter') }}" class="btn btn-success"  > <i class="fas fa-plus-circle"></i> Ajouter</a> 
</p>
<table class="table">
    <tr>
        <th>
          Nom
        </th>
        <th>
            Email
        </th>
       

        <th>
         Telephone
        </th>
        <th>
           Adresse
        </th>
        <th>
          Image
        </th>
        <th></th>
    </tr>

    @foreach($Societes as $s)
    
        <tr>
            <td>
                 {{$s->nom}}
            </td>
            <td>
                 {{$s->email}}
            </td>
           

            <td>
                 {{$s->tel}}
            </td>
            <td>
               {{$s->adresse }}
            </td>
            <td>
                <img src="{{URL::to('images/'.$s->image)}}" class="thumbnail" style="width:48px;height48px" />
            </td>
            <td>
            <a class="btn btn-primary" href="{{url('/Admin/Societe/edit',['id' => $s->id])}}"> <i class="fas fa-edit" ></i></a>   
            </td>
            <td>
                <form action="{{url('/Admin/Societe/delete',['id' => $s->id])}}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
<button type="submit"  class="btn btn-danger"><i class="fas fa-trash"></i> </button>             
                </form>
            </td>
            @endforeach
        </tr>


</table>
@endsection('content')