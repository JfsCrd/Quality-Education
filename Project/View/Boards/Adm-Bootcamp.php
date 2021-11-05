<?php
//Bootcamps screen card, available on the ADM dashboard
include_once("../Model/Model-DataBase.php");
$query = "SELECT * FROM bootcamp";
$command = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include("../View/Helpers/Header.php"); ?>
</head>

<body>

    <div class="container theme-showcase" role="main">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name Bootcamp</th>
                            <th>Description</th>
                            <th style="text-align: center;">Action</th>
                            <th style="text-align:end;"><button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#insertBoot" style="width: 100px;">Insert</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Return select registers end set in the table-->
                        <?php while ($rows_bootcamps = mysqli_fetch_assoc($command)) { ?> 
                            <tr>
                                <td style="width: 50px;"><?php echo $rows_bootcamps['idBootcamp']; ?></td>
                                <td style="width: 350px;"><?php echo $rows_bootcamps['Name']; ?></td>
                                <td style="width: 450px;"><?php echo $rows_bootcamps['Name']; ?></td>
                                <td style="width: 160px;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#visualizeBoot<?php echo $rows_bootcamps['idBootcamp']; ?>">View</button>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editBoot<?php echo $rows_bootcamps['idBootcamp']; ?>">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#removeBoot<?php echo $rows_bootcamps['idBootcamp']; ?>">Delet</button>
                                </td>
                            </tr>

                            <!-- Modal Visualize -->
                            <div class=" modal fade" id="visualizeBoot<?php echo $rows_bootcamps['idBootcamp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo $rows_bootcamps['Name']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID: <?php echo $rows_bootcamps['idBootcamp']; ?></p>
                                            <p>Name: <?php echo $rows_bootcamps['Name']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Visualize -->

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editBoot<?php echo $rows_bootcamps['idBootcamp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo 'Edit '. $rows_bootcamps['Name']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../Controller/Controller-Bootcamp.php" method="POST" value="edit">
                                                <input type="hidden" name="action_form" value="edit" style="display:none;" />
                                                <label>ID</label>
                                                <br />
                                                <input type="text" name="txtId" readonly="true" value="<?php echo $rows_bootcamps['idBootcamp']; ?>" />
                                                <br />
                                                <br />
                                                <label>Name</label>
                                                <br />
                                                <input type="text" name="txtName" value="<?php echo $rows_bootcamps['Name']; ?>" />
                                                <br />
                                                <br />
                                                <br />
                                                <br />
                                                <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End Modal Edit -->

                            <!-- Modal Remove -->
                            <div class="modal fade" id="removeBoot<?php echo $rows_bootcamps['idBootcamp']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo 'Delete '.$rows_bootcamps['Name']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../Controller/Controller-Bootcamp.php" method="POST" value="remove">
                                                <input type="hidden" name="action_form" value="remove" style="display:none;" />
                                                <label>Remove <?php echo $rows_bootcamps['Name']; ?>?</label>
                                                <br />
                                                <input type="text" name="txtId" value="<?php echo $rows_bootcamps['idBootcamp']; ?>" style="display:none;" />
                                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Remove -->

                            <!-- Insert -->
                            <div class="modal fade" id="insertBoot" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;">Insert Bootcamp</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../Controller/Controller-Bootcamp.php" method="POST" value="insert">
                                                <input type="hidden" name="action_form" value="insert" style="display:none;" />
                                                <label>ID</label>
                                                <br />
                                                <input type="text" name="txtId" placeholder="ID" required="true" />
                                                <br />
                                                <br />
                                                <label>Name</label>
                                                <br />
                                                <input type="text" name="txtName" placeholder="Name" required="true" />
                                                <br />
                                                <br />
                                                <button type="submit" class="btn btn-sm btn-success">Insert</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } 
                        ?> 
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>