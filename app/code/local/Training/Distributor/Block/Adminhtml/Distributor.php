<?php

class Training_Distributor_Block_Adminhtml_Distributor
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Initialize grid container settings
     *
     * The grid block class must be:
     *
     * $this->_blockGroup . '/' . $this->_controller . '_grid'
     * i.e. training_distributor/adminhtml_distributor_grid
     */
    protected function _construct()
    {
        $this->_blockGroup = 'training_distributor';
        $this->_controller = 'adminhtml_distributor';
        $this->_headerText = $this->__('List Distributors');
        $this->_addButtonLabel = $this->__('Add Distributor');

        parent::_construct();
    }
}