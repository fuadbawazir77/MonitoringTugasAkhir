<html>

<body>
    <?php
    $test = $this->session->userdata('user_id');
    if (isset($error)) {
        echo "ERROR UPLOAD : <br/>";
        print_r($error);
        echo "<hr/>"; 
    }
    ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/upload/proses">
        <div>Berkas : </div>
        <div><input type="file" name="berkas"></div>
        <div>Keterangan : </div>
        <div><textarea name="keterangan_berkas"></textarea></div>
        <div><input type="hidden" name="userid" value="<?php echo $test; ?>"></div>
        <div><input type="submit" value="Simpan" /></div>
    </form>
</body>

</html>