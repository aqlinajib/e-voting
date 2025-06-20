@extends('index')

@section('content')
<script src="node_modules/chart.js/dist/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> <!-- Include SheetJS library -->

<div class="custom-buttons-container d-flex justify-content-between align-items-center mb-3">
    <!-- Back button -->
    <a href="javascript:void(0);" onclick="goBack()" class="btn btn-secondary btn-sm">
        <i class="mdi mdi-arrow-left"></i> Back
    </a>
    <!-- Download Excel button -->
    <button onclick="downloadExcel()" class="btn btn-primary btn-sm">
        <i class="mdi mdi-download"></i> Download Excel
    </button>
</div>
<div class="container py-4" style="min-height: 100vh;">
    <h2 class="text-center mb-4">Hasil Voting</h2>

    <div class="row g-4">
        <!-- Ketua -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="text-center mb-3">Ketua</h4>
                    <div class="chart-container" style="position: relative; height: 300px;">
                        <canvas id="ketuaChart"></canvas>
                    </div>
                    <div id="ketuaNames" class="mt-3 text-center"></div>
                </div>
            </div>
        </div>

        <!-- Formatur -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4 class="text-center mb-3">Formatur</h4>
                    <div class="chart-container" style="position: relative; height: 300px;">
                        <canvas id="memberChart"></canvas>
                    </div>
                    <div id="memberNames" class="mt-3 text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const idEvent = "{{ $id_event }}"; // Ambil id_event dari server
        const ketuaCtx = document.getElementById('ketuaChart').getContext('2d');
        const memberCtx = document.getElementById('memberChart').getContext('2d');

        let ketuaChart;
        let memberChart;

        function fetchDataAndRenderCharts() {
            fetch(`/api/kandidat/${idEvent}`)
                .then(response => response.json())
                .then(data => {
                    const ketuaData = data.filter(kandidat => kandidat.posisi.toLowerCase() === 'ketua');
                    const memberData = data.filter(kandidat => kandidat.posisi.toLowerCase() === 'member');

                    const ketuaLabels = ketuaData.map(kandidat => kandidat.nama_kandidat);
                    const ketuaVotes = ketuaData.map(kandidat => kandidat.jumlah_suara);

                    const memberLabels = memberData.map(kandidat => kandidat.nama_kandidat);
                    const memberVotes = memberData.map(kandidat => kandidat.jumlah_suara);

                    // Render chart Ketua
                    if (ketuaChart) {
                        ketuaChart.data.labels = ketuaLabels;
                        ketuaChart.data.datasets[0].data = ketuaVotes;
                        ketuaChart.update();
                    } else {
                        ketuaChart = new Chart(ketuaCtx, {
                            type: 'pie',
                            data: {
                                labels: ketuaLabels,
                                datasets: [{
                                    data: ketuaVotes,
                                    backgroundColor: ketuaLabels.map(() =>
                                        `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.5)`),
                                    borderColor: ketuaLabels.map(() =>
                                        `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`),
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false } // Nonaktifkan legenda
                                }
                            }
                        });
                    }

                    // Render chart Member
                    if (memberChart) {
                        memberChart.data.labels = memberLabels;
                        memberChart.data.datasets[0].data = memberVotes;
                        memberChart.update();
                    } else {
                        memberChart = new Chart(memberCtx, {
                            type: 'bar', // Ubah tipe chart menjadi bar horizontal
                            data: {
                                labels: memberLabels,
                                datasets: [{
                                    label: 'Jumlah Suara',
                                    data: memberVotes,
                                    backgroundColor: memberLabels.map(() =>
                                        `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.5)`),
                                    borderColor: memberLabels.map(() =>
                                        `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`),
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                indexAxis: 'y', // Membuat chart menjadi horizontal
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: true } // Aktifkan legenda untuk bar chart
                                },
                                scales: {
                                    x: { beginAtZero: true },
                                    y: { beginAtZero: true }
                                }
                            }
                        });
                    }

                    // Tampilkan nama kandidat di bawah chart Ketua
                    const ketuaContainer = document.getElementById('ketuaNames');
                    ketuaContainer.innerHTML = ketuaData.map(kandidat => `<p>${kandidat.nama_kandidat} (${kandidat.jumlah_suara} suara)</p>`).join('');

                    // Tampilkan nama kandidat di bawah chart Member
                    const memberContainer = document.getElementById('memberNames');
                    memberContainer.innerHTML = memberData.map(kandidat => `<p>${kandidat.nama_kandidat} (${kandidat.jumlah_suara} suara)</p>`).join('');
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        fetchDataAndRenderCharts();
        setInterval(fetchDataAndRenderCharts, 1000);
    });

    function goBack() {
        window.history.back();
    }

    function downloadExcel() {
        const idEvent = "{{ $id_event }}"; // Ambil id_event dari server

        fetch(`/api/kandidat/${idEvent}`)
            .then(response => response.json())
            .then(data => {
                const worksheetData = data.map(kandidat => ({
                    Nama: kandidat.nama_kandidat,
                    Posisi: kandidat.posisi,
                    'Jumlah Suara': kandidat.jumlah_suara
                }));

                const worksheet = XLSX.utils.json_to_sheet(worksheetData);
                const workbook = XLSX.utils.book_new();
                XLSX.utils.book_append_sheet(workbook, worksheet, 'Vote Results');

                XLSX.writeFile(workbook, `Vote_Results_Event_${idEvent}.xlsx`);
            })
            .catch(error => console.error('Error fetching data for Excel:', error));
    }
</script>
<style>
    .center-text {
        text-align: center;
    }

    #ketuaNames p, #memberNames p {
        margin: 0;
        padding: 2px 0;
        font-size: 14px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .card-body {
        padding: 20px;
    }

    .chart-container {
        position: relative;
        width: 100%;
    }
</style>

@endsection
