@extends('index')

@section('content')
<div class="container">
    <div class="custom-buttons-container">
        <!-- Back button -->
        <a href="javascript:void(0);" onclick="goBack()" class="btn btn-secondary btn-sm">
            <i class="mdi mdi-arrow-left"></i> Back
        </a>
        <!-- Spacer to push the next buttons to the right -->
        <div class="spacer"></div>

        <!-- Other buttons -->
        <a href="{{ route('adminall.token', ['id_event' => $id_event]) }}" class="btn btn-custom-colors btn-sm">
            <i class="mdi mdi-coin"></i> Tambah Token
        </a>
        <a href="{{ route('adminall.tambahkandidat', ['id_event' => $id_event]) }}" class="btn btn-custom-color btn-sm">
            <i class="mdi mdi-plus-circle-outline"></i> Tambah Kandidat
        </a>
    </div>

    <br>
    <br>

    @if(count($data) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kandidat</th>
                <th>Foto</th>
         
                <th class="text-center" style="margin: 0; padding: 0;">Actions</th>
            </tr>
        </thead>
        <tbody>
                        @php $iteration = 1; @endphp
            @foreach ($data as $kandidat)
                @if ($kandidat->id_event == $id_event)
                    @php
                        // Ambil status sembunyikan_foto dari tabel nama_events
                        $sembunyikanFoto = $kandidat->event->sembunyikan_foto;
                    @endphp
                    <tr class="table-info">
                        <td>{{ $iteration }}</td>
                        <td>{{ $kandidat->nama_kandidat }}</td>
                        <td>
                            @if($kandidat->foto && !$sembunyikanFoto)
                                <img src="{{ asset('storage/foto/' . $kandidat->foto) }}"  style="max-width: 100px;">
                            @else
                                @if ($sembunyikanFoto)
                                    Foto Disembunyikan
                                @else
                                    No Image
                                @endif
                            @endif
                        </td>
                        <td class="text-center" style="margin: 0; padding: 0;">
                            <a href="{{ route('adminall.editkandidat', ['id' => $kandidat->id]) }}" class="btn btn-custom-color btn-xs mx-0.5">
                                <i class="mdi mdi-table-edit"></i> Edit
                            </a>
                            <a href="#" onclick="showDeleteConfirmation({{ $kandidat->id }})" class="btn btn-danger btn-xs mx-0.5">
                                <i class="mdi mdi-delete delete-icon"></i> Delete
                            </a>
                        </td>
                    </tr>
                    @php $iteration++; @endphp
                @endif
            @endforeach
        </tbody>
    </table>

    <!-- Modal untuk Konfirmasi Penghapusan -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this candidate?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="deleteKandidat()">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideDeleteConfirmation()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>

            function goBack() {
            window.history.back();
        }
        function showDeleteConfirmation(id) {
            var modal = $('#deleteConfirmationModal');
            modal.modal('show');
            modal.data('kandidat-id', id);
        }

        function hideDeleteConfirmation() {
            $('#deleteConfirmationModal').modal('hide');
        }

        function deleteKandidat() {
            var id = $('#deleteConfirmationModal').data('kandidat-id');
            var deleteUrl = "{{ url('/deleteKandidat') }}/" + id;

            fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Candidate deleted successfully.');
                        location.reload();
                    } else {
                        alert('Failed to delete candidate.');
                    }
                    hideDeleteConfirmation();
                })
                .catch(error => {
                    console.error('Error:', error);
                    hideDeleteConfirmation();
                });
        }
    </script>
     <style>
        .custom-buttons-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .spacer {
            flex-grow: 1;
        }
    </style>

    @else
    <p>No data available</p>
    @endif
</div>
@endsection
