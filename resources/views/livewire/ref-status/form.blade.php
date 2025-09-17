<div class="space-y-6">
    <div>
        <flux:input wire:model="form.name" :label="__('Name')" type="text" autocomplete="form.name"
            placeholder="Name" />
    </div>
    <div>
        <flux:select wire:model="form.parent_id" :label="__('Parent')" placeholder="Please Select">
            <flux:select.option value="">-- Please Select --</flux:select.option>

            @foreach ($parents as $parent)
                <flux:select.option value="{{ $parent->id }}">{{ $parent->name }}
                </flux:select.option>
            @endforeach
        </flux:select>
    </div>

    <div class="flex items-center gap-2">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
        <flux:button :href="route('ref-statuses.index')">{{ __('Back') }}</flux:butt>
    </div>
</div>
