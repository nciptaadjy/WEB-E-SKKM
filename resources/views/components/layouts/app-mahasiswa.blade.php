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
