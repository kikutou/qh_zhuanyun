<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
pc_base::load_app_func('util');

class kuaidi extends admin {
	function __construct() {
		parent::__construct();
		$this->M = new_html_special_chars(getcache('kuaidi', 'commons'));
		$this->db = pc_base::load_model('kuaidi_model');
		$this->db2 = pc_base::load_model('type_model');
		$this->siteid = $this->get_siteid();
	}

	public function init() {
		if($_GET['typeid']!=''){
			$where = array('typeid'=>$_GET['typeid'],'siteid'=>$this->siteid);
		}else{
			$where = array('siteid'=>$this->siteid);
		}
 		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$infos = $this->db->listinfo($where,$order = 'listorder DESC,kdid DESC',$page, $pages = '9');
		$pages = $this->db->pages;
		$types = $this->db2->listinfo(array('module'=>ROUTE_M,'siteid'=>$this->siteid),$order = 'typeid DESC');
		$types = new_html_special_chars($types);
 		$type_arr = array ();
 		foreach($types as $typeid=>$type){
			$type_arr[$type['typeid']] = $type['name'];
		}
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=kuaidi&c=kuaidi&a=add\', title:\''.L('kd_add').'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('kd_add'));
		include $this->admin_tpl('kuaidi_list');
	}

	//��ӿ��
 	public function add() {
 		if(isset($_POST['dosubmit'])) {
			pc_base::load_sys_func('iconv');
			$_POST['kuaidi']['addtime'] = SYS_TIME;
			$_POST['kuaidi']['siteid'] = $this->siteid;
			if(empty($_POST['kuaidi']['name'])) {
				showmessage(L('name_noempty'),HTTP_REFERER);
			}
			if(empty($_POST['kuaidi']['fullname'])) {
				$_POST['kuaidi']['fullname'] = $_POST['kuaidi']['name'];
			}
			$name = CHARSET == 'gbk' ? $_POST['kuaidi']['name'] : iconv('utf-8','gbk',$_POST['kuaidi']['name']);
			$letters = gbk_to_pinyin($name);
			$_POST['kuaidi']['letter'] = strtolower(implode('', $letters));
			$kdid = $this->db->insert($_POST['kuaidi'],true);
			if(!$kdid) return FALSE; 
 			$siteid = $this->siteid;
	 		//���¸���״̬
			if(pc_base::load_config('system','attachment_stat') & $_POST['kuaidi']['logo']) {
				$this->attachment_db = pc_base::load_model('attachment_model');
				$this->attachment_db->api_update($_POST['kuaidi']['logo'],'kuaidi-'.$kdid,1);
			}
			showmessage(L('operation_success'),HTTP_REFERER,'', 'add');
		} else {
			//��ȡվ��ģ����Ϣ
			pc_base::load_app_func('global', 'admin');
			$siteid = $this->siteid;
			$template_list = template_list($siteid, 0);
			$site = pc_base::load_app_class('sites','admin');
			$info = $site->get_by_id($siteid);
			foreach ($template_list as $k=>$v) {
				$template_list[$v['dirname']] = $v['name'] ? $v['name'] : $v['dirname'];
				unset($template_list[$k]);
			}
			$show_validator = $show_scroll = $show_header = true;
			pc_base::load_sys_class('form', '', 0);
			$types = $this->db2->get_types($siteid);
			//print_r($types);exit;
 			include $this->admin_tpl('kuaidi_add');
		}

	}

	//�޸Ŀ��
	public function edit() {
		if(isset($_POST['dosubmit'])){
			pc_base::load_sys_func('iconv');
 			$kdid = intval($_GET['kdid']);
			if($kdid < 1) return false;
			if(!is_array($_POST['kuaidi']) || empty($_POST['kuaidi'])) return false;
			if((!$_POST['kuaidi']['name']) || empty($_POST['kuaidi']['name'])) return false;
			if(empty($_POST['kuaidi']['fullname'])) {
				$_POST['kuaidi']['fullname'] = $_POST['kuaidi']['name'];
			}
			$name = CHARSET == 'gbk' ? $_POST['kuaidi']['name'] : iconv('utf-8','gbk',$_POST['kuaidi']['name']);
			$letters = gbk_to_pinyin($name);
			$_POST['kuaidi']['letter'] = strtolower(implode('', $letters));
			$this->db->update($_POST['kuaidi'],array('kdid'=>$kdid));
			//���¸���״̬
			if(pc_base::load_config('system','attachment_stat') & $_POST['kuaidi']['logo']) {
				$this->attachment_db = pc_base::load_model('attachment_model');
				$this->attachment_db->api_update($_POST['kuaidi']['logo'],'kuaidi-'.$kdid,1);
			}
			showmessage(L('operation_success'),'?m=kuaidi&c=kuaidi&a=edit','', 'edit');
			
		}else{
			//��ȡվ��ģ����Ϣ
			//pc_base::load_app_func('global', 'admin');
			$siteid = $this->siteid;
			$template_list = template_list($siteid, 0);
			foreach ($template_list as $k=>$v) {
				$template_list[$v['dirname']] = $v['name'] ? $v['name'] : $v['dirname'];
				unset($template_list[$k]);
			}
 			$show_validator = $show_scroll = $show_header = true;
			pc_base::load_sys_class('form', '', 0);
			$types = $this->db2->listinfo(array('module'=> ROUTE_M,'siteid'=>$this->siteid),$order = 'typeid DESC',$page, $pages = '10');
 			$type_arr = array ();
			foreach($types as $typeid=>$type){
				$type_arr[$type['typeid']] = $type['name'];
			}
			//�����������
			$info = $this->db->get_one(array('kdid'=>$_GET['kdid']));
			if(!$info) showmessage(L('kuaidi_exit'));
			extract($info); 
			//print_r($info);exit;
 			include $this->admin_tpl('kuaidi_edit');
		}

	}
	 
