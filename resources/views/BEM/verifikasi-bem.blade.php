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
                {{ $mahasiswas->total() }}
                <span class="text-xs sm:text-sm font-medium text-on-surface-variant">Mahasiswa</span>
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

    {{-- Verification Table (Dikelompokkan per Mahasiswa) --}}
    <section class="bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-sm">
        <div class="p-4 sm:p-6 border-b border-outline-variant/5 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <h3 class="text-base sm:text-lg font-bold font-headline">Antrean Verifikasi</h3>
            <span class="text-xs text-outline">Dikelompokkan berdasarkan Mahasiswa</span>
        </div>

        {{-- Mobile: Card list --}}
        <div class="divide-y divide-outline-variant/5 md:hidden">
            @forelse($mahasiswas as $mhs)
            <div class="p-4 hover:bg-surface-container-low transition-colors">
                <div class="flex items-start justify-between gap-3 mb-3">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-on-surface">{{ $mhs->nama }}</p>
                        <p class="text-xs text-on-surface-variant">{{ $mhs->nim }} — {{ $mhs->prodi }}</p>
                    </div>
                    <span class="px-2 py-1 rounded-lg bg-primary/10 text-primary text-[10px] font-bold shrink-0">
                        {{ $mhs->sertifikats->count() }} Pengajuan
                    </span>
                </div>
                <button
                    onclick='openDaftarSertifikat(@json($mhs), @json($mhs->sertifikats))'
                    class="w-full py-2 rounded-lg bg-secondary text-white text-xs font-bold hover:opacity-90 transition-all flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-sm">fact_check</span>
                    Periksa Sertifikat
                </button>
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
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Program Studi</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Antrean Pending</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @forelse($mahasiswas as $mhs)
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-6 py-5">
                            <p class="text-sm font-bold text-on-surface">{{ $mhs->nama }}</p>
                            <p class="text-xs text-on-surface-variant">{{ $mhs->nim }}</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-sm font-semibold text-on-surface">{{ $mhs->prodi }}</p>
                            <p class="text-xs text-on-surface-variant">{{ $mhs->fakultas }}</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold">
                                <span class="material-symbols-outlined text-[14px]">description</span>
                                {{ $mhs->sertifikats->count() }} Sertifikat
                            </span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button
                                onclick='openDaftarSertifikat(@json($mhs), @json($mhs->sertifikats))'
                                class="inline-flex px-4 py-2 rounded-xl bg-secondary text-white text-xs font-bold hover:opacity-90 shadow-sm transition-all active:scale-95 items-center gap-1.5">
                                <span class="material-symbols-outlined text-sm">fact_check</span>
                                Mulai Periksa
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-5xl text-outline/20 block mb-3">inbox</span>
                            <p class="font-semibold">Tidak ada sertifikat yang menunggu verifikasi.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($mahasiswas->hasPages())
        <div class="p-4 sm:p-6 bg-surface-container-low/30 border-t border-outline-variant/5">
            {{ $mahasiswas->links() }}
        </div>
        @endif
    </section>

    {{-- ===== MODAL DAFTAR SERTIFIKAT PER MAHASISWA ===== --}}
    <div id="modal-daftar-sertifikat"
        class="modal-wrap hidden fixed inset-0 z-[90] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="modal-box bg-white w-full sm:max-w-2xl rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[92vh] flex flex-col">
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-outline-variant/10 shrink-0 bg-surface-container-lowest">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-xl">account_circle</span>
                    </div>
                    <div>
                        <h3 class="text-base font-extrabold text-on-surface font-headline" id="mds-nama">-</h3>
                        <p class="text-[10px] text-on-surface-variant font-medium" id="mds-nim">-</p>
                    </div>
                </div>
                <button onclick="closeModal('modal-daftar-sertifikat')"
                    class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">close</span>
                </button>
            </div>
            
            <div class="overflow-y-auto flex-1 p-5 sm:p-6 bg-surface">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest">Antrean Sertifikat</p>
                    <span class="text-[10px] font-bold bg-primary/10 text-primary px-2 py-0.5 rounded-lg" id="mds-counter">0 / 0</span>
                </div>
                <div id="mds-list" class="space-y-4 min-h-[300px]">
                    <!-- Diisi via JS -->
                </div>
                
                {{-- JS Pagination Controls --}}
                <div class="flex items-center justify-between mt-5 pt-4 border-t border-outline-variant/10" id="mds-pagination">
                    <button id="btn-prev-page" onclick="changeMdsPage(-1)" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-surface-container hover:bg-surface-container-high transition-colors flex items-center gap-1 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span class="material-symbols-outlined text-sm">chevron_left</span> Prev
                    </button>
                    <div id="mds-page-numbers" class="flex gap-1"></div>
                    <button id="btn-next-page" onclick="changeMdsPage(1)" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-surface-container hover:bg-surface-container-high transition-colors flex items-center gap-1 disabled:opacity-50 disabled:cursor-not-allowed">
                        Next <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- ===== MODAL DETAIL ===== --}}
    <div id="modal-detail"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/40 backdrop-blur-sm">
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
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal Event</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-tanggal">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal Pengajuan</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-tanggal-pengajuan">-</p>
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
                    class="w-full py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-xs sm:text-sm hover:bg-surface-container transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL SETUJUI ===== --}}
    <div id="modal-setujui"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/40 backdrop-blur-sm">
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
                    <button type="submit" id="btn-submit-setujui"
                        class="flex-1 py-2.5 rounded-xl bg-secondary text-white font-bold text-sm shadow-lg shadow-secondary/20 hover:opacity-90 active:scale-95 transition-all flex items-center justify-center gap-2 font-headline">
                        <span class="material-symbols-outlined text-base">check</span>
                        Ya, Setujui
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ===== MODAL TOLAK ===== --}}
    <div id="modal-tolak"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/40 backdrop-blur-sm">
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
                    <button type="submit" id="btn-submit-tolak"
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
        let activeId    = null;
        let activeNama  = null;
        let activeBobot = 0;

        let currentMhs = null;
        let currentCerts = [];
        let currentPage = 1;
        const ITEMS_PER_PAGE = 5;

        // ===== Close modal logic =====
        function closeBemModal(id) {
            closeModal(id);
        }

        ['modal-detail','modal-setujui','modal-tolak', 'modal-daftar-sertifikat'].forEach(id => {
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

        // ===== DAFTAR SERTIFIKAT MODAL =====
        function openDaftarSertifikat(mhs, certs) {
            currentMhs = mhs;
            currentCerts = certs;
            currentPage = 1;
            
            document.getElementById('mds-nama').textContent = mhs.nama;
            document.getElementById('mds-nim').textContent = mhs.nim + ' — ' + (mhs.prodi || '-');
            
            renderDaftarSertifikat();
            openModal('modal-daftar-sertifikat');
        }

        function renderDaftarSertifikat() {
            const list = document.getElementById('mds-list');
            list.innerHTML = '';
            
            const totalItems = currentCerts.length;
            document.getElementById('mds-counter').textContent = totalItems + ' Sertifikat';
            
            const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);
            if (currentPage > totalPages && totalPages > 0) currentPage = totalPages;
            
            const start = (currentPage - 1) * ITEMS_PER_PAGE;
            const end = start + ITEMS_PER_PAGE;
            const paginatedCerts = currentCerts.slice(start, end);
            
            paginatedCerts.forEach(cert => {
                const tgl = cert.created_at ? cert.created_at.split('T')[0] : '-';
                const bidang = cert.kedudukan?.sub_kegiatan?.bidang_kegiatan?.nama_bidang ?? '-';
                
                const div = document.createElement('div');
                div.id = 'cert-item-' + cert.id;
                div.className = 'p-4 bg-white rounded-xl border border-outline-variant/10 shadow-sm flex flex-col gap-3 transition-all duration-300';
                div.innerHTML = `
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="font-bold text-sm text-on-surface mb-0.5">${cert.nama_kegiatan}</p>
                            <p class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block">
                                ${bidang}
                            </p>
                        </div>
                        <span class="text-primary font-bold text-lg text-right shrink-0">${cert.bobot_snapshot}<br><span class="text-[9px] uppercase text-outline">Poin</span></span>
                    </div>
                    <div class="flex gap-2">
                        <button onclick='openDetailFromJson(${JSON.stringify(cert).replace(/'/g, "&#39;")}, ${JSON.stringify(currentMhs).replace(/'/g, "&#39;")})' class="flex-1 py-2 rounded-lg bg-primary/10 text-primary text-xs font-bold hover:bg-primary/20 transition-colors flex items-center justify-center gap-1"><span class="material-symbols-outlined text-sm">visibility</span> Detail</button>
                        <button onclick='openTolak(${cert.id}, "${cert.nama_kegiatan.replace(/"/g, '&quot;')}")' class="flex-1 py-2 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors flex items-center justify-center gap-1"><span class="material-symbols-outlined text-sm">cancel</span> Tolak</button>
                        <button onclick='openSetujui(${cert.id}, "${cert.nama_kegiatan.replace(/"/g, '&quot;')}", ${cert.bobot_snapshot})' class="flex-1 py-2 rounded-lg bg-secondary text-white text-xs font-bold hover:opacity-90 transition-colors flex items-center justify-center gap-1"><span class="material-symbols-outlined text-sm">verified</span> ACC</button>
                    </div>
                `;
                list.appendChild(div);
            });
            
            renderMdsPagination(totalPages);
        }

        function renderMdsPagination(totalPages) {
            const btnPrev = document.getElementById('btn-prev-page');
            const btnNext = document.getElementById('btn-next-page');
            const numbers = document.getElementById('mds-page-numbers');
            
            if (totalPages <= 1) {
                document.getElementById('mds-pagination').classList.add('hidden');
                return;
            }
            
            document.getElementById('mds-pagination').classList.remove('hidden');
            btnPrev.disabled = currentPage === 1;
            btnNext.disabled = currentPage === totalPages;
            
            numbers.innerHTML = '';
            for(let i=1; i<=totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = `w-7 h-7 flex items-center justify-center rounded-lg text-xs font-bold transition-colors ${i === currentPage ? 'bg-primary text-white' : 'hover:bg-surface-container'}`;
                btn.textContent = i;
                btn.onclick = () => { currentPage = i; renderDaftarSertifikat(); };
                numbers.appendChild(btn);
            }
        }

        function changeMdsPage(dir) {
            currentPage += dir;
            renderDaftarSertifikat();
        }

        function openDetailFromJson(cert, mhs) {
            const data = {
                id: cert.id,
                nama: mhs.nama,
                nim: mhs.nim,
                prodi: mhs.prodi,
                nama_kegiatan: cert.nama_kegiatan,
                penyelenggara: cert.penyelenggara,
                bidang: cert.kedudukan?.sub_kegiatan?.bidang_kegiatan?.nama_bidang ?? '-',
                sub_kegiatan: cert.kedudukan?.sub_kegiatan?.nama_sub ?? '-',
                kedudukan: cert.kedudukan?.nama_kedudukan ?? '-',
                tingkat: cert.tingkat ?? '-',
                tanggal: cert.tanggal_kegiatan ? cert.tanggal_kegiatan.split('T')[0] : '-',
                tanggal_pengajuan: cert.created_at ? cert.created_at.split('T')[0] : '-',
                bobot: cert.bobot_snapshot,
                link: cert.link_sertifikat,
                platform: cert.platform_sertifikat
            };
            openDetail(data);
        }

        // ===== Modal Detail =====
        function openDetail(data) {
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
            document.getElementById('d-tanggal-pengajuan').textContent = data.tanggal_pengajuan ?? '-';
            document.getElementById('d-bobot').textContent         = (data.bobot ?? 0) + ' Poin';
            document.getElementById('d-link').href                 = data.link           || '#';
            document.getElementById('d-link-text').textContent     = data.link           || 'Tidak ada link';
            document.getElementById('d-platform').textContent      = data.platform === 'onedrive' ? 'OneDrive' : 'Google Drive';
            openModal('modal-detail');
        }

        // ===== Modal Setujui =====
        function openSetujui(id, namaKegiatan, bobot) {
            activeId   = id;
            document.getElementById('s-nama-kegiatan').textContent = namaKegiatan ?? '-';
            document.getElementById('form-setujui').action = "{{ url('bem/verifikasi') }}/" + id + "/approve";
            document.getElementById('catatan-approve').value = '';
            openModal('modal-setujui');
        }

        // ===== Modal Tolak =====
        function openTolak(id, namaKegiatan) {
            activeId   = id;
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

        function removeCertFromList(id) {
            currentCerts = currentCerts.filter(c => c.id !== id);
            if (currentCerts.length === 0) {
                closeModal('modal-daftar-sertifikat');
                window.location.reload();
            } else {
                renderDaftarSertifikat();
            }
        }

        // ===== AJAX form submission =====
        document.getElementById('form-tolak').addEventListener('submit', async function(e) {
            e.preventDefault();
            const textarea = document.getElementById('catatan-reject');
            const errorEl  = document.getElementById('error-catatan');
            const msgEl    = document.getElementById('error-catatan-msg');
            const val      = textarea.value.trim();
            if (val.length < 10) {
                msgEl.textContent = `Minimal 10 karakter. Sekarang baru ${val.length} karakter.`;
                errorEl.classList.remove('hidden');
                textarea.classList.add('border-error');
                textarea.focus();
                return;
            }
            
            const btn = document.getElementById('btn-submit-tolak');
            const oldHtml = btn.innerHTML;
            btn.innerHTML = 'Memproses...';
            btn.disabled = true;

            try {
                const formData = new FormData(this);
                const res = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                });
                if(res.ok) {
                    closeModal('modal-tolak');
                    removeCertFromList(activeId);
                }
            } catch(err) {
                alert('Terjadi kesalahan jaringan.');
            } finally {
                btn.innerHTML = oldHtml;
                btn.disabled = false;
            }
        });

        document.getElementById('form-setujui').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('btn-submit-setujui');
            const oldHtml = btn.innerHTML;
            btn.innerHTML = 'Memproses...';
            btn.disabled = true;

            try {
                const formData = new FormData(this);
                const res = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
                });
                if(res.ok) {
                    closeModal('modal-setujui');
                    removeCertFromList(activeId);
                }
            } catch(err) {
                alert('Terjadi kesalahan jaringan.');
            } finally {
                btn.innerHTML = oldHtml;
                btn.disabled = false;
            }
        });
    </script>
@endpush

</x-layouts.app-admin>