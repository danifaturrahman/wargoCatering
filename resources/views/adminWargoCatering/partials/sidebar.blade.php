<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="/assets/atlantis/img/profile-admin.jpg" alt="." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Admin
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="dashboard/adminprofile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="fas fa-layer-group"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pages</h4>
                </li>

                <li class="nav-item {{ Request::is('dashboard/kategori-katering*') ? 'active' : '' }}">
                    <a href="/dashboard/kategori-katering">
                        <i class="fas fa-list-ul"></i>
                        <p>Kategori Katering</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/menu-katering*') ? 'active' : '' }}">
                    <a href="/dashboard/menu-katering">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Menu Katering</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/ongkos-kirim*') ? 'active' : '' }}">
                    <a href="/dashboard/ongkos-kirim">
                        <i class="fas fa-car"></i>
                        <p>Ongkos Kirim</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/alat-katering*') ? 'active' : '' }}">
                    <a href="/dashboard/alat-katering">
                        <i class="fas fa-utensils"></i>
                        <p>Alat Katering</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/peminjaman-alat*') ? 'active' : '' }}">
                    <a href="/dashboard/peminjaman-alat">
                        <i class="fas fa-hand-holding"></i>
                        <p>Peminjaman Alat</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/pesanan-pelanggan*') ? 'active' : '' }}">
                    <a href="/dashboard/pesanan-pelanggan">
                        <i class="fas fa-box-open"></i>
                        <p>Pesanan Pelanggan</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/data-pelanggan*') ? 'active' : '' }}">
                    <a href="/dashboard/data-pelanggan">
                        <i class="fas fa-address-book"></i>
                        <p>Data Pelanggan</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/faq*') ? 'active' : '' }}">
                    <a href="/dashboard/faq">
                        <i class="
                        fas fa-question-circle"></i>
                        <p>FAQs</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/laporan-transaksi*') ? 'active' : '' }}">
                    <a href="/dashboard/laporan-transaksi">
                        <i class="fas fa-book"></i>
                        <p>Laporan Transaksi</p>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('dashboard/pesan-kritik*') ? 'active' : '' }}">
                    <a href="/dashboard/pesan-kritik">
                        <i class="fas fa-book"></i>
                        <p>Kritik Saran</p>
                    </a>
                </li>

                {{-- HALAMAN BERANDA --}}
                {{-- <li
                    class="nav-item {{ Request::is('dashboard/desc', 'dashboard/desc/*', 'dashboard/fungsi*', 'dashboard/keunggulan*', 'dashboard/faq*', 'dashboard/review*', 'dashboard/toko*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#beranda">
                        <i class="fas fa-home"></i>
                        <p>Halaman Beranda</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('dashboard/desc', 'dashboard/desc/*', 'dashboard/fungsi*', 'dashboard/keunggulan*', 'dashboard/faq*', 'dashboard/review*', 'dashboard/toko*') ? 'show' : '' }}"
                        id="beranda">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('dashboard/desc', 'dashboard/desc/*') ? 'active' : '' }}">
                                <a href="/dashboard/desc">
                                    <span class="sub-item">Deskripsi</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/fungsi*') ? 'active' : '' }}">
                                <a href="/dashboard/fungsi">
                                    <span class="sub-item">Fungsi</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/keunggulan*') ? 'active' : '' }}">
                                <a href="/dashboard/keunggulan">
                                    <span class="sub-item">Keunggulan</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/faq*') ? 'active' : '' }}">
                                <a href="/dashboard/faq">
                                    <span class="sub-item">FAQ</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/review*') ? 'active' : '' }}">
                                <a href="/dashboard/review">
                                    <span class="sub-item">Ulasan</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/toko*') ? 'active' : '' }}">
                                <a href="/dashboard/toko">
                                    <span class="sub-item">E-Commerce</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- HALAMAN PRODUK --}}
                {{-- <li
                    class="nav-item {{ Request::is('dashboard/descproduk*', 'dashboard/keuntungan*', 'dashboard/harga*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#produk">
                        <i class="fas fa-box-open"></i>
                        <p>Halaman Produk</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('dashboard/descproduk*', 'dashboard/keuntungan*', 'dashboard/harga*') ? 'show' : '' }}"
                        id="produk">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('dashboard/descproduk*') ? 'active' : '' }}">
                                <a href="/dashboard/descproduk">
                                    <span class="sub-item">Deskripsi</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/keuntungan*') ? 'active' : '' }}">
                                <a href="/dashboard/keuntungan">
                                    <span class="sub-item">Keuntungan</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/harga*') ? 'active' : '' }}">
                                <a href="/dashboard/harga">
                                    <span class="sub-item">Harga</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- HALAMAN TENTANG --}}
                {{-- <li class="nav-item {{ Request::is('dashboard/tentang*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#tentang">
                        <i class="fas fa-info-circle"></i>
                        <p>Halaman Tentang</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('dashboard/tentang*') ? 'show' : '' }}" id="tentang">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('dashboard/tentang*') ? 'active' : '' }}">
                                <a href="/dashboard/tentang">
                                    <span class="sub-item">Tentang</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                {{-- HALAMAN KONTAK --}}
                {{-- <li
                    class="nav-item {{ Request::is('dashboard/kontak*', 'dashboard/pesan*', 'dashboard/whatsapp*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#kontak">
                        <i class="fas fa-phone"></i>
                        <p>Halaman Kontak</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('dashboard/kontak*', 'dashboard/pesan*', 'dashboard/whatsapp*') ? 'show' : '' }}"
                        id="kontak">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('dashboard/kontak*') ? 'active' : '' }}">
                                <a href="/dashboard/kontak">
                                    <span class="sub-item">Kontak</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/pesan*') ? 'active' : '' }}">
                                <a href="/dashboard/pesan">
                                    <span class="sub-item">Pesan</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('dashboard/whatsapp*') ? 'active' : '' }}">
                                <a href="/dashboard/whatsapp">
                                    <span class="sub-item">Whatsapp</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
