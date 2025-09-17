<div class="space-y-6">

    <div class="grid grid-cols-2 gap-6">
        <flux:input readonly variant="filled" wire:model="form.reference_no" :label="__('Reference No')" type="text"
            autocomplete="form.reference_no" placeholder="Reference No" />

        <flux:input readonly variant="filled" wire:model="form.job_posting_id" :label="__('Job Posting Id')" type="text"
            autocomplete="form.job_posting_id" placeholder="Job Posting Id" />
    </div>

    <div>
        <flux:input readonly variant="filled" wire:model="form.applicant_name" :label="__('Applicant Name')"
            type="text" autocomplete="form.applicant_name" placeholder="Applicant Name" />
    </div>
    <div>
        <flux:input readonly variant="filled" wire:model="form.applicant_email" :label="__('Applicant Email')"
            type="text" autocomplete="form.applicant_email" placeholder="Applicant Email" />
    </div>
    <div>
        <flux:input readonly variant="filled" wire:model="form.applicant_phone" :label="__('Applicant Phone')"
            type="text" autocomplete="form.applicant_phone" placeholder="Applicant Phone" />
    </div>
    <div>
        <flux:input readonly variant="filled" wire:model="form.applicant_address" :label="__('Applicant Address')"
            type="text" autocomplete="form.applicant_address" placeholder="Applicant Address" />
    </div>
    <div>
        <flux:input wire:model="form.expected_salary" :label="__('Expected Salary')" type="text"
            autocomplete="form.expected_salary" placeholder="Expected Salary" />
    </div>
    <div>
        <flux:textarea readonly wire:model="form.description" :label="__('Description')" type="text"
            autocomplete="form.description" placeholder="Description" />
    </div>
    <div class="grid grid-cols-2 gap-6">
        <flux:select wire:model="form.status_id" :label="__('Status')" placeholder="Please Select">
            <flux:select.option value="">-- Please Select --</flux:select.option>

            @foreach ($statuses as $status)
                <flux:select.option value="{{ $status->id }}">{{ $status->name }}
                </flux:select.option>
            @endforeach
        </flux:select>

        <flux:input wire:model="form.interview_date" :label="__('Interview Date')" type="date"
            autocomplete="form.interview_date" placeholder="Interview Date" />
    </div>
    <div>
        <flux:textarea wire:model="form.evaluation_remark" :label="__('Evaluation Remark')" type="text"
            autocomplete="form.evaluation_remark" placeholder="Evaluation Remark" />
    </div>

    <div class="flex items-center gap-2">
        <flux:button variant="primary" type="submit">{{ __('Submit') }}</flux:button>
        <flux:button :href="route('applications.index')">{{ __('Back') }}</flux:butt>

    </div>
</div>
