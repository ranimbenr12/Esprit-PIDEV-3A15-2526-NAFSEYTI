<?php

namespace Symfony\Config;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class NucleosDompdfConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $defaults;
    private $_usedProperties = [];

    /**
     * @return $this
     */
    public function defaults(string $name, mixed $value): static
    {
        $this->_usedProperties['defaults'] = true;
        $this->defaults[$name] = $value;

        return $this;
    }

    public function getExtensionAlias(): string
    {
        return 'nucleos_dompdf';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('defaults', $value)) {
            $this->_usedProperties['defaults'] = true;
            $this->defaults = $value['defaults'];
            unset($value['defaults']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['defaults'])) {
            $output['defaults'] = $this->defaults;
        }

        return $output;
    }

}
