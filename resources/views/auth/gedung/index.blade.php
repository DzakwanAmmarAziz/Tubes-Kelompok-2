@extends('layouts.auth')
<!-- Main Content -->
@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header d-flex justify-content-between">
        <h1>Gedung</h1>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>List Gedung</h4>
              <div class="card-header-action">
                <a href="/gedung" class="btn btn-danger">Refresh <i class="fas fa-refresh"></i></a>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr class="text-center">
                      <th>ID</th>
                      <th>Nama Gedung</th>
                      <th>Slug</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($gedung as $g)
                      <tr class="text-center">
                        <td class="font-weight-600">{{ $g->id }}</td>
                        <td class="font-weight-600">{{ $g->nama_gedung }}</td>
                        <td class="font-weight-600">{{ $g->slug }}</td>
                        <td class="d-inline text-center">
                          <form action="/gedung/{{ $g->id }}" method="post">
                            @method('delete')
                            @csrf
                            <a href="/gedung/{{ $g->id }}/edit" class="btn btn-dark mb-2"><i
                                class="fas fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger mb-2"
                              onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                class="fas fa-trash-alt"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4>Input Gedung</h4>
            </div>
            <div class="card-body pb-0">
              <form action="/gedung" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama_gedung" class="form-label">Nama Gedung</label>
                  <input type="text" class="form-control @error('nama_gedung') is-invalid @enderror" id="nama_gedung"
                    name="nama_gedung" placeholder="Nama Gedung" value="{{ old('nama_gedung') }}"
                    autocomplete="off">
                  @error('nama_gedung')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    placeholder="nama-gedung" value="{{ old('slug') }}" autocomplete="off">
                  <small class="text-muted">Penulisan slug harus dengan huruf kecil dan dipisahkan dengan tanda strip
                    (-)</small>
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success mr-2">Simpan</button>
                  <button type="reset" class="btn btn-outline-danger">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('scripts')
  @if (session()->has('delete'))
    <script>
      $(document).ready(function() {
        toastr.options = {
          "closeButton": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        toastr["success"]("Data berhasil dihapus!");
      });
    </script>
  @elseif (session()->has('success'))
    <script>
      $(document).ready(function() {
        toastr.options = {
          "closeButton": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        toastr["success"]("Data berhasil disimpan!");
      });
    </script>
  @endif
@endsection
