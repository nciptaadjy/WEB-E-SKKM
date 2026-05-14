<x-layouts.app-mahasiswa :title="'List Sertifikat'" :activePage="'list'">

    {{-- Stats Header --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
        <div class="col-span-2 bg-gradient-to-br from-primary to-primary-container p-5 md:p-6 rounded-2xl text-white shadow-xl flex flex-col justify-between">
            <div>
                <p class="text-xs uppercase tracking-widest opacity-80 mb-1">Total Poin SKKM</p>
                <h3 class="text-3xl lg:text-5xl font-bold headline">
                    {{ $totalPoin }}<span class="text-lg md:text-xl font-normal opacity-70 ml-2">poin</span>
                </h3>
            </div>
            @php $targetPoin = 200; $pctPoin = $targetPoin > 0 ? min(100, round(($totalPoin / $targetPoin) * 100)) : 0; @endphp
            <div class="mt-4">
                <div class="w-full bg-white/20 h-2 rounded-full overflow-hidden">
                    <div class="bg-white h-full transition-all duration-500" style="width: {{ $pctPoin }}%"></div>
                </div>
                @if($totalPoin < $targetPoin)
                <p class="text-[10px] mt-2 opacity-80 font-medium">Anda butuh {{ $targetPoin - $totalPoin }} poin lagi untuk syarat kelulusan.</p>
                @else
                <p class="text-[10px] mt-2 opacity-80 font-medium">✓ Target poin kelulusan tercapai!</p>
                @endif
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-2xl flex flex-col justify-between border border-outline-variant/10 shadow-sm">
            <div class="w-10 h-10 rounded-full bg-secondary-container/30 flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-secondary">verified</span>
            </div>
            <div>
                <p class="text-xl md:text-2xl font-bold headline">{{ $totalApproved }}</p>
                <p class="text-xs text-outline font-semibold">Sertifikat Disetujui</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-2xl flex flex-col justify-between border border-outline-variant/10 shadow-sm">
            <div class="w-10 h-10 rounded-full bg-tertiary-fixed/30 flex items-center justify-center mb-4">
                <span class="material-symbols-outlined text-tertiary">hourglass_empty</span>
            </div>
            <div>
                <p class="text-xl md:text-2xl font-bold headline">{{ $totalPending }}</p>
                <p class="text-xs text-outline font-semibold">Dalam Antrean</p>
            </div>
        </div>
    </div>

    {{-- Riwayat Pengajuan --}}
    <div class="space-y-4">
        <h4 class="headline font-bold text-xl text-on-surface">Riwayat Pengajuan</h4>

        @forelse($sertifikats as $sertifikat)
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/10 shadow-sm overflow-hidden hover:shadow-md transition-all cursor-pointer"
             onclick="openSertifikatDetail({{ json_encode([
                'nama_kegiatan' => $sertifikat->nama_kegiatan,
                'penyelenggara' => $sertifikat->penyelenggara ?? '-',
                'tanggal_kegiatan' => $sertifikat->tanggal_kegiatan ? \Carbon\Carbon::parse($sertifikat->tanggal_kegiatan)->format('d M Y') : '-',
                'kedudukan' => $sertifikat->kedudukan?->nama_kedudukan ?? '-',
                'bidang' => $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-',
                'sub_kegiatan' => $sertifikat->kedudukan?->subKegiatan?->nama_sub ?? '-',
                'tingkat' => $sertifikat->tingkat ?? '-',
                'status' => $sertifikat->status,
                'bobot' => $sertifikat->bobot_snapshot,
                'catatan_reject' => $sertifikat->catatan_reject,
                'link_sertifikat' => $sertifikat->link_sertifikat ?? null,
             ]) }})">
            <div class="p-4 md:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-3 md:gap-4">
                {{-- Thumbnail Preview --}}
                <div class="flex items-start gap-3 md:gap-4 flex-1 min-w-0">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-surface-container-low border border-outline-variant/20 flex items-center justify-center shrink-0 overflow-hidden">
                        @if($sertifikat->link_sertifikat)
                        <div class="w-full h-full flex items-center justify-center bg-primary/5">
                            <span class="material-symbols-outlined text-primary text-2xl">description</span>
                        </div>
                        @else
                        <span class="material-symbols-outlined text-outline/40 text-2xl">image</span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h5 class="headline font-bold text-on-surface truncate text-sm md:text-base">{{ $sertifikat->nama_kegiatan }}</h5>
                        <p class="text-xs text-on-surface-variant mt-1">
                            {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                            • {{ $sertifikat->kedudukan?->nama_kedudukan ?? '' }}
                        </p>
                        <p class="text-xs text-outline mt-1 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">calendar_month</span>
                            {{ $sertifikat->tanggal_kegiatan ? \Carbon\Carbon::parse($sertifikat->tanggal_kegiatan)->format('d M Y') : '-' }}
                            @if($sertifikat->penyelenggara)
                            <span class="mx-1">•</span> {{ $sertifikat->penyelenggara }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-3 md:gap-4 flex-shrink-0">
                    {{-- Poin --}}
                    <div class="text-right">
                        <span class="text-lg font-bold {{ $sertifikat->status === 'approved' ? 'text-secondary' : ($sertifikat->status === 'rejected' ? 'text-tertiary' : 'text-primary') }}">
                            {{ $sertifikat->status === 'approved' ? '+' : '' }}{{ $sertifikat->bobot_snapshot }}
                        </span>
                        <p class="text-[10px] text-outline">Poin</p>
                    </div>
                    {{-- Status Badge --}}
                    @include('components.status-badge', ['status' => $sertifikat->status])
                    {{-- Eye icon --}}
                    <div class="p-2 rounded-lg bg-surface-container-low text-primary hover:bg-primary hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-[18px]">visibility</span>
                    </div>
                </div>
            </div>
            {{-- Rejection Reason --}}
            @if($sertifikat->status === 'rejected' && $sertifikat->catatan_reject)
            <div class="px-4 md:px-5 pb-4">
                <div class="p-3 bg-error-container/20 rounded-lg border border-error/10">
                    <p class="text-xs text-on-error-container leading-relaxed">
                        <strong class="font-bold">Alasan Penolakan:</strong> {{ $sertifikat->catatan_reject }}
                    </p>
                </div>
            </div>
            @endif
            {{-- Status Tracker --}}
            <div class="px-4 md:px-5 pb-4">
                <div class="flex items-center gap-2 text-[10px] font-semibold">
                    <div class="flex items-center gap-1 {{ in_array($sertifikat->status, ['pending', 'verified_bem', 'approved']) ? 'text-primary' : 'text-tertiary' }}">
                        <span class="w-5 h-5 rounded-full {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'bg-primary text-white' : ($sertifikat->status === 'rejected' ? 'bg-tertiary text-white' : 'bg-primary/20 text-primary') }} flex items-center justify-center">
                            @if(in_array($sertifikat->status, ['verified_bem', 'approved']))
                            <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check</span>
                            @elseif($sertifikat->status === 'rejected')
                            <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">close</span>
                            @else
                            1
                            @endif
                        </span>
                        <span>Upload</span>
                    </div>
                    <div class="flex-1 h-0.5 {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'bg-primary' : 'bg-outline-variant/30' }}"></div>
                    <div class="flex items-center gap-1 {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'text-primary' : 'text-outline' }}">
                        <span class="w-5 h-5 rounded-full {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'bg-primary text-white' : 'bg-outline-variant/20' }} flex items-center justify-center">
                            @if(in_array($sertifikat->status, ['verified_bem', 'approved']))
                            <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check</span>
                            @else
                            2
                            @endif
                        </span>
                        <span>BEM</span>
                    </div>
                    <div class="flex-1 h-0.5 {{ $sertifikat->status === 'approved' ? 'bg-secondary' : 'bg-outline-variant/30' }}"></div>
                    <div class="flex items-center gap-1 {{ $sertifikat->status === 'approved' ? 'text-secondary' : 'text-outline' }}">
                        <span class="w-5 h-5 rounded-full {{ $sertifikat->status === 'approved' ? 'bg-secondary text-white' : 'bg-outline-variant/20' }} flex items-center justify-center">
                            @if($sertifikat->status === 'approved')
                            <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check</span>
                            @else
                            3
                            @endif
                        </span>
                        <span>Kemahasiswaan</span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/10 shadow-sm p-12 text-center">
            <span class="material-symbols-outlined text-5xl text-outline/30">inbox</span>
            <p class="headline font-bold text-on-surface mt-4">Belum Ada Sertifikat</p>
            <p class="text-sm text-on-surface-variant mt-2">Mulai dengan mengunggah sertifikat kegiatan pertama Anda.</p>
            <a href="{{ route('sertifikat.create') }}" class="inline-flex items-center gap-2 mt-4 px-5 py-2.5 bg-primary text-white font-semibold rounded-lg hover:opacity-90 transition-all shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-sm">add</span>
                Upload Sertifikat
            </a>
        </div>
        @endforelse

        {{-- Pagination --}}
        @if($sertifikats->hasPages())
        <div class="mt-6">
            {{ $sertifikats->links() }}
        </div>
        @endif
    </div>

    {{-- Sertifikat Detail Modal --}}
    <div id="modal-sertifikat-detail"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-sertifikat-detail')">
        <div class="modal-box bg-white w-full sm:max-w-lg rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[92vh] flex flex-col">
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-outline-variant/10 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-xl">description</span>
                    </div>
                    <h3 class="text-base font-extrabold text-on-surface font-headline">Detail Sertifikat</h3>
                </div>
                <button onclick="closeModal('modal-sertifikat-detail')"
                    class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">close</span>
                </button>
            </div>
            <div class="overflow-y-auto flex-1 p-5 sm:p-6 space-y-5">
                {{-- Kegiatan Info --}}
                <div>
                    <h4 class="text-lg font-bold text-on-surface font-headline" id="sd-nama-kegiatan">-</h4>
                    <div id="sd-status-wrap" class="mt-2"></div>
                </div>

                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-3">Informasi Kegiatan</p>
                    <div class="grid grid-cols-2 gap-2.5">
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Penyelenggara</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-penyelenggara">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-tanggal">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Kedudukan</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-kedudukan">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Bidang</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-bidang">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Sub Kegiatan</p>
                            <p class="text-sm font-semibold text-on-surface" id="sd-sub-kegiatan">-</p>
                        </div>
                        <div class="p-3 bg-surface-container-low rounded-xl">
                            <p class="text-[10px] text-on-surface-variant mb-0.5">Tingkat</p>
                            <p class="text-sm font-semibold text-on-surface capitalize" id="sd-tingkat">-</p>
                        </div>
                        <div class="col-span-2 p-3 bg-primary/5 rounded-xl border border-primary/15">
                            <p class="text-[10px] text-primary font-bold mb-0.5">Poin SKKM</p>
                            <p class="text-xl font-bold text-primary font-headline" id="sd-bobot">-</p>
                        </div>
                    </div>
                </div>

                {{-- Catatan Reject --}}
                <div id="sd-reject-wrap" class="hidden">
                    <div class="p-3 bg-error-container/20 rounded-lg border border-error/10">
                        <p class="text-xs text-on-error-container leading-relaxed">
                            <strong class="font-bold">Catatan Penolakan:</strong>
                            <span id="sd-catatan-reject"></span>
                        </p>
                    </div>
                </div>

                {{-- Link Sertifikat --}}
                <div id="sd-link-wrap" class="hidden">
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Bukti Sertifikat</p>
                    <a id="sd-link" href="#" target="_blank"
                        class="flex items-center gap-3 p-3 bg-surface-container-low rounded-xl hover:bg-primary/5 transition-colors group border border-outline-variant/20">
                        <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary text-lg">link</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-semibold text-primary truncate" id="sd-link-text">-</p>
                            <p class="text-[10px] text-on-surface-variant">Buka link sertifikat</p>
                        </div>
                        <span class="material-symbols-outlined text-outline text-sm group-hover:text-primary transition-colors">open_in_new</span>
                    </a>
                </div>
            </div>
            <div class="p-4 border-t border-outline-variant/10 bg-surface-container-low shrink-0">
                <button onclick="closeModal('modal-sertifikat-detail')"
                    class="w-full py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    function openSertifikatDetail(data) {
        document.getElementById('sd-nama-kegiatan').textContent = data.nama_kegiatan || '-';
        document.getElementById('sd-penyelenggara').textContent = data.penyelenggara || '-';
        document.getElementById('sd-tanggal').textContent = data.tanggal_kegiatan || '-';
        document.getElementById('sd-kedudukan').textContent = data.kedudukan || '-';
        document.getElementById('sd-bidang').textContent = data.bidang || '-';
        document.getElementById('sd-sub-kegiatan').textContent = data.sub_kegiatan || '-';
        document.getElementById('sd-tingkat').textContent = (data.tingkat || '-').replace(/_/g, ' ');
        document.getElementById('sd-bobot').textContent = (data.bobot || 0) + ' Poin';

        // Status badge
        const statusWrap = document.getElementById('sd-status-wrap');
        const statusMap = {
            'approved': '<span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full uppercase">Disetujui</span>',
            'verified_bem': '<span class="px-3 py-1 bg-primary-fixed text-primary text-xs font-bold rounded-full uppercase">Verif BEM</span>',
            'pending': '<span class="px-3 py-1 bg-surface-container-high text-on-surface-variant text-xs font-bold rounded-full uppercase">Menunggu</span>',
            'rejected': '<span class="px-3 py-1 bg-error-container text-on-error-container text-xs font-bold rounded-full uppercase">Ditolak</span>',
        };
        statusWrap.innerHTML = statusMap[data.status] || '';

        // Catatan reject
        const rejectWrap = document.getElementById('sd-reject-wrap');
        if (data.status === 'rejected' && data.catatan_reject) {
            document.getElementById('sd-catatan-reject').textContent = data.catatan_reject;
            rejectWrap.classList.remove('hidden');
        } else {
            rejectWrap.classList.add('hidden');
        }

        // Link
        const linkWrap = document.getElementById('sd-link-wrap');
        if (data.link_sertifikat) {
            document.getElementById('sd-link').href = data.link_sertifikat;
            document.getElementById('sd-link-text').textContent = data.link_sertifikat;
            linkWrap.classList.remove('hidden');
        } else {
            linkWrap.classList.add('hidden');
        }

        openModal('modal-sertifikat-detail');
    }
</script>
@endpush

</x-layouts.app-mahasiswa>