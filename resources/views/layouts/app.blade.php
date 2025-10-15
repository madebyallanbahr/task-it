<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TaskIt')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: 'hsl(0 0% 100%)',
                        foreground: 'hsl(222.2 84% 4.9%)',
                        muted: {
                            DEFAULT: 'hsl(210 40% 98%)',
                            foreground: 'hsl(215.4 16.3% 46.9%)',
                        },
                        border: 'hsl(214.3 31.8% 91.4%)',
                        primary: {
                            DEFAULT: 'hsl(222.2 47.4% 11.2%)',
                            foreground: 'hsl(210 40% 98%)',
                        },
                        secondary: {
                            DEFAULT: 'hsl(210 40% 96%)',
                            foreground: 'hsl(222.2 47.4% 11.2%)',
                        },
                        accent: {
                            DEFAULT: 'hsl(210 40% 96%)',
                            foreground: 'hsl(222.2 47.4% 11.2%)',
                        },
                        destructive: {
                            DEFAULT: 'hsl(0 84.2% 60.2%)',
                            foreground: 'hsl(210 40% 98%)',
                        },
                        warning: {
                            DEFAULT: 'hsl(38 92% 50%)',
                            foreground: 'hsl(210 40% 98%)',
                        },
                        success: {
                            DEFAULT: 'hsl(142 76% 36%)',
                            foreground: 'hsl(210 40% 98%)',
                        },
                    },
                }
            }
        }
    </script>
    
    <!-- Franken-UI CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/franken-ui@2.1.0/dist/css/core.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/franken-ui@2.1.0/dist/css/utilities.min.css" />
    
    <!-- Custom Styles -->
    <style>
        /* Custom styles for better integration */
        .fr-widget {
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        .uk-btn {
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }
        .uk-btn-primary {
            background-color: hsl(222.2 47.4% 11.2%);
            color: hsl(210 40% 98%);
            border-color: hsl(222.2 47.4% 11.2%);
        }
        .uk-btn-primary:hover {
            background-color: hsl(222.2 47.4% 8%);
            border-color: hsl(222.2 47.4% 8%);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .uk-btn-default {
            background-color: hsl(210 40% 96%);
            color: hsl(222.2 47.4% 11.2%);
            border-color: hsl(214.3 31.8% 91.4%);
        }
        .uk-btn-default:hover {
            background-color: hsl(210 40% 90%);
            border-color: hsl(214.3 31.8% 85%);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .uk-btn-danger {
            background-color: hsl(0 84.2% 60.2%);
            color: hsl(210 40% 98%);
            border-color: hsl(0 84.2% 60.2%);
        }
        .uk-btn-danger:hover {
            background-color: hsl(0 84.2% 55%);
            border-color: hsl(0 84.2% 55%);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .uk-btn-text {
            background-color: transparent;
            color: hsl(222.2 47.4% 11.2%);
            border-color: transparent;
        }
        .uk-btn-text:hover {
            background-color: hsl(210 40% 96%);
            color: hsl(222.2 47.4% 11.2%);
        }
        .uk-input, .uk-select, .uk-textarea {
            border-radius: 0.375rem;
            transition: all 0.2s ease;
            background-color: hsl(0 0% 100%);
            border: 1px solid hsl(214.3 31.8% 91.4%);
            color: hsl(222.2 47.4% 11.2%);
        }
        .uk-input:focus, .uk-select:focus, .uk-textarea:focus {
            outline: none;
            border-color: hsl(222.2 47.4% 11.2%);
            box-shadow: 0 0 0 3px rgba(34, 34, 34, 0.1);
        }
        .uk-input::placeholder, .uk-textarea::placeholder {
            color: hsl(215.4 16.3% 46.9%);
        }
        .uk-card {
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            background-color: hsl(0 0% 100%);
            border: 1px solid hsl(214.3 31.8% 91.4%);
        }
        .uk-card-default {
            background-color: hsl(0 0% 100%);
            color: hsl(222.2 47.4% 11.2%);
        }
        .uk-card-hover:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transform: translateY(-1px);
        }
        .uk-navbar {
            background-color: hsl(0 0% 100%);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        .uk-navbar-nav > li > a {
            color: hsl(222.2 47.4% 11.2%);
            transition: all 0.2s ease;
        }
        .uk-navbar-nav > li > a:hover {
            color: hsl(222.2 47.4% 11.2%);
            background-color: hsl(210 40% 96%);
        }
        .uk-navbar-nav > li.uk-active > a {
            color: hsl(222.2 47.4% 11.2%);
            background-color: hsl(210 40% 96%);
        }
        .uk-tab-alt > li > a {
            border-radius: 0.375rem 0.375rem 0 0;
            padding: 0.75rem 1.25rem;
            transition: all 0.2s ease;
            color: hsl(215.4 16.3% 46.9%);
            background-color: transparent;
        }
        .uk-tab-alt > li.uk-active > a {
            background-color: hsl(222.2 47.4% 11.2%);
            color: hsl(210 40% 98%);
        }
        .uk-tab-alt > li > a:hover {
            background-color: hsl(210 40% 96%);
            color: hsl(222.2 47.4% 11.2%);
        }
        .uk-tab-alt > li.uk-active > a:hover {
            background-color: hsl(222.2 47.4% 8%);
            color: hsl(210 40% 98%);
        }
        .uk-table {
            border-radius: 0.5rem;
            overflow: hidden;
        }
        .uk-table th {
            background-color: hsl(210 40% 98%);
            font-weight: 600;
            color: hsl(222.2 47.4% 11.2%);
            border-bottom: 1px solid hsl(214.3 31.8% 91.4%);
        }
        .uk-table td {
            color: hsl(222.2 47.4% 11.2%);
            border-bottom: 1px solid hsl(214.3 31.8% 91.4%);
        }
        .uk-table-hover tbody tr:hover {
            background-color: hsl(210 40% 98%);
        }
        .uk-alert {
            border-radius: 0.5rem;
            border: 1px solid hsl(214.3 31.8% 91.4%);
        }
        .uk-alert-primary {
            background-color: hsl(210 40% 98%);
            color: hsl(222.2 47.4% 11.2%);
            border-color: hsl(222.2 47.4% 11.2%);
        }
        .uk-badge {
            border-radius: 0.25rem;
            font-weight: 500;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
        .uk-badge-success {
            background-color: hsl(142 76% 36%);
            color: hsl(210 40% 98%);
        }
        .uk-badge-warning {
            background-color: hsl(38 92% 50%);
            color: hsl(210 40% 98%);
        }
        .uk-badge-danger {
            background-color: hsl(0 84.2% 60.2%);
            color: hsl(210 40% 98%);
        }
        .uk-badge-secondary {
            background-color: hsl(215.4 16.3% 46.9%);
            color: hsl(210 40% 98%);
        }
        .uk-form-label {
            font-weight: 500;
            color: hsl(222.2 47.4% 11.2%);
            margin-bottom: 0.5rem;
        }
        .uk-form-help {
            font-size: 0.875rem;
            color: hsl(215.4 16.3% 46.9%);
            margin-top: 0.25rem;
        }
        .uk-checkbox {
            accent-color: hsl(222.2 47.4% 11.2%);
        }
        .uk-link {
            color: hsl(222.2 47.4% 11.2%);
            text-decoration: underline;
        }
        .uk-link:hover {
            color: hsl(222.2 47.4% 8%);
        }
        .uk-text-primary {
            color: hsl(222.2 47.4% 11.2%) !important;
        }
        .uk-text-muted {
            color: hsl(215.4 16.3% 46.9%) !important;
        }
        .uk-text-warning {
            color: hsl(38 92% 50%) !important;
        }
        .uk-text-bold {
            font-weight: 700 !important;
        }
        .uk-text-large {
            font-size: 1.25rem !important;
        }
        .uk-text-small {
            font-size: 0.875rem !important;
        }
        .uk-text-center {
            text-align: center !important;
        }
        .uk-margin-small-right {
            margin-right: 0.5rem !important;
        }
        .uk-margin-top {
            margin-top: 1rem !important;
        }
        .uk-margin-remove {
            margin: 0 !important;
        }
        .uk-width-1-1 {
            width: 100% !important;
        }
        .uk-display-inline {
            display: inline !important;
        }
        .uk-text-left {
            text-align: left !important;
        }
        .uk-overflow-auto {
            overflow: auto !important;
        }
        .uk-navbar-dropdown {
            background-color: hsl(0 0% 100%);
            border: 1px solid hsl(214.3 31.8% 91.4%);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .uk-navbar-dropdown-nav > li > a {
            color: hsl(222.2 47.4% 11.2%);
            padding: 0.5rem 1rem;
        }
        .uk-navbar-dropdown-nav > li > a:hover {
            background-color: hsl(210 40% 96%);
            color: hsl(222.2 47.4% 11.2%);
        }
        .uk-nav-divider {
            border-top: 1px solid hsl(214.3 31.8% 91.4%);
            margin: 0.5rem 0;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-background font-sans text-foreground antialiased">
    @yield('content')
    
    <!-- Franken-UI JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/franken-ui@2.1.0/dist/js/core.iife.js"
        type="module"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/franken-ui@2.1.0/dist/js/icon.iife.js"
        type="module"
    ></script>
    
    <!-- Initialize Franken-UI components -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all Franken-UI components
            if (typeof UIkit !== 'undefined') {
                // Initialize components
                UIkit.use(UIkit);
                
                // Initialize specific components that need manual initialization
                UIkit.alert('[uk-alert]');
                UIkit.modal('[uk-modal]');
                UIkit.navbar('[uk-navbar]');
                UIkit.dropdown('[uk-dropdown]');
                UIkit.toggle('[uk-toggle]');
                UIkit.tab('[uk-tab]');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>