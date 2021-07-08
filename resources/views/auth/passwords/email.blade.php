@extends('auth.template')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="w-full lg:w-4/12 px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blue-gray-200 border-0">
        <div class="flex-auto px-4 lg:px-10 py-10 pt-6">
            <div class="text-blue-gray-500 text-center mb-3 font-bold">
                {{ __('Reset Password') }}
            </div>
            @if (session('status'))
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-blue-gray-500">
                <span class="text-xl inline-block mr-5 align-middle">
                    <i class="fas fa-bell"></i>
                </span>
                <span class="inline-block align-middle mr-8">
                    {{ session('status') }}
                </span>
                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                    <span>×</span>

                </button>
            </div>
            @endif


            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blue-gray-600 text-xs font-bold mb-2" for="grid-password">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="border-0 px-3 py-3 mb-2 placeholder-blue-gray-300 text-blue-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email" name="email" value="{{old('email')}}" />
                    @error('email')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="bg-blue-gray-800 text-white active:bg-blue-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150" type="submit">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <div class="w-1/2">
            <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-gray-600">Have an account</a>
            </div>
            <div class="w-1/2">
                <a href="{{ route('register') }}" class="text-sm font-semibold text-blue-gray-600">Create new account</a>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    function closeAlert(event) {
        let element = event.target;
        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }
        element.parentNode.parentNode.removeChild(element.parentNode);
    }
</script>
@endsection