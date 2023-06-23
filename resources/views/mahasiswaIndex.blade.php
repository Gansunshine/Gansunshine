<head>
    <link rel="icon" href="{{ url('public/images/students.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('public/js/monsweet/sweetalert2.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


    <style>
        .container-fluid {
            padding-top: 20px;
        }

        .column_title {
            margin-bottom: 20px;
        }

        .page_title {
            text-align: center;
            margin-bottom: 20px;
        }

        .table-responsive-sm {
            margin-bottom: 20px;
        }

        .table th {
            background-color: #dc3545;
            color: rgb(255, 255, 255);
        }

        .table td {
            vertical-align: middle;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .page_title h2 {
        font-family: 'Arial Black', sans-serif;
        font-size: 36px;
        color: #ff3366;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        text-transform: uppercase;
        letter-spacing: 2px;
        }


    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2 >SISWA</h2>
                </div>
            </div>
        </div>

        <div class="row col-md-12 form-inline">
            <button class="btn btn-info text-white" data-toggle="modal" data-target="#addComplain">
                <i class="fa fa-plus"></i> + Data Siswa
            </button>&nbsp;
        </div><br>
    </div>
    <br>

        <div class="col-md-12">
            <div class="table-responsive-sm">
                <table class="table table-bordered table-hover" id="myTable">
                    <thead class="bg-maroon">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAMA SISWA</th>
                            <th scope="col">JENIS KELAMIN</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">ALAMAT</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $value)
                        <tr>
                            <td>{{ $value['id'] }}</td>
                            <td>{{ $value['nama'] }}</td>
                            <td>{{ $value['jenis_kelamin'] }}</td>
                            <td>{{ $value['kelas'] }}</td>
                            <td>{{ $value['alamat'] }}</td>
                            <td>
                                <button type="button" class="btn btn-info text-white edit-btn" data-toggle="modal"
                                    data-target="#edit_modal"
                                    data-id="{{ $value['id'] }}"
                                    data-nama="{{ $value['nama'] }}"
                                    data-jk="{{ $value['jenis_kelamin'] }}"
                                    data-kelas="{{ $value['kelas'] }}"
                                    data-alamat="{{ $value['alamat'] }}">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTables plugin
            $('#myTable').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-KuLX6X+g6pP2t4SIBHv9zpOz7WJS5gL9ROz9LPvGpXr4lUO4lJ5w7tPFowVBWj3"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"
    integrity="sha384-Xe1bq0+xrDdN9ozO+izwIMQGeEOKvOnMnz9IrzBczFTo7yBjwZk5nP29GyWUku0d"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-pzjw8f+ua9r0w/U9K1l04p6jcWgTTjGKg1l3bw5RvZB9gH68v4+8Ot4ze+x3pIT0"
    crossorigin="anonymous"></script>


    {{-- Tutup Container-fluid --}}

    <!-- M=======================================================================-->
    <!-- M=======================================================================-->
    <!-- M=======================================================================-->
    <!-- M=======================================================================-->
    <!-- M=======================================================================-->

    <!-- Modal Add Siswa -->
<div class="modal fade" id="addComplain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-maroon">
            <h5 class="modal-title text-white" id="exampleModalLabel">
                TAMBAH DATA SISWA
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ URL::asset('/mahasiswa') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" id="id" name="id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" id="nama" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary text-white" id="btn_save">
                    <i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- End Modal -->

<!-- Edit Modal HTML -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ URL::asset('/mahasiswa/update') }}" method="POST" id="form_edit">
            @csrf
            @method('patch')
                <div class="modal-header">
                    <h4 class="modal-title">Edit Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_siswaMod">ID</label>
                        <input type="text" class="form-control" id="id_siswaMod" name="id_siswaMod" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_siswaMod">Nama</label>
                        <input type="text" class="form-control" id="nama_siswaMod" name="nama_siswaMod" required>
                    </div>
                    <div class="form-group">
                        <label for="jk_siswaMod">Jenis Kelamin</label>
                        <select class="form-control" id="jk_siswaMod" name="jk_siswaMod">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas_siswaMod">Kelas</label>
                        <input type="text" class="form-control" id="kelas_siswaMod" name="kelas_siswaMod" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_siswaMod">Alamat</label>
                        <textarea class="form-control" id="alamat_siswaMod" name="alamat_siswaMod" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Delete Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteSiswaBtn">Delete</button>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.1.js"
integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{ URL::asset('public/js/index.js') }}"></script>
<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


</body>
<script>
$(document).ready(function() {
		// Tangkap klik tombol edit
		$('.edit-btn').click(function() {
			// Ambil data dari atribut data pada tombol edit yang diklik
			var idSiswa = $(this).data('id');
			var namaSiswa = $(this).data('nama');
			var jkSiswa = $(this).data('jk');
			var kelasSiswa = $(this).data('kelas');
			var alamatSiswa = $(this).data('alamat');

			// Setel nilai input di modal pengeditan dengan data yang diambil
			$('#id_siswaMod').val(idSiswa);
			$('#nama_siswaMod').val(namaSiswa);
			$('#jk_siswaMod').val(jkSiswa);
			$('#kelas_siswaMod').val(kelasSiswa);
			$('#alamat_siswaMod').val(alamatSiswa);
		});
	});

    $('#myTable').DataTable();
    $('#div_tanggal').hide(true);

$('#btn_save').click(function() {
    swal("Berhasil!", "Save Completed ", "success");
});

$('#btn_update').click(function() {
    swal("Berhasil!", "Produk Has SOLVED", "success");
});

</script>
