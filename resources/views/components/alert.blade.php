{{-- Toast-style Session Flash Alerts with auto-dismiss --}}
@if(session('success'))
<div id="toast-success" class="fixed top-20 right-4 z-[200] max-w-sm w-full animate-in">
    <div class="p-4 bg-white border border-green-200 rounded-2xl shadow-2xl shadow-green-500/10 flex items-start gap-3">
        <div class="w-9 h-9 rounded-xl bg-green-100 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-green-600" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs font-bold text-green-800 uppercase tracking-widest mb-0.5">Berhasil</p>
            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
        </div>
        <button onclick="this.closest('#toast-success').remove()" class="p-1 rounded-lg hover:bg-green-50 shrink-0">
            <span class="material-symbols-outlined text-green-400 text-lg">close</span>
        </button>
    </div>
</div>
@endif

@if(session('error'))
<div id="toast-error" class="fixed top-20 right-4 z-[200] max-w-sm w-full animate-in">
    <div class="p-4 bg-white border border-red-200 rounded-2xl shadow-2xl shadow-red-500/10 flex items-start gap-3">
        <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center shrink-0">
            <span class="material-symbols-outlined text-red-600" style="font-variation-settings: 'FILL' 1;">error</span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs font-bold text-red-800 uppercase tracking-widest mb-0.5">Gagal</p>
            <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
        </div>
        <button onclick="this.closest('#toast-error').remove()" class="p-1 rounded-lg hover:bg-red-50 shrink-0">
            <span class="material-symbols-outlined text-red-400 text-lg">close</span>
        </button>
    </div>
</div>
@endif

@if($errors->any())
<div id="toast-validation" class="fixed top-20 right-4 z-[200] max-w-sm w-full animate-in">
    <div class="p-4 bg-white border border-red-200 rounded-2xl shadow-2xl shadow-red-500/10">
        <div class="flex items-center gap-2 mb-2">
            <span class="material-symbols-outlined text-red-600" style="font-variation-settings: 'FILL' 1;">warning</span>
            <p class="text-xs font-bold text-red-800 uppercase tracking-widest">Validasi Error</p>
            <button onclick="this.closest('#toast-validation').remove()" class="ml-auto p-1 rounded-lg hover:bg-red-50">
                <span class="material-symbols-outlined text-red-400 text-lg">close</span>
            </button>
        </div>
        <ul class="list-disc list-inside text-sm text-red-700 space-y-0.5 ml-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

@if(session('success') || session('error') || $errors->any())
<script>
    setTimeout(() => {
        document.querySelectorAll('[id^="toast-"]').forEach(el => {
            el.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            el.style.opacity = '0';
            el.style.transform = 'translateX(100%)';
            setTimeout(() => el.remove(), 400);
        });
    }, 5000);
</script>
@endif
