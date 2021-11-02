<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pertanyaan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th>User</th>
                                            <th>Pertanyaan</th>
                                            <th>Kategori</th>
                                            <th>Tanggal/Jam</th>
                                            <th>Harga</th>
                                            <th style="width:7rem">Status Tampil</th>
                                            <th style="width:7rem">Status Jawab</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($question as $ktg) : ?>
                                            <tr>

                                                <td><?php echo $ktg['nama_user'] ?></td>

                                                <td>
                                                    <?php echo $ktg['pertanyaan'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $ktg['nama_kategori'] ?>
                                                </td>

                                                <td>
                                                    <?php echo $ktg['waktu_question'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $ktg['harga'] ?>
                                                </td>
                                                <td>
                                                    <form action="<?php echo base_url() . 'AdminPage/update_qst'; ?>" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_pertanyaan" class="form-control" value="<?php echo $ktg['id_pertanyaan'] ?>">
                                                        <div class="form-group">
                                                            <select class="form-control" name="status_hidden" onchange="this.form.submit()">
                                                                <option value="0" <?php echo ($ktg['status_hidden'] == 0 ? 'selected="selected"' : ''); ?>>Tampil</option>
                                                                <option value="1" <?php echo ($ktg['status_hidden'] == 1 ? 'selected="selected"' : ''); ?>>Sembunyi</option>

                                                            </select>
                                                        </div>
                                                </td>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <select class="form-control" name="status_jawab" onchange="this.form.submit()">
                                                            <option value="0" <?php echo ($ktg['status_jawab'] == 0 ? 'selected="selected"' : ''); ?>>Belum</option>
                                                            <option value="1" <?php echo ($ktg['status_jawab'] != 0 ? 'selected="selected"' : ''); ?>>Terjawab</option>
                                                        </select>
                                                    </div>
                                                    </form>
                                                </td>

                                            </tr>
                                        <?php
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Jawaban</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-99">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Jawaban</th>
                                            <th>Tanggal/Jam</th>
                                            <th style="width:10rem">Status Tampil</th>
                                            <th style="width:10rem">Status Jawab</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($answer as $ans) : ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>

                                                <td><?php echo $ans['nama_user'] ?></td>

                                                <td>
                                                    <?php echo $ans['jawaban'] ?>
                                                </td>

                                                <td>
                                                    <?php echo $ans['waktu_jawab'] ?>
                                                </td>
                                                <td>
                                                    <form action="<?php echo base_url() . 'AdminPage/update_hidden'; ?>" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_jawaban" class="form-control" value="<?php echo $ans['id_jawaban'] ?>">
                                                        <input type="hidden" name="id_pertanyaan" class="form-control" value="<?php echo $ans['id_pertanyaan'] ?>">
                                                        <div class="form-group">
                                                            <select class="form-control" name="status_sembunyi" onchange="this.form.submit()">
                                                                <option value="0" <?php echo ($ans['status_sembunyi'] == 0 ? 'selected="selected"' : ''); ?>>Tampil</option>
                                                                <option value="1" <?php echo ($ans['status_sembunyi'] == 1 ? 'selected="selected"' : ''); ?>>Sembunyi</option>

                                                            </select>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td colspan="2">
                                                    <form action="<?php echo base_url() . 'AdminPage/update_jawab'; ?>" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_jawaban" class="form-control" value="<?php echo $ans['id_jawaban'] ?>">
                                                        <input type="hidden" name="id_user" class="form-control" value="<?php echo $ans['id_user'] ?>">
                                                        <input type="hidden" name="id_pertanyaan" class="form-control" value="<?php echo $ans['id_pertanyaan'] ?>">
                                                        <input type="hidden" name="price" class="form-control" value="<?php echo $ktg['harga'] ?>">
                                                        <div class="form-group">
                                                            <select class="form-control" name="jawaban_benar" onchange="this.form.submit()">
                                                                <option value="0" <?php echo ($ans['jawaban_benar'] == 0 ? 'selected="selected"' : ''); ?>>Salah</option>
                                                                <option value="1" <?php echo ($ans['jawaban_benar'] == 1 ? 'selected="selected"' : ''); ?>>Benar</option>
                                                            </select>
                                                        </div>
                                                    </form>

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