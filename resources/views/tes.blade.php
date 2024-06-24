<!-- resources/views/provinces/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Provinsi dan Kabupaten</title>
</head>
<body>
    <h1>Daftar Provinsi di Indonesia</h1>
    <ul>
        @foreach ($provinces as $province)
            <li>{{ $province['id'] }} - {{ $province['name'] }}</li>
        @endforeach
    </ul>

    <h1>Daftar Kabupaten di Indonesia</h1>
    {{-- <ul>
        @foreach ($regencies as $regency)
            <li>{{ $regency['id'] }} - {{ $regency['name'] }}</li>
        @endforeach
    </ul> --}}
</body>
</html>