	//��ӷ���ʱ����֤�������Ƿ��Ѵ���
	public function public_check_name() {
		$type_name = isset($_GET['type_name']) && trim($_GET['type_name']) ? (pc_base::load_config('system', 'charset') == 'gbk' ? iconv('utf-8', 'gbk', trim($_GET['type_name'])) : trim($_GET['type_name'])) : exit('0');
 		$typeid = isset($_GET['typeid']) && intval($_GET['typeid']) ? intval($_GET['typeid']) : '';
 		$data = array();
		if ($typeid) {
 			$data = $this->db2->get_one(array('typeid'=>$typeid), 'name');
			if (!empty($data) && $data['name'] == $type_name) {
				exit('1');
			}
		}
		if ($this->db2->get_one(array('name'=>$type_name), 'typeid')) {
			exit('0');
		} else {
			exit('1');
		}
	}
	 
	    
	/**
	 * ˵��:�첽�������� 
	 * @param  $optionid
	 */
	public function listorder_up() {
		$result = $this->db->update(array('listorder'=>'+=1'),array('kdid'=>$_GET['kdid']));
		if($result){
			echo 1;
		} else {
			echo 0;
		}
	}
	
	//��������
 	public function listorder() {
		if(isset($_POST['dosubmit'])) {
			foreach($_POST['listorders'] as $kdid => $listorder) {
				$this->db->update(array('listorder'=>$listorder),array('kdid'=>$kdid));
			}
			showmessage(L('operation_success'),HTTP_REFERER);
		} 
	}
	
	//��ӷ���
 	public function add_type() {
		if(isset($_POST['dosubmit'])) {
			if(empty($_POST['type']['name'])) {
				showmessage(L('typename_noempty'),HTTP_REFERER);
			}
			$_POST['type']['siteid'] = $this->siteid; 
			$_POST['type']['module'] = ROUTE_M;
 			$this->db2 = pc_base::load_model('type_model');
			$typeid = $this->db2->insert($_POST['type'],true);
			if(!$typeid) return FALSE;
			showmessage(L('operation_success'),HTTP_REFERER);
		} else {
			$show_validator = $show_scroll = true; 
			$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=kuaidi&c=kuaidi&a=add\', title:\''.L('kd_add').'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('kd_add'));
 			include $this->admin_tpl('kuaidi_type_add');
		}

	}
	
