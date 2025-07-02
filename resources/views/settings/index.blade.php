@extends('layouts.app')
@section('title', 'Setting')
@section('content')
    <div class="mb-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Setting</h2>
            <div>
                <button
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Transaction
                </button>
            </div>
        </div>

        <!-- Monthly Summary -->
        <x-monthly-summary title="October 2023 Summary" statusColor="bg-green-100 text-green-800" period="Current Month"
            totalIncome="15000000" totalExpenses="7500000" savings="7500000" />

        <!-- Recent Transactions -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Recent Transactions</h3>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">View All</a>
            </div>

            <div class="divide-y divide-gray-100">
                <x-transaction-item title="Salary" date="Oct 25, 2023" description="Monthly salary from company"
                    categoryColor="bg-green-100"
                    categoryIcon='<svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                    amount="Rp 12.000.000" amountColor="text-green-600" account="Bank BCA" />

                <x-transaction-item title="Freelance Project" date="Oct 20, 2023" description="Website development project"
                    categoryColor="bg-blue-100"
                    categoryIcon='<svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>'
                    amount="Rp 3.000.000" amountColor="text-blue-600" account="Bank Mandiri" />

                <x-transaction-item title="Kost Payment" date="Oct 15, 2023" description="Monthly kost payment"
                    categoryColor="bg-red-100"
                    categoryIcon='<svg class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>'
                    amount="- Rp 2.500.000" amountColor="text-red-600" account="Bank BCA" />

                <x-transaction-item title="Mutual Fund Investment" date="Oct 10, 2023" description="Monthly investment"
                    categoryColor="bg-purple-100"
                    categoryIcon='<svg class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                    amount="- Rp 1.000.000" amountColor="text-purple-600" account="Bibit App" />
            </div>
        </div>
    </div>
@endsection
