@extends('layouts.app')

@section('title', '首页')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">首页</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>这里是首页</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
