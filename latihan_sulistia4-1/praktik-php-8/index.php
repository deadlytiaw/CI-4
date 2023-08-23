<html>

<head>
    <title>Buku Tamu</title>
</head>

<body>
    <h2 align="center">Selamat datang di Bukutamu</h2>
    <div align="center">
        <tr>
            <td><a href="login php">Login</a></td>
            <td> | </td>
            <td><a href="input_user.php">Input user</a></td>
        </tr>
    </div>
    <p>
        <?php
        include "config.php";
        // banyaknya baris yang tampil per halaman
        $rowsPerPage = 5;

        // muncul pertama  secara default
        $pageNum = 1;

        // jika $_GET['page'] didefinisikan, gunakan sebagai nomor halaman
        if (isset($_GET['page'])) {
            $pageNum = $_GET['page'];
        }

        // menghitung offset 
        $offset = ($pageNum - 1) * $rowsPerPage; 
        $query = "SELECT * FROM pengunjung ORDER BY 'id' DESC LIMIT $offset, $rowsPerPage";
        $result = mysqli_query($conn, $query) or die ('Eror, query failed 1');

        // jumlah total 
        $query1 = "SELECT COUNT(id) AS numrows FROM pengunjung";
        $result1 = mysqli_query($conn, $query1) or die ('Eror, query failed 2');
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $numrows = $row1['numrows'];
        echo "Total nomor bukutamu : $numrows";
        ?>
    </p>

    <?php
    $no = 1;
    while ($hasil = mysqli_fetch_array($result)) {
        ?>
        <table width="99%" border="0" align="center" cellpadding="2" cellsapcing="0" class="content">
            <tr valign="top">
                <td bgcolor="#FFDFFF"><span class="style2"> dari
                    <?php echo $hasil['nama']; ?> pada
                    <?php echo $hasil['date']; ?> 
         </span></td>
            </tr>
            <tr valign="top">
                <td bgcolor="#FFBFAA">
                    <?php echo $hasil['komentar']; ?>
                </td>
            </tr>
    </table>

    <?php $no++;
    echo "<br>";
    }?>

    <?php
    // banyaknya baris yang ada di database
    $query = "SELECT COUNT(id) AS numrows FROM pengunjung";
    $result = mysqli_query($conn, $query) or die('Eror, query failed');
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $numrows = $row['numrows'];

    // banyaknya halaman ketika menggunkan paging
    $maxPage = ceil ($numrows / $rowsPerPage);

    // tampilkan link untuk akses tiap halaman
    $self =$_SERVER['PHP_SELF'];
    $nav = '';
    for ($page = 1; $page <= $maxPage; $page++){
        if ($page == $pageNum){
            $nav .= " $page "; // tidak dibutuhkan link ke halaman saat ini
        } else {
            $nav .= " <a href=\"$self?page=$page\">$page<?a> ";
        }
    }

        // membuat link prevuious dan next
    // ditambah link langsung ke
    // halaman awal dan akhir

    if ($pageNum > 1){
        $page = $pageNum - 1;
        $prev = "<a href=\"$self?page=$page\">[Prev]</a>";

        $first = "<a href=\"$self?page=1\">[First Page]</a>";
    } else {
        $prev = '&nbsp;'; // ada di halaman perta,a, jangan tamppilkan link previous
        $first = '&nbsp;'; // juga jangan tampilkan link first page
    }

    if ($pageNum < $maxPage) {
        $page = $pageNum + 1;
        $next = "<a href=\"$self?page=$page\">[Next]</a>";

        $last = "<a href=\"$self?page=$maxPage\">[Last Page]</a>";
    } else {
        $next = '&nbsp;'; // ada di halaman perta,a, jangan tamppilkan link next
        $last = '&nbsp;'; // juga jangan tampilkan link last page
    }

    // tampilkan link novigasi
    echo "<center>$first " . " $prev " . "$nav" . "next" . " $last</center>";
    ?>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>