@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

クライアントID
109870498896-ids9u3arghcnbp2jbg77tbmns1bars1g.apps.googleusercontent.com

クライアントシークレット
06zVjfSJA15YtTgs1HJ9VYLm