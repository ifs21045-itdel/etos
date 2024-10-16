<head>
    <style>
        /* Tabel dengan border hanya di luar */
        .table-border-luar, .table-border-luar-dalam {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        .table-border-luar th, .table-border-luar td,
        .table-border-luar-dalam th, .table-border-luar-dalam td {
            padding: 8px;
            border: 1px solid black;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Gaya untuk gambar */
        .sample-image {
            width: 180px;
            height: 240px;
            object-fit: cover;
          
            padding: 5px; /* Spasi di dalam kotak gambar */
        }

        /* Print style */
        @media print {
            .table-border-luar, .table-border-luar-dalam {
                width: 100%;
            }
            th {
                background-color: #f2f2f2;
                color: black;
            }
        }

        /* Excel-friendly: memastikan tampilan bagus di Excel */
        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        /* Untuk header agar di tengah */
        .header-center {
            text-align: center;
        }

        /* Spasi bawah header */
        .header-spacing {
            margin-bottom: 10px;
        }

        /* Menghilangkan border baris kosong */
        .no-border {
            border: none;
        }
    </style>
</head>
<body>
    <table class="table-border-luar" colspan="7" align="center">
        <thead>
            <tr>
                <td align='center' width="34%" style="vertical-align: middle; text-align: center;">
                    <?php
                    $image = $_SERVER["HTTP_REFERER"] . 'files/logo.png';
                    echo "<img src='" . $image . "' class='logo' style='max-height: 100px;'>"; // Set max-height if needed
                    ?>
                </td>
                <td colspan="5" width="33%" style="height: 150px; vertical-align: middle; text-align: center;">
                    <h3 style="margin: 0; font-size: 24px;">TEST REPORT</h3>
                </td>
                <td align='center' width="34%" style="height: 150px; vertical-align: middle; text-align: center;">
                    <h3 style="margin: 0; font-size: 24px;">Quality Assurance Department</h3>
                </td>
            </tr>
        </thead>

        <tbody>
            <!-- Rincian laporan -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td> <!-- Spasi -->
            </tr>
            <!-- Bagian Kiri (Laporan dan Data Produk) -->
            <tr>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr><td>Report Number</td><td colspan="3"><?php echo $hardness_test_list->report_date; ?></td></tr>
                        <tr><td>Testing Date</td><td colspan="3"><?php echo $hardness_test_list->test_date; ?></td></tr>
                        <tr><td>Report Date</td><td colspan="3"><?php echo $hardness_test_list->report_date; ?></td></tr>
                        <tr><td>Type of Report</td><td colspan="3"><?php echo $hardness_test_list->test_name; ?></td></tr>
                    </table>
                </td>
                <td width="1%"></td>
                <!-- Bagian Kanan (Spesifikasi Produk) -->
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr><th colspan="3" style="text-align: center;">RESULT</th></tr>
                        <tr><td>PASS</td><td colspan="2"></td></tr>
                        <tr><td>FAIL</td><td colspan="2"></td></tr>
                        <tr><td>CAR</td><td colspan="2"></td></tr>
                    </table>
                </td>
            </tr>

            <!-- Baris Kosong untuk Spasi -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td>
            </tr>

            <!-- Sample Picture and Corrective Action -->
            <tr>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr><th colspan="4" style="text-align: center;">Sample Picture</th></tr>
                        <tr style="height: 384px;">
                            <td align="center" style="vertical-align: middle;" colspan="4">
                                <?php if (trim($hardness_test_list->product_image) != "") {
                                    $image = $_SERVER["HTTP_REFERER"] . 'files/hardnesstest/' . $hardness_test_list->id . "/" . $hardness_test_list->product_image;
                                    $width = 3 * 60;  
                                    $height = 4 * 60; 
                                    echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                } ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="1%"></td>
                <td colspan="3" width="60%">
                    <table class="table-border-luar">
                        <tr><th colspan="3" style="text-align: center;">Corrective Action Item</th></tr>
                        <tr style="height: 384px;"></tr>
                    </table>
                </td>
            </tr>
            <!-- Baris Kosong untuk Spasi -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td>
            </tr>
            <!-- Summary -->
            <tr>
                <tr><th colspan="7">PRODUCT</th></tr>
                <tr><td>Report Number</td><td colspan="6"><?php echo $hardness_test_list->report_date; ?></td></tr>
                <tr><td>Testing Date</td><td colspan="6"><?php echo $hardness_test_list->test_date; ?></td></tr>
                <tr><td>Report Date</td><td colspan="6"><?php echo $hardness_test_list->report_date; ?></td></tr>
                <tr><td>Type of Report</td><td colspan="6"><?php echo $hardness_test_list->test_name; ?></td></tr>
            </tr>
            <!-- Baris Kosong untuk Spasi -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td>

            <tr>
            <tr><th colspan="7">TEST RESULT SUMMARY</th></tr>
            </tr>
            </tr>
                <td colspan="7">
                    <table class="table-border-luar-dalam">
                        <?php foreach ($hardness_test_list_detail as $result) {
                            if ($result->var_type == 'Description') { ?>
                                <tr>
                                    <td><?php echo $result->method; ?></td>
                                    <td><?php echo $result->notes; ?></td>
                                </tr>
                            <?php } } ?>
                    </table>
                </td>
            </tr>
            <!-- Rincian Test Non-Deskripsi -->
            <tr>
            <td colspan="7">
                <table cellpadding="0" cellspacing="0" width="100%" class="table-border-luar-dalam">    
                <tr><td colspan="2">Pencil Hardness</td><td colspan="3">Result</td><td colspan="3">Picture</td></tr>
                    <?php
                    foreach ($hardness_test_list_detail as $result) {
                        if ($result->var_type != 'Description') {
                            ?>
                            <tr style="height: 384px;">
                                <td style="border: 1px solid #000; padding: 8px;" colspan="2">
                                    <?php echo $result->method; ?>
                                </td>
                                <td width="50%" style="border: 1px solid #000; padding: 8px;" colspan="3">
                                    <?php echo $result->method; ?>
                                </td>
                                <td width="50%" align="center" style="border: 1px solid #000; padding: 8px;" colspan="3">
                                    <?php
                                    if (trim($result->image_file) != "") {
                                        $image = $_SERVER["HTTP_REFERER"] . 'files/hardnesstest/' . $result->hardness_test_list_id . "/" . $result->image_file;
                                        $width = 3 * 60;  
                                        $height = 4 * 60; 
                                        echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                        echo "<br><span style='font-size: 12px;'>" . $result->method . "</span>"; // Label mengikuti ukuran gambar
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </td>
        </tr>
            
        </tbody>
    </table>
</body>