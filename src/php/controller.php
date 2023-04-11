<?php
$path = './output/';
if (isset($_POST['buatfile'])) {
    $tmp = 'tmp';
    $filename = $path . $_POST['namafile'] . '.yaml';
    copy($tmp, $filename);
    echo '<script>toast("File dibuat!!!");</script>';
}
if (isset($_POST['generate'])) {
    $namafile = 'tmp';
    $data = $_POST['data'];
    $copy = decodefile($data);
    //echo "<script>copy(`" . $copy . "`);</script>";
    echo "<script>generate(`" . $copy . "`,`" . $data . "`) </script>";
}
function decodefile($data)
{
    file_put_contents("tmp", '');
    $data = str_replace("vmess://", "", $data);
    $file = fopen("tmp", 'a+');
    $output = '';
    fwrite($file, $data);
    fclose($file);
    $file = fopen("tmp", 'r');
    //echo fgets($filetmp, 2000);
    $lineawal = true;
    while (!feof($file)) {
        $temp = fgets($file);
        $tmp = base64_decode($temp);
        //echo $tmp;
        if ($tmp == '') {
            continue;
        }
        if (mb_detect_encoding($tmp, 'UTF-8', true)) {
            if ($lineawal == true) {
                $output = $output . $tmp;
                $lineawal = false;
            } else {
                $output = $output . ',' . $tmp;
            }
        } else {
            echo "<script>toast('Ada yang salah bro!!');</script>";
            return;
        }
    }
    $output = '[' . $output . ']';
    fclose($file);

    $obj = json_decode($output, true);

    //file_put_contents('tmp', '');
    file_put_contents("tmp", '');
    $file = fopen('tmp', 'c+');
    //clearstatcache();

    fwrite($file, 'proxies:');
    for ($i = 0; $i < count($obj); $i++) {
        if ($obj[$i]['tls'] == 'tls') {
            $obj[$i]['tls'] = 'true';
        } else {
            $obj[$i]['tls'] = 'false';
        }
        $tulis[$i] = '
  - name: ' . $obj[$i]['ps'] . '
    server: ' . $obj[$i]['add'] . '
    port: ' . $obj[$i]['port'] . '
    type: vmess
    uuid: ' . $obj[$i]['id'] . '
    alterId: ' . $obj[$i]['aid'] . '
    cipher: none
    tls: ' . $obj[$i]['tls'] . '
    skip-cert-verify: true
    servername: ' . $obj[$i]['host'] . '
    network: ' . $obj[$i]['net'] . '
    ws-opts:
      path: ' . $obj[$i]['path'] . '
      headers:
        Host: ' . $obj[$i]['host'] . '
    udp: true
';
        fwrite($file, $tulis[$i]);
    }

    fclose($file);

    $file = fopen('tmp', 'r');
    $output = fread($file, filesize("tmp"));
    echo "<script>toast('Generated!!');</script>";
    return $output;
}
