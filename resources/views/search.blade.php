@extends('master')
@section('content')
    <div class="container">
        <h3>Your search student</h3>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach ($information as $informations)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $informations->name }}</td>
                    <td>{{ $informations->email }}</td>
                    <td>{{ Str::limit($informations->description, 25) }}</td>
                    <td><img src="{{ asset('images/'.$informations->image) }}" style="width: 80px;" ></td>
                    <td>
                        <a href="{{ route('information.show', $informations->id) }}" class="btn btn-primary">
                            <i class="fas fa-user ml-2"></i>
                        </a>
                        <a href="{{ route('information.edit', $informations->id) }}" class="btn btn-primary">
                            <i class="fas fa-user-edit ml-2"></i>
                        </a>
                        <a href="{{ route('information.delete', $informations->id) }}" class="btn btn-primary">
                            <i class="fas fa-user-times ml-2"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="row" style="overflow: hidden; height: 30px;">
            {{ $information->links() }}
        </div>
    </div>

@endsection
