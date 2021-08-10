@extends('master')
@section('content')
    <div class="container">
        <form action="{{ route('information.welcome') }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{$information->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" value="{{$information->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{$information->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="oldimage">Image</label></br>
                <img src="{!! asset('images/'. $information->image) !!}" width="100" height="100"></br>
                </div>
            <button type="submit" class="btn btn-primary mt-2">OK</button>
        </form>
    </div>
@endsection
