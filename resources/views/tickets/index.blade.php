<x-app-layout>
    <x-slot name="header">
        {{ __('Tickets') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Tickets</h1>
                        <p class="text-sm text-gray-600 mt-1">Manage and track support tickets efficiently</p>
                    </div>

                    <button type="button" onclick="window.location='{{ route('tickets.create') }}'" class="btn btn-secondary">
                        Create New Ticket
                    </button>
                </div>

                <div class="card-header">
                    <h3 class="text-lg font-medium text-gray-900">Filter Tickets</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tickets.index') }}" method="GET">
                        <div class="row">
                            <div class="col-2">
                                <label for="status_id" class="block font-medium text-sm text-gray-700">Status</label>
                                <select name="status_id" id="status_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Filter by Status</option>
                                    @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ request('status_id') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="priority_id" class="block font-medium text-sm text-gray-700">Priority</label>
                                <select name="priority_id" id="priority_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Filter by Priority</option>
                                    @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}" {{ request('priority_id') == $priority->id ? 'selected' : '' }}>{{ $priority->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="type_id" class="block font-medium text-sm text-gray-700">Type</label>
                                <select name="type_id" id="type_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Filter by Type</option>
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="department_id" class="block font-medium text-sm text-gray-700">Department</label>
                                <select name="department_id" id="department_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Filter by Department</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="category_id" class="block font-medium text-sm text-gray-700">Category</label>
                                <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Filter by Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="customer_id" class="block font-medium text-sm text-gray-700">Customer</label>
                                <select name="customer_id" id="customer_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Filter by Customer</option>
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-primary"> Apply Filters </button>
                        </div>
                    </form>
                </div>

                <div class="row row-deck row-cards my-3">
                    <div class="col-12">
                        <div class="card pa-2">
                            <div class="card-table">
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-mobile-md card-table">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($tickets as $ticket)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $ticket->id }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ticket->subject }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $ticket->status?->name }}</span></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $ticket->priority?->name }}</span></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $ticket->type?->name }}</span></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ticket->department?->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ticket->category?->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $ticket->customer?->first_name }} {{ $ticket->customer?->last_name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ticket->created_at->format('M d, Y') }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex items-center space-x-2">
                                                        <a href="{{ route('tickets.show', $ticket->id) }}" class="text-indigo-600 hover:text-indigo-900 px-2 py-1 rounded hover:bg-indigo-50 transition-colors">View</a>
                                                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="text-indigo-600 hover:text-indigo-900 px-2 py-1 rounded hover:bg-indigo-50 transition-colors">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
