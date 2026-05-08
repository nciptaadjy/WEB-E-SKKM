<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
    </style>
</head>

<body class="bg-surface font-body text-on-surface min-h-screen flex flex-col">
    <!-- TopNavBar - Suppressed for Login context as per Shell Visibility Rules,
         but UI asks for consistency. Since Login is Transactional/Focused,
         we prioritize content but include a minimal Brand anchor. -->
    <header
        class="fixed top-0 w-full z-50 flex justify-between items-center px-8 py-4 max-w-screen-2xl mx-auto bg-[#f6fafe]/80 backdrop-blur-xl">
        <div class="flex items-center gap-2">
            <span class="text-xl font-bold text-[#005ea4] tracking-tighter font-headline"
                style="">E-SKKM&nbsp;</span>
        </div>
        <div class="hidden md:flex gap-8 items-center">
            <a class="text-slate-600 font-medium hover:text-[#005ea4] transition-all duration-300 font-headline"
                href="#" style=""><br></a>
            <a class="text-slate-600 font-medium hover:text-[#005ea4] transition-all duration-300 font-headline"
                href="#" style=""><br></a>
            <a class="text-slate-600 font-medium hover:text-[#005ea4] transition-all duration-300 font-headline"
                href="#" style=""><br></a>
        </div>
    </header>
    <main class="flex-grow flex items-center justify-center pt-16">
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
                            src="https://lh3.googleusercontent.com/aida/ADBb0uiOdFBw2_C2OPT5vNNkYZXHXvllSRdkvaMVVlLI3p35E7lRU2ZZeHhakC_Lry9l6r45Qkels7gqB1L3rGfLEyCYBM1yqLhIV4u3TU0Gq9mIc1wIKxJkYFHKUwnrSnn-IQiNe5jO54xLbnZ29Y2EfqRU83fTt6RyL9z44dZ3453UBq9bxjBVE9NTCjOHoVqMFUzwtTlHpicl-XGXBgrt8c4I_bSY-IpsyHs-Cs1kIRhUVCwfP-IWfqSs1WX7HN41yOC5_Je_MGkp9Q"
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
            <!-- Right Panel: Login Form -->
            <div class="flex flex-col justify-center p-8 md:p-16 lg:p-24 bg-surface-container-lowest">
                <div class="max-w-sm w-full mx-auto space-y-8">
                    <div class="space-y-2">
                        <h1 class="text-2xl md:text-3xl font-headline font-bold text-on-surface" style="">Masuk
                            Akun Ormawa</h1>
                        <p class="text-on-surface-variant text-sm font-body" style="">Gunakan kredensial
                            Organisasi Mahasiswa Anda untuk mengakses dasbor&nbsp;Organisasi Mahasiswa.</p>
                    </div>
                    <form class="space-y-5">
                        <div class="space-y-2">
                            <label class="text-xs font-semibold uppercase tracking-wider text-outline font-label"
                                for="email" style="">Alamat Email</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg"
                                    style="">mail</span>
                                <input
                                    class="w-full pl-10 pr-4 py-3 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary transition-all font-body text-sm text-on-surface placeholder:text-outline/50"
                                    id="email" placeholder="nama@univ.ac.id" type="email">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-semibold uppercase tracking-wider text-outline font-label"
                                for="password" style="">Kata Sandi</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-lg"
                                    style="">lock</span>
                                <input
                                    class="w-full pl-10 pr-10 py-3 bg-surface-container-low border-none rounded-lg focus:ring-2 focus:ring-primary transition-all font-body text-sm text-on-surface placeholder:text-outline/50"
                                    id="password" placeholder="••••••••" type="password">
                                <button
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-primary"
                                    type="button" style="">
                                    <span class="material-symbols-outlined text-lg" style="">visibility</span>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <label class="flex items-center gap-2 cursor-pointer group" style="">
                                <input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20"
                                    type="checkbox">
                                <span
                                    class="text-xs text-on-surface-variant font-medium group-hover:text-primary transition-colors"
                                    style="">Ingat Saya</span>
                            </label>
                            <a class="text-xs text-primary font-semibold hover:underline" href="#"
                                style="">Lupa Kata Sandi?</a>
                        </div>
                        <button
                            class="w-full bg-primary hover:bg-on-primary-fixed-variant text-on-primary font-headline font-bold py-3.5 rounded-lg shadow-lg shadow-primary/20 transition-all active:scale-[0.98]"
                            type="submit" style="">
                            Masuk Ke Sistem
                        </button>
                    </form>
                    <div class="pt-8 flex flex-col items-center gap-4">
                        <div class="flex items-center w-full gap-4">
                            <div class="h-[1px] flex-grow bg-outline-variant opacity-30"></div>
                            <span class="text-[10px] uppercase tracking-widest text-outline font-label"
                                style="">Bantuan Teknis</span>
                            <div class="h-[1px] flex-grow bg-outline-variant opacity-30"></div>
                        </div>
                        <p class="text-xs text-on-surface-variant text-center leading-relaxed" style="">
                            Kesulitan masuk? Hubungi <span class="text-primary font-semibold" style="">Unit ICT
                                Pusat</span> untuk pengaturan ulang akses akun Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Component -->
    <footer class="w-full py-8 mt-auto bg-[#f6fafe] dark:bg-slate-950">
        <div class="flex flex-col md:flex-row justify-between items-center px-12 w-full gap-4">
            <p class="font-['Inter'] text-sm text-slate-500 dark:text-slate-500" style=""><br></p>
            <div class="flex gap-6">
                <a class="text-slate-500 dark:text-slate-500 hover:text-[#005ea4] font-['Inter'] text-sm transition-opacity hover:opacity-80"
                    href="#" style=""><br></a>
                <a class="text-slate-500 dark:text-slate-500 hover:text-[#005ea4] font-['Inter'] text-sm transition-opacity hover:opacity-80"
                    href="#" style=""><br></a>
                <a class="text-slate-500 dark:text-slate-500 hover:text-[#005ea4] font-['Inter'] text-sm transition-opacity hover:opacity-80"
                    href="#" style=""><br></a>
            </div>
            <div class="font-['Manrope'] font-bold text-slate-900 dark:text-slate-100" style=""><br></div>
        </div>
    </footer>
</body>

</html>
