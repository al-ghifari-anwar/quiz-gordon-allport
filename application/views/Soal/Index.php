<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4><?= $soal['text_soal'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <?php
            $getPilihan = $this->MPilihan->getByIdSoal($soal['id_soal']);
            ?>
            <p class="text-center">Pilihan</p>
            <form method="post" action="<?= base_url('soal/save') ?>">
                <div class="row mt-3">
                    <input type="text" name="id_user" value="<?= $this->session->userdata("id_user") ?>" hidden>
                    <input type="text" name="id_soal" value="<?= $soal['id_soal'] ?>" hidden>
                    <?php foreach ($getPilihan as $pilihan) : ?>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 px-3">
                                        <input type="radio" class="form-check-input" name="id_pilihan" id="radio<?= $pilihan['id_pilihan'] ?>" value="<?= $pilihan['id_pilihan'] ?>">
                                        <label for="radio<?= $pilihan['id_pilihan'] ?>" class="form-check-label">
                                            <h5><?= $pilihan['text_pilihan'] ?></h5>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-12 mt-3">
                        <?php if ($this->session->userdata('count_soal') < 4) : ?>
                            <button type="submit" class="btn btn-primary btn-block">NEXT</button>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('count_soal') >= 4) : ?>
                            <button type="submit" class="btn btn-primary btn-block">FINISH</button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->