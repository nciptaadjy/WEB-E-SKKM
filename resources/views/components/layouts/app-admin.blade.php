<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $title ?? 'E-SKKM' }}</title>
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

        #sidebar-overlay { transition: opacity 0.25s ease; }
        #mobile-sidebar { transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        #mobile-sidebar.open { transform: translateX(0); }

        .modal-wrap { transition: opacity 0.2s ease; }
        .modal-wrap.hidden { opacity: 0; pointer-events: none; }
        .modal-box {
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.2s ease;
        }
        .modal-wrap.hidden .modal-box { transform: scale(0.92) translateY(20px); opacity: 0; }
        .modal-wrap:not(.hidden) .modal-box { transform: scale(1) translateY(0); opacity: 1; }

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


    <div id="modal-add-bidang" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-add-bidang')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form action="{{ route('kemahasiswaan.bidang.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">category</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tambah Bidang Baru</h3>
                            <p class="text-xs text-on-surface-variant">Buat bidang kegiatan baru untuk SKKM.</p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Bidang <span class="text-error">*</span></label>
                        <input type="text" name="nama_bidang" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="Contoh: Penalaran dan Keilmuan">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Tipe</label>
                        <select name="is_wajib" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="0">Pilihan</option>
                            <option value="1">Wajib</option>
                        </select>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-add-bidang')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal: Add Sub Kegiatan --}}
    <div id="modal-add-sub" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-add-sub')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-add-sub" action="{{ route('kemahasiswaan.sub.store') }}" method="POST">
                @csrf
                <input type="hidden" name="bidang_kegiatan_id" id="add-sub-bidang-id">
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">add_circle</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tambah Sub Kegiatan</h3>
                            <p class="text-xs text-on-surface-variant">Untuk bidang: <strong id="add-sub-bidang-nama">-</strong></p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Sub Kegiatan <span class="text-error">*</span></label>
                        <input type="text" name="nama_sub" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="Contoh: Seminar Nasional">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Memiliki Tingkat?</label>
                        <select name="has_tingkat" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="0">Tidak</option>
                            <option value="1">Ya (PT, Regional, Nasional, Internasional)</option>
                        </select>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-add-sub')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal: Edit Sub Kegiatan --}}
    <div id="modal-edit-sub" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-edit-sub')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-edit-sub" method="POST" action="">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">edit</span>
                        </div>
                        <h3 class="text-xl font-extrabold font-headline text-on-surface">Edit Sub Kegiatan</h3>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Sub Kegiatan</label>
                        <input type="text" name="nama_sub" id="edit-sub-nama" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Memiliki Tingkat?</label>
                        <select name="has_tingkat" id="edit-sub-tingkat" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-edit-sub')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-detail"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="modal-box bg-white w-full sm:max-w-lg rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[92vh] flex flex-col">
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-outline-variant/10 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-xl">description</span>
                    </div>
                    <h3 class="text-base font-extrabold text-on-surface font-headline">Detail Pengajuan</h3>
                </div>
                <button onclick="closeModal('modal-detail')"
                    class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">close</span>
                </button>
            </div>
            <div class="overflow-y-auto flex-1 p-5 sm:p-6 space-y-5">
                <div class="flex items-center gap-4 p-4 bg-surface-container-low rounded-xl">
                    <div id="d-avatar" class="w-11 h-11 rounded-full bg-primary flex items-center justify-center text-white font-bold text-base shrink-0">M</div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-on-surface text-sm" id="d-nama">-</p>
                        <p class="text-xs text-on-surface-variant" id="d-nim">-</p>
                    </div>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-3">Informasi Kegiatan</p>
                    <div class="grid grid-cols-2 gap-2.5">
                        <div class="col-span-2 p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Nama Kegiatan</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-kegiatan">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Penyelenggara</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-penyelenggara">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Bidang</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-bidang">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Sub Kegiatan</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-sub">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Kedudukan</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-kedudukan">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tingkat</p>
                            <p class="text-sm font-semibold text-on-surface capitalize" id="d-tingkat">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-tanggal">-</p>
                        </div>
                        <div class="p-3 bg-primary/5 rounded-xl border border-primary/15">
                            <p class="text-[10px] text-primary font-bold mb-0.5">Estimasi Poin</p>
                            <p class="text-lg font-bold text-primary font-headline" id="d-bobot">-</p>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Bukti Sertifikat</p>
                    <a id="d-link" href="#" target="_blank"
                        class="flex items-center gap-3 p-3 bg-surface-container-low rounded-xl hover:bg-primary/5 transition-colors group border border-outline-variant/20">
                        <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary text-lg">link</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-semibold text-primary truncate" id="d-link-text">-</p>
                            <p class="text-[10px] text-on-surface-variant" id="d-platform">-</p>
                        </div>
                        <span class="material-symbols-outlined text-outline text-sm group-hover:text-primary transition-colors">open_in_new</span>
                    </a>
                </div>
            </div>
            <div class="p-4 border-t border-outline-variant/10 bg-surface-container-low flex gap-2 sm:gap-3 shrink-0">
                <button onclick="closeModal('modal-detail')"
                    class="px-3 sm:px-4 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-xs sm:text-sm hover:bg-surface-container transition-colors">
                    Tutup
                </button>
                <button onclick="closeModal('modal-detail'); openTolakFromDetail()"
                    class="flex-1 py-2.5 rounded-xl border-2 border-error/30 text-error font-bold text-xs sm:text-sm hover:bg-error/5 transition-all flex items-center justify-center gap-1 sm:gap-2">
                    <span class="material-symbols-outlined text-base">cancel</span>
                    Tolak
                </button>
                <button onclick="closeModal('modal-detail'); openSetujuiFromDetail()"
                    class="flex-1 py-2.5 rounded-xl bg-secondary text-white font-bold text-xs sm:text-sm shadow-lg shadow-secondary/20 hover:opacity-90 transition-all flex items-center justify-center gap-1 sm:gap-2">
                    <span class="material-symbols-outlined text-base">verified</span>
                    Setujui
                </button>
            </div>
        </div>
    </div>

    <div id="modal-setujui"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-setujui" method="POST" action="">
                @csrf
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col items-center text-center mb-6">
                        <div class="w-16 h-16 rounded-2xl bg-secondary/10 flex items-center justify-center mb-3">
                            <span class="material-symbols-outlined text-secondary text-4xl"
                                style="font-variation-settings:'FILL' 1">verified</span>
                        </div>
                        <h3 class="text-xl font-extrabold text-on-surface font-headline">Setujui Pengajuan?</h3>
                        <p class="text-sm text-on-surface-variant mt-1.5 max-w-xs">
                            Sertifikat <strong class="text-on-surface" id="s-nama-kegiatan">-</strong>
                            akan diteruskan ke tahap verifikasi selanjutnya.
                        </p>
                    </div>

                    {{-- Ubah Poin --}}
                    <div class="mb-5">
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                            Poin SKKM
                        </label>
                        <div class="flex items-center gap-3 p-3 bg-primary/5 rounded-xl border border-primary/15">
                            <div class="flex-1">
                                <p class="text-[10px] text-on-surface-variant mb-0.5">Poin Asal (dari Mahasiswa)</p>
                                <p class="text-lg font-bold text-primary font-headline" id="s-bobot-asal">0</p>
                            </div>
                            <div class="w-px h-10 bg-outline-variant/20"></div>
                            <div class="flex-1">
                                <label for="s-bobot-override" class="text-[10px] text-secondary font-bold mb-0.5 block">Poin Ditetapkan</label>
                                <input type="number" id="s-bobot-override" name="bobot_override" step="0.5" min="0" max="100"
                                    class="w-full text-lg font-bold text-secondary font-headline bg-transparent border-0 border-b-2 border-secondary/30 focus:border-secondary focus:ring-0 p-0 pb-0.5 outline-none"
                                    value="0">
                            </div>
                        </div>
                        <p class="text-[10px] text-on-surface-variant mt-1.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-xs">info</span>
                            Ubah poin jika diperlukan setelah mengecek sertifikat.
                        </p>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                            Catatan <span class="font-normal normal-case text-outline">(opsional)</span>
                        </label>
                        <textarea id="catatan-approve" name="catatan_approve" rows="3"
                            class="w-full p-3.5 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all resize-none outline-none"
                            placeholder="Contoh: Sertifikat sudah terverifikasi dengan baik."></textarea>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-setujui')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors font-headline">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-secondary text-on-secondary font-bold text-sm shadow-lg shadow-secondary/20 hover:opacity-90 active:scale-95 transition-all flex items-center justify-center gap-2 font-headline">
                        <span class="material-symbols-outlined text-base">check</span>
                        Ya, Setujui
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-tolak"       
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-tolak" method="POST" action="">
                @csrf
                <input type="hidden" id="tolak-sertifikat-id" name="_sertifikat_id" value="">
                <div class="p-5 sm:p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-xl bg-error/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-error text-2xl">cancel</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tolak Pengajuan</h3>
                            <p class="text-xs text-on-surface-variant mt-0.5">Berikan alasan agar mahasiswa bisa memperbaiki.</p>
                        </div>
                    </div>
                    <div class="p-3 bg-error/5 border border-error/15 rounded-xl mb-5">
                        <p class="text-[10px] text-on-surface-variant mb-0.5">Menolak sertifikat:</p>
                        <p class="text-sm font-bold text-on-surface" id="t-nama-kegiatan">-</p>
                    </div>
                    <div>
                        <label for="catatan-reject"
                            class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                            Alasan Penolakan <span class="text-error">*</span>
                        </label>
                        <textarea id="catatan-reject" name="catatan_reject" rows="4" minlength="10" required
                            oninput="hitungKarakter(this)"
                            class="w-full p-4 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-error/20 focus:border-error transition-all resize-none outline-none"
                            placeholder="Contoh: Gambar sertifikat tidak terbaca jelas atau blur."></textarea>
                        <div class="flex justify-between items-center mt-1.5">
                            <p id="error-catatan" class="hidden text-xs text-error flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">error</span>
                                <span id="error-catatan-msg">Wajib diisi minimal 10 karakter.</span>
                            </p>
                            <p class="text-[10px] text-on-surface-variant ml-auto">
                                <span id="char-count">0</span> karakter
                                <span class="text-outline">(min. 10)</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3 justify-end">
                    <button type="button" onclick="closeModal('modal-tolak')"
                        class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors font-headline">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-error text-on-error font-bold text-sm shadow-lg shadow-error/20 hover:opacity-90 active:scale-95 transition-all flex items-center gap-2 font-headline">
                        <span class="material-symbols-outlined text-base">cancel</span>
                        Ya, Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-kmhs-setujui"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-kmhs-setujui')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-kmhs-setujui" method="POST" action="">
                @csrf
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col items-center text-center mb-6">
                        <div class="w-16 h-16 rounded-2xl bg-secondary/10 flex items-center justify-center mb-3">
                            <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings:'FILL' 1">verified</span>
                        </div>
                        <h3 class="text-xl font-extrabold text-on-surface font-headline">Setujui Pengajuan?</h3>
                        <p class="text-sm text-on-surface-variant mt-1.5 max-w-xs">
                            Sertifikat <strong class="text-on-surface" id="ks-nama-kegiatan">-</strong>
                            akan disetujui dan poin akan ditambahkan.
                        </p>
                    </div>
                    <div class="mb-5">
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Poin SKKM</label>
                        <div class="flex items-center gap-3 p-3 bg-primary/5 rounded-xl border border-primary/15">
                            <div class="flex-1">
                                <p class="text-[10px] text-on-surface-variant mb-0.5">Poin Saat Ini</p>
                                <p class="text-lg font-bold text-primary font-headline" id="ks-bobot-asal">0</p>
                            </div>
                            <div class="w-px h-10 bg-outline-variant/20"></div>
                            <div class="flex-1">
                                <label for="ks-bobot-override" class="text-[10px] text-secondary font-bold mb-0.5 block">Poin Ditetapkan</label>
                                <input type="number" id="ks-bobot-override" name="bobot_override" step="0.5" min="0" max="100"
                                    class="w-full text-lg font-bold text-secondary font-headline bg-transparent border-0 border-b-2 border-secondary/30 focus:border-secondary focus:ring-0 p-0 pb-0.5 outline-none" value="0">
                            </div>
                        </div>
                        <p class="text-[10px] text-on-surface-variant mt-1.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-xs">info</span>
                            Ubah poin jika diperlukan setelah mengecek sertifikat.
                        </p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Catatan (Opsional)</label>
                        <textarea name="catatan_approve" rows="3" class="w-full p-4 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-secondary/20 focus:border-secondary transition-all resize-none outline-none" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-kmhs-setujui')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-secondary text-on-secondary font-bold text-sm shadow-lg shadow-secondary/20 hover:opacity-90 active:scale-95 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Ya, Setujui
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-kmhs-tolak"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-kmhs-tolak')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-kmhs-tolak" method="POST" action="">
                @csrf
                <div class="p-5 sm:p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-xl bg-error/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-error text-2xl">cancel</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tolak Pengajuan</h3>
                            <p class="text-xs text-on-surface-variant mt-0.5">Berikan alasan agar mahasiswa bisa memperbaiki.</p>
                        </div>
                    </div>
                    <div class="p-3 bg-error/5 border border-error/15 rounded-xl mb-5">
                        <p class="text-[10px] text-on-surface-variant mb-0.5">Menolak sertifikat:</p>
                        <p class="text-sm font-bold text-on-surface" id="kt-nama-kegiatan">-</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                            Alasan Penolakan <span class="text-error">*</span>
                        </label>
                        <textarea id="kt-catatan" name="catatan_reject" rows="4" minlength="10" required
                            class="w-full p-4 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-error/20 focus:border-error transition-all resize-none outline-none"
                            placeholder="Contoh: Gambar sertifikat tidak terbaca jelas atau blur."></textarea>
                        <p class="text-[10px] text-on-surface-variant mt-1">Wajib diisi minimal 10 karakter.</p>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3 justify-end">
                    <button type="button" onclick="closeModal('modal-kmhs-tolak')"
                        class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-error text-on-error font-bold text-sm shadow-lg shadow-error/20 hover:opacity-90 active:scale-95 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">cancel</span> Ya, Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-kmhs-revisi"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-kmhs-revisi')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-kmhs-revisi" method="POST" action="">
                @csrf
                <div class="p-5 sm:p-6">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-amber-700 text-2xl">edit_note</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Minta Revisi</h3>
                            <p class="text-xs text-on-surface-variant mt-0.5">Berikan catatan agar mahasiswa/ormawa bisa memperbaiki.</p>
                        </div>
                    </div>
                    <div class="p-3 bg-amber-50 border border-amber-200 rounded-xl mb-5">
                        <p class="text-[10px] text-on-surface-variant mb-0.5">Sertifikat yang diminta revisi:</p>
                        <p class="text-sm font-bold text-on-surface" id="kr-nama-kegiatan">-</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                            Catatan Revisi <span class="text-amber-600">*</span>
                        </label>
                        <textarea id="kr-catatan" name="catatan_revisi_khms" rows="4" minlength="10" required
                            class="w-full p-4 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-amber-300 focus:border-amber-400 transition-all resize-none outline-none"
                            placeholder="Contoh: Data kegiatan tidak sesuai, harap perbaiki tanggal dan nama penyelenggara."></textarea>
                        <p class="text-[10px] text-on-surface-variant mt-1">Wajib diisi minimal 10 karakter.</p>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3 justify-end">
                    <button type="button" onclick="closeModal('modal-kmhs-revisi')"
                        class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-amber-500 text-white font-bold text-sm shadow-lg shadow-amber-500/20 hover:bg-amber-600 active:scale-95 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">edit_note</span> Kirim Revisi
                    </button>
                </div>
            </form>
        </div>
    </div>


    
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
                    <div class="w-10 h-10 bg-primary-container rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-primary-container" style="font-variation-settings: 'FILL' 1;">{{ $sidebarIcon ?? 'account_balance' }}</span>
                    </div>
                    <div>
                        <p class="font-bold text-primary text-sm leading-tight font-headline">{{ $portalName ?? 'E-SKKM' }}</p>
                        <p class="text-xs text-slate-500">{{ $portalSub ?? 'Admin Portal' }}</p>
                    </div>
                </div>
                <button onclick="toggleMobileSidebar()" class="p-1.5 rounded-lg hover:bg-white/50">
                    <span class="material-symbols-outlined text-slate-500">close</span>
                </button>
            </div>
            @include('components.sidebar-admin', [
                'role' => $role ?? 'bem',
                'activePage' => $activePage ?? 'dashboard',
                'navItems' => $navItems ?? [],
            ])
        </div>
    </aside>

    {{-- Top Navbar --}}
    @include('components.navbar-top', [
        'role' => $role ?? 'admin',
        'userName' => Auth::user()->nama_pengguna ?? '',
        'userSub' => ucfirst($role ?? 'Admin'),
    ])

    <div class="flex pt-16 min-h-screen pb-20 md:pb-0">
        {{-- Desktop Sidebar --}}
        <aside class="hidden md:flex h-[calc(100vh-64px)] w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-6 gap-2 z-30">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-primary-container rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-primary-container" style="font-variation-settings: 'FILL' 1;">{{ $sidebarIcon ?? 'account_balance' }}</span>
                    </div>
                    <div>
                        <p class="font-bold text-primary text-sm leading-tight font-headline">{{ $portalName ?? 'E-SKKM' }}</p>
                        <p class="text-xs text-slate-500">{{ $portalSub ?? 'Admin Portal' }}</p>
                    </div>
                </div>
            </div>
            @include('components.sidebar-admin', [
                'role' => $role ?? 'bem',
                'activePage' => $activePage ?? 'dashboard',
                'navItems' => $navItems ?? [],
            ])
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
    @include('components.mobile-nav-admin', [
        'role' => $role ?? 'bem',
        'activePage' => $activePage ?? 'dashboard',
        'navItems' => $navItems ?? [],
    ])

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
