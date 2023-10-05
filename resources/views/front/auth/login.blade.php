@extends('layouts.app')

@push('styles')

@endpush

@section('content')
<main class="container">
   
    <div class="row mt-5">
        <div class="col-md-5 mx-auto card m-2 p-0">
            <div class="card-header">
                <h4 class="text-dark text-center">Login</h4>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                @endif

                <form method="post" action="{{ route('post_login') }}">
                    @csrf()
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 p-2">
                            <input type="email" id="email" name="email" class="form-control emlOnly {{ ($errors->has('email')) ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email*"/>
                            @if($errors->has('email'))
                                <span id="email_err" class="text-danger text-sm clserr">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 p-2">
                            <input type="password" id="password" name="password" class="form-control {{ ($errors->has('password')) ? 'is-invalid' : '' }}" value="{{ old('pwd') }}" placeholder="Password*"/>
                            @if($errors->has('password'))
                                <span id="password_err" class="text-danger text-sm clserr">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center p-2">
                            <button type="submit" id="btn_signup" class="btn btn-sm btn-info mt-2">Login</button>
                            <p class="text-muted text-sm mt-3">Don't have an account? <a href="{{ route('signup') }}">Sign Up!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery( ".emlOnly" ).keypress(function(e) {
            var key = e.keyCode;
            var regex = /^[A-Za-z0-9\.\@]+$/;
            var isValid = regex.test(String.fromCharCode(key));
            if (!isValid) {
                e.preventDefault();
            }
        });

    });
</script>
@endpush