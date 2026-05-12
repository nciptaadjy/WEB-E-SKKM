{{-- Top Navbar — shared across all roles --}}
@php
    $role = $role ?? 'mahasiswa';
    $userName = $userName ?? '';
    $userSub = $userSub ?? '';
@endphp

<nav class="fixed top-0 w-full z-50 bg-[#f6fafe]/80 backdrop-blur-md flex justify-between items-center px-4 md:px-8 h-16 shadow-[0_2px_20px_rgba(23,28,31,0.07)]">
    <div class="flex items-center gap-4 md:gap-8">
        {{-- Hamburger (mobile) --}}
        <button onclick="toggleMobileSidebar()" class="md:hidden p-2 rounded-lg hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined text-on-surface">menu</span>
        </button>
        <span class="font-bold text-primary text-lg md:text-xl tracking-tight font-headline">E-SKKM</span>
    </div>
    <div class="flex items-center gap-2 md:gap-4">
        <div class="text-right hidden sm:block">
            <p class="text-xs font-bold text-on-surface">{{ $userName }}</p>
            <p class="text-[10px] text-on-surface-variant">{{ $userSub }}</p>
        </div>
        <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-xs font-bold">
            {{ strtoupper(substr($userName ?: 'U', 0, 1)) }}
        </div>
    </div>
</nav>
