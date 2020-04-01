@extends('layouts.app')
@section('content')

    <div class="row pt-4">
        <div class="col">
            <h1>Companies</h1>
        </div>
        <div class="col text-right">
            <a class="btn btn-info text-white" href="/empresas/create">Register New Company</a>
        </div>
    </div>
    
    @if (count($empresas) > 0 )

    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"># Id</th>
            <th scope="col">Company Name</th>
            <th scope="col">Location</th>
            <th scope="col">Phone #</th>
            <th scope="col">Details</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <th scope="row">{{$empresa->id}}</th>
                    <td>{{$empresa->company_name}}</td>
                    <td>{{$empresa->city}} - {{$empresa->state}}</td>
                    <td>{{$empresa->phone}}</td>
                    <td><a class="btn btn-success" href="/empresas/{{$empresa->id}}">DETAILS</a></td>
                    <td><a class="btn btn-primary" href="/empresas/{{$empresa->id}}/edit">UPDATE INFO</a></td>
                    <td><a class="btn btn-danger" href="/empresas/{{$empresa->id}}/destroy">DELETE COMPANY</a></td>            
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$empresas->links()}}
      @else 

        <h4>You Have no Companies Registered!</h4>

      @endif
    
@endsection