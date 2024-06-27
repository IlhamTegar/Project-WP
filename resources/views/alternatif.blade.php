@extends('layout.app')

@section('content')
    <h1>Alternatif</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Alternatif</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alternatifModal">Tambah</button>
    </div>

    <table class="table table-bordered" id="alternatifTable">
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
            @foreach ($alternatifs as $alternatif)
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

    <form id="alternatifForm" action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="alternatifModal" tabindex="-1" role="dialog" aria-labelledby="alternatifModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alternatifModalLabel">Tambah Alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="inputFields">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama[]" required>
                            </div>
                            <p class="form-text text-muted" style="opacity: 0.6;">Untuk mengisi kriteria selain usia dengan nilai 1-10, sedangkan untuk usia 17-25</p>
                            <div class="form-group">
                                <label for="teknik">Teknik</label>
                                <input type="number" class="form-control" id="teknik" name="teknik[]" max="10" required>
                            </div>
                            <div class="form-group">
                                <label for="fisik">Fisik</label>
                                <input type="number" class="form-control" id="fisik" name="fisik[]" max="10" required>
                            </div>
                            <div class="form-group">
                                <label for="intelejen">Intelejen</label>
                                <input type="number" class="form-control" id="intelejen" name="intelejen[]" max="10" required>
                            </div>
                            <div class="form-group">
                                <label for="mental">Mental</label>
                                <input type="number" class="form-control" id="mental" name="mental[]" max="10" required>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia</label>
                                <input type="number" class="form-control" id="usia" name="usia[]" min="17" max="25" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- <form id="deleteAllForm" style="margin-top: 20px;"> -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alternatifhapus">Hapus Semua</button>
    <!-- </form> -->

    <div class="modal fade" id="alternatifhapus" tabindex="-1" role="dialog" aria-labelledby="alternatifModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="alternatifModalLabel">Hapus Semua Alternatif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <form id="deleteAllForm" action="{{ route('alternatif.destroyAll') }}" method="POST">
       			  @csrf
      			  @method('DELETE')
      			  <button type="button" class="btn btn-danger" onclick="confirmDeleteAll()">Hapus Semua</button>
    			</form>
                    </div>
                </div>
            </div>
        </div>

    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('bobot') }}" class="btn btn-success">Selanjutnya</a>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDeleteAll() {
            document.getElementById('deleteAllForm').submit();
            // if (confirm('Apakah Anda yakin ingin menghapus semua data?')) {
            //     document.getElementById('deleteAllForm').submit();
            // }
        }

        $(document).ready(function() {
            // Optional: Add any additional JavaScript/jQuery code here
        });
    </script>
@endsection
