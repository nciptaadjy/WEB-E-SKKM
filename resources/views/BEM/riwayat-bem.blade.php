<x-layouts.app-admin
    :title="'Riwayat Verifikasi BEM'"
    :role="'bem'"
    :activePage="'riwayat'"
    :portalName="'E-SKKM'"
    :portalSub="'BEM Dashboard'"
    :sidebarIcon="'history'"
>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-2 gap-3 sm:gap-6 mb-6 sm:mb-10">
        <div class="p-4 sm:p-6 rounded-xl bg-secondary-container/20 border border-secondary/10">
            <p class="text-[10px] sm:text-xs font-semibold text-outline uppercase tracking-widest mb-1">Total Disetujui</p>
            <h3 class="text-2xl sm:text-4xl font-bold text-secondary font-headline flex items-center gap-2">
                {{ $totalAcc }}
                <span class="text-xs sm:text-sm font-medium text-on-surface-variant">Sertifikat</span>
            </h3>
        </div>
        <div class="p-4 sm:p-6 rounded-xl bg-error-container/20 border border-error/10">
            <p class="text-[10px] sm:text-xs font-semibold text-outline uppercase tracking-widest mb-1">Total Ditolak</p>
            <h3 class="text-2xl sm:text-4xl font-bold text-error font-headline flex items-center gap-2">
                {{ $totalReject }}
                <span class="text-xs sm:text-sm font-medium text-on-surface-variant">Sertifikat</span>
            </h3>
        </div>
    </div>

    {{-- Verification History Table --}}
    <section class="bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-sm">
        <div class="p-4 sm:p-6 border-b border-outline-variant/5 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <h3 class="text-base sm:text-lg font-bold font-headline flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">history</span>
                Riwayat Keputusan
            </h3>
            <span class="text-xs text-outline">Sertifikat yang telah Anda proses</span>
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
                    
                    @if($sertifikat->status === 'rejected')
                        <span class="px-2.5 py-1 rounded-lg bg-error/10 text-error text-[10px] font-bold border border-error/20 flex items-center gap-1 shrink-0">
                            <span class="material-symbols-outlined text-[12px]">cancel</span> Tolak
                        </span>
                    @else
                        <span class="px-2.5 py-1 rounded-lg bg-secondary/10 text-secondary-container text-[10px] font-bold border border-secondary/20 flex items-center gap-1 shrink-0">
                            <span class="material-symbols-outlined text-[12px]">check_circle</span> ACC
                        </span>
                    @endif
                </div>

                {{-- Info kegiatan --}}
                <p class="text-sm font-semibold text-on-surface mb-1">{{ $sertifikat->nama_kegiatan }}</p>
                <div class="flex items-center gap-2 mb-3">
                    <p class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block">
                        {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                    </p>
                    <span class="text-[10px] font-bold text-primary">{{ $sertifikat->bobot_snapshot }} Poin</span>
                </div>

                {{-- Aksi --}}
                <button
                    onclick="openDetail({
                        nama: '{{ addslashes($sertifikat->mahasiswa->nama) }}',
                        nim: '{{ $sertifikat->mahasiswa->nim }}',
                        prodi: '{{ addslashes($sertifikat->mahasiswa->prodi ?? '') }}',
                        nama_kegiatan: '{{ addslashes($sertifikat->nama_kegiatan) }}',
                        penyelenggara: '{{ addslashes($sertifikat->penyelenggara ?? '-') }}',
                        bidang: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-') }}',
                        sub_kegiatan: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->nama_sub ?? '-') }}',
                        kedudukan: '{{ addslashes($sertifikat->kedudukan?->nama_kedudukan ?? '-') }}',
                        tingkat: '{{ $sertifikat->tingkat ?? '-' }}',
                        tanggal: '{{ $sertifikat->tanggal_kegiatan ? $sertifikat->tanggal_kegiatan->format('Y-m-d') : '-' }}',
                        tanggal_proses: '{{ $sertifikat->verified_bem_at ? \Carbon\Carbon::parse($sertifikat->verified_bem_at)->format('Y-m-d H:i') : '-' }}',
                        bobot: {{ $sertifikat->bobot_snapshot }},
                        link: '{{ $sertifikat->link_sertifikat ?? '' }}',
                        platform: '{{ $sertifikat->platform_sertifikat ?? 'drive' }}',
                        status: '{{ $sertifikat->status }}',
                        catatan_reject: '{{ addslashes($sertifikat->catatan_reject ?? '') }}'
                    })"
                    class="w-full py-2 rounded-lg bg-surface-container border border-outline-variant/30 text-on-surface-variant text-xs font-bold hover:bg-surface-container-high transition-colors flex items-center justify-center gap-1">
                    <span class="material-symbols-outlined text-sm">visibility</span>
                    Lihat Detail
                </button>
            </div>
            @empty
            <div class="px-6 py-16 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-5xl text-outline/20 block mb-3">history</span>
                <p class="font-semibold text-sm">Belum ada riwayat verifikasi.</p>
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
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Keputusan</th>
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
                        </td>
                        <td class="px-6 py-5">
                            @if($sertifikat->status === 'rejected')
                                <div class="flex flex-col items-start gap-1">
                                    <span class="px-2.5 py-1 rounded-lg bg-error/10 text-error text-xs font-bold border border-error/20 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">cancel</span> Ditolak
                                    </span>
                                    <span class="text-[10px] text-on-surface-variant">{{ $sertifikat->verified_bem_at ? \Carbon\Carbon::parse($sertifikat->verified_bem_at)->format('d M Y') : '' }}</span>
                                </div>
                            @else
                                <div class="flex flex-col items-start gap-1">
                                    <span class="px-2.5 py-1 rounded-lg bg-secondary/10 text-secondary-container text-xs font-bold border border-secondary/20 flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">check_circle</span> Di-ACC
                                    </span>
                                    <span class="text-[10px] text-on-surface-variant">{{ $sertifikat->verified_bem_at ? \Carbon\Carbon::parse($sertifikat->verified_bem_at)->format('d M Y') : '' }}</span>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button
                                onclick="openDetail({
                                    nama: '{{ addslashes($sertifikat->mahasiswa->nama) }}',
                                    nim: '{{ $sertifikat->mahasiswa->nim }}',
                                    prodi: '{{ addslashes($sertifikat->mahasiswa->prodi ?? '') }}',
                                    nama_kegiatan: '{{ addslashes($sertifikat->nama_kegiatan) }}',
                                    penyelenggara: '{{ addslashes($sertifikat->penyelenggara ?? '-') }}',
                                    bidang: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-') }}',
                                    sub_kegiatan: '{{ addslashes($sertifikat->kedudukan?->subKegiatan?->nama_sub ?? '-') }}',
                                    kedudukan: '{{ addslashes($sertifikat->kedudukan?->nama_kedudukan ?? '-') }}',
                                    tingkat: '{{ $sertifikat->tingkat ?? '-' }}',
                                    tanggal: '{{ $sertifikat->tanggal_kegiatan ? $sertifikat->tanggal_kegiatan->format('Y-m-d') : '-' }}',
                                    tanggal_proses: '{{ $sertifikat->verified_bem_at ? \Carbon\Carbon::parse($sertifikat->verified_bem_at)->format('Y-m-d H:i') : '-' }}',
                                    bobot: {{ $sertifikat->bobot_snapshot }},
                                    link: '{{ $sertifikat->link_sertifikat ?? '' }}',
                                    platform: '{{ $sertifikat->platform_sertifikat ?? 'drive' }}',
                                    status: '{{ $sertifikat->status }}',
                                    catatan_reject: '{{ addslashes($sertifikat->catatan_reject ?? '') }}'
                                })"
                                class="inline-flex px-3 py-1.5 rounded-lg bg-surface-container border border-outline-variant/30 text-on-surface-variant text-xs font-bold hover:bg-surface-container-high transition-colors items-center gap-1">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                                Detail
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-5xl text-outline/20 block mb-3">history</span>
                            <p class="font-semibold">Belum ada riwayat verifikasi.</p>
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

    {{-- ===== MODAL DETAIL RIWAYAT ===== --}}
    <div id="modal-detail"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-detail')">
        <div class="modal-box bg-white w-full sm:max-w-lg rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[92vh] flex flex-col">
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-outline-variant/10 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-xl">description</span>
                    </div>
                    <h3 class="text-base font-extrabold text-on-surface font-headline">Detail Riwayat</h3>
                </div>
                <button onclick="closeModal('modal-detail')"
                    class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">close</span>
                </button>
            </div>
            
            <div class="overflow-y-auto flex-1 p-5 sm:p-6 space-y-5">
                <div id="d-reject-wrap" class="hidden p-3 bg-error-container/20 border border-error/10 rounded-xl mb-2">
                    <p class="text-xs text-error font-semibold mb-0.5 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">info</span> Alasan Ditolak:
                    </p>
                    <p class="text-xs text-on-surface-variant ml-5" id="d-catatan-reject">-</p>
                </div>

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
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tgl Proses ACC/Tolak</p>
                            <p class="text-sm font-semibold text-on-surface" id="d-tanggal-proses">-</p>
                        </div>
                        <div class="p-3 bg-primary/5 rounded-xl border border-primary/15">
                            <p class="text-[10px] text-primary font-bold mb-0.5">Poin Disetujui</p>
                            <p class="text-lg font-bold text-primary font-headline" id="d-bobot">-</p>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Sertifikat</p>
                    <a id="d-link" href="#" target="_blank"
                        class="flex items-center gap-3 p-3 bg-surface-container-low rounded-xl hover:bg-primary/5 transition-colors group border border-outline-variant/20">
                        <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary text-lg">link</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-semibold text-primary truncate" id="d-link-text">-</p>
                        </div>
                        <span class="material-symbols-outlined text-outline text-sm group-hover:text-primary transition-colors">open_in_new</span>
                    </a>
                </div>
            </div>
            <div class="p-4 border-t border-outline-variant/10 bg-surface-container-low flex shrink-0">
                <button onclick="closeModal('modal-detail')"
                    class="w-full py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">
                    Tutup Riwayat
                </button>
            </div>
        </div>
    </div>

