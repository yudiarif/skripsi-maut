<form action="#" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalShow{{$datahonorer->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h4 class="mb-0 font-weight-bold text-info"><i class="fas fa-fw fa fa-user-circle"></i> Detail Calon Tenaga Honorer</h4>
                      </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                </div>

                @php
                $itemp=$datahonorer->perhitungan
                @endphp

                <div class="modal-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead >
                                    <div class="container card mb-4 py-3 border-left-info">
                                        <div class="row mx-3 mb-4">
                                            <div class="col-md-4">
                                                Nama :
                                            </div>
                                            <div class="col-md-6 ">
                                                {{$datahonorer->nama}}
                                            </div>
                                        </div>
                                        <div class="row mx-3 mb-4">
                                            <div class="col-md-4">
                                                Jenis Kelamin :
                                            </div>
                                            <div class="col-md-6">
                                                {{$datahonorer->jenis_kelamin}}
                                            </div>
                                        </div>
                                        <div class="row mx-3 mb-4">
                                            <div class="col-md-4">
                                                Asal Kota :
                                            </div>
                                            <div class="col-md-6">
                                                {{$datahonorer->asal_kota}}
                                            </div>
                                        </div>
                                        <div class="row mx-3 mb-4">
                                            <div class="col-md-4">
                                                Alamat :
                                            </div>
                                            <div class="col-md-6">
                                                {{$datahonorer->alamat}}
                                            </div>
                                        </div>
                                        <div class="row mx-3 mb-4">
                                            <div class="col-md-4">
                                                Nomor HP :
                                            </div>
                                            <div class="col-md-6">
                                                {{$datahonorer->no_hp}}
                                            </div>
                                        </div>
                                        <div class="row mx-3 mb-4">
                                            <div class="col-md-4">
                                                Email :
                                            </div>
                                            <div class="col-md-6">
                                                {{$datahonorer->email}}
                                            </div>
                                        </div>
                                        
                                        @foreach ($kriteria as $datakriteria)
                                        <div class="row mx-3 mb-4">
                                            <div class="col-md-4">
                                                {{ $datakriteria->nama_kriteria }} :
                                            </div>
                                            
                                            <div class="col-md-6">
                                                @php
                                                    $sub=$datakriteria->subkriteria
                                                @endphp
                                                @foreach ($sub as $sk)
                                                    @foreach ($itemp as $item)
                                                        @if ($item->sub_kriteria_id===$sk->id)
                                                            {{ $sk->rentang }}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </thead>
                                <tfoot>
                                   {{-- TFOOT --}}
                                </tfoot>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-arrow-left"></i> Kembali</button>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </form>