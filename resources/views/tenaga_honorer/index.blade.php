@extends('layouts.main')
@section('judul')
<i class="fas fa-fw fa-users"></i> Data Calon Tenaga Honorer
@endsection
@section('isi')

        <!-- Page Heading -->
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                <a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa fa-user-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                </a>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr class="bg-info text-gray-100">
                                <th width="15%" class="text-center">No.</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                           {{-- TFOOT --}}
                        </tfoot>
                        <tbody>
                            <?php $no=1?>
                            @foreach ($tenaga_honorer as $datahonorer)
                            <tr>
                                <td class="text-center">{{$no}}</td>
                                <td class="text-center">{{$datahonorer->nama}} </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a data-toggle="modal" data-placement="bottom" title="Detail Data" href="#" class="btn btn-success btn-sm"  data-target="#ModalShow{{$datahonorer->id}}"><i class="fa fa-eye"></i></a>
                                        <a data-toggle="modal" data-placement="bottom" title="Edit Data" href="#" class="btn btn-warning btn-sm" data-target="#ModalEdit{{$datahonorer->id}}"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="modal" data-placement="bottom" title="Hapus Data" href="#"  class="btn btn-danger btn-sm" data-target="#ModalDelete{{$datahonorer->id}}"><i class="fa fa-trash"></i></a>
                                        @include('tenaga_honorer.modal.show')
                                        @include('tenaga_honorer.modal.edit')
                                        @include('tenaga_honorer.modal.delete')
                                    </div>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('tenaga_honorer.modal.create')
       
@endsection