<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="page-header d-print-none" aria-label="Page header">
                    <div class="container-xl">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <h1 class="text-2xl font-bold text-gray-900">
                                    Edit Status
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-deck row-cards my-3">
                    <div class="col-12">
                        <div class="card pa-2">
                            <div class="card-table">
                                <div class="overflow-x-auto">
                                    <form action="{{ route('admin.statuses.update', $status->id) }}" method="post" autocomplete="off" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Status Name" autocomplete="off" value="{{ old('name', $status->name) }}" />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>
                                        <div class="mb-3">
                                            <x-input-label for="slug" :value="__('Slug')" />
                                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" placeholder="status-slug" autocomplete="off" value="{{ old('slug', $status->slug) }}" />
                                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                                        </div>
                                        <div class="flex items-center justify-end mt-4">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>