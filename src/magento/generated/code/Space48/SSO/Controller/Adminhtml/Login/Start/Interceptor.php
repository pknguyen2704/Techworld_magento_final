<?php
namespace Space48\SSO\Controller\Adminhtml\Login\Start;

/**
 * Interceptor class for @see \Space48\SSO\Controller\Adminhtml\Login\Start
 */
class Interceptor extends \Space48\SSO\Controller\Adminhtml\Login\Start implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Space48\SSO\Service\Login $loginService, \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory, \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory)
    {
        $this->___init();
        parent::__construct($loginService, $forwardFactory, $redirectFactory);
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
