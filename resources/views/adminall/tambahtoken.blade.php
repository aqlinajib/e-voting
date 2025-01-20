@extends('index') <!-- Merujuk ke template utama -->

@section('content') <!-- Menyediakan isi yield konten -->
<div class="container">
<div class="custom-buttons-container">
        <!-- Back button -->
        <a href="javascript:void(0);" onclick="goBack()" class="btn btn-secondary btn-sm">
            <i class="mdi mdi-arrow-left"></i> Back
        </a>
    </div>
    <div class="card border-0">
        <div class="card-header">
            <h4 class="card-title">Input Token</h4>
        </div>
        <div class="card-body">
            <p class="card-description">
                Inputkan Token untuk memulai pemilihan.
            </p>
            <form method="post" action="{{ route('adminall.generateTokens') }}">
                @csrf
                <div class="form-group">
                    <label for="quantity">Jumlah Token:</label>
                    <input type="hidden" name="id_event" value="{{ $id_event }}">
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                </div>
                <!-- Mengganti button Generate Token dengan button yang disesuaikan -->

                    <button type="submit" class="btn btn-custom-color btn-sm">
                         Generate Token
                    </button>

            </form>
            <script>
                function goBack() {
            window.history.back();
        }
            </script>
        </div>
    </div>
</div>
@endsection
