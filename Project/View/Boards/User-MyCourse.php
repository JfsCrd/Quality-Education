<?php

include_once("../Model/Model-DataBase.php");


$query = "SELECT course.name FROM course 
            inner join user_has_course as user on (user_has_course.user_idUser = user.idUser)
            inner join user_has_course as course on (user_has_course.course_idCourse = course.idCourse) ";

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
                        <?php while ($rows_courses = mysqli_fetch_assoc($command)) {?>
                            <tr>
                                <td style="width: 150px;"><?php echo $rows_courses['Name']; ?></td>
                                <td style="width: 350px;"><?php echo $rows_courses['Details']; ?></td>
                                <td style="margin: 300px;"><?php echo $rows_courses['Link']; ?></td>
                                <td><?php echo $rows_courses['SupportingCompany_idSupportingCompany']?></th>
                                <td style="width: 160px;"><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#visualizeCourse<?php echo $rows_courses['idCourse'];?>">View</button></td>
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
                                
                                
                            <?php } 
                        ?> 
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>