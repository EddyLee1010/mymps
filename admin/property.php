<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

define("CURSCRIPT", "property_add");
require_once(dirname(__FILE__) . "/global.php");
require_once(MYMPS_INC . "/db.class.php");
if (!defined("IN_ADMIN") || !defined("IN_MYMPS")) {
    exit("Access Denied");
}
require_once('../plugin/property/include/Constants.php');
require_once('../plugin/property/include/functions.php');
$part = $part ? trim($part) : "add";
$id = isset($id) ? intval($id) : "";
chk_admin_purview(Constants::PURVIEW_ADD);

if (!submit_check(CURSCRIPT . "_submit")) {
    if ($part == "list") {
        $query = $db->query("SELECT * FROM `" . $db_mymps . "property`");
        $rows_num = $db->num_rows($query);
        $per_page = 20;
        $pages_num = ceil($rows_num / $per_page);
        $page = empty($page) ? 1 : $page;
        $offset = ($page - 1) * $per_page;
        $list = $db->getAll("SELECT * FROM `" . $db_mymps . "property` ORDER BY time_created DESC LIMIT $offset,{$per_page}");
    } else if (in_array($part, ['edit', 'copy'])) {
        $row = $db->get_one('SELECT * FROM ' . $db_mymps . 'property WHERE `id` = ' . $id);
        $province = $db->get_one('SELECT * FROM ' . $db_mymps . 'province WHERE `provinceid` = ' . $row['province_id']);
        $city = $db->get_one('SELECT * FROM ' . $db_mymps . 'city WHERE `cityid` = ' . $row['city_id']);
        $city_list = $db->getAll('SELECT * FROM ' . $db_mymps . 'city  WHERE `provinceid` = ' . $row['province_id'] . ' ORDER BY displayorder ASC');
        $area = $db->get_one('SELECT * FROM ' . $db_mymps . 'area WHERE `areaid` = ' . $row['area_id']);
        $area_list = $db->getAll('SELECT * FROM ' . $db_mymps . 'area WHERE `cityid` = ' . $row['city_id'] . ' ORDER BY displayorder ASC');
        $building = $db->get_one('SELECT * FROM ' . $db_mymps . 'building WHERE `building_id` = ' . $row['building_id']);
        $building_list = $db->getAll('SELECT * FROM ' . $db_mymps . 'building WHERE `area_id` = ' . $row['area_id'] . ' ORDER BY display_order ASC');
        $room = $db->get_one('SELECT * FROM ' . $db_mymps . 'room WHERE `room_id` = ' . $row['room_id']);
        $room_list = $db->getAll('SELECT * FROM ' . $db_mymps . 'room WHERE `building_id` = ' . $row['building_id'] . ' ORDER BY display_order ASC');

    } else if (isset($act)) {
        $part = 'search';
        $sql = "SELECT p.*,m.userid FROM " . $db_mymps . "property p LEFT JOIN ".$db_mymps."member m ON p.uid=m.id WHERE p.status='Y' ORDER BY time_created DESC";
        $query = $db->query($sql);
        $rows_num = $db->num_rows($query);
        $per_page = 20;
        $pages_num = ceil($rows_num / $per_page);
        $page = empty($page) ? 1 : $page;
        $offset = ($page - 1) * $per_page;
        $list = $db->getAll($sql . " LIMIT $offset,{$per_page}");
        $map_pay_type = Constants::map_pay_type;

    } elseif ($part == 'del') {
        $now = time();
        $db->query("DELETE FROM " . $db_mymps . "property WHERE `id` = " . $id);
        $res = $db->affected_rows();

        if ($res > 0) {
            write_msg("��Ϣɾ���ɹ�");
        } else {
            write_msg("��Ϣɾ��ʧ��");
        }
    }
    $here = "��ҵ��Ϣ¼��";
    $province_list = $db->getall("SELECT * FROM `" . $db_mymps . "province` ORDER BY displayorder ASC");
    include(mymps_tpl("property_" . $part));
} elseif ($part == 'add') {
    if (empty($province_id)) {
        write_msg('��ѡ��ʡ��');
    } elseif (empty($city_id)) {
        write_msg('��ѡ����');
    } elseif (empty($area_id)) {
        write_msg('��ѡ����/��');
    } elseif (empty($building_id)) {
        write_msg('��ѡ��С��');
    } elseif (empty($room_id)) {
        write_msg('��ѡ�񷿺�');
    } elseif (empty($manage_fee)) {
        write_msg('����������');
    } elseif (empty($electric_fee)) {
        write_msg('��������');
    } elseif (empty($water_fee)) {
        write_msg('������ˮ��');
    } elseif (empty($period)) {
        write_msg('����дӦ��ʱ��');
    }

    //$period = date('Ym');
    $res = $db->get_one('SELECT * FROM '. $db_mymps . 'property WHERE `room_id` = '. $room_id.' AND period=\''.$period.'\'');
    if (!empty($res)) {
        write_msg('�÷�����Ϣ�Ѿ�����,�����ظ����');
    }

    $now = time();
    $sql = "INSERT INTO " . $db_mymps .
        "property (province_id,city_id,area_id,building_id,room_id,manage_fee,electric_fee,water_fee,other_fee,time_created,time_updated,period) 
		VALUES 
		('{$province_id}','{$city_id}','{$area_id}','{$building_id}','{$room_id}','{$manage_fee}','{$electric_fee}','{$water_fee}','{$other_fee}','{$now}','{$now}','{$period}')";

    $db->query($sql);
    $res = $db->affected_rows();

    if ($res > 0) {
        write_msg("��Ϣ¼��ɹ�");
    } else {
        write_msg("��Ϣ¼��ʧ��");
    }
} elseif ($part == 'edit') {
    if (empty($province_id)) {
        write_msg('��ѡ��ʡ��');
    } elseif (empty($city_id)) {
        write_msg('��ѡ����');
    } elseif (empty($area_id)) {
        write_msg('��ѡ����/��');
    } elseif (empty($building_id)) {
        write_msg('��ѡ��С��');
    } elseif (empty($room_id)) {
        write_msg('��ѡ�񷿺�');
    } elseif (empty($manage_fee)) {
        write_msg('����������');
    } elseif (empty($electric_fee)) {
        write_msg('��������');
    } elseif (empty($water_fee)) {
        write_msg('������ˮ��');
    }

    $now = time();
    $db->query("UPDATE " . $db_mymps . "property SET province_id='{$province_id}',city_id='{$city_id}',area_id='{$area_id}',building_id='{$building_id}',room_id='$room_id}',price='{$price}',time_updated='{$now}' WHERE `id`=" . $id);
    $res = $db->affected_rows();

    if ($res > 0) {
        write_msg("��Ϣ�޸ĳɹ�");
    } else {
        write_msg("��Ϣ�޸�ʧ��");
    }
} else {

}
unset($status);
if (is_object($db)) {
    $db->close();
}
$db = $mymps_global = $part = $action = $here = NULL;
?>
