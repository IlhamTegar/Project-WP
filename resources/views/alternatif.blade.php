@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h1>Alternatif</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah Alternatif
        </button>
    </div>

    <!-- Table responsive wrapper -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Teknik</th>
                    <th>Fisik</th>
                    <th>Intelejen</th>
                    <th>Mental</th>
                    <th>Usia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alternatifs as $alternatif)
                    <tr>
                        <td>{{ $alternatif->nama }}</td>
                        <td>{{ $alternatif->teknik }}</td>
                        <td>{{ $alternatif->fisik }}</td>
                        <td>{{ $alternatif->intelejen }}</td>
                        <td>{{ $alternatif->mental }}</td>
                        <td>{{ $alternatif->usia }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <form action="{{ route('alternatif.destroyAll') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data?')">Hapus Semua</button>
        </form>
        <a href="{{ route('bobot.index') }}" class="btn btn-success">Selanjutnya</a>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('alternatif.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="teknik">Teknik</label>
                        <select class="form-control" id="teknik" name="teknik" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fisik">Fisik</label>
                        <select class="form-control" id="fisik" name="fisik" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="intelejen">Intelejen</label>
                        <select class="form-control" id="intelejen" name="intelejen" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mental">Mental</label>
                        <select class="form-control" id="mental" name="mental" required>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usia">Usia</label>
                        <select class="form-control" id="usia" name="usia" required>
                            @for ($i = 17; $i <= 25; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <small class="form-text text-muted" style="opacity: 0.6;">Untuk mengisi kriteria selain usia dengan nilai 1-10, sedangkan untuk usia 17-25.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
