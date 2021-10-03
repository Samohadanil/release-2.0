@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Donations</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('donations_store') }}">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Donation ($)</label>
                            <input name="donation" min="0" type="number" placeholder="0" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control" required></textarea>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
