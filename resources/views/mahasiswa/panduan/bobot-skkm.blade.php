<x-layouts.app-mahasiswa :title="'Bobot SKKM'" :activePage="'panduan'">

    {{-- Hero --}}
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary to-primary-container p-6 sm:p-8 md:p-12 text-on-primary shadow-lg">
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold mb-2 sm:mb-4 leading-tight font-headline">Panduan Lengkap E-SKKM</h2>
            <p class="text-sm sm:text-base md:text-lg opacity-90 leading-relaxed">Pusat informasi terpadu untuk membantu Anda mengelola, mengajukan, dan memantau poin Satuan Kredit Kegiatan Mahasiswa secara digital.</p>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <section class="border-b border-outline-variant/30 -mt-2">
        <div class="flex gap-4 sm:gap-8 px-1 overflow-x-auto whitespace-nowrap no-scrollbar">
            <a href="{{ route('panduan') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Proses E-SKKM</a>
            <a href="{{ route('panduan.tentang-skkm') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Tentang E-SKKM</a>
            <a href="{{ route('panduan.bobot-skkm') }}" class="pb-3 text-sm font-bold text-primary border-b-2 border-primary font-headline">Bobot SKKM</a>
        </div>
    </section>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="bg-primary text-white font-headline">
                        <th class="px-3 sm:px-6 py-3 sm:py-4 font-bold border-r border-white/10 text-center w-12 sm:w-16" rowspan="2">NO</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 font-bold border-r border-white/10" rowspan="2">Bidang / Kegiatan</th>
                        <th class="px-3 sm:px-6 py-3 sm:py-4 font-bold border-r border-white/10" rowspan="2">Kedudukan</th>
                        <th class="px-3 sm:px-6 py-2 font-bold text-center border-b border-white/10" colspan="4">Tingkat</th>
                    </tr>
                    <tr class="bg-[#1565C0] text-white font-headline">
                        <th class="px-2 sm:px-4 py-2 text-[10px] sm:text-xs font-bold text-center border-r border-white/10">PT</th>
                        <th class="px-2 sm:px-4 py-2 text-[10px] sm:text-xs font-bold text-center border-r border-white/10">REG</th>
                        <th class="px-2 sm:px-4 py-2 text-[10px] sm:text-xs font-bold text-center border-r border-white/10">NAS</th>
                        <th class="px-2 sm:px-4 py-2 text-[10px] sm:text-xs font-bold text-center">INT</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-on-surface">
                    {{-- Section 1: Akademik --}}
                    <tr class="bg-primary/5"><td class="px-3 sm:px-6 py-2 text-[10px] sm:text-xs font-bold text-primary tracking-widest uppercase" colspan="7">1. AKADEMIK &amp; ILMIAH</td></tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="2">1.1</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="2">Konferensi / Seminar / Simposium</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Penulis Utama / Pemakalah</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Penulis Pendamping / Peserta</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="3">1.2</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="3">Karya Tulis / PKM / Artikel Ilmiah</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua Kelompok</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">7</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota Kelompok</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Perorangan</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">7</td>
                    </tr>

                    {{-- Section 2: Minat Bakat --}}
                    <tr class="bg-primary/5"><td class="px-3 sm:px-6 py-2 text-[10px] sm:text-xs font-bold text-primary tracking-widest uppercase" colspan="7">2. MINAT BAKAT, SENI DAN OLAHRAGA</td></tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="4">2.1</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="4">Kompetisi / Kejuaraan / Lomba</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Juara I / Medali Emas</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">7</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Juara II / Medali Perak</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Juara III / Medali Perunggu</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta Terpilih / Finalis</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">1</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td>
                    </tr>

                    {{-- Section 3: Organisasi --}}
                    <tr class="bg-primary/5"><td class="px-3 sm:px-6 py-2 text-[10px] sm:text-xs font-bold text-primary tracking-widest uppercase" colspan="7">3. ORGANISASI DAN KEPEMIMPINAN</td></tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="3">3.1</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="3">Pengurus Organisasi (BEM/DPM/UKM)</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua Umum / Presiden</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">-</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">7</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Sekretaris / Bendahara / Ketua Bidang</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">-</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota Pengurus</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">-</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="2">3.2</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="2">Kepanitiaan Kegiatan</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua Panitia / Koordinator</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota Panitia</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>

                    {{-- Section 4: Kegiatan Wajib --}}
                    <tr class="bg-primary/5"><td class="px-3 sm:px-6 py-2 text-[10px] sm:text-xs font-bold text-primary tracking-widest uppercase" colspan="7">4. KEGIATAN WAJIB &amp; SOSIAL</td></tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant">4.1</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Pengabdian Masyarakat / Bakti Sosial</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Relawan / Pelaksana</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant">4.2</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Pelatihan / Workshop Kompetensi</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta Sertifikasi</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant">4.3</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Orientasi Mahasiswa (PKKMB)</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta Lulus</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">10</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">-</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">-</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">-</td>
                    </tr>
                </tbody>
            </table>
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
