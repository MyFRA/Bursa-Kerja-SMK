@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-4 mb-5">
        
        @include('widget.trigger-navigasi-profil-siswa')

        <div class="col-lg-3 px-2">

        @include('widget.navigasi-profil-siswa')

        </div>
        <div class="col-lg-9 px-2">
        </div>
    </div>
</div>

@endsection