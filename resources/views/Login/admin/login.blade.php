<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login Admin - E-SKKM</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#005ea4",
                        "primary-container": "#0077ce",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#fdfcff",
                        "surface": "#f6fafe",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f0f4f8",
                        "on-surface": "#171c1f",
                        "on-surface-variant": "#404752",
                        "outline": "#707783",
                        "outline-variant": "#c0c7d4",
                        "error": "#ba1a1a",
                        "error-container": "#ffdad6",
                        "tertiary": "#b7131a",
                    },
                    fontFamily: {
                        headline: ["Manrope"],
                        body: ["Inter"],
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
    </style>
</head>

<body class="bg-surface min-h-screen flex items-center justify-center p-4">

    {{-- Decorative background --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px] -translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-primary-container/10 rounded-full blur-[100px] translate-x-1/4 translate-y-1/4"></div>
    </div>

    <div class="w-full max-w-md">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary rounded-2xl mb-4 shadow-lg shadow-primary/25">
                <span class="material-symbols-outlined text-white text-3xl" style="font-variation-settings: 'FILL' 1;">admin_panel_settings</span>
            </div>
            <h1 class="text-2xl font-extrabold text-on-surface mb-1">Login Administrator</h1>
            <p class="text-sm text-on-surface-variant">Masuk sebagai BEM, Ormawa, atau Kemahasiswaan</p>
        </div>

        {{-- Error message --}}
        @if($errors->has('login'))
        <div class="mb-6 p-4 bg-error-container rounded-xl flex items-start gap-3">
            <span class="material-symbols-outlined text-tertiary text-lg mt-0.5">error</span>
            <p class="text-sm text-tertiary font-medium">{{ $errors->first('login') }}</p>
        </div>
        @endif

        {{-- Login Form --}}
        <div class="bg-surface-container-lowest rounded-2xl p-8 shadow-sm border border-outline-variant/10">
            <form action="{{ route('login.admin.authenticate') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Username</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl">person</span>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-primary focus:ring-2 focus:ring-primary/20 rounded-xl py-3.5 pl-12 pr-4 text-sm placeholder:text-outline/50 transition-all outline-none"
                            placeholder="Masukkan username" required autofocus />
                    </div>
                </div>

                <div>
                    <label class="block text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline text-xl">lock</span>
                        <input type="password" name="password"
                            class="w-full bg-surface-container-low border border-outline-variant/30 focus:border-primary focus:ring-2 focus:ring-primary/20 rounded-xl py-3.5 pl-12 pr-4 text-sm placeholder:text-outline/50 transition-all outline-none"
                            placeholder="Masukkan password" required />
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-3.5 text-sm font-bold text-white bg-gradient-to-br from-primary to-primary-container rounded-xl shadow-lg shadow-primary/25 hover:shadow-primary/40 hover:-translate-y-0.5 active:translate-y-0 transition-all">
                    Masuk
                </button>
            </form>
        </div>

        {{-- Back link --}}
        <p class="text-center mt-6 text-sm text-on-surface-variant">
            <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">← Kembali ke Login Mahasiswa</a>
        </p>

        {{-- Demo credentials --}}
        <div class="mt-6 p-4 bg-surface-container-low rounded-xl border border-outline-variant/10">
            <p class="text-[10px] font-bold text-outline uppercase tracking-wider mb-2">Demo Credentials</p>
            <div class="space-y-1 text-xs text-on-surface-variant">
                <p><span class="font-semibold">BEM:</span> admin_bem / password</p>
                <p><span class="font-semibold">Ormawa:</span> admin_ormawa / password</p>
                <p><span class="font-semibold">Kemahasiswaan:</span> admin_kmhs / password</p>
            </div>
        </div>
    </div>

</body>
</html>
