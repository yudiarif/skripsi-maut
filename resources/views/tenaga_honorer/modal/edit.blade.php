<form action="{{ route('calon-tenaga-honorer.update',$datahonorer->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="modal fade text-left" id="ModalEdit{{$datahonorer->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h4 class="mb-0 font-weight-bold text-info"><i class="fas fa-fw fa fa-edit"></i> Edit Alternatif</h4>
                      </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nama</label>
                                <input autocomplete="off" type="text" name="nama" id="nama" value="{{$datahonorer->nama}}" required class="form-control"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="{{$datahonorer->jenis_kelamin}}">{{$datahonorer->jenis_kelamin}}</option>
                                    @if ($datahonorer->jenis_kelamin === "Laki-laki")
                                        <option value="Perempuan">Perempuan</option>
                                    @elseif ($datahonorer->jenis_kelamin === "Perempuan")
                                        <option value="Laki-laki">Laki-laki</option>
                                    @endif						
                                </select>
                            </div>
            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Asal Kota</label>
                                <input autocomplete="off" type="text" name="asal_kota" id="asal_kota" value="{{$datahonorer->asal_kota}}" required class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nomor Telp</label>
                                <input autocomplete="off" type="tel" pattern="[0-9]{9,13}" name="no_hp" id="no_hp" value="{{$datahonorer->no_hp}}" required class="form-control"/>
                            </div>
            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">E-Mail</label>
                                <input autocomplete="off" type="email" name="email" id="email" value="{{$datahonorer->email}}" required class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{$datahonorer->alamat}}</textarea>
                            </div>
                            <input autocomplete="off" type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id}}" required class="form-control"/>
                            
                            @php
                                $itemp=$datahonorer->perhitungan
                            @endphp
                                
                            @foreach ($kriteria as $datakriteria)
                            <input autocomplete="off" type="hidden" name="calon_tenaga_honorer_id[]" id="calon_tenaga_honorer_id[]" value="{{ $datahonorer->id }}" required class="form-control"/>
                            <input autocomplete="off" type="hidden" name="kriteria_id[]" id="kriteria_id[]" value="{{ $datakriteria->id }}" required class="form-control"/>
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">{{ $datakriteria->nama_kriteria }}</label>
                                <select name="sub_kriteria_id[]" class="form-control" id="sub_kriteria_id[]" required>
                                  
                                    <?php $sub=$datakriteria->subkriteria
                                    ?>
                                        @foreach ($sub as $sk)
                                            
                                         @foreach ($itemp as $item)
                                        @if ($item->sub_kriteria_id===$sk->id)
                                            <option selected value="{{ $sk->id }}">{{ $sk->rentang }} </option>
                                        @endif
                                        @endforeach
                                        <option value="{{ $sk->id }}">{{ $sk->rentang }} </option>
                                        @endforeach
					
                                </select>
                            </div>
                          
                           @endforeach
                        
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button> --}}
                        <a href="{{ route('calon-tenaga-honorer.index') }}" class="btn btn-secondary"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                            <span class="text">Batal</span>
                    </a>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
 </form>