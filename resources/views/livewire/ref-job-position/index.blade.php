<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Ref Job Positions') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">A list of all the {{ __('Ref Job Positions') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="flex">
                            <div class="relative w-full">
                                <input type="text" wire:model.live.debounce.300ms="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                    placeholder="Search" required="">
                            </div>
                        </div>
                        <div class="sm:flex-auto"></div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <flux:button variant="primary" :href="route('ref-job-positions.create')">{{ __('Add New') }}
                                </flux:butt>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                No</th>

                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Name</th>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                                Status</th>

                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($refJobPositions as $i => $refJobPosition)
                                            <tr class="even:bg-gray-50" wire:key="{{ $refJobPosition->id }}">
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                                    {{ $i + 1 }}</td>

                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $refJobPosition->name }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $refJobPosition->is_active == 1 ? 'Active' : 'Not Active' }}</td>

                                                <td class="px-4 py-3 flex items-center justify-end space-x-2">
                                                    <flux:button size="xs" wire:navigate
                                                        href="{{ route('ref-job-positions.edit', $refJobPosition->id) }}">
                                                        Edit
                                                    </flux:button>
                                                    <flux:button variant="danger" size="xs"
                                                        wire:click="delete({{ $refJobPosition->id }})"
                                                        wire:confirm="Are you sure you want to delete?">Delete
                                                    </flux:button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="py-4 px-3">
                                    <div class="flex ">
                                        <div class="flex space-x-4 items-center mb-3">
                                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                            <select wire:model.live ="perPage"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{ $refJobPositions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
