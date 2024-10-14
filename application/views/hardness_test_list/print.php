<head>
    <style>
        /* Tabel dengan border hanya di luar */
        .table-border-luar {
            border-collapse: collapse;
            width: 100%; /* Set width to 100% for better Excel compatibility */
            border: 1px solid black; /* Border hanya di luar */
        }

        .table-border-luar th, .table-border-luar td {
            padding: 8px;
            border: 1px solid black; /* Border dalam */
            text-align: left; /* Align text to the left */
        }

        /* Header style */
        th {
            background-color: #f2f2f2; /* Light gray background for headers */
            font-weight: bold;
        }

        /* Center-align header */
        .header-center {
            text-align: center;
        }

        /* Image styling */
        .logo {
            display: block; 
            margin: 0 auto; 
            width: 100px; /* Adjust width as necessary */
        }

        /* Add some spacing below the header */
        .header-spacing {
            margin-bottom: 10px; /* Adjust the spacing as needed */
        }

        /* No border row style */
        .no-border {
            border: none; /* Remove border for this row */
        }

        /* Style untuk gambar 4x6 */
        .sample-image {
            width: 50px; /* Ubah lebar sesuai dengan kebutuhan (4 inci pada 300 DPI) */
            height: 100px; /* Ubah tinggi sesuai dengan kebutuhan (6 inci pada 300 DPI) */
            object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        }
    </style>
