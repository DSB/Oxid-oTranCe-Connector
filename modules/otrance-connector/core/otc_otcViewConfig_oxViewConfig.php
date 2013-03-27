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
 * Class otc_otcViewConfig_oxViewConfig
 * Class extends oxViewConfig and adds some template getters needed for this module.
 *
 * @package         Modules
 * @subpackage      oTranCe-Connector
 */
class otc_otcViewConfig_oxViewConfig extends otc_otcViewConfig_oxViewConfig_parent
{
    /**
     * @var string
     */
    public $sThemeName;

    /**
     * Get list of translated keys and their translations
     *
     * @return array
     */
    public function getTranslatedKeys()
    {
        /**
         * @var otc_otcLang_oxLang $oLang
         */
        $oLang = oxRegistry::getLang();

        return $oLang->getTranslatedKeys();
    }

    /**
     * Get oTranCe base url from module config
     *
     * @return string
     */
    public function getOtranCeUrl()
    {
        return oxRegistry::getConfig()->getConfigParam('sOtcServerUrl');
    }

    /**
     * Get absolute url of css for active theme
     *
     * @return string
     */
    public function getOtranceCssUrl()
    {
        $file = 'out/' . $this->getThemeName() . '/src/css/otrance-connector.css';

        return $this->getOtranceConnectorModuleUrl($file);
    }

    /**
     * Get absolute url of js inside the module folder
     *
     * @return string
     */
    public function getOtranceJsUrl()
    {
        $file = 'out/' . $this->getThemeName() . '/src/js/otrance-connector.js';

        return $this->getOtranceConnectorModuleUrl($file);
    }

    /**
     * Get active theme name
     *
     * @return string
     */
    protected function getThemeName()
    {
        if ($this->sThemeName !== null) {
            return $this->sThemeName;
        }

        $oTheme           = oxNew('oxTheme');
        $this->sThemeName = $oTheme->getActiveThemeId();

        return $this->sThemeName;
    }

    /**
     * Get absolute url to a file inside the module folder
     *
     * @param string $file
     *
     * @return string
     */
    protected function getOtranceConnectorModuleUrl($file)
    {
        return $this->getModuleUrl('otrance-connector', $file);
    }

}
