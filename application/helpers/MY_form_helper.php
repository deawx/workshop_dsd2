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
		$provinces = $_ci->db->order_by('CONVERT (name USING tis620) ASC')->get('province')->result_array();
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
		$amphurs = $_ci->db->order_by('CONVERT (name USING tis620) ASC')->get('amphur')->result_array();
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
		$districts = $_ci->db->order_by('CONVERT (name USING tis620) ASC')->get('district')->result_array();
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

		$type_id = (string)$type_id;

		if ($type_id)
			return $type[$type_id];

		return $type;
	}
}

if ( ! function_exists('dropdown_workcategory'))
{
	function dropdown_workcategory($category_id='')
	{
		$category = array(
			''=>'เลือกรายการ',
			'ทำงานภาครัฐ'=>'ทำงานภาครัฐ',
			'ทำงานภาคเอกชน'=>'ทำงานภาคเอกชน',
			'ทำงานรัฐวิสาหกิจ'=>'ทำงานรัฐวิสาหกิจ',
			'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ'=>'ประกอบธุรกิจส่วนตัว/ประกอบอาชีพอิสระ',
			'ช่วยธุรกิจครัวเรือน'=>'ช่วยธุรกิจครัวเรือน'
		);

		$category_id = (string)$category_id;

		if ($category_id)
			return $category[$category_id];

		return $category;
	}
}

if ( ! function_exists('dropdown_workgroup'))
{
	function dropdown_workgroup($group_id='')
	{
		$group = array(
			'ยานยนต์และชิ้นส่วน'=>'ยานยนต์และชิ้นส่วน','เหล็กและเหล็กกล้า'=>'เหล็กและเหล็กกล้า',
			'เฟอร์นิเจอร์'=>'เฟอร์นิเจอร์','อาหาร'=>'อาหาร','ซอฟต์แวร์'=>'ซอฟต์แวร์',
			'ปิโตรเคมี'=>'ปิโตรเคมี','ไฟฟ้าและอิเล็กทรอนิกส์'=>'ไฟฟ้าและอิเล็กทรอนิกส์',
			'สิ่งทอและแฟชั่น'=>'สิ่งทอและแฟชั่น','เซรามิกส์'=>'เซรามิกส์','แม่พิมพ์'=>'แม่พิมพ์',
			'ก่อสร้าง'=>'ก่อสร้าง','โลจิสติกส์'=>'โลจิสติกส์','ท่องเที่ยวและบริการ'=>'ท่องเที่ยวและบริการ',
			'ผลิตภัณฑ์ยาง'=>'ผลิตภัณฑ์ยาง'
		);

		$group_id = (string)$group_id;

		if ($group_id)
			return $group[$group_id];

		return $group;
	}
}

if ( ! function_exists('dropdown_income_amount'))
{
	function dropdown_income_amount($income_id='')
	{
		$income = array(
			''=>'เลือกรายการ',
			'1-5,000 บาท'=>'1-5,000 บาท',
			'5,001-9,000 บาท'=>'5,001-9,000 บาท',
			'9,001-15,000 บาท'=>'9,001-15,000 บาท',
			'15,001-20,000 บาท'=>'15,001-20,000 บาท',
			'20,001-30,000 บาท'=>'20,001-30,000 บาท',
			'30,001-40,000 บาท'=>'30,001-40,000 บาท',
			'40,001 บาทขึ้นไป'=>'40,001 บาทขึ้นไป'
		);

		$income_id = (string)$income_id;

		if ($income_id)
			return $income[$income_id];

		return $income;
	}
}
