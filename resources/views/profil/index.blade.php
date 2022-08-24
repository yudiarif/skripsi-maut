@extends('layouts.main')
@section('judul')
<i class="fas fa-fw fa-user"></i> Profil
@endsection
@section('isi')

<div class="container">
    <div class="main-body">
<hr>
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if ( auth()->user()->role_id=='1')
                    <img src="/img/admin.png" alt="Admin" class="rounded-circle" width="150">
                            @elseif(auth()->user()->role_id=='2')
                    <img src="/img/dm.png" alt="Admin" class="rounded-circle" width="150">
                            @endif

                    <div class="mt-3">
                      <h4> {{ auth()->user()->nama }}</h4>                       
                        <p class="text-secondary mb-1">
                             @if ( auth()->user()->role_id=='1')
                            Admin
                                
                            @elseif(auth()->user()->role_id=='2')
                           Decison Maker
                            
                            @endif
                        </p>

                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ auth()->user()->nama }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->username }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Level User</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if ( auth()->user()->role_id=='1')
                        Admin
                        @elseif(auth()->user()->role_id=='2')
                       Decison Maker
                        @endif
                    </div>
                  </div>
                  
                
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>

@endsection
