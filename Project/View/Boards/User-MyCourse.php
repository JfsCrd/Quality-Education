<?php
//Matriculation screen card, available on the User dashboard
include_once("../Model/Model-DataBase.php");
$query = "SELECT * FROM user_has_course ";

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
                            <th>Name Course</th>
                            <th>Details</th>
                            <th>Link</th>
                            <th style="width: 50px;">Company</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Return select registers end set in the table-->
                        <?php while ($rows_courses = mysqli_fetch_assoc($command)) {?>
                            <tr>
                                <td style="width: 150px;"><?php echo $rows_courses['Course_idCourse']; ?></td>
                                <td style="width: 350px;"></td>
                                <td style="margin: 300px;"></td>
                                <td></th>
                                <td style="width: 160px;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#visualizeMatriculation<?php echo $rows_courses['idCourse'];?>">View</button></td>
                                <td style="width: 160px;"><button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#unenroll<?php echo $rows_courses['idCourse'];?>">Unenroll</button></td>
                                </tr>

                                <!-- Modal Visualize -->
                                <div class="modal fade" id="visualizeMatriculation<?php echo $rows_courses['idCourse'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                            <div class="modal-footer">
                                                <form method="POST" action="../Controller/Controller-Matriculation.php" value="matriculation"> 
                                                <input type="hidden" name="action_form" value="matriculation" style="display:none;"/>
                                                <input style="display:none" type="text" name="userId" value="<?php echo $_SESSION['s_idUser']?>"/>
                                                <input style="display:none" type="text" name="courseId" value="<?php echo $rows_courses['idCourse']?>"/>
                                                    <button type="submit" class="btn btn-sm btn-success" data-toggle="../Controller/Controller-Matriculation.php" data-target="#visualizeCourse<?php echo $rows_courses['idCourse'];?>">Matriculation</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal View-->

                                <!-- Modal Visualize -->
                                <div class="modal fade" id="#unenroll<?php echo $rows_courses['idCourse'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-left" id="myModalLabel" style="text-align: left;">Unenroll</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" action="../Controller/Controller-Matriculation.php" value="removeMatriculation"> 
                                                <input type="hidden" name="action_form" value="removeMatriculation" style="display:none;"/>
                                                <input style="display:none" type="text" name="userId" value="<?php echo $_SESSION['s_idUser']?>"/>
                                                <input style="display:none" type="text" name="courseId" value="<?php echo $rows_courses['idCourse']?>"/>
                                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="../Controller/Controller-Matriculation.php" data-target="#visualizeCourse<?php echo $rows_courses['idCourse'];?>">unenroll</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal unenroll -->
                                
                            <?php } 
                        ?> 
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>