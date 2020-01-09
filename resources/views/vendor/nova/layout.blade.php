@extends(Auth::user()->adminFirstLogin() || Auth::user()->corporateAdminFirstLogin() ? 'auth.update_password' : 'nova::masterLayout' )