</head>
<body>
    <table class="table-border-luar" align="center">
        <thead>
            <tr>
                <td align='center' width="34%" style="vertical-align: middle;">
                    <?php
                    $image = $_SERVER["HTTP_REFERER"] . 'files/logo.png';
                    echo "<img src='" . $image . "' class='logo'>";
                    ?>
                </td>
                <td colspan="5" class="header-center header-spacing" width="33%" style="height: 150px; vertical-align: middle; text-align: center;">
                    <h3 style="margin: 0;">IN-HOUSE TEST REPORT</h3>
                </td>
                <td align='center' width="34%" style="height: 150px; vertical-align: middle; text-align: center;">
                    <h3 style="margin: 0;">Quality Assurance Department</h3>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td> <!-- Adjust height for spacing -->
            </tr>
            <tr>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr>
                            <td width='40%'>Report Number</td>
                            <td width='2%' align='center'>:</td>
                            <td colspan="2"d width='80%' ><?php echo $hardness_test_list->report_no; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Test Date</td>
                            <td width='2%' align='center'>:</td>
                            <td width='80%' colspan="2"><?php echo date('d M Y', strtotime($hardness_test_list->test_date)); ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Report Date</td>
                            <td width='2%' align='center'>:</td>
                            <td width='80%' colspan="2"><?php echo date('d M Y', strtotime($hardness_test_list->report_date)); ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Type of Report</td>
                            <td width='2%' align='center'>:</td>
                            <td width='80%' colspan="2"><?php echo $hardness_test_list->protocol_name; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="1%"></td>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr>
                            <th colspan="3" style="text-align: center;">RESULT</th>
                        </tr>
                        <tr>
                            <td width='50%'>PASS</td>
                            <td width='2%' align='center'>:</td>
                            <td width='48%' align='center'>
                                <?php
                                if ($hardness_test_list->rating == 'Passed')
                                    echo '<b>X</b>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width='50%'>FAIL</td>
                            <td width='2%' align='center'>:</td>
                            <td width='48%' align='center'>
                                <?php
                                if ($hardness_test_list->rating == 'Failed')
                                    echo '<b>X</b>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width='50%'>CAR</td>
                            <td width='2%' align='center'>:</td>
                            <td width='48%' align='center'>
                                <?php
                                if ($hardness_test_list->rating == 'Car')
                                    echo '<b>X</b>';
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td> <!-- Adjust height for spacing -->
            </tr>
            <tr>
                <td colspan="3" width="48%">
                  <table class="table-border-luar">
                        <tr>
                            <th colspan="4"  style="text-align: center;">PRODUCT</th>
                        </tr>
                        <tr>
                            <td width='40%'>Customer</td>
                            <td width='2%' align='center'>:</td>
                            <td width='58%' colspan="2"><?php echo $hardness_test_list->client_name; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Ebako Code</td>
                            <td width='2%' align='center'>:</td>
                            <td width='58%' colspan="2"><?php echo $hardness_test_list->ebako_code; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Customer Code</td>
                            <td width='2%' align='center'>:</td>
                            <td width='58%' colspan="2"><?php echo $hardness_test_list->customer_code; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Item Description</td>
                            <td width='2%' align='center'>:</td>
                            <td width='58%' colspan="2"><?php echo $hardness_test_list->item_description; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="1%"></td>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                    <tr>
                            <th colspan="3"  style="text-align: center;">PRODUCT SPESIFICATION</th>
                    </tr>
                    <tr>
                        <td width='50%'>Product Dimension (Inches)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $hardness_test_list->product_dimension; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Carton Dimension (Inches)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $hardness_test_list->carton_dimension; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Gross Weight (Lbs)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $hardness_test_list->gross_weight; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Nett  Weight (Lbs)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $hardness_test_list->nett_weight; ?></td>
                    </tr>
                    </table>
                </td>
            </tr>
           











            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td> <!-- Adjust height for spacing -->
            </tr>
            <tr>
    <!-- Kolom Kiri: Gambar Sampel -->
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <!-- Judul Kolom: Sample Picture -->
                        <tr>
                            <th colspan="4" style="text-align: center;">Sample Picture</th>
                        </tr>
                        <!-- Baris Gambar -->
                        <tr style="height: 384px;">
                            <td align="center" style="vertical-align: middle; width: 150    px;" colspan="4">
                                <!-- Cek apakah ada gambar produk -->
                                <?php
                                if (trim($hardness_test_list->product_image) != "") {
                                    // Mendapatkan URL gambar
                                    $image = $_SERVER["HTTP_REFERER"] . 'files/hardnesstest/' . $hardness_test_list->id . "/" . $hardness_test_list->product_image;
                                    $width = 3 * 60;  
                                    $height = 4 * 60; 
                                    echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>

    <!-- Spasi Antara Kedua Kolom -->
                <td width="1%"></td>

            <td colspan="3" width="40%" rowspan="1">
                <table class="table-border-luar">
                    <!-- Judul Kolom: Corrective Action Item -->
                    <tr>
                        <th colspan="3" style="text-align: center;">Corrective Action Item</th>
                    </tr>

                    <!-- Baris Kosong untuk Penyesuaian Ruang Tabel -->
                    <tr style="height: 384px;"></tr>
                </table>
            </td>
            </tr>
          <!--=========================rapikan yang dibawah agar bagus ketika di print======================-->
          <tr>
            <th bgcolor='#ffff99' colspan="7" align="center">TEST RESULT SUMMARY</th>
         </tr> 
         <tr>
    <td colspan="7">
        <table cellpadding="0" cellspacing="0" width="100%" class="table-border-luar-dalam">
            <?php
            foreach ($hardness_test_list_detail as $result) {
                if ($result->var_type == 'Description') {
                    ?>
                    <tr>
                        <td width="50%" style="border: 1px solid #000; padding: 8px;">
                            <?php echo $result->method; ?>
                        </td>
                        <td width="50%" style="border: 1px solid #000; padding: 8px;">
                            <?php echo $result->notes; ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </td>
</tr>

<tr>
    <td colspan="7">
        <table cellpadding="0" cellspacing="0" width="100%" class="table-border-luar-dalam">
            <?php
            foreach ($hardness_test_list_detail as $result) {
                if ($result->var_type != 'Description') {
                    ?>
                    <tr style="height: 384px;">
                        <td width="50%" style="border: 1px solid #000; padding: 8px;" colspan ="4">
                            <?php echo $result->method; ?>
                        </td>
                        <td width="50%" align="center" style="border: 1px solid #000; padding: 8px;" colspan="5">
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
