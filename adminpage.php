<?php
include './server.php';
$admin = $_GET['admin'];
if ($admin == 1) {
	if (isset($_POST['adminsign'])) {
		$aname = mysqli_real_escape_string($connection, $_POST['fname']);
		$lname = mysqli_real_escape_string($connection, $_POST['lname']);
		$mname = mysqli_real_escape_string($connection, $_POST['mname']);
		$branch = mysqli_real_escape_string($connection, $_POST['branch']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$aid = mysqli_real_escape_string($connection, $_POST['id']);
		$pas = mysqli_real_escape_string($connection, $_POST['psw']);
		$c_num = mysqli_real_escape_string($connection, $_POST['phone']);
		$checking = "Select * from log_sign where id = '$aid'";
		$check_result = $connection->query($checking);
		if ($check_result->num_rows > 0) {
			echo "<script>alert('Username already exists.'); window.location='signup.php';</script>";
			exit;
		} else {
			try {
				$sql = "INSERT INTO log_sign(fname, lname, email, ID, password, phone_number, mname, branch) VALUES ('$aname','$lname','$email','$aid','$pas','$c_num' , '$mname', '$branch')";
				$result = $connection->query($sql);
				if ($result === TRUE) {
					header("Location: login.php");
				} else {
					echo "Error: " . $connection->query($sql);
				}
			} catch (mysqli_sql_exception $exception) {
				if ($exception->getCode() === 1062) {
					echo "<script>alert('Email allready taken against another user'); window.location='signup.php';</script>";
				} else {
					echo "Error: " . $exception->getMessage();
				}
			}
			exit;
		}
	}
} elseif ($admin == 2) {
	if (isset($_POST['adminlogin'])) {
		$adminid = mysqli_real_escape_string($connection, $_POST['aid']);
		$adminpass = mysqli_real_escape_string($connection, $_POST['pasw']);
		$sql = "select * from log_sign where id='$adminid' and password='$adminpass'";
		$result = $connection->query($sql);
		if ($result->num_rows == 1) {
			while ($row = $result->fetch_assoc()) {
				$aid = $row['ID'];
				$adminp = $row['password'];
			}
			$result->free_result();
			$connection->close();
			session_start();
			$_SESSION["login_user"] = $adminid;
			$_SESSION["login_usrid"] = $adminpass;
			header("location:dashboard.php");
			exit;
		} else {
			echo "<script>alert('The User ID and The password is Invalid contact the admin If you forget the Password'); window.location='login.php';</script>";
		}
	}
} else if ($admin == 3) {
	if (isset($_POST['submit_data'])) {
		$first_name = mysqli_real_escape_string($connection, $_POST['fname']);
		$middle_name = mysqli_real_escape_string($connection, $_POST['mname']);
		$last_name = mysqli_real_escape_string($connection, $_POST['lname']);
		$sub = mysqli_real_escape_string($connection, $_POST['subject']);
		$desc = mysqli_real_escape_string($connection, $_POST['issue']);
		;
		$prior = mysqli_real_escape_string($connection, $_POST['dog-names']);
		$date = mysqli_real_escape_string($connection, $_POST['date']);
		$sid = mysqli_real_escape_string($connection, $_POST['hdnuid']);
		$token = mysqli_real_escape_string($connection, $_POST['hdntoken']);
		$sql = "INSERT INTO conversation(fname, mname, lname, subject, comments, id, priority, comments_date,token_no) VALUES('$first_name','$middle_name','$last_name','$sub','$desc','$sid','$prior','$date','$token')";
		$result = $connection->query($sql);
		if ($result == TRUE) {
			header("Location:dashboard.php");
		} else {
			echo "some thing error encounterd Please try again later";
		}
		exit;
	}
} else if ($admin == 4) {
	if (isset($_POST['nullsubmit'])) {
		$fname = mysqli_real_escape_string($connection, $_POST['full_name']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$id = mysqli_real_escape_string($connection, $_POST['uid']);
		$password = mysqli_real_escape_string($connection, $_POST['psw']);
		;
		$department = mysqli_real_escape_string($connection, $_POST['dept']);
		$user_post = mysqli_real_escape_string($connection, $_POST['upost']);
		$sql = "INSERT INTO admin_page(name, email, id, password, department, post) VALUES('$fname','$email','$id','$password','$department','$user_post')";
		$result = $connection->query($sql);
		if ($result == TRUE) {
			header("Location:adminpagelogin.php");
		} else {
			echo "error";
		}
		exit;
	}
} elseif ($admin == 5) {
	if (isset($_POST['logged'])) {
		$adminid = mysqli_real_escape_string($connection, $_POST['uid']);
		$adminpass = mysqli_real_escape_string($connection, $_POST['pasw']);
		$sql = "select * from admin_page where ID='$adminid' and password='$adminpass'";
		$result = $connection->query($sql);
		if ($result->num_rows == 1) {
			while ($row = $result->fetch_assoc()) {
				$aid = $row['ID'];
				$adminp = $row['password'];
			}
			$result->free_result();
			$connection->close();
			session_start();
			$_SESSION["login_user"] = $adminid;
			$_SESSION["login_usrid"] = $adminpass;
			header("location:admin_dashboard.php");
			exit;
		} else {
			echo "<script>alert('The User ID and The password is Invalid contact the admin If you forget the Password'); window.location='adminpagelogin.php';</script>";
		}
	}
} else if ($admin == 6) {
	if (isset($_POST['actionbtn'])) {
		$issue = mysqli_real_escape_string($connection, $_POST['Desc']);
		$name = mysqli_real_escape_string($connection, $_POST['clientname']);
		$uid = mysqli_real_escape_string($connection, $_POST['uid']);
		$snum = mysqli_real_escape_string($connection, $_POST['serial']);
		$token_number = mysqli_real_escape_string($connection, $_POST['token']);
		$sql = "INSERT INTO action_perform(describe_issue, full_name, id, snum_client) VALUES('$issue','$name','$uid','$snum')";
		$result = $connection->query($sql);
		if ($result == TRUE) {
			$update_sql = "UPDATE conversation set token_no = 'Actioned Takened' WHERE token_no = '$token_number'";
			$update_result = $connection->query($update_sql);
			if ($update_result == TRUE) {

				header("location:admin_dashboard.php");
			} else {
				echo "operation unsuccessfull";
			}

		} else {
			echo "error";
		}
		exit;
	}
}
elseif($admin==7){
	$sql = "Delete from conversation where token_no = 'Actioned Takened'";
	$result = $connection->query($sql);
	if ($result == TRUE){
		echo "<script>alert('Data Deleted'); window.location='admin_dashboard.php';</script>";
	}
}