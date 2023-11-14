@extends('layouts.auth')
<!-- Main Content -->
@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header d-flex justify-content-between">
        <h1>Gedung</h1>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Edit Gedung</h4>
              <div class="card-header-action">
                <a href="/gedung" class="btn btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            <div class="card-body pb-0">
              <form action="/gedung/{{ $gedung->id }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                  <label for="nama_gedung" class="form-label">Nama Gedung</label>
                  <input type="text" class="form-control @error('nama_gedung') is-invalid @enderror" id="nama_gedung"
                    name="nama_gedung" placeholder="Nama Gedung"
                    value="{{ old('nama_gedung', $gedung->nama_gedung) }}" autocomplete="off">
                  @error('nama_gedung')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    placeholder="nama-gedung" value="{{ old('slug', $gedung->slug) }}" autocomplete="off">
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
