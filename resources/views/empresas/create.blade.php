@extends('layouts.app')

@section('content')
<div class="row border-bottom border-dark">
    <div class="col">
        <h1 class="mt-3 mb-3">Register New Company</h1>
    </div>
    <div class="col text-right">
        <a class="btn btn-success mt-3 mb-3" href="/empresas">Back to Companies List</a>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-8 m-auto">
        {!! Form::open(['action' => 'EmpresasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col">
               <div class="form-group">
                   {{Form::label('owner', 'Business Owner Name')}}
                   {{Form::text('owner', '', ['class' => 'form-control', 'placeholder' => 'Owner Name'])}}
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                   {{Form::label('company_name', 'Company Name')}}
                   {{Form::text('company_name', '', ['class' => 'form-control', 'placeholder' => 'Company Name'])}}
               </div>
            </div>
        </div>

        <div class="row">
           <div class="col">
              <div class="form-group">
                  {{Form::label('email', 'Best Email')}}
                  {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email@email.com'])}}
              </div>
           </div>
           <div class="col">
              <div class="form-group">
                  {{Form::label('phone', 'Phone Number')}}
                  {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => '###-###-####'])}}
              </div>
           </div>
           </div>

           <div class="form-group">
               {{Form::label('address', 'Business Address')}}
               {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Business Address'])}}
           </div>

           <div class="form-group">
               {{Form::label('address2', 'Complimentary Address(suite)')}}
               {{Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Suite'])}}
           </div>

           <div class="row">
               <div class="col">
                   <div class="form-group">
                       {{Form::label('city', 'City')}}
                       {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Your City'])}}
                   </div>
               </div><!-- city -->
               <div class="col">
                   {{Form::label('state', 'State')}}
                   {{Form::select('state', array(
                       'Alabama' => 'Alabama', 
                       'Alaska' => 'Alaska',
                       'Arizona' => 'Arizona',
                       'Arkansas' => 'Arkansas',
                       'California' => 'California',
                       'Colorado' => 'Colorado',
                       'Connecticut' => 'Connecticut',
                       'Delaware' => 'Delaware',
                       'Florida' => 'Florida',
                       'Georgia' => 'Georgia',
                       'Hawaii' => 'Hawaii',
                       'Idaho' => 'Idaho',
                       'IllinoisIndiana' => 'IllinoisIndiana',
                       'Iowa' => 'Iowa',
                       'Kansas' => 'Kansas',
                       'Kentucky' => 'Kentucky',
                       'Louisiana' => 'Louisiana',
                       'Maine' => 'Maine',
                       'Maryland' => 'Maryland',
                       'Massachusetts' => 'Massachusetts',
                       'Michigan' => 'Michigan',
                       'Minnesota' => 'Minnesota',
                       'Mississippi' => 'Mississippi',
                       'Missouri' => 'Missouri',
                       'MontanaNebraska' => 'MontanaNebraska',
                       'New Hampshire' => 'New Hampshire',
                       'New Jersey' => 'New Jersey',
                       'New Mexico' => 'New Mexico',
                       'New York' => 'New York',
                       'North Carolina' => 'North Carolina',
                       'North Dakota' => 'North Dakota',
                       'Ohio' => 'Ohio',
                       'Oklahoma' => 'Oklahoma',
                       'Oregon' => 'Oregon',
                       'PennsylvaniaRhode Island' => 'PennsylvaniaRhode Island',
                       'South Carolina' => 'South Carolina',
                       'South Dakota' => 'South Dakota',
                       'Tennessee' => 'Tennessee',
                       'Texas' => 'Texas',
                       'Utah' => 'Utah',
                       'Vermont' => 'Vermont',
                       'Virginia' => 'Virginia',
                       'Washington' => 'Washington',
                       'West Virginia' => 'West Virginia',
                       'Wisconsin' => 'Wisconsin',
                       'Wyoming' => 'Wyoming'
                       ),                                      
                       null, 
                       ['class' => 'form-control', 'placeholder' => 'Your State'] )}}
               </div><!-- State -->
               <div class="col">
                {{Form::label('country', 'Country')}}
                {{Form::select('country', array(
                    'United States' => 'United States', 
                    'Brasil' => 'Brasil'
                    
                    ),                                      
                    null, 
                    ['class' => 'form-control', 'placeholder' => 'Your Country'] )}}
            </div><!-- Country -->
               <div class="col">
                   <div class="form-group">
                       {{Form::label('zipcode', 'Zipcode')}}
                       {{Form::text('zipcode', '', ['class' => 'form-control', 'placeholder' => 'Your Zipcode'])}}
                   </div>
               </div><!-- Zipcode -->
           </div><!-- end row group -->  

           <div class="form-group">
            {{Form::label('website', 'Business Website URL')}}
            {{Form::text('website', '', ['class' => 'form-control', 'placeholder' => 'https://company.com'])}}
        </div>
           
           <div class="row">
               <div class="col">
                <div class="form-group">
                    {{Form::label('fanpage', 'Business Facebook Fanpage URL')}}
                    {{Form::text('fanpage', '', ['class' => 'form-control', 'placeholder' => 'https://facebook.com/fanpge'])}}
                </div>
               </div>
               <div class="col">
                <div class="form-group">
                    {{Form::label('instagram', 'Business Instagram')}}
                    {{Form::text('instagram', '', ['class' => 'form-control', 'placeholder' => 'https://instagram.com/username'])}}
                </div>
                </div>
                
           </div><!-- Social media urls -->

           <div class="row">
               <div class="col">
                <div class="form-group">
                    {{Form::label('youtube', 'Youtube Channel')}}
                    {{Form::text('youtube', '', ['class' => 'form-control', 'placeholder' => 'https://youtube.com/channel'])}}
                </div>
               </div>
               <div class="col">
                <div class="form-group">
                    {{Form::label('twitter', 'Twitter')}}
                    {{Form::text('twitter', '', ['class' => 'form-control', 'placeholder' => 'https://twitter.com/channel'])}}
                </div>
               </div>
           </div>
           
            <div class="form-group">
            {{Form::label('description', 'Business Overview')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>

            <div class="form-group">  
            {{Form::label('logo', 'Business Logo')}}         
            {{Form::file('logo')}}
            </div>

            <div class="form-group">      
                {{Form::label('images', 'Business Images')}}     
                {{Form::file('images[]',['multiple' => 'multiple'])}}
                </div>
           
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
    </div>
</div>
@endsection