<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" style="background-color: #a24e21">
    <div class="container-fluid">
        <div class="text-white">
            Halaman Administrator
        </div>
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
    </div>
</nav>
<!-- End Navbar -->
