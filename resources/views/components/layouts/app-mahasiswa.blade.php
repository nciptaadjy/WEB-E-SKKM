<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $title ?? 'E-SKKM' }} - Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = { darkMode: "class", theme: { extend: {
            colors: {
                "primary": "#005ea4", "primary-container": "#0077ce", "on-primary": "#ffffff",
                "on-primary-container": "#fdfcff", "secondary": "#006e1c", "secondary-container": "#98f994",
                "on-secondary": "#ffffff", "on-secondary-container": "#0c7521",
                "tertiary": "#b7131a", "tertiary-container": "#db322f", "on-tertiary": "#ffffff",
                "error": "#ba1a1a", "error-container": "#ffdad6", "on-error": "#ffffff",
                "on-error-container": "#93000a", "background": "#f6fafe", "surface": "#f6fafe",
                "surface-container-lowest": "#ffffff", "surface-container-low": "#f0f4f8",
                "surface-container": "#eaeef2", "surface-container-high": "#e4e9ed",
                "surface-container-highest": "#dfe3e7",
                "on-surface": "#171c1f", "on-surface-variant": "#404752",
                "outline": "#707783", "outline-variant": "#c0c7d4",
                "primary-fixed": "#d3e4ff", "primary-fixed-dim": "#a2c9ff",
                "secondary-fixed": "#98f994", "tertiary-fixed": "#ffdad6",
            },
            fontFamily: { headline: ["Manrope"], body: ["Inter"], label: ["Inter"] }
        }}}
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .headline, .font-headline { font-family: 'Manrope', sans-serif; }

        /* Sidebar overlay mobile */
        #sidebar-overlay { transition: opacity 0.25s ease; }
        #mobile-sidebar { transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        #mobile-sidebar.open { transform: translateX(0); }

        /* Modal */
        .modal-wrap { transition: opacity 0.2s ease; }
        .modal-wrap.hidden { opacity: 0; pointer-events: none; }
        .modal-box {
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.2s ease;
        }
        .modal-wrap.hidden .modal-box { transform: scale(0.92) translateY(20px); opacity: 0; }
        .modal-wrap:not(.hidden) .modal-box { transform: scale(1) translateY(0); opacity: 1; }

        /* Safe area for iPhone */
        .pb-safe { padding-bottom: env(safe-area-inset-bottom, 1rem); }
        .bottom-nav { padding-bottom: env(safe-area-inset-bottom, 0); }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in { animation: slideUp 0.35s ease both; }

        @keyframes pageFadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .page-fade-in { animation: pageFadeIn 0.4s ease both; }
    </style>
    @stack('styles')
</head>

