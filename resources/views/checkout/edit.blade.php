@extends('layouts.main')

@section('content')
<div class="m-5">
    <div class="pull-right mb-2">
        <a class="btn btn-primary" href="{{ route('checkout.index') }}">Back</a>
    </div>
    <form method="POST" action="{{ route('checkout.update', $checkout->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="status"><strong>Status:</strong></label>
                    <select name="status" class="form-control">
                        <option value="Proses" {{ $checkout->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $checkout->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
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
