@extends('layouts.main')

@section('content')
<div class="m-5">
<div class="pull-right mb-2">
    <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
</div>
<form method="POST" action="{{ route('user.update', $user->id) }}">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" name="name" value="{{$user->name}}"  placeholder="Name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="email"><strong>Email:</strong></label>
                <input type="text" name="email" value="{{$user->email}}"  placeholder="Email" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="email"><strong>Alamat:</strong></label>
                <input type="text" name="alamat"  value="{{$customer->alamat}}" placeholder="Alamat" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="email"><strong>No Handphone:</strong></label>
                <input type="text" name="no_hp"  value="{{$customer->no_hp}}"  placeholder="No Handphone" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="password"><strong>Password:</strong></label>
                <input type="password" name="password"  placeholder="Password" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="confirm-password"><strong>Confirm Password:</strong></label>
                <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="roles"><strong>Role:</strong></label>
                <select name="roles[]" class="form-control" multiple>
                    @foreach($roles as $role)
                        <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>


@endsection