	/**
	 * ɾ������
	 */
	public function delete_type() {
		if((!isset($_GET['typeid']) || empty($_GET['typeid'])) && (!isset($_POST['typeid']) || empty($_POST['typeid']))) {
			showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['typeid'])){
				foreach($_POST['typeid'] as $typeid_arr) {
 					$this->db2->delete(array('typeid'=>$typeid_arr));
				}
				showmessage(L('operation_success'),HTTP_REFERER);
			}else{
				$typeid = intval($_GET['typeid']);
				if($typeid < 1) return false;
				$result = $this->db2->delete(array('typeid'=>$typeid));
				if($result)
				{
					showmessage(L('operation_success'),HTTP_REFERER);
				}else {
					showmessage(L("operation_failure"),HTTP_REFERER);
				}
			}
		}
	}
	
	//:�������
 	public function list_type() {
		$this->db2 = pc_base::load_model('type_model');
		$infos = $this->db2->listinfo(array('module'=> ROUTE_M,'siteid'=>$this->siteid),$order = 'listorder DESC',$page, $pages = '10');
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=kuaidi&c=kuaidi&a=add\', title:\''.L('kd_add').'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('kd_add'));
		include $this->admin_tpl('kuaidi_list_type');
	}
 
	
	/**
	 * �޸Ŀ�ݷ���
	 */
	public function edit_type() {
		if(isset($_POST['dosubmit'])){ 
			$typeid = intval($_GET['typeid']); 
			if($typeid < 1) return false;
			if(!is_array($_POST['type']) || empty($_POST['type'])) return false;
			if((!$_POST['type']['name']) || empty($_POST['type']['name'])) return false;
			$this->db2->update($_POST['type'],array('typeid'=>$typeid));
			showmessage(L('operation_success'),'?m=kuaidi&c=kuaidi&a=list_type','', 'edit');
		}else{
 			$show_validator = $show_scroll = $show_header = true;
			//�����������
			$info = $this->db2->get_one(array('typeid'=>$_GET['typeid']));
			if(!$info) showmessage(L('linktype_exit'));
			extract($info);
			include $this->admin_tpl('kuaidi_type_edit');
		}

	}

	/**
	 * ɾ�����  
	 * @param	intval	$sid	���ID���ݹ�ɾ��
	 */
	public function delete() {
  		if((!isset($_GET['kdid']) || empty($_GET['kdid'])) && (!isset($_POST['kdid']) || empty($_POST['kdid']))) {
			showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else {
			if(is_array($_POST['kdid'])){
				foreach($_POST['kdid'] as $kdid_arr) {
 					//����ɾ�����
					$this->db->delete(array('kdid'=>$kdid_arr));
				}
				showmessage(L('operation_success'),'?m=kuaidi&c=kuaidi');
			}else{
				$kdid = intval($_GET['kdid']);
				if($kdid < 1) return false;
				//ɾ�����
				$result = $this->db->delete(array('kdid'=>$kdid));
				 
				if($result){
					showmessage(L('operation_success'),'?m=kuaidi&c=kuaidi');
				}else {
					showmessage(L("operation_failure"),'?m=kuaidi&c=kuaidi');
				}
			}
			showmessage(L('operation_success'), HTTP_REFERER);
		}
	}
	 
	/**
	 * ���ģ������
	 */
	public function setting() {
		//��ȡ�����ļ�
 		$siteid = $this->siteid;//��ǰվ�� 
		$module_db = pc_base::load_model('module_model');
		$info = $module_db->get_one(array('module'=>ROUTE_M));
		$setting = string2array($info['setting']);//��ǰվ������
		if(isset($_POST['dosubmit'])) {
			//��վ��洢�����ļ�
 			$setting[$siteid] = $_POST['setting'];
  			setcache('kuaidi', $setting, 'commons');
			//����ģ�����ݿ�,����setting ����. 
			$set = array2string($setting);
			$info = $_POST['info'];
			$info['setting'] = $set;
			//print_r($info);exit;
			$module_db->update($info, array('module'=>ROUTE_M));
			showmessage(L('setting_updates_successful'), '?m=kuaidi&c=kuaidi&a=init');
		} else {
			//��ȡվ��ģ����Ϣ
			pc_base::load_sys_class('form','',0);
			$siteid = $this->siteid;
			$temp_list = template_list($siteid, 0);
			foreach ($temp_list as $k=>$v) {
				$temp_list[$v['dirname']] = $v['name'] ? $v['name'] : $v['dirname'];
				unset($temp_list[$k]);
			}
			$show_validator = $show_scroll = true;
			$nowsetting = $setting[$siteid];
			extract($nowsetting);
			extract($info);
			$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=kuaidi&c=kuaidi&a=add\', title:\''.L('kd_add').'\', width:\'700\', height:\'450\'}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('kd_add'));
			//print_r($nowsetting);exit;
 			include $this->admin_tpl('setting');
		}
	}
	
	/**
	 * ���»���
	 */
	public function cache() {
		$module_db = pc_base::load_model('module_model');
		$info = $module_db->get_one(array('module'=>ROUTE_M));
		$setting = string2array($info['setting']);//��ǰվ������
  		setcache('kuaidi', $setting, 'commons');
		$kuaidi_list = $this->kuaidi_list = array();
		$this->kuaidi_list = $this->db->select(array('siteid'=>$this->siteid,'passed'=>'1'),'*',10000,'letter asc, listorder desc');
		foreach($this->kuaidi_list as $r) {
			unset($r['introduce']);
			$kuaidi_list[$r['kdid']] = $r;
		}
		setcache('kuaidi_list_'.$this->siteid,$kuaidi_list,'commons');
		return true;
	}
	/**
	 * ���»��沢�޸���Ŀ
	 */
	public function public_cache() {
		$this->cache();
		showmessage(L('operation_success'),'?m=kuaidi&c=kuaidi');
	}

 	//�����������
 	public function check(){
		if((!isset($_GET['kdid']) || empty($_GET['kdid'])) && (!isset($_POST['kdid']) || empty($_POST['kdid']))) {
			showmessage(L('illegal_parameters'), HTTP_REFERER);
		} else { 
			$kdid = intval($_GET['kdid']);
			if($kdid < 1) return false;
			//ɾ�����԰�
			$result = $this->db->update(array('passed'=>1),array('kdid'=>$kdid));
			if($result){
				showmessage(L('operation_success'),'?m=kuaidi&c=kuaidi');
			}else {
				showmessage(L("operation_failure"),'?m=kuaidi&c=kuaidi');
			}
			 
		}
	}

	/**
	 * ˵��:���ַ������д���
	 * @param $string ��������ַ���
	 * @param $isjs �Ƿ�����JS����
	 */
	function format_js($string, $isjs = 1){
		$string = addslashes(str_replace(array("\r", "\n"), array('', ''), $string));
		return $isjs ? 'document.write("'.$string.'");' : $string;
	}
}
?>