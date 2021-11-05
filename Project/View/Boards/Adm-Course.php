<?php

include_once("../Model/Model-DataBase.php");

$query = "SELECT * FROM course";
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
                            <th>Name Course</th>
                            <th>Details</th>
                            <th>Link</th>
                            <th style="width: 50px;">Company</th>
                            <th style="text-align: center;">Action</th>
                            <th style="text-align:end;"><button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#insertCourse" style="width: 100px;">Insert</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rows_courses = mysqli_fetch_assoc($command)) {?>
                            <tr>
                                <td style="width: 50px;"><?php echo $rows_courses['idCourse']; ?></td>
                                <td style="width: 150px;"><?php echo $rows_courses['Name']; ?></td>
                                <td style="width: 350px;"><?php echo $rows_courses['Details']; ?></td>
                                <td style="margin: 300px;"><?php echo $rows_courses['Link']; ?></td>
                                <td><?php echo $rows_courses['SupportingCompany_idSupportingCompany'];?></th>
                                <td style="width: 160px;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#visualizeCourse<?php echo $rows_courses['idCourse'];?>">View</button>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCourse<?php echo $rows_courses['idCourse'];?>">Edit</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#removeCourse<?php echo $rows_courses['idCourse'];?>">Delet</button>
                                </td>
                                </tr>

                                <!-- Modal Visualize -->
                                <div class="modal fade" id="visualizeCourse<?php echo $rows_courses['idCourse'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo $rows_courses['Name']; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>ID: <?php echo $rows_courses['idCourse']; ?></p>
                                                <p>Name: <?php echo $rows_courses['Name']; ?></p>
                                                <p>Details: <?php echo $rows_courses['Details']; ?></p>
                                                <p>Company: <?php echo $rows_courses['SupportingCompany_idSupportingCompany']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Visualize -->

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editCourse<?php echo $rows_courses['idCourse'];?>" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo 'Edit '. $rows_courses['Name']; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <form action="../Controller/Controller-Course.php" method="POST" value="edit">
                                                        <input type="hidden" name="action_form" value="edit" style="display:none;" />
                                                        <label>ID</label>
                                                        <br />
                                                        <input type="text" name="txtId" readonly="true" value="<?php echo $rows_courses['idCourse']; ?>" />
                                                        <br />
                                                        <br />
                                                        <label>Name</label>
                                                        <br />
                                                        <input type="text" name="txtName" value="<?php echo $rows_courses['Name']; ?>" />
                                                        <br />
                                                        <br />
     
                                                        <label>Link</label>
                                                        <br />
                                                        <input type="text" name="txtLink" value="<?php echo $rows_courses['Link']; ?>" />
                                                        <br/> <br/>
                                                        <label>Details</label>
                                                        <br />
                                                        <textarea type="text" name="txtDetails"><?php echo $rows_courses['Details']; ?></textarea>
                                                        <br />
                                                        <br />
                                                        <label>Company</label>
                                                        <br />
                                                        <input type="text" name="txtCompany" value="<?php echo $rows_courses['SupportingCompany_idSupportingCompany']; ?>" />
                                                        <br/>
                                                        <br/>
                                                        <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Edit -->

                                <!-- Modal Remove -->
                                <div class="modal fade" id="removeCourse<?php echo $rows_courses['idCourse'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;"><?php echo 'Delete '. $rows_courses['Name']; ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="../Controller/Controller-Course.php" method="POST" value="remove">
                                                <input type="hidden" name="action_form" value="remove" style="display:none;" />
                                                <label>Remove <?php echo $rows_courses['Name']; ?>?</label>
                                                <br/>
                                                <input type="text" name="txtId" value="<?php echo $rows_courses['idCourse']; ?> " style="display:none;"  />
                                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Remove -->

                                <!-- Insert -->
                                <div class="modal fade" id="insertCourse" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;">Insert Course</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../Controller/Controller-Course.php" method="POST" value="insert">
                                                        <input type="hidden" name="action_form" value="insert" style="display:none;" />
                                                        <label>ID</label>
                                                        <br />
                                                        <input type="text" name="txtId" placeholder="Id" required="true"/>
                                                        <br />
                                                        <br />
                                                        <label>Name</label>
                                                        <br />
                                                        <input type="text" name="txtName" placeholder="Name" required="true" />
                                                        <br />
                                                        <br />
     
                                                        <label>Link</label>
                                                        <br />
                                                        <input type="text" name="txtLink" placeholder="Link" required="true"/>
                                                        <br/> <br/>
                                                        <label>Details</label>
                                                        <br />
                                                        <textarea type="text" name="txtDetails" placeholder="Details" required="true"></textarea>
                                                        <br />
                                                        <br />
                                                        <label>Company</label>
                                                        <br />
                                                        <input type="text" name="txtCompany" placeholder="Id Company" required="true"/>
                                                        <br/>
                                                        <br/>
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