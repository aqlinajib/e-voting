@extends('index') <!-- Merujuk ke template utama -->

@section('content') <!-- Menyediakan isi yield konten -->
<div class="container">
  <div class="custom-buttons-container">
  <a href="javascript:void(0);" onclick="goBack()" class="btn btn-secondary btn-sm">
            <i class="mdi mdi-arrow-left"></i> Back
        </a>
    <a href="{{ route('adminall.tambahtoken',  ['id_event' => $id_event]) }}" class="btn btn-custom-color btn-sm">
      <i class="mdi mdi-plus-circle-outline"></i> Tambah Token
  </a>
  </div>
    @if(count($data) > 0)
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>
             No
            </th>
            <th>Token </th>
            <th>Status Token</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $token)
          @if ($token->id_event == $id_event)
          <tr class="table-info">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $token->token}}</td>
            <td>{{ $token->used_at ? 'terpakai' : 'belum terpakai' }}</td>

            <td>    <a href="#" onclick="showDeleteConfirmation({{ $token->id }})">
              <i class="mdi mdi-delete delete-icon"></i>
          </a>
           
              
         </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
  
<!-- Delete Confirmation Modal -->
<div id="deleteConfirmationModal" style="display: none;">
  <p>Are you sure you want to delete this token?</p>
  <button onclick="deleteToken()">Delete</button>
  <button onclick="hideDeleteConfirmation()">Cancel</button>
</div>

<script>
  function showDeleteConfirmation(id) {
      var modal = document.getElementById('deleteConfirmationModal');
      modal.style.display = 'block';
      modal.dataset.tokenId = id;
  }

  function hideDeleteConfirmation() {
      var modal = document.getElementById('deleteConfirmationModal');
      modal.style.display = 'none';
  }

  function deleteToken() {
      var id = document.getElementById('deleteConfirmationModal').dataset.tokenId;
      var deleteUrl = "{{ url('/deleteToken') }}/" + id;

      // Use Fetch API or other AJAX methods to send a DELETE request
      fetch(deleteUrl, {
              method: 'DELETE',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  'Content-Type': 'application/json',
                  // Add any other headers as needed
              },
          })
          .then(response => response.json()) // Adjust based on your response format
          .then(data => {
              if (data.success) {
                  alert('Token deleted successfully.');
                  // You can also update the UI as needed, e.g., remove the deleted item from the list
              } else {
                  alert('Failed to delete token.');
              }
              hideDeleteConfirmation();
          })
          .catch(error => {
              console.error('Error:', error);
              hideDeleteConfirmation();
          });
  }
  function goBack() {
            window.history.back();
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
    @endsection