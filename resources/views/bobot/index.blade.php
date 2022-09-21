@extends('layouts.main')
@section('judul')
<i class="fas fa-fw fa-chart-area"></i> Bobot
@endsection
@section('isi')

        <!-- Page Heading -->
        {{-- <p class="mb-4"></p> --}}

        <!-- DataTales Example -->
       

        <div class="container ">
            <div class="row justify-content-md-center">
              <div class="col-10 ">
                <div class="card shadow mb-12 ">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead >
                                    <tr class="bg-info text-gray-100">
                                        <th width="15%" class="text-center">No.</th>
                                        <th class="text-center">Kriteria</th>
                                        <th class="text-center">Atur Bobot</th>
                                       
                                    </tr>
                                </thead>
                                <tfoot>
                                   {{-- TFOOT --}}
                                </tfoot>
                                @php
                                    $no=1
                                @endphp
                                
                                @foreach ($b as $itembobot)
                              
                                <tbody>
                                    <td class="text-center">{{ $no }}</td>
                                    <td class="text-center">{{ $itembobot->nama_kriteria }}</td>
                                    <td class="text-center col-sm-3">
                                        <form action="{{ route('bobot-store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <input autocomplete="off" type="hidden" name="user_id[]" id="user_id[]" value="{{ auth()->user()->id }}"/>
                                        <input autocomplete="off" type="hidden" name="kriteria_id[]" id="kriteria_id[]" value="{{ $itembobot->id }}"/>
                                        <input autocomplete="off" type="text" name="nilai_bobot[]" id="nilai_bobot[]" value="{{ $itembobot->nilai_bobot ?? '0' }}"class="form-control"/>
                                    </td>
                                    @php
                                        $no++
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-info "><i class="fa fa-calculator"></i> Hitung Bobot</button>
                    </div>
                </div>
              </div>
              
            </div>
        </div>
    </form>
@endsection

