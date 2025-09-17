<div class="space-y-6">

    <div>
        <flux:input wire:model="form.title" :label="__('Title')" type="text" autocomplete="form.title"
            placeholder="Title" />
    </div>
    <div>
        <flux:textarea wire:model="form.description" :label="__('Description')" type="text"
            autocomplete="form.description" placeholder="Description" />
    </div>
    <div>
        <flux:input wire:model="form.salary" :label="__('Salary Range (RM)')" type="text" autocomplete="form.salary"
            placeholder="Salary" />
    </div>
    <div class="grid grid-cols-2 gap-6">
        <flux:select wire:model="form.position_id" :label="__('Position')" placeholder="Please Select">
            <flux:select.option value="">-- Please Select --</flux:select.option>

            @foreach ($positions as $position)
                <flux:select.option value="{{ $position->id }}">{{ $position->name }}
                </flux:select.option>
            @endforeach
        </flux:select>

        <flux:select wire:model="form.position_type_id" :label="__('Position Type')" placeholder="Please Select">
            <flux:select.option value="">-- Please Select --</flux:select.option>

            @foreach ($statuses as $status)
                <flux:select.option value="{{ $status->id }}">{{ $status->name }}
                </flux:select.option>
            @endforeach
        </flux:select>
    </div>
    <div class="grid grid-cols-2 gap-6">
        <flux:input wire:model="form.start_date" :label="__('Start Date')" type="date" autocomplete="form.start_date"
            placeholder="Start Date" />
        <flux:input wire:model="form.end_date" :label="__('End Date')" type="date" autocomplete="form.end_date"
            placeholder="End Date" />
    </div>


    <div>
        <flux:field variant="inline">
            <flux:label>Activate this posting</flux:label>
            <flux:switch wire:model="form.is_active" />
            <flux:error name="form.is_active" />
        </flux:field>
    </div>

    <div class="flex items-center gap-2">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
        <flux:button :href="route('job-postings.index')">{{ __('Back') }}</flux:button>
    </div>
</div>
