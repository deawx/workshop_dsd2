<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'This form post did not pass our security checks.';

// Login
$lang['login_heading']         = 'เข้าสู่ระบบ';
$lang['login_subheading']      = 'กรุณากรอกข้อมูลยุสเซอร์เนมและรหัสผ่านด้านล่างนี้.';
$lang['login_identity_label']  = 'อีเมล์หรือชื่อผู้ใช้:';
$lang['login_password_label']  = 'รหัสผ่าน:';
$lang['login_remember_label']  = 'จดจำการเข้าใช้งานนี้:';
$lang['login_submit_btn']      = 'ล็อกอิน';
$lang['login_forgot_password'] = 'ลืมรหัสผ่าน ?';

// Index
$lang['index_heading']           = 'Users';
$lang['index_subheading']        = 'ด้านล่างนี้คือข้อมูลสำหรับบัญชึของคุณ';
$lang['index_fname_th']          = 'ชื่อ';
$lang['index_lname_th']          = 'นามสกุล';
$lang['index_email_th']          = 'อีเมล์';
$lang['index_groups_th']         = 'กลุ่ม';
$lang['index_status_th']         = 'สถานะ';
$lang['index_action_th']         = 'แอคชั่น';
$lang['index_active_link']       = 'แอคทีฟ';
$lang['index_inactive_link']     = 'อินแอคทีฟ';
$lang['index_create_user_link']  = 'สร้างผู้ใช้ใหม่';
$lang['index_create_group_link'] = 'สร้างกลุ่มใหม่';

// Deactivate User
$lang['deactivate_heading']                  = 'ปิดการทำงานผู้ใช้';
$lang['deactivate_subheading']               = 'คุณต้องการปิดกระทำงานของผู้ใช้นี้ \'%s\'';
$lang['deactivate_confirm_y_label']          = 'ใช่:';
$lang['deactivate_confirm_n_label']          = 'ไม่:';
$lang['deactivate_submit_btn']               = 'ยอมรับ';
$lang['deactivate_validation_confirm_label'] = 'ยืนยัน';
$lang['deactivate_validation_user_id_label'] = 'ยุสเซอร์ไอดี';

// Create User
$lang['create_user_heading']                           = 'สร้างบัญชีผู้ใช้';
$lang['create_user_subheading']                        = 'กรุณากรอกข้อมูลผู้ใช้ด้านล่างนี้.';
$lang['create_user_fname_label']                       = 'ชื่อ:';
$lang['create_user_lname_label']                       = 'นามสกุล:';
$lang['create_user_company_label']                     = 'ชื่อองค์กร:';
$lang['create_user_email_label']                       = 'อีเมล์:';
$lang['create_user_username_label']                    = 'ยุสเซอร์เนม:';
$lang['create_user_phone_label']                       = 'เบอร์โทรศัพท์:';
$lang['create_user_password_label']                    = 'รหัสผ่าน:';
$lang['create_user_password_confirm_label']            = 'ยืนยันรหัสผ่าน:';
$lang['create_user_submit_btn']                        = 'สร้างผู้ใช้';
$lang['create_user_validation_fname_label']            = 'ชื่อ';
$lang['create_user_validation_lname_label']            = 'นามสกุล';
$lang['create_user_validation_email_label']            = 'อีเมล์';
$lang['create_user_validation_phone1_label']           = 'First Part of Phone';
$lang['create_user_validation_phone2_label']           = 'Second Part of Phone';
$lang['create_user_validation_phone3_label']           = 'Third Part of Phone';
$lang['create_user_validation_company_label']          = 'ชื่อองค์กร';
$lang['create_user_validation_password_label']         = 'รหัสผ่าน';
$lang['create_user_validation_password_confirm_label'] = 'ยืนยันรหัสผ่าน';

