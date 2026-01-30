<!-- Mobile Menu -->
<nav class="mobile-menu" id="mobileMenu">
    <a href="{{ route('inventory') }}">Inventory</a>
    <a href="{{ route('invest') }}">Invest</a>
    <a href="{{ route('stocks') }}">Stocks</a>
    <a href="{{ route('portfolio') }}">Portfolio</a>
    
    <div class="border-t border-white/10 my-2 pt-2">
        @auth
            <a href="{{ route('dashboard.index') }}" class="!text-[#E31937]">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="block w-full">
                @csrf
                <button type="submit" class="block w-full text-left text-white/60 hover:text-white py-3 bg-transparent border-none cursor-pointer" style="font-size: 15px; font-weight: 600;">Logout</button>
            </form>
        @else
            <div class="flex flex-col gap-3 mt-2 px-1">
                <a href="{{ route('login') }}" class="!text-white text-center rounded-lg border border-white/20 bg-white/5 py-2.5 !no-underline" style="padding: 10px;">Login</a>
                <a href="{{ route('register') }}" class="text-center rounded-lg bg-[#E31937] text-white py-2.5 !no-underline font-bold" style="padding: 10px; color:white;">Sign Up</a>
            </div>
        @endauth
    </div>
</nav>
