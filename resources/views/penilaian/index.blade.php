@extends('layouts.main')
@section('judul')
<i class="fas fa-fw fa-cube"></i> Penilaian 
@endsection
@section('isi')

        <!-- Page Heading -->
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      
                        
                        @foreach ($penilaian as $nilaialter)
                         @if ($loop->count)
                         <tr class="text-center">
                             <div class="ml-0">{{ $nilaialter->subkriteria}}</div>
                         </tr>
                         @endif
                               
                                    
                            @endforeach
                        <thead >
                            <tr class="bg-info text-gray-100">
                                <th width="15%" class="text-center">No.</th>
                                <th class="text-center">Alternatif</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                           {{-- TFOOT --}}
                        </tfoot>
                        <tbody>
                           
                           <?php $no=1 ?>
                            @foreach ($alternatif as $dataalternatif)
                            <tr>
                                <td class="text-center"><div class="ml-0">{{ $no }}</div></td>
                                <td class="text-center"><div class="ml-0">{{ $dataalternatif->nama }}</div></td>  
                                                              
                                  @if (!$dataalternatif->penilaian->isEmpty())
                                  <td class="text-center"> 
                                    <a data-toggle="modal" data-placement="bottom" title="Edit Penilaian" href="#" class="btn btn-warning btn-sm" data-target="#ModalEdit{{$dataalternatif->id}}"><i class="fa fa-edit"></i></a>
                                    <a data-toggle="modal" data-placement="bottom" title="Reset Penilaian" href="#"  class="btn btn-info btn-sm" data-target="#ModalDelete{{$dataalternatif->id}}"><i class="fa fa-undo"></i></a>
                                @include('penilaian.modal.edit')
                                @include('penilaian.modal.delete')
                               
                                </td>
                              
                                  @else
                                  <td class="text-center"> <a href="#" data-toggle="modal" data-target="#ModalCreate{{ $dataalternatif->id }}" class="btn btn-info btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah</span>
                                    </a>
                                  @include('penilaian.modal.create')
                                </td>
                                
                                  @endif
                                {{-- <td class="text-center"> {{ $dataalternatif }} 
                                    @foreach ($bc as $button)
                                    <td class="text-center"> {{ $button }}
                                        
                                    @endforeach     --}}

                                        {{-- <a data-toggle="modal" data-placement="bottom" title="Edit Data" href="#" class="btn btn-info btn-sm" data-target="#ModalCreate{{ $dataalternatif->id }}"><i class="fa fa-plus"></i></a>
                                        @include('penilaian.modal.create')
                                        <a data-toggle="modal" data-placement="bottom" title="Edit Data" href="#" class="btn btn-warning btn-sm" data-target="#ModalEdit"><i class="fa fa-edit"></i></a>
                                        @include('penilaian.modal.edit') --}}
                                    
                                </td>
                            </tr>   
                           <?php $no++ ?>
                            @endforeach            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
@endsection