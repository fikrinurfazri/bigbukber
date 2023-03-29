<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 tm-block-col">
            <a href="<?= base_url() ?>admin/korcam/v_add" class="btn btn-primary btn-block text-uppercase col-sm-3"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">KONTAK</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($korcam as $p) : ?>
                                <tr>
                                    <th scope="row"><input type="checkbox" /></th>
                                    <td><?= $no++ ?></td>
                                    <td class="tm-product-name"><?= $p->nama ?></td>
                                    <td><?= $p->alamat ?></td>
                                    <td><?= $p->kontak ?></td>
                                    <td>
                                        <a href="#" class="tm-product-delete-link">
                                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                        </a>
                                        <a href="#" class="tm-product-delete-link">
                                            <i class="fa fa-child tm-product-delete-icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary btn-block text-uppercase">
                    Delete selected products
                </button>
            </div>
        </div>

    </div>
</div>