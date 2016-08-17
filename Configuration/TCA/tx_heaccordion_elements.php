<?php
return [
	'ctrl' =>
		[
			'title' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements',
			'label' => 'tx_heaccordion_title',
			'tstamp' => 'tstamp',
			'crdate' => 'crdate',
			'cruser_id' => 'cruser_id',
			'dividers2tabs' => true,
			'versioningWS' => 2,
			'versioning_followPages' => true,
			'languageField' => 'sys_language_uid',
			'transOrigPointerField' => 'l10n_parent',
			'transOrigDiffSourceField' => 'l10n_diffsource',
			'delete' => 'deleted',
			'enablecolumns' =>
				[
					'disabled' => 'hidden',
					'starttime' => 'starttime',
					'endtime' => 'endtime',
				],
			'searchFields' => 'tx_heaccordion_title,tx_heaccordion_subtitle,tx_heaccordion_description,tx_heaccordion_media,tx_heaccordion_preview_image,tx_heaccordion_link,tx_heaccordion_linktext',
			'dynamicConfigFile' => '',
			'iconfile' => 'EXT:he_accordion/Resources/Public/Icons/ext_icon.gif',
			'type' => 'type',
			'hideTable' => true,
		],
	'interface' =>
		[
			'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, tx_heaccordion_title, tx_heaccordion_subtitle, tx_heaccordion_description, tx_heaccordion_media, tx_heaccordion_preview_image, tx_heaccordion_link, tx_heaccordion_linktext',
		],
	'types' => [
		'0' => ['showitem' => 'type, --palette--;;paletteCore,  --div--; Medien,--palette--;;paletteImage, --div--; Links, --palette--;;paletteLink, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
		'1' => ['showitem' => 'type, --palette--;;paletteCore, --div--; Medien, --palette--;;paletteVideo, --div--; Links, --palette--;;paletteLink, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
		'2' => ['showitem' => 'type, tx_heaccordion_title, tx_heaccordion_children'],
	],
	'palettes' =>
		[
			'paletteCore' => [
				'showitem' => 'tx_heaccordion_title, --linebreak--,tx_heaccordion_subtitle, --linebreak--, tx_heaccordion_description,',
				'canNotCollapse' => false
			],
			'paletteImage' => [
				'showitem' => 'tx_heaccordion_media,',
				'canNotCollapse' => false
			],
			'paletteVideo' => [
				'showitem' => 'tx_heaccordion_media,--linebreak--,tx_heaccordion_preview_image,',
				'canNotCollapse' => false
			],
			'paletteLink' => [
				'showitem' => 'tx_heaccordion_link, --linebreak--, tx_heaccordion_linktext,',
				'canNotCollapse' => false
			],
		],
	'columns' =>
		[
			'type' => [
				'exclude' => 0,
				'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.doktype_formlabel',
				'config' => [
					'type' => 'select',
					'renderType' => 'selectSingle',
					'items' => [
						['Element mit Grafik', 0],
						['Element mit Video', 1],
						['Unter-Akkordeon', 2],
					],
					'size' => 1,
					'maxitems' => 1,
				]
			],
			'tx_heaccordion_children' =>
				[
					'config' =>
						[
							'type' => 'inline',
							'foreign_table' => 'tx_heaccordion_elements',
							'foreign_field' => 'subaccordion_parentid',
							'foreign_sortby' => 'sorting',
							'appearance' =>
								[
									'enabledControls' =>
										[
											'dragdrop' => '1',
										],
									'levelLinksPosition' => 'top',
								],
							'behaviour' =>
								[
									'localizationMode' => 'select',
								],
						],
					'exclude' => '1',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.tx_heaccordion_elements',
				],
			'subaccordion_parentid' => [
				'config' => [
					'type' => 'passthrough',
				],
			],
			'sys_language_uid' =>
				[
					'exclude' => 1,
					'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
					'config' =>
						[
							'type' => 'select',
							'renderType' => 'selectSingle',
							'foreign_table' => 'sys_language',
							'foreign_table_where' => 'ORDER BY sys_language.title',
							'items' =>
								[
									0 =>
										[
											0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
											1 => -1,
										],
									1 =>
										[
											0 => 'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
											1 => 0,
										],
								],
						],
				],
			'l10n_parent' =>
				[
					'displayCond' => 'FIELD:sys_language_uid:>:0',
					'exclude' => 1,
					'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
					'config' =>
						[
							'type' => 'select',
							'renderType' => 'selectSingle',
							'items' =>
								[
									0 =>
										[
											0 => '',
											1 => 0,
										],
								],
							'foreign_table' => 'tx_heaccordion_elements',
							'foreign_table_where' => 'AND tx_heaccordion_elements.pid=###CURRENT_PID### AND tx_heaccordion_elements.sys_language_uid IN (-1,0)',
						],
				],
			'l10n_diffsource' =>
				[
					'config' =>
						[
							'type' => 'passthrough',
						],
				],
			't3ver_label' =>
				[
					'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
					'config' =>
						[
							'type' => 'input',
							'size' => 30,
							'max' => 255,
						],
				],
			'hidden' =>
				[
					'exclude' => 1,
					'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
					'config' =>
						[
							'type' => 'check',
						],
				],
			'starttime' =>
				[
					'exclude' => 1,
					'l10n_mode' => 'mergeIfNotBlank',
					'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
					'config' =>
						[
							'type' => 'input',
							'size' => 13,
							'max' => 20,
							'eval' => 'datetime',
							'checkbox' => 0,
							'default' => 0,
							'range' =>
								[
									'lower' => 1470952800,
								],
						],
				],
			'endtime' =>
				[
					'exclude' => 1,
					'l10n_mode' => 'mergeIfNotBlank',
					'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
					'config' =>
						[
							'type' => 'input',
							'size' => 13,
							'max' => 20,
							'eval' => 'datetime',
							'checkbox' => 0,
							'default' => 0,
							'range' =>
								[
									'lower' => 1470952800,
								],
						],
				],
			'parentid' =>
				[
					'config' =>
						[
							'type' => 'select',
							'renderType' => 'selectSingle',
							'items' =>
								[
									0 =>
										[
											0 => '',
											1 => 0,
										],
								],
							'foreign_table' => 'tt_content',
							'foreign_table_where' => 'AND tt_content.pid=###CURRENT_PID### AND tt_content.sys_language_uid IN (-1,###REC_FIELD_sys_language_uid###)',
						],
				],
			'parenttable' =>
				[
					'config' =>
						[
							'type' => 'passthrough',
						],
				],
			'sorting' =>
				[
					'config' =>
						[
							'type' => 'passthrough',
						],
				],
			'tx_heaccordion_title' =>
				[
					'config' =>
						[
							'type' => 'input',
						],
					'exclude' => '1',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements.tx_heaccordion_title',
				],
			'tx_heaccordion_subtitle' =>
				[
					'config' =>
						[
							'type' => 'text',
						],
					'exclude' => '1',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements.tx_heaccordion_subtitle',
				],
			'tx_heaccordion_description' =>
				[
					'config' =>
						[
							'type' => 'text',
						],
					'exclude' => '1',
					'defaultExtras' => 'richtext[]:rte_transform[mode=ts_css]',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements.tx_heaccordion_description',
				],
			'tx_heaccordion_media' =>
				[
					'config' =>
						[
							'type' => 'inline',
							'foreign_table' => 'sys_file_reference',
							'foreign_field' => 'uid_foreign',
							'foreign_sortby' => 'sorting_foreign',
							'foreign_table_field' => 'tablenames',
							'foreign_match_fields' =>
								[
									'fieldname' => 'tx_heaccordion_media',
								],
							'foreign_label' => 'uid_local',
							'foreign_selector' => 'uid_local',
							'foreign_selector_fieldTcaOverride' =>
								[
									'config' =>
										[
											'appearance' =>
												[
													'elementBrowserType' => 'file',
													'elementBrowserAllowed' => 'flv,mp4,youtube,png,jpg,gif',
												],
										],
								],
							'filter' =>
								[
									0 =>
										[
											'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
											'parameters' =>
												[
													'allowedFileExtensions' => 'flv,mp4,youtube,png,jpg,gif',
												],
										],
								],
							'appearance' =>
								[
									'headerThumbnail' =>
										[
											'field' => 'uid_local',
											'width' => '45',
											'height' => '45c',
										],
									'enabledControls' =>
										[
											'info' => 'tx_heaccordion_media',
											'dragdrop' => 'tx_heaccordion_media',
											'hide' => 'tx_heaccordion_media',
											'delete' => 'tx_heaccordion_media',
											'localize' => 'tx_heaccordion_media',
										],
									'fileUploadAllowed' => 'false',
								],
							'behaviour' =>
								[
									'localizationMode' => 'select',
									'localizeChildrenAtParentLocalization' => 'tx_heaccordion_media',
								],
							'foreign_types' =>
								[
									0 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									1 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									2 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									3 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									4 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									5 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
								],
							'maxitems' => '1',
						],
					'exclude' => '1',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements.tx_heaccordion_media',
				],
			'tx_heaccordion_preview_image' =>
				[
					'config' =>
						[
							'type' => 'inline',
							'foreign_table' => 'sys_file_reference',
							'foreign_field' => 'uid_foreign',
							'foreign_sortby' => 'sorting_foreign',
							'foreign_table_field' => 'tablenames',
							'foreign_match_fields' =>
								[
									'fieldname' => 'tx_heaccordion_preview_image',
								],
							'foreign_label' => 'uid_local',
							'foreign_selector' => 'uid_local',
							'foreign_selector_fieldTcaOverride' =>
								[
									'config' =>
										[
											'appearance' =>
												[
													'elementBrowserType' => 'file',
													'elementBrowserAllowed' => 'png,jpg,gif',
												],
										],
								],
							'filter' =>
								[
									0 =>
										[
											'userFunc' => 'TYPO3\\CMS\\Core\\Resource\\Filter\\FileExtensionFilter->filterInlineChildren',
											'parameters' =>
												[
													'allowedFileExtensions' => 'png,jpg,gif',
												],
										],
								],
							'appearance' =>
								[
									'headerThumbnail' =>
										[
											'field' => 'uid_local',
											'width' => '45',
											'height' => '45c',
										],
									'enabledControls' =>
										[
											'info' => 'tx_heaccordion_preview_image',
											'dragdrop' => 'tx_heaccordion_preview_image',
											'hide' => 'tx_heaccordion_preview_image',
											'delete' => 'tx_heaccordion_preview_image',
											'localize' => 'tx_heaccordion_preview_image',
										],
									'fileUploadAllowed' => 'false',
								],
							'behaviour' =>
								[
									'localizationMode' => 'select',
									'localizeChildrenAtParentLocalization' => 'tx_heaccordion_preview_image',
								],
							'foreign_types' =>
								[
									0 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									1 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									2 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									3 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									4 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
									5 =>
										[
											'showitem' => '--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette, --palette--;;filePalette',
										],
								],
							'maxitems' => '1',
						],
					'exclude' => '1',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements.tx_heaccordion_preview_image',
				],
			'tx_heaccordion_link' =>
				[
					'config' =>
						[
							'type' => 'input',
							'wizards' =>
								[
									'_PADDING' => '2',
									'link' =>
										[
											'type' => 'popup',
											'title' => 'Link',
											'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_link.gif',
											'module' =>
												[
													'name' => 'wizard_link',
													'urlParameters' =>
														[
															'mode' => 'wizard',
														],
												],
											'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
										],
								],
						],
					'exclude' => '1',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements.tx_heaccordion_link',
				],
			'tx_heaccordion_linktext' =>
				[
					'config' =>
						[
							'type' => 'input',
						],
					'exclude' => '1',
					'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tx_heaccordion_elements.tx_heaccordion_linktext',
				],
		],
];