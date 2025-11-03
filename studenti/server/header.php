<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<header class="main-header">
    <div class="header-container">
        <a href="../html/index.php" class="logo">DriveHub</a>
        <a href="tel:021999999" class="cta-button">021 999 999</a>
    </div>
</header>

<nav class="main-nav-bar">
    <ul class="nav-menu">
        <li class="<?php if ($currentPage == 'index.php') echo 'active'; ?>">
            <a href="../html/index.php">Acasă</a>
        </li>
        <li><a href="../html/index.php#inventory">Inventar</a></li>
        <li><a href="#">Despre Noi</a></li>
        <li class="<?php if ($currentPage == 'contact.php') echo 'active'; ?>">
            <a href="../html/contact.php">Contact</a>
        </li>
        <li class="<?php if ($currentPage == 'dashboard.php') echo 'active'; ?>">
            <a href="../html/dashboard.php">Dashboard</a>
        </li>
        <li class="<?php if ($currentPage == 'account.html') echo 'active'; ?>">
            <a href="../html/account.html">Account</a>
        </li>
    </ul>
</nav>