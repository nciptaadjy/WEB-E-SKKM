<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>List Sertifikat - E-SKKM</title>
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
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #c0c7d4; border-radius: 10px; }
    </style>
</head>

{{-- 
    STRUKTUR LAYOUT:
    - <body> = flex column, min-h-screen
    - <nav> = fixed, h-16, full width (z-50)
    - .layout-wrapper = flex row, pt-16 (offset navbar)
    - <aside> = fixed, top-16, w-64, full height below navbar
    - <main> = ml-64 (sama dengan lebar aside), flex-1
--}}
<body class="bg-background text-on-background min-h-screen">

    {{-- ===== TOP NAVBAR (fixed, full width) ===== --}}
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

    {{-- ===== LAYOUT WRAPPER (offset dari navbar) ===== --}}
    <div class="flex pt-16 min-h-screen">

        {{-- ===== SIDEBAR (fixed, mulai dari bawah navbar) ===== --}}
        {{-- 
            - fixed: tidak ikut scroll
            - top-16: mulai tepat di bawah navbar h-16
            - h-[calc(100vh-64px)]: tinggi sisa layar setelah navbar
            - w-64: lebar 256px — HARUS SAMA dengan ml-64 di <main>
        --}}
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
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href={{ route('sertifikat.create') }}>
                    <span class="material-symbols-outlined" data-icon="cloud_upload">cloud_upload</span>
                    <span class="font-inter text-sm font-medium">Upload Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
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

        {{-- ===== MAIN CONTENT ===== --}}
        {{-- 
            - md:ml-64: offset SAMA PERSIS dengan w-64 sidebar
            - min-w-0: mencegah konten melar keluar
            - flex-1: ambil sisa lebar
        --}}
        <main class="flex-1 md:ml-64 min-w-0">
            <section class="p-4 lg:p-8 space-y-8">

                {{-- Bento Stats Header --}}
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="col-span-1 md:col-span-2 bg-gradient-to-br from-primary to-primary-container
                                p-6 rounded-2xl text-white shadow-xl flex flex-col justify-between">
                        <div>
                            <p class="font-label text-xs uppercase tracking-widest opacity-80 mb-1">Total Poin SKKM</p>
                            <h3 class="font-headline text-4xl lg:text-5xl font-bold">
                                145<span class="text-xl font-normal opacity-70 ml-2">/ 200</span>
                            </h3>
                        </div>
                        <div class="mt-4">
                            <div class="w-full bg-white/20 h-2 rounded-full overflow-hidden">
                                <div class="bg-white h-full" style="width: 72.5%"></div>
                            </div>
                            <p class="text-[10px] mt-2 opacity-80 font-medium">Anda butuh 55 poin lagi untuk syarat kelulusan.</p>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-2xl flex flex-col justify-between border border-outline-variant/10 shadow-sm">
                        <div class="w-10 h-10 rounded-full bg-secondary-container/30 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-secondary">verified</span>
                        </div>
                        <div>
                            <p class="text-2xl font-bold font-headline">12</p>
                            <p class="text-xs text-outline font-semibold">Sertifikat Disetujui</p>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-2xl flex flex-col justify-between border border-outline-variant/10 shadow-sm">
                        <div class="w-10 h-10 rounded-full bg-tertiary-fixed/30 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-tertiary">hourglass_empty</span>
                        </div>
                        <div>
                            <p class="text-2xl font-bold font-headline">3</p>
                            <p class="text-xs text-outline font-semibold">Dalam Antrean</p>
                        </div>
                    </div>
                </div>

                {{-- Riwayat Pengajuan --}}
                <div class="space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <h4 class="font-headline font-bold text-xl text-on-surface">Riwayat Pengajuan</h4>
                        <div class="flex gap-2">
                            <button class="px-4 py-1.5 rounded-full bg-primary/10 text-xs font-bold text-primary hover:bg-primary/20 transition-colors">Semua</button>
                            <button class="px-4 py-1.5 rounded-full bg-white border border-outline-variant/30 text-xs font-semibold text-outline hover:bg-surface-container-low transition-colors">Terbaru</button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        {{-- Card 1: Disetujui --}}
                        <div class="group bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 flex flex-col shadow-sm">
                            <div class="relative h-48 overflow-hidden">
                                <img alt="Certificate Preview"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzbFuZ-iXHkJ6WhpdKbMsRRo7cmf0O3pvDAeNdSh8hAwBAXUqalbLqdrn9prX7NzMc1cDEuhf6_X7hYX964wef9lvjHdR49GaBx_7BBj62mwjBUqB2ZIusldzVVB5hJUTam6maXoBo3oi9gSnY2kqI2RRNBKX35qGD-NcUEegMPfq-uCj-EvG5q6_w4U3U9lIwmGMyJyyouBTwp7KVpfWdCvJG7UHnSH6NqP8PVYcEj6vbMcpsvizXyRR2GMQO__NEbFVLYfWfrYM" />
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container text-[10px] font-bold uppercase tracking-tight flex items-center gap-1 shadow-sm">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Disetujui
                                    </span>
                                </div>
                            </div>
                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex justify-between items-start mb-2">
                                    <h5 class="font-headline font-bold text-on-surface line-clamp-1">Workshop UI/UX Advanced 2023</h5>
                                    <span class="text-primary font-bold text-sm shrink-0 ml-2">+15 Poin</span>
                                </div>
                                <p class="text-xs text-outline mb-4 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">calendar_month</span>
                                    12 Okt 2023
                                </p>
                                <div class="mt-auto flex gap-2">
                                    <button class="flex-1 py-2 rounded-lg bg-surface-container-low text-primary text-xs font-bold hover:bg-primary hover:text-white transition-all">Lihat Foto</button>
                                    <button class="p-2 rounded-lg bg-surface-container-low text-outline hover:bg-surface-variant transition-colors">
                                        <span class="material-symbols-outlined text-[18px]">download</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Card 2: Tertunda --}}
                        <div class="group bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 flex flex-col shadow-sm">
                            <div class="relative h-48 overflow-hidden">
                                <img alt="Certificate Preview"
                                     class="w-full h-full object-cover grayscale-[0.3] transition-transform duration-500 group-hover:scale-105"
                                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0kc4u2GUddp8omfERwEVz2kZquy4DjtGZmlP0YS7YkprXmbLZP4AuWoTFYnRZ7a76KJx7Tsn46qJz0nhzbZpTnrLTyxCGRrKI55m3lfENV1c1qpXeIw9rByWc9zdMy_LiNe--65mAvUHMLhilvEYFxaCeGev8CLIaoMFXuNcKPejDY7Ytm5kZGMKRWhDLWudwoUVf8xqpNNoIurI5U8LTEzLs2hq6PLoM3mds6aMZu6T3FxnQjjcKDI27B02lpolTSvTWW04MUfk" />
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 rounded-full bg-surface-container-high text-on-surface-variant text-[10px] font-bold uppercase tracking-tight flex items-center gap-1 shadow-sm">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        Tertunda
                                    </span>
                                </div>
                            </div>
                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex justify-between items-start mb-2">
                                    <h5 class="font-headline font-bold text-on-surface line-clamp-1">Seminar Nasional Cyber Security</h5>
                                    <span class="text-outline font-bold text-sm shrink-0 ml-2">+10 Poin</span>
                                </div>
                                <p class="text-xs text-outline mb-4 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">calendar_month</span>
                                    05 Des 2023
                                </p>
                                <div class="mt-auto flex gap-2">
                                    <button class="flex-1 py-2 rounded-lg bg-surface-container-low text-primary text-xs font-bold hover:bg-primary hover:text-white transition-all">Lihat Foto</button>
                                    <button class="p-2 rounded-lg bg-surface-container-low text-outline hover:bg-surface-variant transition-colors">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Card 3: Ditolak --}}
                        <div class="group bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 flex flex-col shadow-sm">
                            <div class="relative h-48 overflow-hidden">
                                <img alt="Certificate Preview"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBBBinACg8p3gmkdRHupFVbReQ-8qDiBcaeW4stPZixo90w5eQeBhYdzNHSt2h6fMM90ul6pNi4cr8aUKJaqee0BWSo0Z_MUg7vWanCWWXGd6T5hWrX21eX1jFcQWF0n9iUtsGMyOcr52pUV6OuV7JPDGW0FejfvmV_eQ5fui2EV0sszyZYIvKAd-1tAv_NT4qe7x9t__8SLanDFZMiCv8CwrZmQDtO99JsEoznZBWRPkh8D4zyr0-2LKidY8N3H2ld9J1rZZ87VB0" />
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 rounded-full bg-error-container text-on-error-container text-[10px] font-bold uppercase tracking-tight flex items-center gap-1 shadow-sm">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">cancel</span>
                                        Ditolak
                                    </span>
                                </div>
                            </div>
                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex justify-between items-start mb-2">
                                    <h5 class="font-headline font-bold text-on-surface line-clamp-1">Lomba Esai Mahasiswa Prov.</h5>
                                    <span class="text-tertiary font-bold text-sm shrink-0 ml-2">+25 Poin</span>
                                </div>
                                <p class="text-xs text-outline mb-4 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[14px]">calendar_month</span>
                                    20 Nov 2023
                                </p>
                                <div class="bg-error-container/20 p-2 rounded-lg mb-4">
                                    <p class="text-[10px] text-on-error-container leading-relaxed">
                                        <strong>Alasan:</strong> Dokumen tidak terbaca jelas atau blur. Silakan upload ulang file asli.
                                    </p>
                                </div>
                                <div class="mt-auto flex gap-2">
                                    <button class="flex-1 py-2 rounded-lg bg-tertiary text-white text-xs font-bold hover:opacity-90 transition-all">Upload Ulang</button>
                                    <button class="p-2 rounded-lg bg-surface-container-low text-outline hover:bg-surface-variant transition-colors">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </main>

    </div>{{-- end layout wrapper --}}

    {{-- ===== MODAL PREVIEW (hidden by default) ===== --}}
    <div class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-on-surface/40 backdrop-blur-sm hidden">
        <div class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <div class="p-4 border-b border-outline-variant/10 flex justify-between items-center">
                <h3 class="font-headline font-bold text-lg">Preview Sertifikat</h3>
                <button class="w-8 h-8 rounded-full hover:bg-surface-container-low flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto p-6 bg-surface-container-low custom-scrollbar">
                <img alt="Large Preview" class="w-full rounded-lg shadow-lg"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_mWyMhIkO4wx1SNd2PwP7aJ3ZnTyA1sFgtBc1cFgRlVPwjsqrC1ZnQ1_9hlH98YY4is6Ay5GqtCsyXKErLnvge-E3oQGKGXdQ-nqByH1B2CHUPyZa6gBZuGVlivrJawIkccivziSwIRlBmkvh1tvBIE6_8De-6-zyMbsS8H3mrDRq3yB12csvPNMauMS7KNiB76wRXZu7ewGMTxysZs7RQUGh0D5UAMad_GZjzi_38LKXh5KTK7J3wmL1AP43-Cii_G7LLZ5CFeQ" />
                <div class="mt-6 space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 bg-white rounded-xl">
                            <p class="text-[10px] text-outline font-bold uppercase mb-1">Nama Kegiatan</p>
                            <p class="text-sm font-semibold">Workshop UI/UX Advanced 2023</p>
                        </div>
                        <div class="p-4 bg-white rounded-xl">
                            <p class="text-[10px] text-outline font-bold uppercase mb-1">Penyelenggara</p>
                            <p class="text-sm font-semibold">Himpunan Mahasiswa Informatika</p>
                        </div>
                        <div class="p-4 bg-white rounded-xl">
                            <p class="text-[10px] text-outline font-bold uppercase mb-1">Kategori SKKM</p>
                            <p class="text-sm font-semibold">Pengembangan Softskill &amp; Penalaran</p>
                        </div>
                        <div class="p-4 bg-white rounded-xl">
                            <p class="text-[10px] text-outline font-bold uppercase mb-1">Status Verifikasi</p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="w-2 h-2 rounded-full bg-secondary"></span>
                                <p class="text-sm font-bold text-secondary">Terverifikasi oleh Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white flex justify-end gap-3 border-t border-outline-variant/10">
                <button class="px-6 py-2 rounded-lg bg-surface-container-high text-on-surface-variant font-bold text-sm">Tutup</button>
                <button class="px-6 py-2 rounded-lg bg-primary text-white font-bold text-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">download</span>
                    Download PDF
                </button>
            </div>
        </div>
    </div>

</body>
</html>