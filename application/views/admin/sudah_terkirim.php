<?php echo $this->session->flashdata('pesan'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row mt-3 mr-3">
                            <div class="col">
                                <div class="card-header">
                                    <h4>WA Terkirim</h4>
                                </div>
                            </div>
                            <!-- <div class="col">
                                <div style="float: right;">
                                    <a href="<?php base_url() ?>Adminpage/kirim_semua">
                                        <button class="btn btn-success">
                                            Kirim Semua Pesan
                                        </button>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">
                                                #
                                            </th>
                                            <th scope="col">No. WA</th>
                                            <th scope="col">Pesan</th>
                                            <th scope="col">Tanggal</th>
                                            <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pesan as $psn) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $psn['no_hp'] ?></td>
                                                <td><?php echo $psn['pesan'] ?></td>
                                                <td><?php echo $psn['tanggal'] ?></td>
                                                <!-- <td>
                                                    <div class="dropdown">
                                                        <input type="hidden" name="no_wa" value="<?php echo $psn['no_hp'] ?>">
                                                        <input type="hidden" name="pesan" value="<?php echo $psn['pesan'] ?>">
                                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                                    </div>
                                                </td> -->
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
    <!-- <script type="text/javascript">
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
    </script> -->