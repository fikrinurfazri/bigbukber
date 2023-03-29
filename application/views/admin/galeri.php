<br><br>
<div class="col-12 tm-block-col">
    <h2 class="tm-block-title"><a href="<?= base_url() ?>admin/galeri/addgaleri" class="btn btn-primary text-uppercase"> Tambah Data</a></h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">PERIODE</th>

                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($galeri as $row) : ?>
                <tr>
                    <th scope="row"><b>#<?= $no++ ?></b></th>

                    <td><b><?= $row['keterangan'] ?></b></td>
                    <td><b><?= $row['periode'] ?></b></td>

                    <td>

                        <a href="<?= base_url() ?>admin/anak/detail/<?= $row['id_galeri'] ?>" class="tm-product-delete-link">
                            <i class="fa fa-child tm-product-delete-icon"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/anak/update/<?= $row['id_galeri'] ?>" class="tm-product-delete-link">
                            <i class="fa fa-edit tm-product-delete-icon"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/anak/delete/<?= $row['id_galeri'] ?>" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>