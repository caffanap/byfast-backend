@extends('auth.template')

@section('content')
<div class="w-full lg:w-4/12 px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0">
        <div class="flex-auto px-4 lg:px-10 py-10 pt-6">
            <div class="text-blue-gray-500 text-center mb-3 font-bold">
                {{ __('Register') }}
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blue-gray-600 text-xs font-bold mb-2" for="grid-password">{{ __('Name') }}</label>
                    <input type="name" class="border-0 px-3 py-3 mb-2 placeholder-blue-gray-300 text-blue-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Name" name="name" value="{{old('name')}}" />
                    @error('name')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blue-gray-600 text-xs font-bold mb-2" for="grid-password">{{ __('E-Mail Address') }}</label>
                    <input type="email" class="border-0 px-3 py-3 mb-2 placeholder-blue-gray-300 text-blue-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email" name="email" value="{{old('email')}}" />
                    @error('email')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blue-gray-600 text-xs font-bold mb-2" for="grid-password">{{ __('Password') }}</label>
                    <input type="password" class="border-0 px-3 py-3 mb-2 placeholder-blue-gray-300 text-blue-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Password" name="password" />
                    @error('password')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="relative w-full mb-3">
                    <label class="block uppercase text-blue-gray-600 text-xs font-bold mb-2" for="grid-password">{{ __('Confirm Password') }}</label>
                    <input type="password" class="border-0 px-3 py-3 mb-2 placeholder-blue-gray-300 text-blue-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Password Confirm" name="password_confirmation" />
                    @error('password')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="bg-gray-800 text-white active:bg-blue-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150" type="submit">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <div class="w-1/2">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm font-semibold text-blue-gray-600">{{ __('Forgot Your Password?') }}</a>
                @endif
            </div>
            <div class="w-1/2">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-gray-600">Have an account</a>
            </div>
        </div>
    </div>

</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection