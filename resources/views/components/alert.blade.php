{{-- Session Flash Alerts --}}
@if(session('success'))
<div class="p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3 animate-in">
    <span class="material-symbols-outlined text-green-600 shrink-0">check_circle</span>
    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
</div>
@endif

@if(session('error'))
<div class="p-4 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3 animate-in">
    <span class="material-symbols-outlined text-red-600 shrink-0">error</span>
    <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
</div>
@endif

@if($errors->any())
<div class="p-4 bg-red-50 border border-red-200 rounded-xl animate-in">
    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
