<br><br>
<div class="col-12 tm-block-col">
    <h2 class="tm-block-title"><a href="<?= base_url() ?>admin/anak/addanak" class="btn btn-primary text-uppercase"> Tambah Data</a></h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">NAMA</th>
                <th scope="col">PERIODE</th>
                <th scope="col">TANGGAL LAHIR</th>
                <th scope="col">TINGGAL</th>
                <th scope="col">PENDIDIKAN</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($anak as $row) : ?>
                <tr>
                    <th scope="row"><b>#<?= $no++ ?></b></th>
                    <td>
                        <div class="tm-status-circle moving">
                        </div><?= $row['nama_anak'] ?>
                    </td>
                    <td><b><?= $row['tahun'] ?></b></td>
                    <td><b><?= $row['ttl_anak'] ?></b></td>
                    <td><b><?= $row['tinggal_di'] ?></b></td>
                    <td><b><?= $row['pendidikan'] ?></b></td>

                    <td>

                        <a href="<?= base_url() ?>admin/anak/detail/<?= $row['id_anak'] ?>" class="tm-product-delete-link">
                            <i class="fa fa-child tm-product-delete-icon"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/anak/update/<?= $row['id_anak'] ?>" class="tm-product-delete-link">
                            <i class="fa fa-edit tm-product-delete-icon"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/anak/delete/<?= $row['id_anak'] ?>" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>