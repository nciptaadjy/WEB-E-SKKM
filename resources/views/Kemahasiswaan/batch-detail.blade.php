<x-layouts.app-admin :title="'Review Batch #' . $batch->id" :role="'kemahasiswaan'" :activePage="'batch'" :portalName="'E-SKKM'" :portalSub="'Kemahasiswaan'" :sidebarIcon="'school'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('kemahasiswaan.batch') }}"
                class="w-9 h-9 rounded-xl bg-surface-container-low flex items-center justify-center hover:bg-surface-container transition-colors">
                <span class="material-symbols-outlined text-on-surface-variant text-lg">arrow_back</span>
            </a>
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Review Batch #{{ $batch->id }}</h2>
                <p class="text-sm text-on-surface-variant mt-1">{{ $batch->nama_event ?? ($batch->event?->judul_event ?? '-') }}</p>
            </div>
        </div>
        <div class="flex items-center gap-3 flex-wrap">
            @include('Ormawa._batch-status-badge', ['status' => $batch->status])
            @if($batch->status === 'generated')
            <a href="{{ route('kemahasiswaan.batch.download', $batch) }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-secondary text-on-secondary rounded-xl font-bold text-sm shadow-lg shadow-secondary/20 hover:opacity-90 transition-all">
                <span class="material-symbols-outlined text-lg">download</span>
                Download CSV
            </a>
            @endif
        </div>
    </div>

    {{-- Batch Info --}}
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
                <p class="text-[10px] text-on-surface-variant mb-0.5">Pemohon</p>
                <p class="text-sm font-semibold text-on-surface">{{ $batch->requester->nama_pengguna }}</p>
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
            <p class="text-[10px] text-on-surface-variant font-bold mb-0.5">Catatan dari Ormawa</p>
            <p class="text-sm text-on-surface">{{ $batch->catatan }}</p>
        </div>
        @endif

        <div class="mt-4 p-3 bg-surface-container-low rounded-xl">
            <p class="text-[10px] text-on-surface-variant font-bold mb-0.5">Tanggal Pengajuan</p>
            <p class="text-sm text-on-surface">{{ $batch->created_at->format('d M Y H:i') }}</p>
        </div>

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

    {{-- Action Buttons (for pending) --}}
    {{-- Action Buttons (for pending) --}}
    @if($batch->status === 'pending')
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-5 sm:p-6 mb-6">
        <div class="flex items-center gap-3 mb-4">
            <span class="material-symbols-outlined text-primary text-xl">gavel</span>
            <h3 class="text-lg font-extrabold font-headline text-on-surface">Keputusan & Penomoran</h3>
        </div>
        
        <form action="{{ route('kemahasiswaan.batch.approve', $batch) }}" method="POST">
            @csrf
            
            {{-- Konfigurasi Format --}}
            <div class="bg-white border border-[#e2e8f0] rounded-2xl p-6 shadow-[0_2px_10px_rgba(0,0,0,0.02)] mb-6">
                <div class="flex items-center gap-2.5 mb-6">
                    <span class="material-symbols-outlined text-[#00569e] text-[22px]">settings</span>
                    <h4 class="text-[15px] font-extrabold text-[#00569e] font-headline">Format Aktif</h4>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-bold text-[#64748b] uppercase tracking-widest mb-2.5">
                            Pola Penomoran (Pattern)
                        </label>
                        <div class="relative">
                            <input type="text" name="format_nomor" id="input-format" value="{{ old('format_nomor', '[NOMOR]/SKKM/UNIV/[TAHUN]') }}"
                                class="w-full pl-4 pr-10 py-3.5 bg-[#f4f7f9] border-none rounded-xl text-sm font-mono font-bold text-[#00569e] outline-none focus:ring-2 focus:ring-[#00569e]/20 transition-all"
                                oninput="updateFormatPreview()">
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-[#94a3b8] text-[18px] pointer-events-none">edit</span>
                        </div>
                        
                        <p class="text-[11px] text-[#64748b] italic mt-2.5">
                            Tersedia: 
                            <a href="javascript:void(0)" onclick="insertPlaceholder('[NOMOR]')" class="hover:text-[#00569e] transition-colors">[NOMOR]</a>, 
                            <a href="javascript:void(0)" onclick="insertPlaceholder('[BULAN_ROMAWI]')" class="hover:text-[#00569e] transition-colors">[BULAN_ROMAWI]</a>, 
                            <a href="javascript:void(0)" onclick="insertPlaceholder('[TAHUN]')" class="hover:text-[#00569e] transition-colors">[TAHUN]</a>, 
                            <a href="javascript:void(0)" onclick="insertPlaceholder('[KODE_UNIT]')" class="hover:text-[#00569e] transition-colors">[KODE_UNIT]</a>
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold text-[#64748b] uppercase tracking-widest mb-2.5">
                                Mulai Dari
                            </label>
                            <input type="number" name="start_number" id="start_number" value="1001" min="1"
                                class="w-full px-4 py-3.5 bg-[#f4f7f9] border-none rounded-xl text-sm font-bold text-[#00569e] outline-none focus:ring-2 focus:ring-[#00569e]/20 transition-colors"
                                oninput="updateFormatPreview()">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-[#64748b] uppercase tracking-widest mb-2.5">
                                Otomatis Tambah Poin
                            </label>
                            <div class="flex items-center gap-3 pt-2">
                                <label class="relative inline-flex items-center cursor-pointer">
                                  <input type="checkbox" name="add_points" value="1" class="sr-only peer" checked>
                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#00569e]"></div>
                                  <span class="ml-3 text-[13px] font-medium text-on-surface">Tambahkan poin ke akun mahasiswa setelah Generate</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-[#64748b] uppercase tracking-widest mb-2.5">
                            Pratinjau Hasil
                        </label>
                        <div class="w-full py-4 bg-[#e6f0ff] border border-dashed border-[#a0c4ff] rounded-xl flex items-center justify-center">
                            <p id="format-preview" class="text-[15px] font-mono font-bold text-[#003d7a]">—</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <button type="submit"
                    class="flex-1 py-3 rounded-xl bg-secondary text-on-secondary font-bold text-sm shadow-lg shadow-secondary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">verified</span>
                    Setujui & Generate Nomor
                </button>
                <button type="button" onclick="openModal('modal-revisi-detail')"
                    class="flex-1 py-3 rounded-xl bg-amber-100 text-amber-700 font-bold text-sm hover:bg-amber-200 transition-colors flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">edit_note</span>
                    Minta Revisi
                </button>
                <button type="button" onclick="openModal('modal-reject-detail')"
                    class="flex-1 py-3 rounded-xl border-2 border-error/30 text-error font-bold text-sm hover:bg-error/5 transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">cancel</span>
                    Tolak
                </button>
            </div>
        </form>
    </div>
    @endif

    {{-- Peserta Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        <div class="px-5 sm:px-6 py-4 border-b border-outline-variant/10">
            <h3 class="text-lg font-extrabold font-headline text-on-surface">Daftar Peserta</h3>
            <p class="text-xs text-on-surface-variant">{{ $batch->pesertaBatch->count() }} peserta terdaftar dalam batch ini</p>
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

    {{-- Modal: Revisi --}}
    @if($batch->status === 'pending')
    <div id="modal-revisi-detail" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-revisi-detail')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form action="{{ route('kemahasiswaan.batch.revisi', $batch) }}" method="POST">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-amber-700 text-2xl">edit_note</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Minta Revisi</h3>
                            <p class="text-xs text-on-surface-variant">Berikan catatan perbaikan untuk Ormawa.</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Catatan Revisi <span class="text-error">*</span></label>
                        <textarea name="catatan_revisi" rows="4" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none resize-none"
                            placeholder="Contoh: NIM baris 5 salah, mohon diperbaiki. Nama peserta baris 8 perlu dikoreksi."></textarea>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-revisi-detail')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-amber-600 text-white font-bold text-sm shadow-lg shadow-amber-600/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">edit_note</span> Kirim Revisi
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal: Reject --}}
    <div id="modal-reject-detail" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-reject-detail')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form action="{{ route('kemahasiswaan.batch.reject', $batch) }}" method="POST">
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
                    <button type="button" onclick="closeModal('modal-reject-detail')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-error text-on-error font-bold text-sm shadow-lg shadow-error/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">cancel</span> Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

    @push('scripts')
    <script>
        // ── Format Preview ──
        function updateFormatPreview() {
            const formatInput = document.getElementById('input-format');
            const previewEl = document.getElementById('format-preview');
            const startNumberInput = document.getElementById('start_number');
            
            if(!formatInput || !previewEl) return;
            
            const format = formatInput.value;
            const startNumber = startNumberInput ? startNumberInput.value : '1001';
            const now = new Date();
            const romawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
            
            const preview = format
                .replace('[NOMOR]', startNumber)
                .replace('[BULAN_ROMAWI]', romawi[now.getMonth()])
                .replace('[TAHUN]', now.getFullYear())
                .replace('[KODE_UNIT]', 'KMHS'); // Example code
                
            previewEl.textContent = preview;
        }
        
        // Initial preview load
        document.addEventListener('DOMContentLoaded', updateFormatPreview);

        // ── Insert Placeholder ──
        function insertPlaceholder(placeholder) {
            const input = document.getElementById('input-format');
            if(!input) return;
            
            const startPos = input.selectionStart;
            const endPos = input.selectionEnd;
            const text = input.value;
            
            // Insert text at cursor position
            input.value = text.substring(0, startPos) + placeholder + text.substring(endPos);
            input.focus();
            
            // Move cursor after the inserted placeholder
            const newPos = startPos + placeholder.length;
            input.setSelectionRange(newPos, newPos);
            
            // Update the preview immediately
            updateFormatPreview();
        }
    </script>
    @endpush

</x-layouts.app-admin>
