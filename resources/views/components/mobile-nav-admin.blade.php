{{-- Mobile Bottom Navigation — Admin (BEM / Kemahasiswaan / Ormawa) --}}
@php
    $activePage = $activePage ?? 'dashboard';
    $role = $role ?? 'bem';
    $navItems = $navItems ?? [];

    // Default mobile nav items per role (max 4 items + logout)
    if (empty($navItems)) {
        if ($role === 'bem') {
            $navItems = [
                ['route' => 'bem.dashboard', 'icon' => 'dashboard', 'label' => 'Dasbor', 'key' => 'dashboard'],
                ['route' => 'bem.verifikasi', 'icon' => 'fact_check', 'label' => 'Verifikasi', 'key' => 'verifikasi'],
                ['route' => 'bem.riwayat', 'icon' => 'history', 'label' => 'Riwayat', 'key' => 'riwayat'],
            ];
        } elseif ($role === 'kemahasiswaan') {
            $navItems = [
                ['route' => 'kemahasiswaan.dashboard', 'icon' => 'dashboard', 'label' => 'Dasbor', 'key' => 'dashboard'],
                ['route' => 'kemahasiswaan.verifikasi', 'icon' => 'fact_check', 'label' => 'Verifikasi', 'key' => 'verifikasi'],
                ['route' => 'kemahasiswaan.riwayat', 'icon' => 'history', 'label' => 'Riwayat', 'key' => 'riwayat'],
                ['route' => 'kemahasiswaan.akun', 'icon' => 'group', 'label' => 'Akun', 'key' => 'akun'],
            ];
        } elseif ($role === 'ormawa') {
            $navItems = [
                ['route' => 'ormawa.dashboard', 'icon' => 'dashboard', 'label' => 'Dasbor', 'key' => 'dashboard'],
                ['route' => 'ormawa.events', 'icon' => 'campaign', 'label' => 'Event', 'key' => 'events'],
            ];
        }
    }
@endphp

<nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-[0_-1px_12px_rgba(0,0,0,0.07)] h-16 flex items-center justify-around z-50 bottom-nav">
    @foreach($navItems as $item)
        @if(Route::has($item['route']))
        <a class="flex flex-col items-center gap-0.5 {{ $activePage === $item['key'] ? 'text-primary' : 'text-slate-400' }}"
            href="{{ route($item['route']) }}">
            <span class="material-symbols-outlined text-[22px]">{{ $item['icon'] }}</span>
            <span class="text-[10px] {{ $activePage === $item['key'] ? 'font-bold' : 'font-medium' }}">{{ $item['label'] }}</span>
        </a>
        @endif
    @endforeach
    <form action="{{ route('logout.admin') }}" method="POST" class="flex flex-col items-center">
        @csrf
        <button type="submit" class="flex flex-col items-center gap-0.5 text-slate-400">
            <span class="material-symbols-outlined text-[22px]">logout</span>
            <span class="text-[10px] font-medium">Keluar</span>
        </button>
    </form>
</nav>
