<x-layouts.app-admin
    :title="'Verifikasi BEM'"
    :role="'bem'"
    :activePage="'verifikasi'"
    :portalName="'E-SKKM'"
    :portalSub="'BEM Dashboard'"
    :sidebarIcon="'account_balance'"
>

                {{-- Quick Stats --}}
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-6 mb-6 sm:mb-10">
                    <div class="p-4 sm:p-6 rounded-xl bg-surface-container-lowest border border-outline-variant/10">
                        <p class="text-[10px] sm:text-xs font-semibold text-outline uppercase tracking-widest mb-1">Total Antrean</p>
                        <h3 class="text-2xl sm:text-4xl font-bold text-primary font-headline">
                            {{ $totalAntrean }}
                            <span class="text-xs sm:text-sm font-medium text-on-surface-variant">Sertifikat</span>
                        </h3>
                    </div>
                    <div class="p-4 sm:p-6 rounded-xl bg-secondary-container/20 border border-secondary/10">
                        <p class="text-[10px] sm:text-xs font-semibold text-outline uppercase tracking-widest mb-1">Menunggu</p>
                        <h3 class="text-2xl sm:text-2xl font-bold text-secondary font-headline">
                            {{ $totalAntrean }}
                            <span class="text-xs sm:text-sm font-medium text-on-surface-variant">Pending</span>
                        </h3>
                    </div>
                    <div class="col-span-2 md:col-span-1 p-4 sm:p-6 rounded-xl bg-primary text-on-primary shadow-xl shadow-primary/20">
                        <p class="text-[10px] sm:text-xs font-semibold opacity-80 uppercase tracking-widest mb-1">Status</p>
                        <div class="flex items-center gap-2 mt-1 sm:mt-2">
                            <span class="w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
                            <h3 class="text-lg sm:text-xl font-bold font-headline">Aktif</h3>
                        </div>
                    </div>
                </div>

                {{-- Verification Table --}}
                <section class="bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-sm">
                    <div class="p-4 sm:p-6 border-b border-outline-variant/5 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <h3 class="text-base sm:text-lg font-bold font-headline">Antrean Terbaru</h3>
                        <span class="text-xs text-outline">Sertifikat menunggu verifikasi BEM</span>
                    </div>

                    {{-- Mobile: Card list --}}
                    <div class="divide-y divide-outline-variant/5 md:hidden">
                        @forelse($sertifikats as $sertifikat)
                        <div class="p-4 hover:bg-surface-container-low transition-colors">
                            {{-- Header card --}}
                            <div class="flex items-start justify-between gap-3 mb-3">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                                    <p class="text-xs text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }}</p>
                                </div>
                                <span class="text-base font-bold text-primary font-headline shrink-0">
                                    {{ $sertifikat->bobot_snapshot }} Poin
                                </span>
                            </div>

                            {{-- Info kegiatan --}}
                            <p class="text-sm font-semibold text-on-surface mb-1">{{ $sertifikat->nama_kegiatan }}</p>
                            <p class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mb-3">
                                {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                            </p>

                            {{-- Aksi --}}
                            <div class="flex gap-2">
                                <button
                                    onclick="openDetail({
                                        id: {{ $sertifikat->id }},
                                        nama: '{{ addslashes($sertifikat->mahasiswa->nama) }}',
                                        nim: '{{ $sertifikat->mahasiswa->nim }}',
                                        prodi: '{{ addslashes($sertifikat->mahasiswa->prodi ?? '') }}',
                                        nama_kegiatan: '{{ addslashes($sertifikat->nama_kegiatan) }}',
                                        penyelenggara: '{{ addslashes($sertifikat->penyelenggara ?? '-') }}',
                                        bidang: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-') }}',
                                        sub_kegiatan: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->nama_sub ?? '-') }}',
                                        kedudukan: '{{ addslashes($sertifikat->kedudukan?->nama_kedudukan ?? '-') }}',
                                        tingkat: '{{ $sertifikat->tingkat ?? '-' }}',
                                        tanggal: '{{ $sertifikat->tanggal_kegiatan ?? '-' }}',
                                        bobot: {{ $sertifikat->bobot_snapshot }},
                                        link: '{{ $sertifikat->link_sertifikat ?? '' }}',
                                        platform: '{{ $sertifikat->platform_sertifikat ?? 'drive' }}'
                                    })"
                                    class="flex-1 py-2 rounded-lg bg-primary/10 text-primary text-xs font-bold hover:bg-primary/20 transition-colors flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-sm">visibility</span>
                                    Detail
                                </button>
                                <button
                                    onclick="openTolak({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}')"
                                    class="flex-1 py-2 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-sm">cancel</span>
                                    Tolak
                                </button>
                                <button
                                    onclick="openSetujui({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}')"
                                    class="flex-1 py-2 rounded-lg bg-secondary text-white text-xs font-bold hover:opacity-90 transition-all flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-sm">verified</span>
                                    Setujui
                                </button>
                            </div>
                        </div>
                        @empty
                        <div class="px-6 py-16 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-5xl text-outline/20 block mb-3">inbox</span>
                            <p class="font-semibold text-sm">Tidak ada sertifikat menunggu verifikasi.</p>
                        </div>
                        @endforelse
                    </div>

                    {{-- Desktop: Table --}}
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low/50">
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Mahasiswa</th>
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Kegiatan</th>
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Poin</th>
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Sertifikat</th>
                                    <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/5">
                                @forelse($sertifikats as $sertifikat)
                                <tr class="hover:bg-surface-container-low transition-colors group">
                                    <td class="px-6 py-5">
                                        <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                                        <p class="text-xs text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }} — {{ $sertifikat->mahasiswa->prodi }}</p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <p class="text-sm font-semibold text-on-surface">{{ $sertifikat->nama_kegiatan }}</p>
                                        <p class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mt-1">
                                            {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="text-lg font-bold text-primary font-headline">{{ $sertifikat->bobot_snapshot }}</span>
                                        <span class="text-[10px] font-bold text-outline uppercase"> Poin</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        @if($sertifikat->link_sertifikat)
                                        <a href="{{ $sertifikat->link_sertifikat }}" target="_blank"
                                            class="inline-flex items-center gap-1 text-xs text-primary font-semibold hover:underline">
                                            <span class="material-symbols-outlined text-sm">open_in_new</span>
                                            Lihat File
                                        </a>
                                        @else
                                        <span class="text-xs text-outline">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="flex justify-end gap-2">
                                            <button
                                                onclick="openDetail({
                                                    id: {{ $sertifikat->id }},
                                                    nama: '{{ addslashes($sertifikat->mahasiswa->nama) }}',
                                                    nim: '{{ $sertifikat->mahasiswa->nim }}',
                                                    prodi: '{{ addslashes($sertifikat->mahasiswa->prodi ?? '') }}',
                                                    nama_kegiatan: '{{ addslashes($sertifikat->nama_kegiatan) }}',
                                                    penyelenggara: '{{ addslashes($sertifikat->penyelenggara ?? '-') }}',
                                                    bidang: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-') }}',
                                                    sub_kegiatan: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->nama_sub ?? '-') }}',
                                                    kedudukan: '{{ addslashes($sertifikat->kedudukan?->nama_kedudukan ?? '-') }}',
                                                    tingkat: '{{ $sertifikat->tingkat ?? '-' }}',
                                                    tanggal: '{{ $sertifikat->tanggal_kegiatan ?? '-' }}',
                                                    bobot: {{ $sertifikat->bobot_snapshot }},
                                                    link: '{{ $sertifikat->link_sertifikat ?? '' }}',
                                                    platform: '{{ $sertifikat->platform_sertifikat ?? 'drive' }}'
                                                })"
                                                class="px-3 py-1.5 rounded-lg bg-primary/10 text-primary text-xs font-bold hover:bg-primary/20 transition-colors flex items-center gap-1">
                                                <span class="material-symbols-outlined text-sm">visibility</span>
                                                Detail
                                            </button>
                                            <button
                                                onclick="openTolak({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}')"
                                                class="px-3 py-1.5 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors flex items-center gap-1">
                                                <span class="material-symbols-outlined text-sm">cancel</span>
                                                Tolak
                                            </button>
                                            <button
                                                onclick="openSetujui({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}')"
                                                class="px-3 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold hover:opacity-90 shadow-sm transition-all active:scale-95 flex items-center gap-1">
                                                <span class="material-symbols-outlined text-sm">verified</span>
                                                Setujui
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center text-on-surface-variant">
                                        <span class="material-symbols-outlined text-5xl text-outline/20 block mb-3">inbox</span>
                                        <p class="font-semibold">Tidak ada sertifikat yang menunggu verifikasi.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($sertifikats->hasPages())
                    <div class="p-4 sm:p-6 bg-surface-container-low/30 border-t border-outline-variant/5">
                        {{ $sertifikats->links() }}
                    </div>
                    @endif
                </section>

    {{-- FAB --}}
    <button onclick="document.querySelector('.md\\:hidden .flex.gap-2 button:last-child, table tbody tr:first-child td:last-child button:last-child')?.click()"
        class="fixed bottom-6 right-6 w-14 h-14 rounded-full bg-primary-container text-on-primary-container shadow-2xl flex items-center justify-center hover:scale-105 transition-transform group z-30">
        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">bolt</span>
        <span class="absolute right-full mr-4 bg-on-surface text-surface px-3 py-1 rounded text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
            Verifikasi Cepat
        </span>
    </button>

    {{-- ===== MODAL DETAIL ===== --}}
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

    {{-- ===== MODAL SETUJUI ===== --}}
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
                            akan diteruskan ke verifikasi Kemahasiswaan.
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

    {{-- ===== MODAL TOLAK ===== --}}
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

