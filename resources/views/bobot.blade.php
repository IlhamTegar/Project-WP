@extends('layout.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h1>Bobot</h1>
        <p>Masukan Bobot.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('bobot.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="teknik">Teknik</label>
            <select class="form-control" id="teknik" name="teknik" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $bobot->teknik == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="fisik">Fisik</label>
            <select class="form-control" id="fisik" name="fisik" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $bobot->fisik == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="intelejen">Intelejen</label>
            <select class="form-control" id="intelejen" name="intelejen" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $bobot->intelejen == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="mental">Mental</label>
            <select class="form-control" id="mental" name="mental" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $bobot->mental == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="usia">Usia</label>
            <select class="form-control" id="usia" name="usia" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $bobot->usia == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('hasil') }}" class="btn btn-success">Selanjutnya</a>
    </form>
</div>
@endsection
