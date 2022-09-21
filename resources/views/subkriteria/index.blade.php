@extends('layouts.main')
@section('judul')
<i class="fas fa-fw fa-cubes"></i> Data Sub Kriteria
@endsection
@section('isi')

        <!-- Page Heading -->
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        
        @foreach ($kriteria as $data)
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-info "><i class="fa fa-list-ul mr-2"></i>{{  $data->kode }} - {{  $data->nama_kriteria }}</h6>
                <a href="#" data-toggle="modal" data-target="#ModalCreate{{ $data->id }}" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa fa-plus"></i>
                    </span>
                    <span class="text">Tambah Sub Kriteria</span>
                </a>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead >
                            <tr class="bg-info text-gray-100">
                                <th class="text-center">No.</th>
                                <th class="text-center">Deskripsi Sub Kriteria</th>
                                <th class="text-center">Nilai</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                           {{-- TFOOT --}}
                        </tfoot>
                        <tbody>
                            <?php $no=1 ?>
                           <?php $datask=$data->subkriteria?>
                            @foreach ($datask as $sk)
                                <tr>
                                    <td class="text-center"><div class="ml-0">{{ $no }}</div></td>
                                    <td class="text-center"><div class="ml-0">{{ $sk->rentang }}</div></td>
                                    <td class="text-center"><div class="ml-0">{{ $sk->nilai }}</div></td>                                
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a data-toggle="modal" data-placement="bottom" title="Edit Data" href="#" class="btn btn-warning btn-sm" data-target="#ModalEdit{{ $sk->id }}"><i class="fa fa-edit"></i></a>
                                            <a data-toggle="modal" data-placement="bottom" title="Hapus Data" href="#"  class="btn btn-danger btn-sm" data-target="#ModalDelete{{ $sk->id }}"><i class="fa fa-trash"></i></a>
                                            @include('subkriteria.modal.edit')
                                            @include('subkriteria.modal.delete')
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
        @include('subkriteria.modal.create')
        @endforeach
@endsection