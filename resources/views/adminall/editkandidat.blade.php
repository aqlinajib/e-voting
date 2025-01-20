@extends('index') <!-- Merujuk ke template utama -->

@section('content') <!-- Menyediakan isi yield konten -->
<div class="container">

                        @if(Auth::user()->role == 'superadm'|| Auth::user()->role == 'admin')
    <div class="custom-buttons-container">
        <!-- Back button -->
        <a href="javascript:void(0);" onclick="goBack()" class="btn btn-secondary btn-sm">
            <i class="mdi mdi-arrow-left"></i> Back
        </a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('adminall.updatekandidat', ['id' => $kandidat->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="nama_kandidat">Nama Kandidat</label>
            <input type="text" name="nama_kandidat" value="{{ $kandidat->nama_kandidat }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="foto">Foto Kandidat</label>
            <input type="file" name="foto" class="form-control-file" accept="image/*">
            
            @if ($kandidat->foto)
                <img src="{{ $kandidat->foto }}" alt="Foto Kandidat" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
        
            <input type="hidden" name="current_foto" value="{{ $kandidat->foto }}">
        </div>
       <div class="form-group">
            <label for="posisi">Posisi</label>
            <select name="posisi" class="form-control" required>
                <option value="ketua" {{ $kandidat->posisi == 'ketua' ? 'selected' : '' }}>Ketua</option>
                <option value="member" {{ $kandidat->posisi == 'member' ? 'selected' : '' }}>Member</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id"></label>
            <input hidden type="text" name="id" value="{{ $kandidat->id }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_event"></label>
            <input hidden type="text" name="id_event" value="{{ $kandidat->id_event }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <script>
                function goBack() {
            window.history.back();
        }
            </script>
                        @endif
                      </div>
                      @endsection