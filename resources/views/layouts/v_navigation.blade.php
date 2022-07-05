<!--navigation-->
<ul class="metismenu" id="menu">
    {{-- @foreach ($akun as $a) --}}
    <li>
        <a href="/home" class="parent-icon">
            <div class="parent-icon"><i class='bx bx-home-circle'></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>
    <li>
        <a href="/pembelajaranku" class="parent-icon">
            <div class="parent-icon"><i class="fadeIn animated bx bx-spreadsheet"></i>
            </div>
            <div class="menu-title">Pembelajaran</div>
        </a>
    </li>
    @if (Auth::user()->is_admin == 1)
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-key"></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <li> <a href="/dataadmin/"><i class="bx bx-right-arrow-alt"></i>Admin</a>
                </li>
                <li> <a href="/pengajar/"><i class="bx bx-right-arrow-alt"></i>Pengajar</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/datasekolah" class="parent-icon">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Data Sekolah</div>
            </a>
        </li>
    @elseif (Auth::user()->is_admin == 2)
        <li>
            <a href="/datakelas" class="parent-icon">
                <div class="parent-icon"><i class='bx bx-user-pin'></i>
                </div>
                <div class="menu-title">Kelas</div>
            </a>
        </li>
        <li>
            <a href="/pembelajaran" class="parent-icon">
                <div class="parent-icon"><i class="fadeIn animated bx bx-spreadsheet"></i>
                </div>
                <div class="menu-title">Pembelajaran</div>
            </a>
        </li>
        <li>
            <a href="/laporan" class="parent-icon">
                <div class="parent-icon"><i class="fadeIn animated bx bx-file-find"></i>
                </div>
                <div class="menu-title">Laporan</div>
            </a>
        </li>
    @endif
    {{-- @endforeach --}}

</ul>
<!--end navigation-->
