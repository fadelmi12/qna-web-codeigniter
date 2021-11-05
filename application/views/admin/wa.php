<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Broadcast WA</h4>
                        </div>
                        <form action="<?php echo base_url('AdminPage/kirim_wa') ?>" method="post">
                            <div class="card-body">
                                <label for="">No. Whatsapp</label>
                                <textarea class="form-control mb-3" name="no_wa" id="wa_number" cols="30" rows="10" required></textarea>
                                <label for="">Pesan </label>
                                <textarea class="form-control" name="pesan" id="" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="card-body">
                                <div style="float: right;">
                                    <button type="button" class="btn btn-primary" id="btn_add_all_wa" onclick="get_all_contact()">Tambahkan Semua Kontak</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="card-header">
                            <h4>Daftar Kontak</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">
                                                #
                                            </th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">No. WA</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kontak as $user) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $user['nama_user'] ?></td>
                                                <td><?php echo $user['nama_lengkap'] ?></td>
                                                <td>
                                                    <?php echo $user['email'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $user['no_hp'] ?>
                                                    <input type="hidden" value="<?php echo $user['no_hp'] ?>">
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary" id="btn_<?php echo $user['id_user'] ?>" data='<?php echo $user['no_hp'] ?>' id_user="<?php echo $user['id_user'] ?>" onclick="add_nomer_wa()">Tambahkan</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function add_nomer_wa() {
            var no_wa = event.target.getAttribute('data');
            var id = event.target.getAttribute('id_user');
            if (no_wa != null) {
                var number = document.getElementById(wa_number);
                var abc = document.getElementById('wa_number').value;
                if (abc == "") {
                    document.getElementById('wa_number').value += no_wa;
                    document.getElementById("btn_" + id).disabled = true;
                } else {
                    document.getElementById('wa_number').value += ";" + no_wa;
                    document.getElementById("btn_" + id).disabled = true;
                }
            }
        }

        function get_all_contact() {
            <?php foreach ($kontak as $user) : ?>
                var no_wa = '<?php echo $user['no_hp'] ?>';
                if (no_wa != null) {
                    var number = document.getElementById(wa_number);
                    var abc = document.getElementById('wa_number').value;
                    if (abc != "") {
                        document.getElementById('wa_number').value += ";" + no_wa;
                    } else {
                        document.getElementById('wa_number').value += no_wa;
                    }
                }
            <?php endforeach; ?>
            document.getElementById("btn_add_all_wa").disabled = true;
        }
    </script>