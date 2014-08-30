<?php

class Training_Distributor_Model_System_Config_Source_Show
{
    public function toOptionArray()
    {
        $helper = Mage::helper('training_distributor');
        return array(
            array(
                'label' => $helper->__('Hide'),
                'value' => 0
            ),
            array(
                'label' => $helper->__('Show'),
                'value' => 1
            )
        );
    }
}