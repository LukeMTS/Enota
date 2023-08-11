<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('schedule.update', $schedule->id) }}">
        @csrf
        @method('put')
        
        <div>
            <x-input-label for="title" :value="__('Título')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$schedule->title" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Descrição')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$schedule->description" required />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="date" :value="__('Data')" />
            <input type="date" name="date" value="{{ \Carbon\Carbon::parse($schedule->date)->format('Y-m-d') }}" required>
            <x-input-error :messages="$errors->get('date')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Editar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>