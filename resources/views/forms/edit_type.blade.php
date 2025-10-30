<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Type') }}
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
                                    Edit Type
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
                                    <form action="{{ route('admin.types.update', $type->id) }}" method="post" autocomplete="off" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="block font-medium text-sm text-gray-700">
                                                Name
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Type Name" autocomplete="off" value="{{ old('name', $type->name) }}">
                                            </div>
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="block font-medium text-sm text-gray-700">
                                                Slug
                                            </label>
                                            <div class="mt-1">
                                                <input type="text" name="slug" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="type-slug" autocomplete="off" value="{{ old('slug', $type->slug) }}">
                                            </div>
                                            @error('slug')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="flex items-center justify-end mt-4">
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                                        </div>
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