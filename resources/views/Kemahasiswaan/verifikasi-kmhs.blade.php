<x-layouts.app-admin
    :title="'Verifikasi Akhir'"
    :role="'kemahasiswaan'"
    :activePage="'verifikasi'"
    :portalName="'Kemahasiswaan'"
    :portalSub="'Admin Portal'"
    :sidebarIcon="'admin_panel_settings'">

    {{-- Stats --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-6">
        <div class="p-4 md:p-6 rounded-xl bg-surface-container-lowest border border-outline-variant/10">
            <p class="text-xs font-semibold text-outline uppercase tracking-widest mb-1">Menunggu Verifikasi</p>
            <h3 class="text-2xl md:text-4xl font-bold text-primary font-headline">{{ $totalAntrean }}</h3>
        </div>
        <div class="p-4 md:p-6 rounded-xl bg-secondary-container/20 border border-secondary/10">
            <p class="text-xs font-semibold text-outline uppercase tracking-widest mb-1">Sudah Diverifikasi BEM</p>
            <h3 class="text-xl md:text-2xl font-bold text-secondary font-headline">{{ $totalAntrean }} <span class="text-sm font-medium text-on-surface-variant">Sertifikat</span></h3>
        </div>
        <div class="col-span-2 md:col-span-1 p-4 md:p-6 rounded-xl bg-primary text-on-primary shadow-xl shadow-primary/20">
            <p class="text-xs font-semibold opacity-80 uppercase tracking-widest mb-1">Status</p>
            <div class="flex items-center gap-2 mt-2">
                <span class="w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
                <h3 class="text-xl font-bold font-headline">Aktif</h3>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <section class="bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-sm">
        <div class="p-4 md:p-6 border-b border-outline-variant/5 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
            <h3 class="text-base md:text-lg font-bold font-headline">Antrean Verifikasi Akhir</h3>
            <span class="text-xs text-outline">Sertifikat yang sudah lolos verifikasi BEM</span>
        </div>

        {{-- Mobile: Card list --}}
        <div class="divide-y divide-outline-variant/5 md:hidden">
            @forelse($sertifikats as $sertifikat)
            <div class="p-4 space-y-3">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                        <p class="text-xs text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }}</p>
                    </div>
                    <span class="text-base font-bold text-primary font-headline shrink-0">{{ $sertifikat->bobot_snapshot }} Poin</span>
                </div>
                <p class="text-sm font-semibold text-on-surface">{{ $sertifikat->nama_kegiatan }}</p>
                <span class="px-3 py-1 bg-primary-fixed text-primary text-[10px] font-bold rounded-full uppercase inline-block">Verif BEM ✓</span>
                <div class="flex gap-2 pt-1">
                    <button onclick="openKmhsTolak({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}')"
                        class="flex-1 py-2 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-sm">cancel</span> Tolak
                    </button>
                    <button onclick="openKmhsSetujui({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}', {{ $sertifikat->bobot_snapshot }})"
                        class="flex-1 py-2 rounded-lg bg-secondary text-white text-xs font-bold hover:opacity-90 transition-all flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-sm">verified</span> Setujui
                    </button>
                </div>
            </div>
            @empty
            <div class="px-6 py-16 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-5xl text-outline/20 block mb-3">inbox</span>
                <p class="font-semibold text-sm">Tidak ada sertifikat yang menunggu verifikasi.</p>
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
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Verifikator BEM</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Poin</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @forelse($sertifikats as $sertifikat)
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-6 py-6">
                            <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                            <p class="text-xs text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }} — {{ $sertifikat->mahasiswa->prodi }}</p>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-sm font-semibold text-on-surface">{{ $sertifikat->nama_kegiatan }}</p>
                            <p class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mt-1">
                                {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                            </p>
                        </td>
                        <td class="px-6 py-6">
                            <p class="text-xs text-on-surface-variant">{{ $sertifikat->verifierBem?->nama_pengguna ?? '-' }}</p>
                        </td>
                        <td class="px-6 py-6">
                            <span class="text-lg font-bold text-primary font-headline">{{ $sertifikat->bobot_snapshot }}</span>
                            <span class="text-[10px] font-bold text-outline uppercase"> Poin</span>
                        </td>
                        <td class="px-6 py-6">
                            <div class="flex justify-end gap-2">
                                <button onclick="openKmhsTolak({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}')"
                                    class="px-4 py-2 rounded-lg border border-error text-error text-xs font-bold hover:bg-error-container transition-colors">Tolak</button>
                                <button onclick="openKmhsSetujui({{ $sertifikat->id }}, '{{ addslashes($sertifikat->nama_kegiatan) }}', {{ $sertifikat->bobot_snapshot }})"
                                    class="px-4 py-2 rounded-lg bg-secondary text-on-secondary text-xs font-bold hover:opacity-90 shadow-sm transition-all active:scale-95">Setujui</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-outline/30 mb-2">inbox</span>
                            <p class="font-semibold">Tidak ada sertifikat yang menunggu verifikasi.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($sertifikats->hasPages())
        <div class="p-4 md:p-6 bg-surface-container-low/30 border-t border-outline-variant/5">
            {{ $sertifikats->links() }}
        </div>
        @endif
    </section>

    {{-- Modal Setujui Kemahasiswaan --}}
    <div id="modal-kmhs-setujui"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-kmhs-setujui')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-kmhs-setujui" method="POST" action="">
                @csrf
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col items-center text-center mb-6">
                        <div class="w-16 h-16 rounded-2xl bg-secondary/10 flex items-center justify-center mb-3">
                            <span class="material-symbols-outlined text-secondary text-4xl" style="font-variation-settings:'FILL' 1">verified</span>
                        </div>
                        <h3 class="text-xl font-extrabold text-on-surface font-headline">Setujui Pengajuan?</h3>
                        <p class="text-sm text-on-surface-variant mt-1.5 max-w-xs">
                            Sertifikat <strong class="text-on-surface" id="ks-nama-kegiatan">-</strong>
                            akan disetujui dan poin akan ditambahkan.
                        </p>
                    </div>
                    <div class="mb-5">
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Poin SKKM</label>
                        <div class="flex items-center gap-3 p-3 bg-primary/5 rounded-xl border border-primary/15">
                            <div class="flex-1">
                                <p class="text-[10px] text-on-surface-variant mb-0.5">Poin Saat Ini</p>
                                <p class="text-lg font-bold text-primary font-headline" id="ks-bobot-asal">0</p>
                            </div>
                            <div class="w-px h-10 bg-outline-variant/20"></div>
                            <div class="flex-1">
                                <label for="ks-bobot-override" class="text-[10px] text-secondary font-bold mb-0.5 block">Poin Ditetapkan</label>
                                <input type="number" id="ks-bobot-override" name="bobot_override" step="0.5" min="0" max="100"
                                    class="w-full text-lg font-bold text-secondary font-headline bg-transparent border-0 border-b-2 border-secondary/30 focus:border-secondary focus:ring-0 p-0 pb-0.5 outline-none" value="0">
                            </div>
                        </div>
                        <p class="text-[10px] text-on-surface-variant mt-1.5 flex items-center gap-1">
                            <span class="material-symbols-outlined text-xs">info</span>
                            Ubah poin jika diperlukan setelah mengecek sertifikat.
                        </p>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-kmhs-setujui')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-secondary text-on-secondary font-bold text-sm shadow-lg shadow-secondary/20 hover:opacity-90 active:scale-95 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Ya, Setujui
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Tolak with catatan_reject --}}
    <div id="modal-kmhs-tolak"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-kmhs-tolak')">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-kmhs-tolak" method="POST" action="">
                @csrf
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
                        <p class="text-sm font-bold text-on-surface" id="kt-nama-kegiatan">-</p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                            Alasan Penolakan <span class="text-error">*</span>
                        </label>
                        <textarea id="kt-catatan" name="catatan_reject" rows="4" minlength="10" required
                            class="w-full p-4 text-sm bg-surface-container-low border border-outline-variant/30 rounded-xl focus:ring-2 focus:ring-error/20 focus:border-error transition-all resize-none outline-none"
                            placeholder="Contoh: Gambar sertifikat tidak terbaca jelas atau blur."></textarea>
                        <p class="text-[10px] text-on-surface-variant mt-1">Wajib diisi minimal 10 karakter.</p>
                    </div>
                </div>
                <div class="bg-surface-container-low p-4 flex gap-3 justify-end">
                    <button type="button" onclick="closeModal('modal-kmhs-tolak')"
                        class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-error text-on-error font-bold text-sm shadow-lg shadow-error/20 hover:opacity-90 active:scale-95 transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-base">cancel</span> Ya, Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>

@push('scripts')
<script>
    function openKmhsSetujui(id, namaKegiatan, bobot) {
        document.getElementById('ks-nama-kegiatan').textContent = namaKegiatan || '-';
        document.getElementById('ks-bobot-asal').textContent = (bobot || 0) + ' Poin';
        document.getElementById('ks-bobot-override').value = bobot || 0;
        document.getElementById('form-kmhs-setujui').action = "{{ url('kemahasiswaan/verifikasi') }}/" + id + "/approve";
        openModal('modal-kmhs-setujui');
    }

    function openKmhsTolak(id, namaKegiatan) {
        document.getElementById('kt-nama-kegiatan').textContent = namaKegiatan || '-';
        document.getElementById('form-kmhs-tolak').action = "{{ url('kemahasiswaan/verifikasi') }}/" + id + "/reject";
        document.getElementById('kt-catatan').value = '';
        openModal('modal-kmhs-tolak');
        setTimeout(() => document.getElementById('kt-catatan').focus(), 150);
    }

    document.getElementById('form-kmhs-tolak').addEventListener('submit', function(e) {
        const textarea = document.getElementById('kt-catatan');
        const val = textarea.value.trim();
        if (val.length < 10) {
            e.preventDefault();
            textarea.classList.add('border-error');
            textarea.focus();
            return;
        }
        textarea.value = val;
    });
</script>
@endpush

</x-layouts.app-admin>
