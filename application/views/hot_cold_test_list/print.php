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
                    <h3 style="margin: 0; font-size: 24px;">IN-HOUSE TEST REPORT</h3>
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
                        <tr><td colspan = "2">Report Number</td><td colspan="4" width='80%'><?php echo $hot_cold_test_list->report_date; ?></td></tr>
                        <tr><td colspan = "2">Testing Date</td><td colspan="4"width='80%'><?php echo $hot_cold_test_list->test_date; ?></td></tr>
                        <tr><td colspan = "2">Report Date</td><td colspan="4" width='80%'><?php echo $hot_cold_test_list->report_date; ?></td></tr>
                        <tr><td colspan = "2">Type of Report</td><td colspan="4" width='80%'><?php echo $hot_cold_test_list->test_name; ?></td></tr>
                    </table>
                </td>
                <td width="1%" colspan ="3"></td>
                <!-- Bagian Kanan (Spesifikasi Produk) -->
                <td width="48%">
                    <table class="table-border-luar">
                        <tr>
                            <!-- <th colspan="2" style="text-align: center; background-color: #d0f0c0;">RESULT</th> -->
                        </tr>
                        <tr>
                            <td>PASS</td>
        
                            <td width='70%' align='center' >
                                <?php
                                if ($hot_cold_test_list->rating == 'Passed')
                                    echo '<b>X</b>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>FAIL</td>
        
                            <td width='70%' align='center'> 
                                <?php
                                if ($hot_cold_test_list->rating == 'Failed')
                                    echo '<b>X</b>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>CAR</td>
        
                            <td width='7    0%' align='center' >
                                <?php
                                if ($hot_cold_test_list->rating == 'Car')
                                    echo '<b>X</b>';
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

            <!-- Sample Picture and Corrective Action -->
            <tr>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr><th colspan="6" style="text-align: center; background-color: #d0f0c0;">Sample Picture</th></tr>
                        <tr style="height: 384px;">
                            <td align="center" style="vertical-align: middle;" colspan="6">
                                <?php if (trim($hot_cold_test_list->product_image) != "") {
                                    $image = $_SERVER["HTTP_REFERER"] . 'files/hotcoldtest/' . $hot_cold_test_list->id . "/" . $hot_cold_test_list->product_image;
                                    $width = 3 * 60;  
                                    $height = 4 * 60; 
                                    echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                } ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="1%" colspan></td>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr><th colspan="6" style="text-align: center; background-color: #d0f0c0;" >Corrective Action Item</th></tr>
                        <tr style="height: 384px;">
                            <td align="center" style="vertical-align: middle;" colspan="6">
                                <?php if (trim($hot_cold_test_list->product_image) != "") {
                                    $image = $_SERVER["HTTP_REFERER"] . 'files/hotcoldtest/' . $hot_cold_test_list->id . "/" . $hot_cold_test_list->corrective_action_plan_image;
                                    $width = 3 * 60;  
                                    $height = 4 * 60; 
                                    echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                } ?>
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
                <tr><th colspan="7" style="background-color: #d0f0c0;">PRODUCT</th></tr>
                <tr><td>Customer</td><td colspan="6"><?php echo $hot_cold_test_list->client_name; ?></td></tr>
                <tr><td>Sample Code</td><td colspan="6"><?php echo $hot_cold_test_list->customer_code; ?></td></tr>
                <tr><td>Vendor</td><td colspan="6"><?php echo $hot_cold_test_list->vendor_name; ?></td></tr>
            </tr>
            <!-- Baris Kosong untuk Spasi -->
             <!-- Tabel Kondisi Pengujian (Testing Conditions) -->
             <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td>
            </tr>
            <tr>
                <td colspan="7">
                    <table class="table-border-luar" style="text-align: center; width: 100%;">
                        <tr>
                            <th colspan="3" style="background-color: #d0f0c0;">Testing Conditions (1 Cycle) = Total 10 Cycles</th>
                        </tr>
                        <tr>
                            <td style="width: 33%;">Condition A</td>
                            <td style="width: 33%;">Temperature <?php echo $hot_cold_test_list->condition_a_temp; ?>°C (oven)</td>
                            <td style="width: 33%;">Duration <?php echo $hot_cold_test_list->condition_a_duration; ?> hour</td>
                        </tr>
                        <tr>
                            <td>Room Temperature Rest</td>
                            <td colspan="2"><?php echo $hot_cold_test_list->room_temp_rest_a_duration; ?> minutes</td>
                        </tr>
                        <tr>
                            <td>Condition B</td>
                            <td>Temperature <?php echo $hot_cold_test_list->condition_b_temp; ?>°C (freezer)</td>
                            <td>Duration <?php echo $hot_cold_test_list->condition_b_duration; ?> hour</td>
                        </tr>
                        <tr>
                            <td>Room Temperature Rest</td>
                            <td colspan="2"><?php echo $hot_cold_test_list->room_temp_rest_b_duration; ?> minutes</td>
                        </tr>
                    </table>
                </td>
            </tr>
            

            
            <!-- Tabel Testing Progress -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td>
            </tr>
            <!-- Tabel Testing Progress -->

            <tr>
                <td colspan="7">
                    <table class="table-border-luar" style="text-align: center; width: 100%;">
                       
                        <tr>
                            <th colspan="11" style="background-color: #d0f0c0;">Testing Progress</th>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Cycle</td>
                            <?php for ($i = 1; $i <= 10; $i++) { ?>
                                <td><?php echo $i; ?></td>
                            <?php } ?>
                        </tr>
                        
                        <tr>
                            <td>Status</td>
                            <?php 
                          
                            for ($i = 1; $i <= $hot_cold_test_list->cycles; $i++) { ?>
                                <td>√</td>
                            <?php } ?>
                            
                            <?php for ($i = $hot_cold_test_list->cycles + 1; $i <= 10; $i++) { ?>
                                <td>-</td>
                            <?php } ?>
                        </tr>
                    </table>
                </td>
            </tr>



           
            
            </tr>
            </tr>
                <td colspan="7">
                    <table class="table-border-luar-dalam">
                        <?php foreach ($hot_cold_test_list_detail as $result) {
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
            <!-- Test Result Summary Table -->
            <tr class="no-border">
                <td colspan="7" style="height: 50px;"></td> <!-- Spasi -->
            </tr>
            <tr>
                <td colspan="7">
                    <table class="table-border-luar" style="width: 100%; text-align: center;">
                        <tr>
                            <th colspan="7" style="background-color: #d0f0c0; text-align: center;">TEST RESULT SUMMARY</th>
                        </tr>

                        <!-- Looping untuk setiap hasil pengujian -->
                        <?php foreach ($hot_cold_test_list_detail as $result) { ?>
                            <tr>
                                <!-- Gambar Kiri dari $result->image_file -->
                                <td colspan="3" style="text-align: center;">
                                <?php
                                                if (trim($result->image_file) != "") {
                                                    $image = $_SERVER["HTTP_REFERER"] . 'files/hotcoldtest/' . $result->hot_cold_test_list_id . "/" . $result->image_file;
                                                    $width = 3 * 60;  
                                                    $height = 4 * 60; 
                                                    echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                                    echo "<br><span style='font-size: 12px;'>" . $result->method . "</span>"; // Label mengikuti ukuran gambar
                                                }
                                                ?>
                                </td>

                                <!-- Gambar Kanan dari $result->image2_file -->
                                <td colspan="3" style="text-align: center;">
                                <?php
                                                if (trim($result->image_file) != "") {
                                                    $image = $_SERVER["HTTP_REFERER"] . 'files/hotcoldtest/' . $result->hot_cold_test_list_id . "/" . $result->image2_file;
                                                    $width = 3 * 60;  
                                                    $height = 4 * 60; 
                                                    echo "<img src='" . $image . "' width='" . $width . "' height='" . $height . "' style='margin-top: 10px;' />";
                                                    echo "<br><span style='font-size: 12px;'>" . $result->method . "</span>"; // Label mengikuti ukuran gambar
                                                }
                                                ?>
                                </td>
                            </tr>

                            <!-- Baris untuk Nama Material dan Status Hasil Pengujian -->
                            <tr>
                                <td colspan="3" style="text-align: center; font-weight: bold;"><?php echo $result->evaluation; ?></td>
                                <td colspan="3" style="text-align: center; font-weight: bold;"><?php echo $result->result_test_var; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>

            
        </tbody>
    </table>
</body>