<body class="bg-surface text-on-surface min-h-screen">
    {{-- Sidebar Overlay (mobile) --}}
    
     <div id="modal-sertifikat-detail"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-sertifikat-detail')">
        <div class="modal-box bg-white w-full sm:max-w-lg rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[92vh] flex flex-col">
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-outline-variant/10 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-xl">description</span>
                    </div>
                    <h3 class="text-base font-extrabold text-on-surface font-headline">Detail Sertifikat</h3>
                </div>
                <button onclick="closeModal('modal-sertifikat-detail')"
                    class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">close</span>
                </button>
            </div>
            <div class="overflow-y-auto flex-1 p-5 sm:p-6 space-y-5">
                {{-- Kegiatan Info --}}
                <div>
                    <h4 class="text-lg font-bold text-on-surface font-headline" id="sd-nama-kegiatan">-</h4>
                    <div id="sd-status-wrap" class="mt-2"></div>
                </div>

                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-3">Informasi Kegiatan</p>
                    <div class="grid grid-cols-2 gap-2.5">
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Penyelenggara</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-penyelenggara">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-tanggal">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Kedudukan</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-kedudukan">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Bidang</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-bidang">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Sub Kegiatan</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-sub-kegiatan">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tingkat</p>
                            <p class="text-sm font-semibold text-on-surface capitalize" id="sd-tingkat">-</p>
                        </div>
                        <div class="col-span-2 p-3 bg-primary/5 rounded-xl border border-primary/15">
                            <p class="text-[10px] text-primary font-bold mb-0.5">Poin SKKM</p>
                            <p class="text-xl font-bold text-primary font-headline" id="sd-bobot">-</p>
                        </div>
                    </div>
                </div>

                {{-- Catatan Reject --}}
                <div id="sd-reject-wrap" class="hidden">
                    <div class="p-3 bg-error-container/20 rounded-lg border border-error/10">
                        <p class="text-xs text-on-error-container leading-relaxed">
                            <strong class="font-bold">Catatan Penolakan:</strong>
                            <span id="sd-catatan-reject"></span>
                        </p>
                    </div>
                </div>

                {{-- Link Sertifikat --}}
                <div id="sd-link-wrap" class="hidden">
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Bukti Sertifikat</p>
                    <a id="sd-link" href="#" target="_blank"
                        class="flex items-center gap-3 p-3 bg-surface-container-low rounded-xl hover:bg-primary/5 transition-colors group border border-outline-variant/20">
                        <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary text-lg">link</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-semibold text-primary truncate" id="sd-link-text">-</p>
                            <p class="text-[10px] text-on-surface-variant">Buka link sertifikat</p>
                        </div>
                        <span class="material-symbols-outlined text-outline text-sm group-hover:text-primary transition-colors">open_in_new</span>
                    </a>
                </div>
            </div>
            <div class="p-4 border-t border-outline-variant/10 bg-surface-container-low shrink-0">
                <button onclick="closeModal('modal-sertifikat-detail')"
                    class="w-full py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <div id="sidebar-overlay"
        class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm hidden"
        onclick="toggleMobileSidebar()"></div>

    {{-- Mobile Sidebar --}}
    <aside id="mobile-sidebar"
        class="fixed top-0 left-0 h-full w-72 z-50 bg-[#f0f4f8]/95 backdrop-blur-xl shadow-2xl flex flex-col
               -translate-x-full md:hidden">
        <div class="flex flex-col p-6 h-full">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <div>
                        <p class="font-bold text-primary text-sm leading-tight font-headline">Portal Mahasiswa</p>
                        <p class="text-xs text-slate-500">Sistem Kredit Kegiatan</p>
                    </div>
                </div>
                <button onclick="toggleMobileSidebar()" class="p-1.5 rounded-lg hover:bg-white/50">
                    <span class="material-symbols-outlined text-slate-500">close</span>
                </button>
            </div>
            @include('components.sidebar-mahasiswa', ['activePage' => $activePage ?? 'dashboard'])
        </div>
    </aside>

    {{-- Top Navbar --}}
    @include('components.navbar-top', [
        'role' => 'mahasiswa',
        'userName' => session('mahasiswa_nama', $mahasiswa->nama ?? ''),
        'userSub' => session('mahasiswa_nim', $mahasiswa->nim ?? ''),
    ])

    <div class="flex pt-16 min-h-screen pb-20 md:pb-0">
        {{-- Desktop Sidebar --}}
        <aside class="hidden md:flex h-[calc(100vh-64px)] w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-6 gap-2 z-30">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <div>
                        <p class="font-bold text-primary text-sm leading-tight font-headline">Portal Mahasiswa</p>
                        <p class="text-xs text-slate-500">Sistem Kredit Kegiatan</p>
                    </div>
                </div>
            </div>
            @include('components.sidebar-mahasiswa', ['activePage' => $activePage ?? 'dashboard'])
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 md:ml-64 min-w-0 w-full">
            <div class="p-4 sm:p-6 lg:p-8 max-w-6xl mx-auto space-y-8 page-fade-in">
                @include('components.alert')
                {{ $slot }}
            </div>
        </main>
    </div>

    {{-- Mobile Bottom Navigation --}}
    @include('components.mobile-nav-mahasiswa', ['activePage' => $activePage ?? 'dashboard'])

    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const isOpen = sidebar.classList.contains('open');
            if (isOpen) {
                sidebar.classList.remove('open');
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            } else {
                sidebar.classList.add('open');
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-wrap:not(.hidden)').forEach(el => {
                    el.classList.add('hidden');
                });
                document.body.style.overflow = '';
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
