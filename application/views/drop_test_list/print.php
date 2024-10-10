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
                            <td colspan="2"d width='80%' ><?php echo $drop_test_list->report_no; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Test Date</td>
                            <td width='2%' align='center'>:</td>
                            <td width='80%' colspan="2"><?php echo date('d M Y', strtotime($drop_test_list->test_date)); ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Report Date</td>
                            <td width='2%' align='center'>:</td>
                            <td width='80%' colspan="2"><?php echo date('d M Y', strtotime($drop_test_list->report_date)); ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Type of Report</td>
                            <td width='2%' align='center'>:</td>
                            <td width='80%' colspan="2"><?php echo $drop_test_list->protocol_name; ?></td>
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
                                if ($drop_test_list->rating == 'Passed')
                                    echo '<b>X</b>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width='50%'>FAIL</td>
                            <td width='2%' align='center'>:</td>
                            <td width='48%' align='center'>
                                <?php
                                if ($drop_test_list->rating == 'Failed')
                                    echo '<b>X</b>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td width='50%'>CAR</td>
                            <td width='2%' align='center'>:</td>
                            <td width='48%' align='center'>
                                <?php
                                if ($drop_test_list->rating == 'Car')
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
                            <td width='58%' colspan="2"><?php echo $drop_test_list->client_name; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Ebako Code</td>
                            <td width='2%' align='center'>:</td>
                            <td width='58%' colspan="2"><?php echo $drop_test_list->ebako_code; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Customer Code</td>
                            <td width='2%' align='center'>:</td>
                            <td width='58%' colspan="2"><?php echo $drop_test_list->customer_code; ?></td>
                        </tr>
                        <tr>
                            <td width='40%'>Item Description</td>
                            <td width='2%' align='center'>:</td>
                            <td width='58%' colspan="2"><?php echo $drop_test_list->item_description; ?></td>
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
                        <td width='58%'><?php echo $drop_test_list->product_dimension; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Carton Dimension (Inches)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $drop_test_list->carton_dimension; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Gross Weight (Lbs)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $drop_test_list->gross_weight; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Nett  Weight (Lbs)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $drop_test_list->nett_weight; ?></td>
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
                                <th colspan="4" style="text-align: center;">Sample Picture</th>
                            </tr>
                            <tr style="height: 400px;">
                                <th align='center' style="vertical-align: middle;" colspan="4">
                                    <?php
                                    if (trim($drop_test_list->product_image) != "") {
                                        $image = $_SERVER["HTTP_REFERER"] . 'files/droptest/' . $drop_test_list->id . "/" . $drop_test_list->product_image;
                                       echo "<img src='" . $image . "' style='max-width: auto; height: auto; display: block; margin: 0 auto;' />";

                                    }
                                    ?>
                                </th>
                        </tr>  
                    </table>
                </td>
                <td width="1%"></td>
                <td colspan="3" width="48%">
                    <table class="table-border-luar">
                        <tr>
                            <th colspan="3" style="text-align: center;">Corrective Action Item</th>
                        </tr>
                        
                        <tr>
                        <td style="widht:500;height: 100" align="center">&nbsp;</td>
                    </tr>
                    </table>
                </td>
            </tr>
           
        </tbody>
    </table>
</body>
