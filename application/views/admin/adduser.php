<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Tambah Data User</h2>
                    </div>
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action=" <?= base_url() ?>admin/user/upload" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="NAMA">NAMA
                                </label>
                                <input id="NAMA" name="NAMA" type="text" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="USERNAME">USERNAME
                                </label>
                                <input id="USERNAME" name="USERNAME" type="text" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="PASSWORD">PASSWORD
                                </label>
                                <input id="PASSWORD" name="PASSWORD" type="text" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="LEVEL">LEVEL
                                </label>
                                <select name="LEVEL" class="custom-select" id="LEVEL">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="custom-file mt-4 mb-4">
                            <!-- <input id="fileInput" type="file" style="display:none;" />
                            <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" onclick="document.getElementById('fileInput').click();" /> -->
                            <img id="image" width="100%" height="165px" onclick="document.getElementById('fileInput').click();" />
                            <br><br>
                            <input type="file" id="upload" class="form-control btn btn-primary btn-block mx-auto" name="file" onchange="readURL(this);" />
                        </div>
                        <br><br><br>
                        <div class="form-group mb-3">
                            <label for="korcam">Korcam
                            </label>
                            <select name="id_korcam" class="custom-select" id="korcam">
                                <?php foreach ($korcam as $p) : ?>
                                    <option value="<?= $p['id_korcam'] ?>"> <?= $p['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
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