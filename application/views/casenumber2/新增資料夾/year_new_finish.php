<?php
	include("mysql_connect.inc.php");
	$year=$_POST["year"];

	$sql = "CREATE TABLE `".$year."` (
			`NO` INT( 3 ) NOT NULL AUTO_INCREMENT,
			`caseno` CHAR( 6 ) NOT NULL,
			`date` INT( 4) NOT NULL,
			`no_en` CHAR( 2 ) NOT NULL ,
			`no_n` INT( 5 ) NOT NULL ,
			`name` TEXT NOT NULL ,
			`money` INT( 10 ) NOT NULL,
			PRIMARY KEY ( `NO` ) ,
			INDEX ( `caseno`),
			INDEX ( `date`),
			INDEX ( `no_en` , `no_n` ) ) ENGINE = MYISAM ;";
    if(mysql_query($sql))
    {
            echo $year."年份新增成功!\n";
    }
    else
    {
            echo '重複新增!\n';
    }
	$sql= "INSERT INTO `".$db_name."`.`yearindex` (`year` )VALUES ('".$year."');";
    if(mysql_query($sql))
    {
            echo $year."年份表頭成功!\n";
    }
    else
    {
            echo '重複新增!\n';

    }

	$sql = "CREATE TABLE `head".$year."` (
			`NO` CHAR( 10 ) NOT NULL ,
			`no_en` CHAR( 1 ) NOT NULL ,
			`no_n` INT( 4 ) NOT NULL ,
			`caseno` CHAR( 5 ) NOT NULL,
			`year` INT( 3 ) NOT NULL,
			`date` INT( 4 ) NOT NULL,
			`no2` INT( 5 ) NOT NULL  ,
			`head1` INT( 2 ) NOT NULL ,
			`head2` INT( 2 ) NOT NULL ,
			INDEX ( `NO`),
			INDEX ( `no_en` , `no_n` ),
			INDEX ( `caseno`),
			INDEX ( `year`),
			INDEX ( `no2`),
			INDEX ( `head1`),
			INDEX ( `date`) ) ENGINE = MYISAM ;";
    if(mysql_query($sql))
    {
            echo $year."年份索引新增成功!\n";

    }
    else
    {
            echo '重複新增!\n';

    }
?>
