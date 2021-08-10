@extends('master')
@section('content')
    <div class="container">
        <form action="{{ route('information.update',$information->id ) }}" method="post" enctype="multipart/form-data">
            @csrf
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
                <label for="oldimage">Old Image</label></br>
                <img src="{!! asset('images/'. $information->image) !!}" width="100" height="100"></br>
                <label for="oldimage">New Image (optional)</label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
@endsection
