<?php
if(strpos($_SERVER['REQUEST_URI'], 'backend') !== false) {
	$routes = array(
		'/backend/'			=> 'backend/index',
		'/backend/login/'	=> 'users/access/login',
		'/backend/logout/'	=> 'users/access/logout',
	);
	
	$modules = array('users','urls','gii');
	foreach ($modules as $module) {
		$routes = CMap::mergeArray($routes, array(
			'backend/' . $module							=> $module . '/' . $module . 'Backend/index',
			'backend/' . $module . '/<action:\w+>'			=> $module . '/' . $module . 'Backend/<action>',
			'backend/' . $module . '/<action:\w+>/<id:\d+>'	=> $module . '/' . $module . 'Backend/<action>',			
		));
	}

	return $routes;
} else {
	return array(
		'/' => 'frontend/index',
		'<hash:[abcdefghjkmnpqrstuvwxyz23456789ABCDEFGHJKMNPQRSTUVWXYZ]{6}>' => 'frontend/redirect'
	);
}
?>
