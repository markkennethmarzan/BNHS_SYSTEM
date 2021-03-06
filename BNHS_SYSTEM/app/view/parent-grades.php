<?php require 'app/model/parent_funct.php'; $run= new ParentFunct ?>
    <div class="contentpage">
        <div class="row">
            <div class="widget">
                <div class="header">
                    <p>
                        <i class="fas fa-list-ol fnt"></i>
                        <span>Child Grades</span>
                    </p>
                    <p>School Year:
                        <?php $run->getSchoolYear(); ?>
                    </p>
                </div>
                <div class="eventcontent">
                    <div class="sample">
                        <div class="tl"><b>Child Name:</b>
                            <select name="student" class="student" id="select-child-grade">
                                <?php 
                            foreach($run->getNameOfStud() as $row) {
                                extract($row);
                                echo '
                                <option value="'.$stud_lrno.'" name="stud_name"> '.$name.' - '.$section.'  </option>
                                ';
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="cont2">
                        <span><b>Note: If your child doesn't have a grade in a particular subject or grading, please consult your child's adviser/teacher.</b></span>
                        <br>
                    </div>
                    <div class="cont3">
                        <div class="table-scroll">
                            <div class="table-wrap" id="table-grade-student">
                                <table id="grade-student">
                                    <?php $lrno = !isset($_SESSION['child_lrno']) ? $run->getLRNOfStud2() : $_SESSION['child_lrno']; ?>
                                        <tr>
                                            <th>Subject</th>
                                            <th>1st Grading</th>
                                            <th>2nd Grading</th>
                                            <th>3rd Grading</th>
                                            <th>4th Grading</th>
                                            <th>Final Grade</th>
                                            <th>Remarks</th>
                                            <th>Details</th>
                                        </tr>
                                        <?php $run->getChildGrade($lrno); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <p style="text-align:left; color:blue;font-weight: 600; font-size: 18px">LEGEND FOR GRADES</p>
            <div class="cont4">
                <table>
                    <tr>
                        <th>DESCRIPTION</th>
                        <th>GRADING</th>
                        <th>REMARKS</th>
                    </tr>
                    <tr>
                        <td>Outstanding</td>
                        <td>90-100</td>
                        <td><font color="green"><b>Passed</b></font></td>
                    </tr>
	                    <td>Very Satisfactory</td>
	                    <td>85-89</td>
	                    <td><font color="green"><b>Passed</b></font></td>
                    </tr>
                    <tr>
                        <td>Satisfactory</td>
                        <td>80-84</td>
                        <td><font color="green"><b>Passed</b></font></td>
                    </tr>
                    <tr>
                        <td>Fairly Satisfactory</td>
                        <td>75-79</td>
                        <td><font color="green"><b>Passed</b></font></td>
                    </tr>
                    <tr>
                        <td>Did Not Meet Expectations</td>
                        <td>74 and below</td>
                        <td><font color="red"><b>Failed</b></font></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['child_lrno'])) unset($_SESSION['child_lrno']); ?>