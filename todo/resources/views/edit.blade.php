@extends('layouts.master')

@section('content')
@foreach ($datafor as $item)
    
<div style="width: 40%"  class="container my-3">
    <div class="input-group mb-3">
        <form action="{{url('/up/'.$item -> id_todo)}}" method="post">
            {{-- {{ csrf_field() }} --}}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input value="{{$item -> body}}" type="text" class="form-control" placeholder="Add New Todo" aria-label="Recipient's username" aria-describedby="basic-addon2" name="uptodo">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary btn-success text-light mt-3" type="submit" id="basic-addon2"> Update </button>
                </div>
        </form>
    </div>
 </div>
  
@endforeach
@endsection