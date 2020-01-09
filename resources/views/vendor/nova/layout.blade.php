@if (App::environment('local'))
    @extends('nova::masterLayout')
@else
    @extends(Auth::user()->adminFirstLogin() || Auth::user()->corporateAdminFirstLogin() ? 'auth.update_password' : 'nova::masterLayout' )
@endif
