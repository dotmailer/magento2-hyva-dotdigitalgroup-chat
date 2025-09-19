<?php

namespace Hyva\DotdigitalgroupChat\Plugin;

use Magento\Csp\Model\Collector\DynamicCollector;
use Magento\Csp\Model\Policy\FetchPolicy;

/**
 * Plugin to add CSP hash for Dotdigital chat bridge inline event handlers.
 *
 */
class DynamicCollectorPlugin
{
    /**
     * Flag to prevent duplicate hash additions during the collection process.
     *
     * @var bool
     */
    private $hashAdded = false;

    /**
     * Enables eventHandlersAllowed in Hyva CSP.
     *
     *
     * @param DynamicCollector $subject The dynamic CSP collector instance
     * @return void
     */
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
                    [], /* hashValues */
                    false, /* dynamicAllowed */
                    true /* eventHandlersAllowed */
                )
            );
            $this->hashAdded = true;
        }
    }
}
