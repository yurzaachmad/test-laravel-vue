@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <add-contract></add-contract>
                </div>
            </div>
            <br/>
            <!-- <button type="button" class="btn btn-primary" style="float: right;">Add</button> -->
        </div>
    </div>
</div>
@endsection
