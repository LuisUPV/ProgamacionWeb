<?php

/**
 * Output Custom Styling from Redux Theme Options
 */

function rocket_custom_styling() {

	$rocket_data = get_option('rocket_data');
	$output = '';

	/**
	 * Styling
	 */

	// Variables
	$styling_bg_color          = $rocket_data['rocket__opt_content_bg_color'];
	$styling_primary_color     = $rocket_data['rocket__opt_primary_color'];
	$styling_secondary_color   = $rocket_data['rocket__opt_secondary_color'];
	$styling_tertiary_color    = $rocket_data['rocket__opt_tertiary_color'];
	$styling_quaternary_color  = $rocket_data['rocket__opt_quaternary_color'];
	$styling_quinary_color     = $rocket_data['rocket__opt_quinary_color'];
	$styling_senary_color      = $rocket_data['rocket__opt_senary_color'];
	$styling_septenary_color   = $rocket_data['rocket__opt_septenary_color'];
	$styling_octonary_color    = $rocket_data['rocket__opt_octonary_color'];
	$styling_nonary_color      = $rocket_data['rocket__opt_nonary_color'];
	$styling_section_color1    = $rocket_data['rocket__opt-content-section-bg1'];
	$styling_section_color2    = $rocket_data['rocket__opt-content-section-bg2'];

	// Additional Variables
	$styling_header_top_bar       = $rocket_data['rocket__opt-header-top-bar-bg']['background-color'];

	if ( $styling_header_top_bar != '#36274c') { //don't output if option is default
		$output .= '.h-top-bar__color1';
		$output .= '{ background-color:' . $styling_header_top_bar . ' }';
	}

	/**
	 * Main Background Color
	 */
	if ( $styling_bg_color != '#f1f2f4') { //don't output if option is default
		$output .= 'body,';
		$output .= 'blockquote.blockquote:before,';
		$output .= 'table .table, .table .table,';
		$output .= '.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus,';
		$output .= '.panel, .panel-default > .panel-heading,';
		$output .= '.well,';
		$output .= '.vertical-slider .owl-controls,';
		$output .= '.vertical-slider .owl-controls .owl-dots .owl-dot span,';
		$output .= '.team-slider .owl-controls .owl-dots, .pricing-slider .owl-controls .owl-dots,';
		$output .= 'article.hentry .entry-footer,';
		$output .= '.widget_archive > ul ul.children, .widget_nav_menu > ul ul.children, .widget_meta > ul ul.children, .widget_pages > ul ul.children, .widget_recent_comments > ul ul.children, .widget_recent_entries > ul ul.children, .widget_categories > ul ul.children, .widget_rss > ul ul.children, .widget_product_categories > ul ul.children, .widget_layered_nav > ul ul.children, .widget_layered_nav_filters > ul ul.children,';
		$output .= '.widget_posts_carousel .widget-carousel .owl-controls,';
		$output .= '.table-checkout .shipping-info td,';
		$output .= '.payment-footer,';
		$output .= '.vc_table .table,';
		$output .= '.entry-content .vc_images_carousel .vc_carousel-indicators li:before,';
		$output .= '.entry-content .vc_images_carousel.vc_carousel_vertical .vc_carousel-indicators li:before,';
		$output .= '.rocket_gitem-zone-custom .vc_gitem-row-position-bottom';
		$output .= '{ background-color:'.$styling_bg_color.' }';

		$output .= '.panel-default > .panel-heading .badge';
		$output .= '{ color:'.$styling_bg_color.' }';

		$output .= '.top-wrapper-wave, .top-wrapper-wave path {fill:'.$styling_bg_color.';}';
		$output .= '.footer-bg-wave, .footer-bg-wave path {fill:'.$styling_bg_color.';}';
	}

	/**
	 * Primary Color
	 */
	if ( $styling_primary_color != '#ff7149') { //don't output if option is default

		$styling_primary_color_darken  = rocket_color_luminance($styling_primary_color, -0.15);
		$styling_primary_color_lighten = rocket_color_luminance($styling_primary_color, 0.03);

		//color
		$output .= 'a,';
		$output .= '.dotted-link2:hover, .dotted-link2.color-primary, .dotted-link2.color-primary .fa,';
		$output .= '.hr-scroll-to a:hover, .hr-scroll-bottom a:hover,';
		$output .= 'ul li:before,';
		$output .= '.text-primary,';
		$output .= '.btn-primary .badge, #respond input#submit .badge, .woocommerce-pagination > ul > li > .page-numbers.current .badge, .add_to_cart_button .badge, .added_to_cart .badge,';
		$output .= '.btn-link,';
		$output .= '.loading-btn .fa, .loading-btn .btn-icon,';
		$output .= '.checkbox__custom input[type="checkbox"]:checked + span:before,';
		$output .= '.bootstrap-select.btn-group button.btn.dropdown-toggle.selectpicker.btn-link .caret:before,';
		$output .= '.breadcrumb > li > a:hover,';
		$output .= '.panel-primary > .panel-heading .badge,';
		$output .= '.progress__vertical.current .progress-footer > h4,';
		$output .= '.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus,';
		$output .= '.feature-icon__simple.icon-color1,';
		$output .= 'article.hentry .entry-header h4 > a:hover,';
		$output .= '.commentlist li.comment .comment-meta .comment-date .fa, .commentlist li.pingback .comment-meta .comment-date .fa,';
		$output .= '.widget_archive > ul > li > a:hover, .widget_nav_menu > ul > li > a:hover, .widget_nav_menu > div > ul > li > a:hover, .widget_meta > ul > li > a:hover, .widget_pages > ul > li > a:hover, .widget_recent_comments > ul > li > a:hover, .widget_recent_entries > ul > li > a:hover, .widget_categories > ul > li > a:hover, .widget_rss > ul > li > a:hover, .widget_product_categories > ul > li > a:hover, .widget_layered_nav > ul > li > a:hover, .widget_layered_nav_filters > ul > li > a:hover,';
		$output .= '.widget_archive > ul ul.children li a:hover, .widget_nav_menu > ul ul.children li a:hover, .widget_meta > ul ul.children li a:hover, .widget_pages > ul ul.children li a:hover, .widget_recent_comments > ul ul.children li a:hover, .widget_recent_entries > ul ul.children li a:hover, .widget_categories > ul ul.children li a:hover, .widget_rss > ul ul.children li a:hover, .widget_product_categories > ul ul.children li a:hover, .widget_layered_nav > ul ul.children li a:hover, .widget_layered_nav_filters > ul ul.children li a:hover,';
		$output .= '.widget_calendar tbody td a,';
		$output .= '.widget_search .btn, .widget_product_search .btn,';
		$output .= '.widget_posts_carousel .widget-carousel .widget-carousel-item h4 > a:hover,';
		$output .= '.review_num .review_number,';
		$output .= '.product-info .price del,';
		$output .= '.rating-input .fa-star,';
		$output .= '#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-flyout.mega-menu-item-has-children > a.mega-menu-link:after, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-flyout > a.mega-menu-link:after, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item-has-children > a.mega-menu-link:after,';
		$output .= '.page-404-social > li a:hover,';
		$output .= '.partner-link:hover,';
		$output .= '.partner-link .fa,';
		$output .= '.page-intro .page-wrapper .container .demo-list .demo-title > a .fa,';
		$output .= '.woocommerce div.product span.price del, .woocommerce div.product p.price del,';
		$output .= '.woocommerce div.product .stock,';
		$output .= '.woocommerce ul.products li.product .product-footer .price del,';
		$output .= '.woocommerce ul.products li.product .product-footer .price del .amount,';
		$output .= '.woocommerce .star-rating span:before,';
		$output .= '.woocommerce .woocommerce-product-rating .woocommerce-review-link:hover,';
		$output .= '.woocommerce .woocommerce-product-rating .woocommerce-review-link .count,';
		$output .= '.woocommerce p.stars a:hover,';
		$output .= '.woocommerce .widget_layered_nav ul li span.count,';
		$output .= '.woocommerce-cart .cart-collaterals .cart_totals .discount td,';
		$output .= '.header-cart .header-cart-dropdown .cart_list.product_list_widget > li a:hover,';
		$output .= '.header-cart .header-cart-dropdown .cart_list.product_list_widget > li .quantity .amount,';
		$output .= '.h-top-bar a:hover,';
		$output .= '.h-top-bar .h-top-bar_item__phone:before, .h-top-bar .h-top-bar_item__email:before, .h-top-bar #lang_sel ul a.lang_sel_sel > .icl_lang_sel_current:before, .h-top-bar #lang_sel ul li ul a:hover,';
		$output .= '.title-with-icon__icon-el_color_primary,';
		$output .= '.pricetable-column-info .currency, .pricetable-column-info .discount, .pricetable-column-info .status,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-color-primary .rocket_icon_box-icon,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-primary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-primary .vc_cta3-content-header h4,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-primary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-primary .vc_cta3-content-header h4,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-primary .vc_icon_element-icon';
		$output .= '{ color:'.$styling_primary_color.' }';

		//background-color
		$output .= '.dots-divider > span,';
		$output .= '.section-title-wrapper .section-title-dots span,';
		$output .= '.btn-primary, #respond input#submit, .woocommerce-pagination > ul > li > .page-numbers.current, .add_to_cart_button, .added_to_cart, a.button.alt, button.button.alt, input.button.alt,';
		$output .= '.btn-primary.disabled, #respond input#submit.disabled, .woocommerce-pagination > ul > li > .page-numbers.current.disabled, .add_to_cart_button.disabled, .added_to_cart.disabled, .btn-primary[disabled], #respond input#submit[disabled], .woocommerce-pagination > ul > li > .page-numbers.current[disabled], .add_to_cart_button[disabled], .added_to_cart[disabled], fieldset[disabled] .btn-primary, fieldset[disabled] #respond input#submit, fieldset[disabled] .woocommerce-pagination > ul > li > .page-numbers.current, fieldset[disabled] .add_to_cart_button, fieldset[disabled] .added_to_cart, .btn-primary.disabled:hover, #respond input#submit.disabled:hover, .woocommerce-pagination > ul > li > .page-numbers.current.disabled:hover, .add_to_cart_button.disabled:hover, .added_to_cart.disabled:hover, .btn-primary[disabled]:hover, #respond input#submit[disabled]:hover, .woocommerce-pagination > ul > li > .page-numbers.current[disabled]:hover, .add_to_cart_button[disabled]:hover, .added_to_cart[disabled]:hover, fieldset[disabled] .btn-primary:hover, fieldset[disabled] #respond input#submit:hover, fieldset[disabled] .woocommerce-pagination > ul > li > .page-numbers.current:hover, fieldset[disabled] .add_to_cart_button:hover, fieldset[disabled] .added_to_cart:hover, .btn-primary.disabled:focus, #respond input#submit.disabled:focus, .woocommerce-pagination > ul > li > .page-numbers.current.disabled:focus, .add_to_cart_button.disabled:focus, .added_to_cart.disabled:focus, .btn-primary[disabled]:focus, #respond input#submit[disabled]:focus, .woocommerce-pagination > ul > li > .page-numbers.current[disabled]:focus, .add_to_cart_button[disabled]:focus, .added_to_cart[disabled]:focus, fieldset[disabled] .btn-primary:focus, fieldset[disabled] #respond input#submit:focus, fieldset[disabled] .woocommerce-pagination > ul > li > .page-numbers.current:focus, fieldset[disabled] .add_to_cart_button:focus, fieldset[disabled] .added_to_cart:focus, .btn-primary.disabled.focus, #respond input#submit.disabled.focus, .woocommerce-pagination > ul > li > .page-numbers.current.disabled.focus, .add_to_cart_button.disabled.focus, .added_to_cart.disabled.focus, .btn-primary[disabled].focus, #respond input#submit[disabled].focus, .woocommerce-pagination > ul > li > .page-numbers.current[disabled].focus, .add_to_cart_button[disabled].focus, .added_to_cart[disabled].focus, fieldset[disabled] .btn-primary.focus, fieldset[disabled] #respond input#submit.focus, fieldset[disabled] .woocommerce-pagination > ul > li > .page-numbers.current.focus, fieldset[disabled] .add_to_cart_button.focus, fieldset[disabled] .added_to_cart.focus, .btn-primary.disabled:active, #respond input#submit.disabled:active, .woocommerce-pagination > ul > li > .page-numbers.current.disabled:active, .add_to_cart_button.disabled:active, .added_to_cart.disabled:active, .btn-primary[disabled]:active, #respond input#submit[disabled]:active, .woocommerce-pagination > ul > li > .page-numbers.current[disabled]:active, .add_to_cart_button[disabled]:active, .added_to_cart[disabled]:active, fieldset[disabled] .btn-primary:active, fieldset[disabled] #respond input#submit:active, fieldset[disabled] .woocommerce-pagination > ul > li > .page-numbers.current:active, fieldset[disabled] .add_to_cart_button:active, fieldset[disabled] .added_to_cart:active, .btn-primary.disabled.active, #respond input#submit.disabled.active, .woocommerce-pagination > ul > li > .page-numbers.current.disabled.active, .add_to_cart_button.disabled.active, .added_to_cart.disabled.active, .btn-primary[disabled].active, #respond input#submit[disabled].active, .woocommerce-pagination > ul > li > .page-numbers.current[disabled].active, .add_to_cart_button[disabled].active, .added_to_cart[disabled].active, fieldset[disabled] .btn-primary.active, fieldset[disabled] #respond input#submit.active, fieldset[disabled] .woocommerce-pagination > ul > li > .page-numbers.current.active, fieldset[disabled] .add_to_cart_button.active, fieldset[disabled] .added_to_cart.active,';
		$output .= '.link-circle:hover,';
		$output .= '.radio__custom input[type="radio"]:checked + span:before,';
		$output .= '.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus,';
		$output .= '.panel-primary > .panel-heading,';
		$output .= '.circled-icon.icon-color-primary,';
		$output .= '.progress-bar,';
		$output .= '.social-icons > li > a,';
		$output .= '.vertical-slider .owl-controls .owl-dots .owl-dot.active span:before,';
		$output .= '.team-slider .owl-controls .owl-dot.active span, .pricing-slider .owl-controls .owl-dot.active span, .team-slider .owl-controls.clickable .owl-dot:hover span, .pricing-slider .owl-controls.clickable .owl-dot:hover span,';
		$output .= '.jumbotron h1:after, .jumbotron .h1:after,';
		$output .= 'article.hentry .entry-date,';
		$output .= 'article.hentry .post-categories > li:nth-child(even) > a, article.hentry .post-categories > li:nth-child(6n) > a,';
		$output .= 'article.hentry.sticky:before,';
		$output .= '.portfolio-feed .portfolio-item .portfolio-details,';
		$output .= '.page-loader .loader-inner,';
		$output .= '.page-loader .loader-inner:before,';
		$output .= '.header-title-lg:after,';
		$output .= '.header-title-n:after,';
		$output .= '.footer-social-links > li > a:hover,';
		$output .= '.page-404-main .page-404-num:after,';
		$output .= '.page-404-header:after,';
		$output .= '.page-404-footer-label:after,';
		$output .= '.countdown.countdown__color-circles .hours-count,';
		$output .= '#back-top a:hover,';
		$output .= '.tooltip-inner,';
		$output .= '.mfp-image-holder .mfp-close, .mfp-iframe-holder .mfp-close,';
		$output .= '.page-intro .header-intro .dots .dot,';
		$output .= 'p.demo_store,';
		$output .= '.woocommerce span.onsale,';
		$output .= '.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,';
		$output .= '.woocommerce .widget_price_filter .ui-slider .ui-slider-range,';
		$output .= '.header-cart .cart-contents .cart-icon:hover,';
		$output .= '.rocket_counter-color__primary,';
		$output .= '.social-icons.social-icons__outline > li > a:hover,';
		$output .= '.vc_tta-color-primary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.entry-content .vc_images_carousel.vc_carousel_vertical .vc_carousel-indicators li.vc_active:after,';
		$output .= '.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-primary .vc_bar,';
		$output .= '.pricetable-column-label,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-background-color-primary.rocket_icon_box-background,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-primary.vc_cta3-style-flat,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-primary.vc_icon_element-background,';
		$output .= '.vc_tta-color-primary.vc_tta-style-classic .vc_tta-tab > a,';
		$output .= '.vc_pagination-color-primary.vc_pagination-style-outline .vc_active .vc_pagination-trigger,';
		$output .= '.vc_pagination-color-primary.vc_pagination-style-outline .vc_pagination-trigger:hover,';
		$output .= 'div.vc_icon_element-inner.vc_icon_element-color-custom.vc_icon_element-have-style-inner.vc_icon_element-size-xs.vc_icon_element-style-boxed.vc_icon_element-background.vc_icon_element-background-color-custom,';
		$output .= '.vc_grid-filter > .vc_grid-filter-item:hover > span, .vc_grid-filter > .vc_grid-filter-item.vc_active > span,';
		$output .= '.rocket-nav .tp-bullet:hover, .rocket-nav .tp-bullet.selected,';
		$output .= '.rocket__gitem_go_top_slideout,';
		$output .= '.rocket__gitem_text_first,';
		$output .= '.rocket_gitem_slider_from_left,';
		$output .= '.token-sale-counter__header::before';
		$output .= '{ background-color:'.$styling_primary_color.' }';

		$output .= '.style-switcher h3 a';
		$output .= '{ background-color:'.$styling_primary_color.' !important;}';

		//Page Loader gradient
		$output .= '.page-loader .loader-inner';
		$output .= '{ background: -moz-linear-gradient(left, '.$styling_primary_color.' 10%, rgba(255, 255, 255, 0) 42%); background: -webkit-linear-gradient(left, '.$styling_primary_color.' 10%, rgba(255, 255, 255, 0) 42%); background: -o-linear-gradient(left, '.$styling_primary_color.' 10%, rgba(255, 255, 255, 0) 42%); background: -ms-linear-gradient(left, '.$styling_primary_color.' 10%, rgba(255, 255, 255, 0) 42%); background: linear-gradient(to right, '.$styling_primary_color.' 10%, rgba(255, 255, 255, 0) 42%); }';

		//border-color
		$output .= 'a.thumbnail:hover, a.wp-caption:hover, a.thumbnail:focus, a.wp-caption:focus, a.thumbnail.active, a.wp-caption.active,';
		$output .= '.link-circle:hover,';
		$output .= '.panel-primary,';
		$output .= '.panel-primary > .panel-heading,';
		$output .= '.rsUni .rsThumb.rsNavSelected img,';
		$output .= '.footer-social-links > li > a:hover,';
		$output .= '.social-icons.social-icons__outline > li > a:hover,';
		$output .= '.vc_tta-color-primary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-background-color-primary.rocket_icon_box-outline,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-primary.vc_cta3-style-outline,';
		$output .= '.vc_pagination-color-primary.vc_pagination-style-outline .vc_active .vc_pagination-trigger,';
		$output .= '.vc_pagination-color-primary.vc_pagination-style-outline .vc_pagination-trigger';
		$output .= '{ border-color:'.$styling_primary_color.' }';

		//border-bottom-color
		$output .= '.dotted-link1, .dotted-link1:hover, .dotted-link2:hover > span, .dotted-link2.color-primary > span,';
		$output .= '.panel-primary > .panel-footer + .panel-collapse > .panel-body,';
		$output .= '.well a,';
		$output .= 'article.hentry .entry-meta > li + li a, article.hentry .entry-meta > li + li a:hover,';
		$output .= '.commentlist li.comment .comment-reply .comment-reply-link > span, .commentlist li.pingback .comment-reply .comment-reply-link > span,';
		$output .= '.tooltip.bottom .tooltip-arrow,';
		$output .= '.tooltip.bottom-left .tooltip-arrow,';
		$output .= '.tooltip.bottom-right .tooltip-arrow';
		$output .= '{ border-bottom-color:'.$styling_primary_color.' }';

		//border-top-color
		$output .= '.panel-primary > .panel-heading + .panel-collapse > .panel-body,';
		$output .= '.tooltip.top .tooltip-arrow,';
		$output .= '.tooltip.top-left .tooltip-arrow,';
		$output .= '.tooltip.top-right .tooltip-arrow,';
		$output .= '.h-top-bar #lang_sel ul a.lang_sel_sel:before';
		$output .= '{ border-top-color:'.$styling_primary_color.' }';

		//border-left-color
		$output .= '.commentlist .bypostauthor > .comment-wrapper,';
		$output .= '.tooltip.left .tooltip-arrow';
		$output .= '{ border-left-color:'.$styling_primary_color.' }';

		//border-right-color
		$output .= '.tooltip.right .tooltip-arrow';
		$output .= '{ border-right-color:'.$styling_primary_color.' }';


		// Primary color media queries
		//992px
		$output .= '@media (min-width: 992px) {';

			//color
			$output .= '.timeline > div > a .desc-holder:after';
			$output .= '{ color:'.$styling_primary_color.' }';

			//border-bottom-color
			$output .= '.single-post article.hentry .entry-social > ul:after';
			$output .= '{ border-bottom-color:'.$styling_primary_color.' }';

			//border-color
			$output .= '.header-cart .cart-contents .cart-icon:after';
			$output .= '{ border-color:'.$styling_primary_color.' }';

		$output .= '}';

		//768px
		$output .= '@media (min-width: 768px) {';

			//color
			$output .= '.footer-text div[class^="col-"]:after';
			$output .= '{ background-color:'.$styling_primary_color.' }';

		$output .= '}';


		// Primary Color (darken) - color
		$output .= 'a:hover, a:focus,';
		$output .= '.dotted-link2.color-primary:hover,';
		$output .= '.dotted-link2.color-primary:hover .fa,';
		$output .= '.btn-link:hover, .btn-link:focus,';
		$output .= '.dotted-link2.color-primary:hover,';
		$output .= '.dotted-link2.color-primary:hover .fa';
		$output .= '{ color:'.$styling_primary_color_darken.' }';

		// Primary Color (darken) - background-color
		$output .= '.vc_tta-color-primary.vc_tta-style-classic .vc_tta-tab > a:hover, .vc_tta-color-primary.vc_tta-style-classic .vc_tta-tab > a:focus';
		$output .= '{ background-color:'.$styling_primary_color_darken.' }';

		// Primary Color (lighten) - background-color
		$output .= '.btn-primary:hover, #respond input#submit:hover, .woocommerce-pagination > ul > li > .page-numbers.current:hover, .add_to_cart_button:hover, .added_to_cart:hover, .btn-primary:focus, #respond input#submit:focus, .woocommerce-pagination > ul > li > .page-numbers.current:focus, .add_to_cart_button:focus, .added_to_cart:focus, .btn-primary.focus, #respond input#submit.focus, .woocommerce-pagination > ul > li > .page-numbers.current.focus, .add_to_cart_button.focus, .added_to_cart.focus, .btn-primary:active, #respond input#submit:active, .woocommerce-pagination > ul > li > .page-numbers.current:active, .add_to_cart_button:active, .added_to_cart:active, .btn-primary.active, #respond input#submit.active, .woocommerce-pagination > ul > li > .page-numbers.current.active, .add_to_cart_button.active, .added_to_cart.active, .open > .dropdown-toggle.btn-primary, .open > .dropdown-toggle#respond input#submit, .open > .dropdown-toggle.woocommerce-pagination > ul > li > .page-numbers.current, .open > .dropdown-toggle.add_to_cart_button, .open > .dropdown-toggle.added_to_cart,';
		$output .= '.vc_tta-color-primary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-primary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus,';
		$output .= '.social-icons > li > a:hover';
		$output .= '{ background-color:'.$styling_primary_color_lighten.' }';

		// Primary Color (lighten) - border-color
		$output .= '.vc_tta-color-primary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-primary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus';
		$output .= '{ border-color:'.$styling_primary_color_lighten.' }';
	}


	/**
	 * Secondary Color
	 */
	if ( $styling_secondary_color != '#4d306e') { //don't output if option is default

		$styling_secondary_color_darken  = rocket_color_luminance($styling_secondary_color, -0.15);
		$styling_secondary_color_lighten = rocket_color_luminance($styling_secondary_color, 0.03);
		$styling_secondary_color_rgba_70 = rocket_hex2rgba($styling_secondary_color, 0.7);
		$styling_secondary_color_rgba_90 = rocket_hex2rgba($styling_secondary_color, 0.9);

		//color
		$output .= '.dotted-link2 .fa,';
		$output .= '.thumbnail .caption, .wp-caption .caption, .thumbnail .wp-caption-text, .wp-caption .wp-caption-text,';
		$output .= '.hgroup > h1, .hgroup > h2,';
		$output .= '.hgroup > h5,';
		$output .= '.section-title, .page-title .section-title,';
		$output .= '.section-desc,';
		$output .= '.btn-default:hover, .tagcloud > a:hover, .woocommerce-pagination > ul > li > .page-numbers:hover, .add_to_cart_button:hover, .added_to_cart:hover, .btn-default:focus, .tagcloud > a:focus, .woocommerce-pagination > ul > li > .page-numbers:focus, .add_to_cart_button:focus, .added_to_cart:focus, .btn-default.focus, .tagcloud > a.focus, .woocommerce-pagination > ul > li > .page-numbers.focus, .add_to_cart_button.focus, .added_to_cart.focus,';
		$output .= '.btn-default, .tagcloud > a, .woocommerce-pagination > ul > li > .page-numbers, a.button:not(.alt), button.button:not(.alt), input.button:not(.alt),';
		$output .= '.btn-default:hover, .tagcloud > a:hover, .woocommerce-pagination > ul > li > .page-numbers:hover, .btn-default:focus, .tagcloud > a:focus, .woocommerce-pagination > ul > li > .page-numbers:focus, .btn-default.focus, .tagcloud > a.focus, .woocommerce-pagination > ul > li > .page-numbers.focus, .btn-default:active, .tagcloud > a:active, .woocommerce-pagination > ul > li > .page-numbers:active, .btn-default.active, .tagcloud > a.active, .woocommerce-pagination > ul > li > .page-numbers.active, .open > .dropdown-toggle.btn-default, .open > .dropdown-toggle.tagcloud > a, .open > .dropdown-toggle.woocommerce-pagination > ul > li > .page-numbers,';
		$output .= '.btn-secondary .badge,';
		$output .= '.form-control, .input-text,';
		$output .= '.input-group-addon,';
		$output .= '.input-group-addon .fa,';
		$output .= '.bootstrap-select.btn-group .btn .caret:before,';
		$output .= '.panel-group__with-icons .panel-heading .panel-title > a .fa,';
		$output .= '.feature-icon__simple.icon-color2,';
		$output .= '.widget_archive > ul > li:before, .widget_nav_menu > ul > li:before, .widget_meta > ul > li:before, .widget_pages > ul > li:before, .widget_recent_comments > ul > li:before, .widget_recent_entries > ul > li:before, .widget_categories > ul > li:before, .widget_rss > ul > li:before, .widget_product_categories > ul > li:before, .widget_layered_nav > ul > li:before, .widget_layered_nav_filters > ul > li:before,';
		$output .= '.widget_search .btn:hover, .widget_product_search .btn:hover,';
		$output .= '.filter-trigger span,';
		$output .= '.filter-trigger .fa,';
		$output .= '.filter-trigger:hover, .filter-trigger:active, .filter-trigger:focus,';
		$output .= '.product-info .price ins,';
		$output .= '.map-canvas:before,';
		$output .= '.woocommerce div.product span.price, .woocommerce div.product p.price,';
		$output .= '.woocommerce ul.products li.product .product-footer .price .amount,';
		$output .= '.woocommerce .star-rating:before,';
		$output .= '.woocommerce.widget_shopping_cart .total .amount, .woocommerce .widget_shopping_cart .total .amount,';
		$output .= '.woocommerce form .form-row .select2-container .select2-choice,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-secondary .vc_icon_element-icon,';
		$output .= '.social-icons.social-icons__outline > li > a,';
		$output .= '.title-with-icon__icon-el_color_secondary,';
		$output .= '.pricetable-column-body>ul>li,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-secondary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-secondary .vc_cta3-content-header h4,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-secondary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-secondary .vc_cta3-content-header h4,';
		$output .= 'blockquote.blockquote:before,';
		$output .= '.vc_grid-filter > .vc_grid-filter-item > span,';
		$output .= '.link-circle';
		$output .= '{ color:'.$styling_secondary_color.' }';

		// FF Placeholder Text Color
		$output .= '.form-control::-moz-placeholder, .input-text::-moz-placeholder';
		$output .= '{ color:'.$styling_secondary_color.' }';

		// MS Placeholder Text Color
		$output .= '.form-control:-ms-input-placeholder, .input-text:-ms-input-placeholder';
		$output .= '{ color:'.$styling_secondary_color.' }';

		// Webkit Placeholder Text Color
		$output .= '.form-control::-webkit-input-placeholder, .input-text::-webkit-input-placeholder';
		$output .= '{ color:'.$styling_secondary_color.' }';

		//background-color
		$output .= '.thumbnail-overlay:before,';
		$output .= '.btn-default .badge, .tagcloud > a .badge, .woocommerce-pagination > ul > li > .page-numbers .badge,';
		$output .= '.btn-secondary,';
		$output .= '.btn-secondary.disabled, .btn-secondary[disabled], fieldset[disabled] .btn-secondary, .btn-secondary.disabled:hover, .btn-secondary[disabled]:hover, fieldset[disabled] .btn-secondary:hover, .btn-secondary.disabled:focus, .btn-secondary[disabled]:focus, fieldset[disabled] .btn-secondary:focus, .btn-secondary.disabled.focus, .btn-secondary[disabled].focus, fieldset[disabled] .btn-secondary.focus, .btn-secondary.disabled:active, .btn-secondary[disabled]:active, fieldset[disabled] .btn-secondary:active, .btn-secondary.disabled.active, .btn-secondary[disabled].active, fieldset[disabled] .btn-secondary.active,';
		$output .= '.circled-icon.icon-color-secondary,';
		$output .= '.jumbotron,';
		$output .= '.widget_flickr .flickr-feed > li > a:hover:before,';
		$output .= '.portfolio-feed .portfolio-item .portfolio-img > a:before,';
		$output .= '.mfp-bg,';
		$output .= '.woocommerce ul.products li.product .product-thumbnail:before,';
		$output .= '.rocket_counter-color__secondary,';
		$output .= '.person-info-link-classic:after,';
		$output .= '.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.pricetable-column-info:before,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-background-color-secondary.rocket_icon_box-background,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-secondary.vc_cta3-style-flat,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-secondary.vc_icon_element-background,';
		$output .= '.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-tab > a,';
		$output .= '.vc_pagination-color-secondary.vc_pagination-style-outline .vc_active .vc_pagination-trigger,';
		$output .= '.vc_pagination-color-secondary.vc_pagination-style-outline .vc_pagination-trigger:hover,';
		$output .= '.rocket__gitem_zone_b_vertical_flip,';
		$output .= '.rocket_gitem_zone_b_slide_from_top,';
		$output .= '.rocket__gitem_zone_b_go_top,';
		$output .= '.timeline > div > a .desc-holder:before';
		$output .= '{ background-color:'.$styling_secondary_color.' }';

		// background-color (rgba 70)
		$output .= '.vc_gitem-animate-goTop20 .vc_gitem-zone-b,';
		$output .= '.rocket__gitem_zone_b_slide_bottom_with_icon,';
		$output .= '.rocket__gitem_zone_b_no_animation,';
		$output .= '.rocket__gitem_zone_b_icon_slideout,';
		$output .= '.rocket__gitem_zone_b_overlay_with_rotation,';
		$output .= '.rocket__gitem_zone_b_grid_blur_out,';
		$output .= '.rocket__gitem_zone_b_scale_with_rotation';
		$output .= '{ background-color: ' . $styling_secondary_color_rgba_70 . '} ';

		// background-color (rgba 90)
		$output .= '.rocket__gitem_slide_out_from_right';
		$output .= '{ background-color: ' . $styling_secondary_color_rgba_90 . '} ';

		//border-color
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-secondary.vc_icon_element-outline,';
		$output .= '.social-icons.social-icons__outline > li > a,';
		$output .= '.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-secondary.vc_cta3-style-outline,';
		$output .= '.vc_pagination-color-secondary.vc_pagination-style-outline .vc_pagination-trigger';
		$output .= '{ border-color:'.$styling_secondary_color.'; }';

		//border-bottom-color
		$output .= '.hr-scroll-to a,';
		$output .= '.hr-scroll-bottom a';
		$output .= '{ border-bottom-color:'.$styling_secondary_color.' }';


		// background-color (lighten)
		$output .= '.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus';
		$output .= '{ background-color:'.$styling_secondary_color_lighten.' }';

		// border-color (lighten)
		$output .= '.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus';
		$output .= '{ border-color:'.$styling_secondary_color_lighten.' }';

		// background-color (darken)
		$output .= '.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-tab > a:hover, .vc_tta-color-secondary.vc_tta-style-classic .vc_tta-tab > a:focus';
		$output .= '{ background-color:'.$styling_secondary_color_darken.' }';

	}


	/**
	 * Tertiary Color
	 */
	if ( $styling_tertiary_color != '#d44546') { //don't output if option is default

		$styling_tertiary_color_darken  = rocket_color_luminance($styling_tertiary_color, -0.15);
		$styling_tertiary_color_lighten = rocket_color_luminance($styling_tertiary_color, 0.03);

		//color
		$output .= '.btn-danger .badge,';
		$output .= '.has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label,';
		$output .= '.has-error .input-group-addon,';
		$output .= '.has-error .input-group-addon .fa,';
		$output .= '.has-error .form-control-feedback,';
		$output .= '.contact-form .form-group label.error,';
		$output .= '.panel-danger > .panel-heading .badge,';
		$output .= '.current .progress-bar-danger + .progress-footer > h4,';
		$output .= '.feature-icon__simple.icon-color3,';
		$output .= '.woocommerce .widget_layered_nav ul li.chosen a:before,';
		$output .= '.woocommerce .widget_layered_nav_filters ul li a:before,';
		$output .= '.title-with-icon__icon-el_color_tertiary,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-color-tertiary .rocket_icon_box-icon,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-tertiary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-tertiary .vc_cta3-content-header h4,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-tertiary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-tertiary .vc_cta3-content-header h4,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-tertiary .vc_icon_element-icon';
		$output .= '{ color:'.$styling_tertiary_color.' }';

		//background-color
		$output .= '.btn-danger,';
		$output .= '.btn-danger.disabled, .btn-danger[disabled], fieldset[disabled] .btn-danger, .btn-danger.disabled:hover, .btn-danger[disabled]:hover, fieldset[disabled] .btn-danger:hover, .btn-danger.disabled:focus, .btn-danger[disabled]:focus, fieldset[disabled] .btn-danger:focus, .btn-danger.disabled.focus, .btn-danger[disabled].focus, fieldset[disabled] .btn-danger.focus, .btn-danger.disabled:active, .btn-danger[disabled]:active, fieldset[disabled] .btn-danger:active, .btn-danger.disabled.active, .btn-danger[disabled].active, fieldset[disabled] .btn-danger.active,';
		$output .= '.nav-pills > li > a,';
		$output .= '.panel-danger > .panel-heading,';
		$output .= '.circled-icon.icon-color-tertiary,';
		$output .= '.progress-bar-danger,';
		$output .= '.alert-danger, .woocommerce-error,';
		$output .= 'article.hentry .post-categories > li:nth-child(4n) > a,';
		$output .= '.countdown.countdown__color-circles .secs-count,';
		$output .= '.rocket_counter-color__tertiary,';
		$output .= '.vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-danger .vc_bar,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-background-color-tertiary.rocket_icon_box-background,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-tertiary.vc_cta3-style-flat,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-tertiary.vc_icon_element-background,';
		$output .= '.vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-tab > a,';
		$output .= '.vc_pagination-color-tertiary.vc_pagination-style-flat .vc_pagination-trigger';
		$output .= '{ background-color:'.$styling_tertiary_color.' }';

		//border-color
		$output .= '.has-error .form-control,';
		$output .= '.has-error .input-group-addon,';
		$output .= '.woocommerce form .form-row.woocommerce-invalid .select2-container, .woocommerce form .form-row.woocommerce-invalid input.input-text, .woocommerce form .form-row.woocommerce-invalid select,';
		$output .= '.vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-background-color-tertiary.rocket_icon_box-outline,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-tertiary.vc_cta3-style-outline,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-tertiary.vc_icon_element-outline';
		$output .= '{ border-color:'.$styling_tertiary_color.' }';

		// Tertiary Background Color (lighten)
		$styling_tertiary_color_lighten = rocket_color_luminance($styling_tertiary_color, 0.03);

		$output .= '.btn-danger:hover, .btn-danger:focus, .btn-danger.focus, .btn-danger:active, .btn-danger.active, .open > .dropdown-toggle.btn-danger,';
		$output .= '.nav-pills > li > a:hover';
		$output .= '{ background-color:'.$styling_tertiary_color_lighten.' }';

		// background-color (lighten)
		$output .= '.vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus';
		$output .= '{ background-color:'.$styling_tertiary_color_lighten.' }';

		// border-color (lighten)
		$output .= '.vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus';
		$output .= '{ border-color:'.$styling_tertiary_color_lighten.' }';

		// background-color (darken)
		$output .= '.vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-tab > a:hover, .vc_tta-color-tertiary.vc_tta-style-classic .vc_tta-tab > a:focus';
		$output .= '{ background-color:'.$styling_tertiary_color_darken.' }';
	}



	/**
	 * Quaternary Color
	 */
	if ( $styling_quaternary_color != '#ffa76c') { //don't output if option is default

		$styling_quaternary_color_darken  = rocket_color_luminance($styling_quaternary_color, -0.15);
		$styling_quaternary_color_lighten = rocket_color_luminance($styling_quaternary_color, 0.03);

		//color
		$output .= '.btn-warning .badge,';
		$output .= '.panel-warning > .panel-heading .badge,';
		$output .= '.current .progress-bar-warning + .progress-footer > h4,';
		$output .= '.feature-icon__simple.icon-color4,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-color-quaternary .rocket_icon_box-icon,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-quaternary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-classic.vc_cta3-color-quaternary .vc_cta3-content-header h4,';
		$output .= '.vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-quaternary .vc_cta3-content-header h2, .vc_general.vc_cta3.vc_cta3-style-outline.vc_cta3-color-quaternary .vc_cta3-content-header h4,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-quaternary .vc_icon_element-icon';
		$output .= '{ color:'.$styling_quaternary_color.' }';

		//background-color
		$output .= '.btn-warning,';
		$output .= '.btn-warning.disabled, .btn-warning[disabled], fieldset[disabled] .btn-warning, .btn-warning.disabled:hover, .btn-warning[disabled]:hover, fieldset[disabled] .btn-warning:hover, .btn-warning.disabled:focus, .btn-warning[disabled]:focus, fieldset[disabled] .btn-warning:focus, .btn-warning.disabled.focus, .btn-warning[disabled].focus, fieldset[disabled] .btn-warning.focus, .btn-warning.disabled:active, .btn-warning[disabled]:active, fieldset[disabled] .btn-warning:active, .btn-warning.disabled.active, .btn-warning[disabled].active, fieldset[disabled] .btn-warning.active,';
		$output .= '.panel-warning > .panel-heading,';
		$output .= '.circled-icon.icon-color-quaternary,';
		$output .= '.progress-bar-warning,';
		$output .= '.alert-warning,';
		$output .= 'article.hentry .post-categories > li:nth-child(odd) > a,';
		$output .= 'article.hentry .post-categories > li:nth-child(5n) > a,';
		$output .= '.countdown.countdown__color-circles .days-count,';
		$output .= '.rocket_counter-color__quaternary,';
		$output .= '.vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.title-with-icon__icon-el_color_quaternary,';
		$output .= '.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-warning .vc_bar,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-background-color-quaternary.rocket_icon_box-background,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-quaternary.vc_cta3-style-flat,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-quaternary.vc_icon_element-background,';
		$output .= '.vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-tab > a,';
		$output .= '.vc_pagination-color-quaternary.vc_pagination-style-flat .vc_pagination-trigger';
		$output .= '{ background-color:'.$styling_quaternary_color.' }';

		//border-color
		$output .= '.vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,';
		$output .= '.rocket_icon_box.rocket_icon_box-outer .rocket_icon_box-inner.rocket_icon_box-background-color-quaternary.rocket_icon_box-outline,';
		$output .= '.vc_general.vc_cta3.vc_cta3-color-quaternary.vc_cta3-style-outline,';
		$output .= '.vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-background-color-quaternary.vc_icon_element-outline';
		$output .= '{ border-color:'.$styling_quaternary_color.' }';

		// background-color (lighten)
		$output .= '.btn-warning:hover, .btn-warning:focus, .btn-warning.focus, .btn-warning:active, .btn-warning.active, .open > .dropdown-toggle.btn-warning,';
		$output .= '.vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus';
		$output .= '{ background-color:'.$styling_quaternary_color_lighten.' }';

		// border-color (lighten)
		$output .= '.vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover, .vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus';
		$output .= '{ border-color:'.$styling_quaternary_color_lighten.' }';

		// background-color (darken)
		$output .= '.vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-tab > a:hover, .vc_tta-color-quaternary.vc_tta-style-classic .vc_tta-tab > a:focus';
		$output .= '{ background-color:' . $styling_quaternary_color_darken . ' }';
	}


	/**
	 * Quinary Color
	 */
	if ( $styling_quinary_color != '#ea582f') { //don't output if option is default
		//color
		$output .= '.current .progress-bar-primary-alt + .progress-footer > h4';
		$output .= '{ color:'.$styling_quinary_color.' }';

		//background-color
		$output .= '.progress-bar-primary-alt,';
		$output .= '.countdown.countdown__color-circles .mins-count';
		$output .= '{ background-color:'.$styling_quinary_color.' }';
	}


	/**
	 * Senary Color
	 */
	if ( $styling_senary_color != '#746981') { //don't output if option is default
		//color
		$output .= 'h1, h2, h3, h4, h5, h6,';
		$output .= 'th,';
		$output .= 'table > thead > tr > th, .table > thead > tr > th, table > tbody > tr > th, .table > tbody > tr > th, table > tfoot > tr > th, .table > tfoot > tr > th, table > thead > tr > td, .table > thead > tr > td, table > tbody > tr > td, .table > tbody > tr > td, table > tfoot > tr > td, .table > tfoot > tr > td,';
		$output .= 'legend, .legend,';
		$output .= '.breadcrumb > li,';
		$output .= '.breadcrumb > li > a,';
		$output .= '.panel-default > .panel-heading,';
		$output .= '.widget_archive > ul > li > a, .widget_nav_menu > ul > li > a, .widget_meta > ul > li > a, .widget_pages > ul > li > a, .widget_recent_comments > ul > li > a, .widget_recent_entries > ul > li > a, .widget_categories > ul > li > a, .widget_rss > ul > li > a, .widget_product_categories > ul > li > a, .widget_layered_nav > ul > li > a, .widget_layered_nav_filters > ul > li > a,';
		$output .= '.widget_archive > ul ul.children li a, .widget_nav_menu > ul ul.children li a, .widget_meta > ul ul.children li a, .widget_pages > ul ul.children li a, .widget_recent_comments > ul ul.children li a, .widget_recent_entries > ul ul.children li a, .widget_categories > ul ul.children li a, .widget_rss > ul ul.children li a, .widget_product_categories > ul ul.children li a, .widget_layered_nav > ul ul.children li a, .widget_layered_nav_filters > ul ul.children li a,';
		$output .= '.navbar_no_mega ul.sub-menu li a,';
		$output .= '.header-cart .header-cart-dropdown,';
		$output .= '.header-cart .header-cart-dropdown .cart_list.product_list_widget > li a';
		$output .= '{ color:'.$styling_senary_color.' }';

		//background-color
		$output .= '.header-cart .cart-contents .cart-icon,';
		$output .= '.panel-default > .panel-heading .badge';
		$output .= '{ background-color:'.$styling_senary_color.' }';

		//border-color
		$output .= '#mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-flyout.mega-menu-item-has-children > a.mega-menu-link:after, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-flyout > a.mega-menu-link:after, #mega-menu-wrap-primary #mega-menu-primary > li.mega-menu-item-has-children > a.mega-menu-link:after,';
		$output .= '.navbar-search .navbar-search-icon';
		$output .= '{ border-color:'.$styling_senary_color.' }';

		//gradient
		$output .= '.title-with-icon h3:before';
		$output .= '{ background-image: -webkit-linear-gradient(left, rgba(116, 105, 129, 0.1) 0%, '.$styling_senary_color.' 100%); background-image: -o-linear-gradient(left, rgba(116, 105, 129, 0.1) 0%, '.$styling_senary_color.' 100%); background-image: linear-gradient(to right, rgba(116, 105, 129, 0.1) 0%, '.$styling_senary_color.' 100%); }';

		// Nonary color media queries
		//992px
		$output .= '@media (min-width: 992px) {';

			// background-color
			$output .= '.timeline:after';
			$output .= '{ background:' . $styling_senary_color . ' }';

			// background-color
			$output .= '.header-cart .cart-contents';
			$output .= '{ border-color:'.$styling_senary_color.' }';


		$output .= '}';
	}

	/**
	 * Septenary Color
	 */
	if ( $styling_septenary_color != '#d5d6d9') { //don't output if option is default
		//color
		// $output .= '.breadcrumb > li + li:before';
		// $output .= '{ color:'.$styling_septenary_color.' }';

		//background-color
		$output .= 'blockquote.blockquote:after';
		$output .= '{ background-color:'.$styling_septenary_color.' }';

		//border-color
		$output .= 'blockquote.blockquote:before,';
		$output .= '.bootstrap-select.btn-group button.btn.dropdown-toggle.selectpicker.btn-link .caret';
		$output .= '{ border-color:'.$styling_septenary_color.' }';

		//border-left-color
		$output .= 'blockquote.blockquote';
		$output .= '{ border-left-color:'.$styling_septenary_color.' }';

		//border-right-color
		$output .= 'blockquote.blockquote.blockquote-reverse';
		$output .= '{ border-right-color:'.$styling_septenary_color.' }';
	}


	/**
	 * Octonary Color
	 */
	if ( $styling_octonary_color != '#b59ecf') { //don't output if option is default
		//color
		$output .= '.pricetable-column-info .desc';
		$output .= '{ color: ' . $styling_octonary_color . ' }';

		//background-color

		//border-color
		$output .= '.rocket-nav.tparrows,';
		$output .= '.rocket-nav.tparrows:after,';
		$output .= '.pricetable-column-info .currency,';
		$output .= '.footer-social-links > li > a,';
		$output .= '.pricetable-column-info .discount';
		$output .= '{ border-color:' . $styling_octonary_color . ' }';
	}


	/**
	 * Nonary Color
	 */
	if ( $styling_nonary_color != '#836aa0') { //don't output if option is default
		//border-color
		$output .= '.page-template-template-under-construction .countdown .days-count:before, .page-template-template-under-construction .countdown .hours-count:before, .page-template-template-under-construction .countdown .mins-count:before, .page-template-template-under-construction .countdown .secs-count:before,';
		$output .= '.timeline > div > a .desc-holder:before';
		$output .= '{ border-color:' . $styling_nonary_color . ' }';



		// Nonary color media queries
		//992px
		$output .= '@media (min-width: 992px) {';

			// background-color
			$output .= '.timeline > div > a:hover .desc-holder:before, .timeline > div > a.timeline-step__active .desc-holder:before, .timeline > div > a.item-checkmark__active .desc-holder:before';
			$output .= '{ background:' . $styling_nonary_color . ' }';


		$output .= '}';
	}


	/**
	 * Layout Mode
	 */
	$layout_mode = $rocket_data['rocket__opt-layout'];
	if ( $layout_mode == 2 ) {
		$layout_border_radius = $rocket_data['rocket__layout-border-radius'];
		$layout_padding_bottom = $rocket_data['rocket__opt-layout-spacing']['margin-bottom'];
		$output    .= '.rocket_layout_boxed .page-wrapper {border-radius:' . $layout_border_radius . 'px;}';
	}


	/**
	 * Content Paddings
	 */
	if ( $rocket_data['rocket_opt-content-spacing'] == 1) {

		$content_padding_desktop = $rocket_data['rocket_opt-content-spacing-desktop'];
		$content_padding_tablet  = $rocket_data['rocket_opt-content-spacing-tablet'];
		$content_padding_mobile  = $rocket_data['rocket_opt-content-spacing-mobile'];

		$output    .= '.top-wrapper + .page-section { padding-top:' . $content_padding_mobile['padding-top'] . '}';
		$output    .= '.top-wrapper + .page-section { padding-bottom:' . $content_padding_mobile['padding-bottom'] . '}';

		$output    .= '@media (min-width: 768px) {';
			$output    .= '.top-wrapper + .page-section { padding-top:' . $content_padding_tablet['padding-top'] . '}';
			$output    .= '.top-wrapper + .page-section { padding-bottom:' . $content_padding_tablet['padding-bottom'] . '}';
		$output    .= '}';

		$output    .= '@media (min-width: 992px) {';
			$output    .= '.top-wrapper + .page-section { padding-top:' . $content_padding_desktop['padding-top'] . '}';
			$output    .= '.top-wrapper + .page-section { padding-bottom:' . $content_padding_desktop['padding-bottom'] . '}';
		$output    .= '}';
	}


	/**
	 * Header Paddings
	 */
	if ( $rocket_data['rocket_opt-header-spacing'] == 1) {

		$header_padding_desktop = $rocket_data['rocket_opt-header-spacing-desktop'];
		$header_padding_tablet  = $rocket_data['rocket_opt-header-spacing-tablet'];
		$header_padding_mobile  = $rocket_data['rocket_opt-header-spacing-mobile'];

		$output    .= '.top-wrapper .header:not(.affix) { padding-top:' . $header_padding_mobile['padding-top'] . '}';
		$output    .= '.top-wrapper .header:not(.affix) { padding-bottom:' . $header_padding_mobile['padding-bottom'] . '}';

		$output    .= '@media (min-width: 768px) {';
			$output    .= '.top-wrapper .header:not(.affix) { padding-top:' . $header_padding_tablet['padding-top'] . '}';
			$output    .= '.top-wrapper .header:not(.affix) { padding-bottom:' . $header_padding_tablet['padding-bottom'] . '}';
		$output    .= '}';

		$output    .= '@media (min-width: 992px) {';
			$output    .= '.top-wrapper .header:not(.affix) { padding-top:' . $header_padding_desktop['padding-top'] . '}';
			$output    .= '.top-wrapper .header:not(.affix) { padding-bottom:' . $header_padding_desktop['padding-bottom'] . '}';
		$output    .= '}';
	}


	/**
	 * Page Heading Top Padding
	 */
	if ( $rocket_data['rocket__opt-page-title-spacing-on'] == 1) {

		$page_heading_padding_desktop = $rocket_data['rocket__opt-page-title-spacing-desktop'];
		$page_heading_padding_tablet  = $rocket_data['rocket__opt-page-title-spacing-tablet'];
		$page_heading_padding_mobile  = $rocket_data['rocket__opt-page-title-spacing-mobile'];

		$output    .= '.top-wrapper + .page-title { padding-top:' . $page_heading_padding_mobile['padding-top'] . '}';

		$output    .= '@media (min-width: 768px) {';
			$output    .= '.top-wrapper + .page-title { padding-top:' . $page_heading_padding_tablet['padding-top'] . '}';
		$output    .= '}';

		$output    .= '@media (min-width: 992px) {';
			$output    .= '.top-wrapper + .page-title { padding-top:' . $page_heading_padding_desktop['padding-top'] . '}';
		$output    .= '}';
	}


	/**
	 * Search Form
	 */
	$search_form_bg = $rocket_data['rocket__opt-header-search-form-bg']['background-color'];
	if ( $rocket_data['rocket_opt-header-search-form'] == 1 && $search_form_bg != '#fff' ) {
		$output    .= '.form-search__nav:before {border-bottom-color:' . $search_form_bg . ';}';
	}


	/**
	 * Header Cart Icon
	 */
	if ( $rocket_data['rocket_opt-custom-header-cart'] == 1 ) {

		$header_cart_border_width = $rocket_data['rocket__opt-header-cart-icon-border']['border-top'];
		$header_cart_border_style = $rocket_data['rocket__opt-header-cart-icon-border']['border-style'];
		$header_cart_border_color = $rocket_data['rocket__opt-header-cart-icon-border']['border-color'];

		$output    .= '.header-cart .cart-contents .cart-icon:after {border-width:' . $header_cart_border_width . ';}';
		$output    .= '.header-cart .cart-contents .cart-icon:after {border-style:' . $header_cart_border_style . ';}';
		$output    .= '.header-cart .cart-contents .cart-icon:after {border-color:' . $header_cart_border_color . ';}';
	}


	/**
	 * Header Cart Icon Background Color
	 */
	if ( $rocket_data['rocket_opt-custom-header-cart'] == 1 ) {

		$header_cart_bg_regular = $rocket_data['rocket__opt-header-cart-icon-bg-color']['regular'];
		$header_cart_bg_hover   = $rocket_data['rocket__opt-header-cart-icon-bg-color']['hover'];
		$header_cart_bg_active  = $rocket_data['rocket__opt-header-cart-icon-bg-color']['active'];

		$output    .= '.header-cart .cart-contents .cart-icon {background-color:' . $header_cart_bg_regular . ';}';
		$output    .= '.header-cart .cart-contents .cart-icon:hover {background-color:' . $header_cart_bg_hover . ';}';
		$output    .= '.header-cart .cart-contents .cart-icon:active {background-color:' . $header_cart_bg_active . ';}';
	}

	/**
	 * Dropdown Cart Background Color
	 */
	$header_dropdown_cart_bg = $rocket_data['rocket__opt-header-cart-dropdown-bg-color']['background-color'];
	if ( $rocket_data['rocket_opt-custom-header-cart'] == 1 ) {
		$output    .= '.header-cart .cart-contents .cart-icon:before {border-bottom-color:' . $header_dropdown_cart_bg . ';}';
	}

	/**
	 * Logo Width
	 */
	$logo_width = $rocket_data['rocket__opt-logo-width']['width'];
	$output    .= '.header .logo img {max-width:' . $logo_width . '; width:' . $logo_width . ';}';


	/**
	 * Logo Width on Sticky
	 */
	$logo_width_sticky = $rocket_data['rocket__opt-logo-width-sticky']['width'];
	$output    .= '@media (min-width: 768px) {';
		$output    .= '.header.affix .logo img {max-width:' . $logo_width_sticky . '; width:' . $logo_width_sticky . '}';
	$output    .= '}';

	/**
	 * Logo Width on Mobile devices
	 */
	$logo_width_mobile = $rocket_data['rocket__opt-logo-width-mobile']['width'];
	$output    .= '@media (max-width: 767px) {';
		$output    .= '.header .logo img {max-width:' . $logo_width_mobile . '; width:' . $logo_width_mobile . ';}';
	$output    .= '}';

	/**
	 * Breadcrumbs
	 */
	$breadcrumbs_sep = $rocket_data['rocket__opt-page-title-breadcrumbs-sep-color'];

	if ( $rocket_data['rocket__opt-page-title-breadcrumbs'] == 1 && $rocket_data['rocket__custom_breadcrumbs'] == 1 ) {
		$output    .= '.breadcrumb > li + li:before {';
			$output    .= 'color: ' . $breadcrumbs_sep . ';';
		$output    .= '}';
	}


	/**
	 * Page Heading Dots
	 */
	if ( $rocket_data['rocket__opt-page-title-breadcrumbs-dots'] == 1 && $rocket_data['rocket__custom_page-title-breadcrumbs-dots'] == 1 ) {
		$page_heading_dots = $rocket_data['rocket__opt-page-title-breadcrumbs-dots-color'];
		$output    .= '.section-title-inner:before, .section-title-wrapper:before, .section-title-wrapper:after {';
			$output    .= 'background-color:' . $page_heading_dots . ';';
		$output    .= '}';
	}

	if ( $rocket_data['rocket__opt-page-title-breadcrumbs-dots'] != 1) {
		$output    .= '.section-title-inner:before, .section-title-wrapper:before, .section-title-wrapper:after {';
			$output    .= 'display:none;';
		$output    .= '}';
	}


	/**
	 * Form Text Transform
	 */
	if ( $rocket_data['rocket__custom_form_control_font'] ) {
		$form_element_text_transform = $rocket_data['rocket__opt-custom_form_control_font']['text-transform'];
		$output    .= '.form-control::-moz-placeholder, .input-text::-moz-placeholder, .select-style::-moz-placeholder {';
			$output    .= 'text-transform:' . $form_element_text_transform . ';';
		$output    .= '}';

		$output    .= '.form-control:-ms-input-placeholder, .input-text:-ms-input-placeholder, .select-style:-ms-input-placeholder {';
			$output    .= 'text-transform:' . $form_element_text_transform . ';';
		$output    .= '}';

		$output    .= '.form-control::-webkit-input-placeholder, .input-text::-webkit-input-placeholder, .select-style::-webkit-input-placeholder {';
			$output    .= 'text-transform:' . $form_element_text_transform . ';';
		$output    .= '}';
	}


	/**
	 * Read More link in the Post Footer
	 */
	if ( $rocket_data['rocket__opt-post-footer'] == 1 && $rocket_data['rocket__custom_blog-styling']) {
		$post_footer_more_link = $rocket_data['rocket__opt-post-footer-more-link'];

		// Regular
		$output    .= 'article.hentry .entry-footer .dotted-link2 {';
			$output    .= 'color:' . $post_footer_more_link['regular'] . ';';
		$output    .= '}';
		$output    .= 'article.hentry .entry-footer .dotted-link2 > span {';
			$output    .= 'border-bottom-color:' . $post_footer_more_link['regular'] . ';';
		$output    .= '}';

		// Hover
		$output    .= 'article.hentry .entry-footer .dotted-link2:hover {';
			$output    .= 'color:' . $post_footer_more_link['hover'] . ';';
		$output    .= '}';
		$output    .= 'article.hentry .entry-footer .dotted-link2:hover > span {';
			$output    .= 'border-bottom-color:' . $post_footer_more_link['hover'] . ';';
		$output    .= '}';

		// Active
		$output    .= 'article.hentry .entry-footer .dotted-link2:active {';
			$output    .= 'color:' . $post_footer_more_link['active'] . ';';
		$output    .= '}';
		$output    .= 'article.hentry .entry-footer .dotted-link2:active > span {';
			$output    .= 'border-bottom-color:' . $post_footer_more_link['active'] . ';';
		$output    .= '}';
	}


	/**
	 * Footer Dots
	 */
	if ( $rocket_data['rocket__opt-footer-dots'] == 1 && $rocket_data['rocket__custom-footer-colors'] == 1 ) {
		$page_heading_dots = $rocket_data['rocket__opt-footer-dots-color'];
		$output    .= '.footer-text div[class^="col-"]:after {';
			$output    .= 'background-color:' . $page_heading_dots . ';';
		$output    .= '}';
	}

	if ( $rocket_data['rocket__opt-footer-dots'] != 1 ) {
		$output    .= '.footer-text div[class^="col-"]:after, .footer-text div[class^="col-"]:before {';
			$output    .= 'display:none;';
		$output    .= '}';
	}


	/**
	 * Page Pre-Loader
	 */
	if ( $rocket_data['rocket__opt-pageloader'] == 1 && $rocket_data['rocket__custom_pageloader'] == 1 ) {
		$preloader_color  = $rocket_data['rocket__opt-pageloader-bar-color1'];
		$preloader_bg     = $rocket_data['rocket__opt-pageloader-bg']['background-color'];
		$preloader_size   = $rocket_data['rocket__opt-pageloader-spinner-size']['width'];
		$preloader_h_size = $preloader_size / 2;
		$output    .= '.page-loader .loader-inner {';
			$output    .= 'background: ' . $preloader_color . ';';
			$output    .= 'background: -moz-linear-gradient(left, ' . $preloader_color . ' 10%, ' . $preloader_bg . ' 42%);';
			$output    .= 'background: -webkit-linear-gradient(left, ' . $preloader_color . ' 10%, ' . $preloader_bg . ' 42%);';
			$output    .= 'background: -o-linear-gradient(left, ' . $preloader_color . ' 10%, ' . $preloader_bg . ' 42%);';
			$output    .= 'background: -ms-linear-gradient(left, ' . $preloader_color . ' 10%, ' . $preloader_bg . ' 42%);';
			$output    .= 'background: linear-gradient(to right, ' . $preloader_color . ' 10%, ' . $preloader_bg . ' 42%);';
		$output    .= '}';

		$output    .= '.page-loader .loader-inner:before {';
			$output    .= 'background: ' . $preloader_color . ';';
		$output    .= '}';


		$output    .= '.page-loader .loader-inner:after {';
			$output    .= 'background: ' . $preloader_bg . ';';
		$output    .= '}';

		$output .= '.page-loader .loader-inner {';
			$output .= 'height: ' . $preloader_size . ';';
			$output .= 'margin: -' . $preloader_h_size . 'px 0 0 -' . $preloader_h_size . 'px;';
		$output .= '}';
	}



	/**
	 * Page 404 Dots
	 */
	if ( $rocket_data['rocket__opt-404-hr-dots'] == 1 && $rocket_data['rocket__custom_404'] == 1 ) {
		$page_404_dots = $rocket_data['rocket__opt-404-dots-color'];
		$output    .= '.page-404-main .page-404-num:after, .page-404-header:after, .page-404-footer-label:after {';
			$output    .= 'background-color:' . $page_404_dots . ';';
		$output    .= '}';
	}

	if ( $rocket_data['rocket__opt-404-hr-dots'] != 1 ) {
		$output    .= '.page-404-main .page-404-num:before, .page-404-main .page-404-num:after, .page-404-header:before, .page-404-header:after, .page-404-footer-label:before, .page-404-footer-label:after {';
			$output    .= 'display:none;';
		$output    .= '}';
	}



	/**
	 * Page Coming Soon Title Dots
	 */
	if ( $rocket_data['rocket__opt-coming-title-divider'] && $rocket_data['rocket__custom_coming_soon'] == 1 ) {
			$coming_soon_dots = $rocket_data['rocket__opt-coming-title-divider-color'];
			$output    .= '.dots-divider > span {';
				$output    .= 'background-color: ' . $coming_soon_dots . ';';
			$output    .= '}';
	}



	/**
	 * Page Coming Soon - Counters Border Colors
	 */
	if ( is_page_template( 'template-coming-soon.php' ) ) {
		$output    .= '.page-template-template-coming-soon {';
			$output    .= 'background-color: ' . $rocket_data['rocket__opt-coming-bg']['background-color'] . ';';
			$output    .= 'background-image: url(' . $rocket_data['rocket__opt-coming-bg']['background-image'] . ');';
			$output    .= 'background-repeat: ' . $rocket_data['rocket__opt-coming-bg']['background-repeat'] . ';';
			$output    .= 'background-position: ' . $rocket_data['rocket__opt-coming-bg']['background-position'] . ';';
			$output    .= 'background-size: ' . $rocket_data['rocket__opt-coming-bg']['background-size'] . ';';
			$output    .= 'background-attachment: ' . $rocket_data['rocket__opt-coming-bg']['background-attachment'] . ';';
		$output    .= '}';

		if ( $rocket_data['rocket__custom_coming_soon'] == 1 ) {
			$coming_soon_days_border  = $rocket_data['rocket__opt-coming-days-border-color'];
			$coming_soon_hours_border = $rocket_data['rocket__opt-coming-hours-border-color'];
			$coming_soon_mins_border  = $rocket_data['rocket__opt-coming-mins-border-color'];
			$coming_soon_secs_border  = $rocket_data['rocket__opt-coming-secs-border-color'];

			$output    .= '.page-template-template-coming-soon .countdown.countdown__color-circles .days-count:before {';
				$output    .= 'border-color: ' . $coming_soon_days_border . ';';
			$output    .= '}';
			$output    .= '.page-template-template-coming-soon .countdown.countdown__color-circles .hours-count:before {';
				$output    .= 'border-color: ' . $coming_soon_hours_border . ';';
			$output    .= '}';
			$output    .= '.page-template-template-coming-soon .countdown.countdown__color-circles .mins-count:before {';
				$output    .= 'border-color: ' . $coming_soon_mins_border . ';';
			$output    .= '}';
			$output    .= '.page-template-template-coming-soon .countdown.countdown__color-circles .secs-count:before {';
				$output    .= 'border-color: ' . $coming_soon_secs_border . ';';
			$output    .= '}';


			$coming_soon_dots = $rocket_data['rocket__opt-coming-title-divider-color'];
			$output    .= '.dots-divider > span {';
				$output    .= 'background-color: ' . $coming_soon_dots . ';';
			$output    .= '}';
		}
	}


	/**
	 * Page Unders Construction
	 */
	if ( is_page_template( 'template-under-construction.php' ) ) {
		$output    .= '.page-template-template-under-construction {';
			$output    .= 'background-color: ' . $rocket_data['rocket__opt-under-construction-bg']['background-color'] . ';';
			$output    .= 'background-image: url(' . $rocket_data['rocket__opt-under-construction-bg']['background-image'] . ');';
			$output    .= 'background-repeat: ' . $rocket_data['rocket__opt-under-construction-bg']['background-repeat'] . ';';
			$output    .= 'background-position: ' . $rocket_data['rocket__opt-under-construction-bg']['background-position'] . ';';
			$output    .= 'background-size: ' . $rocket_data['rocket__opt-under-construction-bg']['background-size'] . ';';
			$output    .= 'background-attachment: ' . $rocket_data['rocket__opt-under-construction-bg']['background-attachment'] . ';';
		$output    .= '}';

		if ( $rocket_data['rocket__custom_under-construction'] == 1) {
			$under_construction_days_border  = $rocket_data['rocket__opt-under-construction-days-border-color'];
			$under_construction_hours_border = $rocket_data['rocket__opt-under-construction-hours-border-color'];
			$under_construction_mins_border  = $rocket_data['rocket__opt-under-construction-mins-border-color'];
			$under_construction_secs_border  = $rocket_data['rocket__opt-under-construction-secs-border-color'];

			$output    .= '.page-template-template-under-construction .countdown .days-count:before {';
				$output    .= 'border-color: ' . $under_construction_days_border . ';';
			$output    .= '}';
			$output    .= '.page-template-template-under-construction .countdown .hours-count:before {';
				$output    .= 'border-color: ' . $under_construction_hours_border . ';';
			$output    .= '}';
			$output    .= '.page-template-template-under-construction .countdown .mins-count:before {';
				$output    .= 'border-color: ' . $under_construction_mins_border . ';';
			$output    .= '}';
			$output    .= '.page-template-template-under-construction .countdown .secs-count:before {';
				$output    .= 'border-color: ' . $under_construction_secs_border . ';';
			$output    .= '}';

			$under_construction_dots = $rocket_data['rocket__opt-under-construction-title-divider-color'];
			$output    .= '.page-under-construction-header .dots-divider > span {';
				$output    .= 'background-color: ' . $under_construction_dots . ';';
			$output    .= '}';
		}
	}


	/**
	 * Back To Top button Background Colors
	 */
	$back_to_top_bg_regular = $rocket_data['rocket__opt-back-to-top-bg-color']['regular'];
	$back_to_top_bg_hover   = $rocket_data['rocket__opt-back-to-top-bg-color']['hover'];
	$back_to_top_bg_active  = $rocket_data['rocket__opt-back-to-top-bg-color']['active'];
	if ( $rocket_data['rocket__custom_back-to-top'] == 1 ) {
		$output    .= '#back-to-top-btn {background-color:' . $back_to_top_bg_regular . ';}';
		$output    .= '#back-to-top-btn:hover {background-color:' . $back_to_top_bg_hover . ';}';
		$output    .= '#back-to-top-btn:active {background-color:' . $back_to_top_bg_active . ';}';
	}

	/**
	 * Contact button Background Colors
	 */
	$contact_btn_bg_regular = $rocket_data['rocket__opt-contact-btn-bg-color']['regular'];
	$contact_btn_bg_hover   = $rocket_data['rocket__opt-contact-btn-bg-color']['hover'];
	$contact_btn_bg_active  = $rocket_data['rocket__opt-contact-btn-bg-color']['active'];
	$contact_btn_tooltip    = $rocket_data['rocket__opt-contact-btn-tooltip-color'];
	if ( $rocket_data['rocket__custom_contact-btn'] == 1 ) {
		$output    .= '#email-contact-btn {background-color:' . $contact_btn_bg_regular . ';}';
		$output    .= '#email-contact-btn:hover {background-color:' . $contact_btn_bg_hover . ';}';
		$output    .= '#email-contact-btn:active {background-color:' . $contact_btn_bg_active . ';}';
		$output    .= '.back-top .tooltip.left .tooltip-arrow { border-left-color:' . $contact_btn_tooltip . ' }';
	}


	/**
	 * Custom CSS
	 */
	$custom_css = $rocket_data['rocket__opt-custom-css'];
	if ($custom_css <> '') {
		$output .= $custom_css . "\n";
	}


	/**
	 * Output
	 */
	if ($output <> '') {
		$output = "<!-- Dynamic CSS--><style type=\"text/css\">\n" . $output . "</style>\n";
		echo !empty( $output ) ? $output : '';
	}
}

add_action('wp_head', 'rocket_custom_styling');
