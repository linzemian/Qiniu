<?php
return array(
	//'配置项'=>'配置值'
	
	//七牛存储配置
	'UPLOAD_FILE_QINIU'     => array (

		//文件大小
		'maxSize'           => 500 * 1024 * 1024,
		'rootPath'          => './',
		'saveName' => array ('uniqid', ''),
		
		//子目录
		// 'savePath'       => 
		'exts'            => ['zip', 'rar', 'txt', 'doc', 'docx', 'xlsx', 'xls', 'pptx', 'pdf', 'chf', 'mp4', 'wmv' ,'jpg', 'png', 'jpeg', 'gif'],


		'driver'   => 'Qiniu',
		'driverConfig'      => array (
			//七牛SK
			'secrectKey' => '',

			//七牛AK
			'accessKey' => '',

			//七牛提供的域名
			'domain'    =>  '',

			//空间名称
			'bucket'   => '',
		),

	),
);
