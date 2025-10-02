<x-layouts.app :title="__('Articles | Create')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h2 class="text-xl font-semibold">Create Article</h2>
        <form method="POST" action="{{ route('articles.store') }}" class="mt-8 space-y-4">
            @csrf
            <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="title" class="w-fit pl-0.5 text-sm">Title</label>
                <input id="title" type="text"
                    class="w-full rounded-radius bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="title" value="{{ old('title') }}" placeholder="Enter Article's title"
                    autocomplete="title" />
                @error('title')
                    <small class="pl-0.5 text-danger">Error: {{ $message }}</small>
                @enderror
            </div>

            <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="content" class="w-fit pl-0.5 text-sm">Content</label>
                <textarea id="content" name="content"
                    class="w-full rounded-radius bg-surface-alt px-2.5 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    rows="3" placeholder="Type the Article's content">{{ old('content') }}</textarea>
                @error('content')
                    <small class="pl-0.5 text-danger">Error: {{ $message }}</small>
                @enderror
            </div>

            <label for="is_published"
                class="flex items-center gap-2 text-sm font-medium text-on-surface dark:text-on-surface-dark has-checked:text-on-surface-strong dark:has-checked:text-on-surface-dark-strong has-disabled:cursor-not-allowed has-disabled:opacity-75">
                <span class="relative flex items-center">
                    <input id="is_published" type="checkbox" value="1" name="is_published"
                        class="before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-none bg-surface-alt before:absolute before:inset-0 checked:before:bg-primary focus:outline-2 focus:outline-offset-2 focus:outline-outline-strong checked:focus:outline-primary active:outline-offset-0 disabled:cursor-not-allowed dark:bg-surface-dark-alt dark:checked:before:bg-primary-dark dark:focus:outline-outline-dark-strong dark:checked:focus:outline-primary-dark" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="4"
                        class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-on-primary peer-checked:visible dark:text-on-primary-dark">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </span>
                <span>Published</span>
            </label>

            <button type="submit"
                class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Create
                Article</button>



        </form>


    </div>
</x-layouts.app>
