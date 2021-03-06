
<?php
//Connect to MySQL DB
	include "../../db_connect.php";
	
//Declare variable
if(isset($_POST['submit'])){
		
		// General Inputs
		$firstname = ucfirst(strtolower($_POST["firstname"]));
		$lastname =  strtolower($_POST["lastname"]);
		$civil = $_POST["civil"];
		$religion = ucfirst(strtolower($_POST["religion"]));
		$tel = $_POST["tel"];
		$educ = ucfirst(strtolower($_POST["educ"]));
		$philn = $_POST["philn"];
		$skill = ucfirst(strtolower($_POST["skill"]));
		$income = $_POST["income"];
		$admission = $_POST["admission"];
		$reff1 = ucfirst(strtolower($_POST["reff1"]));
		$reff2 = ucfirst(strtolower($_POST["reff2"]));
		$house = ucfirst(strtolower($_POST["house"]));
		$lot = ucfirst(strtolower($_POST["lot"]));
		$areff1 = ucfirst(strtolower($_POST["areff1"]));
		$areff2 = ucfirst(strtolower($_POST["areff2"]));
		$assestment = ucfirst(strtolower($_POST["assestment"]));
		$inserted_amount = $_POST["amount"];
		$amount = str_replace(",", "", $inserted_amount);
		$contactno = $_POST["contactno"];
		
		// Service inputs
		$perpetrator = ucfirst(strtolower($_POST["perpetrator"]));
		$parent = ucfirst(strtolower($_POST["parent"]));
		$disposition = ucfirst(strtolower($_POST["disposition"]));
		$where = ucfirst(strtolower($_POST["where"]));
		$service = ucfirst(strtolower($_POST["service"]));
		$type = ucfirst(strtolower($_POST["type"]));
		$when = date('Y-m-d', strtotime($_POST['when']));
		
		$con->query('SET autocommit=0;');
		$con->query('START TRANSACTION;');

		// Insert and Update values to MySQL DB	

		// Update to client table
		$stmt = $con->prepare("UPDATE client SET educ_attainment = ?, contact_no = ?, civil_status = ?, income = ?, skills = ? WHERE client_id= ?");
		$stmt->bind_param("sssssi", $educ, $contactno, $civil, $income, $skill, $client_id);
		if(!$stmt->execute()){ $con->rollback(); }
		$stmt->close();

			// Insert to interview Table 
			$stmt = $con->prepare("INSERT INTO interview ( worker_id, client_id, interview_date, interview_time ) VALUES (?,?, CURDATE(), CURTIME())");
			$stmt->bind_param("ii", $worker_id, $client_id);
			if(!$stmt->execute()){ $con->rollback(); }
			$interview_id = $con->insert_id;
			$stmt->close();			

			// Insert to client_general_details Table
			$stmt = $con->prepare("INSERT INTO client_general_details ( client_id, religion, telephone, provincial_address, philhealth_no, admission, referral1, referral2, referral_contact1, referral_contact2, house, lot, assestment, interview_id ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, ?)");
			$stmt->bind_param("issssssssssssi", $client_id, $religion, $tel, $proadd, $philn, $admission, $reff1, $reff2, $areff1, $areff2, $house, $lot, $assestment, $interview_id );
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to assistance Table
			$stmt = $con->prepare("INSERT INTO assistance ( client_id, worker_id, service_id, amount, interview_id ) VALUES (?,?,?,?,?)");
			$stmt->bind_param("iiisi", $client_id, $worker_id, $service_id, $amount, $interview_id);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
			
			// Insert to client_dwyna_details Table
			$stmt = $con->prepare("INSERT INTO client_dwyna_details ( client_id, type_of_abuse, parent_name, perpetrator, when_happened, where_happened, services_rendered, disposition, interview_id ) VALUES (?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isssssssi", $client_id, $type, $parent, $perpetrator, $when, $where, $service, $disposition, $interview_id);
			if(!$stmt->execute()){ $con->rollback(); }
			$stmt->close();
						 
			// Insert to interview_log Table
			$sql = " INSERT INTO interview_log ( client_id, worker_id, service_id, interview_id )
						 VALUES ('$client_id', '$worker_id', '$service_id' ,'$interview_id' )";
			
			if($con->multi_query($sql)){ //1
			 
			// Insert to activity_log Table 
			$sql = " INSERT INTO activity_log ( activity_date, details )
						 VALUES ( now() , ' $worker_name registered Existing Client named $firstname $lastname in Welfare of Disadvantaged Woman, Youth and other Needy Adult' )";

			
			if($con->multi_query($sql)){
				// Notification if all the data is successfully inserted
				echo '<script>alert("Client Successfully Registered");location="../table/service_registry.php";</script>';
			}
			else{
				// Rollback the transaction
				$con->rollback();
				// Notification if one or more data is not successfully inserted
				echo '<script>alert("Client Unsuccessfully Registered");location="../forms/form-dwyna.php";</script>';
			}
			
			} //1
		
		else{
			// Rollback the transaction
			$con->rollback();
			// Notification if all the data is not successfully inserted
			echo '<script>alert("ERROR: Please Contact the Admin");location="../table/service_registry.php";</script>';
		}
		
		$con->query('COMMIT;');
		$con->query('SET autocommit=1;');
}
?>