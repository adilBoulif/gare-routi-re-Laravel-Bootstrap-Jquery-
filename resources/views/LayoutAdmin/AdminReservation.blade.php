@extends('LayoutAdmin.Layout')
@section('content')

<h4>Les Reservations</h4>


<table class="table">
    <tr>
    <th>
        Client
        </th>
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

    @foreach($reserv as $s)
    
        <tr>
        <td>
                 {{$s->client}}
            </td>
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
               {{$s->created_at }}
            </td>
            <td>
               {{$s->prix }}
            </td>
            <td>
               {{$s->societe }}
            </td>
           
            <td>
           
                <form action="{{url('/Admin/Reservation/delete',['id' => $s->id])}}" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="_token" value="{{Session::token()}}">
<button class="btn btn-danger"type="submit" ><i class="fas fa-trash"></i> </button>             
                </form>  
                 
            </td>
            @endforeach
        </tr>


</table>
@endsection('content')