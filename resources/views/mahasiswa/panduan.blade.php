<x-layouts.app-mahasiswa :title="'Panduan'" :activePage="'panduan'">

    {{-- Hero --}}
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary to-primary-container p-6 sm:p-8 md:p-12 text-on-primary shadow-lg">
        <div class="absolute right-0 top-0 w-1/3 h-full opacity-10 hidden md:block">
            <div class="w-full h-full bg-white/20 rounded-full blur-[80px]"></div>
        </div>
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold mb-2 sm:mb-4 leading-tight font-headline">Panduan Lengkap E-SKKM</h2>
            <p class="text-sm sm:text-base md:text-lg opacity-90 leading-relaxed">Pusat informasi terpadu untuk membantu Anda mengelola, mengajukan, dan memantau poin Satuan Kredit Kegiatan Mahasiswa secara digital.</p>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <section class="border-b border-outline-variant/30 -mt-2">
        <div class="flex gap-4 sm:gap-8 px-1 overflow-x-auto whitespace-nowrap no-scrollbar">
            <a href="{{ route('panduan') }}" class="pb-3 text-sm font-bold text-primary border-b-2 border-primary font-headline">Proses E-SKKM</a>
            <a href="{{ route('panduan.tentang-skkm') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Tentang E-SKKM</a>
            <a href="{{ route('panduan.bobot-skkm') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Bobot SKKM</a>
        </div>
    </section>

    {{-- Steps Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl shadow-sm border border-outline-variant/20 flex flex-col gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-lg sm:text-xl">1</div>
            <h3 class="text-lg sm:text-xl font-bold text-on-surface font-headline">Upload</h3>
            <div class="space-y-3">
                <p class="text-xs sm:text-sm text-on-surface-variant leading-relaxed">Pengajuan sertifikat kegiatan Anda.</p>
                <ul class="text-xs text-on-surface-variant space-y-2 list-decimal list-inside">
                    <li>Pilih file PDF/JPG (Maks. 2MB).</li>
                    <li>Isi nama kegiatan, tanggal, dan tingkat.</li>
                    <li>Klik 'Kirim' untuk antre verifikasi.</li>
                </ul>
            </div>
            <div class="mt-auto pt-3 sm:pt-4 border-t border-outline-variant/10">
                <a href="{{ route('sertifikat.create') }}" class="text-primary font-semibold text-sm flex items-center gap-1 hover:underline">
                    Upload Baru <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>

        <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl shadow-sm border border-outline-variant/20 flex flex-col gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-lg sm:text-xl">2</div>
            <h3 class="text-lg sm:text-xl font-bold text-on-surface font-headline">Verif BEM</h3>
            <div class="space-y-3">
                <p class="text-xs sm:text-sm text-on-surface-variant leading-relaxed">Peninjauan tahap pertama oleh BEM.</p>
                <p class="text-xs text-on-surface-variant leading-relaxed">
                    BEM bertugas memastikan keaslian dokumen dan kesesuaian kategori kegiatan.
                </p>
                <div class="flex items-start gap-2 mt-2"><span class="mt-1 px-1.5 py-0.5 bg-blue-100 text-blue-800 rounded text-[9px] font-bold shrink-0">VERIF BEM</span><p class="text-[11px] text-on-surface-variant">Lolos verifikasi awal.</p></div>
            </div>
        </div>

        <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl shadow-sm border border-outline-variant/20 flex flex-col gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-lg sm:text-xl">3</div>
            <h3 class="text-lg sm:text-xl font-bold text-on-surface font-headline">Verif KMHS</h3>
            <div class="space-y-3">
                <p class="text-xs sm:text-sm text-on-surface-variant leading-relaxed">Peninjauan akhir oleh Kemahasiswaan.</p>
                <p class="text-xs text-on-surface-variant leading-relaxed">
                    KMHS memberikan poin resmi, menolak, atau meminta revisi jika ada kesalahan pengisian form.
                </p>
                <div class="flex items-start gap-2 mt-2"><span class="mt-1 px-1.5 py-0.5 bg-amber-100 text-amber-800 rounded text-[9px] font-bold shrink-0">REVISI</span><p class="text-[11px] text-on-surface-variant">Kemahasiswaan meminta perbaikan data.</p></div>
            </div>
        </div>

        <div class="bg-white p-5 sm:p-6 md:p-8 rounded-xl shadow-sm border border-outline-variant/20 flex flex-col gap-3 sm:gap-4">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-lg sm:text-xl">4</div>
            <h3 class="text-lg sm:text-xl font-bold text-on-surface font-headline">Selesai</h3>
            <div class="space-y-3">
                <p class="text-xs sm:text-sm text-on-surface-variant leading-relaxed">Sertifikat diproses.</p>
                <div class="space-y-2">
                    <div class="flex items-start gap-2"><span class="mt-1 px-1.5 py-0.5 bg-green-100 text-green-800 rounded text-[9px] font-bold shrink-0">APPROVED</span><p class="text-[11px] text-on-surface-variant">Disetujui. Poin ditambahkan.</p></div>
                    <div class="flex items-start gap-2"><span class="mt-1 px-1.5 py-0.5 bg-red-100 text-red-800 rounded text-[9px] font-bold shrink-0">REJECTED</span><p class="text-[11px] text-on-surface-variant">Ditolak permanen (dengan catatan).</p></div>
                </div>
            </div>
            <div class="mt-auto pt-3 sm:pt-4 border-t border-outline-variant/10">
                <a href="{{ route('sertifikat.index') }}" class="text-primary font-semibold text-sm flex items-center gap-1 hover:underline">
                    Lihat Riwayat <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Rules & FAQ --}}
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 md:gap-8">
        <div class="lg:col-span-3 space-y-6">
            <div class="bg-surface-container-low p-5 sm:p-6 md:p-8 rounded-xl border border-outline-variant/10">
                <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-on-surface flex items-center gap-2 font-headline">
                    <span class="material-symbols-outlined text-primary">gavel</span> Aturan Umum &amp; Ketentuan
                </h3>
                <ul class="space-y-3 sm:space-y-4">
                    <li class="flex gap-3 sm:gap-4 p-3 sm:p-4 bg-white rounded-lg border border-outline-variant/10 shadow-sm">
                        <span class="material-symbols-outlined text-primary shrink-0">check_circle</span>
                        <div><p class="font-bold text-on-surface text-sm">Keaslian Berkas</p><p class="text-xs sm:text-sm text-on-surface-variant">Sertifikat harus asli dan dapat diverifikasi. Pemalsuan dokumen akan dikenakan sanksi akademik berat.</p></div>
                    </li>
                    <li class="flex gap-3 sm:gap-4 p-3 sm:p-4 bg-white rounded-lg border border-outline-variant/10 shadow-sm">
                        <span class="material-symbols-outlined text-primary shrink-0">history</span>
                        <div><p class="font-bold text-on-surface text-sm">Batas Waktu Pengajuan</p><p class="text-xs sm:text-sm text-on-surface-variant">Sertifikat harus diajukan maksimal 1 semester setelah kegiatan berakhir.</p></div>
                    </li>
                    <li class="flex gap-3 sm:gap-4 p-3 sm:p-4 bg-white rounded-lg border border-outline-variant/10 shadow-sm">
                        <span class="material-symbols-outlined text-primary shrink-0">category</span>
                        <div><p class="font-bold text-on-surface text-sm">Kategori &amp; Rubrik</p><p class="text-xs sm:text-sm text-on-surface-variant">Nilai poin ditentukan berdasarkan tingkat kegiatan (Lokal, Nasional, Internasional) dan peran.</p></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="bg-white border border-outline-variant/20 p-5 sm:p-6 md:p-8 rounded-xl h-full shadow-sm">
                <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6 text-on-surface font-headline">Tanya Jawab (FAQ)</h3>
                <div class="space-y-4 sm:space-y-6">
                    <div class="border-b border-outline-variant/10 pb-3 sm:pb-4">
                        <p class="font-bold text-primary text-xs sm:text-sm mb-1 sm:mb-2">Bagaimana jika sertifikat saya ditolak?</p>
                        <p class="text-xs text-on-surface-variant leading-relaxed">Periksa alasan penolakan di 'List Sertifikat'. Anda dapat melakukan <strong>Revisi</strong> dengan mengunggah berkas baru.</p>
                    </div>
                    <div class="border-b border-outline-variant/10 pb-3 sm:pb-4">
                        <p class="font-bold text-primary text-xs sm:text-sm mb-1 sm:mb-2">Dapatkah saya menghapus pengajuan?</p>
                        <p class="text-xs text-on-surface-variant leading-relaxed">Pengajuan hanya bisa dihapus jika masih berstatus <strong>Pending</strong>.</p>
                    </div>
                    <div class="border-b border-outline-variant/10 pb-3 sm:pb-4">
                        <p class="font-bold text-primary text-xs sm:text-sm mb-1 sm:mb-2">Berapa ukuran maksimal file?</p>
                        <p class="text-xs text-on-surface-variant leading-relaxed">Batas maksimal per file adalah <strong>2MB</strong>. Disarankan menggunakan kompresi PDF.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA --}}
    <section class="bg-surface-container-highest p-6 sm:p-8 md:p-10 rounded-2xl flex flex-col md:flex-row items-center gap-4 sm:gap-8 border border-white/50 shadow-sm">
        <div class="grow text-center md:text-left">
            <h4 class="text-xl sm:text-2xl font-bold text-on-surface mb-2 font-headline">Sudah siap mengunggah prestasi Anda?</h4>
            <p class="text-sm text-on-surface-variant">Pastikan semua dokumen sudah sesuai dengan ketentuan di atas.</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 shrink-0 w-full md:w-auto">
            <a href="{{ route('sertifikat.index') }}" class="px-5 sm:px-6 py-2.5 sm:py-3 bg-white text-primary border border-primary/30 rounded-lg font-bold hover:bg-primary/5 transition-colors text-center text-sm">Lihat Status</a>
            <a href="{{ route('sertifikat.create') }}" class="px-5 sm:px-6 py-2.5 sm:py-3 bg-primary text-on-primary rounded-lg font-bold shadow-md hover:shadow-lg transition-all text-center text-sm">Mulai Registrasi</a>
        </div>
    </section>

@push('styles')
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush

</x-layouts.app-mahasiswa>