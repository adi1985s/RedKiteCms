<?php
/*
 * This file is part of the TwitterBootstrapBundle and it is distributed
 * under the MIT LICENSE. To use this application you must leave intact this copyright 
 * notice.
 *
 * Copyright (c) RedKite Labs <info@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 * 
 * @license    MIT LICENSE
 * 
 */
 
namespace RedKiteCms\Block\TwitterBootstrapBundle\Tests\Unit\Core\Block\DropdownButton;

use RedKiteCms\Block\TwitterBootstrapBundle\Core\Block\DropdownButton\AlBlockManagerBootstrapDropdownButtonBlock;

/**
 * AlBlockManagerBootstrapDropdownButtonBlockTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class AlBlockManagerBootstrapDropdownButtonBlockTest extends AlBlockManagerBootstrapDropdownTestBase
{  
    protected function getBlockManager()
    {
        return new AlBlockManagerBootstrapDropdownButtonBlock($this->container, $this->validator);
    }
    
    public function testDefaultValue()
    {
        $expectedValue = array(
            "Content" =>    
            '
            {
                "0": {
                    "button_text": "Dropdown Button 1",
                    "button_type": "",
                    "button_attribute": "",
                    "button_dropup" : "none",
                    "items": [
                        {
                            "data" : "Item 1", 
                            "metadata" : {  
                                "type": "link",
                                "href": "#"
                            }
                        },
                        { 
                            "data" : "Item 2", 
                            "metadata" : {  
                                "type": "link",
                                "href": "#"
                            }
                        },
                        { 
                            "data" : "Item 3", 
                            "metadata" : {  
                                "type": "link",
                                "href": "#"
                            }
                        }
                    ]
                }
            }
            '
        );
            
        $this->defaultValueTest($expectedValue);
    }
    
    public function testGetHtml()
    {
        $value = '{
            "0": {
                "button_text": "Dropdown Button 1",
                "button_type": "danger",
                "button_attribute": "large",
                "button_gropup" : "none",
                "items": [
                    {
                        "data" : "Item 1", 
                        "metadata" : {  
                            "type": "link",
                            "href": "#",
                            "attributes": {}
                        }
                    }
                ]
            }
        }';
        
        $items = array(
            array(
                "data" => "Item 1", 
                "metadata" => array(
                    "type" => "link",
                    "href" => "#",
                    "attributes" => array(),
                ),
            ),
        );
        
        $this->getHtmlTest($value, $items, 'TwitterBootstrapBundle:Content:DropdownButton/dropdown_button.html.twig');        
    }
    
    public function testEditorParameters()
    {
        $value = '{
            "0": {
                "button_text": "Dropdown Button 1",
                "button_type": "danger",
                "button_attribute": "large",
                "button_gropup" : "none",
                "items": [
                    {
                        "data" : "Item 1", 
                        "metadata" : {  
                            "type": "link",
                            "href": "#",
                            "attributes": {}
                        }
                    }
                ]
            }
        }';
        
        $this->editorParametersTest($value, 'TwitterBootstrapBundle:Editor:DropdownButton/dropdown_editor.html.twig');
    }
}
