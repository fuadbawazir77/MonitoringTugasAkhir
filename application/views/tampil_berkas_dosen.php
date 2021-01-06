<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() . 'assets/css/datatables.css' ?>" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col col-lg-8">
                <h3>Data Berkas</h3>
                <hr />
                <a href="javascript:window.history.go(-1);">Kembali ke halaman sebelumnya</a>
                <hr />
                <form method="post" id="comment" action="<?php echo base_url(); ?>index.php/upload/comment1"></form>
                <table class="table table-striped" id="mytable" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($berkas->result() as $row) :
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->nama_berkas; ?></td>
                                <td><?php echo $row->keterangan_berkas; ?></td>
                                <td><a href="<?php echo base_url(); ?>index.php/upload/download/<?php echo $row->kd_berkas; ?>">Download</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <table id="comment" style="font-size: 14px;">
                    <thead>
                        <tr>

                            <th>username</th>
                            <th>comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $test = $this->uri->segment(3);
                        $name = $this->session->userdata('username');
                        $no = 0;
                        foreach ($comment->result() as $row) :
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $row->username; ?></td>
                                <td><?php echo $row->comment; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <td>
                        <input type="text" name="isi" form="comment" />
                        <input type="hidden" name="userid" value="<?php echo $test; ?>" form="comment" />
                        <input type="hidden" name="username" value="<?php echo $name; ?>" form="comment" />
                        <button type="submit" form="comment" value="Simpan">comment</button>
                    </td>
                </table>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/datatables.js' ?>"></script>
    </script>
</body>

</html>