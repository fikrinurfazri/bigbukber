<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
        <!-- Item -->
        <div class="item item-1">
            <div class="img-fill">
                <div class="text-content">
                    <h6>selamat datang di</h6>
                    <h4>BIGBUKBER</h4>
                    <p>“Orang-orang yang memelihara anak yatim di antara umat muslimin, memberikan mereka makan dan minum, pasti Allah memasukkannya ke dalam surga, kecuali ia melakukan dosa yang tidak bisa diampuni.”
                        <br>
                        (HR Tirmidzi dari Ibnu Abbas).
                    </p>
                    <a href="contact.html" class="filled-button">contact us</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Banner Ends Here -->

<div class="request-form">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-8">
                    <h4>Request a call back right now ?</h4>
                    <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
                </div>
                <div class="col-md-4">
                    <a href="contact.html" class="border-button">Contact Us</a>
                </div> -->
        </div>
    </div>
</div>

<div class="services" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Galeri <em>Kegiatan</em></h2>
                    <span>Ragam Kegiatan <b> #BigBukber</b></span>
                </div>
                <form action="<?= base_url() ?>beranda" method="get">
                    <div class="d-flex">
                        <div class="form-group col-3">
                            <select name="cari" id="" class="form-control">
                                <?php foreach ($periode as $pd) : ?>
                                    <option value="<?= $pd['tahun'] ?>"><?= $pd['tahun'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <?php foreach ($galeri as $g) : ?>
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="<?= base_url() ?>assets/upload/<?= $g['file'] ?>" alt="">

                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</div>
<div class="services mb-3" id="artikel">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Artikel <em>Terbaru</em></h2>
                    <span>Artikel seputar Bigbukber</span>
                </div>
            </div>
            <?php foreach ($artikel as $art) : ?>
                <div class="col-md-4">
                    <div class="service-item">
                        <img src="<?= base_url() ?>assets/upload/<?= $art['file'] ?>" alt="">
                        <div class="down-content">
                            <h4><?= $art['judul'] ?></h4>
                            <p><?= $art['isi'] ?></p>
                            <a href="" class="filled-button">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>