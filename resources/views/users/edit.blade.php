@extends('layouts.app')

@section('title','编辑个人资料')

@section('content')

<div class="container">
  <div class="col-md-8 offset-md-2">

    <div class="card">
      <div class="card-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i> 编辑个人资料
        </h4>
      </div>

      <div class="card-body">

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label for="name-field">用户名</label>
            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username-field" value="{{ old('username', $user->name) }}" />
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="email-field">邮 箱</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="introduction-field">个人简介</label>
            <textarea name="introduction" id="introduction-field" class="form-control @error('introduction') is-invalid @enderror" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
            @error('introduction')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group mb-4">
            <label for="" class="avatar-label">用户头像</label>
            <input type="file" name="avatar" class="form-control-file @error('avatar') is-invalid @enderror">
            @if($user->avatar)
              <br>
              <img class="thumbnail img-responsive" src="{{ $user->avatar }}" width="200" />
            @endif
            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection