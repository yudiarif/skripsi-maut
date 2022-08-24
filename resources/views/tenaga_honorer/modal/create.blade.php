<form action="{{ route('tenaga-honorer.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h4 class="mb-0 font-weight-bold text-info"><i class="fas fa-fw fa-plus"></i> Input Calon Tenaga Honorer</h4>
                      </div>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>         --}}
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            {{-- <input autocomplete="off" type="hidden" name="user_id" id="user_id" value ="1"required class="form-control"/> --}}
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nama</label>
                                <input autocomplete="off" type="text" name="nama" id="nama" required class="form-control"/>
                            </div>
                                            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>						
                                </select>
                            </div>
            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Asal Kota</label>
                                <input autocomplete="off" type="text" name="asal_kota" id="asal_kota" required class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Nomor Telp</label>
                                <input autocomplete="off" type="text" name="no_hp" id="no_hp" required class="form-control"/>
                            </div>
            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">E-Mail</label>
                                <input autocomplete="off" type="email" name="email" id="email" required class="form-control"/>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                            </div>
                            <input autocomplete="off" type="hidden" name="users_id" id="users_id" value="{{ auth()->user()->id }}" required class="form-control"/>
                            
                            @foreach ($kriteria as $datakriteria)
                            <input autocomplete="off" type="hidden" name="kriteria_id[]" id="kriteria_id[]" value="{{ $datakriteria->id }}" required class="form-control"/>
                            {{-- <input autocomplete="off" type="hidden" name="honorer_id[]" id="honorer_id[]" value="{{ $datahonorer->id }}" required class="form-control"/> --}}
                            <div class="form-group col-md-6">
                                <label class="font-weight-bold">{{ $datakriteria->kriteria }}</label>
                                <select name="subkriteria_id[]" class="form-control" id="subkriteria_id[]" required>
                                    <option selected>Kriteria</option>
                                    <?php $sub=$datakriteria->subkriteria?>
                                        <?php foreach ($sub as $sk): ?>
                                        <option value="{{ $sk->id }}">{{ $sk->rentang }} </option>
                                        <?php endforeach ?>						
                                </select>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan</button>
                        {{-- <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Clear</button> --}}
                        <a href="{{ route('tenaga-honorer.index') }}" class="btn btn-secondary"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                                <span class="text">Batal</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
 </form>