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
        .sidebar {
            width: 220px;
            background: white;
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .dark .sidebar {
            background-color: #1f2937;
        }
        
        .sidebar.collapsed {
            width: 70px;
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
        
        .timeline-item {
            position: relative;
            padding-left: 2rem;
        }
        
        .timeline-item:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #2563eb;
        }
        
        .timeline-item:after {
            content: '';
            position: absolute;
            left: 5px;
            top: 12px;
            width: 2px;
            height: calc(100% - 12px);
            background: #e5e7eb;
        }
        
        .timeline-item:last-child:after {
            display: none;
        }
        
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
            
            <a href="{{ route('dashboard.communication') }}" class="sidebar-item active flex items-center space-x-3 py-3 px-4">
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
                    <p class="text-gray-500 dark:text-gray-400">Track all customer interactions, calls, emails, and meetings with audit logs</p>
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
            <div class="max-w-7xl mx-auto">
                <!-- Welcome Card -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-8 mb-8 text-white">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-2xl font-bold mb-4">Customer Communication Hub 📞</h2>
                            <p class="mb-6">Track all customer interactions, calls, emails, and meetings with complete audit trail.</p>
                        </div>
                        <button class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 flex items-center">
                            <i class="fas fa-plus mr-2"></i> Log New Interaction
                        </button>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="card p-6 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Today's Interactions</p>
                                <h3 class="text-2xl font-bold">18</h3>
                                <p class="text-green-600 text-sm mt-1"><i class="fas fa-arrow-up mr-1"></i> 24% from yesterday</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                <i class="fas fa-comments text-blue-600 dark:text-blue-300 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card p-6 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Pending Follow-ups</p>
                                <h3 class="text-2xl font-bold">7</h3>
                                <p class="text-yellow-600 text-sm mt-1"><i class="fas fa-clock mr-1"></i> 2 overdue</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center">
                                <i class="fas fa-clock text-yellow-600 dark:text-yellow-300 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card p-6 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Avg Response Time</p>
                                <h3 class="text-2xl font-bold">2.4h</h3>
                                <p class="text-green-600 text-sm mt-1"><i class="fas fa-check mr-1"></i> Within SLA</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                <i class="fas fa-bolt text-green-600 dark:text-green-300 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card p-6 hover:shadow-lg transition-shadow">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Customer Satisfaction</p>
                                <h3 class="text-2xl font-bold">94%</h3>
                                <p class="text-green-600 text-sm mt-1"><i class="fas fa-smile mr-1"></i> Excellent</p>
                            </div>
                            <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                                <i class="fas fa-star text-purple-600 dark:text-purple-300 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Communications with Timeline -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                    <!-- Recent Communications -->
                    <div class="lg:col-span-2">
                        <div class="card p-6">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-xl font-bold">Recent Communications</h3>
                                <div class="flex space-x-2">
                                    <button class="text-blue-theme hover:text-blue-700 px-3 py-1 rounded">
                                        <i class="fas fa-filter mr-2"></i> Filter
                                    </button>
                                    <button class="text-blue-theme hover:text-blue-700 px-3 py-1 rounded">
                                        <i class="fas fa-download mr-2"></i> Export
                                    </button>
                                </div>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                            <th class="text-left py-3 px-4">Customer</th>
                                            <th class="text-left py-3 px-4">Channel</th>
                                            <th class="text-left py-3 px-4">Subject</th>
                                            <th class="text-left py-3 px-4">Date/Time</th>
                                            <th class="text-left py-3 px-4">Status</th>
                                            <th class="text-left py-3 px-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mr-3">
                                                        <span class="text-sm font-medium">JK</span>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium">John Knitwear</div>
                                                        <div class="text-xs text-gray-500">Order #7892</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                    <i class="fas fa-phone mr-2"></i> Call
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">Production Delay Update</td>
                                            <td class="py-3 px-4">
                                                <div class="text-sm">Today, 10:30 AM</div>
                                                <div class="text-xs text-gray-500">By: Alex D.</div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    <i class="fas fa-check-circle mr-1"></i> Completed
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex space-x-2">
                                                    <button class="text-blue-600 hover:text-blue-800" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-purple-600 hover:text-purple-800" title="Follow-up">
                                                        <i class="fas fa-redo"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mr-3">
                                                        <span class="text-sm font-medium">SF</span>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium">Smith Fabrics</div>
                                                        <div class="text-xs text-gray-500">New Inquiry</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                                    <i class="fas fa-envelope mr-2"></i> Email
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">Bulk Order Quotation</td>
                                            <td class="py-3 px-4">
                                                <div class="text-sm">Yesterday, 2:15 PM</div>
                                                <div class="text-xs text-gray-500">By: Sarah M.</div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                    <i class="fas fa-clock mr-1"></i> Pending Reply
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex space-x-2">
                                                    <button class="text-blue-600 hover:text-blue-800" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-red-600 hover:text-red-800" title="Urgent">
                                                        <i class="fas fa-exclamation"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800">
                                            <td class="py-3 px-4">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center mr-3">
                                                        <span class="text-sm font-medium">TF</span>
                                                    </div>
                                                    <div>
                                                        <div class="font-medium">Taylor Fabrics Ltd.</div>
                                                        <div class="text-xs text-gray-500">Contract Renewal</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                                    <i class="fas fa-video mr-2"></i> Meeting
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">Annual Contract Review</td>
                                            <td class="py-3 px-4">
                                                <div class="text-sm">Tomorrow, 3:00 PM</div>
                                                <div class="text-xs text-gray-500">Scheduled</div>
                                            </td>
                                            <td class="py-3 px-4">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                    <i class="fas fa-calendar-check mr-1"></i> Scheduled
                                                </span>
                                            </td>
                                            <td class="py-3 px-4">
                                                <div class="flex space-x-2">
                                                    <button class="text-blue-600 hover:text-blue-800" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button class="text-green-600 hover:text-green-800" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="text-yellow-600 hover:text-yellow-800" title="Reschedule">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm text-gray-500">
                                        Showing 3 of 248 communications
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button class="px-3 py-1 rounded bg-blue-600 text-white">1</button>
                                        <button class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">2</button>
                                        <button class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">3</button>
                                        <button class="px-3 py-1 rounded border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Activity Timeline -->
                    <div class="lg:col-span-1">
                        <div class="card p-6">
                            <h3 class="text-xl font-bold mb-6">Recent Activity Timeline</h3>
                            
                            <div class="space-y-6">
                                <div class="timeline-item">
                                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <div class="font-medium">Call with John Knitwear</div>
                                            <span class="text-xs text-gray-500">10:30 AM</span>
                                        </div>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Discussed production delay for Order #7892. Customer understood the situation.</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user mr-2"></i>
                                            <span>Alex D.</span>
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-clock mr-1"></i>
                                            <span>15 minutes</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <div class="font-medium">Email to Smith Fabrics</div>
                                            <span class="text-xs text-gray-500">Yesterday, 2:15 PM</span>
                                        </div>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Sent quotation for bulk order. Awaiting customer confirmation.</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user mr-2"></i>
                                            <span>Sarah M.</span>
                                            <span class="mx-2">•</span>
                                            <span class="text-yellow-600">Pending Reply</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <div class="font-medium">Meeting Scheduled</div>
                                            <span class="text-xs text-gray-500">Tomorrow, 3:00 PM</span>
                                        </div>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Annual contract review meeting with Taylor Fabrics Ltd.</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-video mr-2"></i>
                                            <span>Video Conference</span>
                                            <span class="mx-2">•</span>
                                            <span class="text-blue-600">Scheduled</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <div class="font-medium">Follow-up Required</div>
                                            <span class="text-xs text-gray-500">Due: Today, 4:00 PM</span>
                                        </div>
                                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Follow up with Precision Textiles regarding sample approval.</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <i class="fas fa-exclamation-circle mr-2 text-red-500"></i>
                                            <span class="text-red-600">Urgent</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                                <button class="w-full py-2 px-4 border border-dashed border-gray-300 dark:border-gray-600 rounded-lg text-gray-500 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    <i class="fas fa-plus mr-2"></i> Add New Activity
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Communication Channels Summary -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <!-- Channel Distribution -->
                    <div class="card p-6">
                        <h3 class="text-xl font-bold mb-6">Communication Channels</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">Phone Calls</span>
                                    <span class="text-sm text-gray-500">45%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 45%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">Email</span>
                                    <span class="text-sm text-gray-500">35%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: 35%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">Meetings</span>
                                    <span class="text-sm text-gray-500">15%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full" style="width: 15%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium">Other</span>
                                    <span class="text-sm text-gray-500">5%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-yellow-600 h-2 rounded-full" style="width: 5%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Upcoming Schedule -->
                    <div class="card p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold">Upcoming Schedule</h3>
                            <button class="text-blue-theme hover:text-blue-700 text-sm">
                                <i class="fas fa-calendar-plus mr-1"></i> Add Event
                            </button>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center p-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                                <div class="w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-800 flex items-center justify-center mr-3">
                                    <i class="fas fa-video text-blue-600 dark:text-blue-300"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium">Contract Review - Taylor Fabrics</div>
                                    <div class="text-sm text-gray-500">Tomorrow, 3:00 PM • Video Call</div>
                                </div>
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-external-link-alt"></i>
                                </button>
                            </div>
                            
                            <div class="flex items-center p-3 bg-green-50 dark:bg-green-900/20 rounded-lg">
                                <div class="w-12 h-12 rounded-lg bg-green-100 dark:bg-green-800 flex items-center justify-center mr-3">
                                    <i class="fas fa-phone text-green-600 dark:text-green-300"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium">Follow-up - Precision Textiles</div>
                                    <div class="text-sm text-gray-500">Today, 4:00 PM • Phone Call</div>
                                </div>
                                <button class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-external-link-alt"></i>
                                </button>
                            </div>
                            
                            <div class="flex items-center p-3 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                                <div class="w-12 h-12 rounded-lg bg-purple-100 dark:bg-purple-800 flex items-center justify-center mr-3">
                                    <i class="fas fa-users text-purple-600 dark:text-purple-300"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium">Team Meeting</div>
                                    <div class="text-sm text-gray-500">Friday, 10:00 AM • Conference Room</div>
                                </div>
                                <button class="text-purple-600 hover:text-purple-800">
                                    <i class="fas fa-external-link-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="card p-6">
                    <h3 class="text-xl font-bold mb-6">Quick Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <button class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors">
                            <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center mb-3">
                                <i class="fas fa-phone text-blue-600 dark:text-blue-300 text-xl"></i>
                            </div>
                            <span class="font-medium">Log Call</span>
                            <span class="text-sm text-gray-500 mt-1">Record phone conversation</span>
                        </button>
                        
                        <button class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl hover:border-green-500 hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors">
                            <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center mb-3">
                                <i class="fas fa-envelope text-green-600 dark:text-green-300 text-xl"></i>
                            </div>
                            <span class="font-medium">Send Email</span>
                            <span class="text-sm text-gray-500 mt-1">Track email communication</span>
                        </button>
                        
                        <button class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl hover:border-purple-500 hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-colors">
                            <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center mb-3">
                                <i class="fas fa-calendar-plus text-purple-600 dark:text-purple-300 text-xl"></i>
                            </div>
                            <span class="font-medium">Schedule Meeting</span>
                            <span class="text-sm text-gray-500 mt-1">Plan customer meeting</span>
                        </button>
                        
                        <button class="flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl hover:border-yellow-500 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 transition-colors">
                            <div class="w-12 h-12 rounded-full bg-yellow-100 dark:bg-yellow-900 flex items-center justify-center mb-3">
                                <i class="fas fa-tasks text-yellow-600 dark:text-yellow-300 text-xl"></i>
                            </div>
                            <span class="font-medium">Create Task</span>
                            <span class="text-sm text-gray-500 mt-1">Assign follow-up task</span>
                        </button>
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