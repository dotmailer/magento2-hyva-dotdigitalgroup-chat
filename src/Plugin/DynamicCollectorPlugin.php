<?php

namespace Hyva\DotdigitalgroupChat\Plugin;

use Magento\Csp\Model\Collector\DynamicCollector;
use Magento\Csp\Model\Policy\FetchPolicy;

class DynamicCollectorPlugin
{
    private $hashAdded = false;

    public function beforeCollect(DynamicCollector $subject): void
    {
        if (!$this->hashAdded) {
            $subject->add(
                new FetchPolicy(
                    'script-src',
                    false, /* noneAllowed */
                    [], /* hostSources */
                    [], /* schemeSources */
                    false, /* selfAllowed */
                    false, /* inlineAllowed */
                    false, /* evalAllowed*/
                    [], /* nonceValues */
                    ['GLf/9ce9Q08ND4Lg4RXkqXAacenJaH/xkogiHZfpQY4=' => 'sha256'], /* hashValues */
                    false, /* dynamicAllowed */
                    true /* eventHandlersAllowed - this enables 'unsafe-hashes' */
                )
            );
            $this->hashAdded = true;
        }
    }
}
