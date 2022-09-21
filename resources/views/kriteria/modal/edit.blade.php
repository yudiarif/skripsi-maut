<form action="{{ route('kriteria.update',$datakriteria->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="modal fade text-left" id="ModalEdit{{ $datakriteria->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h4 class="mb-0 font-weight-bold text-info"><i class="fas fa-fw fa-plus"></i> Edit Kriteria</h4>
                      </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-11">
                                <div class="mb-3">
                                    <label class="font-weight-bold">Kode Kriteria</label>
                                    <input autocomplete="off" type="text" name="kode" value="{{ $datakriteria->kode }}" id="kode" required class="form-control"/>
                                </div>
                                 <div class="mb-3">
                                    <label class="font-weight-bold">Nama Kriteria</label>
                                    <input autocomplete="off" type="text" name="nama_kriteria" value="{{ $datakriteria->nama_kriteria }}" id="nama_kriteria" required class="form-control"/>
                                 </div>
                                 
                            </div>
                        </div>
                    </div>
                    <input autocomplete="off" type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}" required class="form-control"/>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan</button>
                        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                            <span class="text">Batal</span>
                    </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
 </form>