@push('scripts')
    <script>
        function openDetail(data) {
            document.getElementById('d-avatar').textContent        = (data.nama ?? 'M').charAt(0).toUpperCase();
            document.getElementById('d-nama').textContent          = data.nama           ?? '-';
            document.getElementById('d-nim').textContent           = data.nim            ?? '-';
            document.getElementById('d-kegiatan').textContent      = data.nama_kegiatan  ?? '-';
            document.getElementById('d-bidang').textContent        = data.bidang         ?? '-';
            document.getElementById('d-sub').textContent           = data.sub_kegiatan   ?? '-';
            document.getElementById('d-kedudukan').textContent     = data.kedudukan      ?? '-';
            document.getElementById('d-tingkat').textContent       = (data.tingkat ?? '-').replace(/_/g, ' ');
            document.getElementById('d-tanggal-proses').textContent = data.tanggal_proses ?? '-';
            document.getElementById('d-bobot').textContent         = (data.bobot ?? 0) + ' Poin';
            document.getElementById('d-link').href                 = data.link           || '#';
            document.getElementById('d-link-text').textContent     = data.link           || 'Tidak ada link';
            
            const rejectWrap = document.getElementById('d-reject-wrap');
            if(data.status === 'rejected') {
                rejectWrap.classList.remove('hidden');
                document.getElementById('d-catatan-reject').textContent = data.catatan_reject || 'Ditolak tanpa alasan.';
            } else {
                rejectWrap.classList.add('hidden');
            }

            openModal('modal-detail');
        }
    </script>
@endpush

</x-layouts.app-admin>
