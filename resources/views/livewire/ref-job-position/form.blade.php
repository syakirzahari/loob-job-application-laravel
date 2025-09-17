<div class="space-y-6">

    <div>
        <flux:input wire:model="form.name" :label="__('Name')" type="text" autocomplete="form.name"
            placeholder="Name" />
    </div>
    <div>
        <flux:select wire:model="form.is_active" :label="__('Status')" placeholder="Please Select">
            <flux:select.option value="">-- Please Select --</flux:select.option>
            <flux:select.option value="1">Active</flux:select.option>
            <flux:select.option value="0">Not Active</flux:select.option>
        </flux:select>
    </div>

    <div class="flex items-center gap-2">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
        <flux:button :href="route('ref-job-positions.index')">{{ __('Back') }}</flux:butt>

    </div>
</div>
