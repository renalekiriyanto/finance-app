@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Expenses</h2>
            <div>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Expense
                </button>
            </div>
        </div>

        <!-- Filter -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                    <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>This Month</option>
                        <option>Last Month</option>
                        <option>Custom Range</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>All Categories</option>
                        <option>Food & Drinks</option>
                        <option>Housing</option>
                        <option>Transportation</option>
                        <option>Investment</option>
                        <option>Health</option>
                        <option>Other</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Account</label>
                    <select class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option>All Accounts</option>
                        <option>Bank BCA</option>
                        <option>Bank Mandiri</option>
                        <option>Bibit App</option>
                        <option>Cash</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Expense List -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Expense Transactions</h3>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Export</a>
            </div>

            <div class="divide-y divide-gray-100">
                @if(isset($expenses) && count($expenses) > 0)
                    @foreach($expenses as $expense)
                    <x-transaction-item
                        title="{{ $expense['title'] }}"
                        date="{{ $expense['date'] }}"
                        description="{{ $expense['description'] }}"
                        categoryColor="{{ $expense['categoryColor'] }}"
                        categoryIcon="{{ $expense['categoryIcon'] }}"
                        amount="- Rp {{ number_format($expense['amount'], 0, ',', '.') }}"
                        amountColor="text-red-600"
                        account="{{ $expense['account'] }}"
                    />
                    @endforeach
                @else
                    <x-empty-state
                        title="No Expense Records"
                        description="You haven't recorded any expenses yet. Add your first expense record to get started."
                        actionText="Add Expense"
                        actionLink="#"
                    />
                @endif
            </div>
        </div>
    </div>
@endsection

