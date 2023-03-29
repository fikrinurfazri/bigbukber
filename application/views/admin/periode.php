<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 tm-block-col">
            <a href="<?= base_url() ?>admin/periode/v_add" class="btn btn-primary btn-block text-uppercase col-sm-3"><i class="fa fa-plus"></i> Tambah</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">NO</th>
                                <th scope="col">DESKRIPSI</th>
                                <th scope="col">TAHUN</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($periode as $p) : ?>
                                <tr>
                                    <th scope="row"><input type="checkbox" /></th>
                                    <td><?= $no++ ?></td>
                                    <td class="tm-product-name"><?= $p->deskripsi ?></td>
                                    <td><?= $p->tahun ?></td>
                                    <td><?= $p->status ?></td>
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