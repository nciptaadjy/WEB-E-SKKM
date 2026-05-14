<x-layouts.app-admin :title="'Batch Penomoran'" :role="'ormawa'" :activePage="'batch'" :portalName="'E-SKKM'" :portalSub="'Ormawa Portal'"
    :sidebarIcon="'groups'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Batch Penomoran Sertifikat</h2>
            <p class="text-sm text-on-surface-variant mt-1">Request penomoran sertifikat dan cek status approval.</p>
        </div>
        <button onclick="openModal('modal-request')"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
            <span class="material-symbols-outlined text-lg">add</span>
            Request Baru
        </button>
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
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-surface-container-low/50">
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Event</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Format Nomor
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Diproses Oleh
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant/5">
                        @foreach ($batches as $batch)
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-bold text-on-surface">{{ $batch->event->judul_event }}</p>
                                </td>
                                <td class="px-6 py-4 font-mono text-xs text-on-surface-variant">
                                    {{ $batch->format_nomor ?? 'Default' }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full
                                {{ $batch->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ($batch->status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                        {{ $batch->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-xs text-on-surface-variant">
                                    {{ $batch->created_at->format('d M Y H:i') }}</td>
                                <td class="px-6 py-4 text-xs text-on-surface-variant">
                                    {{ $batch->approver?->nama_pengguna ?? '-' }}
                                    @if ($batch->approved_at)
                                        <br><span
                                            class="text-[10px] text-outline">{{ $batch->approved_at->format('d M Y') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @if ($batch->catatan && $batch->status === 'rejected')
                                <tr>
                                    <td colspan="5" class="px-6 py-2 bg-error-container/10">
                                        <p class="text-xs text-error"><strong>Catatan:</strong> {{ $batch->catatan }}
                                        </p>
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

    {{-- Modal Request Batch --}}
    <div id="modal-request" class="hidden fixed inset-0 z-[1000] flex items-center justify-center p-4">
        <!-- Overlay Click to Close -->
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal('modal-request')"></div>

        <!-- Modal Box -->
        <div
            class="relative bg-white w-full sm:max-w-md rounded-2xl shadow-2xl flex flex-col max-h-[92vh] overflow-hidden border border-outline-variant/10">

            <form action="{{ route('ormawa.batch.store') }}" method="POST" class="flex flex-col overflow-hidden">
                @csrf

                {{-- Body: Scrollable Content --}}
                <div class="p-6 space-y-5 overflow-y-auto flex-1 custom-scrollbar">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary text-2xl">receipt_long</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Request Batch</h3>
                            <p class="text-xs text-on-surface-variant">Pilih event dan format nomor.</p>
                        </div>
                    </div>

                    <!-- Input Fields (Event, Format, Catatan) -->
                    <div>
                        <label
                            class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Event
                            <span class="text-error">*</span></label>
                        <select name="event_id" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm outline-none focus:border-primary">
                            <option value="">Pilih Event</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->judul_event }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label
                            class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Format
                            Nomor</label>
                        <input type="text" name="format_nomor" value="SKKM/{nomor}/{tahun}"
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm font-mono outline-none">
                    </div>

                    <div>
                        <label
                            class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Catatan</label>
                        <textarea name="catatan" rows="3"
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm resize-none outline-none"></textarea>
                    </div>
                </div>

                {{-- Footer: Fixed at bottom --}}
                <div class="p-4 bg-gray-50 border-t border-outline-variant/10 flex gap-3 shrink-0">
                    <button type="button" onclick="closeModal('modal-request')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-gray-100 transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:brightness-110 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">send</span> Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app-admin>
