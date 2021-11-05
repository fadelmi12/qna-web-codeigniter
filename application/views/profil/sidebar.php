<div class="profile-kiri">

    <div class="menu">
        <ul>
            <a href="<?= base_url() ?>profile">
                <li class="p-2 px-4 <?= ($sidebar === 'dashboard') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Dashboard
                    </h6>
                </li>
            </a>

            <a href="<?= base_url() ?>profile/daftar_pertanyaan">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'daftar_pertanyaan') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Daftar Pertanyaan
                    </h6>
                </li>
            </a>
            <a href="<?= base_url() ?>profile/pertanyaan_tersimpan">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'pertanyaan_tersimpan') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Pertanyaan Tersimpan
                    </h6>
                </li>
            </a>

            <a href="<?= base_url() ?>profile/daftar_artikel">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'daftar_artikel') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Daftar Artikel
                    </h6>
                </li>
            </a>
            <a href="<?= base_url() ?>profile/artikel_tersimpan">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'artikel_tersimpan') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Artikel Tersimpan
                    </h6>
                </li>
            </a>

            <a href="<?= base_url() ?>profile/riwayat_jawab">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'riwayat_jawab') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Riwayat Jawab
                    </h6>
                </li>
            </a>

        </ul>
        <ul>
            <a href="<?= base_url() ?>profile/keuangan">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'keuangan') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Keuangan
                    </h6>
                </li>
            </a>
            <a href="<?= base_url() ?>profile/topup">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'topup') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Top Up Saldo
                    </h6>
                </li>
            </a>
            <a href="<?= base_url() ?>profile/edit">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'edit') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Edit Profile
                    </h6>
                </li>
            </a>
            <a href="<?= base_url() ?>profile/afiliasi">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'afiliasi') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Afiliasi
                    </h6>
                </li>
            </a>
            <a href="<?= base_url() ?>profile/pengaturan">
                <li class="p-2 px-4 <?= ($this->uri->segment(2) === 'pengaturan') ? 'active' : '' ?>">
                    <h6 class="m-0 text-black">
                        Pengaturan Akun
                    </h6>
                </li>
            </a>
            <a href="<?= base_url() ?>auth/login/logout">
                <li class="p-2 px-4">
                    <h6 class="m-0 text-black">
                        Logout
                    </h6>
                </li>
            </a>
        </ul>
    </div>
</div>