@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <!-- -select-job-criteria -->
            @include('widget.select-job-criteria')

            <!-- navigation-list-page -->
            @include('widget.navigation-list-page')
        </div>
        <div class="col-md-9">
            <div class="card rounded-0">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection