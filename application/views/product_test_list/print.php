<?php
////echo phpinfo();
////exit();
//$my_pdf = new Pdf();
//$my_pdf->setPageOrientation('P', true, 2);
//$my_pdf->SetCompression(true);
//$my_pdf->setPrintHeader(true);
//$my_pdf->setPrintFooter(false);
//$my_pdf->SetMargins(2, 2, 2);
//$my_pdf->SetFont('', '', 7);
//$my_pdf->AddPage();
?>
<?php
//var_dump($product_test_list);
?>
<head>
    <style>

        /* Tabel dengan border hanya di luar */
        .table-border-luar {
            border-collapse: collapse;
            /*width: 100%;*/
            border: 1px solid black; /* Border hanya di luar */
        }

        .table-border-luar th, .table-border-luar td {
            padding: 8px;
            /*text-align: left;*/
            border: none; /* Tidak ada border di dalam */
        }

        .table-border-luar-dalam {
            border-collapse: collapse;
            /*width: 100%;*/
            border: 1px solid black; /* Border luar */
        }

        .table-border-luar-dalam th, .table-border-luar-dalam td {
            padding: 8px;
            border: 1px solid black; /* Border dalam */
        }
    </style>
</head>
<!--<table border="1" align="center" class="table-border-luar-dalam" width="1000">-->
<table border="1" align="center" class="table-border-luar" width="1000">
    <thead>
        <tr>
            <td  align='center' width="34%">
                <?php
                $image = $_SERVER["HTTP_REFERER"] . 'files/logo.png';
                echo "<img src='" . $image . "' width='100'>";
                ?>
            </td>
            <td colspan="5" align="center"  width="33%"><h3>IN-HOUSE TEST REPORT</h3></td>
            <td  align='center' width="34%"><b>Quality Assurance Department</b></td>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td colspan="3" width="48%">
                <table  class="table-border-luar-dalam">
                    <tr>
                        <td width='40%'>Report Number</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->report_no; ?></td>
                    </tr>
                    <tr>
                        <td width='40%'>Test date</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo date('d M Y', strtotime($product_test_list->test_date)); ?></td>
                    </tr>
                    <tr>
                        <td width='40%'>Report Date</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo date('d M Y', strtotime($product_test_list->report_date)); ?></td>
                    </tr>
                    <tr>
                        <td width='40%'>Type of Report</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->protocol_name; ?></td>
                    </tr>
                </table>
            </td>
            <td width="4%"></td>
            <td colspan="3" width="48%">
                <table  class="table-border-luar-dalam">
                    <tr>
                        <th colspan="3">RESULT</th>
                    </tr>
                    <tr>
                        <td width='50%'>PASS</td>
                        <td width='2%' align='center'>:</td>
                        <td width='480%' align='center'>
                            <?php
                            if ($product_test_list->rating == 'Passed')
                                echo '<b>X</b>';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width='50%'>FAIL</td>
                        <td width='2%' align='center'>:</td>
                        <td width='48%'>
                            <?php
                            if ($product_test_list->rating == 'Failed')
                                echo '<b>X</b>';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width='50%'>CAR</td>
                        <td width='2%' align='center'>:</td>
                        <td width='48%'>
                            <?php
                            if ($product_test_list->rating == 'Car')
                                echo '<b>X</b>';
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <!--==================================================>-->
        <tr>
            <td colspan="3" width="48%">
                <table  class="table-border-luar-dalam" width='100%'>
                    <tr>
                        <th colspan="3">Sample Test Picture</th>
                    </tr>
                    <tr>
                        <td height="100" width="500" align="center">

                            <?php
                            if (trim($product_test_list->product_image) != "") {
                                $image = $_SERVER["HTTP_REFERER"] . 'files/producttest/' . $product_test_list->id . "/" . $product_test_list->product_image;
                               // echo $image;
                                echo "<img src='" . $image . "' width='175' heigth='100'>";
                            }
                            ?>
                        </td>
                    </tr>

                </table>
            </td>
            <td width="4%"></td>
            <td colspan="3" width="48%">
                <table  class="table-border-luar-dalam" width='100%'>
                    <tr>
                        <th colspan="3">Corrective Action Item</th>
                    </tr>
                    <tr>
                        <td style="widht:500;height: 100" align="center">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
        <!--==============================================================-->
        <tr>
            <td colspan="3" width="48%">
                <table  class="table-border-luar-dalam">
                    <tr>
                        <th colspan="3">PRODUCT</th>
                    </tr>
                    <tr>
                        <td width='40%'>Customer</td>
                        <td width='2%' align='center'>:</td>

                        <td width='58%'><?php echo $product_test_list->client_name; ?></td>
                    </tr>
                    <tr>
                        <td width='40%'>Ebako Code</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->ebako_code; ?></td>
                    </tr>
                    <tr>
                        <td width='40%'>Customer Code</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->customer_code; ?></td>
                    </tr>
                    <tr>
                        <td width='40%'>Item Description</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->item_description; ?></td>
                    </tr>
                </table>
            </td>
            <td width="4%"></td>
            <td colspan="3" width="48%">
                <table  class="table-border-luar-dalam">
                    <tr>
                        <th colspan="3">PRODUCT SPECIFICATION</th>
                    </tr>
                    <tr>
                        <td width='50%'>Product Dimension (Inches)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->product_dimension; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Carton Dimension (Inches)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->carton_dimension; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Gross Weight (Lbs)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->gross_weight; ?></td>
                    </tr>
                    <tr>
                        <td width='50%'>Nett  Weight (Lbs)</td>
                        <td width='2%' align='center'>:</td>
                        <td width='58%'><?php echo $product_test_list->nett_weight; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="7">
                <table celpadding="0" celspacing="0" width="100%" class="table-border-luar-dalam">
                    <?php
                    $x = 0;
                    foreach ($product_test_list_detail as $result) {
                        if ($result->var_type == 'Description') {
                            ?>
                            <tr>
                                <td width="50%">
                                    <?php echo $result->method; ?>
                                </td>
                                <td width="50%">
                                    <?php echo $result->notes; ?>
                                </td>
                            </tr>
                            <?php
                        } else {
                            continue;
                        }

                        $x++;
                    }
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <th bgcolor='#ffff99' colspan="7" align="center">TEST RESULT SUMMARY</th>
        </tr>
        <tr>
            <td colspan="7">
                <table celpadding="0" celspacing="0" width="100%" class="table-border-luar-dalam">
                    <tr>
                        <th align="center">Evaluation</th>
                        <th align="center">Method/Criteria</th>
                        <th align="center">Result</th>
                        <th align="center">Photo</th>
                    </tr>
                    <?php
                    $x = 0;
                    foreach ($product_test_list_detail as $result) {
                        if ($result->var_type == 'Description') {
                            continue;
                        } else {
                            ?>
                            <tr>
                                <td  width="30%">
                                    <?php echo $result->evaluation; ?>
                                </td>
                                <td  width="30%">
                                    <?php echo $result->method; ?>
                                </td>
                                <td  width="10%">
                                    <?php echo $result->result_test_var; ?>
                                </td>
                                <td align="center"  width="50%">
                                    <?php
                                    if (trim($result->image_file) != "") {
                                        $image = $_SERVER["HTTP_REFERER"] . 'files/producttest/' . $result->product_test_list_id . "/" . $result->image_file;
                                        echo "<img src='" . $image . "' width='175'>";
                                    }
                                    if (trim($result->image2_file) != "") {
                                        $image2 = $_SERVER["HTTP_REFERER"] . 'files/producttest/' . $result->product_test_list_id . "/" . $result->image2_file;
                                        echo "<img src='" . $image2 . "' width='175'>";
                                    }
                                    if (trim($result->image_file) != "") {
                                        $image3 = $_SERVER["HTTP_REFERER"] . 'files/producttest/' . $result->product_test_list_id . "/" . $result->image3_file;
                                        echo "<img src='" . $image3 . "' width='175'>";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }

                        $x++;
                    }
                    ?>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<?php
//$my_pdf->writeHTML($tbl, true, false, true, false, '');
//$file_name = $shipment->shipment_no . '.pdf';
//$my_pdf->Output($file_name, 'D');
?>

