<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Priority') }}
        </h2>
    </x-slot>

    <div class="row row-cards justify-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="page-header d-print-none" aria-label="Page header">
                        <div class="container-xl">
                            <div class="row g-2 align-items-center">
                                <div class="col">
                                    <h1 class="text-2xl font-bold text-gray-900">
                                        Create New Priority
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('admin.priorities.store') }}" method="post" autocomplete="off" novalidate>
                            @csrf
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Priority Name" autocomplete="off" value="{{ old('name') }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="flex items-center justify-center gap-4 mt-4">
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