// Edit User
$lang['edit_user_heading']                           = 'แก้ไขข้อมูลผู้ใช้';
$lang['edit_user_subheading']                        = 'กรุณากรอกข้อมูลผู้ใช้ด้านล่างนี้.';
$lang['edit_user_fname_label']                       = 'ชื่อ:';
$lang['edit_user_lname_label']                       = 'นามสกุล:';
$lang['edit_user_company_label']                     = 'ชื่อองค์กร:';
$lang['edit_user_email_label']                       = 'อีเมล์:';
$lang['edit_user_phone_label']                       = 'เบอร์โทรศัพท์:';
$lang['edit_user_password_label']                    = 'รหัสผ่าน: (if changing password)';
$lang['edit_user_password_confirm_label']            = 'ยืนยันรหัสผ่าน: (if changing password)';
$lang['edit_user_groups_heading']                    = 'Member of groups';
$lang['edit_user_submit_btn']                        = 'บันทึกข้อมูลผู้ใช้';
$lang['edit_user_validation_fname_label']            = 'ชื่อ';
$lang['edit_user_validation_lname_label']            = 'นามสกุล';
$lang['edit_user_validation_email_label']            = 'อีเมล์';
$lang['edit_user_validation_phone1_label']           = 'First Part of Phone';
$lang['edit_user_validation_phone2_label']           = 'Second Part of Phone';
$lang['edit_user_validation_phone3_label']           = 'Third Part of Phone';
$lang['edit_user_validation_company_label']          = 'ชื่อองค์กร';
$lang['edit_user_validation_groups_label']           = 'กลุ่ม';
$lang['edit_user_validation_password_label']         = 'รหัสผ่าน';
$lang['edit_user_validation_password_confirm_label'] = 'ยืนยันรหัสผ่าน';

// Create Group
$lang['create_group_title']                  = 'Create Group';
$lang['create_group_heading']                = 'Create Group';
$lang['create_group_subheading']             = 'Please enter the group information below.';
$lang['create_group_name_label']             = 'Group Name:';
$lang['create_group_desc_label']             = 'Description:';
$lang['create_group_submit_btn']             = 'Create Group';
$lang['create_group_validation_name_label']  = 'Group Name';
$lang['create_group_validation_desc_label']  = 'Description';

// Edit Group
$lang['edit_group_title']                  = 'Edit Group';
$lang['edit_group_saved']                  = 'Group Saved';
$lang['edit_group_heading']                = 'Edit Group';
$lang['edit_group_subheading']             = 'Please enter the group information below.';
$lang['edit_group_name_label']             = 'Group Name:';
$lang['edit_group_desc_label']             = 'Description:';
$lang['edit_group_submit_btn']             = 'Save Group';
$lang['edit_group_validation_name_label']  = 'Group Name';
$lang['edit_group_validation_desc_label']  = 'Description';

// Change Password
$lang['change_password_heading']                               = 'Change Password';
$lang['change_password_old_password_label']                    = 'Old Password:';
$lang['change_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['change_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['change_password_submit_btn']                            = 'Change';
$lang['change_password_validation_old_password_label']         = 'Old Password';
$lang['change_password_validation_new_password_label']         = 'New Password';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirm New Password';

// Forgot Password
$lang['forgot_password_heading']                 = 'ลืมรหัสผ่าน';
$lang['forgot_password_subheading']              = 'กรุณากรอก %s เพื่อให้ระบบทำการส่งอีเมล์ไปถึง.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'ยืนยัน';
$lang['forgot_password_validation_email_label']  = 'อีเมล์';
$lang['forgot_password_username_identity_label'] = 'ชื่อผู้ใช้';
$lang['forgot_password_email_identity_label']    = 'อีเมล์';
$lang['forgot_password_email_not_found']         = 'ไม่มีข้อมูลอีเมล์นี้.';

// Reset Password
$lang['reset_password_heading']                               = 'Change Password';
$lang['reset_password_new_password_label']                    = 'New Password (at least %s characters long):';
$lang['reset_password_new_password_confirm_label']            = 'Confirm New Password:';
$lang['reset_password_submit_btn']                            = 'Change';
$lang['reset_password_validation_new_password_label']         = 'New Password';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirm New Password';
