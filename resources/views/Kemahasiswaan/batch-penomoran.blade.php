<x-layouts.app-admin :title="'Batch Penomoran'" :role="'kemahasiswaan'" :activePage="'batch'" :portalName="'E-SKKM'" :portalSub="'Kemahasiswaan'" :sidebarIcon="'school'">

    {{-- Page Header --}}
    <div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Batch Penomoran Sertifikat</h2>
        <p class="text-sm text-on-surface-variant mt-1">Tinjau dan setujui request penomoran sertifikat dari Ormawa.</p>
    </div>

    {{-- Batches Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        @if($batches->isEmpty())
        <div class="p-12 text-center">
            <span class="material-symbols-outlined text-5xl text-outline/20 mb-3 block">receipt_long</span>
            <p class="font-bold text-on-surface-variant">Belum ada request batch penomoran.</p>
        </div>
        @else

        {{-- Mobile Cards --}}
        <div class="md:hidden divide-y divide-outline-variant/5">
            @foreach($batches as $batch)
            <div class="p-4 space-y-3">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-bold text-on-surface text-sm">{{ $batch->event->judul_event }}</p>
                        <p class="text-xs text-on-surface-variant">Dari: {{ $batch->requester->nama_pengguna }}</p>
                        <p class="text-xs text-outline mt-1">{{ $batch->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full shrink-0
                        {{ $batch->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ($batch->status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                        {{ $batch->status }}
                    </span>
                </div>
                @if($batch->format_nomor)
                <p class="text-xs font-mono text-on-surface-variant bg-surface-container-low px-3 py-1.5 rounded-lg">Format: {{ $batch->format_nomor }}</p>
                @endif
                <p class="text-xs text-on-surface-variant"><strong>Peserta:</strong> {{ $batch->event->pesertaEvents->count() }} orang</p>
                @if($batch->status === 'pending')
                <div class="flex gap-2 pt-1">
                    <form action="{{ route('kemahasiswaan.batch.approve', $batch) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full py-2 rounded-lg bg-secondary text-white text-xs font-bold hover:opacity-90 transition-all">Setujui</button>
                    </form>
                    <button onclick="openRejectBatch({{ $batch->id }})"
                        class="flex-1 py-2 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors">Tolak</button>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Desktop Table --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Event</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Pemohon</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Peserta</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Format</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @foreach($batches as $batch)
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-on-surface">{{ $batch->event->judul_event }}</p>
                            <p class="text-xs text-outline">{{ $batch->created_at->format('d M Y') }}</p>
                        </td>
                        <td class="px-6 py-4 text-on-surface-variant text-sm">{{ $batch->requester->nama_pengguna }}</td>
                        <td class="px-6 py-4 text-center font-bold text-primary">{{ $batch->event->pesertaEvents->count() }}</td>
                        <td class="px-6 py-4 font-mono text-xs text-on-surface-variant">{{ $batch->format_nomor ?? 'Default' }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full
                                {{ $batch->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ($batch->status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                {{ $batch->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($batch->status === 'pending')
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('kemahasiswaan.batch.approve', $batch) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-secondary text-white text-xs font-bold hover:opacity-90 shadow-sm transition-all">Setujui</button>
                                </form>
                                <button onclick="openRejectBatch({{ $batch->id }})"
                                    class="px-3 py-1.5 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors">Tolak</button>
                            </div>
                            @else
                            <p class="text-right text-xs text-outline">{{ $batch->approver?->nama_pengguna ?? '-' }}</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-outline-variant/5">{{ $batches->links() }}</div>
        @endif
    </div>

    {{-- Modal: Reject Batch --}}
    <div id="modal-reject-batch" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-reject-batch" method="POST" action="">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-error/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-error text-2xl">cancel</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tolak Batch</h3>
                            <p class="text-xs text-on-surface-variant">Berikan alasan penolakan.</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Catatan</label>
                        <textarea name="catatan" rows="3"
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-error/20 focus:border-error transition-all outline-none resize-none"
                            placeholder="Alasan penolakan..."></textarea>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-reject-batch')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-error text-on-error font-bold text-sm shadow-lg shadow-error/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">cancel</span> Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>

@push('scripts')
<script>
    function openRejectBatch(batchId) {
        document.getElementById('form-reject-batch').action = '/kemahasiswaan/batch-penomoran/' + batchId + '/reject';
        openModal('modal-reject-batch');
    }
</script>
@endpush

</x-layouts.app-admin>
