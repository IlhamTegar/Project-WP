@extends('layout.app')

@section('content')
    <h1>Input Bobot</h1>
    
    <form action="{{ route('bobot.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="teknik">Teknik</label>
            <input type="number" class="form-control" id="teknik" name="teknik" min="1" max="5" value="{{ $bobot->teknik ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="fisik">Fisik</label>
            <input type="number" class="form-control" id="fisik" name="fisik" min="1" max="5" value="{{ $bobot->fisik ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="intelejen">Intelejen</label>
            <input type="number" class="form-control" id="intelejen" name="intelejen" min="1" max="5" value="{{ $bobot->intelejen ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="mental">Mental</label>
            <input type="number" class="form-control" id="mental" name="mental" min="1" max="5" value="{{ $bobot->mental ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="usia">Usia</label>
            <input type="number" class="form-control" id="usia" name="usia" min="1" max="5" value="{{ $bobot->usia ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('hasil') }}" class="btn btn-success">Selanjutnya</a>
    </div>
@endsection
