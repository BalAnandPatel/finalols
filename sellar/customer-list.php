<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('include/sidebar.php'); ?>
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Customer List</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>UserName</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        // print_r($result);
                                        $cnt = 0;
                                        // print_r($result['records']);
                                        for ($i = 0; $i < sizeof($result->records); $i++) { //print_r($result->records[$i]);
                                        ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt); ?></td>
                                                <td><?php echo $result->records[$i]->name; ?></td>
                                                <td><?php echo $result->records[$i]->userName; ?></td>
                                                <td><?php echo $result->records[$i]->phoneNo; ?></td>
                                                <td><?php echo $result->records[$i]->email; ?></td>
                                                <td><?php echo $result->records[$i]->upi; ?></td>
                                                <td><?php echo $result->records[$i]->createdOn; ?></td>
                                                <td><?php echo $result->records[$i]->updatedOn; ?></td>

                                            </tr>
                                        <?php $cnt = $cnt + 1;
                                        } ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>