<?php
namespace Space48\SSO\Controller\Adminhtml\Login\Process;

/**
 * Interceptor class for @see \Space48\SSO\Controller\Adminhtml\Login\Process
 */
class Interceptor extends \Space48\SSO\Controller\Adminhtml\Login\Process implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Space48\SSO\Service\Login $loginService, \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory, \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory, \Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->___init();
        parent::__construct($loginService, $forwardFactory, $redirectFactory, $messageManager);
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
