<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
	'auth/auth_user' => array(
		array(
			'field' => 'password',
			'label' => 'Password user',
			'rules' => 'trim|required|min_length[6]'
		),
		array(
			'field' => 'email',
			'label' => 'Email user',
			'rules' => 'trim|required|valid_email'
		)
	),
	'auth/reg_user' => array(
		array(
			'field' => 'password',
			'label' => 'Password user',
			'rules' => 'trim|required|min_length[6]'
		),
		array(
			'field' => 'email',
			'label' => 'Email user',
			'rules' => 'trim|required|valid_email'
		)
	),
	'users/update' => array(
		array(
			'field' => 'name',
			'label' => 'User name',
			'rules' => 'trim'
		),
		array(
			'field' => 'email',
			'label' => 'User email',
			'rules' => 'trim|required|valid_email'
		),
		array(
			'field' => 'password',
			'label' => 'User password',
			'rules' => 'trim|required'
		)
	),
	'apps/create_app' => array(
		array(
			'field' => 'name',
			'label' => 'Name app',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'type',
			'label' => 'Type',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_category',
			'label' => 'Category app',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'api_key',
			'label' => 'API key.',
			'rules' => 'trim|required'
		),
		array(
			'filed' => 'description',
			'label' => 'Description app',
			'rules' => 'trim|required'
		),
		array(
			'filed' => 'img',
			'label' => 'App img',
			'rules' => 'trim'
		),
		array(
			'filed' => 'status',
			'label' => 'Status publish app',
			'rules' => 'trim|required'
		),
		array(
			'filed' => 'language',
			'label' => 'Language app.',
			'rules' => 'trim'
		),
		array(
			'filed' => 'finished',
			'label' => 'Finished app.',
			'rules' => 'trim'
		),
		array(
			'filed' => 'type',
			'label' => 'Type app.',
			'rules' => 'trim'
		)
	),
	'apps/update_app' => array(
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim'
		),
		array(
			'filed' => 'img',
			'label' => 'App img',
			'rules' => 'trim'
		),
		array(
			'field' => 'name',
			'label' => 'Name app',
			'rules' => 'trim'
		),
		array(
			'field' => 'id_category',
			'label' => 'Category app',
			'rules' => 'trim'
		),
		array(
			'field' => 'language',
			'label' => 'Language app',
			'rules' => 'trim'
		),
		array(
			'filed' => 'status',
			'label' => 'Status publish app',
			'rules' => 'trim'
		),
		array(
			'filed' => 'description',
			'label' => 'Description app',
			'rules' => 'trim'
		)
	),
	'apps/delete_app' => array(
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim'
		)
	),
	'icons/add_icon_app' => array(
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_icon',
			'label' => 'Icon ID',
			'rules' => 'trim|required'
		)
	),
	'icons/delete_icon_app' => array(
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_icon',
			'label' => 'Icon ID',
			'rules' => 'trim|required'
		)
	),
	'files/add_file' => array(
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'file_name',
			'label' => 'Icon ID',
			'rules' => 'trim|required'
		)
	),
	'files/delete_file' => array(
		array(
			'field' => 'id_file',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_app',
			'label' => 'Icon ID',
			'rules' => 'trim|required'
		)
	),
	'files/update_file' => array(
		array(
			'field' => 'id_file',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'file_name',
			'label' => 'Icon ID',
			'rules' => 'trim|required'
		)
	),
	'files/get_data_file' => array(
		array(
			'field' => 'id_file',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'file_name',
			'label' => 'Icon ID',
			'rules' => 'trim|required'
		)
	),
	'files/save_data_file' => array(
		array(
			'field' => 'id_file',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'id_app',
			'label' => 'App ID',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'file_name',
			'label' => 'Icon ID',
			'rules' => 'trim|required'
		)
	)
);