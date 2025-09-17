<div class="flow-root">
    <div class="relative mt-2 mb-6 w-full">
        <flux:separator variant="subtle" />
        <flux:heading size="lg" class="mt-6 mb-6">{{ __('Application') }} History</flux:subheading>
    </div>
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
                            Status</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Remarks</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Updated By</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Updated At</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse ($logs as $i => $log)
                        <tr class="even:bg-gray-50" wire:key="{{ $log->id }}">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900">
                                {{ ++$i }}</td>

                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                <flux:badge color="{{ $log->to_status_id == '6' ? 'red' : 'lime' }}">
                                    {{ $log->toStatus->name ?? '-' }}</flux:badge>

                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ $log->remarks ?? '-' }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ $log->creator->full_name ?? '-' }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ $log->creator->created_at ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500">

                                No logs found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
