{{-- Mobile Bottom Navigation — Mahasiswa --}}
@php $activePage = $activePage ?? 'dashboard'; @endphp

<nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-[0_-1px_12px_rgba(0,0,0,0.07)] h-16 flex items-center justify-around z-50 bottom-nav">
    <a class="flex flex-col items-center gap-0.5 {{ $activePage === 'dashboard' ? 'text-primary' : 'text-slate-400' }}"
        href="{{ route('mahasiswa.dashboard') }}">
        <span class="material-symbols-outlined text-[22px]">dashboard</span>
        <span class="text-[10px] {{ $activePage === 'dashboard' ? 'font-bold' : 'font-medium' }}">Dasbor</span>
    </a>
    <a class="flex flex-col items-center gap-0.5 {{ $activePage === 'list' ? 'text-primary' : 'text-slate-400' }}"
        href="{{ route('sertifikat.index') }}">
        <span class="material-symbols-outlined text-[22px]">assignment</span>
        <span class="text-[10px] {{ $activePage === 'list' ? 'font-bold' : 'font-medium' }}">Sertifikat</span>
    </a>
    <div class="relative -top-5">
        <a href="{{ route('sertifikat.create') }}" class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shadow-lg shadow-primary/40 ring-4 ring-white">
            <span class="material-symbols-outlined">add</span>
        </a>
    </div>
    <a class="flex flex-col items-center gap-0.5 {{ $activePage === 'events' ? 'text-primary' : 'text-slate-400' }}"
        href="{{ route('mahasiswa.events') }}">
        <span class="material-symbols-outlined text-[22px]">campaign</span>
        <span class="text-[10px] {{ $activePage === 'events' ? 'font-bold' : 'font-medium' }}">Event</span>
    </a>
    <a class="flex flex-col items-center gap-0.5 {{ $activePage === 'panduan' ? 'text-primary' : 'text-slate-400' }}"
        href="{{ route('panduan') }}">
        <span class="material-symbols-outlined text-[22px]">menu_book</span>
        <span class="text-[10px] {{ $activePage === 'panduan' ? 'font-bold' : 'font-medium' }}">Panduan</span>
    </a>
    <form action="{{ route('logout') }}" method="POST" class="flex flex-col items-center">
        @csrf
        <button type="submit" class="flex flex-col items-center gap-0.5 text-slate-400">
            <span class="material-symbols-outlined text-[22px]">logout</span>
            <span class="text-[10px] font-medium">Keluar</span>
        </button>
    </form>
</nav>
