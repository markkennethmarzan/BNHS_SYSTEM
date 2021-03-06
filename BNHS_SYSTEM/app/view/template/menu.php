<?php
$page = explode("-", str_replace('url=', '', $_SERVER['QUERY_STRING']));

switch($page[0]) {
	case 'faculty' : 
		echo '<li '.$this->helpers->isActiveMenu("faculty-dashboard").'><a href="'.URL.'"><i class="fas fa-home fnt"></i>Dashboard</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("faculty-calendar").'><a href="'.URL.'faculty-calendar"><i class="far fa-calendar"></i>Calendar</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("faculty-enroll").'><a href="'.URL.'faculty-enroll"><i class="fas fa-user-plus"></i>Enroll Student</a></li>';
		if ($_SESSION['adviser'] === 'Yes' && $_SESSION['transfer_enabled'] === 'Yes') {
			if ($_SESSION['transfer_enabled'] === 'Yes') {
				echo '<li '.$this->helpers->isActiveMenu("faculty-student").' id="advisory"><a href="'.URL.'faculty-student"><i class="fas fa-list-ul"></i>Advisory Class</a><span class="notification">'.$_SESSION['notif'].'</span></li>';
			} else {
				echo '<li '.$this->helpers->isActiveMenu("faculty-student").' id="advisory"><a href="'.URL.'faculty-student"><i class="fas fa-list-ul"></i>Advisory Class</a></li>';
			}
		}
		if ($_SESSION['sec_privilege'] === 'Yes' && $_SESSION['editclass'] === 'Started') {
			echo '<li>';
			echo '<a href="'.' '.'" target="classes-submenu" class="submenu-title"><span><i class="fas fa-chalkboard"></i>Classes<i class="fa fa-angle-left pull-right"></i></span></a>';
			echo '<ul class="sidebar-submenu" id="classes-submenu">';
			echo '<li '.$this->helpers->isActiveMenu("faculty-classes").'><a href="'.URL.'faculty-classes"><i class="fas fa-chalkboard-teacher"></i>Classes Handled</a></li>';
			echo '<li '.$this->helpers->isActiveMenu("faculty-editclass").'><a href="'.URL.'faculty-editclass"><i class="fas fa-edit"></i>Edit Classes</a></li>';
			echo '</ul>';
			echo '</li>';
		} else {
			echo '<li '.$this->helpers->isActiveMenu("faculty-classes").'><a href="'.URL.'faculty-classes"><i class="fas fa-chalkboard-teacher"></i>Classes Handled</a></li>';
		}
		echo '<li '.$this->helpers->isActiveMenu("faculty-attendance").'><a href="'.URL.'faculty-attendance"><i class="far fa-calendar-alt"></i>Attendance</a></li>';
		if ($_SESSION['adviser'] === 'Yes') {
			echo '<li '.$this->helpers->isActiveMenu("faculty-grades").'><a href="'.URL.'faculty-grades"><i class="fas fa-star-half-alt"></i>Grades And Core Values</a></li>';
		} else {
			echo '<li '.$this->helpers->isActiveMenu("faculty-grades").'><a href="'.URL.'faculty-grades"><i class="fas fa-star-half-alt"></i>Grades</a></li>';
		}
		break;
	case 'student' :
		echo '<li '.$this->helpers->isActiveMenu("student-dashboard").'><a href="'.URL.'"><i class="fas fa-home fnt"></i>Dashboard</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("student-calendar").'><a href="'.URL.'student-calendar"><i class="fas fa-calendar-check"></i>Calendar</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("student-accounts").'><a href="'.URL.'student-accounts"><i class="fas fa-money-bill"></i>Statement of Account</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("student-attendance").'><a href="'.URL.'student-attendance"><i class="fa s fa-check-square"></i>Attendance</a></li>';
		echo '<li>';
		echo '<a href="'.' '.'" target="statements-submenu" class="submenu-title"><span><i class="far fa-calendar-alt fnt"></i>Report Card<i class="fa fa-angle-left pull-right"></i></span></a>';
		echo '<ul class="sidebar-submenu" id="statements-submenu">';
		echo '<li '.$this->helpers->isActiveMenu("student-coreValues").'><a href="'.URL.'student-coreValues"><i class="fas fa-star-half-alt fnt"></i>Core Values</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("student-grades").'><a href="'.URL.'student-grades"><i class="fas fa-calendar-alt"></i>Grades</a></li>';
		echo '</ul>';
		echo '</li>';
		echo '<li '.$this->helpers->isActiveMenu("student-schedule").'><a href="'.URL.'student-schedule"><i class="fas fa-book fnt"></i>Class Schedule</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("student-information").'><a href="'.URL.'student-information"><i class="fas fa-user fnt"></i>Student Information</a></li>';
		break;

	case 'parent' :
		echo '<li '.$this->helpers->isActiveMenu("parent-dashboard").'><a href="'.URL.'"><i class="fas fa-home fnt"></i>Dashboard</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("parent-calendar").'><a href="'.URL.'parent-calendar"><i class="fas fa-calendar-alt"></i>Calendar</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("parent-account").'><a href="'.URL.'parent-account"><i class="fas fa-money-bill"></i>Statement of Account</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("parent-attendance").'><a href="'.URL.'parent-attendance"><i class="fas fa-check-square fnt fnt"></i>Attendance Report</a></li>';
		echo '<li>';
		echo '<a href="'.' '.'" target="statements-submenu" class="submenu-title"><span><i class="far fa-calendar-alt fnt"></i>Report Card<i class="fa fa-angle-left pull-right"></i></span></a>';
		echo '<ul class="sidebar-submenu" id="statements-submenu">';
		echo '<li '.$this->helpers->isActiveMenu("parent-coreValues").'><a href="'.URL.'parent-coreValues"><i class="fas fa-star-half-alt fnt"></i>Core Values</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("parent-grades").'><a href="'.URL.'parent-grades"><i class="fas fa-list-ol fnt"></i>Child Grades</a></li>';
		echo '</ul>';
		echo '</li>';
		echo '<li '.$this->helpers->isActiveMenu("parent-schedule").'><a href="'.URL.'parent-schedule"><i class="fas fa-book fnt"></i>Class Schedule</a></li>';
		break;
	case 'treasurer':
		echo '<li '.$this->helpers->isActiveMenu("treasurer-dashboard").'><a href="'.URL.'"><i class="fas fa-home fnt"></i>Dashboard</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("treasurer-calendar").'><a href="'.URL.'treasurer-calendar"><i class="fas fa-calendar-check fnt"></i>Calendar</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("treasurer-accounts").'><a href="'.URL.'treasurer-accounts"><i class="fas fa-money-bill"></i>Statement of Account</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("treasurer-statistics").'><a href="'.URL.'treasurer-statistics"><i class="far fa-chart-bar"></i>Statistics</a></li>';
		break;
	case 'admin':
		echo '<li '.$this->helpers->isActiveMenu("admin-dashboard").'><a href="'.URL.'"><i class="fas fa-home fnt"></i>Dashboard</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-calendar").'><a href="'.URL.'admin-calendar"><i class="fas fa-calendar-alt fnt"></i>Calendar</a></li>';
		echo '<li>';
		
		echo '<li>';
		echo '<a href="'.' '.'" target="soa-submenu" class="submenu-title"><span><i class="fas fa-money-bill fnt"></i>Statement Of Accounts<i class="fa fa-angle-left pull-right"></i></span></a>';
		echo '<ul class="sidebar-submenu" id="soa-submenu">';
		echo '<li '.$this->helpers->isActiveMenu("admin-feetype").'><a href="'.URL.'admin-feetype"><i class="fas fa-money-check fnt"></i>Fee Type</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-balstatus").'><a href="'.URL.'admin-balstatus"><i class="fas fa-sync fnt"></i>Student Payment Status</a></li>';
		echo '</ul>';
		echo '</li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-section").'><a href="'.URL.'admin-section"><i class="fas fa-book-open fnt"></i>Section</a></li>';
		echo '<li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-classes").'><a href="'.URL.'admin-classes"><i class="fas fa-plus fnt"></i>Class</a></li>';
		echo '<li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-subjects").'><a href="'.URL.'admin-subjects"><i class="fas fa-book-reader fnt"></i>Subject</a></li>';
		echo '<li>';
		echo '<a href="'.' '.'" target="user-submenu" class="submenu-title"><span><i class="fas fa-user-plus fnt"></i>Users <i class="fa fa-angle-left pull-right"></i><span></a>';
		echo '<ul class="sidebar-submenu" id="user-submenu">';
		echo '<li '.$this->helpers->isActiveMenu("admin-faculty").'><a href="'.URL.'admin-faculty"><i class="fas fa-chalkboard-teacher fnt"></i>Faculty</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-parent").'><a href="'.URL.'admin-parent"><i class="far fa-address-book fnt"></i>Parent</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-student").'><a href="'.URL.'admin-student"><i class="fas fa-user-graduate fnt"></i>Student</a></li>';
		echo '</ul>';
		echo '</li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-events").'><a href="'.URL.'admin-events"><i class="far fa-calendar-alt fnt"></i>Events</a></li>';
		echo '<li>';
		echo '<a href="'.' '.'" target="reports-submenu" class="submenu-title"><span><i class="fab fa-blogger-b fnt"></i>Reports<i class="fa fa-angle-left pull-right"></i></span></a>';
		echo '<ul class="sidebar-submenu" id="reports-submenu">';
		echo '<li '.$this->helpers->isActiveMenu("admin-paymenthistory").'><a href="'.URL.'admin-paymenthistory"><i class="fas fa-history fnt"></i>Payment History</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-enrolledstudents").'><a href="'.URL.'admin-enrolledstudents"><i class="fas fa-check-square fnt"></i>Enrolled Students</a></li>';
		echo '</ul>';
		echo '<li>';
		echo '<a href="'.' '.'" target="logs-submenu" class="submenu-title"><span><i class="fas fa-book fnt"></i>Logs<i class="fa fa-angle-left pull-right"></i></span></a>';
		echo '<ul class="sidebar-submenu" id="logs-submenu">';
		echo '<li '.$this->helpers->isActiveMenu("admin-logs").'><a href="'.URL.'admin-logs"><i class="fas fa-book fnt"></i>Admin Logs</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-faculty-logs").'><a href="'.URL.'admin-faculty-logs"><i class="fas fa-book fnt"></i>Faculty Logs</a></li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-treasurer-logs").'><a href="'.URL.'admin-treasurer-logs"><i class="fas fa-book fnt"></i>Treasurer Logs</a></li>';
		echo '</ul>';
		echo '</li>';
		echo '<li '.$this->helpers->isActiveMenu("admin-system-settings").'><a href="'.URL.'admin-system-settings"><i class="fas fa-cog fnt"></i>System Settings</a></li>';
		echo '<li>';
		break;
	default: break;
}
echo '<li><a id="collapse-menu"><i class="far fa-play-circle"></i>Collapse Menu</a></li>';
?>