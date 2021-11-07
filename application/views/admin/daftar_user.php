<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
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
                                            <th scope="col">Email</th>
                                            <th scope="col">No. HP</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Status Akun</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($daftar_user as $user) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td><?php echo $user['nama_user'] ?></td>

                                                <td>
                                                    <?php echo $user['email'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $user['no_hp'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($user['role_id'] == '77') :
                                                        echo 'Admin';
                                                    else :
                                                        echo 'User';
                                                    endif;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($user['status_user'] == '1') :
                                                        echo 'Aktif';
                                                    else :
                                                        echo 'Nonaktif';
                                                    endif;
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="<?php echo base_url('Daftar_user/view_edit/' . $user['id_user']) ?>" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit & View</a>
                                                            <?php if ($user['status_user'] == '1'): ?>
                                                                <a href="<?php echo base_url('Daftar_user/banned_unbened/'.$user['id_user']) ?>" class="dropdown-item has-icon text-danger"><i class="far fa-times-circle"></i> Banned Akun</a>
                                                            <?php else: ?>
                                                                <a href="<?php echo base_url('Daftar_user/banned_unbened/'.$user['id_user']) ?>" class="dropdown-item has-icon text-success"><i class="far fa-check-circle"></i> Un-Benned Akun</a>
                                                            <?php endif; ?>
                                                            <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                                                                Delete</a>
                                                        </div>
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