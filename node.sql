/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.6.17 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `snake_node` (
	`id` int (11),
	`node_name` varchar (1395),
	`module_name` varchar (1395),
	`control_name` varchar (1395),
	`action_name` varchar (1395),
	`is_menu` tinyint (1),
	`typeid` int (11),
	`style` varchar (1395),
	`type` int (1)
); 
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('1','用户管理','#','#','#','2','0','fa fa-users','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('2','用户列表','admin','user','index','2','1','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('3','添加用户','admin','user','useradd','1','2','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('4','编辑用户','admin','user','useredit','1','2','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('5','删除用户','admin','user','userdel','1','2','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('6','角色列表','admin','role','index','2','1','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('7','添加角色','admin','role','roleadd','1','6','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('8','编辑角色','admin','role','roleedit','1','6','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('9','删除角色','admin','role','roledel','1','6','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('10','分配权限','admin','role','giveaccess','1','6','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('11','系统管理','#','#','#','2','0','fa fa-desktop','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('12','数据备份/还原','admin','data','index','2','11','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('13','备份数据','admin','data','importdata','1','12','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('14','还原数据','admin','data','backdata','1','12','','1');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('15','文章管理','#','#','#','2','0','fa fa-file','2');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('16','添加文章','index','article','articleadd','1','15','','2');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('17','编辑文章','index','article','articleedit','1','15','','2');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('18','删除文章','index','article','articledel','1','15','','2');
insert into `snake_node` (`id`, `node_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`, `type`) values('20','文章列表','index','article','index','2','15','','2');
