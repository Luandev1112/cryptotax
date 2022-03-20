<form wire:submit.prevent="save">
    {{ $this->form }}

    <div class="flex justify-center gap-3 mt-6">
        @if($cancel)<x-button tag="a" :href="$cancel">{{ __("Cancel") }}</x-button>@endif
        <x-button type="submit">{{ __("Save") }}</x-button>
    </div>
</form>
