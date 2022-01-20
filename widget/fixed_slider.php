<?php
class Elementor_Widget_Fixed_Slider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'elementor_fixed_slider';
    }

    public function get_title()
    {
        return __('Fixed Slider', 'elementor_fixed_slider');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
              'label' => __('Content', 'elementor_fixed_slider'),
              'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'gallery',
            [
                'label' => esc_html__('Add Images', 'elementor_fixed_slider'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );



        $this->end_controls_section();

        $this->start_controls_section(
            'image_section',
            [
                'label' => __('Image', 'elementor_fixed_slider'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );



        $this->add_responsive_control(
            'height',
            [
                        'label' => esc_html__('Height', 'elementor_fixed_slider'),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ,'vh' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 5,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                            'vh' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'devices' => [ 'desktop', 'tablet', 'mobile' ],
                          'desktop_default' => [
                            'unit' => 'px',
                            'size' => "400",
                          ],
                          'tablet_default' => [
                            'unit' => 'px',
                            'size' => "300",
                          ],
                          'mobile_default' => [
                            'unit' => 'px',
                            'size' => "200",
                          ],
                        'selectors' => [
                            '{{WRAPPER}} .image__slider .image__slider__item' => 'height: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .image__slider' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
        );

        $this->add_control(
            'duration',
            [
                'label' => esc_html__('Duration', 'elementor_fixed_slider'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1000,
                'max' => 10000,
                'step' => 5,
                'default' => 4000,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $isEditor = \Elementor\Plugin::$instance->editor->is_edit_mode();
        $settings = $this->get_settings_for_display();

        echo '<div class="image__slider" data-interval="'.$settings['duration'].'">';
        foreach ($settings['gallery'] as $image) {
            echo '<div class="image__slider__item" style="background-image:url('.esc_attr($image['url']).')"></div>';
        }

        echo '</div>';
    }

    protected function _content_template()
    {
    }
}
