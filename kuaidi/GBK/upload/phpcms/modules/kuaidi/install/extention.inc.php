<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'kuaidi', 'parentid'=>29, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
$menu_db->insert(array('name'=>'add_kd', 'parentid'=>$parentid, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'add', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'edit_kd', 'parentid'=>$parentid, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'edit', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'delete_kd', 'parentid'=>$parentid, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'delete', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
$menu_db->insert(array('name'=>'kd_setting', 'parentid'=>$parentid, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'setting', 'data'=>'', 'listorder'=>1, 'display'=>'1'));
$menu_db->insert(array('name'=>'add_type', 'parentid'=>$parentid, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'add_type', 'data'=>'', 'listorder'=>2, 'display'=>'1'));
$menu_db->insert(array('name'=>'list_type', 'parentid'=>$parentid, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'list_type', 'data'=>'', 'listorder'=>3, 'display'=>'1'));
$menu_db->insert(array('name'=>'public_cache', 'parentid'=>$parentid, 'm'=>'kuaidi', 'c'=>'kuaidi', 'a'=>'public_cache', 'data'=>'', 'listorder'=>4, 'display'=>'1'));

$language = array('kuaidi'=>'���', 'add_kd'=>'��ӿ��', 'edit_kd'=>'�༭���', 'delete_kd'=>'ɾ�����', 'kd_setting'=>'ģ������', 'add_type'=>'������', 'list_type'=>'�������', 'public_cache'=>'���¿�ݻ���');
?>