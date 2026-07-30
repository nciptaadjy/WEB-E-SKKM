{{-- Sidebar Navigation — Admin (BEM / Kemahasiswaan / Ormawa) --}}
@php
    $activePage = $activePage ?? 'dashboard';
    $role = $role ?? 'bem';
    $navItems = $navItems ?? [];

    // Default nav items per role
    if (empty($navItems)) {
        if ($role === 'bem') {
            $navItems = [
                ['route' => 'bem.dashboard', 'icon' => 'dashboard', 'label' => 'Dasbor', 'key' => 'dashboard'],
                ['route' => 'bem.verifikasi', 'icon' => 'fact_check', 'label' => 'Form Verifikasi', 'key' => 'verifikasi'],
                ['route' => 'bem.riwayat', 'icon' => 'history', 'label' => 'Riwayat', 'key' => 'riwayat'],
            ];
        } elseif ($role === 'kemahasiswaan') {
            $navItems = [
                ['route' => 'kemahasiswaan.dashboard', 'icon' => 'dashboard', 'label' => 'Dasbor', 'key' => 'dashboard'],
                ['route' => 'kemahasiswaan.verifikasi', 'icon' => 'fact_check', 'label' => 'Verifikasi Akhir', 'key' => 'verifikasi'],
                ['route' => 'kemahasiswaan.riwayat', 'icon' => 'history', 'label' => 'Riwayat', 'key' => 'riwayat'],
                ['route' => 'kemahasiswaan.akun', 'icon' => 'manage_accounts', 'label' => 'Manajemen Akun', 'key' => 'akun'],
                ['route' => 'kemahasiswaan.point', 'icon' => 'tune', 'label' => 'Point SKKM', 'key' => 'point'],
            ];
        } elseif ($role === 'ormawa') {
            $navItems = [
                ['route' => 'ormawa.dashboard', 'icon' => 'dashboard', 'label' => 'Dasbor', 'key' => 'dashboard'],
                ['route' => 'ormawa.events', 'icon' => 'campaign', 'label' => 'Berita Event', 'key' => 'events'],
            ];
        }
    }
@endphp

<nav class="flex-1 space-y-1">
    @foreach($navItems as $item)
        @if(Route::has($item['route']))
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
            {{ $activePage === $item['key'] ? 'bg-white text-primary shadow-sm font-semibold' : 'text-slate-600 hover:bg-white/50' }}"
            href="{{ route($item['route']) }}">
            <span class="material-symbols-outlined"
                @if($activePage === $item['key']) style="font-variation-settings: 'FILL' 1;" @endif>{{ $item['icon'] }}</span>
            <span class="text-sm font-medium">{{ $item['label'] }}</span>
        </a>
        @else
        <span class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 cursor-not-allowed">
            <span class="material-symbols-outlined">{{ $item['icon'] }}</span>
            <span class="text-sm font-medium">{{ $item['label'] }}</span>
            <span class="ml-auto text-[9px] bg-surface-container-high text-on-surface-variant px-1.5 py-0.5 rounded-full font-bold uppercase">Segera</span>
        </span>
        @endif
    @endforeach
</nav>
<div class="mt-auto pt-6 border-t border-outline-variant/10">
    <form action="{{ route('logout.admin') }}" method="POST">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-tertiary hover:bg-error-container/20 rounded-xl transition-all">
            <span class="material-symbols-outlined">logout</span>
            <span class="text-sm font-medium">Keluar</span>
        </button>
    </form>
</div>


