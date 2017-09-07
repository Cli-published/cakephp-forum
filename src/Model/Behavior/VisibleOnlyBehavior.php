<?php
namespace CakeDC\Forum\Model\Behavior;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Query;

/**
 * VisibleOnly behavior
 */
class VisibleOnlyBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'field' => 'is_visible',
    ];

    /**
     * beforeFind callback
     *
     * @param \Cake\Event\Event $event
     * @param \Cake\ORM\Query $query
     * @param ArrayObject $options
     * @param $primary
     */
    public function beforeFind(Event $event, Query $query, ArrayObject $options, $primary)
    {
        $query->where([$this->getTable()->aliasField($this->getConfig('field')) => true]);
    }
}