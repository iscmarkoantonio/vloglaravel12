<x-layouts.app :title="__('Articles | View')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <article
            class="group rounded-radius flex max-w-md flex-col bg-surface-alt p-6 text-on-surface dark:bg-surface-dark-alt dark:text-on-surface-dark">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                class="size-12 text-on-surface-strong dark:text-on-surface-dark-strong group-hover:scale-105 transition duration-500 ease-out"
                aria-hidden="true">
                <path
                    d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />
            </svg>
            <h2 class="text-md font-semibold">{{ $article->title }}</h2>
            <p class="mt-2 text-pretty text-sm">
                {{ $article->content }}
            </p>
            <!-- avatar & rating -->
            <div class="flex flex-col-reverse md:flex-row md:items-center mt-8 justify-between gap-6">
                <!-- avatar & title -->
                <div class="flex items-center gap-2">
                    <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-1.webp"
                        class="size-10 rounded-full object-cover" alt="avatar" />
                    <div class="flex flex-col gap-1">
                        <h3 class="font-bold leading-4 text-on-surface-strong dark:text-on-surface-dark-strong">
                            {{ $article->author->name }}</h3>
                    </div>
                </div>

                @if ($article->is_published)
                    <span
                        class="rounded-radius w-fit bg-secondary px-2 py-1 text-xs font-medium text-on-secondary dark:bg-secondary-dark dark:text-on-secondary-dark">Published</span>
                @else
                    <span
                        class="rounded-radius w-fit bg-surface-dark-alt px-2 py-1 text-xs font-medium text-on-surface-dark dark:bg-surface-alt dark:text-on-surface">Draft</span>
                @endif
            </div>
            <div class="mt-4">
                <a href="{{ route('articles.edit', $article) }}"
                    class="font-medium text-primary underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-primary-dark">Edit</a>

            </div>
        </article>
    </div>
</x-layouts.app>
