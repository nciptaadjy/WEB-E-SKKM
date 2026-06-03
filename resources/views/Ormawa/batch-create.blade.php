<x-layouts.app-admin :title="'Buat Batch Penomoran'" :role="'ormawa'" :activePage="'batch'" :portalName="'E-SKKM'"
    :portalSub="'Ormawa Portal'" :sidebarIcon="'groups'">

    {{-- Page Header --}}
    <div class="flex items-center gap-3 mb-2">
        <a href="{{ route('ormawa.batch') }}"
            class="w-9 h-9 rounded-xl bg-surface-container-low flex items-center justify-center hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined text-on-surface-variant text-lg">arrow_back</span>
        </a>
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Buat Batch Penomoran</h2>
            <p class="text-sm text-on-surface-variant mt-1">Input data peserta untuk request penomoran sertifikat.</p>
        </div>
    </div>

    <form id="batch-form" action="{{ route('ormawa.batch.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Event Info Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-5 sm:p-6 space-y-5 mb-6">
            <div class="flex items-center gap-3 mb-1">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-xl">event</span>
                </div>
                <h3 class="text-lg font-extrabold font-headline text-on-surface">Informasi Event</h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                        Nama Event <span class="text-error">*</span>
                    </label>
                    <input type="text" name="nama_event" required value="{{ old('nama_event') }}"
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm outline-none focus:border-primary transition-colors"
                        placeholder="Contoh: Seminar Nasional AI 2025">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                        Kategori Event
                    </label>
                    <input type="text" name="kategori_event" value="{{ old('kategori_event') }}"
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm outline-none focus:border-primary transition-colors"
                        placeholder="Contoh: Seminar, Workshop, Pelatihan">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                        Jumlah Sertifikat yang Diajukan <span class="text-error">*</span>
                    </label>
                    <input type="number" name="jumlah_sertifikat" required min="1" value="{{ old('jumlah_sertifikat') }}"
                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm outline-none focus:border-primary transition-colors"
                        placeholder="Contoh: 50">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                        Upload Bukti Pasti Peserta <span class="text-error">*</span>
                    </label>
                    <input type="file" name="bukti_peserta" required accept=".pdf,image/png,image/jpeg,image/jpg"
                        class="w-full px-4 py-2 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm outline-none focus:border-primary transition-colors file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer">
                    <p class="text-[10px] text-on-surface-variant mt-1.5 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">info</span>
                        Format: PDF/JPG/PNG (Maks. 5MB)
                    </p>
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                    Catatan <span class="text-outline font-normal normal-case">(opsional)</span>
                </label>
                <textarea name="catatan" rows="2"
                    class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm resize-none outline-none focus:border-primary transition-colors"
                    placeholder="Catatan tambahan untuk Kemahasiswaan...">{{ old('catatan') }}</textarea>
            </div>
        </div>

        {{-- Peserta Input Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden mb-6">
            {{-- Tab Header --}}
            <div class="flex border-b border-outline-variant/10">
                <button type="button" onclick="switchTab('manual')" id="tab-manual"
                    class="flex-1 py-3.5 text-sm font-bold text-center transition-all border-b-2 border-primary text-primary bg-primary/5">
                    <span class="material-symbols-outlined text-base align-middle mr-1">edit_note</span>
                    Form Manual
                </button>
                <button type="button" onclick="switchTab('csv')" id="tab-csv"
                    class="flex-1 py-3.5 text-sm font-bold text-center transition-all border-b-2 border-transparent text-on-surface-variant hover:bg-surface-container-low">
                    <span class="material-symbols-outlined text-base align-middle mr-1">upload_file</span>
                    Upload CSV
                </button>
            </div>

            {{-- Tab Manual --}}
            <div id="panel-manual" class="p-5 sm:p-6">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm font-bold text-on-surface">Daftar Peserta</p>
                        <p class="text-xs text-on-surface-variant">Total: <span id="manual-count" class="font-bold text-primary">1</span> peserta</p>
                    </div>
                    <button type="button" onclick="addRow()"
                        class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary/10 text-primary rounded-xl text-xs font-bold hover:bg-primary/20 transition-colors">
                        <span class="material-symbols-outlined text-sm">add</span>
                        Tambah Baris
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm" id="peserta-table">
                        <thead>
                            <tr class="bg-surface-container-low/50">
                                <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase tracking-wider text-left w-10">#</th>
                                <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase tracking-wider text-left">NIM / ID / NIK</th>
                                <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase tracking-wider text-left">Nama Peserta</th>
                                <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase tracking-wider text-center w-16">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="peserta-body">
                            <tr class="peserta-row border-b border-outline-variant/5" data-index="0">
                                <td class="px-3 py-2 text-xs text-outline row-num">1</td>
                                <td class="px-3 py-2">
                                    <input type="text" name="peserta[0][identifier]" required
                                        class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary transition-colors"
                                        placeholder="Contoh: 22001">
                                </td>
                                <td class="px-3 py-2">
                                    <input type="text" name="peserta[0][nama]" required
                                        class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary transition-colors"
                                        placeholder="Contoh: Budi Santoso">
                                </td>
                                <td class="px-3 py-2 text-center">
                                    <button type="button" onclick="removeRow(this)"
                                        class="w-8 h-8 rounded-lg bg-error/10 text-error hover:bg-error/20 transition-colors inline-flex items-center justify-center">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Tab CSV --}}
            <div id="panel-csv" class="p-5 sm:p-6 hidden">
                <div class="mb-4">
                    <p class="text-sm font-bold text-on-surface mb-1">Upload File CSV</p>
                    <p class="text-xs text-on-surface-variant">Format wajib: <code class="px-1.5 py-0.5 bg-surface-container-low rounded text-primary font-mono">NIM/ID/NIK,Nama</code></p>
                </div>

                {{-- Drop Zone --}}
                <div id="drop-zone"
                    class="border-2 border-dashed border-outline-variant/30 rounded-2xl p-8 text-center hover:border-primary/50 hover:bg-primary/5 transition-all cursor-pointer"
                    onclick="document.getElementById('csv-file-input').click()">
                    <span class="material-symbols-outlined text-4xl text-outline/30 mb-2 block">cloud_upload</span>
                    <p class="font-bold text-on-surface text-sm">Klik atau drag & drop file CSV</p>
                    <p class="text-xs text-on-surface-variant mt-1">Maksimum 2MB — format .csv atau .txt</p>
                    <input type="file" id="csv-file-input" accept=".csv,.txt" class="hidden" onchange="handleCsvUpload(this)">
                </div>

                {{-- CSV Preview --}}
                <div id="csv-preview" class="hidden mt-5">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-sm font-bold text-on-surface">Preview Data CSV</p>
                            <p class="text-xs text-on-surface-variant">Total: <span id="csv-count" class="font-bold text-primary">0</span> peserta</p>
                        </div>
                        <button type="button" onclick="clearCsv()"
                            class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-bold text-error bg-error/10 rounded-lg hover:bg-error/20 transition-colors">
                            <span class="material-symbols-outlined text-sm">close</span>
                            Hapus
                        </button>
                    </div>

                    {{-- CSV Errors --}}
                    <div id="csv-errors" class="hidden mb-3 p-3 bg-error-container/20 border border-error/20 rounded-xl">
                        <p class="text-xs font-bold text-error mb-1">
                            <span class="material-symbols-outlined text-sm align-middle mr-1">warning</span>
                            Peringatan:
                        </p>
                        <ul id="csv-error-list" class="text-xs text-error space-y-0.5 list-disc list-inside"></ul>
                    </div>

                    <div class="overflow-x-auto max-h-64 overflow-y-auto rounded-xl border border-outline-variant/10">
                        <table class="w-full text-sm">
                            <thead class="sticky top-0">
                                <tr class="bg-surface-container-low/80 backdrop-blur-sm">
                                    <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase text-left w-10">#</th>
                                    <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase text-left">NIM/ID/NIK</th>
                                    <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase text-left">Nama</th>
                                    <th class="px-3 py-2.5 text-xs font-bold text-outline uppercase text-left">Tipe</th>
                                </tr>
                            </thead>
                            <tbody id="csv-preview-body" class="divide-y divide-outline-variant/5"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex flex-col sm:flex-row gap-3">
            <a href="{{ route('ormawa.batch') }}"
                class="flex-1 sm:flex-none py-3 px-6 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm text-center hover:bg-surface-container-low transition-colors">
                Batal
            </a>
            <button type="submit" id="btn-submit"
                class="flex-1 py-3 px-6 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:brightness-110 transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-base">send</span>
                Kirim Pengajuan
            </button>
        </div>
    </form>

