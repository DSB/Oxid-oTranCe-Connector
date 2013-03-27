<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'otrance-connector',
    'title'       => 'oTranCe Connector',
    'url'         => 'http://www.otrance.org',
    'description' => array(
        'en' => 'Connects to a oTranCe installation. <br>A button in the frontend offers to send a list of currently '
                . 'used texts on the page to oTranCe where you can change them.<br>A working installation of oTranCe is'
                . ' needed. The url to it must be provided here in the settings.',
        'de' => 'Verbindet sich zu einer oTranCe Installation.<br>Ein Button im Frontend erlaubt das Senden '
                . 'der aktuell angezeigten Sprachschlüssel an oTranCe, wo die Texte geändert werden können.<br>'
                . 'Erfordert eine eigenständige Installation von oTranCe. Der Url dorthin muss hier in den Einstellungen'
                . ' angegeben werden.'
    ,
    ),
    'lang'        => 'en',
    'version'     => '1.0.1',
    'author'      => 'Daniel Schlichtholz',
    'email'       => 'admin@mysqldumper.de',
    'thumbnail'   => 'thumb.png',
    'extend'      => array(
        'oxLang'       => 'otrance-connector/core/otc_otcLang_oxLang',
        'oxViewConfig' => 'otrance-connector/core/otc_otcViewConfig_oxViewConfig',
    ),
    'blocks'      => array(
        // add our css file
        array('template' => 'layout/base.tpl',
              'block'    => 'base_style',
              'file'     => 'application/views/blocks/base_style.tpl'
        ),
        // add our "translate"-div to the footer
        array('template' => 'layout/footer.tpl',
              'block'    => 'footer_main',
              'file'     => 'application/views/blocks/footer_main.tpl'
        ),
    ),
    'settings'    => array(
        array('group' => 'OTRANCE_CONNECTOR',
              'name'  => 'sOtcServerUrl',
              'type'  => 'str',
              'value' => 'http://www.yourDomain.de/oTrance/'),
        array('group' => 'OTRANCE_CONNECTOR',
              'name'  => 'aOtcIgnoreKeys',
              'type'  => 'aarr',
              'value' => array('charset', '_aSeoReplaceChars', 'TRANSLATE_USING_OTC')),
    )
);