@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <h1>Bantu anda dalam memilih pemain olahraga untuk team anda</h1>
            <p style="font-size: 18px; color: orange;">
                Web ini bertujuan untuk membantu para pelatih atau pencari pemain untuk menemukan pemain terbaik untuk di rekrut menggunakan Sistem Pendukung Keputusan
            </p>
            <a href="{{ route('mulai') }}" class="btn btn-warning btn-lg">
                Mulai &rarr;
            </a>
        </div>
    </div>
    <div class="row justify-content-center text-center mt-5">
        <div class="col-md-8">
            <img src="{{ asset('image/wp5273360-removebg-preview.png') }}" alt="Team Image" class="img-fluid">
        </div>
    </div>
</div>
@endsection

<style>
    .container {
        margin-top: 100px;
    }

    h1 {
        font-size: 36px;
        font-weight: bold;
    }

    p {
        font-size: 18px;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    .btn-warning {
        background-color: #ff9900;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 20px;
        border-radius: 25px;
        text-decoration: none;
    }

    .btn-warning:hover {
        background-color: #cc7a00;
    }
</style>
