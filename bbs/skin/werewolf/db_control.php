<?
	// register_globals�� off�� ���� ���� ���� ������
	@extract($HTTP_SERVER_VARS);
	@extract($HTTP_ENV_VARS);

	// ���κ��� ���̺귯�� ������
	$_zb_path = realpath("../../")."/";
	include $_zb_path."lib.php";

	// DB �������� ������
	$connect = dbConn();
	
	
	// Į�� �߰�
	$gameinfo_add_subrule = 
	"ALTER TABLE `zetyx_board_werewolf_gameinfo` ADD `subRule` INT(20) NOT NULL DEFAULT '0' AFTER `rule`;";
	$gameinfo_add_delay = 
	"ALTER TABLE `zetyx_board_werewolf_gameinfo` ADD `delay` MEDIUMINT(13) NOT NULL DEFAULT '0';";
	
	@mysql_query($gameinfo_add_subrule, $connect) or Error("subRule Į�� �߰� ����", "");
	@mysql_query($gameinfo_add_delay, $connect) or Error("delay Į�� �߰� ����", "");
	
	
	// subrule ���̺� ����
	$subrule_schema = 
	"CREATE TABLE `zetyx_board_werewolf_subrule` (
	`no` int(20) unsigned NOT NULL auto_increment,
	`name` varchar(20) default NULL,
	PRIMARY KEY  (`no`)
	) ENGINE=MyISAM;";
	$subrule_data = 
	"INSERT INTO `zetyx_board_werewolf_subrule` (`name`) VALUES 
	('�ζ� ���� ����'),
	('NPC ���� ���� �ο�'),
	('�ڷ��Ľ� ��� �Ұ�'),
	('��� ��ǥ');";
	
	@mysql_query($subrule_schema, $connect) or Error("subrule ���̺� ���� ����", "");
	@mysql_query($subrule_data, $connect) or Error("subrule ������ ���� ����", "");
	
	
	mysql_close($connect);
?>