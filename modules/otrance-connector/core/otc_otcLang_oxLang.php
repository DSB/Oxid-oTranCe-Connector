<?php
/**
 * This file is part of the module oTranCe Connector
 *
 * @package         Modules
 * @subpackage      oTranCe-Connector
 * @version         1.0
 * @author          Daniel Schlichtholz <admin@mysqldumper.de>
 */
/**
 * Class otc_otcLang_oxLang
 * Class extends oxLang to hold a list of all translated keys on the current page.
 *
 * @package         Modules
 * @subpackage      oTranCe-Connector
 */
class otc_otcLang_oxLang extends otc_otcLang_oxLang_parent
{
    /**
     * Will hold all translated keys and their translation for this request
     *
     * @var array
     */
    protected $_aStrings = array();

    /**
     * Will hold Oxids lang-mapping array. Used for caching.
     *
     * @var array
     */
    protected $_aMap;

    /**
     * Will hold the language keys that should be ignored
     *
     * @var array
     */
    protected $_aIgnoreKeys;

    /**
     * Searches for translation string in file and on success returns translation,
     * otherwise returns initial string.
     *
     * @param string $sStringToTranslate Initial string
     * @param int    $iLang              optional language number
     * @param bool   $blAdminMode        on special case you can force mode, to load language constant from admin/shops language file
     *
     * @throws oxLanguageException in debug mode
     *
     * @return string
     */
    public function translateString($sStringToTranslate, $iLang = null, $blAdminMode = null)
    {
        if ($this->_aMap === null) {
            $this->_aMap        = $this->_getLanguageMap($iLang, $blAdminMode);
            $this->_aIgnoreKeys = oxRegistry::getConfig()->getConfigParam('aOtcIgnoreKeys');
        }

        $sKey              = $sStringToTranslate;
        $sStringTranslated = parent::translateString($sStringToTranslate, $iLang, $blAdminMode);

        // new we need to check if the key is mapped to another key. In that case we need to get the mapped key.
        if (isset($this->_aMap[$sKey])) {
            $sKey = $this->_aMap[$sKey];
        }

        // add key to our list if it is not in the ignore list
        if (!in_array($sKey, $this->_aIgnoreKeys)) {
            $this->_aStrings["$sKey"] = $sStringTranslated;
        }

        return $sStringTranslated;
    }

    /**
     * Get the list of translated keys.
     *
     * @return array
     */
    public function getTranslatedKeys()
    {
        // oTranCe expects utf-8 encoded values. If shop is not running in utf-8 convert keys to utf-8.
        $sCharsetEncoding  = $this->translateString('charset');
        $aConvertedStrings = $this->_aStrings;
        if (strtolower($sCharsetEncoding) != 'utf-8') {
            $aConvertedStrings = $this->_recodeLangArray($this->_aStrings, $sCharsetEncoding, true);
        }

        return $aConvertedStrings;
    }
}