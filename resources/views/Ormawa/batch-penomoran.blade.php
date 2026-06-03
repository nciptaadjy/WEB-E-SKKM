<x-layouts.app-admin :title="'Batch Penomoran'" :role="'ormawa'" :activePage="'batch'" :portalName="'E-SKKM'" :portalSub="'Ormawa Portal'"
    :sidebarIcon="'groups'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Batch Penomoran Sertifikat</h2>
            <p class="text-sm text-on-surface-variant mt-1">Request penomoran sertifikat dan cek status approval.</p>
        </div>
        <a href="{{ route('ormawa.batch.create') }}"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
            <span class="material-symbols-outlined text-lg">add</span>
            Request Baru
        </a>
    </div>

    {{-- Batches List --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        @if ($batches->isEmpty())
            <div class="p-12 text-center">
                <span class="material-symbols-outlined text-5xl text-outline/20 mb-3 block">receipt_long</span>
                <p class="font-bold text-on-surface-variant">Belum ada batch penomoran.</p>
                <p class="text-sm text-outline mt-1">Buat request baru untuk memulai.</p>
            </div>
        @else
            {{-- Mobile Cards --}}
            <div class="md:hidden divide-y divide-outline-variant/5">
                @foreach ($batches as $batch)
                <div class="p-4 space-y-3">
                    <div class="flex items-start justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="font-bold text-on-surface text-sm">{{ $batch->nama_event ?? ($batch->event?->judul_event ?? '-') }}</p>
                            @if($batch->kategori_event)
                            <p class="text-xs text-on-surface-variant">{{ $batch->kategori_event }}</p>
                            @endif
                            <p class="text-xs text-outline mt-1">{{ $batch->created_at->format('d M Y H:i') }}</p>
                        </div>
                        @include('Ormawa._batch-status-badge', ['status' => $batch->status])
                    </div>
                    <div class="flex items-center gap-3 text-xs text-on-surface-variant">
                        <span><strong>{{ $batch->peserta_batch_count ?? $batch->total_peserta }}</strong> peserta</span>
                        <span class="text-outline">•</span>
                        <span class="font-mono">{{ $batch->format_nomor ? \Illuminate\Support\Str::limit($batch->format_nomor, 20) : 'Default' }}</span>
                    </div>

                    @if($batch->status === 'revision' && $batch->catatan_revisi)
                    <div class="p-2.5 bg-amber-50 border border-amber-200 rounded-lg">
                        <p class="text-xs text-amber-700"><strong>Catatan Revisi:</strong> {{ $batch->catatan_revisi }}</p>
                    </div>
                    @endif

                    @if($batch->catatan && $batch->status === 'rejected')
                    <div class="p-2.5 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-xs text-red-700"><strong>Catatan:</strong> {{ $batch->catatan }}</p>
                    </div>
                    @endif

                    <div class="flex gap-2 pt-1">
                        <a href="{{ route('ormawa.batch.show', $batch) }}"
                            class="flex-1 py-2 rounded-lg bg-primary/10 text-primary text-xs font-bold text-center hover:bg-primary/20 transition-colors">Detail</a>
                        @if($batch->status === 'generated')
                        <a href="{{ route('ormawa.batch.download', $batch) }}"
                            class="flex-1 py-2 rounded-lg bg-secondary/10 text-secondary text-xs font-bold text-center hover:bg-secondary/20 transition-colors">Download</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Desktop Table --}}
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Event</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Peserta</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Format Nomor</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/5">
                        @foreach ($batches as $batch)
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-bold text-on-surface">{{ $batch->nama_event ?? ($batch->event?->judul_event ?? '-') }}</p>
                                    @if($batch->kategori_event)
                                    <p class="text-xs text-on-surface-variant">{{ $batch->kategori_event }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-primary">
                                    {{ $batch->peserta_batch_count ?? $batch->total_peserta }}
                                </td>
                                <td class="px-6 py-4 font-mono text-xs text-on-surface-variant">
                                    {{ $batch->format_nomor ?? 'Default' }}
                                </td>
                                <td class="px-6 py-4">
                                    @include('Ormawa._batch-status-badge', ['status' => $batch->status])
                                </td>
                                <td class="px-6 py-4 text-xs text-on-surface-variant">
                                    {{ $batch->created_at->format('d M Y H:i') }}
                                    @if ($batch->approver)
                                    <br><span class="text-[10px] text-outline">{{ $batch->approver->nama_pengguna }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('ormawa.batch.show', $batch) }}"
                                            class="px-3 py-1.5 rounded-lg bg-primary/10 text-primary text-xs font-bold hover:bg-primary/20 transition-colors">Detail</a>
                                        @if($batch->status === 'generated')
                                        <a href="{{ route('ormawa.batch.download', $batch) }}"
                                            class="px-3 py-1.5 rounded-lg bg-secondary/10 text-secondary text-xs font-bold hover:bg-secondary/20 transition-colors inline-flex items-center gap-1">
                                            <span class="material-symbols-outlined text-xs">download</span>
                                            CSV
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @if($batch->status === 'revision' && $batch->catatan_revisi)
                            <tr>
                                <td colspan="6" class="px-6 py-2 bg-amber-50/50">
                                    <p class="text-xs text-amber-700"><strong>Catatan Revisi:</strong> {{ $batch->catatan_revisi }}</p>
                                </td>
                            </tr>
                            @endif
                            @if($batch->catatan && $batch->status === 'rejected')
                            <tr>
                                <td colspan="6" class="px-6 py-2 bg-error-container/10">
                                    <p class="text-xs text-error"><strong>Catatan:</strong> {{ $batch->catatan }}</p>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-outline-variant/5">{{ $batches->links() }}</div>
        @endif
    </div>

</x-layouts.app-admin>