@push('scripts')
<script>
    let rowIndex = 1;
    let activeTab = 'manual';
    let csvPesertaData = [];

    // ── Tab Switch ──
    function switchTab(tab) {
        activeTab = tab;
        const manualTab = document.getElementById('tab-manual');
        const csvTab = document.getElementById('tab-csv');
        const manualPanel = document.getElementById('panel-manual');
        const csvPanel = document.getElementById('panel-csv');

        if (tab === 'manual') {
            manualTab.classList.add('border-primary', 'text-primary', 'bg-primary/5');
            manualTab.classList.remove('border-transparent', 'text-on-surface-variant');
            csvTab.classList.remove('border-primary', 'text-primary', 'bg-primary/5');
            csvTab.classList.add('border-transparent', 'text-on-surface-variant');
            manualPanel.classList.remove('hidden');
            csvPanel.classList.add('hidden');
            // Clear CSV hidden inputs
            clearCsvHiddenInputs();
        } else {
            csvTab.classList.add('border-primary', 'text-primary', 'bg-primary/5');
            csvTab.classList.remove('border-transparent', 'text-on-surface-variant');
            manualTab.classList.remove('border-primary', 'text-primary', 'bg-primary/5');
            manualTab.classList.add('border-transparent', 'text-on-surface-variant');
            csvPanel.classList.remove('hidden');
            manualPanel.classList.add('hidden');
            // Disable manual inputs required
            disableManualRequired();
        }
    }

    function disableManualRequired() {
        document.querySelectorAll('#peserta-body input').forEach(i => i.removeAttribute('required'));
    }

    function enableManualRequired() {
        document.querySelectorAll('#peserta-body input[name*="identifier"]').forEach(i => i.setAttribute('required', 'required'));
        document.querySelectorAll('#peserta-body input[name*="nama"]').forEach(i => i.setAttribute('required', 'required'));
    }

    // ── Manual Form Rows ──
    function addRow() {
        const tbody = document.getElementById('peserta-body');
        const row = document.createElement('tr');
        row.className = 'peserta-row border-b border-outline-variant/5';
        row.dataset.index = rowIndex;
        row.innerHTML = `
            <td class="px-3 py-2 text-xs text-outline row-num">${tbody.children.length + 1}</td>
            <td class="px-3 py-2">
                <input type="text" name="peserta[${rowIndex}][identifier]" required
                    class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary transition-colors"
                    placeholder="Contoh: 22002">
            </td>
            <td class="px-3 py-2">
                <input type="text" name="peserta[${rowIndex}][nama]" required
                    class="w-full px-3 py-2 bg-surface-container-low border border-outline-variant/30 rounded-lg text-sm outline-none focus:border-primary transition-colors"
                    placeholder="Contoh: Siti Rahma">
            </td>
            <td class="px-3 py-2 text-center">
                <button type="button" onclick="removeRow(this)"
                    class="w-8 h-8 rounded-lg bg-error/10 text-error hover:bg-error/20 transition-colors inline-flex items-center justify-center">
                    <span class="material-symbols-outlined text-sm">delete</span>
                </button>
            </td>
        `;
        tbody.appendChild(row);
        rowIndex++;
        updateManualCount();
    }

    function removeRow(btn) {
        const tbody = document.getElementById('peserta-body');
        if (tbody.children.length <= 1) return; // Keep at least 1 row
        btn.closest('tr').remove();
        // Renumber rows
        document.querySelectorAll('.peserta-row .row-num').forEach((el, i) => {
            el.textContent = i + 1;
        });
        updateManualCount();
    }

    function updateManualCount() {
        document.getElementById('manual-count').textContent = document.querySelectorAll('.peserta-row').length;
    }



    // ── CSV Upload & Parse ──
    function handleCsvUpload(input) {
        const file = input.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('csv_file', file);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ route("ormawa.batch.parse-csv") }}', {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(r => r.json())
        .then(data => {
            csvPesertaData = data.peserta || [];
            showCsvPreview(data);
        })
        .catch(err => {
            alert('Gagal memproses CSV: ' + err.message);
        });
    }

    function showCsvPreview(data) {
        document.getElementById('csv-preview').classList.remove('hidden');
        document.getElementById('csv-count').textContent = data.total;

        // Show errors
        const errorDiv = document.getElementById('csv-errors');
        const errorList = document.getElementById('csv-error-list');
        if (data.errors && data.errors.length > 0) {
            errorDiv.classList.remove('hidden');
            errorList.innerHTML = data.errors.map(e => `<li>${e}</li>`).join('');
        } else {
            errorDiv.classList.add('hidden');
        }

        // Build preview table
        const tbody = document.getElementById('csv-preview-body');
        tbody.innerHTML = '';

        data.peserta.forEach((p, i) => {
            const tr = document.createElement('tr');
            tr.className = 'hover:bg-surface-container-low transition-colors';
            tr.innerHTML = `
                <td class="px-3 py-2 text-xs text-outline">${i + 1}</td>
                <td class="px-3 py-2 font-mono text-xs">${p.identifier}</td>
                <td class="px-3 py-2 text-sm">${p.nama}</td>
                <td class="px-3 py-2">
                    <span class="px-2 py-0.5 text-[10px] font-bold uppercase rounded-full
                        ${p.tipe === 'mahasiswa' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700'}">${p.tipe}</span>
                </td>
            `;
            tbody.appendChild(tr);
        });

        // Create hidden inputs for CSV peserta
        injectCsvHiddenInputs();
    }

    function injectCsvHiddenInputs() {
        clearCsvHiddenInputs();
        const form = document.getElementById('batch-form');
        csvPesertaData.forEach((p, i) => {
            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = `peserta[${i}][identifier]`;
            idInput.value = p.identifier;
            idInput.classList.add('csv-hidden-input');
            form.appendChild(idInput);

            const namaInput = document.createElement('input');
            namaInput.type = 'hidden';
            namaInput.name = `peserta[${i}][nama]`;
            namaInput.value = p.nama;
            namaInput.classList.add('csv-hidden-input');
            form.appendChild(namaInput);
        });
    }

    function clearCsvHiddenInputs() {
        document.querySelectorAll('.csv-hidden-input').forEach(el => el.remove());
    }

    function clearCsv() {
        csvPesertaData = [];
        document.getElementById('csv-preview').classList.add('hidden');
        document.getElementById('csv-file-input').value = '';
        clearCsvHiddenInputs();
    }

    // ── Form Submit Handler ──
    document.getElementById('batch-form').addEventListener('submit', function(e) {
        if (activeTab === 'csv') {
            // Disable manual inputs so they don't submit
            document.querySelectorAll('#peserta-body input').forEach(i => {
                i.disabled = true;
                i.removeAttribute('required');
            });

            if (csvPesertaData.length === 0) {
                e.preventDefault();
                alert('Silakan upload file CSV terlebih dahulu.');
                document.querySelectorAll('#peserta-body input').forEach(i => i.disabled = false);
                return;
            }
        } else {
            // Disable CSV hidden inputs
            clearCsvHiddenInputs();
        }
    });

    // ── Drag & Drop ──
    const dropZone = document.getElementById('drop-zone');
    ['dragenter', 'dragover'].forEach(evt => {
        dropZone.addEventListener(evt, e => {
            e.preventDefault();
            dropZone.classList.add('border-primary', 'bg-primary/5');
        });
    });
    ['dragleave', 'drop'].forEach(evt => {
        dropZone.addEventListener(evt, e => {
            e.preventDefault();
            dropZone.classList.remove('border-primary', 'bg-primary/5');
        });
    });
    dropZone.addEventListener('drop', e => {
        const file = e.dataTransfer.files[0];
        if (file) {
            const input = document.getElementById('csv-file-input');
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            handleCsvUpload(input);
        }
    });
</script>
@endpush

</x-layouts.app-admin>
