<h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path fill="var(--sidebar-icon)"
            d="M12 18.62l-6.55 3.27A1 1 0 0 1 4 21V4c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v17a1 1 0 0 1-1.45.9L12 18.61zM18 4H6v15.38l5.55-2.77a1 1 0 0 1 .9 0L18 19.38V4z" />
    </svg>
    <span class="sidebar-label">Products And Packages</span>
</h3>


{{-- <h4 class="ml-8 mb-4 text-xs text-white-50% uppercase tracking-wide">{{ $group }}</h4> --}}

<ul class="list-reset mb-8">
    <li class="leading-tight mb-4 ml-8 text-sm">
        <router-link to="/resources/packages" class="text-white text-justify no-underline dim">
            Packages
        </router-link>
    </li>
    <li class="leading-tight mb-4 ml-8 text-sm">
        <router-link to="/resources/products" class="text-white text-justify no-underline dim">
            Products
        </router-link>
    </li>
    <li class="leading-tight mb-4 ml-8 text-sm">
        <router-link to="/resources/package-product-media" class="text-white text-justify no-underline dim">
            Media
        </router-link>
    </li>
</ul>


<h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path fill="var(--sidebar-icon)"
            d="M11.03 8h3.94l1.06-4.24a1 1 0 1 1 1.94.48L17.03 8H20a1 1 0 0 1 0 2h-3.47l-1 4H18a1 1 0 1 1 0 2h-2.97l-1.06 4.25a1 1 0 1 1-1.94-.49l.94-3.76H9.03l-1.06 4.25a1 1 0 1 1-1.94-.49L6.97 16H4a1 1 0 0 1 0-2h3.47l1-4H6a1 1 0 0 1 0-2h2.97l1.06-4.24a1 1 0 1 1 1.94.48L11.03 8zm-.5 2l-1 4h3.94l1-4h-3.94z" />
    </svg>
    <span class="sidebar-label">Wajada Corporate</span>
</h3>
<ul class="list-reset mb-8">
    <li class="leading-tight mb-4 ml-8 text-sm">
        <router-link to="/resources/corporates" class="text-white text-justify no-underline dim">
            Corporates
        </router-link>
    </li>
</ul>

<h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path fill="var(--sidebar-icon)"
            d="M12 18.62l-6.55 3.27A1 1 0 0 1 4 21V4c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v17a1 1 0 0 1-1.45.9L12 18.61zM18 4H6v15.38l5.55-2.77a1 1 0 0 1 .9 0L18 19.38V4z" />
    </svg>
    <router-link to="/resources/activities" class="text-white text-justify no-underline dim">
        Activities
    </router-link>
</h3>