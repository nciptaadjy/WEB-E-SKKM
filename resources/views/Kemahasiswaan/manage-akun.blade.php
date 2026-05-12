<x-layouts.app-admin :title="'Manajemen Akun'" :role="'kemahasiswaan'" :activePage="'akun'" :portalName="'E-SKKM'" :portalSub="'Kemahasiswaan'" :sidebarIcon="'school'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Manajemen Akun</h2>
            <p class="text-sm text-on-surface-variant mt-1">Kelola akun BEM dan Ormawa.</p>
        </div>
        <button onclick="openModal('modal-create')"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
            <span class="material-symbols-outlined text-lg">person_add</span>
            Tambah Akun
        </button>
    </div>

    {{-- Users Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden">
        @if($users->isEmpty())
        <div class="p-12 text-center">
            <span class="material-symbols-outlined text-5xl text-outline/20 mb-3 block">manage_accounts</span>
            <p class="font-bold text-on-surface-variant">Belum ada akun BEM/Ormawa.</p>
        </div>
        @else
        {{-- Mobile Cards --}}
        <div class="md:hidden divide-y divide-outline-variant/5">
            @foreach($users as $user)
            <div class="p-4 space-y-3">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold text-on-surface text-sm">{{ $user->nama_pengguna }}</p>
                        <p class="text-xs text-on-surface-variant">@ {{ $user->username }}</p>
                    </div>
                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full
                        {{ $user->role === 'bem' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                        {{ $user->role }}
                    </span>
                </div>
                <div class="flex gap-2">
                    <button onclick="openResetModal({{ $user->id }}, '{{ addslashes($user->nama_pengguna) }}')"
                        class="flex-1 py-2 rounded-lg bg-primary/10 text-primary text-xs font-bold hover:bg-primary/20 transition-colors">Reset Password</button>
                    <form action="{{ route('kemahasiswaan.akun.delete', $user) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus akun ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full py-2 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Desktop Table --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="bg-surface-container-low/50">
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Username</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Dibuat</th>
                        <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @foreach($users as $user)
                    <tr class="hover:bg-surface-container-low transition-colors">
                        <td class="px-6 py-4 font-bold text-on-surface">{{ $user->nama_pengguna }}</td>
                        <td class="px-6 py-4 font-mono text-xs text-on-surface-variant">{{ $user->username }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full
                                {{ $user->role === 'bem' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-on-surface-variant">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">
                                <button onclick="openResetModal({{ $user->id }}, '{{ addslashes($user->nama_pengguna) }}')"
                                    class="px-3 py-1.5 rounded-lg bg-primary/10 text-primary text-xs font-bold hover:bg-primary/20 transition-colors">Reset Password</button>
                                <form action="{{ route('kemahasiswaan.akun.delete', $user) }}" method="POST" onsubmit="return confirm('Hapus akun {{ addslashes($user->nama_pengguna) }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-error/10 text-error text-xs font-bold hover:bg-error/20 transition-colors">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    {{-- Modal: Create Account --}}
    <div id="modal-create" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form action="{{ route('kemahasiswaan.akun.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">person_add</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Tambah Akun Baru</h3>
                            <p class="text-xs text-on-surface-variant">Buat akun BEM atau Ormawa baru.</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Nama Pengguna <span class="text-error">*</span></label>
                        <input type="text" name="nama_pengguna" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="Nama lengkap">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Username <span class="text-error">*</span></label>
                        <input type="text" name="username" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="admin_bem_baru">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Password <span class="text-error">*</span></label>
                        <input type="password" name="password" required minlength="6"
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="Min. 6 karakter">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Role <span class="text-error">*</span></label>
                        <select name="role" required
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none">
                            <option value="bem">BEM</option>
                            <option value="ormawa">Ormawa</option>
                        </select>
                    </div>
                </div>

                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-create')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">check</span> Buat Akun
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal: Reset Password --}}
    <div id="modal-reset" class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm">
        <div class="modal-box bg-white w-full sm:max-w-md rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10">
            <form id="form-reset" method="POST" action="">
                @csrf
                <div class="p-6 space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-xl bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary text-2xl">key</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-extrabold font-headline text-on-surface">Reset Password</h3>
                            <p class="text-sm text-on-surface-variant">Untuk: <strong id="reset-nama">-</strong></p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Password Baru <span class="text-error">*</span></label>
                        <input type="password" name="new_password" required minlength="6"
                            class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant/30 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none"
                            placeholder="Min. 6 karakter">
                    </div>
                </div>

                <div class="bg-surface-container-low p-4 flex gap-3">
                    <button type="button" onclick="closeModal('modal-reset')"
                        class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Batal</button>
                    <button type="submit"
                        class="flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-base">key</span> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

@push('scripts')
<script>
    function openResetModal(userId, nama) {
        document.getElementById('reset-nama').textContent = nama;
        document.getElementById('form-reset').action = '/kemahasiswaan/akun/' + userId + '/reset-password';
        openModal('modal-reset');
    }
</script>
@endpush

</x-layouts.app-admin>