@push('scripts')
    <script>
        // ===== State =====
        let activeId   = null;
        let activeNama = null;

        // ===== Close modal with check for other open modals =====
        function closeBemModal(id) {
            closeModal(id);
            const anyOpen = ['modal-detail','modal-setujui','modal-tolak']
                .some(m => !document.getElementById(m).classList.contains('hidden'));
            if (!anyOpen) document.body.style.overflow = '';
        }

        ['modal-detail','modal-setujui','modal-tolak'].forEach(id => {
            document.getElementById(id)?.addEventListener('click', function(e) {
                if (e.target === this) closeBemModal(id);
            });
        });

        // ===== Counter karakter =====
        function hitungKarakter(el) {
            const len     = el.value.length;
            const counter = document.getElementById('char-count');
            const errorEl = document.getElementById('error-catatan');
            counter.textContent = len;
            counter.className   = len >= 10 ? 'text-secondary font-bold' : 'text-error font-bold';
            if (len >= 10) {
                el.classList.remove('border-error');
                errorEl.classList.add('hidden');
            }
        }

        // ===== Modal Detail =====
        function openDetail(data) {
            activeId   = data.id;
            activeNama = data.nama_kegiatan;
            document.getElementById('d-avatar').textContent        = (data.nama ?? 'M').charAt(0).toUpperCase();
            document.getElementById('d-nama').textContent          = data.nama           ?? '-';
            document.getElementById('d-nim').textContent           = data.nim            ?? '-';
            document.getElementById('d-kegiatan').textContent      = data.nama_kegiatan  ?? '-';
            document.getElementById('d-penyelenggara').textContent = data.penyelenggara  ?? '-';
            document.getElementById('d-bidang').textContent        = data.bidang         ?? '-';
            document.getElementById('d-sub').textContent           = data.sub_kegiatan   ?? '-';
            document.getElementById('d-kedudukan').textContent     = data.kedudukan      ?? '-';
            document.getElementById('d-tingkat').textContent       = (data.tingkat ?? '-').replace(/_/g, ' ');
            document.getElementById('d-tanggal').textContent       = data.tanggal        ?? '-';
            document.getElementById('d-bobot').textContent         = (data.bobot ?? 0) + ' Poin';
            document.getElementById('d-link').href                 = data.link           || '#';
            document.getElementById('d-link-text').textContent     = data.link           || 'Tidak ada link';
            document.getElementById('d-platform').textContent      = data.platform === 'onedrive' ? 'OneDrive' : 'Google Drive';
            openModal('modal-detail');
        }

        function openSetujuiFromDetail() { openSetujui(activeId, activeNama); }
        function openTolakFromDetail()   { openTolak(activeId, activeNama); }

        // ===== Modal Setujui =====
        function openSetujui(id, namaKegiatan) {
            activeId   = id;
            activeNama = namaKegiatan;
            document.getElementById('s-nama-kegiatan').textContent = namaKegiatan ?? '-';
            document.getElementById('form-setujui').action = "{{ url('bem/verifikasi') }}/" + id + "/approve";
            document.getElementById('catatan-approve').value = '';
            openModal('modal-setujui');
        }

        // ===== Modal Tolak =====
        function openTolak(id, namaKegiatan) {
            activeId   = id;
            activeNama = namaKegiatan;
            document.getElementById('t-nama-kegiatan').textContent = namaKegiatan ?? '-';
            document.getElementById('form-tolak').action   = "{{ url('bem/verifikasi') }}/" + id + "/reject";
            document.getElementById('tolak-sertifikat-id').value = id;
            const textarea  = document.getElementById('catatan-reject');
            const errorEl   = document.getElementById('error-catatan');
            const counter   = document.getElementById('char-count');
            textarea.value      = '';
            counter.textContent = '0';
            counter.className   = '';
            textarea.classList.remove('border-error');
            errorEl.classList.add('hidden');
            openModal('modal-tolak');
            setTimeout(() => textarea.focus(), 150);
        }

        // ===== Validasi form tolak =====
        document.getElementById('form-tolak').addEventListener('submit', function(e) {
            const textarea = document.getElementById('catatan-reject');
            const errorEl  = document.getElementById('error-catatan');
            const msgEl    = document.getElementById('error-catatan-msg');
            const val      = textarea.value.trim();
            if (val.length === 0) {
                e.preventDefault();
                msgEl.textContent = 'Alasan penolakan wajib diisi.';
                errorEl.classList.remove('hidden');
                textarea.classList.add('border-error');
                textarea.focus();
                return;
            }
            if (val.length < 10) {
                e.preventDefault();
                msgEl.textContent = `Minimal 10 karakter. Sekarang baru ${val.length} karakter.`;
                errorEl.classList.remove('hidden');
                textarea.classList.add('border-error');
                textarea.focus();
                return;
            }
            textarea.value = val;
        });
    </script>
@endpush

</x-layouts.app-admin>