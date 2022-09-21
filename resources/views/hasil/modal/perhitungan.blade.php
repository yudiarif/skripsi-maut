
    <div class="modal fade text-left" id="ModalShow" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h4 class="mb-0 font-weight-bold text-info"><i class="fas fa-fw fa fa-chart-area"></i> Data Perhitungan MAUT</h4>
                      </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                </div>



                <div class="container-fluid p-3">
                    <div class="card shadow ">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info "><i class="fa fa-list-ul mr-2"></i>Nilai Tenaga Honorer</h6>
                            
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead >
                                        <tr class="bg-info text-gray-100">
                                            <th class="text-center">Tenaga Honorer</th>
                                            @foreach ($kodekriteria as $a)
                                            <th class="text-center">{{ $a->kode}}</th>
                                            @endforeach
                                                @foreach ($report as $index => $values)
                                                <tr>
                                                    <td class="text-center">{{ $index }}</td>
                                                    @foreach ($kriteria as $k)
                                                        <td class="text-center">{{ $report[$index][$k]['sub_kriteria_id'] ?? 'Tidak ada nilai'}}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tr>
                                    </thead>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid p-3">
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-info "><i class="fa fa-list-ul mr-2"></i>Nilai terkecil dan terbesar dari setiap kriteria</h6>
                            
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead >
                                        <tr class="bg-info text-gray-100">
                                            <th class="text-center"></th>
                                            @foreach ($nilaiMax as $kmin)
                                            <th class="text-center">{{ $kmin->kode }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tfoot>
                                       {{-- TFOOT --}}
                                    </tfoot>
                                    <tbody>
                                        <td class="text-center">A+</td>
                                        @foreach ($nilaiMax as $skmax)
                                        <td class="text-center">{{ $skmax->nilai }}</td>
                                        @endforeach
                                    </tbody>
                                    <tbody>
                                        <td class="text-center">A-</td>
                                        @foreach ($nilaiMin as $skmin)
                                        <td class="text-center">{{ $skmin->nilai }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                   
            <div class="container-fluid p-3">
                
                <div class="card shadow">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info "><i class="fa fa-list-ul mr-2"></i>Normalisasi Bobot</h6>
                        
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead >
                                    <tr class="bg-info text-gray-100">
                                        @foreach ($bobot as $a)
                                        <th class="text-center">{{ $a->kriteria->kode}}</th>
                                        @endforeach
                                       
                                    </tr>
                                </thead>
                                <tfoot>
                                   {{-- TFOOT --}}
                                </tfoot>
                                <tbody>
                                    @foreach ($bobot as $b)
                                        <th class="text-center">{{ $b->nilai_bobot/$total ??'Tidak ada nilai' }}</th>
                                        @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>

            



<div class="container-fluid p-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-info "><i class="fa fa-list-ul mr-2"></i>Nilai Normalisasi</h6>
            
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead >
                        <tr class="bg-info text-gray-100">
                            <th class="text-center">Tenaga Honorer</th>
                            @foreach ($kodekriteria as $a)
                            <th class="text-center">{{ $a->kode}}</th>
                            @endforeach
                            
                            {{-- @foreach ($report as $item=>$value)
                            <tr><td class="text-center">{{ $item }}</td></tr>
                            @endforeach --}}

                            @foreach ($normalisasi as $k=>$v)
                            @foreach ($v as $knormalisasi=>$vnormalisasi)
                                    <tr>
                                        <td class="text-center">{{ $knormalisasi }}</td>
                                        @foreach ($vnormalisasi as $key=>$value)
                                        <td class="text-center">{{ $value ?? 'Tidak Ada Nilai'}}</td>
                                        @endforeach
                                    </tr>
                            @endforeach
                            @endforeach
                        </tr>
                    </thead>
                </table>
              
            </div>
        </div>
    </div>
</div>