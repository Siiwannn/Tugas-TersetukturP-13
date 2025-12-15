@extends('layouts.main')
@section('title', 'Data Mobil Sewaan')

@section('content')

<div class="container py-4">
    <h3 class="mb-4 text-center">CRUD Data Mobil </h3>
    <div class="d-flex justify-content-start gap-2 mb-3">
        <button class="btn btn-primary" id="btnAdd">+Tambah Data</button>
        <a href="{{ route('mobil.all.pdf') }}" class="btn btn-danger">Report PDF</a>
    </div>

    <div class="table-responsive" style="width: 100%; margin: 0 auto;">
        <table class="table table-bordered table-striped" id="mobilTable">
            <thead class="table-dark">
                <tr>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Tahun</th>
                    <th>Harga Sewa/Hari</th>
                    <th>Warna</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $cars->links() }}
    </div>
</div>
<!-- Modal Tambah/Edit Mobil -->
<div class="modal fade" id="mobilModal" tabindex="-1" aria-labelledby="mobilModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <form id="formMobil" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" id="id">    <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="mobilModalLabel">Tambah Mobil Sewaan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-start">
        <div class="mb-2">
          <label>Nama</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Merk</label>
          <input type="text" name="brand" id="brand" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Model</label>
          <input type="text" name="model" id="model" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Tahun</label>
          <input type="number" name="year" id="year" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Harga Sewa/Hari</label>
          <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Warna</label>
          <input type="text" name="color" id="color" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Tipe Mesin</label>
          <input type="text" name="engine_type" id="engine_type" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Tipe Bahan Bakar</label>
          <input type="text" name="fuel_type" id="fuel_type" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Transmisi</label>
          <input type="text" name="transmission" id="transmission" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Kilometer</label>
          <input type="number" name="mileage" id="mileage" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>Deskripsi</label>
          <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-2">
          <label>Gambar</label>
          <input type="file" name="image" id="image" class="form-control">
          <small id="previewArea" class="d-block mt-2"></small>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<style>
    .pagination {
        border: none !important;
        box-shadow: none !important;
    }
    .pagination li {
        border: none !important;
    }
    .table {
        margin-bottom: 0;
    }
    .table-responsive {
        overflow-x: auto;
    }
    @media screen and (max-width: 768px) {
        .table {
            font-size: 12px;
        }
        .table th, .table td {
            padding: 8px;
        }
        .btn {
            padding: 4px 8px;
            font-size: 12px;
        }
        .container {
            padding: 10px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function () {
    // CSRF Setup
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });

    // Toastr Settings
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "2000"
    };

    // DataTables Load
    var table = $('#mobilTable').DataTable({
        ajax: "{{ route('admin.cars.data') }}",
        responsive: true,
        processing: true,
        columns: [
            { data: 'name' },
            { data: 'brand' },
            { data: 'model' },
            { data: 'year' },
            { data: 'price', render: function(data) { return 'Rp ' + data.toLocaleString(); } },
            { data: 'color' },
            {
                data: 'image',
                render: function (data) {
                    return data ? `<img src="/images/assets/${data}" width="60" class="rounded">` : 'No Image';
                }
            },
            {
                data: 'id',
                render: function (id) {
                    return `
                        <button class="btn btn-xs btn-warning btnEdit" data-id="${id}" style="padding: 4px 8px; font-size: 14px;">Edit</button>
                        <button class="btn btn-xs btn-danger btnDelete" data-id="${id}" style="padding: 4px 8px; font-size: 14px;">Delete</button>
                    `;
                }
            }
        ]
    });

    // Tambah Data
    $('#btnAdd').click(function() {
        $('#formMobil')[0].reset();
        $('#id').val('');
        $('#previewArea').html('');
        $('#mobilModalLabel').text('Tambah Mobil Sewaan');
        $('#mobilModal').modal('show');
    });

    // Simpan / Update
    $('#formMobil').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let id = $('#id').val();

    let url = id
        ? "/admin/cars/update/" + id
        : "{{ route('admin.cars.store') }}";

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(){
            $('.btn-success').attr('disabled', true).text('Menyimpan...');
        },
        success: function(res) {
            toastr.success(res.message);
            $('#mobilModal').modal('hide');
            $('#formMobil')[0].reset();
            table.ajax.reload(null, false);
        },
        complete: function(){
            $('.btn-success').attr('disabled', false).text('Simpan');
        },
        error: function(err) {
            toastr.error('Gagal menyimpan data');
            console.log(err);
        }
    });
});

    // Edit Data
    $('#mobilTable').on('click', '.btnEdit', function() {
        let id = $(this).data('id');
        $.get("{{ url('admin/cars/edit') }}/" + id, function(res) {
            $('#id').val(res.id);
            $('#name').val(res.name);
            $('#brand').val(res.brand);
            $('#model').val(res.model);
            $('#year').val(res.year);
            $('#price').val(res.price);
            $('#color').val(res.color);
            $('#engine_type').val(res.engine_type);
            $('#fuel_type').val(res.fuel_type);
            $('#transmission').val(res.transmission);
            $('#mileage').val(res.mileage);
            $('#description').val(res.description);
            $('#previewArea').html(res.image ? `<img src="/images/assets/${res.image}" width="80" class="rounded mt-2">` : '');
            $('#mobilModalLabel').text('Edit Mobil Sewaan');
            $('#mobilModal').modal('show');
        }).fail(() => toastr.error('Gagal ambil data'));
    });

    // Hapus Data
    $('#mobilTable').on('click', '.btnDelete', function() {
        let id = $(this).data('id');
        if(!confirm('Yakin hapus data ini?')) return;
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/cars/delete') }}/" + id,
            success: function(res) {
                toastr.info(res.message);
                table.ajax.reload(null, false);
            },
            error: function() {
                toastr.error('Gagal menghapus data');
            }
        });
    });
});
</script>
@endpush