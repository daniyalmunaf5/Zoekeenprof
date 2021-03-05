@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>
                
                <div class="card-body">
                   
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                @can('edit-users')
                                <th scope="col">Actions</th>
                                @endcan    
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ implode(' , ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                @can('edit-users')
                                    <a href="{{ route('backend.users.edit',$user->id )}}"><button type="button" class="btn btn-primary float-left">Edit</button></a>
                                    <form action="{{ route('backend.users.destroy', $user)}}" method="POST" class="float-left">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-warning ml-3">Delete</button>
                                    </form>
                                    <a href="{{ route('backend.photographer.index',$user->id )}}"><button type="button" class="ml-3 btn btn-success float-left">View</button></a>
                                @endcan    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
