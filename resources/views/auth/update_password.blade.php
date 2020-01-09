@extends('auth.parts.header')
@include('auth.parts.logo')
<div class="min-w-site bg-40 text-black min-h-full">
    <div class="container">
            <div class="col-md-8">

                    <form
                        class="bg-white shadow rounded-lg p-8 max-w-login mx-auto"
                        method="POST"
                        action="{{ route('nova.update_password') }}"
                    >
                        @csrf

                        @component('nova::auth.partials.heading')
                            {{ __('Please Update Your Password!') }}
                        @endcomponent

                        @if ($errors->any())
                            <p class="text-center font-semibold text-danger my-3">
                                @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @else
                                    {{ $errors->first('password_confirmation') }}
                                @endif
                            </p>
                        @endif

                        <div class="mb-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="block font-bold mb-2" for="password">{{ __('Password') }}</label>
                            <input class="form-control form-input form-input-bordered w-full" id="password" type="password"
                                   name="password" required autofocus>
                        </div>

                        <div class="mb-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="block font-bold mb-2" for="confirm_password">{{ __('Confirm Password') }}</label>
                            <input class="form-control form-input form-input-bordered w-full" id="password_confirmation" type="password"
                                   name="password_confirmation" required>
                        </div>

                        <button class="w-full btn btn-default btn-primary hover:bg-primary-dark" type="submit">
                            {{ __('Update Password') }}
                        </button>
                    </form>
                </div>
    </div>
</div>
@extends('auth.parts.footer')
