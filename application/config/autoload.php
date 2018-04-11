<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('form_validation','session','database','upload','image_lib','user_agent','pagination');

$autoload['drivers'] = array('session');

$autoload['helper'] = array('url','html','array','date','text','number','language');

$autoload['config'] = array();

$autoload['language'] = array('auth','ion_auth');

$autoload['model'] = array('profile_model');
