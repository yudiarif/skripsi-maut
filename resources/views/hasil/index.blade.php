@extends('layouts.main')
@section('judul')
<i class="fas fa-fw fa-chart-area"></i> Hasil Akhir
@endsection
@section('isi')

        <!-- Page Heading -->
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                {{-- <a href="#" method="get" class="btn btn-info">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Data Perhitungan</span>
                </a>  --}}
                <a href="#" data-toggle="modal" data-target="#ModalShow" method="get" class="btn btn-info">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Data Perhitungan</span>
                </a> 
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead >
                            <tr class="bg-info text-gray-100">
                                {{-- <th width="15%" class="text-center">No.</th> --}}
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nilai Preferensi</th>
                                <th class="text-center">Tanggal Penilaian</th>
                                {{-- <th class="text-center">Ranking</th> --}}
                            </tr>
                        </thead>
                        <tfoot>
                           {{-- TFOOT --}}
                        </tfoot>
                            <tbody>
                                @php
                                    $no=1;
                                    
                                @endphp
                        @foreach ($hasil as $item)
                        <tr>
                            <td class="text-center">{{ $no }}</td>
                            <td class="text-center">{{ $item->nama }}</td>
                            <td class="text-center">{{ $item->nilai }}</td>
                            <td class="text-center">{{ $item->updated_at->isoFormat('dddd, d MMMM Y') }}</td>
                            
                        </tr>
                        @php
                            $no++
                        @endphp
                        @endforeach
                    </tbody>

                    </table>
                </div>
            </div>
        </div>

        
        
       @include('hasil.modal.perhitungan')
@endsection