<?php

namespace Modules\NewsFeed\Plugin\Block;

use Magento\Framework\Data\Tree\NodeFactory;

class Topmenu {

    /**
     * @var NodeFactory
     */
    protected $nodeFactory;

    public function __construct(
        NodeFactory $nodeFactory
    ) {
        $this->nodeFactory = $nodeFactory;
    }

    public function beforeGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject,
        $outermostClass = '',
        $childrenWrapClass = '',
        $limit = 0
    ) {
        $node = $this->nodeFactory->create(
            [
                'data' => $this->getNodeAsArray(),
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree()
            ]
        );
        $subject->getMenu()->addChild($node);
    }

    protected function getNodeAsArray() {
        $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        // $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . 'localhost'. $_SERVER['REQUEST_URI'];
        $parsedUrl = parse_url($root);
        $root = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];
        $url = $root . '/modules_newsfeed';
        return [
            'name' => __('Tin tức công nghệ'),
            'id' => 'modules-newsfeed-navitem',
            'url' => $url,
            'has_active' => false,
            'is_active' => false // (expression to determine if menu item is selected or not)
        ];
    }
}
