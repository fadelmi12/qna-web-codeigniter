<div class="container mt-5">
    <div class="form-group">
        <h2>Kirim WA</h2>
        <form action="<?php base_url() ?>Send/kirim_bc" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Nomor WA</label>
                <!-- <input type="number" name="no_wa" class="form-control" placeholder="masukkan no. WA"> -->
                <textarea class="form-control" name="no_wa" id="" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Pesan yang akan dikirim</label>
                <textarea class="form-control" name="pesan" rows="3">masukkan pesan anda</textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </form>
    </div>
</div>