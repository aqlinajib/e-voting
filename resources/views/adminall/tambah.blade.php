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
                        <h1>Create Event</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('adminall.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>

       <div class="form-group">
                <label for="active">Active</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" value="1" 
                    {{ old('active', true) ? 'checked' : '' }}>
            </div>

        <div class="form-group">
            <label for="kuota_vote">Kuota Vote</label>
            <input type="number" name="kuota_vote" class="form-control" required>
        </div>

       <div class="form-group">
                <label for="sembunyikan_foto">Sembunyikan Foto</label>
                <input type="hidden" name="sembunyikan_foto" value="0">
                <input type="checkbox" name="sembunyikan_foto" value="1" 
                    {{ old('sembunyikan_foto', true) ? 'checked' : '' }}>
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