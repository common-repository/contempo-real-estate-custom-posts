<?php
namespace CT_Elementor_Widgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * CT City Links
 *
 * Elementor widget for listings city links.
 *
 * @since 1.0.0
 */
class CT_Listings_Single_Video extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ct-listings-single-video';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'CT Video', 'contempo' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-play';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ct-real-estate-7-listings-single' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	

	protected function register_controls() {
		
		$this->start_controls_section(
			'options',
			[
				'label' => __( 'Options', 'contempo' ),
			]
		);
			
			$this->add_control(
				'html_tag',
				[
					'label' => __( 'Title HTML Tag', 'contempo' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h4',
					'options' => [
						'h1'  => __( 'H1', 'contempo' ),
						'h2' => __( 'H2', 'contempo' ),
						'h3' => __( 'H3', 'contempo' ),
						'h4' => __( 'H4', 'contempo' ),
						'h5' => __( 'H5', 'contempo' ),
						'h6' => __( 'H6', 'contempo' ),
						'div' => __( 'div', 'contempo' ),
						'span' => __( 'span', 'contempo' ),
						'p' => __( 'p', 'contempo' ),
					],
				]
			);

			$this->add_control(
				'widget_title',
				[
					'label' => __( 'Title', 'contempo' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Video', 'contempo' ),
					'placeholder' => __( 'Type your title here', 'contempo' ),
				]
			);

			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'contempo' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'left',
					'options' => [
						'left' => [
							'title' => __( 'Left', 'contempo' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'contempo' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'contempo' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'prefix_class' => 'content-align-%s',
					'selectors' => [
						'{{WRAPPER}} .ct-elementor-listings-single-video' => 'text-align: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', 'contempo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);	

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => __( 'Typography', 'contempo' ),
					'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} #listing-video-heading',
					'fields_options' => [
			            // first mimic the click on Typography edit icon
			            'typography' => ['default' => 'yes'],
			            // then redifine the Elementor defaults
			            'font_size' => ['default' => ['size' => 1.3125, 'unit' => 'em']],
			            'font_weight' => ['default' => 600],
			            'line_height' => ['default' => ['size' => 1.2, 'unit' => 'em']],
			        ],
				]
			);

			$this->add_control(
				'text_color',
				[
					'label' => __( 'Text Color', 'contempo' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'scheme' => [
						'type' => \Elementor\Core\Schemes\Color::get_type(),
						'value' => \Elementor\Core\Schemes\Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} #listing-video-heading' => 'color: {{VALUE}}',
					],
					'default' => '#121212',
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => __( 'Margin', 'contempo' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} #listing-video-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '20',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => false,
					]
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => __( 'Border', 'contempo' ),
					'fields_options' => [
						'border' => [
							'default' => 'solid',
						],
						'width' => [
							'default' => [
								'top' => '0',
								'right' => '0',
								'bottom' => '1',
								'left' => '0',
								'isLinked' => false,
							],
						],
						'color' => [
							'default' => '#d5d9dd',
						],
					],
					'selector' => '{{WRAPPER}} #listing-video-heading',
				]
			);

			$this->add_control(
				'border_radius',
				[
					'label' => __( 'Border Radius', 'contempo' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} #listing-video-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '0',
						'right' => '0',
						'bottom' => '0',
						'left' => '0',
						'unit' => 'px',
						'isLinked' => true,
					]
				]
			);

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {

		global $ct_options;

		$settings = $this->get_settings_for_display();
		$attributes['is_elementor'] = 1;

		if (\Elementor\Plugin::$instance->editor->is_edit_mode()) {
		    $attributes['is_elementor_edit'] = 1;
		}

		$ct_single_listing_content_layout_type = isset( $ct_options['ct_single_listing_content_layout_type'] ) ? $ct_options['ct_single_listing_content_layout_type'] : '';
		
		$ct_source = get_post_meta( ct_return_listing_id_elementor($attributes), 'source', true);
		$ct_video_url = get_post_meta( ct_return_listing_id_elementor($attributes), "_ct_video", true);

		if(!empty($ct_video_url) && strpos($ct_video_url, 'http://') !== 0) {
			
			echo '<!-- Video -->';
			echo '<div class="ct-elementor-listings-single">';
				echo '<div id="listing-video" class="ct-elementor-listings-single-video videoplayer">';
					if($ct_single_listing_content_layout_type == 'accordion') {
						echo '<' . $settings['html_tag'] . ' id="listing-video-heading" class="info-toggle">' . $settings['widget_title'] . '</' . $settings['html_tag'] . '>';
					} else {
						echo '<' . $settings['html_tag'] . ' id="listing-video-heading">' . $settings['widget_title'] . '</' . $settings['html_tag'] . '>';
					}

					echo '<div class="info-inner">';
						if($ct_source == 'idx-api') {
							echo '<div class="fluid-width-video-wrapper" style="padding-top: 56.25%;">';
								echo '<iframe src="' . esc_url($ct_video_url) . '"></iframe>';
							echo '</div>';
						} else {
							echo wp_oembed_get( esc_url( $ct_video_url ) );
						}
					echo '</div>';
					
				echo '</div>';
			echo '</div>';
			echo '<!-- //Video -->';
		}

	}

}
