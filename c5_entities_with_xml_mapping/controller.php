<?php
namespace Concrete\Package\C5EntitiesWithXmlMapping;

use Concrete\Core\Database\EntityManager\Provider\XmlProvider;
use Concrete\Core\Package\Package;
use Concrete\Core\Database\EntityManager\Provider\ProviderInterface;

defined('C5_EXECUTE') or die(_("Access Denied."));

/**
 * Controller test addon - testing metadatadriver with legacy annotation driver
 *
 * @author markus.liechti
 */
class Controller extends Package implements ProviderInterface{

    protected $pkgHandle = 'c5_entities_with_xml_mapping';
    protected $appVersionRequired = '8.0.0';
    protected $pkgVersion = '0.0.1';

    public function getPackageDescription() {
        return t("Example package registers doctrine entities with xml mapping information.");
    }

    public function getPackageName(){
        return t("Example package registers entities with a xml driver.");
    }
    
    /**
     * Return customized metadata driver wrapped in a XMLProvider for doctrine orm
     * Path: {package}/config/xml
     * 
     * @return XmlProvider
     */
    public function getDrivers(){
        
        $xmlProvider = new XmlProvider($this);
        return $xmlProvider->getDrivers();
    }

}