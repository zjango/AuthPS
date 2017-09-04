<?php
return [

	'identified_by' => ['username', 'email'],

	// The Super Admin role
	// (returns true for all permissions)
	'super_admin' => 'Super Admin',

	// DB prefix for tables
	'prefix' => '',

	// Define Models if you extend them
	'models' => [
		'user' => 'Zjango\Verify\Models\User',
		'role' => 'Zjango\Verify\Models\Role',
		'permission' => 'Zjango\Verify\Models\Permission',
	],

	'crud_permissions' => [
		'create_', 'read_', 'update_', 'delete_'
	]

];
