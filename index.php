<!DOCTYPE html>
<?php include("connect.php"); ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SBD - L200140172 - Albert</title>
	<link rel="stylesheet" href="../bs3_dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bs3_dist/css/bootstrap-theme.min.css">
    <style>
        /* Custom style */
        body {
             padding-top: 60px;
        }

        #content {
            min-height: 550px;
        }
        .footer {
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-header">Employee Data </h2>                
                </div>
            </div>
            <div class="row">
                <table class="table table-responsive table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Umur</th>
                        <th>Gaji</th>
                        <th colspan="2">Options</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql_select = "SELECT * FROM employee ORDER BY id_employee DESC";
                            $ret_select = $db->query($sql_select);
                            $start_num = 0;

                            while($rw=$ret_select->fetchArray(SQLITE3_ASSOC)){
                                $start_num++;
                        ?>
                        <tr>
                            <td><?php echo $start_num; ?></td>
                            <td><?php echo $rw[name]; ?></td>
                            <td><?php echo $rw[address]; ?></td>
                            <td><?php echo $rw[email]; ?></td>
                            <td><?php echo $rw[age]; ?></td>
                            <td><?php echo $rw[salary]; ?></td>
                            <td> <a href="delRecord.php?del=<?php echo $rw[id_employee]; ?>" title="delete"><span class="glyphicon glyphicon-trash"></span> </a></td>
                            <td> <a href="editRecord.php?edit=<?php echo $rw[id_employee]; ?>" title="edit"><span class="glyphicon glyphicon-pencil"></span> </a></td>
                        </tr>
                        <?php }; // Close while ?>
                    </tbody>
                </table>
                <p class="text-right">
                    <a href="addRecord.php" class="btn btn-lg btn-primary text-right"><span class="glyphicon glyphicon-plus"></span> New Record</a>
                </p>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- content -->

    <?php include("footer.php"); ?>

</body>
</html>