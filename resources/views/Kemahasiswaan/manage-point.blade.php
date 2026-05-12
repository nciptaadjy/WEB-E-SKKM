<x-layouts.app-admin :title="'Manage Point SKKM'" :role="'kemahasiswaan'" :activePage="'point'" :portalName="'E-SKKM'" :portalSub="'Kemahasiswaan'" :sidebarIcon="'school'">

    {{-- Page Header --}}
    <div>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Konfigurasi Point SKKM</h2>
        <p class="text-sm text-on-surface-variant mt-1">Kelola bidang kegiatan, sub kegiatan, dan bobot point.</p>
    </div>

    {{-- Bidang Kegiatan Accordion --}}
    @foreach($bidangs as $bidang)
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        <div class="px-5 sm:px-6 py-4 flex items-center justify-between cursor-pointer hover:bg-surface-container-low/30 transition-colors"
            onclick="this.nextElementSibling.classList.toggle('hidden')">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-xl">category</span>
                </div>
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-on-surface font-headline">{{ $bidang->nama_bidang }}</h3>
                    <p class="text-xs text-on-surface-variant">{{ $bidang->subKegiatans->count() }} sub kegiatan</p>
                </div>
            </div>
            <span class="material-symbols-outlined text-outline transition-transform">expand_more</span>
        </div>

        <div class="border-t border-outline-variant/10">
            {{-- Bidang Edit --}}
            <div class="px-5 sm:px-6 py-4 bg-surface-container-low/20 border-b border-outline-variant/10">
                <form action="{{ route('kemahasiswaan.bidang.update', $bidang) }}" method="POST" class="flex flex-col sm:flex-row items-start sm:items-end gap-3">
                    @csrf
                    <div class="flex-1 w-full sm:w-auto">
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-1">Nama Bidang</label>
                        <input type="text" name="nama_bidang" value="{{ $bidang->nama_bidang }}"
                            class="w-full px-3 py-2 bg-white border border-outline-variant/30 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                    </div>
                    <div class="w-full sm:w-auto">
                        <label class="block text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-1">Wajib?</label>
                        <select name="is_wajib"
                            class="w-full px-3 py-2 bg-white border border-outline-variant/30 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="0" {{ !$bidang->is_wajib ? 'selected' : '' }}>Pilihan</option>
                            <option value="1" {{ $bidang->is_wajib ? 'selected' : '' }}>Wajib</option>
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-primary text-on-primary rounded-lg text-xs font-bold hover:opacity-90 transition-all shrink-0">Simpan</button>
                </form>
            </div>

            {{-- Sub Kegiatan & Bobot --}}
            @foreach($bidang->subKegiatans as $sub)
            <div class="px-5 sm:px-6 py-4 border-b border-outline-variant/5 last:border-0">
                <p class="text-sm font-bold text-on-surface mb-3">{{ $sub->nama_sub }}</p>

                @foreach($sub->kedudukans as $kedudukan)
                <div class="ml-4 sm:ml-6 mb-3">
                    <p class="text-xs font-semibold text-on-surface-variant mb-2">{{ $kedudukan->nama_kedudukan }}</p>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                        @foreach($kedudukan->bobotSkkms as $bobot)
                        <form action="{{ route('kemahasiswaan.bobot.update', $bobot) }}" method="POST" class="flex items-center gap-1.5 bg-surface-container-low rounded-lg p-2">
                            @csrf
                            <span class="text-[10px] font-bold text-on-surface-variant uppercase shrink-0 w-8">{{ $bobot->tingkat }}</span>
                            <input type="number" name="bobot" value="{{ $bobot->bobot }}" step="0.5" min="0" max="100"
                                class="w-14 px-2 py-1 bg-white border border-outline-variant/30 rounded text-xs text-center font-bold focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                            <button type="submit" class="p-1 rounded hover:bg-primary/10 transition-colors" title="Simpan">
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
    </div>
    @endif

</x-layouts.app-admin>
