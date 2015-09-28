<?php
     
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/config.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/classes/classes.php");
     
    try {
     
        $sql = new Mysql();
		$con = $sql->dbConnect();
         
        $query = "SELECT o.LONGITUDE, o.LATITUDE, o.STATUS, t.* FROM ITP_ONLINE AS o, TECHNICIAN_INFO AS t WHERE t.TECHNICIAN_ID = o.TECHNICIAN_ID";
        $mysql = $sql->freeRun($query);
		
		while ($row = mysqli_fetch_object($mysql)) {
									
			$id			=	$row->ID;
			$name		=	$row->FIRST_NAME;
			$address	=	$row->CITY . " " . $row->PROVINCE . ", " . $row->COUNTRY;
			$lat		=	$row->LATITUDE;
			$lng		=	$row->LONGITUDE;
			$status		=	$row->STATUS;
						
			$user_id = $row->TECHNICIAN_ID;
			
			$query = "SELECT SKILLS_LIST.SKILL
						FROM SKILLS_LIST
						WHERE SKILLS_LIST.ID
						IN (
							SELECT SKILL_ID
							FROM TECHNICIAN_SKILLS
							WHERE TECHNICIAN_ID = '".$user_id."' AND TECHNICIAN_SKILLS.APPROVED = 'true'
						)";
		
			$select = $sql->selectFreeRun($query);
			
			$type = "";
			
			if ($select) {
				
				$i = 0;
				while ($a = mysqli_fetch_object($select)) {
					if (!$i == 0) {
						$type .= ', ';
					}
					$type .= $a->SKILL;
					$i++;
				}
			}
				
			$itp[] = array(
				"id"		=>	$id,
				"name"		=>	$name,
				"status"	=>	$status,
				"address"	=>	$address,
				"lat"		=>	$lat,
				"lng"		=>	$lng,
				"type"		=>	$type
			);
		}
		         
        echo json_encode( $itp );
         
    } catch (Exception $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>