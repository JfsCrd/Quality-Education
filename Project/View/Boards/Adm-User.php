<?php

include_once("../Model/Model-DataBase.php");

$query = "SELECT * FROM user";
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
                            <th>Role</th>
                            <th>Name User</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th style="width: 50px;">Adress</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rows_Users = mysqli_fetch_assoc($command)) { ?>
                            <tr>
                                <td style="width: 50px;"><?php if ($rows_Users['Rank'] == 1) echo 'User';
                                                        else echo 'ADM'; ?></td>
                                <td style="width: 150px;"><?php echo $rows_Users['Name']; ?></td>
                                <td style="width: 200px;"><?php echo $rows_Users['Email']; ?></td>
                                <td style="width: 100px;"><?php echo $rows_Users['Telephone']; ?></td>
                                <td style="width: 300px;"><?php echo $rows_Users['Adress']; ?></th>
                                <td style="width: 160px;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#visualizeUser<?php echo $rows_Users['idUser']; ?>">View</button>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUser<?php echo $rows_Users['idUser']; ?>">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#removeUser<?php echo $rows_Users['idUser']; ?>">Delet</button>
                                </td>
                            </tr>

                            <!-- Modal Visualize -->
                            <div class="modal fade" id="visualizeUser<?php echo $rows_Users['idUser']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo $rows_Users['Name']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>ID: <?php echo $rows_Users['idUser']; ?></p>
                                            <p>Name: <?php echo $rows_Users['Name']; ?></p>
                                            <p>Birthday: <?php echo $rows_Users['Birth']; ?></p>
                                            <p>Email: <?php echo $rows_Users['Email']; ?></p>
                                            <p>Telephone: <?php echo $rows_Users['Telephone']; ?></p>
                                            <p>Adress: <?php echo $rows_Users['Adress']; ?></p>
                                            <p>Role: <?php if ($rows_Users['Rank'] == 1) echo 'User';
                                                        else echo 'ADM'; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Visualize -->

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editUser<?php echo $rows_Users['idUser']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo 'Edit ' . $rows_Users['Name']; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../Controller/Controller-User.php" method="POST" value="edit">
                                                <input type="hidden" name="action_form" value="edit" style="display:none;" />
                                                <label>ID</label>
                                                <br />
                                                <input type="text" name="idEdit" readonly="true" value="<?php echo $rows_Users['idUser']; ?>" />
                                                <br />
                                                <br />
                                                <label>Name</label>
                                                <br />
                                                <input type="text" name="txtName" readonly="true" value="<?php echo $rows_Users['Name']; ?>" />
                                                <br />
                                                <br />

                                                <label>Birthday</label>
                                                <br />
                                                <input type="text" readonly="true" name="txtBirth" value="<?php echo $rows_Users['Birth']; ?>" />
                                                <br /> <br />
                                                <label>Email</label>
                                                <br />
                                                <label type="text" readonly="true" name="txtEmail"><?php echo $rows_Users['Email']; ?></textarea>
                                                    <br />
                                                    <br />
                                                    <label>Telephone</label>
                                                    <br />
                                                    <input type="text" name="txtCompany" readonly="true" value="<?php echo $rows_Users['Telephone']; ?>" />
                                                    <br />
                                                    <br />
                                                    <label>Adress</label>
                                                    <br />
                                                    <input type="text" name="txtAdress" readonly="true" value="<?php echo $rows_Users['Adress']; ?>"/>
                                                    <br/>
                                                    <br/>
                                                    <label>Role</label>
                                                    <br/>
                                                    <select type="text" name="selectRank" required="true">
                                                        <option value="1">USER</option>
                                                        <option value="2">ADM</option>
                                                    </select>
                                                    <br />
                                                    <br />

                                                    <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
            <!-- End Modal Edit -->

            <!-- Modal Remove -->
            <div class="modal fade" id="removeUser<?php echo $rows_Users['idUser']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo 'Delete ' . $rows_Users['Name']; ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="../Controller/Controller-User.php" method="POST" value="remove">
                                <input type="hidden" name="action_form" value="remove" style="display:none;" />
                                <label>Remove <?php echo $rows_Users['Name']; ?>?</label>
                                <br />
                                <input type="text" name="txtId" value="<?php echo $rows_Users['idUser']; ?> " style="display:none;" />
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Remove -->
        <?php }
        ?>
        </tbody>
        </table>
        </div>
    </div>
    </div>
</body>

</html>