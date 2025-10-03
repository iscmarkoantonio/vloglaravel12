<x-layouts.app :title="__('Users | Edit')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h2 class="text-xl font-semibold">Edit User: {{ $user->name }}</h2>
        <form method="POST" action="{{ route('users.update', $user) }}" class="mt-8 space-y-4">
            @csrf
            @method('PATCH')

            <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="name" class="w-fit pl-0.5 text-sm">Name</label>
                <input id="name" type="text"
                    class="w-full rounded-radius bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="name" value="{{ old('name', $user->name) }}" placeholder="Enter User's name"
                    autocomplete="name" />
                @error('name')
                    <small class="pl-0.5 text-danger">Error: {{ $message }}</small>
                @enderror
            </div>

            <div class="flex w-full max-w-md flex-col gap-1 text-on-surface dark:text-on-surface-dark">
                <label for="email" class="w-fit pl-0.5 text-sm">Email</label>
                <input id="email" type="email"
                    class="w-full rounded-radius bg-surface-alt px-2 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:cursor-not-allowed disabled:opacity-75 dark:bg-surface-dark-alt/50 dark:focus-visible:outline-primary-dark"
                    name="email" value="{{ old('email', $user->email) }}" placeholder="Enter User's email"
                    autocomplete="email" />
                @error('email')
                    <small class="pl-0.5 text-danger">Error: {{ $message }}</small>
                @enderror
            </div>





            <button type="submit"
                class="whitespace-nowrap rounded-radius bg-primary border border-primary px-4 py-2 text-sm font-medium tracking-wide text-on-primary transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-primary-dark dark:border-primary-dark dark:text-on-primary-dark dark:focus-visible:outline-primary-dark">Edit
                User</button>



        </form>


    </div>
</x-layouts.app>
