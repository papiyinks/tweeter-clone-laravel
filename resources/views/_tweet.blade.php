<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400' }}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{ route('profile', $tweet->user) }}">
            <img
                src="{{ $tweet->user->avatar }}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ route('profile', $tweet->user) }}">
                {{ $tweet->user->name }}
            </a>
        </h5>

        @if ($tweet->image)
            <div class="mb-4" style="width: 600px; height: 400px">
                <img
                    src="{{ $tweet->image }}"
                    alt="tweet image"
                    style="width: 100%; height: 100%; object-fit: cover; display: block"
                >
            </div>
        @endif

        @if ($tweet->body)
            <p class="my-2 text-sm">
                {{ $tweet->body }}
            </p>
        @endif

        @auth
            <x-like-buttons :tweet="$tweet" />
        @endauth
    </div>
</div>
