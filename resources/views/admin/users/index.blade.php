@extends('layouts.app')

<div class="row">
        @section('content')
            
            <p>This is the User management page</p>

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                            <td>
                              @can('edit-users')
                              <a class="btn btn-success" href="{{route('admin.users.edit', $user->id)}}">Edit</a></td>
                              @endcan
                            <td>
                              @can('delete-users')
                              <form action="{{ route('admin.users.destroy', $user)}}" method="POST">
                                @csrf
                                {{ method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                
                              </form>
                              @endcan
                              </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        @endsection
    
</div>