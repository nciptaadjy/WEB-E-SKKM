<x-layouts.app-admin :title="'Manage Point SKKM'" :role="'kemahasiswaan'" :activePage="'point'" :portalName="'E-SKKM'" :portalSub="'Kemahasiswaan'" :sidebarIcon="'school'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Konfigurasi Point SKKM</h2>
            <p class="text-sm text-on-surface-variant mt-1">Kelola bidang kegiatan, sub kegiatan, dan bobot point.</p>
        </div>
        <button onclick="openModal('modal-add-bidang')"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all shrink-0">
            <span class="material-symbols-outlined text-lg">add_circle</span>
            Tambah Bidang
        </button>
    </div>

    {{-- Bidang Kegiatan Accordion --}}
    @foreach($bidangs as $bidang)
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        <div class="px-5 sm:px-6 py-4 flex items-center justify-between cursor-pointer hover:bg-surface-container-low/30 transition-colors"
            onclick="this.nextElementSibling.classList.toggle('hidden')">
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-primary text-xl">category</span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-base sm:text-lg font-bold text-on-surface font-headline break-words">{{ $bidang->nama_bidang }}</h3>
                    <p class="text-xs text-on-surface-variant">{{ $bidang->subKegiatans->count() }} sub kegiatan
                        @if($bidang->is_wajib)
                        <span class="ml-1 px-1.5 py-0.5 bg-error/10 text-error text-[9px] font-bold rounded uppercase">Wajib</span>
                        @endif
                    </p>
                </div>
            </div>
            <span class="material-symbols-outlined text-outline transition-transform shrink-0">expand_more</span>
        </div>

        <div class="border-t border-outline-variant/10">
            <div class="px-5 sm:px-6 py-4 bg-surface-container-low/20 border-b border-outline-variant/10">
                <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3">
                    <form action="{{ route('kemahasiswaan.bidang.update', $bidang) }}" method="POST" class="flex flex-col sm:flex-row items-start sm:items-end gap-3 flex-1 w-full">
                        @csrf
                        <div class="flex-1 w-full sm:w-auto">
                            <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-1">Nama Bidang</label>
                            <input type="text" name="nama_bidang" value="{{ $bidang->nama_bidang }}"
                                class="w-full px-3 py-2 bg-white border border-outline-variant/30 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                        </div>
                        <div class="w-full sm:w-32">
                            <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-1">Wajib?</label>
                            <select name="is_wajib"
                                class="w-full px-3 py-2 bg-white border border-outline-variant/30 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                                <option value="0" {{ !$bidang->is_wajib ? 'selected' : '' }}>Pilihan</option>
                                <option value="1" {{ $bidang->is_wajib ? 'selected' : '' }}>Wajib</option>
                            </select>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-primary text-on-primary rounded-lg text-xs font-bold hover:opacity-90 transition-all shrink-0">Simpan</button>
                    </form>
                    <form action="{{ route('kemahasiswaan.bidang.delete', $bidang) }}" method="POST" class="shrink-0" onsubmit="return confirm('Hapus bidang {{ addslashes($bidang->nama_bidang) }}? Sub kegiatan terkait juga akan terhapus.')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-error/10 text-error rounded-lg text-xs font-bold hover:bg-error/20 transition-all">Hapus</button>
                    </form>
                </div>
            </div>

            {{-- Add Sub Kegiatan Button --}}
            <div class="px-5 sm:px-6 py-3 bg-surface-container-low/10 border-b border-outline-variant/5">
                <button onclick="openAddSub({{ $bidang->id }}, '{{ addslashes($bidang->nama_bidang) }}')"
                    class="inline-flex items-center gap-1.5 text-xs text-primary font-bold hover:underline">
                    <span class="material-symbols-outlined text-sm">add</span> Tambah Sub Kegiatan
                </button>
            </div>

            {{-- Sub Kegiatan & Bobot --}}
            @foreach($bidang->subKegiatans as $sub)
            <div class="px-5 sm:px-6 py-4 border-b border-outline-variant/5 last:border-0">
                {{-- Sub Kegiatan Header --}}
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                    <p class="text-sm font-bold text-on-surface break-words">{{ $sub->nama_sub }}</p>
                    <div class="flex items-center gap-2 shrink-0">
                        <button onclick="openEditSub({{ $sub->id }}, '{{ addslashes($sub->nama_sub) }}', {{ $sub->has_tingkat ? 'true' : 'false' }})"
                            class="px-2 py-1 text-[10px] font-bold text-primary bg-primary/10 rounded hover:bg-primary/20 transition-colors">Edit</button>
                        <form action="{{ route('kemahasiswaan.sub.delete', $sub) }}" method="POST" class="inline" onsubmit="return confirm('Hapus sub kegiatan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-2 py-1 text-[10px] font-bold text-error bg-error/10 rounded hover:bg-error/20 transition-colors">Hapus</button>
                        </form>
                    </div>
                </div>

                @foreach($sub->kedudukans as $kedudukan)
                <div class="ml-2 sm:ml-4 mb-3">
                    <p class="text-xs font-semibold text-on-surface-variant mb-2 break-words">{{ $kedudukan->nama_kedudukan }}</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">
                        @foreach($kedudukan->bobotSkkms as $bobot)
                        <form action="{{ route('kemahasiswaan.bobot.update', $bobot) }}" method="POST" class="flex items-center gap-2 bg-surface-container-low rounded-lg p-2.5">
                            @csrf
                            <span class="text-[10px] font-bold text-on-surface-variant uppercase shrink-0 min-w-[60px] break-words leading-tight">{{ str_replace('_', ' ', $bobot->tingkat) }}</span>
                            <input type="number" name="bobot" value="{{ $bobot->bobot }}" step="0.5" min="0" max="100"
                                class="w-16 px-2 py-1.5 bg-white border border-outline-variant/30 rounded text-xs text-center font-bold focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                            <button type="submit" class="p-1.5 rounded hover:bg-primary/10 transition-colors shrink-0" title="Simpan">
                                <span class="material-symbols-outlined text-primary text-sm">check</span>
                            </button>
                        </form>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

    @if($bidangs->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-12 text-center">
        <span class="material-symbols-outlined text-5xl text-outline/20 mb-3 block">tune</span>
        <p class="font-bold text-on-surface-variant">Belum ada konfigurasi bidang kegiatan.</p>
        <p class="text-sm text-on-surface-variant mt-1">Klik "Tambah Bidang" untuk mulai menambahkan.</p>
    </div>
    @endif

    {{-- Modal: Add Bidang --}}
    <div id="modal-add-bidang" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-add-bidang')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form action="{{ route('kemahasiswaan.bidang.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">category</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tambah Bidang Baru</h3>
                            <p class="text-xs text-on-surface-variant">Buat bidang kegiatan baru untuk SKKM.</p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Bidang <span class="text-error">*</span></label>
                        <input type="text" name="nama_bidang" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="Contoh: Penalaran dan Keilmuan">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Tipe</label>
                        <select name="is_wajib" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="0">Pilihan</option>
                            <option value="1">Wajib</option>
                        </select>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-add-bidang')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal: Add Sub Kegiatan --}}
    <div id="modal-add-sub" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-add-sub')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-add-sub" action="{{ route('kemahasiswaan.sub.store') }}" method="POST">
                @csrf
                <input type="hidden" name="bidang_kegiatan_id" id="add-sub-bidang-id">
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">add_circle</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tambah Sub Kegiatan</h3>
                            <p class="text-xs text-on-surface-variant">Untuk bidang: <strong id="add-sub-bidang-nama">-</strong></p>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Sub Kegiatan <span class="text-error">*</span></label>
                        <input type="text" name="nama_sub" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="Contoh: Seminar Nasional">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Memiliki Tingkat?</label>
                        <select name="has_tingkat" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="0">Tidak</option>
                            <option value="1">Ya (PT, Regional, Nasional, Internasional)</option>
                        </select>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-add-sub')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal: Edit Sub Kegiatan --}}
    <div id="modal-edit-sub" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-edit-sub')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-edit-sub" method="POST" action="">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">edit</span>
                        </div>
                        <h3 class="text-xl font-extrabold font-headline text-on-surface">Edit Sub Kegiatan</h3>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Sub Kegiatan</label>
                        <input type="text" name="nama_sub" id="edit-sub-nama" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Memiliki Tingkat?</label>
                        <select name="has_tingkat" id="edit-sub-tingkat" class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-edit-sub')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

@push('scripts')
<script>
    function openAddSub(bidangId, bidangNama) {
        document.getElementById('add-sub-bidang-id').value = bidangId;
        document.getElementById('add-sub-bidang-nama').textContent = bidangNama;
        openModal('modal-add-sub');
    }

    function openEditSub(subId, namaSub, hasTingkat) {
        document.getElementById('form-edit-sub').action = '/kemahasiswaan/sub-kegiatan/' + subId + '/update';
        document.getElementById('edit-sub-nama').value = namaSub;
        document.getElementById('edit-sub-tingkat').value = hasTingkat ? '1' : '0';
        openModal('modal-edit-sub');
    }
</script>
@endpush

</x-layouts.app-admin>
