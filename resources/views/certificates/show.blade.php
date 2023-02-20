@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PREVIEW IDENTITY CARD') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <a href="{{url()->previous()}}" class="btn btn-sm btn-info">Go Back</a> <br>
                  <b>Your Certificate Name is: </b>{{$certificate->name}} <br>
                  <b>Your Certificate Number is: </b>{{$certificate->certificate_num}} <br>
                  <b>Your Phone Number is: </b>{{$certificate->phone}} <br>
                  <b>Your Training Centre is: </b>{{$certificate->training_centre}} <br>
                    <hr>

                    <div class="mx-auto" style="width: 200px;">
                        This certificate is authentic 
                        text go here
                        text go here
                        text go here
                        text go here
                      </div>
                  <div class="card" style="width: 8rem;">
                  <img src=" {{asset ('logos/besevic-logo.png')}}" class="rounded float-start" alt="..."> 
                  </div>
                  
                  <hr>

                  <div class="mx-auto" style="width: 200px;">
                 BESEVIC - Power by Gamint Corporate Ltd
                  </div>
                  <div class="card" style="width: 8rem;">
                  <img src=" {{asset ('logos/besevic-logo.png')}}" class="rounded float-end" alt="...">
                  </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
