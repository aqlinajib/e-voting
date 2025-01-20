@extends('index') <!-- Merujuk ke template utama -->

@section('content') <!-- Menyediakan isi yield konten -->
<div class="container">

                        @if(Auth::user()->role == 'superadm')
                
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <!-- resources/views/adminall/edit.blade.php -->
    
<form method="POST" action="{{ route('adminall.update', ['id_event' => $event->id_event]) }}">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="nama_event">Nama Event</label>
        <input type="text" name="nama_event" class="form-control" value="{{ $event->nama_event }}" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" required>{{ $event->deskripsi }}</textarea>
    </div>

    <div class="form-group">
        <label for="active">Active</label>
        <input type="checkbox" name="active" value="{{ $event->active ? 'checked' : '' }}" checked>
    </div>

    <div class="form-group">
        <label for="kuota_vote">Kuota Vote</label>
        <input type="number" name="kuota_vote" class="form-control" value="{{ $event->kuota_vote }}" required>
    </div>

    <div class="form-group">
        <label for="sembunyikan_foto">Sembunyikan Foto</label>
        <input type="checkbox" name="sembunyikan_foto" value="{{ $event->sembunyikan_foto ? 'checked' : '' }}" checked>
    </div>





    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

                  @endif
                      </div>
                      @endsection