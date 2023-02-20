@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                        
                                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                              

                    <form method="post" action="{{ route('certificate.update')}}">
                        <input type="hidden" name="certificate_id" value="{{ $certificate->id}}">
                        @method('PUT')
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-lable"> Name</label>
                            <input type="text" name="name" class="form-control" value="{{$certificate->name}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> Sex</label>
                            <input type="text" name="sex" class="form-control" value="{{$certificate->sex}}">
                        </div>


                        <div class="mb-3">
                            <label class="form-lable"> Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{$certificate->phone}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> Certificate Num</label>
                            <input type="text" name="certificate_num" class="form-control" value="{{$certificate->certificate_num}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> Year</label>
                            <input type="text" name="year" class="form-control" value="{{$certificate->year}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> Training Centre</label>
                            <input type="text" name="training_centre" class="form-control" value="{{$certificate->training_centre}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> LGA</label>
                            <input type="text" name="lga" class="form-control" value="{{$certificate->lga}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> LGA Code</label>
                            <input type="text" name="lga_code" class="form-control" value="{{$certificate->lga_code}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> Institution</label>
                            <input type="text" name="institution" class="form-control" value="{{$certificate->institution}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable"> Institution Code</label>
                            <input type="text" name="institution_code" class="form-control" value="{{$certificate->institution_code}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    
             </div>
                                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection