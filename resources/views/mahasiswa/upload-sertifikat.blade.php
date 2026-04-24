<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Upload Sertifikat - E-SKKM</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-primary-fixed": "#001c38",
                        "background": "#f6fafe",
                        "surface-bright": "#f6fafe",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#eaeef2",
                        "tertiary-fixed": "#ffdad6",
                        "on-surface": "#171c1f",
                        "inverse-on-surface": "#edf1f5",
                        "surface-tint": "#0060a8",
                        "on-error": "#ffffff",
                        "error": "#ba1a1a",
                        "outline-variant": "#c0c7d4",
                        "on-error-container": "#93000a",
                        "tertiary-fixed-dim": "#ffb4ac",
                        "tertiary-container": "#db322f",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f0f4f8",
                        "surface-container-high": "#e4e9ed",
                        "on-primary": "#ffffff",
                        "tertiary": "#b7131a",
                        "secondary-fixed-dim": "#7ddc7a",
                        "primary": "#005ea4",
                        "outline": "#707783",
                        "on-secondary-fixed": "#002204",
                        "surface-variant": "#dfe3e7",
                        "on-tertiary-fixed-variant": "#93000d",
                        "on-secondary": "#ffffff",
                        "on-primary-container": "#fdfcff",
                        "on-primary-fixed-variant": "#004881",
                        "inverse-primary": "#a2c9ff",
                        "secondary-fixed": "#98f994",
                        "on-tertiary-container": "#fffbff",
                        "on-secondary-container": "#0c7521",
                        "secondary-container": "#98f994",
                        "on-secondary-fixed-variant": "#005313",
                        "on-background": "#171c1f",
                        "secondary": "#006e1c",
                        "surface": "#f6fafe",
                        "primary-fixed-dim": "#a2c9ff",
                        "primary-fixed": "#d3e4ff",
                        "error-container": "#ffdad6",
                        "surface-dim": "#d6dade",
                        "primary-container": "#0077ce",
                        "surface-container-highest": "#dfe3e7",
                        "on-tertiary-fixed": "#410002",
                        "on-surface-variant": "#404752",
                        "inverse-surface": "#2c3134"
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
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .headline { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="bg-background text-on-surface min-h-screen">

    {{-- ===== TOP NAVBAR (konsisten dengan list sertifikat) ===== --}}
    <nav
        class="fixed top-0 w-full z-50 bg-[#f6fafe]/80 dark:bg-slate-950/80 backdrop-blur-md flex justify-between items-center px-8 h-16 w-full shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
        <div class="flex items-center gap-8">
            <span class="font-manrope font-bold text-[#005ea4] dark:text-blue-400 text-xl tracking-tight">E-SKKM</span>
            <div class="hidden md:flex gap-6 font-manrope text-sm font-semibold">
                <a class="text-[#005ea4] font-bold border-b-2 border-[#005ea4] pb-1" href="#">Beranda</a>
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors" href="#">Panduan</a>
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors" href="#">FAQ</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 text-slate-500 hover:bg-slate-100/50 rounded-lg transition-all">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
            </button>
            <button class="p-2 text-slate-500 hover:bg-slate-100/50 rounded-lg transition-all">
                <span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
            </button>
            <img alt="Foto Profil Mahasiswa" class="w-8 h-8 rounded-full border-2 border-primary-container"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCv4MB192J79gCmbzz4pmR9UodhuTnaCHOOM2Emd7LpjQ9U9KvuYurqmdbJRzFBwOIom4QO5lGbkMFVtiVnv9snHZF6Jqj6OyUXSD4FAkczHTom5xSkprCs9QUGtxbk8D7wnb7wK-wHnsjsRUGccVEg3tfRch7WcIK1lqkFwzTpKkanDnUsPBPGBwbetpot_5KU9O37nfHnd7k0M8ZGHewHx4Ys89F1YirCD-6qMB5NVtQZYUa9woz7sM6pe0AL2aMGU8lkVOS9Dcc" />
        </div>
    </nav>

    {{-- ===== LAYOUT WRAPPER ===== --}}
    <div class="flex pt-16 min-h-screen">

        {{-- ===== SIDEBAR (konsisten dengan list sertifikat) ===== --}}
        <aside class="hidden md:flex flex-col fixed left-0 top-16 w-64 h-[calc(100vh-64px)]
                      bg-[#f0f4f8] border-r border-slate-200/60 p-6 gap-2 z-40">

            <div class="mb-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#005ea4] rounded-xl flex items-center justify-center text-white shrink-0">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <div>
                        <p class="font-bold text-[#005ea4] text-sm leading-tight" style="font-family: Manrope, sans-serif;">Portal Mahasiswa</p>
                        <p class="text-xs text-slate-500">Sistem Kredit Kegiatan</p>
                    </div>
                </div>
            </div>

            <aside class="hidden md:flex h-[calc(100vh-64px)] w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-6 gap-2">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                        <span class="material-symbols-outlined" data-icon="school">school</span>
                    </div>
                    <div>
                        <p class="font-manrope font-bold text-[#005ea4] text-sm leading-tight">Portal Mahasiswa</p>
                        <p class="text-xs text-slate-500">Sistem Kredit Kegiatan</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href={{ route('dashboard') }}>
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    <span class="font-inter text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
                    href={{ route('sertifikat.create') }}>
                    <span class="material-symbols-outlined" data-icon="cloud_upload">cloud_upload</span>
                    <span class="font-inter text-sm font-medium">Upload Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href={{ route('sertifikat.show') }}>
                    <span class="material-symbols-outlined" data-icon="assignment">assignment</span>
                    <span class="font-inter text-sm font-medium">List Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('panduan') }}">
                    <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                    <span class="font-inter text-sm font-medium">Panduan</span>
                </a>
            </nav>
            <div class="mt-auto space-y-4">
                {{-- <button
                    class="w-full py-3 px-4 bg-primary text-white rounded-xl text-sm font-semibold flex items-center justify-center gap-2 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-sm" data-icon="support_agent">support_agent</span>
                    Bantuan Teknis
                </button> --}}
                <a class="flex items-center gap-3 px-4 py-3 text-tertiary hover:bg-error-container/20 rounded-xl transition-all"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    <span class="font-inter text-sm font-medium">Keluar</span>
                </a>
            </div>
        </aside>

            <div class="mt-auto">
                <a class="flex items-center gap-3 px-4 py-3 text-[#b7131a] hover:bg-red-50 rounded-xl transition-all" href="#">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="text-sm font-medium">Keluar</span>
                </a>
            </div>
        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        {{-- ml-64 = sama dengan w-64 sidebar --}}
        <main class="flex-1 md:ml-64 min-w-0">
            <div class="p-4 lg:p-8 max-w-7xl mx-auto">

                {{-- Breadcrumb + Header --}}
                <div class="mb-8">
                    {{-- <nav class="flex items-center gap-2 text-xs font-medium text-on-surface-variant mb-4 overflow-x-auto no-scrollbar whitespace-nowrap">
                        <span class="hover:text-[#005ea4] cursor-pointer transition-colors">Dashboard</span>
                        <span class="material-symbols-outlined" style="font-size: 12px;">chevron_right</span>
                        <span class="text-[#005ea4] font-semibold">Registrasi Sertifikat</span>
                    </nav> --}}
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                        <div>
                            <h2 class="text-2xl md:text-[1.75rem] font-bold text-on-surface leading-tight"
                                style="font-family: Manrope, sans-serif;">Upload Sertifikat</h2>
                            <p class="text-on-surface-variant mt-1 text-sm md:text-base">
                                Unggah bukti kegiatan akademik dan non-akademik Anda untuk validasi SKKM.
                            </p>
                        </div>
                        <div class="flex items-center gap-3 bg-white px-5 py-3 rounded-2xl shadow-sm border border-outline-variant/20 self-end md:self-auto shrink-0">
                            <div class="text-right">
                                <p class="text-[0.6875rem] font-medium text-on-surface-variant uppercase tracking-wider">Estimasi Total Poin</p>
                                <p class="text-2xl md:text-3xl font-bold text-[#005ea4] tracking-tight" style="font-family: Manrope, sans-serif;">24.50</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Registration Layout --}}
                <div class="grid grid-cols-12 gap-6 md:gap-8">

                    {{-- Kiri: Upload Area --}}
                    <div class="col-span-12 lg:col-span-5 flex flex-col gap-6">
                        <div class="bg-surface-container-lowest rounded-2xl overflow-hidden group relative min-h-[380px] md:min-h-[420px] flex flex-col shadow-sm border border-outline-variant/10">
                            <div class="p-6 md:p-8 flex-1 flex flex-col items-center justify-center border-2 border-dashed border-outline-variant/40 m-4 rounded-xl bg-surface-container-low/30 hover:bg-surface-container-low transition-all cursor-pointer text-center group-hover:border-[#005ea4]/50">
                                <div class="w-16 h-16 bg-[#005ea4]/10 rounded-2xl flex items-center justify-center mb-6 text-[#005ea4] group-hover:scale-110 transition-transform shadow-sm">
                                    <span class="material-symbols-outlined text-4xl">cloud_upload</span>
                                </div>
                                <h3 class="text-lg font-semibold mb-2" style="font-family: Manrope, sans-serif;">Unggah File Sertifikat</h3>
                                <p class="text-sm text-on-surface-variant max-w-xs">Seret dan lepas file di sini atau klik untuk mencari file (PDF, JPG, PNG)</p>
                                <p class="mt-8 text-xs font-medium text-outline uppercase tracking-widest bg-surface px-3 py-1 rounded-full">Maksimal 5MB</p>
                            </div>
                            <div class="bg-[#005ea4]/5 p-4 flex items-start gap-3 px-6 md:px-8">
                                <span class="material-symbols-outlined text-[#005ea4] text-xl mt-0.5">info</span>
                                <p class="text-xs text-on-primary-fixed-variant leading-relaxed">Pastikan nama lengkap dan tanggal kegiatan terlihat jelas untuk mempermudah proses kurasi.</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 border border-outline-variant/20 shadow-sm">
                            <h4 class="text-sm font-semibold mb-4 flex items-center gap-2" style="font-family: Manrope, sans-serif;">
                                <span class="material-symbols-outlined text-[#005ea4] text-lg">lightbulb</span>
                                Informasi Tambahan
                            </h4>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-secondary text-lg mt-0.5">check_circle</span>
                                    <span class="text-xs md:text-sm text-on-surface-variant">Sertifikat tingkat nasional bernilai minimal 10 poin.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-secondary text-lg mt-0.5">check_circle</span>
                                    <span class="text-xs md:text-sm text-on-surface-variant">Kegiatan organisasi berlaku untuk periode 1 semester.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Kanan: Form --}}
                    <div class="col-span-12 lg:col-span-7">
                        <div class="bg-white rounded-2xl p-6 md:p-8 space-y-8 shadow-sm border border-outline-variant/10">

                            {{-- Section 1 --}}
                            <div class="space-y-6">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-[#005ea4] flex items-center justify-center text-white text-xs font-bold shadow-md shadow-[#005ea4]/20">1</div>
                                    <h3 class="text-base font-semibold" style="font-family: Manrope, sans-serif;">Detail Kegiatan</h3>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="md:col-span-2">
                                        <label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Aktivitas / Sertifikat</label>
                                        <input class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/20 rounded-xl py-3.5 px-4 text-sm placeholder:text-outline/50 transition-all outline-none"
                                               placeholder="Contoh: Juara 1 Lomba Karya Tulis Ilmiah" type="text" />
                                    </div>
                                    <div>
                                        <label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Kategori Kegiatan</label>
                                        <div class="relative">
                                            <select class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/20 rounded-xl py-3.5 px-4 text-sm appearance-none transition-all outline-none">
                                                <option disabled selected value="">Pilih Kategori</option>
                                                <option value="wajib">Wajib (Universitas)</option>
                                                <option value="umum">Umum (Minat/Bakat)</option>
                                            </select>
                                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none">expand_more</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Tanggal Pelaksanaan</label>
                                        <input class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/20 rounded-xl py-3.5 px-4 text-sm transition-all outline-none" type="date" />
                                    </div>
                                </div>
                            </div>

                            <div class="h-px bg-surface-container-high w-full"></div>

                            {{-- Section 2 --}}
                            <div class="space-y-6">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 rounded-lg bg-[#005ea4] flex items-center justify-center text-white text-xs font-bold shadow-md shadow-[#005ea4]/20">2</div>
                                    <h3 class="text-base font-semibold" style="font-family: Manrope, sans-serif;">Klasifikasi Poin</h3>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Lingkup Kegiatan</label>
                                        <div class="relative">
                                            <select class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/20 rounded-xl py-3.5 px-4 text-sm appearance-none transition-all outline-none">
                                                <option value="intern">Internal Kampus</option>
                                                <option value="lokal">Wilayah / Provinsi</option>
                                                <option selected value="nasional">Nasional</option>
                                                <option value="internasional">Internasional</option>
                                            </select>
                                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none">expand_more</span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Peran</label>
                                        <div class="relative">
                                            <select class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/20 rounded-xl py-3.5 px-4 text-sm appearance-none transition-all outline-none">
                                                <option value="peserta">Peserta / Anggota</option>
                                                <option value="pengurus">Pengurus / Panitia</option>
                                                <option value="juara">Pemenang / Juara</option>
                                                <option value="narasumber">Pembicara / Narasumber</option>
                                            </select>
                                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none">expand_more</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-secondary/5 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-4 border border-secondary/10">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary">
                                            <span class="material-symbols-outlined text-2xl">calculate</span>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-on-surface-variant uppercase tracking-wider">Estimasi Skor</p>
                                            <p class="text-2xl font-bold text-secondary" style="font-family: Manrope, sans-serif;">10.00 Poin</p>
                                        </div>
                                    </div>
                                    <div class="text-center md:text-right">
                                        <p class="text-[10px] text-on-surface-variant max-w-[150px] leading-tight">Skor final ditentukan oleh validator fakultas berdasarkan bukti dokumen.</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Footer Actions --}}
                            <div class="pt-4 flex flex-col sm:flex-row gap-4 justify-end">
                                <button class="px-8 py-3.5 text-sm font-semibold text-[#005ea4] hover:bg-[#005ea4]/5 rounded-xl transition-all border border-[#005ea4]/20 hover:border-[#005ea4]/40">
                                    Simpan Draft
                                </button>
                                <button class="px-10 py-3.5 text-sm font-semibold text-white bg-gradient-to-br from-[#005ea4] to-[#0077ce] rounded-xl shadow-lg shadow-[#005ea4]/25 hover:shadow-[#005ea4]/40 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                                    Daftarkan Sertifikat
                                </button>
                            </div>
                        </div>

                        {{-- Guidance Cards --}}
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-6 bg-white rounded-2xl border-l-4 border-[#005ea4] shadow-sm hover:shadow-md transition-shadow">
                                <h4 class="text-xs font-bold text-[#005ea4] uppercase tracking-widest mb-2 flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm">help</span>
                                    Butuh Bantuan?
                                </h4>
                                <p class="text-xs text-on-surface-variant leading-relaxed">Pelajari lebih lanjut mengenai klasifikasi poin di halaman <a class="text-[#005ea4] font-semibold hover:underline" href="#">Panduan Kurasi</a>.</p>
                            </div>
                            <div class="p-6 bg-white rounded-2xl border-l-4 border-secondary shadow-sm hover:shadow-md transition-shadow">
                                <h4 class="text-xs font-bold text-secondary uppercase tracking-widest mb-2 flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-sm">speed</span>
                                    Proses Cepat
                                </h4>
                                <p class="text-xs text-on-surface-variant leading-relaxed">Gunakan format PDF untuk proses validasi yang lebih cepat oleh tim curator fakultas.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

    </div>{{-- end layout wrapper --}}

    {{-- Dekoratif background --}}
    <div class="fixed bottom-0 right-0 w-[500px] h-[500px] bg-[#005ea4]/5 rounded-full blur-[120px] -z-10 translate-x-1/2 translate-y-1/2 pointer-events-none"></div>
    <div class="fixed top-0 right-0 w-[400px] h-[400px] bg-secondary/5 rounded-full blur-[100px] -z-10 translate-x-1/3 -translate-y-1/3 pointer-events-none"></div>

</body>
</html>