{{-- Sidebar Navigation — Mahasiswa --}}
@php
    $activePage = $activePage ?? 'dashboard';
    $items = [
        ['route' => 'mahasiswa.dashboard', 'icon' => 'dashboard', 'label' => 'Dashboard', 'key' => 'dashboard'],
        ['route' => 'sertifikat.create', 'icon' => 'cloud_upload', 'label' => 'Upload Sertifikat', 'key' => 'upload'],
        ['route' => 'sertifikat.index', 'icon' => 'assignment', 'label' => 'List Sertifikat', 'key' => 'list'],
        ['route' => 'mahasiswa.events', 'icon' => 'campaign', 'label' => 'Berita Event', 'key' => 'events'],
        ['route' => 'panduan', 'icon' => 'menu_book', 'label' => 'Panduan', 'key' => 'panduan'],
    ];
@endphp

<nav class="flex-1 space-y-1">
    @foreach($items as $item)
    <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
        {{ $activePage === $item['key'] ? 'bg-white text-primary shadow-sm font-semibold' : 'text-slate-600 hover:bg-white/50' }}"
        href="{{ route($item['route']) }}">
        <span class="material-symbols-outlined">{{ $item['icon'] }}</span>
        <span class="text-sm font-medium">{{ $item['label'] }}</span>
    </a>
    @endforeach
</nav>
<div class="mt-auto space-y-4">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-tertiary hover:bg-error-container/20 rounded-xl transition-all">
            <span class="material-symbols-outlined">logout</span>
            <span class="text-sm font-medium">Keluar</span>
        </button>
    </form>
</div>
