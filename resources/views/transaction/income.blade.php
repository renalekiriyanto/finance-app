@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Income</h2>
            <div>
                <button
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Income
                </button>
            </div>
        </div>

        <!-- Filter -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                    <select
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>This Month</option>
                        <option>Last Month</option>
                        <option>Custom Range</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>All Categories</option>
                        <option>Salary</option>
                        <option>Freelance</option>
                        <option>Investment</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Account</label>
                    <select
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>All Accounts</option>
                        <option>Bank BCA</option>
                        <option>Bank Mandiri</option>
                        <option>Bibit App</option>
                        <option>Cash</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Income List -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Income Transactions</h3>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Export</a>
            </div>

            <div class="divide-y divide-gray-100">
                @if (isset($incomes) && count($incomes) > 0)
                    @foreach ($incomes as $income)
                        <x-transaction-item title="{{ $income['title'] }}" date="{{ $income['date'] }}"
                            description="{{ $income['description'] }}" categoryColor="{{ $income['categoryColor'] }}"
                            categoryIcon="{{ $income['categoryIcon'] }}"
                            amount="Rp {{ number_format($income['amount'], 0, ',', '.') }}" amountColor="text-green-600"
                            account="{{ $income['account'] }}" />
                    @endforeach
                @else
                    <x-empty-state title="No Income Records"
                        description="You haven't recorded any income yet. Add your first income record to get started."
                        actionText="Add Income" actionLink="#" />
                @endif
            </div>
        </div>
    </div>
@endsection
