<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">OgahRugi</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('databarang') }}" class="sidebar-link">
                    <i class="bi bi-box-seam-fill pe-2"></i>
                    Data Barang
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('datapembelian') }}" class="sidebar-link">
                    <i class="bi bi-bag-fill pe-2"></i>
                    Data Pembelian
                </a>
            </li>
            @if (auth()->user()->hasRole('administrator') || auth()->user()->hasRole('operator') )
            <li class="sidebar-item">
                <a href="{{ route('datapemakaian') }}" class="sidebar-link">
                    <i class="bi bi-person-rolodex pe-2"></i>
                    Data Pemakaian
                </a>
            </li>
            @endif
            @if (auth()->user()->hasRole('administrator'))
            <li class="sidebar-item">
                <a href="{{ route('admin.datauser') }}" class="sidebar-link">
                    <i class="bi bi-people pe-2"></i>
                    Data User
                </a>
            </li>
            @endif
            @if (auth()->user()->hasRole('administrator'))
            <li class="sidebar-item">
                <a href="{{ route('inventaris') }}" class="sidebar-link">
                    <i class="bi bi-receipt pe-2"></i>
                    Laporan 
                </a>
            </li>
            @endif
            {{-- Bagian Bawah --}}
            <li class="sidebar-header" style="color: crimson">
                More
            </li>
            <li class="sidebar-link">
                <a class="sidebar-link " style="color: crimson" href="{{ route('logout')}}">
                    <i class="bi bi-person-fill pe-2"></i>
                    Log out
                </a>
            </li>
        </ul>
    </div>
</aside>