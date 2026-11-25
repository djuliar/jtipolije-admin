<x-filament-widgets::widget>
    <x-filament::section heading="Video Profil">
        @if ($videoId)
            <div class="aspect-video">
                <iframe
                    class="h-full w-full rounded-lg"
                    src="https://www.youtube-nocookie.com/embed/{{ $videoId }}"
                    title="YouTube live stream"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen
                    height="350px"
                ></iframe>
            </div>
        @else
            <p class="text-sm text-gray-500 dark:text-gray-400">Link YouTube belum tersedia atau tidak valid.</p>
        @endif
    </x-filament::section>
</x-filament-widgets::widget>
