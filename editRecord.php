<!DOCTYPE html>
<?php include("connect.php"); ?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SBD - L200140172 - Albert</title>
	<link rel="stylesheet" href="../bs3_dist/css/bootstrap.min.css">
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
    <?php
        // Start WHILE -SELECT-
            $edit_id = $_GET[edit];
            $sql_select = "SELECT * FROM employee WHERE id_employee='$edit_id'";
            $ret_select = $db->query($sql_select);

            while($rw=$ret_select->fetchArray(SQLITE3_ASSOC)){            
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-header">Edit Record for <?php echo $rw[name]; ?></h2>                
                </div>
            </div>
                <!-- start form -->
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="postName">Full Name</label>
                    <input name="postName" type="text" class="form-control" id="postName" placeholder="Enter name" value="<?php echo $rw[name]; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="postAddr">Address</label>
                    <input name="postAddr" type="text" class="form-control" id="postAddr" placeholder="Enter address" value="<?php echo $rw[address]; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="postEmail">Email address</label>
                    <input name="postEmail" type="email" class="form-control" id="postEmail" placeholder="Enter email"  value="<?php echo $rw[email]; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="postAge">Age</label>
                    <input name="postAge" type="text" class="form-control" id="postAge" placeholder="Enter Age (Number Only)" value="<?php echo $rw[age]; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="postSalary">Salary</label>
                    <input name="postSalary" type="text" class="form-control" id="postSalary" placeholder="Enter Salary (Number Only)" value="<?php echo $rw[salary]; ?>" required> 
                  </div>                  
                                                      
                  <button name="submit" type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-ok"></span> Save</button>
                </form>    
                <!-- end form -->
<div style="display: none;">
    <?php
        $postAll = array($_POST[postName],$_POST[postEmail],$_POST[postAge],$_POST[postSalary],$_POST[postAddr]);
        if($_POST[postName]){
            $sql_edit = "UPDATE employee SET name='$postAll[0]', email='$postAll[1]', age='$postAll[2]', salary='$postAll[3]', address='$postAll[4]' WHERE id_employee = '$edit_id'";
            $ret_edit = $db->exec($sql_edit);
            if(!$ret_edit){
            echo $db->lastErrorMsg();
            }
            else{
                echo "<script type='text/javascript'> alert('Record Edited successfully'); </script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php' />";
            }
        }
    ?>
</div>


            </div> <!-- row -->
        </div> <!-- container -->

        <?php }; // END WHILE -SELECT- ?>
    </div> <!-- content -->

    <?php include("footer.php"); ?>

</body>
</html>