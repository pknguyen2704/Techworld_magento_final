<?php
namespace Space48\SSO\Controller\Adminhtml\Meta\Index;

/**
 * Interceptor class for @see \Space48\SSO\Controller\Adminhtml\Meta\Index
 */
class Interceptor extends \Space48\SSO\Controller\Adminhtml\Meta\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Space48\SSO\Service\Metadata $metadataService, \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory, \Magento\Framework\Controller\Result\RawFactory $rawResultFactory)
    {
        $this->___init();
        parent::__construct($metadataService, $forwardFactory, $rawResultFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }
}
