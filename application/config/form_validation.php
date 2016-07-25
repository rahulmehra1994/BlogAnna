<?php

$config= [

'addarticle_rules'=>[
						[
							'field'=>'title',
							'label'=>'Article Title',
							'rules'=>'required|alphadash'
						],

						[
							'field'=>'body',
							'label'=>'Article Body',
							'rules'=>'required'
						]


					  ],

'adminlogin_rules'=>[
						[
							'field'=>'u',
							'label'=>'Username',
							'rules'=>'required|alpha|trim'
						],

						[
							'field'=>'p',
							'label'=>'password',
							'rules'=>'required'
						]


					  ]



						
];






?>