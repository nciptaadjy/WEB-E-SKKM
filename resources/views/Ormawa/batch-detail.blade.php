<x-layouts.app-admin :title="'Detail Batch #' . $batch->id" :role="'ormawa'" :activePage="'batch'" :portalName="'E-SKKM'"
    :portalSub="'Ormawa Portal'" :sidebarIcon="'groups'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('ormawa.batch') }}"
                class="w-9 h-9 rounded-xl bg-surface-container-low flex items-center justify-center hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-on-surface-variant text-lg">arrow_back</span>
            </a>
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Detail Batch #{{ $batch->id }}</h2>
                <p class="text-sm text-on-surface-variant mt-1">{{ $batch->nama_event ?? ($batch->event?->judul_event ?? '-') }}</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            @include('Ormawa._batch-status-badge', ['status' => $batch->status])
            @if($batch->status === 'generated')
            <a href="{{ route('ormawa.batch.download', $batch) }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-secondary text-on-secondary rounded-xl font-bold text-sm shadow-lg shadow-secondary/20 hover:opacity-90 transition-all">
                <span class="material-symbols-outlined text-lg">download</span>
                Download CSV
            </a>
            @endif
        </div>
    </div>

    {{-- Batch Info Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-5 sm:p-6">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="p-3 bg-surface-container-low rounded-xl">
                <p class="text-[10px] text-on-surface-variant mb-0.5">Nama Event</p>
                <p class="text-sm font-semibold text-on-surface">{{ $batch->nama_event ?? '-' }}</p>
            </div>
            <div class="p-3 bg-surface-container-low rounded-xl">
                <p class="text-[10px] text-on-surface-variant mb-0.5">Kategori</p>
                <p class="text-sm font-semibold text-on-surface">{{ $batch->kategori_event ?? '-' }}</p>
            </div>
            <div class="p-3 bg-surface-container-low rounded-xl">
                <p class="text-[10px] text-on-surface-variant mb-0.5">Total Peserta</p>
                <p class="text-sm font-semibold text-primary">{{ $batch->pesertaBatch->count() }}</p>
            </div>
            <div class="p-3 bg-surface-container-low rounded-xl">
                <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal Pengajuan</p>
                <p class="text-sm font-semibold text-on-surface">{{ $batch->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        @if($batch->format_nomor)
        <div class="mt-4 p-3 bg-primary/5 border border-primary/15 rounded-xl">
            <p class="text-[10px] text-primary font-bold mb-0.5">Format Nomor Sertifikat</p>
            <p class="text-sm font-mono font-bold text-primary">{{ $batch->format_nomor }}</p>
        </div>
        @endif

        @if($batch->catatan)
        <div class="mt-4 p-3 bg-surface-container-low rounded-xl">
            <p class="text-[10px] text-on-surface-variant font-bold mb-0.5">Catatan</p>
            <p class="text-sm text-on-surface">{{ $batch->catatan }}</p>
        </div>
        @endif

        @if($batch->approver)
        <div class="mt-4 p-3 bg-surface-container-low rounded-xl">
            <p class="text-[10px] text-on-surface-variant font-bold mb-0.5">Diproses Oleh</p>
            <p class="text-sm text-on-surface">{{ $batch->approver->nama_pengguna }}
                @if($batch->approved_at)
                <span class="text-xs text-outline">— {{ $batch->approved_at->format('d M Y H:i') }}</span>
                @endif
            </p>
        </div>
        @endif
    </div>

    {{-- Revision Notice --}}
    @if($batch->status === 'revision' && $batch->catatan_revisi)
    <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5 flex items-start gap-3">
        <span class="material-symbols-outlined text-amber-600 text-xl mt-0.5">edit_note</span>
        <div class="flex-1">
            <p class="font-bold text-amber-800 text-sm">Perlu Revisi</p>
            <p class="text-sm text-amber-700 mt-1">{{ $batch->catatan_revisi }}</p>
            <button onclick="openModal('modal-edit-batch')"
                class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-amber-600 text-white rounded-xl font-bold text-xs hover:bg-amber-700 transition-colors">
                <span class="material-symbols-outlined text-sm">edit</span>
                Edit & Kirim Ulang
            </button>
        </div>
    </div>
    @endif

    {{-- Peserta Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        <div class="px-5 sm:px-6 py-4 border-b border-outline-variant/10 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-extrabold font-headline text-on-surface">Daftar Peserta</h3>
                <p class="text-xs text-on-surface-variant">{{ $batch->pesertaBatch->count() }} peserta terdaftar</p>
            </div>
        </div>

        {{-- Mobile Cards --}}
        <div class="md:hidden divide-y divide-outline-variant/5">
            @foreach($batch->pesertaBatch as $i => $peserta)
            <div class="p-4">
                <div class="flex items-center justify-between mb-1">
                    <p class="font-bold text-on-surface text-sm">{{ $peserta->nama }}</p>
                    <span class="px-2 py-0.5 text-[10px] font-bold uppercase rounded-full
                        {{ $peserta->tipe === 'mahasiswa' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">{{ $peserta->tipe }}</span>
                </div>
                <p class="text-xs text-on-surface-variant font-mono">{{ $peserta->identifier }}</p>
                @if($peserta->nomor_sertifikat)
                <div class="mt-2 p-2 bg-primary/5 rounded-lg">
                    <p class="text-[10px] text-primary font-bold">Nomor Sertifikat</p>
                    <p class="text-xs font-mono font-bold text-primary">{{ $peserta->nomor_sertifikat }}</p>
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
                        <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider w-12">#</th>
                        <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">NIM/ID/NIK</th>
                        <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">Nomor Sertifikat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @foreach($batch->pesertaBatch as $i => $peserta)
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-6 py-3 text-xs text-outline">{{ $i + 1 }}</td>
                        <td class="px-6 py-3 font-mono text-xs">{{ $peserta->identifier }}</td>
                        <td class="px-6 py-3 font-semibold text-on-surface">{{ $peserta->nama }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-0.5 text-[10px] font-bold uppercase rounded-full
                                {{ $peserta->tipe === 'mahasiswa' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">{{ $peserta->tipe }}</span>
                        </td>
                        <td class="px-6 py-3">
                            @if($peserta->nomor_sertifikat)
                            <span class="font-mono text-xs font-bold text-primary bg-primary/5 px-2.5 py-1 rounded-lg">{{ $peserta->nomor_sertifikat }}</span>
                            @else
                            <span class="text-xs text-outline">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal: Edit Batch (for revision) --}}
    @if($batch->status === 'revision')
    <div id="modal-edit-batch" class="modal-wrap hidden fixed inset-0 z-[100] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-edit-batch')">
        <div class="modal-box bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[92vh] flex flex-col">
            <form action="{{ route('ormawa.batch.update', $batch) }}" method="POST" class="flex flex-col overflow-hidden">
                @csrf
                @method('PUT')

                <div class="px-6 py-4 border-b border-outline-variant/10 flex items-center gap-3 shrink-0">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-amber-700 text-xl">edit_note</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-extrabold font-headline text-on-surface">Edit & Kirim Ulang</h3>
                        <p class="text-xs text-on-surface-variant">Perbaiki data sesuai catatan revisi.</p>
                    </div>
                </div>

                <div class="overflow-y-auto flex-1 p-6 space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Event <span class="text-error">*</span></label>
                            <input type="text" name="nama_event" required value="{{ $batch->nama_event }}"
                                class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm outline-none focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Kategori</label>
                            <input type="text" name="kategori_event" value="{{ $batch->kategori_event }}"
                                class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm outline-none focus:border-primary">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Format Nomor</label>
                        <input type="text" name="format_nomor" value="{{ $batch->format_nomor }}"
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm font-mono outline-none focus:border-primary">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Catatan</label>
                        <textarea name="catatan" rows="2"
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm resize-none outline-none focus:border-primary">{{ $batch->catatan }}</textarea>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-[11px] font-bold text-on-surface-variant uppercase tracking-widest">Data Peserta</label>
                            <button type="button" onclick="addEditRow()"
                                class="inline-flex items-center gap-1 px-3 py-1.5 bg-primary/10 text-primary rounded-lg text-xs font-bold hover:bg-primary/20 transition-colors">
                                <span class="material-symbols-outlined text-sm">add</span>Tambah
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-surface-container-low/50">
                                        <th class="px-3 py-2 text-xs font-bold text-outline uppercase text-left w-10">#</th>
                                        <th class="px-3 py-2 text-xs font-bold text-outline uppercase text-left">NIM/ID/NIK</th>
                                        <th class="px-3 py-2 text-xs font-bold text-outline uppercase text-left">Nama</th>
                                        <th class="px-3 py-2 text-xs font-bold text-outline uppercase text-center w-14">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody id="edit-peserta-body">
                                    @foreach($batch->pesertaBatch as $i => $peserta)
                                    <tr class="edit-row border-b border-outline-variant/5">
                                        <td class="px-3 py-2 text-xs text-outline edit-row-num">{{ $i + 1 }}</td>
                                        <td class="px-3 py-2">
                                            <input type="text" name="peserta[{{ $i }}][identifier]" required value="{{ $peserta->identifier }}"
                                                class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary">
                                        </td>
                                        <td class="px-3 py-2">
                                            <input type="text" name="peserta[{{ $i }}][nama]" required value="{{ $peserta->nama }}"
                                                class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary">
                                        </td>
                                        <td class="px-3 py-2 text-center">
                                            <button type="button" onclick="removeEditRow(this)"
                                                class="w-7 h-7 rounded-lg bg-error/10 text-error hover:bg-error/20 transition-colors inline-flex items-center justify-center">
                                                <span class="material-symbols-outlined text-sm">close</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-gray-50 border-t border-outline-variant/10 flex gap-3 shrink-0">
                    <button type="button" onclick="closeModal('modal-edit-batch')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-gray-100 transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:brightness-110 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">send</span>Kirim Ulang
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

@push('scripts')
<script>
    let editRowIdx = {{ $batch->pesertaBatch->count() }};

    function addEditRow() {
        const tbody = document.getElementById('edit-peserta-body');
        const row = document.createElement('tr');
        row.className = 'edit-row border-b border-outline-variant/5';
        row.innerHTML = `
            <td class="px-3 py-2 text-xs text-outline edit-row-num">${tbody.children.length + 1}</td>
            <td class="px-3 py-2">
                <input type="text" name="peserta[${editRowIdx}][identifier]" required
                    class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary">
            </td>
            <td class="px-3 py-2">
                <input type="text" name="peserta[${editRowIdx}][nama]" required
                    class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary">
            </td>
            <td class="px-3 py-2 text-center">
                <button type="button" onclick="removeEditRow(this)"
                    class="w-7 h-7 rounded-lg bg-error/10 text-error hover:bg-error/20 transition-colors inline-flex items-center justify-center">
                    <span class="material-symbols-outlined text-sm">close</span>
                </button>
            </td>
        `;
        tbody.appendChild(row);
        editRowIdx++;
    }

    function removeEditRow(btn) {
        const tbody = document.getElementById('edit-peserta-body');
        if (tbody.children.length <= 1) return;
        btn.closest('tr').remove();
        document.querySelectorAll('.edit-row .edit-row-num').forEach((el, i) => el.textContent = i + 1);
    }
</script>
@endpush

</x-layouts.app-admin>
