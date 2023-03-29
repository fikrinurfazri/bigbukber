<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <form action=" <?= base_url() ?>admin/galeri/upload" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                    <div class="col-xl-12 col-lg-12 col-md-12 mx-auto mb-4">
                        <div class="form-group mb-3">
                            <label for="periode">periode
                            </label>
                            <select name="periode" class="custom-select" id="periode">
                                <?php foreach ($periode as $p) : ?>
                                    <option value="<?= $p['tahun'] ?>"> <?= $p['tahun'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="custom-file mt-4 mb-4">
                            <img id="image" width="100%" height="200px" onclick="document.getElementById('fileInput').click();" />
                            <br><br>
                            <input type="file" id="upload" class="form-control btn btn-primary btn-block mx-auto" name="file" onchange="readURL(this);" />
                        </div>
                        <br><br><br>

                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan
                            </label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Tambah</button>
                    </div>
                </form>
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