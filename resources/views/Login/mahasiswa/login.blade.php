<!DOCTYPE html>
<html class="light" lang="id" style="">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login Mahasiswa — E-SKKM</title>
    <meta name="description" content="Sistem Kredit Kegiatan Mahasiswa ITB STIKOM Bali - Login menggunakan akun Microsoft kampus">
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed-dim": "#ffb4ac",
                        "on-secondary-fixed-variant": "#005313",
                        "surface-container-highest": "#dfe3e7",
                        "secondary": "#006e1c",
                        "on-tertiary-container": "#fffbff",
                        "on-tertiary-fixed-variant": "#93000d",
                        "tertiary-container": "#db322f",
                        "secondary-fixed": "#98f994",
                        "tertiary": "#b7131a",
                        "on-primary": "#ffffff",
                        "surface-bright": "#f6fafe",
                        "error-container": "#ffdad6",
                        "outline-variant": "#c0c7d4",
                        "on-primary-fixed": "#001c38",
                        "outline": "#707783",
                        "secondary-fixed-dim": "#7ddc7a",
                        "on-surface-variant": "#404752",
                        "inverse-surface": "#2c3134",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed": "#ffdad6",
                        "inverse-primary": "#a2c9ff",
                        "surface-container-low": "#f0f4f8",
                        "on-tertiary-fixed": "#410002",
                        "surface-variant": "#dfe3e7",
                        "on-secondary-container": "#0c7521",
                        "surface-container-high": "#e4e9ed",
                        "primary": "#005ea4",
                        "on-error": "#ffffff",
                        "primary-fixed": "#d3e4ff",
                        "on-secondary": "#ffffff",
                        "primary-fixed-dim": "#a2c9ff",
                        "surface": "#f6fafe",
                        "inverse-on-surface": "#edf1f5",
                        "background": "#f6fafe",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-container": "#fdfcff",
                        "on-secondary-fixed": "#002204",
                        "surface-dim": "#d6dade",
                        "surface-tint": "#0060a8",
                        "error": "#ba1a1a",
                        "secondary-container": "#98f994",
                        "on-surface": "#171c1f",
                        "on-error-container": "#93000a",
                        "surface-container": "#eaeef2",
                        "on-primary-fixed-variant": "#004881",
                        "on-background": "#171c1f",
                        "primary-container": "#0077ce"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .tonal-shift-bg {
            background: linear-gradient(180deg, rgba(246, 250, 254, 0.8) 0%, rgba(240, 244, 248, 0.8) 100%);
        }
        @keyframes pageFadeIn {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .page-fade-in { animation: pageFadeIn 0.5s ease both; }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(0, 94, 164, 0.3); }
            50% { box-shadow: 0 0 0 12px rgba(0, 94, 164, 0); }
        }
        .pulse-glow { animation: pulse-glow 2.5s ease-in-out infinite; }
    </style>
</head>

