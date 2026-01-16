<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AO KNITTING - Communication Tracking</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Your existing styles remain the same */
        .sidebar {
            width: 220px; /* Reduced from 260px */
            background: white;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .dark .sidebar {
            background-color: #1f2937;
        }
        
        .sidebar.collapsed {
            width: 70px; /* Reduced from 80px */
        }
        
        .sidebar.collapsed .sidebar-text {
            display: none;
        }
        
        .sidebar-item {
            border-radius: 0.5rem;
            transition: background-color 0.2s;
        }
        
        .sidebar-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }
        
        .sidebar-item.active {
            background-color: rgba(59, 130, 246, 0.1);
            color: #2563eb;
        }
        
        .main-content {
            transition: margin-left 0.3s ease;
        }
        
        .card {
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            background: white;
        }
        
        .dark .card {
            background-color: #374151;
            border-color: #4b5563;
        }
        
        .bg-blue-theme {
            background-color: #2563eb;
        }
        
        .text-blue-theme {
            color: #2563eb;
        }
        
        .bg-yellow-theme {
            background-color: #fbbf24;
        }
        
        .text-yellow-theme {
            color: #fbbf24;
        }
        
        /* Mobile sidebar */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                height: 100vh;
                top: 0;
                left: 0;
                width: 220px;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Mobile Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="mobile-overlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar fixed h-screen border-r border-gray-200 dark:border-gray-700 flex flex-col py-6 px-4 overflow-y-auto" id="sidebar">
        <div class="flex items-center justify-between px-2 mb-8">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-blue-theme flex items-center justify-center">
                    <i class="fas fa-warehouse text-white text-xl"></i>
                </div>
                <span class="font-bold text-xl text-gray-900 dark:text-white sidebar-text">AO KNITTING</span>
            </div>
            <button class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700" id="sidebar-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <nav class="flex-1 space-y-2">
            <!-- CRM Menu -->
            <div class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 sidebar-text">
                Customer Relationship
            </div>
            
            <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-users w-6 text-center"></i>
                <span class="sidebar-text">Customer Information</span>
            </a>
            
            <a href="{{ route('dashboard.contract') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-file-contract w-6 text-center"></i>
                <span class="sidebar-text">Contracts & Agreements</span>
            </a>
            
            <a href="{{ route('dashboard.communication') }}" class="sidebar-item  flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-comments w-6 text-center"></i>
                <span class="sidebar-text">Communication Tracking</span>
            </a>
            
            <a href="{{ route('dashboard.history') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-chart-line w-6 text-center"></i>
                <span class="sidebar-text">Sales Analytics</span>
            </a>
            
            <a href="{{ route('dashboard.support') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-headset w-6 text-center"></i>
                <span class="sidebar-text">Customer Support</span>
            </a>
            
            <a href="{{ route('dashboard.prospect') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-bullseye w-6 text-center"></i>
                <span class="sidebar-text">Leads & Prospects</span>
            </a>
            
            <a href="{{ route('dashboard.quote') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-file-invoice-dollar w-6 text-center"></i>
                <span class="sidebar-text">Quotations</span>
            </a>
            
            <a href="{{ route('dashboard.sales') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-shopping-cart w-6 text-center"></i>
                <span class="sidebar-text">Sales Orders</span>
            </a>
            
            <!-- DMS Menu -->
            <div class="px-4 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2 mt-6 sidebar-text">
                Document Management
            </div>
            
            <a href="{{ route('dashboard.docs') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-folder w-6 text-center"></i>
                <span class="sidebar-text">Employee Documents</span>
            </a>
            
            <a href="{{ route('dashboard.versioning') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-code-branch w-6 text-center"></i>
                <span class="sidebar-text">File Versioning</span>
            </a>
            
            <a href="{{ route('dashboard.customer-contracts') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-handshake w-6 text-center"></i>
                <span class="sidebar-text">Customer Contracts</span>
            </a>
            
            <a href="{{ route('dashboard.accounting') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-calculator w-6 text-center"></i>
                <span class="sidebar-text">Financial Accounting</span>
            </a>
            
            <a href="{{ route('dashboard.supplier-agreements') }}" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                <i class="fas fa-truck w-6 text-center"></i>
                <span class="sidebar-text">Supplier Agreements</span>
            </a>
        </nav>
        
        <div class="mt-auto pt-6 border-t border-gray-200 dark:border-gray-700">
            <div class="space-y-2">
                <a href="#" class="sidebar-item flex items-center space-x-3 py-3 px-4">
                    <i class="fas fa-cog w-6 text-center"></i>
                    <span class="sidebar-text">Settings</span>
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="sidebar-item flex items-center space-x-3 py-3 px-4">
                    <i class="fas fa-sign-out-alt w-6 text-center"></i>
                    <span class="sidebar-text">Logout</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content h-screen flex flex-col" id="main-content">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 py-4 px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold">Communication Tracking</h1>
                    <p class="text-gray-500 dark:text-gray-400">Track all customer communications and interactions</p>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="md:hidden p-2" id="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <div class="relative">
                        <button class="relative p-2">
                            <i class="fas fa-bell"></i>
                            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                    </div>
                    
                    <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                        <span class="font-medium">AD</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <div class="max-w-6xl mx-auto">
                <!-- Welcome Card -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-8 mb-8 text-white">
                    <h2 class="text-2xl font-bold mb-4">Communication Dashboard 📞</h2>
                    <p class="mb-6">Track all customer interactions, calls, emails, and meetings in one place.</p>
                    <div class="flex space-x-4">
                        <button class="bg-white text-blue-600 px-6 py-2 rounded-lg font-medium hover:bg-blue-50">
                            <i class="fas fa-plus mr-2"></i> Log New Communication
                        </button>
                        <button class="border-2 border-white px-6 py-2 rounded-lg font-medium hover:bg-white/10">
                            <i class="fas fa-filter mr-2"></i> Filter Communications
                        </button>
                    </div>
                </div>

                <!-- Communication Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="card p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Total Calls</p>
                                <h3 class="text-2xl font-bold">248</h3>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                <i class="fas fa-phone text-blue-600 dark:text-blue-300"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Emails Sent</p>
                                <h3 class="text-2xl font-bold">156</h3>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                <i class="fas fa-envelope text-green-600 dark:text-green-300"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Meetings</p>
                                <h3 class="text-2xl font-bold">42</h3>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center">
                                <i class="fas fa-calendar-check text-yellow-600 dark:text-yellow-300"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Follow-ups</p>
                                <h3 class="text-2xl font-bold">18</h3>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center">
                                <i class="fas fa-clock text-red-600 dark:text-red-300"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Communications -->
                <div class="card p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold">Recent Communications</h3>
                        <button class="text-blue-theme hover:text-blue-700">
                            <i class="fas fa-sync-alt mr-2"></i> Refresh
                        </button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th class="text-left py-3 px-4">Customer</th>
                                    <th class="text-left py-3 px-4">Type</th>
                                    <th class="text-left py-3 px-4">Subject</th>
                                    <th class="text-left py-3 px-4">Date</th>
                                    <th class="text-left py-3 px-4">Status</th>
                                    <th class="text-left py-3 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium">JK</span>
                                            </div>
                                            <span>John Knitwear</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            <i class="fas fa-phone mr-2"></i> Call
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">Order #4567 Follow-up</td>
                                    <td class="py-3 px-4">Today, 10:30 AM</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-theme hover:text-blue-700 mr-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-green-600 hover:text-green-800">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-3">
                                                <span class="text-sm font-medium">SF</span>
                                            </div>
                                            <span>Smith Fabrics</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            <i class="fas fa-envelope mr-2"></i> Email
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">Quotation Request</td>
                                    <td class="py-3 px-4">Yesterday, 2:15 PM</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                            Pending
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-theme hover:text-blue-700 mr-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-green-600 hover:text-green-800">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        
        function toggleSidebar() {
            if (window.innerWidth < 1024) {
                // Mobile behavior
                sidebar.classList.toggle('active');
                mobileOverlay.classList.toggle('hidden');
                document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
            } else {
                // Desktop behavior
                sidebar.classList.toggle('collapsed');
                mainContent.style.marginLeft = sidebar.classList.contains('collapsed') ? '70px' : '220px';
            }
        }
        
        function closeSidebar() {
            sidebar.classList.remove('active');
            mobileOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        }
        
        // Event listeners
        sidebarToggle.addEventListener('click', toggleSidebar);
        mobileMenuToggle.addEventListener('click', toggleSidebar);
        mobileOverlay.addEventListener('click', closeSidebar);
        
        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            if (window.innerWidth < 1024) {
                mainContent.style.marginLeft = '0';
            } else {
                mainContent.style.marginLeft = '220px'; // Default expanded state
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth < 1024) {
                mainContent.style.marginLeft = '0';
                sidebar.classList.remove('collapsed');
            } else {
                mainContent.style.marginLeft = sidebar.classList.contains('collapsed') ? '70px' : '220px';
                sidebar.classList.remove('active');
                mobileOverlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>