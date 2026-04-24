<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>E-SKKM BEM Dashboard - Verifikasi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed": "#98f994",
                        "on-secondary-container": "#0c7521",
                        "inverse-primary": "#a2c9ff",
                        "surface-variant": "#dfe3e7",
                        "tertiary-fixed": "#ffdad6",
                        "on-primary-fixed": "#001c38",
                        "surface-container-low": "#f0f4f8",
                        "on-background": "#171c1f",
                        "on-tertiary-fixed-variant": "#93000d",
                        "on-tertiary-fixed": "#410002",
                        "on-surface": "#171c1f",
                        "on-error-container": "#93000a",
                        "error-container": "#ffdad6",
                        "primary-fixed": "#d3e4ff",
                        "primary-container": "#0077ce",
                        "surface-container-high": "#e4e9ed",
                        "on-primary-fixed-variant": "#004881",
                        "secondary-fixed-dim": "#7ddc7a",
                        "on-secondary-fixed-variant": "#005313",
                        "tertiary": "#b7131a",
                        "surface-tint": "#0060a8",
                        "surface-bright": "#f6fafe",
                        "primary-fixed-dim": "#a2c9ff",
                        "outline": "#707783",
                        "on-secondary": "#ffffff",
                        "outline-variant": "#c0c7d4",
                        "background": "#f6fafe",
                        "primary": "#005ea4",
                        "inverse-on-surface": "#edf1f5",
                        "on-surface-variant": "#404752",
                        "surface": "#f6fafe",
                        "on-tertiary": "#ffffff",
                        "secondary": "#006e1c",
                        "on-primary-container": "#fdfcff",
                        "tertiary-container": "#db322f",
                        "surface-container": "#eaeef2",
                        "surface-container-highest": "#dfe3e7",
                        "secondary-container": "#98f994",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-container": "#fffbff",
                        "inverse-surface": "#2c3134",
                        "surface-dim": "#d6dade",
                        "on-primary": "#ffffff",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#ffb4ac",
                        "on-secondary-fixed": "#002204",
                        "error": "#ba1a1a"
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f6fafe;
        }

        h1,
        h2,
        h3,
        .headline {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-background text-on-surface antialiased flex min-h-screen">
    <!-- SideNavBar -->
    <aside
        class="h-screen w-72 flex-col sticky left-0 top-0 bg-blue-50/80 dark:bg-slate-900/80 backdrop-blur-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] flex z-50">
        <div class="flex flex-col gap-2 p-6 h-full">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-primary-container"
                        style="font-variation-settings: 'FILL' 1;">account_balance</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-blue-800 dark:text-blue-300">E-SKKM</h1>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">BEM Dashboard</p>
                </div>
            </div>
            <nav class="flex flex-col gap-1">
                <a class="flex items-center gap-3 px-6 py-4 text-slate-500 dark:text-slate-400 font-medium hover:bg-white/30 dark:hover:bg-slate-800/30 transition-all duration-200 rounded-xl"
                    href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="font-['Manrope'] font-semibold text-sm">Dasbor</span>
                </a>
                <a class="flex items-center gap-3 px-6 py-4 text-blue-700 dark:text-blue-400 font-bold bg-white/50 dark:bg-slate-800/50 rounded-xl shadow-sm"
                    href="#">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">fact_check</span>
                    <span class="font-['Manrope'] font-semibold text-sm">Form Verifikasi</span>
                </a>
            </nav>
            <div class="mt-auto pt-6 border-t border-outline-variant/10">
                <button
                    class="w-full bg-primary text-on-primary py-4 rounded-xl font-headline font-bold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined">add_task</span>
                    <span>Ajukan Laporan</span>
                </button>
            </div>
        </div>
    </aside>
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- TopAppBar -->
        <header class="w-full sticky top-0 z-40 bg-white/70 dark:bg-slate-950/70 backdrop-blur-md">
            <div class="flex justify-between items-center w-full px-8 py-4">
                <div class="flex items-center gap-4">
                    <h2 class="text-xl font-extrabold text-blue-800 dark:text-blue-300 font-headline">Antrean Verifikasi
                    </h2>
                </div>
                <div class="flex items-center gap-6">
                    <div class="relative group hidden md:block">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
                        <input
                            class="bg-surface-container-low border-none rounded-full pl-10 pr-4 py-2 w-64 text-sm focus:ring-2 focus:ring-primary/20 transition-all"
                            placeholder="Cari mahasiswa..." type="text" />
                    </div>
                    <div class="flex items-center gap-2">
                        <button
                            class="p-2 rounded-full hover:bg-surface-container-high transition-colors text-on-surface-variant">
                            <span class="material-symbols-outlined">notifications</span>
                        </button>
                        <button
                            class="p-2 rounded-full hover:bg-surface-container-high transition-colors text-on-surface-variant">
                            <span class="material-symbols-outlined">settings</span>
                        </button>
                        <div class="h-8 w-[1px] bg-outline-variant/30 mx-2"></div>
                        <div class="flex items-center gap-3">
                            <div class="text-right hidden sm:block">
                                <p class="text-xs font-bold text-on-surface">Admin BEM</p>
                                <p class="text-[10px] text-on-surface-variant">Verifier Level 2</p>
                            </div>
                            <img alt="Admin Profile"
                                class="w-10 h-10 rounded-full object-cover border-2 border-primary-container"
                                data-alt="portrait of a professional young man in a business suit with a friendly expression and clean background"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuArEsm6hmOmi_hmPfe8aI4Qt8z1zzunB7kzStmu_VZ6_DuhO1P5RYtJVNBqXlySwb7EbQsgny0fMY2smSdsULjuLXLfu5LQAbXZZvlnk8gw--URqFN8W1AgM7u3oFNd7HhUoC43uQEHVkaobtfwkWj54JPtFPbdkq2kIMd29JyH8OgHpLrfRGJMbvszxBKr-hxYbwXnMTML0KKnmwA9EyW354Qy--u7ldJrTUxufaXlZE7aAMIZoFU38tfvgszm1i8v6_JVLvFeCiE" />
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Content -->
        <div class="p-8 overflow-y-auto">
            <!-- Quick Stats Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div
                    class="col-span-1 md:col-span-2 p-6 rounded-xl bg-surface-container-lowest border border-outline-variant/10 flex flex-col justify-between">
                    <div>
                        <p class="text-xs font-semibold text-outline uppercase tracking-widest mb-1">Total Antrean</p>
                        <h3 class="text-4xl font-bold text-primary font-headline">124 <span
                                class="text-sm font-medium text-on-surface-variant tracking-normal">Sertifikat</span>
                        </h3>
                    </div>
                    <div class="mt-4 flex items-center gap-2 text-secondary font-bold text-sm">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        <span>+12% hari ini</span>
                    </div>
                </div>
                <div class="p-6 rounded-xl bg-surface-container-lowest border border-outline-variant/10">
                    <p class="text-xs font-semibold text-outline uppercase tracking-widest mb-1">Rata-rata Respon</p>
                    <h3 class="text-2xl font-bold text-on-surface font-headline">14 <span
                            class="text-sm font-medium text-on-surface-variant tracking-normal">Menit</span></h3>
                    <div class="w-full bg-surface-container h-1.5 rounded-full mt-4 overflow-hidden">
                        <div class="bg-secondary h-full" style="width: 75%"></div>
                    </div>
                </div>
                <div class="p-6 rounded-xl bg-primary text-on-primary shadow-xl shadow-primary/20">
                    <p class="text-xs font-semibold opacity-80 uppercase tracking-widest mb-1">Status Sistem</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
                        <h3 class="text-xl font-bold font-headline">Optimal</h3>
                    </div>
                    <p class="text-[10px] mt-4 opacity-70">Server verifikasi beroperasi normal 99.9% uptime.</p>
                </div>
            </div>
            <!-- Main Verification Queue -->
            <section
                class="bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                <div class="p-6 border-b border-outline-variant/5 flex items-center justify-between">
                    <h3 class="text-lg font-bold font-headline">Antrean Terbaru</h3>
                    <div class="flex gap-2">
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-surface-container-low text-on-surface-variant rounded-lg text-sm font-semibold hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-lg">filter_list</span>
                            Filter
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 bg-surface-container-low text-on-surface-variant rounded-lg text-sm font-semibold hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-lg">download</span>
                            Ekspor
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low/50">
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Mahasiswa
                                </th>
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Kegiatan
                                    &amp; Sertifikat</th>
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Poin SKKM
                                </th>
                                <th
                                    class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/5">
                            <!-- Row 1 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold overflow-hidden">
                                            <img alt="Student profile" class="w-full h-full object-cover"
                                                data-alt="portrait of a female university student with glasses smiling warmly against a library background"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCn2U_nBqRko4RmL2tURUDyaPnMiY-zNTDX1WdEEhO2ZQgkmufrQ3Q6I8bBAA16Vlmjy-Y896ou7qTfUGnG4NECFeNgZDh_7T9RuUQDcrdqx6nLz-IqBswtxfl79h0WvR7vNavYv1c7WoazzxwA1r8_fbvEcICseGsKBBtd7dirSZThjD1dm6gx_jxANjxSBLDeZwThLWUXJx_1V6azpPKOCX-uvNDGEUCH8DWP-usSJ3SjWc8n1988V7i6R0AWWhC7Inqhy3I96e8" />
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">Anisa Rahmawati</p>
                                            <p class="text-xs text-on-surface-variant">2105101034 — Teknik Informatika
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="relative w-20 h-14 rounded-lg overflow-hidden bg-slate-200 border border-outline-variant/20 flex-shrink-0 cursor-pointer group-hover:ring-2 ring-primary/30 transition-all">
                                            <img alt="Certificate Preview" class="w-full h-full object-cover"
                                                data-alt="professional certificate of achievement with elegant gold seal and dark blue border on high quality paper"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxQgMY-o3eSt6spzMDBpOQVu8awOFwNMkvgumUvQrIxetpq3e5ycgQDvAB9z6P8hNIbyz8LNWwqf4UbRvbqXOi0rIAAVCmB6JmI0TrnPi4QC_XTnDjPOb4YelEUf95lc0SvA7Ix-OQwDyppHdmuZCreOnBhBXXL7OSR5M4rR69gXADB_Fihl7Fb1bTfES4InOcZiDJcMRgTuj5K2h5MmHJpKkmvIVsZRpaPKS_dpDkXZ0fVrSWqprTcwncwmtF5QGIqCNcYiWYVCU" />
                                            <div
                                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                <span
                                                    class="material-symbols-outlined text-white text-sm">visibility</span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-on-surface">Panitia Seminar Nasional
                                                AI</p>
                                            <p
                                                class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mt-1">
                                                Bidang Penalaran</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-lg font-bold text-primary font-headline">15</span>
                                        <span class="text-[10px] font-bold text-outline uppercase">Poin</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex justify-end gap-3">
                                        <button
                                            class="px-4 py-2 rounded-full border border-error text-error text-xs font-bold hover:bg-error-container transition-colors">Tolak</button>
                                        <button
                                            class="px-4 py-2 rounded-full bg-secondary text-on-secondary text-xs font-bold hover:opacity-90 shadow-sm transition-all active:scale-95">Setujui</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary font-bold overflow-hidden">
                                            <img alt="Student profile" class="w-full h-full object-cover"
                                                data-alt="casual portrait of a male student wearing a grey hoodie looking thoughtful in an outdoor campus setting"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBa1MEjqCeoILJeMaKKocG0-LsxW2C01Viqci9K53b7qjJqianU9ti-77QWoqliCQDUAbKk5qJ2I-U06rn0KQMGJ8Hn4M4Y-SC6w34fexVFqte7chcjJ5i4t2JaTA1kppHiZYe85uumohwqhBV5y73SNJeeYmi2s5lePq0fsqyN0m4gi3_ItkN9PqgEzHk4PGmxtU1d9ZNEU2CyDCNlNtVy0OvrxJfwNEDr8OfEQwl5ALJnI2NaLtgjpLW1UCTagCRcNBsYwcn2ng4" />
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">Dimas Prayoga</p>
                                            <p class="text-xs text-on-surface-variant">2105101048 — Hukum</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="relative w-20 h-14 rounded-lg overflow-hidden bg-slate-200 border border-outline-variant/20 flex-shrink-0 cursor-pointer group-hover:ring-2 ring-primary/30 transition-all">
                                            <img alt="Certificate Preview" class="w-full h-full object-cover"
                                                data-alt="ornate academic diploma with calligraphy text and an embossed red wax seal on cream parchment"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIcPjbSDuIzSDCE-3xYeIZnpjHWOj3D3UjCeSTqMZsZqOrcoDP-45E7oHPOObXR6P4dq04UBcpNsoSA__lx3xTzMjSsSoZnKQYbKfcq9UrNvodT3-xhKtYWxSKOqgBS9vY2WAKWffxNhwW4ojpxoNz3DlXWi7zb3d3SdP2Lxw90gyhppldwxvKM3VZN1LY7sfxX64mOzCq1DsRQjfcXWS02vYSsO5FKYicByUW0na6oknBscwR072-ctTDpNnWfORl0w6HM74uNUI" />
                                            <div
                                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                <span
                                                    class="material-symbols-outlined text-white text-sm">visibility</span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-on-surface">Juara 1 Lomba Debat Hukum
                                            </p>
                                            <p
                                                class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mt-1">
                                                Bidang Minat &amp; Bakat</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-lg font-bold text-primary font-headline">25</span>
                                        <span class="text-[10px] font-bold text-outline uppercase">Poin</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex justify-end gap-3">
                                        <button
                                            class="px-4 py-2 rounded-full border border-error text-error text-xs font-bold hover:bg-error-container transition-colors">Tolak</button>
                                        <button
                                            class="px-4 py-2 rounded-full bg-secondary text-on-secondary text-xs font-bold hover:opacity-90 shadow-sm transition-all active:scale-95">Setujui</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center text-tertiary font-bold overflow-hidden">
                                            <img alt="Student profile" class="w-full h-full object-cover"
                                                data-alt="portrait of a stylish female student with a confident smile in a modern architectural campus hallway"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuC3uKoso55CedZ0XgSgGis_RwR9rPlFKw4iANPqRoSLyTonFjpg5HmcXIejX4Vi5y62zgWv3VQdnNwW5htMIkXhyL-8CHha_N5ulkqllbBlFqjZ2TxKd1yqr7fuT9D8h9pKBOdKZN9CxQ4uFRFrkefFYlIi_YEXSYY_J7NbPO0WK6NRlFXdX_FhdBGXUx4rMgKoBWDu6M_oDxJtPDq2TrTjLhI7veGCNmzlwEhtsMi0stcs-rTni9HmWYclJBqYwVgR6Q_pi6Scb_k" />
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">Siti Maemunah</p>
                                            <p class="text-xs text-on-surface-variant">2105101012 — Akuntansi</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="relative w-20 h-14 rounded-lg overflow-hidden bg-slate-200 border border-outline-variant/20 flex-shrink-0 cursor-pointer group-hover:ring-2 ring-primary/30 transition-all">
                                            <img alt="Certificate Preview" class="w-full h-full object-cover"
                                                data-alt="minimalist modern certificate of participation with silver accents and clean sans-serif typography"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-UKyyP7b2E9OmBqaNAuzSre9mLjvokGKs-5nQbsW6J2gRyk9ejNT1oZSY2QO07bIQJuxENntOhcs4XN8_5lcZXaK0PG9uiuzM0xgeBvW1H4iVKH8h-Pju0Z6v4zycrQ_jIvXPBEc2sJbvtjLb_9v5T8K0p_crVCXWZOyLKTZ1drbpj-VxRKxk2SgNK3GZXAcGisPIcGijMdpJJ-YdtN24AiQypz0jru96OaJlwW7YIWzBJM8hESZXZvAPfSc7sIV82ruQsRNpZUg" />
                                            <div
                                                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                                <span
                                                    class="material-symbols-outlined text-white text-sm">visibility</span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-on-surface">Volunteer Bakti Sosial
                                                Desa</p>
                                            <p
                                                class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mt-1">
                                                Bidang Pengabdian</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-lg font-bold text-primary font-headline">10</span>
                                        <span class="text-[10px] font-bold text-outline uppercase">Poin</span>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex justify-end gap-3">
                                        <button
                                            class="px-4 py-2 rounded-full border border-error text-error text-xs font-bold hover:bg-error-container transition-colors">Tolak</button>
                                        <button
                                            class="px-4 py-2 rounded-full bg-secondary text-on-secondary text-xs font-bold hover:opacity-90 shadow-sm transition-all active:scale-95">Setujui</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div
                    class="p-6 bg-surface-container-low/30 border-t border-outline-variant/5 flex items-center justify-between">
                    <p class="text-xs text-on-surface-variant">Menampilkan <span class="font-bold">3</span> dari <span
                            class="font-bold">124</span> data</p>
                    <div class="flex gap-2">
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/30 text-on-surface-variant hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </button>
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-lg bg-primary text-on-primary font-bold text-xs">1</button>
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/30 text-on-surface-variant hover:bg-surface-container transition-colors text-xs">2</button>
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/30 text-on-surface-variant hover:bg-surface-container transition-colors text-xs">3</button>
                        <button
                            class="w-8 h-8 flex items-center justify-center rounded-lg border border-outline-variant/30 text-on-surface-variant hover:bg-surface-container transition-colors">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!-- Contextual FAB for quick action -->
    <button
        class="fixed bottom-8 right-8 w-14 h-14 rounded-full bg-primary-container text-on-primary-container shadow-2xl flex items-center justify-center hover:scale-105 transition-transform group">
        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">bolt</span>
        <span
            class="absolute right-full mr-4 bg-on-surface text-surface px-3 py-1 rounded text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">Verifikasi
            Cepat</span>
    </button>
</body>

</html>
