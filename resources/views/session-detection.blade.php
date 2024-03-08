@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Warning</div>

                <div class="card-body">
                        <div class="alert alert-danger text-center" role="alert">
                            Oops! You are allowed to have only one valid session per IP address. We found your previous session which is in progress.
                            <p class="mb-4">If you wish, you can continue with this new session. Please note that by continuing with the new session, your previous session will be automatically invalidated.</p>
                        </div>

                    <div class="mt-4 text-center">
                        <form method="POST" action="{{ url('/session-continue') }}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ session('previous_session') }}">
                            <button type="submit" class="btn btn-dark me-2">Continue With This Session</button>
                            <a href="{{ url('/home'); }}" class="btn btn-light border border-2">Back To Home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
