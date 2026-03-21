<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <!-- Header -->
    <div class="px-4 py-6 border-b border-base-300">
        <h1 class="text-2xl font-bold tracking-tight">Latest Chirps</h1>
        <p class="text-sm text-base-content/50 mt-0.5">
            See what the community is talking about.
        </p>
    </div>

    <!-- Chirp Form -->
    <div class="card bg-base-100 shadow mt-8">
        <div class="card-body">
            <form method="POST" action="/chirps">
                @csrf
                <div class="form-control w-full">
                    <textarea
                        name="message"
                        placeholder="What's on your mind?"
                        class="textarea textarea-bordered w-full resize-none {{ $errors->has('message') ? 'textarea-error' : '' }}"
                        rows="4"
                        maxlength="255"
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <div class="mt-1.5 flex items-center gap-1.5 text-error text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 3a9 9 0 100 18A9 9 0 0012 3z" />
                            </svg>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Chirp
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Chirps List -->
    <div class="divide-y divide-base-300 mt-8">
        @forelse ($chirps as $chirp)
            <x-chirp :chirp="$chirp" />
        @empty
            <div class="py-20 flex flex-col items-center gap-3 text-center">
                <div class="w-12 h-12 rounded-full bg-base-200 flex items-center justify-center">
                    <svg class="w-6 h-6 text-base-content/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                        />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold">Quiet in here...</h3>
                    <p class="text-sm text-base-content/50 mt-0.5">
                        No chirps yet. Why not be the first?
                    </p>
                </div>
            </div>
        @endforelse
    </div>
</x-layout>