<!-- resources/views/chart.blade.php -->

@extends('index')

@section('content')
<script src="node_modules/chart.js/dist/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> <!-- Include SheetJS library -->
<div class="custom-buttons-container">
    <!-- Back button -->
    <a href="javascript:void(0);" onclick="goBack()" class="btn btn-secondary btn-sm">
        <i class="mdi mdi-arrow-left"></i> Back
    </a>
    <!-- Download Excel button -->
    <button onclick="downloadExcel()" class="btn btn-primary btn-sm">
        <i class="mdi mdi-download"></i> Download Excel
    </button>
</div>
<div class="container">
    <h2 class="center-text">Vote Result Chart</h2>
    <canvas id="resultChart" width="400" height="200"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const data = @json($event);

        // Modify labels to include the position
        const labels = data.map(kandidat => `${kandidat.nama_kandidat} (${kandidat.posisi})`);
        const votes = data.map(kandidat => kandidat.jumlah_suara);

        const ctx = document.getElementById('resultChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Suara',
                    data: votes,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

    function goBack() {
        window.history.back();
    }

    function downloadExcel() {
        const data = @json($event);
        const worksheetData = data.map(kandidat => ({
            Nama: kandidat.nama_kandidat,
            Posisi: kandidat.posisi,
            'Jumlah Suara': kandidat.jumlah_suara
        }));

        const worksheet = XLSX.utils.json_to_sheet(worksheetData);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Vote Results');

        XLSX.writeFile(workbook, 'Vote_Results.xlsx');
    }
</script>
<style>
    .center-text {
        text-align: center;
    }
</style>
@endsection