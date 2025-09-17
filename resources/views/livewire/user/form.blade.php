<div class="space-y-6">

    <div>
        <flux:input wire:model="form.name" :label="__('Name')" type="text" autocomplete="form.name"
            placeholder="Name" />
    </div>
    <div>
        <flux:input wire:model="form.full_name" :label="__('Full Name')" type="text" autocomplete="form.full_name"
            placeholder="Full Name" />
    </div>
    <div>
        <flux:input wire:model="form.email" :label="__('Email')" type="text" autocomplete="form.email"
            placeholder="Email" />
    </div>

    <div class="flex items-center gap-2">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
        <flux:button :href="route('users.index')">{{ __('Back') }}</flux:butt>
    </div>
</div>
