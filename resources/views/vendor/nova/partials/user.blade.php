<dropdown-trigger class="h-9 flex items-center" slot-scope="{toggle}" :handle-click="toggle">
    @isset($user->email)
        <img
            src="{{'/'.auth()->user()->image }}?size=512"
            class="rounded-full w-8 h-8 mr-3"
        />
    @endisset

    <span class="text-90">
        {{ $user->name ?? $user->email ?? __('Nova User') }}
    </span>
</dropdown-trigger>

<dropdown-menu slot="menu" width="200" direction="rtl">
    <ul class="list-reset">
        @if(auth()->user()->isAdmin())
            <li>
                <a href="wajad/resources/super-admins/{{auth()->user()->id }}" class="block no-underline text-90 hover:bg-30 p-3">
                    My Profile
                </a>
            </li>
        @endif
        @if(auth()->user()->isCorporateAdmin())
                <li>
                    <a href="wajad/resources/users/{{auth()->user()->id }}" class="block no-underline text-90 hover:bg-30 p-3">
                        My Profile
                    </a>
                </li>
        @endif
        <li>
            <a href="{{ route('nova.logout') }}" class="block no-underline text-90 hover:bg-30 p-3">
                {{ __('Logout') }}
            </a>
        </li>
    </ul>
</dropdown-menu>
