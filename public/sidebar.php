<?php
// Sidebar Navigation Component
// Requires auth.php to be loaded for user info
?>
<nav class="sidebar">
    <div class="sidebar-header">
        <h4><i class="fas fa-traffic-light"></i> Traffic System</h4>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="/vlad/public/index.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'index.php') ? 'active' : ''; ?>">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/vlad/public/index2.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'index2.php') ? 'active' : ''; ?>">
                <i class="fas fa-file-alt"></i> New Citation
            </a>
        </li>
        <li>
            <a href="/vlad/public/citations.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'citations.php') ? 'active' : ''; ?>">
                <i class="fas fa-list"></i> View Citations
            </a>
        </li>
        <li>
            <a href="/vlad/public/search.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'search.php') ? 'active' : ''; ?>">
                <i class="fas fa-search"></i> Search
            </a>
        </li>
        <?php if (function_exists('is_admin') && is_admin()): ?>
        <li class="sidebar-divider"></li>
        <li class="sidebar-heading">Admin</li>
        <li>
            <a href="/vlad/admin/dashboard.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'dashboard.php' && strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/vlad/admin/violations.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'violations.php') ? 'active' : ''; ?>">
                <i class="fas fa-exclamation-triangle"></i> Violation Types
            </a>
        </li>
        <li>
            <a href="/vlad/admin/users.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'users.php') ? 'active' : ''; ?>">
                <i class="fas fa-users"></i> Manage Users
            </a>
        </li>
        <li>
            <a href="/vlad/admin/reports.php" class="<?php echo (basename($_SERVER['PHP_SELF']) === 'reports.php') ? 'active' : ''; ?>">
                <i class="fas fa-chart-bar"></i> Reports
            </a>
        </li>
        <?php endif; ?>
    </ul>

    <div class="sidebar-footer">
        <?php if (function_exists('is_logged_in') && is_logged_in()): ?>
        <div class="user-info">
            <small>
                <i class="fas fa-user"></i>
                <?php echo htmlspecialchars($_SESSION['full_name'] ?? $_SESSION['username'] ?? 'User'); ?>
            </small>
        </div>
        <a href="/vlad/public/logout.php" class="btn btn-sm btn-outline-light w-100 mt-2">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <?php else: ?>
        <a href="/vlad/public/login.php" class="btn btn-sm btn-outline-light w-100">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <?php endif; ?>
    </div>
</nav>

<style>
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 250px;
    height: 100vh;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    padding: 0;
    z-index: 1000;
    box-shadow: 3px 0 10px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.sidebar-header {
    padding: 20px;
    background: rgba(0,0,0,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.sidebar-header h4 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 600;
}

.sidebar-menu {
    list-style: none;
    padding: 10px 0;
    margin: 0;
    flex: 1;
    overflow-y: auto;
}

.sidebar-menu li a {
    display: block;
    padding: 12px 20px;
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}

.sidebar-menu li a:hover {
    background: rgba(255,255,255,0.1);
    color: white;
    border-left-color: #ffd700;
}

.sidebar-menu li a.active {
    background: rgba(255,255,255,0.15);
    color: white;
    border-left-color: #ffd700;
}

.sidebar-menu li a i {
    width: 25px;
    margin-right: 10px;
}

.sidebar-divider {
    border-top: 1px solid rgba(255,255,255,0.2);
    margin: 10px 0;
}

.sidebar-heading {
    padding: 10px 20px 5px;
    font-size: 0.75rem;
    text-transform: uppercase;
    color: rgba(255,255,255,0.5);
    font-weight: 600;
}

.sidebar-footer {
    padding: 15px 20px;
    background: rgba(0,0,0,0.2);
    border-top: 1px solid rgba(255,255,255,0.1);
}

.sidebar-footer .user-info {
    color: rgba(255,255,255,0.7);
    margin-bottom: 5px;
}

/* Adjust main content to account for sidebar */
.content {
    margin-left: 250px;
    padding: 20px;
    min-height: 100vh;
    background: #f8f9fa;
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
    }

    .sidebar.active {
        transform: translateX(0);
    }

    .content {
        margin-left: 0;
    }
}

@media print {
    .sidebar {
        display: none !important;
    }

    .content {
        margin-left: 0 !important;
    }
}
</style>
