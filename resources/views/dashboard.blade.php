@extends('layouts.main')
@section('judul')
<i class="fas fa-fw fa-tachometer-alt"></i> Dashboard
@endsection
@section('contentrow')
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-3">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Calon Tenaga Honorer</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $honorer }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-3">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kriteria</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kriteria }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cube fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
     <div class="col-xl-4 col-md-6 mb-3">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sub Kriteria</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $subkriteria }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cubes fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
   
  </div>
  @endsection