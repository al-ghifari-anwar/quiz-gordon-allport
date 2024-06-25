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
                            <h1 class="text-center">
                                <?php
                                if ($jawaban['point_jawaban'] == 25) {
                                    echo "Ooopss";
                                } else if ($jawaban['point_jawaban'] == 50) {
                                    echo "Ooopss";
                                } else if ($jawaban['point_jawaban'] == 75) {
                                    echo "Yahh, Dikit Lagi";
                                } else if ($jawaban['point_jawaban'] == 100) {
                                    echo "YEAA!!";
                                }
                                ?>
                            </h1>
                            <h3 class="text-center">Score Anda Adalah: <br><b class="text-success"><?= $jawaban['point_jawaban'] ?></b></h3>
                            <br>
                            <br>
                            <br>
                            <h5>Terimakasih telah mengikuti quiz</h5>
                            <br>
                            <br>
                            <a href="<?= base_url('soal/finish') ?>" class="btn btn-primary btn-block">Finish</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->