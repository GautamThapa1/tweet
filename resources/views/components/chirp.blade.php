@props(['chirp'])

<div class="px-4 py-3 hover:bg-base-200/40 transition-colors duration-200">
    <div class="flex gap-3 items-start">

        <!-- Avatar -->
        @if($chirp->user)
            <div class="avatar shrink-0">
                <div class="w-10 h-10 rounded-full ring-2 ring-base-300 ring-offset-base-100 ring-offset-2">
                    <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                         alt="{{ $chirp->user->name }}'s avatar" />
                </div>
            </div>
        @else
            <div class="avatar placeholder shrink-0">
                <div class="bg-base-300 text-base-content/40 w-10 h-10 rounded-full flex items-center justify-center">
                    <span class="text-[9px] font-bold tracking-widest">ANON</span>
                </div>
            </div>
        @endif

        <!-- Content -->
        <div class="flex-1 min-w-0 bg-base-200/60 rounded-2xl px-4 py-3 shadow-sm border border-base-300/40">
            <div class="flex items-center gap-1.5 mb-2">
                <span class="font-semibold text-sm">
                    {{ $chirp->user?->name ?? 'Anonymous' }}
                </span>
                <span class="text-base-content/30 text-xs">·</span>
                <span class="text-xs text-base-content/40">
                    {{ $chirp->created_at->diffForHumans() }}
                </span>
                @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                    <span class="text-base-content/30 text-xs">·</span>
                    <span class="text-xs text-base-content/40 italic">edited</span>
                @endif
            </div>
            <p class="text-sm leading-relaxed text-base-content/80 break-words whitespace-pre-wrap">
                {{ $chirp->message }}
            </p>
        </div>

        <!-- Actions -->
        @can('update', $chirp)
        <div class="flex flex-col gap-1 shrink-0">
            <a href="/chirps/{{ $chirp->id }}/edit"
               class="btn btn-neutral btn-xs gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828A2 2 0 019 16H7v-2a2 2 0 01.586-1.414z" />
                </svg>
                Edit
            </a>
            <form method="POST" action="/chirps/{{ $chirp->id }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    onclick="return confirm('Delete this chirp?')"
                    class="btn btn-error btn-xs gap-1 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4h6v3M4 7h16" />
                    </svg>
                    Delete
                </button>
            </form>
        </div>
        @endcan

    </div>
</div>