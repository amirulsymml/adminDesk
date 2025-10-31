<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Type') }}
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
                                        Create New Type
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <form action="{{ route('admin.types.store') }}" method="post" autocomplete="off" novalidate>
                            @csrf
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Type Name" autocomplete="off" value="{{ old('name') }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="slug" :value="__('Slug')" />
                                <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" placeholder="type-slug" autocomplete="off" value="{{ old('slug') }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('slug')" />
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
