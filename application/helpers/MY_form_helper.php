<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('form_number'))
{
	function form_number($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'number',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('form_email'))
{
	function form_email($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'email',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);
		return '<input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
}

if ( ! function_exists('dropdown_title'))
{
	function dropdown_title()
	{
		$title = array(''=>'คำนำหน้าชื่อ',
			'นาย'=>'นาย','นาง'=>'นาง','นางสาว'=>'นางสาว','หม่อมหลวง'=>'หม่อมหลวง','ว่าที่ร้อยตรี'=>'ว่าที่ร้อยตรี',
			'พลเอก'=>'พลเอก','พลตรี'=>'พลตรี','พันโท'=>'พันโท','ร้อยเอก'=>'ร้อยเอก','ร้อยตรี'=>'ร้อยตรี',
			'จ่าสิบโท'=>'จ่าสิบโท','สิบเอก'=>'สิบเอก','สิบตรี'=>'สิบตรี','พลเรือเอก'=>'พลเรือเอก','พลเรือตรี'=>'พลเรือตรี',
			'นาวาโท'=>'นาวาโท','เรือเอก'=>'เรือเอก','เรือตรี'=>'เรือตรี','พันจ่าโท'=>'พันจ่าโท','จ่าเอก'=>'จ่าเอก',
			'จ่าตรี'=>'จ่าตรี','พลอากาศเอก'=>'พลอากาศเอก','พลอากาศตรี'=>'พลอากาศตรี','นาวาอากาศโท'=>'นาวาอากาศโท','เรืออากาศเอก'=>'เรืออากาศเอก',
			'เรืออากาศตรี'=>'เรืออากาศตรี','พันจ่าอากาศโท'=>'พันจ่าอากาศโท','จ่าอากาศเอก'=>'จ่าอากาศเอก','จ่าอากาศตรี'=>'จ่าอากาศตรี','พลตำรวจเอก'=>'พลตำรวจเอก',
			'พลตำรวจตรี'=>'พลตำรวจตรี','พันตำรวจโท'=>'พันตำรวจโท','ร้อยตำรวจเอก'=>'ร้อยตำรวจเอก','ร้อยตำรวจตรี'=>'ร้อยตำรวจตรี','จ่าสิบตำรวจ'=>'จ่าสิบตำรวจ',
			'สิบตำรวจโท'=>'สิบตำรวจโท','พลตำรวจ'=>'พลตำรวจ');

		return $title;
	}
}

if ( ! function_exists('dropdown_month'))
{
	function dropdown_month($key='')
	{
		$months = array('' => 'เดือน',
			'1' => 'มกราคม','2' => 'กุมภาพันธ์',
			'3' => 'มีนาคม','4' => 'เมษายน',
			'5' => 'พฤษภาคม','6' => 'มิถุนายน',
			'7' => 'กรกฎาคม','8' => 'สิงหาคม',
			'9' => 'กันยายน','10' => 'ตุลาคม',
			'11' => 'พฤศจิกายน','12' => 'ธันวาคม'
		);

		$key = ltrim($key,'0');

		if (intval($key) > 0)
			return $months[$key];

		return $months;
	}
}

if ( ! function_exists('dropdown_province'))
{
	function dropdown_province($key='')
	{
		$_ci = &get_instance();
		$_ci->load->database();
		$provinces = $_ci->db->get('province')->result_array();
		$province = array(''=>'เลือกจังหวัด');
		foreach ($provinces as $_p => $p)
		{
		  $province[$p['id']] = $p['name'];
		}

		$key = ltrim($key,'0');

		if (intval($key) > 0)
			return $province[$key];

		return $province;
	}
}

if ( ! function_exists('dropdown_amphur'))
{
	function dropdown_amphur($province_id='')
	{
		$_ci = &get_instance();
		$_ci->load->database();
		$amphurs = $_ci->db->get('amphur')->result_array();
		$amphur = array(''=>'เลือกอำเภอ');
		foreach ($amphurs as $_a => $a)
		{
		  $amphur[$a['id']] = $a['name'];
		}

		$province_id = ltrim($province_id,'0');

		if (intval($province_id) > 0)
			return $amphur[$province_id];

		return $amphur;
	}
}

if ( ! function_exists('dropdown_district'))
{
	function dropdown_district($amphur_id='')
	{
		$_ci = &get_instance();
		$_ci->load->database();
		$districts = $_ci->db->get('district')->result_array();
		$district = array(''=>'เลือกตำบล');
		foreach ($districts as $_a => $a)
		{
		  $district[$a['id']] = $a['name'];
		}

		$amphur_id = ltrim($amphur_id,'0');

		if (intval($amphur_id) > 0)
			return $district[$amphur_id];

		return $district;
	}
}

if ( ! function_exists('dropdown_worktype'))
{
	function dropdown_worktype($type_id='')
	{
		$type = array(
			''=>'เลือกรายการ',
			'ข้าราชการพลเรือน'=>'ข้าราชการพลเรือน',
			'ข้าราชการตำรวจ'=>'ข้าราชการตำรวจ',
			'ข้าราชการทหาร'=>'ข้าราชการทหาร',
			'ข้าราชการครู'=>'ข้าราชการครู',
			'ข้าราชการอัยการ'=>'ข้าราชการอัยการ',
			'ลูกจ้างประจำ'=>'ลูกจ้างประจำ',
			'พนักงานราชการ'=>'พนักงานราชการ',
			'พนักงานจ้างเหมา'=>'พนักงานจ้างเหมา',
			'พนักงาน/ลูกจ้างภาคเอกชน'=>'พนักงาน/ลูกจ้างภาคเอกชน',
			'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'=>'พนักงาน/ลูกจ้างรัฐวิสาหกิจ',
			'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน'=>'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน',
			'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง'=>'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง',
			'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'=>'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)',
			'ลูกจ้างธุรกิจในครัวเรือน'=>'ลูกจ้างธุรกิจในครัวเรือน'
		);

		$type_id = ltrim($type_id,'0');

		if (intval($type_id) > 0)
			return $type[$type_id];

		return $type;
	}
}
