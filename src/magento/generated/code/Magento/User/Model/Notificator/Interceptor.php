<?php
namespace Magento\User\Model\Notificator;

/**
 * Interceptor class for @see \Magento\User\Model\Notificator
 */
class Interceptor extends \Magento\User\Model\Notificator implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, \Magento\Backend\App\ConfigInterface $config, \Magento\Framework\App\DeploymentConfig $deployConfig, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($transportBuilder, $config, $deployConfig, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function sendForgotPassword(\Magento\User\Api\Data\UserInterface $user) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'sendForgotPassword');
        $pluginInfo ? $this->___callPlugins('sendForgotPassword', func_get_args(), $pluginInfo) : parent::sendForgotPassword($user);
    }
}
