<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col">

        <!-- Logo -->
        <div class="px-6 py-6 border-b border-slate-800">
            <h2 class="text-xl font-bold">
                Branch Panel
            </h2>

            <p class="text-xs text-slate-400 mt-1">
                Management Console
            </p>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-1">

            <a href="dashboard.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                📊 Dashboard
            </a>

            <a href="members.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                👥 Members
            </a>

            <a href="create_member.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                👥 Create Member
            </a>

            <a href="cash_memberships.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                👥 Cash Membership Renewal
            </a>

            <a href="upi_memberships.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                👥 Membership Renewal
            </a>

            <a href="expenses.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                💰 Expenses
            </a>

            <a href="collections.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                💳 Collections
            </a>

            <a href="profile.php"
               class="flex items-center px-4 py-3 rounded-lg hover:bg-slate-800 transition">
                ⚙ Profile
            </a>

        </nav>

        <!-- Footer -->
        <div class="p-4 border-t border-slate-800">

            <a href="../admin/logout.php"
               class="block text-center bg-rose-600 hover:bg-rose-700 px-4 py-2 rounded-lg text-sm font-medium transition">
                Logout
            </a>

        </div>

    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 p-8">