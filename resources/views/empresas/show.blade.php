@extends('layouts.app')

@section('content')

    <div class="row border-bottom border-dark">
        <div class="col">
            <h1 class="mt-3 mb-3 ">Business Info</h1>
        </div>
        <div class="col text-right">
            <a class="btn btn-success mt-3 mb-3" href="/empresas">Back to Companies List</a>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-2">
            <img width="100%" src="/storage/public/cover_images/{{$empresa->logo}}" alt="">
        </div>
        <div class="col-md-10">
            
            <h3>Business Name: {{$empresa->company_name}}</h3>
            <p><span class="font-weight-bolder">Owner:</span> {{$empresa->owner}}</p>
            <p><span class="font-weight-bolder">Phone:</span> <a href="tel:+1{{$empresa->phone}}"><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i> {{$empresa->phone}}</a></p>
            <p><span class="font-weight-bolder">Email:</span> <a href="mailto:{{$empresa->email}}"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> {{$empresa->email}}</a></p>
            <p><span class="font-weight-bolder">Address:</span> {{$empresa->address}}, {{$empresa->address2}} {{$empresa->city}}, {{$empresa->state}}, {{$empresa->zipcode}}</p>
            <p><span class="font-weight-bolder">Follow Us:</span>
               <a class="btn btn-lg" href="{{$empresa->website}}" target="_blank"><i class="fa fa-globe fa-lg" aria-hidden="true" title="Visit our website"></i></a>
                <a class="btn btn-lg" href="{{$empresa->fanpage}}" target="_blank"><i class="fa fa-facebook-official fa-lg" aria-hidden="true" title="Follow us on Facebook"></i></a>
                <a class="btn btn-lg" href="{{$empresa->instagram}}" target="_blank"><i class="fa fa-instagram fa-lg" aria-hidden="true" title="Follow us on Instagram"></i></a>
                <a class="btn btn-lg" href="{{$empresa->youtube}}" target="_blank"><i class="fa fa-youtube-square fa-lg" aria-hidden="true" title="Follow us on Youtube"></i></a>
                <a class="btn btn-lg" href="{{$empresa->twitter}}" target="_blank"><i class="fa fa-twitter-square fa-lg" aria-hidden="true" title="Follow us on Twitter"></i></a><br></p>
                <p><span class="font-weight-bolder">Overview:</span> {!!$empresa->description!!}</p>

                
                <div class="row">
                    @foreach ($empresa->images as $image)
                    <div class="col-md-6">
                        <img src="/storage/{{$image->image}}" alt="" width="50%">
                    </div>
                    @endforeach
                </div>

               
               
                
               
               
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-primary" href="/empresas/{{$empresa->id}}/edit">Update Info</a>
                        
                    </div>
                    <div class="col-md-2 text-left">
                        {!!Form::open(['action' => ['EmpresasController@destroy', $empresa->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::Close()!!}
                    </div>
                </div>

            </div>
            </div>
        
    </div>

    
@endsection
