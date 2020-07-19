@extends('layouts.master')

@section('content')
@if (session()->has('success'))
            
   
    <div style="width: 50%; margin-left:300px; margin-top:15px;" class="alert alert-success" role="alert">
        {{session()->get('success')}}
    </div>
            
        @endif
    <div class="container my-4" style="width:45%; ">
        
        <form action="{{url('/done')}}" method="post">
            {{ csrf_field() }}
            
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Add New Todo" aria-label="Recipient's username" aria-describedby="basic-addon2" name="todobody">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="basic-addon2"> ADD </button>
                </div>
              </div>
        </form>
<table class="table">
    <thead>
        <th>Todo</th>
        <th>Option</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; color:brown "><strong> {{$item->body}} </strong></td>
                <td>
                    <form action="{{url('/del/'.$item->id_todo)}}" method="post">
                            
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">DELETE</button>
                    <a href="{{url('/display/'.$item->id_todo)}}" class="btn btn-warning">EDIT</a>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
    </div>

@endsection

