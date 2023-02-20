@extends('layouts.dashboard')

@section('content')


@section('styles')
<style>
          #outer
        {
            width:auto;
            text-align: center;
        }
        .inner
        {
            display: inline-block;
        }
</style>

@endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Participant's Data Tables
        <small>Participant's tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('certificate.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
              <a class="btn btn-sm btn-primary"href="{{route('certificate.create')}}">Create New Certificate</a>
              </div>  
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            <!-- /.box-header -->
            <div class="box-body">
              @if ( Session::has('alert-success'))
              <div class="alert alert-success" role="alert"> 
                {{ session::get('alert-success')}}
              </div>
              @endif

             
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S/No.</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Phone</th>
                  <th>Certificate Num</th>
                  <th>Year</th>
                  <th>Training Centre</th>
                  <th>LGA</th>
                  <th>LGA Code</th>
                    <th>Institution</th>
                 <th>Institution Code</th>
                 <th>Action</th>
                </tr>
                </thead>

                  <tbody>
 
                       @foreach ($certificates as $certificate)
                          <tr>
                          <td>{{$certificate->id}}</td>
                          <td>{{$certificate->name}}</td>
                          <td>{{$certificate->sex}}</td>
                          <td>{{$certificate->phone}}</td>
                          <td>{{$certificate->certificate_num}}</td>
                          <td>{{$certificate->year}}</td>
                          <td>{{$certificate->training_centre}}</td>
                          <td>{{$certificate->lga}}</td>
                          <td>{{$certificate->lga_code}}</td>
                          <td>{{$certificate->institution}}</td>
                          <td>{{$certificate->institution_code}}</td>
                         
                        <td id="outer">
                          <div class="dropdown">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Action
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class=" inner btn btn-sm btn-success" href="{{ route('besevic', $certificate->id)}}">Generate-Cert</a> <br>
                             <a class=" inner btn btn-sm btn-info" href="{{route('certificate.edit', $certificate->id)}}">Edit</a>
                            <form method="post"   action ="{{route('certificate.destroy')}}" class="inner">
                              @csrf
                              @method('delete')
                              <input type="hidden" name="certificate_id" value="{{$certificate->id}}">
                              <input type="submit" onclick="return confirm('Hello, do you really want to delete the Certificate?')"class="btn btn-sm btn-danger" value="Delete">
                            </form>
                            </div>
                          </div>
                          </td> 
                        </tr>
                        @endforeach
                        </tr>
                       </tbody>
                       </table>
                       
                {{-- Pagination --}}
        <div class="d-flex justify-content-center">
          {!! $certificates->links() !!}
      </div>
            </div>
            <!-- /.box-body -->
          </div>
              
@endsection
