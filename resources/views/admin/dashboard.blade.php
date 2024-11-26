<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Elektronik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar Styles */
        #sidebar {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            transform: translateX(0); /* Default visible position */
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        /* Sidebar Hidden (Toggle) */
        #sidebar.active {
            transform: translateX(-200px); /* Hide sidebar for desktop and mobile */
        }

        /* Main Content Adjustment */
        main {
            margin-left: 200px; /* Default space for sidebar */
            transition: margin-left 0.3s ease;
        }

        main.sidebar-collapsed {
            margin-left: 0; /* Remove left margin when sidebar is hidden */
        }

        /* Toggle Button */
        #toggleSidebar {
            position: fixed;
            top: 20px;
            left: 210px; /* Positioned just outside the sidebar */
            z-index: 1100;
            background-color: #343a40;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        #toggleSidebar:hover {
            background-color: #495057;
        }

        /* Adjust Toggle Button Position When Sidebar is Hidden */
        #toggleSidebar.sidebar-collapsed {
            left: 10px; /* Move to the far-left when sidebar is hidden */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-200px); /* Hide sidebar by default on mobile */
            }

            #sidebar.active {
                transform: translateX(0); /* Show sidebar on toggle */
            }

            main {
                margin-left: 0; /* No margin for main content on mobile */
            }

            main.sidebar-expanded {
                margin-left: 200px; /* Adjust margin when sidebar is visible */
            }

            #toggleSidebar {
                left: 10px; /* Default position for toggle button on mobile */
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container-fluid">
            <button id="toggleSidebar" class="d-inline">☰</button> <!-- Toggle Button -->
        
            <!-- Search and Actions -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex ms-auto me-3 align-items-center">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari produk..." aria-label="Search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </form>
                <a href="{{ route('produk.add') }}" class="btn btn-primary me-2">Tambah Produk</a>
                <button class="btn btn-secondary">Generate Report</button>
            </div>

            <!-- Profile Dropdown -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-4"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarProfile">
                        <li><a class="dropdown-item" href="#">Lihat Profil</a></li>
                        <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 p-3">
                <div class="d-flex flex-column align-items-center">
                    <i class="fas fa-mobile-alt fa-3x text-white mb-2"></i>
                    <h2 class="text-white">Toko Elektronik</h2>
                </div>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('produk.index') }}" class="nav-link text-white">Produk</a>
                    </li>
                </ul>
            </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">$40,000</h5>
                            <p class="card-text">Earnings (Monthly)</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">$215,000</h5>
                            <p class="card-text">Earnings (Annual)</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">50%</h5>
                            <p class="card-text">Tasks</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">18</h5>
                            <p class="card-text">Pending Requests</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleButton = document.getElementById("toggleSidebar");
        const mainContent = document.querySelector("main");

        toggleButton.addEventListener("click", function () {
            sidebar.classList.toggle("active");
            mainContent.classList.toggle("sidebar-collapsed");
            toggleButton.classList.toggle("sidebar-collapsed");
        });
    });
</script>
</body>
</html>
