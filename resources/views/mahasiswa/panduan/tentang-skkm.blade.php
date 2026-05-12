<x-layouts.app-mahasiswa :title="'Tentang E-SKKM'" :activePage="'panduan'">

    {{-- Hero --}}
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary to-primary-container p-6 sm:p-8 md:p-12 text-on-primary shadow-lg">
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold mb-2 sm:mb-4 leading-tight font-headline">Panduan Lengkap E-SKKM</h2>
            <p class="text-sm sm:text-base md:text-lg opacity-90 leading-relaxed">Panduan resmi penggunaan Satuan Kredit Kegiatan Mahasiswa (SKKM) untuk mahasiswa ITB STIKOM Bali.</p>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <section class="border-b border-outline-variant/30 -mt-2">
        <div class="flex gap-4 sm:gap-8 px-1 overflow-x-auto whitespace-nowrap no-scrollbar">
            <a href="{{ route('panduan') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Proses E-SKKM</a>
            <a href="{{ route('panduan.tentang-skkm') }}" class="pb-3 text-sm font-bold text-primary border-b-2 border-primary font-headline">Tentang E-SKKM</a>
            <a href="{{ route('panduan.bobot-skkm') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Bobot SKKM</a>
        </div>
    </section>

    {{-- Document Content --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-5 sm:p-8 md:p-12 space-y-8 sm:space-y-12 text-on-surface">
        {{-- I. PENGERTIAN --}}
        <section>
            <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 flex items-center gap-3 font-headline">
                <span class="text-primary">I.</span> PENGERTIAN
            </h3>
            <ol class="pl-4 sm:pl-6 space-y-2 sm:space-y-3 text-xs sm:text-sm md:text-base leading-relaxed text-on-surface-variant list-[lower-alpha]">
                <li class="pl-2">Satuan Kredit Kegiatan Mahasiswa (SKKM) adalah suatu pengakuan dan penilaian terhadap kegiatan yang diikuti oleh mahasiswa ITB STIKOM Bali dalam pengembangan kegiatan kemahasiswaan.</li>
                <li class="pl-2">Pengakuan dan penilaian kegiatan yang diikuti dinyatakan dalam bentuk Satuan Kredit Kegiatan Mahasiswa (SKKM).</li>
                <li class="pl-2">Besarnya pembobotan SKKM yang diberikan disesuaikan dengan jenis dan pelaksanaan kegiatan yang diikuti.</li>
            </ol>
        </section>

        {{-- II. TUJUAN --}}
        <section>
            <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 flex items-center gap-3 font-headline">
                <span class="text-primary">II.</span> TUJUAN
            </h3>
            <ol class="pl-4 sm:pl-6 space-y-2 sm:space-y-3 text-xs sm:text-sm md:text-base leading-relaxed text-on-surface-variant list-[lower-alpha]">
                <li class="pl-2">Untuk meningkatkan peranan dan partisipasi aktif mahasiswa dalam setiap kegiatan kemahasiswaan dalam rangka peningkatan wawasan akademis dan non akademis para mahasiswa.</li>
                <li class="pl-2">Untuk meningkatkan rasa kebersamaan dan persaudaraan antara mahasiswa.</li>
                <li class="pl-2">Memberikan penghargaan atas partisipasi aktif mahasiswa dalam setiap kegiatan kemahasiswaan.</li>
            </ol>
        </section>

        {{-- III. PENERAPAN --}}
        <section>
            <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 flex items-center gap-3 font-headline">
                <span class="text-primary">III.</span> PENERAPAN
            </h3>
            <div class="space-y-6 sm:space-y-8">
                <p class="text-xs sm:text-sm md:text-base leading-relaxed text-on-surface-variant">
                    SKKM merupakan suatu persyaratan wajib bagi seluruh mahasiswa ITB STIKOM Bali yang akan mengikuti Ujian Akhir, dimana untuk memperoleh pengesahan bebas administrasi dari bagian kemahasiswaan, mahasiswa wajib menunjukkan Buku SKKM dengan poin yang sudah dipenuhi.
                </p>

                {{-- 1. KEGIATAN WAJIB --}}
                <div class="ml-2 sm:ml-4">
                    <h4 class="font-bold text-base sm:text-lg mb-3 sm:mb-4 text-on-surface font-headline">1. KEGIATAN WAJIB</h4>
                    <ol class="pl-4 sm:pl-6 space-y-2 sm:space-y-3 text-xs sm:text-sm md:text-base leading-relaxed text-on-surface-variant list-[lower-alpha]">
                        <li class="pl-2">Mengikuti Kuliah Industri dengan minimal <strong class="text-primary">4 POIN SKKM</strong> untuk program S1 dan <strong class="text-primary">2 POIN SKKM</strong> untuk program D3.</li>
                        <li class="pl-2">Mengikuti kegiatan peningkatan soft skill mahasiswa (minimal 1 kali).</li>
                        <li class="pl-2">Menjadi anggota aktif ORMAWA di ITB STIKOM Bali yang dibuktikan dengan sertifikat keanggotaan.</li>
                        <li class="pl-2">Kegiatan Gema Mahasiswa Teknologi Informasi (G.M.T.I) yang dibuktikan dengan Sertifikat peserta G.M.T.I dan lulus G.M.T.I.</li>
                        <li class="pl-2">Rangkaian acara Dies Natalis dan pentas musik ITB STIKOM Bali dengan minimal jumlah SKKM sebesar 12 SKKM.</li>
                        <li class="pl-2">Menjadi Peserta Career Week (minimal 2 kali selama study).</li>
                    </ol>
                </div>

                {{-- 2. KEGIATAN PILIHAN --}}
                <div class="ml-2 sm:ml-4">
                    <h4 class="font-bold text-base sm:text-lg mb-3 sm:mb-4 text-on-surface font-headline">2. KEGIATAN PILIHAN</h4>
                    <p class="text-xs sm:text-sm text-on-surface-variant mb-3 sm:mb-4 italic">Mahasiswa dapat memilih dan mengikuti kegiatan lain dengan sukarela dan sesuai dengan minat dan bakat masing-masing:</p>
                    <ol class="pl-4 sm:pl-6 space-y-3 sm:space-y-4 text-xs sm:text-sm md:text-base leading-relaxed text-on-surface-variant list-[lower-alpha]">
                        <li class="pl-2">Setiap mahasiswa wajib memenuhi jumlah poin minimal: <strong class="text-primary">40 POIN SKKM</strong> untuk S1, <strong class="text-primary">32 POIN SKKM</strong> untuk D3.</li>
                        <li class="pl-2">SKKM minimal harus sudah terpenuhi sebelum sidang TA.</li>
                        <li class="pl-2">Setiap SKKM yang diperoleh wajib dilaporkan kepada BEM paling lambat 1 bulan sebelum pendaftaran sidang TA.</li>
                        <li class="pl-2">Bobot SKKM yang telah diberikan dianggap sah apabila telah diparaf oleh Ketua BEM dan Bagian Kemahasiswaan.</li>
                        <li class="pl-2">Kegiatan yang mendapatkan nilai SKKM adalah kegiatan yang diselenggarakan baik dari pihak intern maupun ekstern kampus.</li>
                        <li class="pl-2">Bobot SKKM yang harus dipenuhi:
                            <ul class="list-disc pl-6 sm:pl-8 mt-2 space-y-1 text-xs sm:text-sm">
                                <li>Bidang Ilmiah minimal <strong>16 POIN SKKM (S1)</strong> dan <strong>12 POIN (D3)</strong>.</li>
                                <li>Bidang Minat Bakat, Seni dan olahraga minimal <strong>12 POIN SKKM</strong> dan <strong>10 POIN (D3)</strong>.</li>
                                <li>Bidang Organisasi dan Sosial minimal <strong>12 POIN SKKM</strong> dan <strong>10 POIN (D3)</strong>.</li>
                            </ul>
                        </li>
                    </ol>
                </div>

                {{-- 3. LAIN-LAIN --}}
                <div class="ml-2 sm:ml-4">
                    <h4 class="font-bold text-base sm:text-lg mb-3 sm:mb-4 text-on-surface font-headline">3. LAIN-LAIN</h4>
                    <ol class="pl-4 sm:pl-6 space-y-2 sm:space-y-3 text-xs sm:text-sm md:text-base leading-relaxed text-on-surface-variant list-[lower-alpha]">
                        <li class="pl-2">Mahasiswa yang tidak memiliki sertifikat G.M.T.I wajib memenuhi bobot SKKM minimal 3 sertifikat/piagam kepanitiaan sebesar <strong class="text-primary">9 POIN SKKM</strong>.</li>
                        <li class="pl-2">Bagi mahasiswa yang tidak memenuhi poin SKKM wajib, dapat diganti dengan sertifikat juara lomba atau sertifikat Kepengurusan ORMAWA.</li>
                        <li class="pl-2">Bagi mahasiswa kelas karyawan wajib memenuhi <strong class="text-primary">8 poin SKKM</strong> (dimulai dari angkatan 2020).</li>
                    </ol>
                </div>
            </div>
        </section>
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

    {{-- Footer --}}
    <footer class="pt-6 sm:pt-8 border-t border-outline-variant/10 text-center">
        <p class="text-xs text-outline font-medium tracking-wide">© 2024 ITB STIKOM BALI • SISTEM INFORMASI KREDIT KEGIATAN MAHASISWA</p>
    </footer>

@push('styles')
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush

</x-layouts.app-mahasiswa>
