<!DOCTYPE html>
<html>
<head>
    <title>Selected Candidates</title>
</head>
<body>
    <h1>Selected Candidates</h1>
    <ul>
        @foreach($candidates as $candidate)
            <li>{{ $candidate->nama_kandidat }} - {{ $candidate->posisi }}</li>
        @endforeach
    </ul>
</body>
</html>