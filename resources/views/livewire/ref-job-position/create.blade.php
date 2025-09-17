<section class="w-full">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Ref Job Positions') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">Add a new {{ __('Ref Job Position') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="py-2">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="flow-root">
                        <div class="mt-4 overflow-x-auto">
                            <div class="max-w-xl py-2 align-middle">
                                <form method="POST" wire:submit="save" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @include('livewire.ref-job-position.form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
