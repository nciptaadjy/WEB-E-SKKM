<x-layouts.app-mahasiswa :title="'Alur Pengajuan E-SKKM'" :activePage="'panduan'">

    {{-- Header --}}
    <div class="flex items-center gap-3 mb-8">
        <a href="{{ route('panduan') }}" class="p-2 rounded-xl hover:bg-surface-container transition-colors">
            <span class="material-symbols-outlined text-on-surface-variant">arrow_back</span>
        </a>
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Alur Pengajuan SKKM</h2>
            <p class="text-sm text-on-surface-variant mt-1">Langkah demi langkah validasi sertifikat Anda.</p>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Diagram Visual --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-6 md:p-8">
                <h3 class="text-lg font-bold text-on-surface font-headline mb-6">Workflow Validasi</h3>
                
                {{-- Diagram Step 1 --}}
                <div class="relative flex items-start gap-4 pb-8">
                    <div class="absolute top-8 left-6 bottom-0 w-0.5 bg-outline-variant/30"></div>
                    <div class="relative z-10 w-12 h-12 rounded-full bg-primary flex items-center justify-center shrink-0 shadow-lg shadow-primary/20 text-white font-bold text-xl">1</div>
                    <div class="pt-2">
                        <h4 class="text-base font-bold text-on-surface flex items-center gap-2">Mahasiswa Mengunggah <span class="px-2 py-0.5 bg-surface-container-high text-on-surface-variant rounded text-[10px] uppercase font-bold tracking-wider ml-2">PENDING</span></h4>
                        <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">Mahasiswa memasukkan data sertifikat (Nama, Tanggal, Bidang, Sub Kegiatan, Tingkat) dan mengunggah bukti PDF/JPG. Sistem akan otomatis menghitung estimasi poin.</p>
                    </div>
                </div>

                {{-- Diagram Step 2 --}}
                <div class="relative flex items-start gap-4 pb-8">
                    <div class="absolute top-8 left-6 bottom-0 w-0.5 bg-outline-variant/30"></div>
                    <div class="relative z-10 w-12 h-12 rounded-full bg-white border-2 border-primary flex items-center justify-center shrink-0 shadow-sm text-primary font-bold text-xl">2</div>
                    <div class="pt-2">
                        <h4 class="text-base font-bold text-on-surface flex items-center gap-2">Verifikasi Tahap 1: BEM <span class="px-2 py-0.5 bg-blue-100 text-blue-800 rounded text-[10px] uppercase font-bold tracking-wider ml-2">VERIF BEM</span></h4>
                        <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">Tim BEM bertugas sebagai kurator tingkat pertama. Mereka memastikan keaslian dokumen sertifikat dan memvalidasi apakah kategori kegiatan yang dipilih mahasiswa sudah sesuai.</p>
                        <div class="mt-3 p-3 bg-red-50 rounded-lg border border-red-100 flex items-start gap-2">
                            <span class="material-symbols-outlined text-red-600 text-sm mt-0.5">info</span>
                            <p class="text-xs text-red-800">Jika dokumen palsu atau buram, BEM dapat langsung melakukan <strong class="font-bold">Tolak</strong> (Selesai dengan status REJECTED).</p>
                        </div>
                    </div>
                </div>

                {{-- Diagram Step 3 --}}
                <div class="relative flex items-start gap-4 pb-8">
                    <div class="absolute top-8 left-6 bottom-0 w-0.5 bg-outline-variant/30"></div>
                    <div class="relative z-10 w-12 h-12 rounded-full bg-white border-2 border-secondary flex items-center justify-center shrink-0 shadow-sm text-secondary font-bold text-xl">3</div>
                    <div class="pt-2">
                        <h4 class="text-base font-bold text-on-surface flex items-center gap-2">Verifikasi Tahap 2: Kemahasiswaan</h4>
                        <p class="text-sm text-on-surface-variant mt-1 leading-relaxed">Pihak Kemahasiswaan (KMHS) merupakan verifikator akhir. KMHS meninjau rekomendasi dari BEM dan memiliki 3 opsi tindakan:</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-4">
                            <div class="p-3 border border-outline-variant/20 rounded-xl bg-surface-container-low/50">
                                <span class="px-2 py-0.5 bg-green-100 text-green-800 rounded text-[10px] uppercase font-bold tracking-wider mb-2 inline-block">APPROVED</span>
                                <p class="text-xs text-on-surface-variant"><strong class="text-on-surface">Setujui:</strong> Data valid. Poin resmi diakumulasikan ke akun mahasiswa.</p>
                            </div>
                            <div class="p-3 border border-amber-200 rounded-xl bg-amber-50">
                                <span class="px-2 py-0.5 bg-amber-200 text-amber-800 rounded text-[10px] uppercase font-bold tracking-wider mb-2 inline-block">REVISION</span>
                                <p class="text-xs text-amber-900"><strong class="text-amber-800">Minta Revisi:</strong> Sertifikat sah, namun ada salah pengisian (misal salah tanggal/tingkat). Dikembalikan ke mahasiswa untuk diedit.</p>
                            </div>
                            <div class="p-3 border border-red-200 rounded-xl bg-red-50 md:col-span-2">
                                <span class="px-2 py-0.5 bg-red-200 text-red-800 rounded text-[10px] uppercase font-bold tracking-wider mb-2 inline-block">REJECTED</span>
                                <p class="text-xs text-red-900"><strong class="text-red-800">Tolak:</strong> Sertifikat tidak diakui oleh institusi. Proses berhenti.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Diagram Step 4 --}}
                <div class="relative flex items-start gap-4">
                    <div class="relative z-10 w-12 h-12 rounded-full bg-secondary flex items-center justify-center shrink-0 shadow-lg shadow-secondary/20 text-white">
                        <span class="material-symbols-outlined font-bold">flag</span>
                    </div>
                    <div class="pt-3">
                        <h4 class="text-base font-bold text-on-surface">Proses Selesai</h4>
                    </div>
                </div>

            </div>
        </div>

        {{-- Sidebar Info --}}
        <div class="space-y-6">
            <div class="bg-surface-container-low p-6 rounded-2xl border border-outline-variant/10">
                <h4 class="font-bold text-on-surface mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">schedule</span> SLA Waktu Proses
                </h4>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-on-surface-variant">BEM</span>
                            <span class="font-bold text-on-surface">Maks. 3 Hari</span>
                        </div>
                        <div class="w-full bg-outline-variant/20 rounded-full h-1.5"><div class="bg-primary h-1.5 rounded-full w-[60%]"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-on-surface-variant">Kemahasiswaan</span>
                            <span class="font-bold text-on-surface">Maks. 2 Hari</span>
                        </div>
                        <div class="w-full bg-outline-variant/20 rounded-full h-1.5"><div class="bg-secondary h-1.5 rounded-full w-[40%]"></div></div>
                    </div>
                    <div class="pt-3 border-t border-outline-variant/10">
                        <p class="text-xs text-on-surface-variant">Total waktu yang dibutuhkan untuk satu siklus verifikasi penuh adalah <strong class="text-on-surface">maksimal 5 hari kerja</strong>.</p>
                    </div>
                </div>
            </div>

            <div class="bg-primary/5 p-6 rounded-2xl border border-primary/20">
                <h4 class="font-bold text-primary mb-2 flex items-center gap-2">
                    <span class="material-symbols-outlined">edit_note</span> Tentang Status Revisi
                </h4>
                <p class="text-xs text-on-surface-variant leading-relaxed">
                    Status <strong>REVISI</strong> adalah fitur baru. Jika status Anda Revisi, Anda dapat membuka detail sertifikat, membaca catatan dari Kemahasiswaan, dan mengunggah ulang data yang benar tanpa perlu membuat pengajuan dari awal.
                </p>
            </div>
        </div>

    </div>

</x-layouts.app-mahasiswa>
