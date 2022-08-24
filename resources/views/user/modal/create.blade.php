<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-sm-flex align-items-center justify-content-between mb-0">
                        <h4 class="mb-0 font-weight-bold text-info"><i class="fas fa-fw fa-plus"></i> Tambah User</h4>
                      </div>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>         --}}
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-11">
                                
                                    <div class="mb-3">
                                        <label class="font-weight-bold">Nama</label>
                                        <input autocomplete="off" type="text" name="nama" id="nama" required class="form-control"/>
                                    </div>
                                     <div class="mb-3">
                                        <label class="font-weight-bold">Email</label>
                                        <input autocomplete="off" type="text" name="email" id="email" required class="form-control"/>
                                     </div>
                                     <div class="mb-3">
                                        <label class="font-weight-bold">Username</label>
                                        <input autocomplete="off" type="text" name="username" id="username" required class="form-control"/>
                                    </div>
                                    <div class="form-group col-mb-3">
                                        <label class="font-weight-bold">Level User</label>
                                        <select name="role_id" id="role_id" class="form-control" required>
                                            <option selected>Pilih Level User</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Decision Maker</option>						
                                        </select>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="font-weight-bold">Password</label>
                                        <input autocomplete="off" type="password" name="password" id="password" required class="form-control"/>
                                    </div>
                                     <div class="form-group mb-3">
                                        <label class="font-weight-bold">Konfirmasi Password</label>
                                        <input autocomplete="off" type="password" name="password_confirmation" id="password_confirmation" required class="form-control"/>
                                    </div>

                                        {{-- <input autocomplete="off" type="hidden" name="user_id" id="user_id" required class="form-control" value="{{$datauser->id}}"/> --}}
                                </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan</button>
                        {{-- <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Clear</button> --}}
                        <a href="{{ route('user.index') }}" class="btn btn-secondary"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                                <span class="text">Batal</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
 </form>
