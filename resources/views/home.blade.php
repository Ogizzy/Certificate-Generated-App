@extends('layouts.app')
@section('content')
<style>
    .page-break {
        page-break-before: always;
    }
    </style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">

            @if (count($certificates)> 0)
            @foreach ($certificates as $certificate)
            
            <div class="page-break"></div>
      
            <div class="card text-center mb-2">
                <div class="card-header">{{ $certificate ? $certificate->id: ""}}</div>
            <div class="card-body">
                
             <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate(route('certificate.show', $certificate->id))) !!}" />

            </div>
            </div>
           
            @endforeach
            @endif 
        </div>
    </div>
</div> 
@endsection
