@extends('multiauth::layouts.app')
@section('content')
<link href="{{ asset('asset/admin') }}/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('asset/admin') }}/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('asset/admin') }}/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('asset/admin') }}/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" href="{{ asset('asset/admin') }}/vendors/simple-datatables/style.css">
<div class="card">
    <div class="card-body">
        <button data-bs-toggle="modal" data-bs-target="#adddata" class="btn btn-primary" style="float: right">Add
            Data</button><br><br><br>
        <!-- Vertically Centered modal Modal -->
        <div class="modal fade" id="adddata" tabindex="-1" role="dialog" aria-labelledby="adddataTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="adddataTitle">Add Data
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.addpeople') }}" method="POST" id="editpeople">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="namevalue">Name</label>
                                    <input type="text" step="any" class="form-control" name="namevalue" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="tempatlahirvalue">Tempat Lahir</label>
                                    <input type="text" step="any" class="form-control" name="tempatlahirvalue" value=""
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggallahirvalue">Tanggal Lahir</label>
                                    <input type="date" step="any" class="form-control" name="tanggallahirvalue" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Kelamin</label>
                                    <select class="form-control" name="kelamin" required>
                                        <option value="p">P</option>
                                        <option value="l">L</option>
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Golongan Darah</label>
                                    <select class="form-control" name="golongandarah" required>
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="ab">AB</option>
                                        <option value="o">O</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="alamatvalue">Alamat</label><br>
                                    <textarea name="alamatvalue" aria-valuemax="" value="" style="width: 100%"
                                        required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Agama</label>
                                    <select class="form-control" name="agama" required>
                                        <option value="muslim">Muslim</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Status Perkawinan</label>
                                    <select class="form-control" required name="statusperkawinanvalue">
                                        <option value="menikah">Sudah Menikah</option>
                                        <option value="belum kawin">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaanvalue">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaanvalue" value="" required>
                            </div>

                            <div class="form-group">
                                <label for="kewarganegaraanvalue">Kewarganegaraan</label>
                                <input type="text" class="form-control" name="kewarganegaraanvalue" value="" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <div class="table-responsive">
            <table class="table table-striped text-center" id="table1" style="width: 100%">
                <thead>
                    <tr>
                        <th>DateTime</th>
                        <th>Name</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Kelamin</th>
                        <th>Golongan Darah</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Status Perkawainan</th>
                        <th>Pekerjaan</th>
                        <th>Kewarganegaraan</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="editpeople">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="namevalue">Name</label>
                            <input type="text" step="any" class="form-control" name="namevalue" value="" required
                                id="namevalue">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tempatlahirvalue">Tempat Lahir</label>
                            <input type="text" step="any" class="form-control" name="tempatlahirvalue" value="" required
                                id="tempatlahirvalue">
                        </div>
                        <div class="col-md-6">
                            <label for="tanggallahirvalue">Tanggal Lahir</label>
                            <input type="date" step="any" class="form-control" name="tanggallahirvalue" value=""
                                required id="tanggallahirvalue">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Kelamin</label>
                            <select class="form-control" id="kelaminvalue" name="kelamin" required>
                                <option value="p">P</option>
                                <option value="l">L</option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Golongan Darah</label>
                            <select class="form-control" id="golongandarahvalue" name="golongandarah" required>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="ab">AB</option>
                                <option value="o">O</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="alamatvalue">Alamat</label><br>
                            <textarea name="alamatvalue" aria-valuemax="" id="alamatvalue" value="" style="width: 100%"
                                required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select class="form-control" id="agamavalue" name="agama" required>
                                <option value="muslim">Muslim</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Status Perkawinan</label>
                            <select class="form-control" id="statusperkawinanvalue" required
                                name="statusperkawinanvalue">
                                <option value="menikah">Sudah Menikah</option>
                                <option value="belum kawin">Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaanvalue">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaanvalue" value="" required
                            id="pekerjaanvalue">
                    </div>

                    <div class="form-group">
                        <label for="kewarganegaraanvalue">Kewarganegaraan</label>
                        <input type="text" class="form-control" name="kewarganegaraanvalue" value="" required
                            id="kewarganegaraanvalue">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteaction">Confirm Action
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="deleteactionform">
                    @csrf
                    @method('delete')
                    <p class="text-center">Are You Sure Want Delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
                </form>
            </div>
        </div>
    </div>
</div>






<script src="{{ asset('asset/admin') }}/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/dataTables.responsive.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/dataTables.buttons.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/buttons.html5.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/buttons.flash.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/buttons.print.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="{{ asset('asset/admin') }}/libs/datatables/dataTables.select.min.js"></script>
<!-- Datatables init -->
<script src="{{ asset('asset/admin') }}/pages/datatables.init.js"></script>
<script>
    // Simple Datatable
    // let table1 = document.querySelector('#table1');
    // let dataTable = new simpleDatatables.DataTable(table1);
</script>

<script>
    $(table1).ready(function() {
    $('#table1').DataTable({
        processing: true,
        responsive: true,
        serverSide: true,
        language: {
        processing: '<i class="material-icons">autorenew</i>'},
        ajax: "{{ route('admin.peopletable') }}",
        columns: [
            { data: 'created_at' },
            { data: 'name' },
            { data: 'tempat_lahir' },
            { data: 'tanggal_lahir' },
            { data: 'kelamin' },
            { data: 'gol_darah' },
            { data: 'alamat' },
            { data: 'agama' },
            { data: 'status_perkawinan' },
            { data: 'pekerjaan' },
            { data: 'kewarganegaraan' },
            { data: 'button' },
        ],
        "columnDefs": [ {
            "targets": 11,
            "orderable": false
            } ]
    });
} );
</script>


<script type="text/javascript">
    function edit(id) {
        console.log('asd');
        var url = '{{ route("admin.peopleedit",":id")}}';
        var post = '{{ route("admin.peopledetail",":id")}}';
        post = post.replace(':id',id);
        var token = "{{ csrf_token() }}";
        $.ajax({ 
            type: 'post',
            data: { 
                id: id,
                _token: token
                },
                url: post,
            success: function(data){
                console.log(data.pekerjaan);
                document.getElementById('namevalue').value = data.name;
                document.getElementById('tempatlahirvalue').value = data.tempat_lahir;
                document.getElementById('tanggallahirvalue').value = data.tanggal_lahir;
                document.getElementById('kelaminvalue').value = data.kelamin;
                document.getElementById('golongandarahvalue').value = data.gol_darah;
                document.getElementById('alamatvalue').value = data.alamat;
                document.getElementById('agamavalue').value = data.agama;
                document.getElementById('statusperkawinanvalue').value = data.status_perkawinan;
                document.getElementById('pekerjaanvalue').value = data.pekerjaan;
                document.getElementById('kewarganegaraanvalue').value = data.kewarganegaraan;
            },
        })       
        url = url.replace(':id',id);
        $('#editpeople').attr('action', url);
        $('#exampleModalCenter').modal('show');
    }
</script>

<script>
    function destroy(id){
        console.log(id);
        var urldelete = '{{ route("admin.deletepeople",":id")}}';
        deleteurl = urldelete.replace(':id',id);
        $('#deleteactionform').attr('action', deleteurl);
        $('#deleteaction').modal('show');

    }
</script>

@endsection