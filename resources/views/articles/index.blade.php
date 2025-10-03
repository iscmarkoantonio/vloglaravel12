<x-layouts.app :title="__('Articles | List')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <a href="{{ route('articles.create') }}"
            class="w-40 whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Create
            Articles</a>

        <!-- danger Alert -->
        @if ($message = Session::get('success'))
            <div x-data="{ alertIsVisible: true }" x-show="alertIsVisible"
                class="relative w-full overflow-hidden rounded-radius bg-surface text-on-surface dark:bg-surface-dark dark:text-on-surface-dark"
                role="alert" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <div class="flex w-full items-center gap-2 bg-danger/10 p-4">
                    <div class="bg-danger/15 text-danger rounded-full p-1" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2">
                        <h3 class="text-sm font-semibold text-danger">Article messages</h3>
                        <p class="text-xs font-medium sm:text-sm">{{ $message }}</p>
                    </div>
                    <button type="button" @click="alertIsVisible = false" class="ml-auto" aria-label="dismiss alert">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                            stroke="currentColor" fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        <!--end danger Alert -->

        <div
            class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                <thead
                    class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                    <tr>
                        <th scope="col" class="p-4 font-semibold">Article ID</th>
                        <th scope="col" class="p-4">Title</th>
                        <th scope="col" class="p-4">Author</th>
                        <th scope="col" class="p-4">Published</th>
                        <th scope="col" class="p-4">Created At</th>
                        <th scope="col" class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline dark:divide-outline-dark">
                    {{-- @forelse ([] as $article) --}}
                    @forelse ($articles as $article)
                        <tr>
                            <td class="p-4">{{ $article->id }}</td>
                            <td class="p-4">{{ $article->title }}</td>
                            <td class="p-4">{{ $article->author->name }}</td>
                            <td class="p-4">{{ $article->is_published ? 'Yes' : 'No' }}</td>
                            <td class="p-4">{{ $article->created_at }}</td>
                            <td class="flex items-center p-4 space-x-4">
                                <a href="{{ route('articles.edit', $article) }}"
                                    class="font-medium text-primary underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-primary-dark">Edit</a>
                                <a href="{{ route('articles.show', $article) }}"
                                    class="font-medium text-primary underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-primary-dark">View</a>

                                {{-- <form method="POST" action="{{ route('articles.destroy', $article) }}"
                                    onsubmit="return confirm('Are you sure want to delete this article?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="cursor-pointer font-medium text-danger underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-primary-dark">
                                        Delete
                                    </button>
                                </form> --}}

                                <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="font-medium text-danger underline-offset-2 hover:underline focus:underline focus:outline-hidden dark:text-primary-dark"
                                        type="submit"
                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">
                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                </form>



                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td class="p-4" colspan="6">No Data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</x-layouts.app>
