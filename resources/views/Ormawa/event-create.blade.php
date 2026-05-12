<x-layouts.app-admin :title="'Buat Event Baru'" :role="'ormawa'" :activePage="'events'" :portalName="'E-SKKM'" :portalSub="'Ormawa Portal'" :sidebarIcon="'groups'">

    {{-- Page Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ route('ormawa.events') }}" class="p-2 rounded-xl hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined text-on-surface-variant">arrow_back</span>
        </a>
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Buat Event Baru</h2>
            <p class="text-sm text-on-surface-variant mt-1">Publikasikan event untuk mahasiswa.</p>
        </div>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-6 sm:p-8">
        <form action="{{ route('ormawa.events.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Judul Event <span class="text-error">*</span></label>
                    <input type="text" name="judul_event" value="{{ old('judul_event') }}" required
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                        placeholder="Contoh: Seminar Nasional IT 2024">
                    @error('judul_event') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Event (Opsional)</label>
                    <input type="text" name="nama_event" value="{{ old('nama_event') }}"
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                        placeholder="Nama singkat event">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Sub Kegiatan <span class="text-error">*</span></label>
                    <select name="sub_kegiatan_id" required
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                        <option value="">Pilih Sub Kegiatan</option>
                        @foreach($subKegiatans as $sub)
                        <option value="{{ $sub->id }}" {{ old('sub_kegiatan_id') == $sub->id ? 'selected' : '' }}>
                            {{ $sub->bidangKegiatan->nama_bidang ?? '-' }} — {{ $sub->nama_sub }}
                        </option>
                        @endforeach
                    </select>
                    @error('sub_kegiatan_id') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Tanggal Mulai <span class="text-error">*</span></label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                    @error('tanggal_mulai') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Tanggal Selesai <span class="text-error">*</span></label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                    @error('tanggal_selesai') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Status Event <span class="text-error">*</span></label>
                    <select name="status_event" required
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                        <option value="akan_datang" {{ old('status_event') === 'akan_datang' ? 'selected' : '' }}>Akan Datang</option>
                        <option value="berlangsung" {{ old('status_event') === 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                        <option value="selesai" {{ old('status_event') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Link Form Pendaftaran (Opsional)</label>
                    <input type="url" name="link_form" value="{{ old('link_form') }}"
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                        placeholder="https://forms.google.com/...">
                    @error('link_form') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Deskripsi Event</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none resize-none"
                        placeholder="Deskripsikan event Anda secara singkat...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-outline-variant/10">
                <a href="{{ route('ormawa.events') }}" class="px-6 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">publish</span>
                    Publikasikan Event
                </button>
            </div>
        </form>
    </div>

</x-layouts.app-admin>
