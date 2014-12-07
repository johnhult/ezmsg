# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Värd: ezmsg-106775.mysql.binero.se (MySQL 5.5.32-cll-lve)
# Databas: 106775-ezmsg
# Genereringstid: 2014-12-07 11:42:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Tabelldump group_person
# ------------------------------------------------------------

LOCK TABLES `group_person` WRITE;
/*!40000 ALTER TABLE `group_person` DISABLE KEYS */;

INSERT INTO `group_person` (`group_id`, `person_id`, `added_by_id`)
VALUES
	('49e6f2b3-b6c5-447c-8f79-e3baa07fa9ec','30212293-442e-46e1-ad41-f341d7d0a809',''),
	('49e6f2b3-b6c5-447c-8f79-e3baa07fa9ec','5b1504f6-5dc0-4539-9881-d850f4d59ae5',''),
	('49e6f2b3-b6c5-447c-8f79-e3baa07fa9ec','64ce7298-5330-497b-80c8-24613d970517',''),
	('49e6f2b3-b6c5-447c-8f79-e3baa07fa9ec','74e7da80-51df-4aca-a1c5-ffefaa8a5347',''),
	('49e6f2b3-b6c5-447c-8f79-e3baa07fa9ec','9765862e-268a-4465-a238-3c7b7373d438',''),
	('49e6f2b3-b6c5-447c-8f79-e3baa07fa9ec','a096b041-96ac-49c9-a6db-ad28f499eb91',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','0d2e1b1e-2298-4d6d-810c-70ab83fbd647',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','162fbea2-a0bf-4744-9716-2f265eddbeab',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','282d21c6-696d-45fa-a8ab-f1abcf8615e1',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','49c66b88-4bc2-411b-a34a-58adff48ed2c',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','7413379e-66e2-4748-a0a5-8432d54ec380',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','a450278e-241e-4206-b3cf-ace05911a7da',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','c0911e78-be7a-478b-8aae-c7994d71aa14',''),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','d94d9bf3-b082-417f-949a-3283c025f64d','');

/*!40000 ALTER TABLE `group_person` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump groups
# ------------------------------------------------------------

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `creator_id`, `color`)
VALUES
	('29d08eb6-a3ad-49b4-8f88-0b88c519f4bb','Mamas Retro Gårdsten','a450278e-241e-4206-b3cf-ace05911a7da','color-5'),
	('49e6f2b3-b6c5-447c-8f79-e3baa07fa9ec','Mamas Retro Centrum','a450278e-241e-4206-b3cf-ace05911a7da','color-1'),
	('7d85aa49-de7d-49a5-b253-41ca07fe7089','forumSKILL','a450278e-241e-4206-b3cf-ace05911a7da','color-4'),
	('a5141cd1-4009-4db6-a853-9eebe97c26c5','Norma','a450278e-241e-4206-b3cf-ace05911a7da','color-2');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump person
# ------------------------------------------------------------

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;

INSERT INTO `person` (`id`, `first_name`, `last_name`, `admin`, `email`, `password`, `picture`, `creator_id`, `color`)
VALUES
	('0d2e1b1e-2298-4d6d-810c-70ab83fbd647','Ulrica','Wänman',0,'ulrica@forumskill.com','pASS123','default05.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-2-2'),
	('162fbea2-a0bf-4744-9716-2f265eddbeab','Linnea','Thoor',0,'linnea@forumskill.com','pASS123','1e95aaea-f5b2-44bc-a2bd-294d4be11f54.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-3-2'),
	('282d21c6-696d-45fa-a8ab-f1abcf8615e1','Erika','Gustafsson',0,'erika@forumskill.com','pASS123','default01.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-4-2'),
	('30212293-442e-46e1-ad41-f341d7d0a809','Elisabeth','Silverplats',0,'elisabeth@mamasretro.com','pASS123','0d50f162-9da5-46fc-a6aa-7e7b13196b47.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-2-2'),
	('49c66b88-4bc2-411b-a34a-58adff48ed2c','Mia','Bobzow',0,'mia@forumskill.com','pASS123','default03.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-1-2'),
	('5b1504f6-5dc0-4539-9881-d850f4d59ae5','Sabina','Tanbäck',0,'sabina@mamasretro.com','pASS123','cd7dcba3-af2c-4461-bf5b-9e00ea324081.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-3-2'),
	('64ce7298-5330-497b-80c8-24613d970517','Ann-Louise','Slotthag',0,'ann-louise@mamasretro.com','pASS123','1a76a869-2bea-4d3a-8cc1-167838b16751.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-3-2'),
	('7413379e-66e2-4748-a0a5-8432d54ec380','Bea','Alger',0,'bea@forumskill.com','pASS123','f3bc271f-5248-43d7-bcfb-cc2fadc77442.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-3-2'),
	('74e7da80-51df-4aca-a1c5-ffefaa8a5347','Johanna','Friberg',0,'johanna@mamasretro.com','pASS123','ceddb0f6-cd6a-4320-a087-c70ba1a3664f.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-1-2'),
	('9765862e-268a-4465-a238-3c7b7373d438','Catrin','Schultz',0,'catrin@mamasretro.com','pASS123','00b0ac4c-19df-48fb-bcdb-37871c68152a.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-5-2'),
	('a096b041-96ac-49c9-a6db-ad28f499eb91','Sheila','Silvestre',0,'sheila@mamasretro.com','pASS123','969e3102-d695-47c1-a59f-fcac5d57c871.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-5-2'),
	('a450278e-241e-4206-b3cf-ace05911a7da','An-Cii','Hult',1,'ancii@forumskill.com','pASS123','3f6fb455-27a3-4edb-8d25-5009050d4467.jpg','null','color-1-2'),
	('c0911e78-be7a-478b-8aae-c7994d71aa14','Jos','Rossling',0,'jos@forumskill.com','pASS123','default02.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-2-2'),
	('d94d9bf3-b082-417f-949a-3283c025f64d','Paulina','Hammarstrand',0,'paulina@forumskill.com','pASS123','default04.jpg','a450278e-241e-4206-b3cf-ace05911a7da','color-5-2');

/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump person_online
# ------------------------------------------------------------




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
