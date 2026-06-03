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
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="3"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="3">Konfrensi</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Penulis Utama</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Penyaji</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Moderator</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="4"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="4">Memiliki Karya Tulis Ilmiah</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Perorangan</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant font-semibold bg-gray-50/50" colspan="5">Kelompok</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="2"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="2">Proposal PKM</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Submit Proposal PKM</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Lolos Proposal PKM</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="2"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="2">Publish Penelitian/<br>Pengabdian Masyarakat</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Seminar / Workshop / Talk show</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Kuliah Industri</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="2"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="2">Kepanitiaan</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">8</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>

                    {{-- Section 2: Minat Bakat --}}
                    <tr class="bg-primary/5"><td class="px-3 sm:px-6 py-2 text-[10px] sm:text-xs font-bold text-primary tracking-widest uppercase" colspan="7">2. MINAT BAKAT, SENI DAN OLAHRAGA</td></tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="5"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="5">Lomba</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Juara 1</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">7</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Juara 2</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Juara 3</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Harapan / Favorit</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Festival, Pentas Seni/Musik dan Olahraga</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="3"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="3"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Juri</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Pengisi Acara</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Partisipasi</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">1</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">1</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">1</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="2"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="2">Kepanitiaan</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">8</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>

                    {{-- Section 3: Organisasi --}}
                    <tr class="bg-primary/5"><td class="px-3 sm:px-6 py-2 text-[10px] sm:text-xs font-bold text-primary tracking-widest uppercase" colspan="7">3. ORGANISASI DAN SOSIAL</td></tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="6"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="6">BEM/DPM</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Presma /Ketua DPM</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">10</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Wakil</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">8</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Sekretaris</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Bendahara</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Mentri/Ketua Komisi</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota/Staf</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="6"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="6">HIMAPRODI /HIMAS/<br>UKM</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Wakil</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Sekretaris</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Bendahara</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Koordinator</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">BAKSOS</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peserta</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td>
                    </tr>

                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="2"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="2">Kepanitiaan</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Ketua</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">8</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Anggota</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">6</td>
                    </tr>

                    {{-- Section 4: Kegiatan Wajib --}}
                    <tr class="bg-primary/5"><td class="px-3 sm:px-6 py-2 text-[10px] sm:text-xs font-bold text-primary tracking-widest uppercase" colspan="7">4. KEGIATAN WAJIB</td></tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Peserta</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">G.M.T.I</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold">Lulus</td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">G.M.T.I</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-center font-medium text-on-surface-variant" rowspan="4"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 font-semibold" rowspan="4"></td>
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Rangkaian Dies Natalis</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold"></td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Pentas Musik</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Peningkatan Soft Skill</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
                    </tr>
                    <tr class="hover:bg-surface-container-low transition-colors border-b">
                        <td class="px-3 sm:px-6 py-3 sm:py-4 text-on-surface-variant">Career Week</td>
                        <td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">2</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">3</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">4</td><td class="px-2 sm:px-4 py-3 sm:py-4 text-center font-bold">5</td>
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
