@php
    $colors = [
        'draft'     => 'bg-gray-100 text-gray-600',
        'pending'   => 'bg-yellow-100 text-yellow-700',
        'revision'  => 'bg-amber-100 text-amber-700',
        'approved'  => 'bg-blue-100 text-blue-700',
        'rejected'  => 'bg-red-100 text-red-700',
        'generated' => 'bg-green-100 text-green-700',
    ];
    $labels = [
        'draft'     => 'Draft',
        'pending'   => 'Pending',
        'revision'  => 'Revisi',
        'approved'  => 'Approved',
        'rejected'  => 'Ditolak',
        'generated' => 'Generated',
    ];
    $color = $colors[$status] ?? 'bg-gray-100 text-gray-600';
    $label = $labels[$status] ?? $status;
@endphp
<span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full {{ $color }}">{{ $label }}</span>
