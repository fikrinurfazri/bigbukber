<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Tambah Data Anak</h2>
                    </div>
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action=" <?= base_url() ?>admin/anak/upload" method="post" enctype="multipart/form-data" class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="id_periode">Periode
                                </label>
                                <select name="id_periode" class="custom-select" id="id_periode">
                                    <?php foreach ($periode as $p) : ?>
                                        <option value="<?= $p['id_periode'] ?>"> <?= $p['tahun'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama_anak">Nama
                                </label>
                                <input id="nama_anak" name="nama_anak" type="text" class="form-control validate" required />
                                <input id="id_user" name="id_user" type="hidden" value="<?= $user['ID_ADMIN'] ?>" class="form-control validate" required />
                                <input id="id_korcam" name="id_korcam" type="hidden" value="<?= $user['id_korcam'] ?>" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="ttl_anak">TTL
                                </label>
                                <input id="ttl_anak" name="ttl_anak" type="date" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat_anak">Alamat
                                </label>
                                <textarea name="alamat_anak" id="alamat_anak" class="form-control" cols="10" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tinggal">Tinggal Di</label>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label for="">Rumah </label> <input type="radio" onclick="javascript:yesnoCheck();" name="tinggal_di" value="Rumah" id="yesCheck">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Pesantren </label> <input type="radio" onclick="javascript:yesnoCheck();" name="tinggal_di" value="Pesantren" id="noCheck">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="">Panti </label> <input type="radio" onclick="javascript:yesnoCheck();" name="tinggal_di" value="Panti" id="noCheck">
                                    </div>

                                </div>
                                <div id="ifYes" style="display:none">
                                    <div class="form-group col-12">
                                        <label for="">Tinggal Dengan</label>
                                        <input class="form-control" type="text" id="yes" name="tinggal_dengan">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label for="catatan">Catatan
                                </label>
                                <textarea name="catatan" id="catatan" class="form-control" cols="10" rows="2"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <script>
                                    function yesnoCheck() {

                                        if (document.getElementById("yesCheck").checked) {

                                            document.getElementById("ifYes").style.display = "block";

                                        } else document.getElementById("ifYes").style.display = "none";

                                    }
                                </script>
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
                            <label for="pendidikan">Pendidikan
                            </label>
                            <select name="pendidikan" id="pendidikan" class="custom-select">
                                <option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="PERGURUAN TINGGI">PERGURUAN TINGGI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Tambah data anak</button>
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