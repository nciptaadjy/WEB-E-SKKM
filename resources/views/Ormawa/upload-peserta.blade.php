<x-layouts.app-admin :title="'Upload Peserta'" :role="'ormawa'" :activePage="'events'" :portalName="'E-SKKM'" :portalSub="'Ormawa Portal'" :sidebarIcon="'groups'">

    {{-- Page Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ route('ormawa.events') }}" class="p-2 rounded-xl hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined text-on-surface-variant">arrow_back</span>
        </a>
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Upload Peserta Event</h2>
            <p class="text-sm text-on-surface-variant mt-1">{{ $event->judul_event }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        {{-- Upload Form --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-6 space-y-6">
                <div>
                    <h3 class="text-lg font-bold text-on-surface font-headline mb-1">Upload CSV</h3>
                    <p class="text-xs text-on-surface-variant">File CSV harus memiliki kolom NIM pada kolom pertama.</p>
                </div>

                <form action="{{ route('ormawa.peserta.upload', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">File CSV <span class="text-error">*</span></label>
                        <div class="border-2 border-dashed border-outline-variant/40 rounded-xl p-6 text-center hover:border-primary/40 transition-colors cursor-pointer" onclick="document.getElementById('csv-input').click()">
                            <span class="material-symbols-outlined text-3xl text-outline/30 mb-2 block">upload_file</span>
                            <p class="text-sm text-on-surface-variant font-medium">Klik untuk upload atau seret file CSV</p>
                            <p class="text-xs text-outline mt-1">Format: NIM per baris (maks. 2MB)</p>
                            <input type="file" id="csv-input" name="csv_file" accept=".csv,.txt" required class="hidden"
                                onchange="document.getElementById('csv-filename').textContent = this.files[0]?.name || 'Belum dipilih'">
                        </div>
                        <p id="csv-filename" class="text-xs text-primary font-semibold mt-2"></p>
                        @error('csv_file') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Kedudukan Peserta <span class="text-error">*</span></label>
                        <select name="kedudukan_id" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="">Pilih Kedudukan</option>
                            @php
                                $kedudukans = \App\Models\Kedudukan::all();
                            @endphp
                            @foreach($kedudukans as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kedudukan }}</option>
                            @endforeach
                        </select>
                        @error('kedudukan_id') <p class="text-xs text-error mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full py-3 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">upload</span>
                        Upload & Import
                    </button>
                </form>

                {{-- CSV Template --}}
                <div class="pt-4 border-t border-outline-variant/10">
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Contoh Format CSV</p>
                    <div class="bg-surface-container-low p-3 rounded-lg font-mono text-xs text-on-surface-variant">
                        nim<br>
                        2105101001<br>
                        2105101002<br>
                        2105101003
                    </div>
                </div>

                {{-- CSV Errors --}}
                @if(session('csv_errors') && count(session('csv_errors')) > 0)
                <div class="p-4 bg-error-container/20 border border-error/20 rounded-xl">
                    <p class="text-xs font-bold text-error mb-2">Beberapa baris bermasalah:</p>
                    <ul class="text-xs text-error/80 space-y-1">
                        @foreach(session('csv_errors') as $err)
                        <li>• {{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>

        {{-- Current Peserta List --}}
        <div class="lg:col-span-3">
            <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
                <div class="px-6 py-4 border-b border-outline-variant/10 flex items-center justify-between">
                    <h3 class="text-base font-bold text-on-surface font-headline">Daftar Peserta ({{ $peserta->count() }})</h3>
                </div>
                @if($peserta->isEmpty())
                <div class="p-12 text-center">
                    <span class="material-symbols-outlined text-5xl text-outline/20 mb-3 block">person_off</span>
                    <p class="font-semibold text-on-surface-variant text-sm">Belum ada peserta terdaftar.</p>
                    <p class="text-xs text-outline mt-1">Upload CSV untuk menambahkan peserta.</p>
                </div>
                @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="bg-surface-container-low/50">
                                <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-xs font-bold text-outline uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/5">
                            @foreach($peserta as $i => $p)
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="px-6 py-3 text-on-surface-variant">{{ $i + 1 }}</td>
                                <td class="px-6 py-3 font-mono text-sm">{{ $p->mahasiswa->nim }}</td>
                                <td class="px-6 py-3 font-semibold">{{ $p->mahasiswa->nama }}</td>
                                <td class="px-6 py-3">
                                    <span class="px-2 py-0.5 text-[10px] font-bold rounded-full
                                        {{ $p->status_sertifikat === 'sudah_generate' ? 'bg-green-100 text-green-700' : ($p->status_sertifikat === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-slate-100 text-slate-600') }}">
                                        {{ str_replace('_', ' ', $p->status_sertifikat) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

</x-layouts.app-admin>
