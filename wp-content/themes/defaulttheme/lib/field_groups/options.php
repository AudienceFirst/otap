<?php
function my_acf_add_local_field_groups() {

    // Theme OPTIONS
    acf_add_local_field_group(array(
        'key' => 'theme_options',
        'title' => 'Theme options',
        'fields' => array (
            array (
                'key' => 'header_container_width',
                'label' => 'Header Container Width',
                'name' => 'header_container_width',
                'type' => 'button_group',
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'value',
                'layout' => 'horizontal',
                'choices' => [
                    '1240px' => 'width 1240(px)',
                    '1440px' => 'width 1440(px)',
                    '1600px' => 'width 1600(px)',
                    '100%' => 'Full width'
                ],
                'default_value' => '1440px',
            ),
            array (
                'key' => 'container_width',
                'label' => 'Container Width',
                'name' => 'container_width',
                'type' => 'button_group',
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'value',
                'layout' => 'horizontal',
                'choices' => [
                    '1240px' => 'width 1240(px)',
                    '1440px' => 'width 1440(px)',
                    '1600px' => 'width 1600(px)',
                    '100%' => 'Full width'
                ],
                'default_value' => '1440px',
            ),
            array (
                'key' => 'container_padding',
                'label' => 'Container padding',
                'name' => 'container_padding',
                'type' => 'button_group',
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'value',
                'layout' => 'horizontal',
                'choices' => [
                    '10px' => '10px',
                    '15px' => '15px',
                    '20px' => '20px',
                    '25px' => '25px',
                    '0px' => 'No Padding'
                ],
                'default_value' => '15px',
            ),
            array (
                'key' => 'body_color',
                'label' => 'Body color',
                'name' => 'body_color',
                'type' => 'color_picker',
                'allow_null' => 1,
                'multiple' => 0,
                'return_format' => 'value',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-thema-opties',
                ),
            ),
        ),
    ));
    
    // HEADER OPTIONS
    acf_add_local_field_group(array(
        'key' => 'header_options',
        'title' => 'Header options',
        'fields' => array (
            array (
                'key' => 'default',
                'label' => 'Default',
                'name' => 'default',
                'type' => 'tab',
            ),
            array (
                'key' => 'default_logo',
                'label' => 'Default logo',
                'name' => 'default_logo',
                'type' => 'image',
            ),
            array (
                'key' => 'default_logo_inverse',
                'label' => 'Default logo inverse',
                'name' => 'default_logo_inverse',
                'type' => 'image',
            ),
            array (
                'key' => 'header_call_to_action',
                'label' => 'Header Call to Action',
                'name' => 'header_call_to_action',
                'type' => 'link',
            ),
            
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-header',
                ),
            ),
        ),
    ));
    


}
add_action( 'acf/init', 'my_acf_add_local_field_groups' );