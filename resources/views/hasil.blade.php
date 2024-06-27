@extends('layout.app')

@section('content')
    <h1>Hasil Perhitungan SPK WP</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Teknik</th>
                <th>Fisik</th>
                <th>Intelejen</th>
                <th>Mental</th>
                <th>Usia</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result['alternatif']->nama }}</td>
                    <td>{{ $result['alternatif']->teknik }}</td>
                    <td>{{ $result['alternatif']->fisik }}</td>
                    <td>{{ $result['alternatif']->intelejen }}</td>
                    <td>{{ $result['alternatif']->mental }}</td>
                    <td>{{ $result['alternatif']->usia }}</td>
                    <td>{{ number_format($result['score'], 4) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
