<?php
$tempColumns = array (
  'tx_heaccordion_elements' => 
  array (
    'config' => 
    array (
      'type' => 'inline',
      'foreign_table' => 'tx_heaccordion_elements',
      'foreign_field' => 'parentid',
      'foreign_table_field' => 'parenttable',
      'foreign_sortby' => 'sorting',
      'appearance' => 
      array (
        'enabledControls' => 
        array (
          'dragdrop' => '1',
        ),
        'levelLinksPosition' => 'top',
      ),
      'behaviour' => 
      array (
        'localizationMode' => 'select',
      ),
    ),
    'exclude' => '1',
    'label' => 'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.tx_heaccordion_elements',
  ),
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = array(
    'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.CType.heaccordion_akkordeon',
    'heaccordion_akkordeon',
);
$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = array(
    'LLL:EXT:he_accordion/Resources/Private/Language/locallang_db.xlf:tt_content.CType.heaccordion_element',
    'heaccordion_element',
);
$tempTypes = array (
  'heaccordion_akkordeon' => 
  array (
    'columnsOverrides' => 
    array (
      'bodytext' => 
      array (
        'defaultExtras' => 'richtext:rte_transform[mode=ts_css]',
      ),
    ),
    'showitem' => '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,tx_heaccordion_elements,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories',
  ),
  'heaccordion_element' => 
  array (
    'columnsOverrides' => 
    array (
      'bodytext' => 
      array (
        'defaultExtras' => 'richtext:rte_transform[mode=ts_css]',
      ),
    ),
    'showitem' => '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,tx_heaccordion_elements,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,categories',
  ),
);
$GLOBALS['TCA']['tt_content']['types'] += $tempTypes;
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'he_accordion',
    'Configuration/TypoScript/',
    'he_accordion'
);
