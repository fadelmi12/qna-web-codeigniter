[
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Log Login</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            
                                            </th>
                                            <th>Waktu Login</th>
                                            <th>IP Address</th>
                                            <th>Email</th>
                                            <th>Device</th>
                                            <th>Browser</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($log as $lg) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td>
                                                    <?php echo $lg['date'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $lg['ip'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $lg['email'] ?>
                                                </td>

                                                <td>
                                                    <?php echo $lg['device'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $lg['browser'] ?>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>]