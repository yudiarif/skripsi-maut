<form action="{{ route('penilaian.update',$dataalternatif->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="modal fade text-left" id="ModalEdit{{ $dataalternatif->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h4 class="mb-0 font-weight-bold text-info"><i class="fas fa-fw fa-edit"></i> Edit Penilaian</h4>
                      </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-11">
                               
                                @foreach ($kriteria as $datakriteria)
                                <div class="mb-3">
                                    <label class="font-weight-bold">{{ $datakriteria->kriteria }}</label>
                                    <input autocomplete="off" type="hidden" name="kriteria_id[]" id="kriteria_id[]" value="{{ $datakriteria->id }}" required class="form-control"/>
                                    <input autocomplete="off" type="hidden" name="alternatif_id[]" id="alternatif_id[]" value="{{ $dataalternatif->id }}" required class="form-control"/>
                                    <select name="subkriteria_id[]" class="form-control" id="subkriteria_id[]" required>
                                        
                                        <?php $sub=$datakriteria->subkriteria?>
                                        <option value="">{{$penilaian}}</option>
                                        <?php foreach ($sub as $sk): ?>
                                        <option value="{{ $sk->id }}">{{ $sk->deskripsi }} </option>
                                        <?php endforeach ?>
                                    </select>
                                 </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Clear</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
 </form>