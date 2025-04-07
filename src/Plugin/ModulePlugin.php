<?php

namespace Hyva\DotdigitalgroupChat\Plugin;

use Composer\InstalledVersions;
use Dotdigitalgroup\Email\Model\Connector\Module;

class ModulePlugin
{
    public const MODULE_DESCRIPTION = 'Hyvä Themes Compatibility module for Dotdigitalgroup_Chat';

    /**
     * Before fetch active module details
     *
     * @param Module $module
     * @param array $modules
     * @return array
     */
    public function beforeFetchActiveModules(Module $module, array $modules = [])
    {
        $modules[] = [
            'name' => self::MODULE_DESCRIPTION,
            'version' => InstalledVersions::getPrettyVersion('dotdigital/magento2-hyva-dotdigitalgroup-chat')
        ];
        return [
            $modules
        ];
    }
}
