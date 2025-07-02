<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen" x-data="financeApp()">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <!-- Logo -->
        <div class="flex items-center justify-center h-16 px-4 bg-blue-600 text-white">
            <i class="fas fa-wallet text-2xl mr-3"></i>
            <h1 class="text-xl font-bold">Finance Manager</h1>
        </div>

        <!-- Navigation -->
        <nav class="mt-8">
            <div class="px-4 space-y-2">
                <a @click="currentView = 'dashboard'"
                   :class="currentView === 'dashboard' ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-600 hover:bg-gray-50'"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg cursor-pointer transition-colors">
                    <i class="fas fa-home mr-3"></i>
                    Dashboard
                </a>

                <a @click="currentView = 'accounts'"
                   :class="currentView === 'accounts' ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-600 hover:bg-gray-50'"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg cursor-pointer transition-colors">
                    <i class="fas fa-university mr-3"></i>
                    Rekening & Cash
                </a>

                <a @click="currentView = 'investments'"
                   :class="currentView === 'investments' ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-600 hover:bg-gray-50'"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg cursor-pointer transition-colors">
                    <i class="fas fa-chart-line mr-3"></i>
                    Investasi
                </a>

                <a @click="currentView = 'transactions'"
                   :class="currentView === 'transactions' ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-600 hover:bg-gray-50'"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg cursor-pointer transition-colors">
                    <i class="fas fa-exchange-alt mr-3"></i>
                    Transaksi
                </a>

                <a @click="currentView = 'goals'"
                   :class="currentView === 'goals' ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-600 hover:bg-gray-50'"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg cursor-pointer transition-colors">
                    <i class="fas fa-bullseye mr-3"></i>
                    Target Keuangan
                </a>

                <a @click="currentView = 'reports'"
                   :class="currentView === 'reports' ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-600 hover:bg-gray-50'"
                   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg cursor-pointer transition-colors">
                    <i class="fas fa-chart-bar mr-3"></i>
                    Laporan
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Bar -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between h-16 px-4">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-600 hover:text-gray-900">
                    <i class="fas fa-bars text-xl"></i>
                </button>

                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm text-gray-600">Total Saldo</p>
                        <p class="text-lg font-semibold text-green-600" x-text="formatCurrency(totalBalance)"></p>
                    </div>

                    <div class="flex items-center space-x-2">
                        <button @click="showAddModal = true" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah
                        </button>

                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-gray-600 hover:text-gray-900">
                                <i class="fas fa-user-circle text-2xl"></i>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Dashboard View -->
            <div x-show="currentView === 'dashboard'" x-transition>
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Dashboard</h2>

                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Rekening</p>
                                <p class="text-2xl font-bold text-gray-900" x-text="formatCurrency(accountBalance)"></p>
                            </div>
                            <div class="p-3 bg-blue-100 rounded-full">
                                <i class="fas fa-university text-blue-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Total Investasi</p>
                                <p class="text-2xl font-bold text-gray-900" x-text="formatCurrency(investmentBalance)"></p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <i class="fas fa-chart-line text-green-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Pemasukan Bulan Ini</p>
                                <p class="text-2xl font-bold text-green-600" x-text="formatCurrency(monthlyIncome)"></p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <i class="fas fa-arrow-up text-green-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Pengeluaran Bulan Ini</p>
                                <p class="text-2xl font-bold text-red-600" x-text="formatCurrency(monthlyExpense)"></p>
                            </div>
                            <div class="p-3 bg-red-100 rounded-full">
                                <i class="fas fa-arrow-down text-red-600"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Cashflow Bulanan</h3>
                        <canvas id="cashflowChart" height="200"></canvas>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Alokasi Aset</h3>
                        <canvas id="assetChart" height="200"></canvas>
                    </div>
                </div>

                <!-- Recent Transactions -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Transaksi Terbaru</h3>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <template x-for="transaction in recentTransactions" :key="transaction.id">
                            <div class="p-6 flex items-center justify-between hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-full mr-4"
                                         :class="transaction.type === 'income' ? 'bg-green-100' : 'bg-red-100'">
                                        <i class="fas"
                                           :class="transaction.type === 'income' ? 'fa-arrow-up text-green-600' : 'fa-arrow-down text-red-600'"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900" x-text="transaction.title"></p>
                                        <p class="text-sm text-gray-600" x-text="transaction.category"></p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold"
                                       :class="transaction.type === 'income' ? 'text-green-600' : 'text-red-600'"
                                       x-text="(transaction.type === 'income' ? '+' : '-') + formatCurrency(transaction.amount)"></p>
                                    <p class="text-sm text-gray-600" x-text="transaction.date"></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Accounts View -->
            <div x-show="currentView === 'accounts'" x-transition x-cloak>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Rekening & Cash</h2>
                    <button @click="showAccountModal = true" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i>Tambah Rekening
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="account in accounts" :key="account.id">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full mr-3" :class="getAccountIcon(account.type).bg">
                                        <i :class="getAccountIcon(account.type).icon"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900" x-text="account.name"></h3>
                                        <p class="text-sm text-gray-600" x-text="account.type"></p>
                                    </div>
                                </div>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                            <div class="border-t border-gray-200 pt-4">
                                <p class="text-sm text-gray-600 mb-1">Saldo</p>
                                <p class="text-2xl font-bold text-gray-900" x-text="formatCurrency(account.balance)"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Investments View -->
            <div x-show="currentView === 'investments'" x-transition x-cloak>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Investasi</h2>
                    <button @click="showInvestmentModal = true" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        <i class="fas fa-plus mr-2"></i>Tambah Investasi
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <template x-for="investment in investments" :key="investment.id">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="font-semibold text-gray-900" x-text="investment.name"></h3>
                                    <p class="text-sm text-gray-600" x-text="investment.type"></p>
                                </div>
                                <div class="flex space-x-2">
                                    <button @click="showWithdrawModal = true; selectedInvestment = investment"
                                            class="bg-orange-100 text-orange-600 px-3 py-1 rounded-lg text-sm hover:bg-orange-200">
                                        Withdraw
                                    </button>
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Total Invested</p>
                                    <p class="font-semibold text-gray-900" x-text="formatCurrency(investment.totalInvested)"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Current Value</p>
                                    <p class="font-semibold"
                                       :class="investment.currentValue >= investment.totalInvested ? 'text-green-600' : 'text-red-600'"
                                       x-text="formatCurrency(investment.currentValue)"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">P&L</p>
                                    <p class="font-semibold"
                                       :class="(investment.currentValue - investment.totalInvested) >= 0 ? 'text-green-600' : 'text-red-600'"
                                       x-text="formatCurrency(investment.currentValue - investment.totalInvested)"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">P&L %</p>
                                    <p class="font-semibold"
                                       :class="((investment.currentValue - investment.totalInvested) / investment.totalInvested * 100) >= 0 ? 'text-green-600' : 'text-red-600'"
                                       x-text="((investment.currentValue - investment.totalInvested) / investment.totalInvested * 100).toFixed(2) + '%'"></p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </main>
    </div>

    <!-- Modals -->
    <!-- Add Modal -->
    <div x-show="showAddModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" x-transition>
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50" @click="showAddModal = false"></div>
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full z-10">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Tambah Transaksi</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Pemasukan</option>
                                <option>Pengeluaran</option>
                                <option>Transfer</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Makanan</option>
                                <option>Transport</option>
                                <option>Gaji</option>
                                <option>Investasi</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Keterangan transaksi">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <button @click="showAddModal = false" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Withdraw Modal -->
    <div x-show="showWithdrawModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" x-transition>
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50" @click="showWithdrawModal = false"></div>
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full z-10">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Withdraw Investasi</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Withdraw</label>
                            <input type="number" x-model="withdrawForm.amount" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rekening Tujuan</label>
                            <select x-model="withdrawForm.accountId" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <template x-for="account in accounts" :key="account.id">
                                    <option :value="account.id" x-text="account.name + ' - ' + account.type"></option>
                                </template>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Biaya Admin (Opsional)</label>
                            <input type="number" x-model="withdrawForm.adminFee" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Kosongkan jika otomatis">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Diterima</label>
                            <input type="number" x-model="withdrawForm.receivedAmount" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                        </div>
                    </div>
                    <div class="flex justify-end space-x-3 mt-6">
                        <button @click="showWithdrawModal = false" class="px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                        <button @click="processWithdraw()" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                            Proses Withdraw
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function financeApp() {
            return {
                sidebarOpen: false,
                currentView: 'dashboard',
                showAddModal: false,
                showAccountModal: false,
                showInvestmentModal: false,
                showWithdrawModal: false,
                selectedInvestment: null,
                withdrawForm: {
                    amount: 0,
                    accountId: '',
                    adminFee: '',
                    receivedAmount: 0
                },

                // Sample data
                totalBalance: 150000000,
                accountBalance: 75000000,
                investmentBalance: 75000000,
                monthlyIncome: 12000000,
                monthlyExpense: 8500000,

                accounts: [
                    { id: 1, name: 'BCA Utama', type: 'Bank', balance: 25000000 },
                    { id: 2, name: 'Cash Wallet', type: 'Cash', balance: 5000000 },
                    { id: 3, name: 'Mandiri Saving', type: 'Bank', balance: 45000000 }
                ],

                investments: [
                    { id: 1, name: 'Saham BBCA', type: 'Saham', totalInvested: 20000000, currentValue: 25000000 },
                    { id: 2, name: 'Reksadana Pendapatan Tetap', type: 'Reksadana', totalInvested: 30000000, currentValue: 32000000 },
                    { id: 3, name: 'Saham TLKM', type: 'Saham', totalInvested: 15000000, currentValue: 18000000 }
                ],

                recentTransactions: [
                    { id: 1, title: 'Gaji Bulanan', category: 'Salary', type: 'income', amount: 10000000, date: '2025-07-01' },
                    { id: 2, title: 'Belanja Groceries', category: 'Food', type: 'expense', amount: 500000, date: '2025-07-02' },
                    { id: 3, title: 'Investasi Saham', category: 'Investment', type: 'expense', amount: 2000000, date: '2025-07-02' },
                    { id: 4, title: 'Dividend BBCA', category: 'Investment', type: 'income', amount: 150000, date: '2025-07-03' }
                ],

                init() {
                    this.initCharts();
                },

                formatCurrency(amount) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(amount);
                },

                getAccountIcon(type) {
                    const icons = {
                        'Bank': { icon: 'fas fa-university text-blue-600', bg: 'bg-blue-100' },
                        'Cash': { icon: 'fas fa-wallet text-green-600', bg: 'bg-green-100' },
                        'Digital Wallet': { icon: 'fas fa-mobile-alt text-purple-600', bg: 'bg-purple-100' }
                    };
                    return icons[type] || icons['Bank'];
                },

                processWithdraw() {
                    // Logic untuk proses withdraw
                    console.log('Processing withdraw:', this.withdrawForm);
                    this.showWithdrawModal = false;
                    // Reset form
                    this.withdrawForm = { amount: 0, accountId: '', adminFee: '', receivedAmount: 0 };
                },

                initCharts() {
                    this.$nextTick(() => {
                        // Cashflow Chart
                        const cashflowCtx = document.getElementById('cashflowChart');
                        if (cashflowCtx) {
                            new Chart(cashflowCtx, {
                                type: 'line',
                                data: {
                                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                                    datasets: [{
                                        label: 'Pemasukan',
                                        data: [10000000, 11000000, 9500000, 12000000, 10500000, 11500000, 12000000],
                                        borderColor: 'rgb(34, 197, 94)',
                                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                                        tension: 0.4
                                    }, {
                                        label: 'Pengeluaran',
                                        data: [8000000, 8500000, 7500000, 9000000, 8200000, 8800000, 8500000],
                                        borderColor: 'rgb(239, 68, 68)',
                                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                                        tension: 0.4
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                callback: function(value) {
                                                    return 'Rp ' + (value / 1000000) + 'M';
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        }

                        // Asset Allocation Chart
                        const assetCtx = document.getElementById('assetChart');
                        if (assetCtx) {
                            new Chart(assetCtx, {
                                type: 'doughnut',
                                data: {
                                    labels: ['Rekening Bank', 'Cash', 'Saham', 'Reksadana'],
                                    datasets: [{
                                        data: [70000000, 5000000, 43000000, 32000000],
                                        backgroundColor: [
                                            'rgb(59, 130, 246)',
                                            'rgb(34, 197, 94)',
                                            'rgb(168, 85, 247)',
                                            'rgb(249, 115, 22)'
                                        ],
                                        borderWidth: 2,
                                        borderColor: '#ffffff'
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'bottom',
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    const value = context.parsed;
                                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                                    const percentage = ((value / total) * 100).toFixed(1);
                                                    return context.label + ': Rp ' + (value / 1000000).toFixed(1) + 'M (' + percentage + '%)';
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    });
                }
            }
        }
    </script>
</body>
</html>
