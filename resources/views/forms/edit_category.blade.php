<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
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
                                    Edit Category
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
                                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post" autocomplete="off" novalidate>
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Select Department
                                            </label>
                                            <select class="form-select" name="department_id" required>
                                                <option value="">Choose department</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}" {{ old('department_id', $category->department_id) == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label">
                                                Name
                                            </label>
                                            <div class="input-group input-group-flat">
                                                <input type="text" name="name" class="form-control" placeholder="Category Name" autocomplete="off" value="{{ old('name', $category->name) }}">
                                            </div>
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-primary w-100">Update</button>
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