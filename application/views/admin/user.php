<br><br>
<div class="col-12 tm-block-col">
    <h2 class="tm-block-title"><a href="<?= base_url() ?>admin/user/adduser" class="btn btn-primary text-uppercase"> Tambah Data</a></h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO.</th>
                <th scope="col">USERNAME</th>
                <th scope="col">NAMA</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">KONTAK</th>

                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($admin as $row) : ?>
                <tr>
                    <th scope="row"><b>#<?= $no++ ?></b></th>
                    <td>
                        <div class="tm-status-circle moving">
                        </div><?= $row['USERNAME'] ?>
                    </td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['kontak'] ?></td>
                    <td>
                        <a href="<?= base_url() ?>admin/user/detail/<?= $row['ID_ADMIN'] ?>" class="tm-product-delete-link">
                            <i class="fa fa-child tm-product-delete-icon"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/user/update/<?= $row['ID_ADMIN'] ?>" class="tm-product-delete-link">
                            <i class="fa fa-edit tm-product-delete-icon"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/user/delete/<?= $row['ID_ADMIN'] ?>" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>