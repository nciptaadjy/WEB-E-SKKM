{{-- Status Badge Component --}}
@php $status = $status ?? 'pending'; @endphp

@if($status === 'approved')
    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-bold rounded-full uppercase flex items-center gap-1 w-fit">
        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
        Disetujui
    </span>
@elseif($status === 'verified_bem')
    <span class="px-3 py-1 bg-primary-fixed text-primary text-[10px] font-bold rounded-full uppercase flex items-center gap-1 w-fit">
        <span class="material-symbols-outlined text-[14px]">fact_check</span>
        Verif BEM
    </span>
@elseif($status === 'pending')
    <span class="px-3 py-1 bg-surface-container-high text-on-surface-variant text-[10px] font-bold rounded-full uppercase flex items-center gap-1 w-fit">
        <span class="material-symbols-outlined text-[14px]">schedule</span>
        Menunggu
    </span>
@elseif($status === 'rejected')
    <span class="px-3 py-1 bg-error-container text-on-error-container text-[10px] font-bold rounded-full uppercase flex items-center gap-1 w-fit">
        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">cancel</span>
        Ditolak
    </span>
@endif
