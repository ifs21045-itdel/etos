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
            background-color: #d0f0c0; /* Warna hijau */
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
                background-color: #d0f0c0;
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
    <table class="table-border-luar" align="center">
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
                        <tr><th colspan="3" style="text-align: center;">PRODUCT SPESIFICATION</th></tr>
                        <tr><td>Product Dimension (Inches)</td><td>:</td><td><?php echo $drop_test_list->product_dimension; ?></td></tr>
                        <tr><td>Carton Dimension (Inches)</td><td>:</td><td><?php echo $drop_test_list->carton_dimension; ?></td></tr>
                        <tr><td>Gross Weight (Lbs)</td><td>:</td><td><?php echo $drop_test_list->gross_weight; ?></td></tr>
                        <tr><td>Nett Weight (Lbs)</td><td>:</td><td><?php echo $drop_test_list->nett_weight; ?></td></tr>
                    </table>
                </td>
                <td width="1%" colspan ="3"></td>

                <!-- Bagian Kanan (Spesifikasi Produk) -->
                <td width="48%">
                    <table class="table-border-luar">
                        <tr><th colspan="2" style="text-align: center;">RESULT</th></tr>
                        <tr>
                            <td>PASS</td>
                            <td width='70%' align='center'>
                                <?php if ($drop_test_list->rating == 'Passed') echo '<b>X</b>'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>FAIL</td>
                            <td width='70%' align='center'>
                                <?php if ($drop_test_list->rating == 'Failed') echo '<b>X</b>'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>CAR</td>
                            <td width='70%' align='center'>
                                <?php if ($drop_test_list->rating == 'Car') echo '<b>X</b>'; ?>
                            </td>
                        </tr>
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
                        <tr><th colspan="6" style="text-align: center;">Sample Picture</th></tr>
                        <tr style="height: 384px;">
                            <td align="center" style="vertical-align: middle;" colspan="6">
                                <?php
                                if (trim($drop_test_list->product_image) != "") {
                                    $image = $_SERVER["HTTP_REFERER"] . 'files/droptest/' . $drop_test_list->id . "/" . $drop_test_list->product_image;
                                    echo "<img src='" . $image . "' class='sample-image' />";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="1%" colspan></td>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr><th colspan="6" style="text-align: center;">Corrective Action Item</th></tr>
                        <tr style="height: 384px;">
                            <td align="center" style="vertical-align: middle;" colspan="6">
                                <?php
                                if (trim($drop_test_list->corrective_action_plan_image) != "") {
                                    $image = $_SERVER["HTTP_REFERER"] . 'files/droptest/' . $drop_test_list->id . "/" . $drop_test_list->corrective_action_plan_image;
                                    echo "<img src='" . $image . "' class='sample-image' />";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- Baris Kosong untuk Spasi -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td>
            </tr>

            <!-- Summary -->
            <tr>
                <th colspan="7" style="text-align: center;">PRODUCT</th>
            </tr>
            <tr><td>Customer</td><td style="width: 1%; white-space: nowrap;">:</td><td colspan="6"><?php echo $drop_test_list->client_name; ?></td></tr>
            <tr><td>Ebako Code</td><td style="width: 1%; white-space: nowrap;">:</td><td colspan="6"><?php echo $drop_test_list->ebako_code; ?></td></tr>
            <tr><td>Customer Code</td><td style="width: 1%; white-space: nowrap;">:</td><td colspan="6"><?php echo $drop_test_list->customer_code; ?></td></tr>
            <tr><td>Item Description</td><td style="width: 1%; white-space: nowrap;">:</td><td colspan="6"><?php echo $drop_test_list->item_description; ?></td></tr>

            <!-- Baris Kosong untuk Spasi -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td>
            </tr>

            <!-- Rincian Test -->
            <tr>
                <td colspan="7">
                    <table class="table-border-luar-dalam">
                        <?php foreach ($drop_test_list_detail as $result) {
                            if ($result->var_type == 'Description') { ?>
                                <tr>
                                    <td><?php echo $result->method; ?></td>
                                    <td><?php echo $result->notes; ?></td>
                                </tr>
                            <?php } } ?>
                    </table>
                </td>
            </tr>

            <!-- Test Result Summary -->
            <tr>
                <th colspan="7" style="text-align: center;">TEST RESULT SUMMARY</th>
            </tr>

            <tr>
                <td colspan="7">
                    <table class="table-border-luar-dalam">
                        <?php foreach ($drop_test_list_detail as $result) {
                            if ($result->var_type != 'Description') { ?>
                                <tr style="height: 384px;">
                                    <td width="30%" style="border: 1px solid #000; padding: 8px;">
                                        <?php echo $result->method; ?>
                                    </td>
                                    <td width="70%" align="center" style="border: 1px solid #000; padding: 8px;">
                                        <?php
                                        if (trim($result->image_file) != "") {
                                            $image = $_SERVER["HTTP_REFERER"] . 'files/droptest/' . $result->drop_test_list_id . "/" . $result->image_file;
                                            $width = 180;  // Width gambar yang disesuaikan
                                            $height = 240; // Height gambar yang disesuaikan
                                            echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                            echo "<br><span style='font-size: 12px;'>" . $result->method . "</span>"; // Label mengikuti ukuran gambar
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php } } ?>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
