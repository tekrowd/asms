<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/config/config.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/classes/classes.php");
	
	$sql = new Mysql();
	$con = $sql->dbConnect();
	
	$query = 	"SELECT * FROM TECHNICIAN_INFO 
				WHERE TECHNICIAN_INFO.TECHNICIAN_ID 
				IN (
					SELECT TECHNICIAN_ID FROM ITP_ONLINE
				)";
					
	$techs = $sql->selectFreeRun($query);
		
	while ($row = mysqli_fetch_object($techs)) {
		$pros = $row;
		$pros->SKILLS = '';
			
		$query = 	"SELECT SKILLS_LIST.SKILL
					FROM SKILLS_LIST
					WHERE SKILLS_LIST.ID
					IN (
						SELECT SKILL_ID
						FROM TECHNICIAN_SKILLS
						WHERE TECHNICIAN_ID = '".$pros->TECHNICIAN_ID."' AND TECHNICIAN_SKILLS.APPROVED = 'true'
					)";
		
		$select = $sql->selectFreeRun($query);
		
		if ($select) {
			
			$i = 0;
			while ($a = mysqli_fetch_object($select)) {
				
				if (!$i == 0) {
					$pros->SKILLS .= ', ';
				}
				
				$pros->SKILLS .= $a->SKILL;
				$i++;
			}
		}
		
		?>

<div id="pro-box-<?php echo $pros->ID;?>" class="pros-list">
	<div class="main-content">
		<div class="col-lg-9">
			<div class="pro-details">
				<span>
					<div class="details"><?php echo $pros->FIRST_NAME; ?></div>
					<div id="time-from-<?php echo $pros->ID;?>" class="details"></div>
					<div id="distance-from-<?php echo $pros->ID;?>" class="details"></div>
					<div class="details"></div>
				</span>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="options"> <a class="btn btn-default option-button" href="#">Select Professional</a>
				<button class="btn btn-default option-button" onClick="javascript:proDropdown(<?php echo $pros->ID;?>);">More Details <span class="caret"> </span></button>
			</div>
		</div>
	</div>
	<div id="pro-dropdown-<?php echo $pros->ID;?>" class="pro-dropdown" style="display:none"><span><?php echo $pros->SKILLS;?></span></div>
</div>
<?php
	}

	

