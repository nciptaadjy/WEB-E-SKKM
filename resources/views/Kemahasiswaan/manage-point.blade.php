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
    <section class="border-b border-outline-variant/30 -mt-2">
        <div class="flex gap-4 sm:gap-8 px-1 overflow-x-auto whitespace-nowrap no-scrollbar">
            @foreach($bidangs as $bidang)
            <a href="{{ "/kemahasiswaan/manage-point/".$bidang->nama_bidang }}" class="{{ "/kemahasiswaan/manage-point/".$bidang->nama_bidang == "/".str_replace("%20"," ",Request::path())? "pb-3 text-sm font-bold text-primary border-b-2 border-primary font-headline" : "pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline"}}">{{ $bidang->nama_bidang }}</a>
            <!-- <a href="{{ route('panduan.tentang-skkm') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Tentang E-SKKM</a>
            <a href="{{ route('panduan.bobot-skkm') }}" class="pb-3 text-sm font-semibold text-outline hover:text-primary transition-colors font-headline">Bobot SKKM</a> -->
            @endforeach
        </div>
    </section>
    @foreach($bidangs as $bidang)
    @if("/kemahasiswaan/manage-point/".$bidang->nama_bidang == "/".str_replace("%20"," ",Request::path()))
    <div class="flex items-center justify-between cursor-pointer hover:bg-surface-container-low/30 transition-colors">
        <div class="flex items-center gap-3 min-w-0">
            <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-primary text-xl">category</span>
            </div>
            <div class="min-w-0">
                <p class="text-base sm:text-lg font-bold text-on-surface font-headline">{{ $bidang->subKegiatans->count() }} sub kegiatan
                    @if($bidang->is_wajib)
                    <span class="ml-1 px-1.5 py-0.5 bg-error/10 text-error text-[9px] font-bold rounded uppercase">Wajib</span>
                    @endif
                </p>
            </div>
        </div>
    </div>

    <div class="border-t border-outline-variant/10">
        <div class="bg-surface-container-low/20 border-b border-outline-variant/10">
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
        <div class="py-3 bg-surface-container-low/10 border-b border-outline-variant/5">
            <button onclick="openAddSub({{ $bidang->id }}, '{{ addslashes($bidang->nama_bidang) }}')"
                class="inline-flex items-center gap-1.5 text-xs text-primary font-bold hover:underline">
                <span class="material-symbols-outlined text-sm">add</span> Tambah Sub Kegiatan
            </button>
        </div>

        {{-- Sub Kegiatan & Bobot --}}

        @foreach($bidang->subKegiatans as $sub)
        <div class="py-4 border-b border-outline-variant/5 last:border-0">
            {{-- Sub Kegiatan Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3" onclick="this.nextElementSibling.classList.toggle('hidden')">
                <p class="text-sm font-bold text-on-surface break-words">{{ $sub->nama_sub }}</p>
                <div class="flex items-center gap-2 shrink-0">
                    <button onclick="openEditSub({{ $sub->id }}, '{{ addslashes($sub->nama_sub) }}', {{ $sub->has_tingkat ? 'true' : 'false' }})"
                        class="px-2 py-1 text-[10px] font-bold text-primary bg-primary/10 rounded hover:bg-primary/20 transition-colors">Edit</button>
                    <form action="{{ route('kemahasiswaan.sub.delete', $sub) }}" method="POST" class="inline" onsubmit="return confirm('Hapus sub kegiatan ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-2 py-1 text-[10px] font-bold text-error bg-error/10 rounded hover:bg-error/20 transition-colors">Hapus</button>
                    </form>
                    <span class="material-symbols-outlined text-outline transition-transform shrink-0">expand_more</span>
                </div>
            </div>
            
            <div class="hidden">
                @foreach($sub->kedudukans as $kedudukan)
                <div class="ml-2 sm:ml-4 mb-3 p-3 border border-outline-variant/10 rounded-lg bg-white/50">
                    <div class="flex items-center justify-between gap-2 mb-2">
                        <p class="text-xs font-semibold text-on-surface-variant break-words flex-1">{{ $kedudukan->nama_kedudukan }}</p>
                        <div class="flex items-center gap-1 shrink-0">
                            <button onclick="openEditKedudukan({{ $kedudukan->id }}, '{{ addslashes($kedudukan->nama_kedudukan) }}')" class="px-2 py-1 text-[10px] font-bold text-primary bg-primary/10 rounded hover:bg-primary/20 transition-colors">Edit</button>
                            <form action="{{ route('kemahasiswaan.kedudukan.delete', $kedudukan) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kedudukan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-2 py-1 text-[10px] font-bold text-error bg-error/10 rounded hover:bg-error/20 transition-colors">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($kedudukan->bobotSkkms as $bobot)
                        <form action="{{ route('kemahasiswaan.bobot.update', $bobot) }}" method="POST" class="flex items-center gap-2 bg-surface-container-low rounded-lg p-2.5">
                            @csrf
                            <span class="w-[50%] text-[10px] font-bold text-on-surface-variant uppercase shrink-0 min-w-[60px] break-words leading-tight">{{ str_replace('_', ' ', $bobot->tingkat) }}</span>
                            <input type="number" name="bobot" value="{{ $bobot->bobot }}" step="0.5" min="0" max="100"
                                class="w-[50%] px-2 py-1.5 bg-white border border-outline-variant/30 rounded text-xs text-center font-bold focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                            <button type="submit" class="p-1.5 rounded hover:bg-primary/10 transition-colors shrink-0" title="Simpan">
                                <span class="material-symbols-outlined text-primary text-sm">check</span>
                            </button>
                        </form>
                        @endforeach
                    </div>
                </div>
                @endforeach
                <button onclick="openAddKedudukan({{ $sub->id }}, '{{ addslashes($sub->nama_sub) }}')"
                    class="inline-flex items-center gap-1.5 text-xs text-primary font-bold hover:underline">
                    <span class="material-symbols-outlined text-sm">add</span> Tambah Kedudukan
                </button>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    @endforeach

    @if($bidangs->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-12 text-center">
        <span class="material-symbols-outlined text-5xl text-outline/20 mb-3 block">tune</span>
        <p class="font-bold text-on-surface-variant">Belum ada konfigurasi bidang kegiatan.</p>
        <p class="text-sm text-on-surface-variant mt-1">Klik "Tambah Bidang" untuk mulai menambahkan.</p>
    </div>
    @endif

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

    function openAddKedudukan(subId, subNama) {
        document.getElementById('add-kedudukan-sub-id').value = subId;
        document.getElementById('add-kedudukan-sub-nama').textContent = subNama;
        openModal('modal-add-kedudukan');
    }

    function openEditKedudukan(kedudukanId, namaKedudukan) {
        document.getElementById('form-edit-kedudukan').action = '/kemahasiswaan/kedudukan/' + kedudukanId + '/update';
        document.getElementById('edit-kedudukan-nama').value = namaKedudukan;
        openModal('modal-edit-kedudukan');
    }
</script>
@endpush

{{-- Modal Add Kedudukan --}}
<div id="modal-add-kedudukan" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm" onclick="if(event.target===this)closeModal('modal-add-kedudukan')">
    <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
        <form method="POST" action="{{ route('kemahasiswaan.kedudukan.store') }}">
            @csrf
            <input type="hidden" name="sub_kegiatan_id" id="add-kedudukan-sub-id">
            <div class="p-5 sm:p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">add</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-extrabold font-headline text-on-surface">Tambah Kedudukan</h3>
                        <p class="text-xs text-on-surface-variant mt-0.5">di <span id="add-kedudukan-sub-nama" class="font-bold">-</span></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Kedudukan (Peran)</label>
                    <input type="text" name="nama_kedudukan" required
                        class="w-full px-4 py-3 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                        placeholder="Contoh: Ketua, Peserta, dll.">
                </div>
            </div>
            <div class="bg-surface-container-low p-4 flex gap-3 justify-end">
                <button type="button" onclick="closeModal('modal-add-kedudukan')"
                    class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">Tambah</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit Kedudukan --}}
<div id="modal-edit-kedudukan" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm" onclick="if(event.target===this)closeModal('modal-edit-kedudukan')">
    <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
        <form method="POST" id="form-edit-kedudukan" action="">
            @csrf
            <div class="p-5 sm:p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-2xl">edit</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-extrabold font-headline text-on-surface">Edit Kedudukan</h3>
                        <p class="text-xs text-on-surface-variant mt-0.5">Ubah nama kedudukan / peran.</p>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Kedudukan (Peran)</label>
                    <input type="text" name="nama_kedudukan" id="edit-kedudukan-nama" required
                        class="w-full px-4 py-3 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                        placeholder="Contoh: Ketua, Peserta, dll.">
                </div>
            </div>
            <div class="bg-surface-container-low p-4 flex gap-3 justify-end">
                <button type="button" onclick="closeModal('modal-edit-kedudukan')"
                    class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">Simpan</button>
            </div>
        </form>
    </div>
</div>

</x-layouts.app-admin>