<body class="bg-surface font-body text-on-surface min-h-screen flex flex-col page-fade-in">
    <header
        class="fixed top-0 w-full z-50 flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto bg-[#f6fafe]/80 backdrop-blur-xl">
        <div class="flex items-center gap-2">
            <span class="text-xl font-bold text-[#005ea4] tracking-tighter font-headline" style="">E-SKKM</span>
        </div>
        <div class="hidden md:flex gap-8 items-center">
        </div>
    </header>
    <main class="grow flex items-center justify-center pt-16">
        <div
            class="w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 min-h-[600px] overflow-hidden rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] bg-surface-container-lowest">
            <!-- Left Panel: Branding & Logo -->
            <div class="relative bg-primary overflow-hidden flex flex-col items-center justify-center p-12 text-center">
                <!-- Background decorative element -->
                <div class="absolute inset-0 opacity-10">
                    <div
                        class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 translate-y-1/3">
                    </div>
                </div>
                <div class="relative z-10 space-y-8">
                    <div class="w-64 h-64 mx-auto flex items-center justify-center bg-white rounded-xl p-8 shadow-2xl">
                        <img alt="STIKOM Bali Logo" class="w-full h-full object-contain"
                            src="{{ asset('storage/image/STIKOM.png') }}"
                            style="">
                    </div>
                    <div class="space-y-2">
                        <h2 class="text-on-primary font-headline text-2xl font-bold tracking-tight" style="">
                            Sistem Kredit Mahasiswa</h2>
                        <p class="text-primary-fixed-dim font-body text-sm max-w-xs mx-auto" style="">Sistem
                            Terintegrasi untuk Validasi dan Verifikasi Satuan Kredit Kegiatan Mahasiswa.</p>
                    </div>
                </div>
            </div>
            <!-- Right Panel: Login via Microsoft -->
            <div class="flex flex-col justify-center p-8 md:p-16 lg:p-24 bg-surface-container-lowest">
                <div class="max-w-sm w-full mx-auto space-y-8">
                    <div class="space-y-2">
                        <h1 class="text-2xl md:text-3xl font-headline font-bold text-on-surface" style="">Masuk
                            Akun Mahasiswa</h1>
                        <p class="text-on-surface-variant text-sm font-body" style="">Gunakan akun Microsoft kampus Anda untuk mengakses sistem E-SKKM.</p>
                    </div>

                    @if($errors->has('login'))
                    <div class="p-4 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3">
                        <span class="material-symbols-outlined text-red-600 text-lg mt-0.5">error</span>
                        <p class="text-sm text-red-700 font-medium">{{ $errors->first('login') }}</p>
                    </div>
                    @endif

                    <!-- Microsoft Login Button -->
                    <div class="space-y-5">
                        <a href="{{ route('login.microsoft') }}"
                            class="w-full flex items-center justify-center gap-3 bg-[#2F2F2F] hover:bg-[#1a1a1a] text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all active:scale-[0.98] pulse-glow">
                            <!-- Microsoft Logo -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
                                <rect x="1" y="1" width="9" height="9" fill="#f25022"/>
                                <rect x="11" y="1" width="9" height="9" fill="#7fba00"/>
                                <rect x="1" y="11" width="9" height="9" fill="#00a4ef"/>
                                <rect x="11" y="11" width="9" height="9" fill="#ffb900"/>
                            </svg>
                            <span class="text-sm">Masuk dengan Microsoft</span>
                        </a>

                        <div class="flex items-center w-full gap-4">
                            <div class="h-[1px] flex-grow bg-outline-variant opacity-30"></div>
                            <span class="text-[10px] uppercase tracking-widest text-outline font-label">Info</span>
                            <div class="h-[1px] flex-grow bg-outline-variant opacity-30"></div>
                        </div>

                        <div class="bg-surface-container-low p-4 rounded-xl border border-outline-variant/10 space-y-3">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary text-base mt-0.5">school</span>
                                <p class="text-xs text-on-surface-variant leading-relaxed">
                                    Gunakan <strong class="text-on-surface">akun Microsoft kampus</strong> Anda (email @stikom-bali.ac.id) untuk login ke sistem.
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-secondary text-base mt-0.5">shield</span>
                                <p class="text-xs text-on-surface-variant leading-relaxed">
                                    Autentikasi aman melalui <strong class="text-on-surface">Microsoft SSO</strong>. Data Anda terlindungi.
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary text-base mt-0.5">bolt</span>
                                <p class="text-xs text-on-surface-variant leading-relaxed">
                                    Akun otomatis terhubung — tidak perlu registrasi manual.
                                </p>
                            </div>
                        </div>

                        {{-- DUMMY LOGIN FOR DEVELOPMENT --}}
                        @if(config('app.env') === 'local')
                        <div class="mt-8 p-4 border border-dashed border-amber-300 bg-amber-50 rounded-xl relative">
                            <span class="absolute -top-3 left-4 bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-0.5 rounded border border-amber-200">DEVELOPMENT ONLY</span>
                            <form action="{{ route('login.dummy') }}" method="POST" class="space-y-3 mt-2">
                                @csrf
                                <div>
                                    <label class="block text-xs font-bold text-amber-800 mb-1">Login Dummy (NIM Mahasiswa)</label>
                                    <div class="flex gap-2">
                                        <input type="text" name="nim" required placeholder="Masukkan NIM..." value="22003001" class="w-full text-sm p-2 rounded bg-white border border-amber-200 focus:ring-amber-500">
                                        <button type="submit" class="bg-amber-600 text-white px-4 py-2 rounded text-xs font-bold whitespace-nowrap hover:bg-amber-700">Masuk</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>

                    <div class="pt-4 text-center">
                        <a href="{{ route('login.admin') }}" class="text-xs text-primary font-semibold hover:underline">Login sebagai Admin (BEM/Ormawa/Kemahasiswaan) →</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Component -->
    <footer class="w-full py-8 mt-auto bg-[#f6fafe] dark:bg-slate-950">
        <div class="flex flex-col md:flex-row justify-content items-center px-12 w-full gap-4">
            <div class="font-['Manrope'] font-bold text-slate-900 dark:text-slate-100" style="">Kemahasiswaan ITB STIKOM Bali
            </div>
        </div>
    </footer>
</body>

</html>
