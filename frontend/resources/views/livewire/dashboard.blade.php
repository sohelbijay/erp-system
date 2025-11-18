<div class="space-y-6">

    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-6 shadow-lg">
        <h2 class="text-2xl font-bold text-blue-700 mb-2">Welcome, {{ session('user.name', 'Guest') }}!</h2>
        <p class="text-gray-700">Here's a quick overview of your ERP system. Use the sidebar or top menu to navigate through modules.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white border border-blue-200 rounded-lg p-6 shadow hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-blue-700">Employees</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">125</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
            <p class="text-gray-500 mt-2 text-sm">Total employees in your organization</p>
        </div>

        <div class="bg-white border border-green-200 rounded-lg p-6 shadow hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-green-700">Stock Items</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">520</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>
            </div>
            <p class="text-gray-500 mt-2 text-sm">Current inventory items available</p>
        </div>

        <div class="bg-white border border-yellow-200 rounded-lg p-6 shadow hover:shadow-xl transition transform hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-yellow-700">Revenue</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">$42,300</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c2 0 4-2 4-4s-2-4-4-4-4 2-4 4 2 4 4 4zM12 12v6m0 0l-3-3m3 3l3-3" />
                    </svg>
                </div>
            </div>
            <p class="text-gray-500 mt-2 text-sm">Total revenue this month</p>
        </div>
    </div>

    <!-- Modules Quick Access -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="/hr" class="block bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-6 hover:shadow-xl transition transform hover:-translate-y-1">
            <h3 class="text-xl font-bold mb-2 text-blue-700">HR Module</h3>
            <p class="text-gray-600">Manage employees, attendance, payroll, and more.</p>
        </a>

        <a href="/inventory" class="block bg-gradient-to-r from-green-50 to-green-100 border border-green-200 rounded-lg p-6 hover:shadow-xl transition transform hover:-translate-y-1">
            <h3 class="text-xl font-bold mb-2 text-green-700">Inventory Module</h3>
            <p class="text-gray-600">Track your stock, suppliers, and purchase orders easily.</p>
        </a>

        <a href="/accounts" class="block bg-gradient-to-r from-yellow-50 to-yellow-100 border border-yellow-200 rounded-lg p-6 hover:shadow-xl transition transform hover:-translate-y-1">
            <h3 class="text-xl font-bold mb-2 text-yellow-700">Accounts Module</h3>
            <p class="text-gray-600">Monitor income, expenses, and financial reports.</p>
        </a>
    </div>

    <!-- Optional Chart Section (placeholder) -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-lg mt-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Monthly Sales Overview</h3>
        <div class="w-full h-64 bg-gray-100 rounded flex items-center justify-center text-gray-400">
            Chart Placeholder
        </div>
    </div>
</div>
