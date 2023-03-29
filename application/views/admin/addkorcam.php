<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Korcam</h2>
                    </div>
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-12 col-lg-6 col-md-12">
                        <form action="<?= base_url() ?>admin/korcam/add" method="post" class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="nama">Nama
                                </label>
                                <input id="nama" name="nama" type="text" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat">alamat
                                </label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kontak">Kontak
                                </label>
                                <input id="kontak" name="kontak" type="text" class="form-control validate" required />
                            </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Korcam</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>