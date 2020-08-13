<?php
/**
 * Template part for the Footer Separators.
 *
 * @package Rocket
 * @since Rocket 1.3.0
 */

$rocket_data = get_option('rocket_data');

// For Search page display Footer Separator from the Theme Options
if ( is_search() ) {
  $footer_sep  = '';
} else {
  $footer_sep  = get_post_meta( $post->ID, 'rocket_footer_separator', true );
}

// Check if Footer Separator set for the Page
if ( $footer_sep == '' || $footer_sep == 'default') {
  if ( isset($rocket_data['rocket__opt-footer-separator']) || !empty( $rocket_data['rocket__opt-footer-separator'] ) ) {
    $separator_type = $rocket_data['rocket__opt-footer-separator'];
  } else {
    $separator_type = 'waves_svg_separator';
  }
} else {
  $separator_type = $footer_sep;
}

// Check if set color for Footer Separator
if ( isset($rocket_data['rocket__opt_content_bg_color']) || !empty($rocket_data['rocket__opt_content_bg_color']) ) {
  $separator_shape_background = $rocket_data['rocket__opt_content_bg_color'];
} else {
  $separator_shape_background = '#f1f2f4';
}

// Display Footer Separator
if ( $separator_type == 'waves_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="1200" fill="' . $separator_shape_background . '" height="30" viewBox="0 0 1200 30" preserveAspectRatio="none"><path d="M0,0S1.209,1.508,200.671,7.031C375.088,15.751,454.658,30,600,30V0H0ZM1200,0s-90.21,1.511-200.671,7.034C824.911,15.751,745.342,30,600,30V0h600Z"/></svg>';
} elseif ( $separator_type == 'tilt_left_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="90" viewBox="0 0 1920 90" preserveAspectRatio="none"><path d="M0,0H1920L0,90V0Z"/></svg>';
} elseif ( $separator_type == 'tilt_right_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="90" viewBox="0 0 1920 90" preserveAspectRatio="none"><path d="M0,0H1920L0,90V0Z"/></svg>';
} elseif ( $separator_type == 'curve_right_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="1920" fill="' . $separator_shape_background . '" height="120" viewBox="0 0 1920 120" preserveAspectRatio="none"><path d="M0-17H1920V120.367C1460.94-138.181,0,105,0,105V-17Z"/></svg>';
} elseif ( $separator_type == 'curve_left_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="1920" fill="' . $separator_shape_background . '" height="120" viewBox="0 0 1920 120" preserveAspectRatio="none"><path d="M0-17H1920V120.367C1460.94-138.181,0,105,0,105V-17Z"/></svg>';
} elseif ( $separator_type == 'big_triangle_center_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="57" viewBox="0 0 1920 57" preserveAspectRatio="none"><path d="M0,0H960V57ZM1920,0H960V57Z"/></svg>';
} elseif ( $separator_type == 'triangle_center_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="148" fill="' . $separator_shape_background . '" height="57" viewBox="0 0 148 57" preserveAspectRatio="none"><path d="M0,0H74V57ZM148,0H74V57Z"/></svg>';
} elseif ( $separator_type == 'debris_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="50" viewBox="0 0 1920 50" preserveAspectRatio="none"><path d="M1920,0h-7.97l-5.79,8.357L1920,6.571V0ZM1606.81,32.054l-19.8,8.661L1603.46,49h0.01ZM1532.56,0l0.98,12.3L1544.87,0h-12.31Zm-71.74,0,3.02,1.4,0.74-1.4h-3.76ZM1385.4,0l0.97,12.3L1397.71,0H1385.4ZM706.6,0l11.333,12.3L718.907,0H706.6ZM639.734,0l0.741,1.4L643.488,0h-3.754ZM559.45,0l11.333,12.3L571.758,0H559.45ZM517.309,40.715l-19.8-8.661L500.853,49h0.01ZM122.566,0L133.9,12.3,134.874,0H122.566ZM55.7,0l0.74,1.4L59.455,0H55.7ZM12.551,28.431l9.388-16.565-15.755.643ZM3.99,4.792l16.7-3.307L20.47,0H6.946ZM35.211,7.715L50.965,8.358,46.227,0H38.3ZM78.375,1.047L63.362,13.64,77.891,26.234Zm6.8,1.874,12.631,9.429L98.867,0H89.544Zm28.307,26.808-1.344-16.962L94.3,32.13ZM108.345,6.665l10.32,1.715L111.524,0h-2.4ZM160.9,23.691l8.191-11.824L143.5,15.189ZM141.013,0.076l20.936,6.844L163.493,0H141.239Zm43.035,23.162-9.484-4.415-4.3,8.149ZM172.53,5.035l25.584,3.322L192.323,0h-9.488ZM203.591,1.4L206.6,0H202.85Zm10.647,25.44-1.63-18.967L199.977,17.3Zm9.974-4.132,9.256-10.866-10.32,1.715ZM242.7,0h-9.323L229,2.92l12.631,9.429Zm9.478,6.666,10.32,1.715L255.353,0h-2.4Zm27.584,31.171,2.888-19.1-16.705-3.307ZM277.728,12.3L278.7,0H266.4Zm25.8,16.129,1.527-17.87-15.859.6Zm-8.56-23.639,16.7-3.307L311.447,0H297.924Zm23.254,4.274,15.86,0.6L333.256,0h-7.509Zm-5.686,16.726,20.947-6.57-10.6-7.268Zm28.621,1.824L324.244,29.6l20.041,17.075Zm20.229-.776L359.757,7.874,347.126,17.3ZM351.909,8.269L362.509,1l-3.2-1H345.724ZM376.152,2.92l12.631,9.429L389.844,0h-9.322ZM371.36,22.709l9.256-10.866L370.3,13.558ZM399.323,6.665L406.165,7.8l0.333-.23-0.141.262,3.286,0.546L402.5,0h-2.4Zm-21.308,20.62,19.18-2.4,9.162-17.049L406.165,7.8Zm51.779-8.545-16.7-3.307,13.817,22.4Zm5.125-6.508,0.374-.01L428.724,0H417.242Zm0,0-4.482.121,21.845,10.455,7.185-11.239-24.174.654,0.231,0.429Zm7.2-7.44,16.705-3.307L458.6,0H445.073Zm17.347,3.079,29.03,0.785L482.957,0h-7.04Zm1.779,19.1,13.783-3.734-9.483-4.415Zm25.821,0.645L470.15,29.6l20.041,17.075Zm7.5-26.216L497.582,0h-3.754Zm12.724,25.44L505.663,7.874,493.032,17.3ZM522.058,2.92l12.631,9.429L535.75,0h-9.322Zm-4.792,19.789,9.256-10.866L516.2,13.558ZM541.757,7.922L523.921,27.285l19.18-2.4Zm3.472-1.256,10.32,1.715L548.408,0H546Zm51.354,21.765,9.389-16.565-15.755.643ZM588.022,4.792l16.7-3.307L604.5,0H590.979Zm31.221,2.923L635,8.358,630.26,0h-7.931Zm43.164-6.668L647.4,13.64l14.528,12.594Zm6.8,1.874,12.631,9.429L682.9,0h-9.323Zm28.307,26.808-1.345-16.962L678.334,32.13ZM692.377,6.665L702.7,8.381,695.556,0h-2.4ZM744.93,23.691l8.19-11.824-25.584,3.323ZM725.046,0.076l20.936,6.844L747.525,0H725.271ZM768.08,23.238L758.6,18.823l-4.3,8.149Zm-11.518-18.2,25.585,3.322L776.356,0h-9.488ZM787.623,1.4L790.636,0h-3.753Zm10.647,25.44L796.641,7.874,784.01,17.3Zm9.974-4.132L817.5,11.843l-10.32,1.715ZM826.728,0h-9.323l-4.369,2.92,12.631,9.429Zm9.479,6.666,10.32,1.715L839.385,0h-2.4Zm27.584,31.171,2.887-19.1-16.7-3.307ZM861.761,12.3L862.736,0H850.428Zm25.8,16.129,1.527-17.87-15.86.6ZM879,4.792l16.705-3.307L895.48,0H881.956Zm23.254,4.274,15.86,0.6L917.288,0h-7.509Zm36.187,2.078-15.325,3.684,9.345,14.389ZM896.569,25.793l20.947-6.57-10.6-7.268Zm28.621,1.824L908.276,29.6l20.041,17.075Zm5.882-19.2,12.607-2.5L936.786,0h-7.744ZM960.185,2.92l12.631,9.429L973.877,0h-9.323Zm-4.792,19.789,9.256-10.866-10.32,1.715ZM983.355,6.665L990.2,7.8l0.332-.23-0.141.262,3.286,0.546L986.534,0h-2.4Zm-21.307,20.62,19.18-2.4,9.161-17.049L990.2,7.8Zm51.782-8.545-16.708-3.307,13.818,22.4Zm5.12-6.508,0.38-.01L1012.76,0h-11.49Zm0,0-4.48.121,21.84,10.455,7.19-11.239-24.17.654,0.23,0.429Zm6.72-10.83,0.74-1.4h-3.75Zm0.48,3.391,16.7-3.307L1042.63,0H1029.1Zm17.35,3.079,29.03,0.785L1066.99,0h-7.04Zm24.46,14.935,21.85-10.454-29.03-.785ZM1078.6,1.4l3.01-1.4h-3.75Zm14.74,36.435,13.82-22.4-16.71,3.307Zm0.52-35.071,17.08-2.7L1110.91,0H1095.2Zm16.75,5.615,3.28-.546-0.14-.262,0.33,0.23,6.85-1.138L1120.15,0h-2.4Zm12.45,16.5,19.18,2.4L1114.08,7.8l-0.19.031Zm25.83-2.175,1.07-9.151-10.32-1.715Zm-17.42-10.36L1144.1,2.92,1139.73,0h-9.32Zm29.14-6.434,12.61,2.5L1175.25,0h-7.75Zm25.56,3.749,15.87-.6L1194.51,0H1187Zm11.21,2.29-10.61,7.268,20.95,6.57Zm-31.53-.81,5.98,18.073,9.34-14.388Zm13.25,16.473-3.13,19.058L1196.01,29.6Zm37.63,0.814,14.33-17.273-15.86-.6Zm-8.14-26.945,16.7,3.307L1222.34,0h-13.53Zm31.91,36.351,13.82-22.4-16.7,3.307Zm2.03-25.534L1253.87,0h-12.31Zm15.24-3.921,10.32-1.715L1267.31,0h-2.4Zm38.28,14.328,1.07-9.151-10.32-1.715Zm-17.42-10.36,12.63-9.429L1286.89,0h-9.32Zm27.4,14.492,14.26-9.537-12.63-9.43ZM1316.68,1.4l0.74-1.4h-3.76Zm19.54,21.837,13.79,3.734-4.3-8.149ZM1322.15,8.357l25.59-3.322L1337.43,0h-9.48Zm37.22,15.334,17.4-8.5-25.59-3.323Zm-1.05-16.771,20.94-6.844L1379.03,0h-22.25Zm43.29,1.46,10.32-1.715L1411.16,0h-2.41Zm5.18,21.347,19.19,2.4-17.84-19.364Zm15.68-17.379L1435.1,2.92,1430.73,0h-9.32Zm34.45,1.291L1441.9,1.047l0.49,25.188Zm12.4-5.282,15.75-.643L1481.99,0h-7.94Zm38.41,20.073,6.37-15.922-15.76-.643Zm-8.14-26.945,16.71,3.307L1513.34,0h-13.53Zm49.18,6.9,10.32-1.715L1558.32,0h-2.41Zm20.86,3.968,12.63-9.429L1577.89,0h-9.32Zm-8.41,12.535,19.18,2.4L1562.56,7.922Zm26.9-11.325-10.32-1.715,9.26,10.866Zm8.91,13.283,14.26-9.537-12.63-9.43ZM1609.76,1.4L1610.5,0h-3.76Zm4.37,45.274L1634.18,29.6l-16.92-1.983Zm24.66-27.852-9.49,4.415,13.79,3.734ZM1615.83,8.656l29.04-.785L1628.41,0h-7.04Zm29.68-7.171,16.7,3.307L1659.26,0h-13.53Zm45.73,13.947-16.7,3.307,2.88,19.1Zm-22.2-3.211,0.37,0.01L1687.09,0h-11.48Zm0,0-24.18-.654,7.19,11.239,21.84-10.454-4.48-.121-0.6.418Zm25.65-3.841,3.29-.546-0.14-.262,0.33,0.23,6.84-1.138L1704.24,0h-2.41Zm12.45,16.5,19.18,2.4L1698.17,7.8l-0.19.031Zm25.84-2.175,1.06-9.151-10.32-1.715Zm-17.43-10.36,12.63-9.429L1723.81,0h-9.32Zm27.4,14.492,14.26-9.537-12.63-9.43ZM1745.03,0l-3.2,1,10.6,7.266L1758.61,0h-13.58Zm25.23,9.664,15.86-.6L1778.59,0h-7.51Zm-10.21,37.011L1780.1,29.6l-16.92-1.983Zm21.41-34.721-10.6,7.268,20.94,6.57Zm19.35,16.476,14.34-17.273-15.86-.6Zm-8.14-26.945,16.7,3.307L1806.42,0h-13.53Zm31.92,36.351,13.81-22.4-16.7,3.307Zm2.03-25.534L1837.95,0h-12.31Zm15.23-3.921,10.32-1.715L1851.4,0h-2.41Zm38.29,14.328,1.06-9.151-10.32-1.715Zm-17.43-10.36,12.63-9.429L1870.97,0h-9.32Zm27.4,14.492,14.26-9.537-12.63-9.43ZM1900.76,1.4L1901.5,0h-3.75ZM1043.19,32l9.99-9,20,11Z"/></svg>';
} elseif ( $separator_type == 'hills_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="63" viewBox="0 0 1920 63" preserveAspectRatio="none"><path d="M1949,25l-62,23-28-6-43,9-59-21-74,14-41-10-83,11-25-15-73,17-30-19-24,12h-47l-24,13-23-9-45,8-39-8-28,9-41-14-65,1-30-4-21,20L986,45,942,63,910,45,836,62,781,41,734,53,706,38l-98,7-20-6L502,56l-56-9L402,61,363,51l-57,8-22-7L244,63,220,42l-37,9s-26.452-11.727-31-12-51,19-51,19L82,53,43,43,11,61-15,0H1953Z"/></svg>';
} elseif ( $separator_type == 'drops_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="130" viewBox="0 0 1920 130" preserveAspectRatio="none"><path d="M1920,36.591c-4.6-2.913-9.84-3.965-14.12-1.044-4.24,2.9-4.65,7.532-5.67,11.849-2.02,8.633.57,16.976,1.92,25.391a50.69,50.69,0,0,1,.64,5.89c0.1,2.322-.21,4.715-2.8,5.53-2.94.926-5.18-.641-6.69-3-0.99-1.536-1.02-3.437-1.08-5.313-0.28-8.955.78-17.931-.69-26.875-1.72-10.473-5.81-12.291-13.34-13.377-5.15-.743-10.43-0.363-14.58,3.65-0.25,1.971-3.5,2.547-2.38,5.146-2.74,4.491-2.16,9.674-3.02,14.555-0.37,2.058-.28,4.66-2.76,5.149-2.84.564-4.11-1.894-4.84-4.123a65.19,65.19,0,0,1-1.95-8.318c-0.49-2.65-.42-6.731-3.6-6.354-3.28.387-2.6,4.538-2.39,7.257,0.47,6.283,2.27,12.433,1.97,18.811-0.12,2.347-.41,4.6-3.18,5.168a5.356,5.356,0,0,1-6.28-2.883,12.934,12.934,0,0,1-1.34-7.963q1.275-8.93,2.07-17.924c0.64-7.345-6.65-14.922-15.37-11.053-7.84,3.478-15.12,7.846-22.45,12.138a52.5,52.5,0,0,1-10.95,4.624,12.218,12.218,0,0,1-11.58-2.217c-1.88-1.44-3.76-2.884-5.71-4.22-4.87-3.332-9.44-1.955-11.61,3.517-1.25,3.166-1.99,6.543-3.74,9.509-2.34,3.979-4.95,6.371-9.96,2.024-3.5-3.041-5.54-7.357-9.19-10.289-2.59-2.073-5.08-4.432-8.63-2.832-3.62,1.624-5.43,4.816-5.78,8.668-0.84,9.256.12,18.4,1.82,27.51a61.537,61.537,0,0,1,1.17,13.353c-0.16,4.578-1.9,7.041-5.41,7.328-3.94.322-7.13-2.31-7.88-6.543-1.31-7.358-.05-14.681.36-22.011,0.42-7.493,1.03-14.971-.35-22.441-0.68-3.657-2.55-6.368-6.12-7.372-3.43-.963-6.41.4-9.02,2.735-4.5,4.012-7.47,9.4-12.36,13.1-5.36,4.055-8.78,4.014-13.28-.958-1.66-1.843-3.06-3.916-5.33-5.146a8.618,8.618,0,0,0-11.83,3.353c-1.87,3.2-2.12,6.764-2.31,10.309-0.44,8.117,1.16,36.046,2.62,43.96a29.587,29.587,0,0,1,.48,6.692c-0.18,4.579-2.8,7.382-6.8,7.439-3.57.049-6.39-3.38-6.74-7.764-0.5-6.363,1.59-12.408,2.03-18.641,0.82-11.708.26-43.1-8.83-52.1a18.017,18.017,0,0,0-7.62-4.637,5.1,5.1,0,0,1-1.71-.846,7.921,7.921,0,0,1-1.93-.363c-3.25-.951-6.74-1.887-10.42-0.555-2.44.882-3.38,2.018-3.29,4.492,0.31,8.155,2.38,16.045,3.53,24.073,0.44,3.125.75,6.273,1,9.42,0.29,3.6-1.12,5.8-5.06,5.867-3.65.065-6.14-1.789-6.54-5.343a67.175,67.175,0,0,1,.39-15.713,53.046,53.046,0,0,0-2.19-23.658c-2.07-6.073-6.91-8.783-12.21-3.027-1.59,1.737-3.17,3.5-4.67,5.317-5.03,6.077-10.05,6.814-16.4,2.051-3.65-2.737-6.95-5.93-10.54-8.748-5.02-3.939-11.23-5.834-16.14-2.475-4.25,2.9-4.66,7.532-5.67,11.848-2.03,8.634.56,16.977,1.92,25.393a50.637,50.637,0,0,1,.63,5.89c0.11,2.321-.21,4.715-2.8,5.53-2.93.925-5.18-.641-6.69-3-0.98-1.535-1.01-3.437-1.07-5.312-0.29-8.956.78-17.931-.7-26.875-1.72-10.473-5.81-12.291-13.34-13.377-5.15-.744-10.42-0.363-14.58,3.65-0.24,1.97-3.5,2.547-2.38,5.147-2.74,4.49-2.16,9.673-3.02,14.554-0.36,2.058-.28,4.659-2.75,5.149-2.85.563-4.12-1.893-4.85-4.123a65.139,65.139,0,0,1-1.94-8.319c-0.5-2.649-.42-6.73-3.61-6.353-3.28.387-2.59,4.538-2.39,7.257,0.48,6.283,2.28,12.432,1.97,18.81-0.11,2.347-.4,4.6-3.18,5.169a5.357,5.357,0,0,1-6.28-2.884,12.932,12.932,0,0,1-1.33-7.964c0.84-5.953,1.54-11.933,2.06-17.924,0.64-7.343-6.64-14.922-15.37-11.053-7.84,3.478-15.11,7.846-22.44,12.138a52.32,52.32,0,0,1-10.96,4.625,12.218,12.218,0,0,1-11.58-2.217c-1.88-1.439-3.76-2.884-5.71-4.219-4.86-3.333-9.43-1.956-11.6,3.517-1.26,3.166-1.99,6.542-3.74,9.509-2.35,3.978-4.95,6.371-9.96,2.024-3.51-3.041-5.55-7.356-9.2-10.289-2.58-2.073-5.07-4.432-8.63-2.832-3.61,1.625-5.42,4.817-5.77,8.667-0.84,9.256.12,8.4,1.82,17.506a60.917,60.917,0,0,1,1.16,13.353c-0.16,4.578-1.89,7.04-5.41,7.328-3.94.322-7.13-2.31-7.88-6.543-1.31-7.359-.04-14.68.37-22.011,0.41-7.492,1.02-4.966-.36-12.436-0.68-3.656-2.54-6.369-6.11-7.372-3.43-.964-6.41.4-9.02,2.735-4.5,4.012-7.48,9.4-12.37,13.1-5.36,4.055-8.78,4.014-13.27-.957-1.67-1.844-3.07-3.916-5.33-5.146a8.619,8.619,0,0,0-11.83,3.353c-1.88,3.2-2.13,6.764-2.32,10.309-0.44,8.117,1.16,16.036,2.63,23.95a30.169,30.169,0,0,1,.48,6.692c-0.19,4.579-2.81,7.382-6.81,7.438-3.57.05-6.38-3.378-6.73-7.764-0.51-6.362,1.59-12.407,2.02-18.639,0.82-11.709.27-23.088-8.82-32.095a18.1,18.1,0,0,0-7.62-4.636,4.772,4.772,0,0,1-2.16-1.246,10.6,10.6,0,0,1-1.31-.3c-3.25-.952-6.74-1.888-10.42-0.555-2.44.882-3.38,2.018-3.28,4.491,0.3,8.156,2.37,16.045,3.52,24.074,0.44,3.123.75,6.273,1,9.42,0.29,3.6-1.11,5.8-5.06,5.866-3.65.064-6.14-1.788-6.54-5.343a67.191,67.191,0,0,1,.39-15.714,53.039,53.039,0,0,0-2.19-23.656c-2.07-6.073-6.91-8.783-12.21-3.028-1.59,1.737-3.17,3.5-4.67,5.317-5.03,6.078-10.05,6.815-16.4,2.051-3.65-2.739-6.95-5.93-10.54-8.749-5.02-3.939-11.23-5.834-16.14-2.475-4.25,2.9-4.66,7.533-5.67,11.849-2.03,8.634.56,16.976,1.92,25.391a50.673,50.673,0,0,1,.63,5.89c0.11,2.322-.21,4.715-2.8,5.53-2.93.926-5.18-.641-6.69-2.995-0.98-1.536-1.01-3.437-1.07-5.313-0.29-8.955.78-17.93-.69-26.875-1.73-10.473-5.82-12.291-13.35-13.377-5.15-.743-10.42-0.362-14.58,3.651-0.24,1.97-3.5,2.547-2.38,5.145-2.73,4.491-2.16,9.674-3.02,14.555-0.36,2.057-.28,4.659-2.75,5.149-2.85.564-4.12-1.893-4.85-4.123a65.123,65.123,0,0,1-1.94-8.318c-0.5-2.65-.42-6.731-3.61-6.353-3.28.386-2.59,4.538-2.39,7.256-0.34-4.633-.38,34.867-7.49,21.1a12.93,12.93,0,0,1-1.33-7.963c0.84-5.953,1.54-11.934,2.06-17.924,0.64-7.344-6.64-14.922-15.37-11.053-7.84,3.477-15.11,7.846-22.44,12.138a52.357,52.357,0,0,1-10.96,4.625,12.22,12.22,0,0,1-11.58-2.218c-1.87-1.44-3.76-2.884-5.71-4.22-4.86-3.332-9.43-1.954-11.6,3.517-1.26,3.167-1.99,6.543-3.74,9.509-2.35,3.979-4.95,6.371-9.96,2.025-3.51-3.041-5.55-7.357-9.2-10.289-2.581-2.074-5.072-4.433-8.63-2.832-3.611,1.623-5.423,4.816-5.773,8.667-0.84,9.256.12,8.4,1.82,17.506a61.225,61.225,0,0,1,1.166,13.352c-0.158,4.578-1.9,7.041-5.411,7.328-3.937.321-7.13-2.31-7.882-6.544-1.305-7.358-.042-14.68.367-22.011,0.417-7.492,1.027-4.966-.357-12.435-0.677-3.657-2.541-6.369-6.114-7.373-3.43-.963-6.407.4-9.021,2.735-4.5,4.013-7.473,9.4-12.36,13.1-5.361,4.055-8.785,4.013-13.278-.957-1.666-1.844-3.064-3.916-5.332-5.147a8.618,8.618,0,0,0-11.829,3.354c-1.872,3.2-2.125,6.763-2.315,10.308-0.436,8.118,1.16,6.032,2.627,13.945a29.941,29.941,0,0,1,.48,6.693c-0.187,4.578-2.8,7.382-6.808,7.438-3.569.049-6.38-3.379-6.731-7.764-0.509-6.363,1.587-2.4,2.023-8.635,0.818-11.709.267-23.087-8.823-32.094a18.053,18.053,0,0,0-7.623-4.636,4.331,4.331,0,0,1-3.065-2.7,13.344,13.344,0,0,0-7.825.148c-2.437.882-3.377,2.018-3.283,4.491,0.307,8.156,2.375,16.045,3.523,24.074,0.446,3.123.751,6.273,1,9.42,0.288,3.6-1.115,5.8-5.06,5.866-3.652.064-6.145-1.788-6.543-5.343a67.792,67.792,0,0,1,.388-15.714,53.023,53.023,0,0,0-2.186-23.656c-2.07-6.073-6.912-8.783-12.205-3.028-1.6,1.737-3.171,3.5-4.676,5.317-5.032,6.078-10.048,6.815-16.394,2.051-3.649-2.739-6.953-5.93-10.546-8.749-5.021-3.939-11.225-5.834-16.14-2.475-4.246,2.9-4.656,7.533-5.67,11.849-2.026,8.634.564,16.976,1.92,25.391a51.124,51.124,0,0,1,.636,5.89c0.1,2.322-.212,4.715-2.8,5.53-2.939.926-5.183-.641-6.693-2.995-0.986-1.536-1.014-3.437-1.074-5.313-0.284-8.955.78-17.93-.692-26.875-1.724-10.473-5.812-12.291-13.34-13.377-5.153-.743-10.428-0.362-14.583,3.651-0.243,1.97-3.5,2.547-2.378,5.145-2.739,4.491-2.16,9.674-3.024,14.555-0.363,2.057-.275,4.659-2.751,5.149-2.849.564-4.119-1.893-4.849-4.123a65.473,65.473,0,0,1-1.943-8.318c-0.5-2.65-.419-6.731-3.605-6.353-3.28.386-2.593,4.538-2.388,7.256,0.474,6.283,2.272,12.433,1.968,18.811-0.113,2.347-.405,4.6-3.18,5.168a5.355,5.355,0,0,1-6.278-2.884,12.92,12.92,0,0,1-1.339-7.963q1.27-8.93,2.068-17.924c0.64-7.344-6.646-14.922-15.371-11.053-7.841,3.477-15.115,7.846-22.444,12.138a52.429,52.429,0,0,1-10.955,4.625,12.213,12.213,0,0,1-11.578-2.218c-1.88-1.44-3.76-2.884-5.712-4.22-4.866-3.332-9.436-1.954-11.607,3.517-1.256,3.167-1.989,6.543-3.739,9.509-2.347,3.979-4.949,6.371-9.959,2.025-3.506-3.041-5.544-7.357-9.2-10.289-2.581-2.074-5.072-4.433-8.63-2.832-3.611,1.623-5.423,4.816-5.773,8.667-0.84,9.256.119,18.4,1.819,27.511a61.155,61.155,0,0,1,1.167,13.352c-0.158,4.578-1.895,7.041-5.411,7.328-3.937.321-7.13-2.31-7.882-6.543-1.3-7.358-.042-14.681.367-22.011,0.417-7.493,1.027-14.971-.357-22.44-0.677-3.657-2.541-6.369-6.114-7.373-3.431-.963-6.407.4-9.021,2.735-4.5,4.013-7.473,9.4-12.36,13.1-5.361,4.055-8.785,4.013-13.278-.957-1.666-1.844-3.064-3.916-5.332-5.147a8.619,8.619,0,0,0-11.83,3.354c-1.871,3.2-2.124,6.763-2.314,10.308-0.436,8.118,1.159,16.037,2.627,23.951a29.877,29.877,0,0,1,.479,6.692c-0.187,4.578-2.8,7.382-6.807,7.438-3.569.05-6.381-3.378-6.732-7.763-0.508-6.363,1.588-12.408,2.023-18.64,0.818-11.709.268-23.087-8.823-32.094a18.05,18.05,0,0,0-7.622-4.636,4.617,4.617,0,0,1-2.5-1.64,7.9,7.9,0,0,1-1.936-.362c-3.248-.952-6.741-1.888-10.425-0.555-2.436.882-3.376,2.018-3.282,4.491,0.307,8.156,2.375,16.045,3.523,24.074,0.446,3.123.75,6.273,1,9.42,0.288,3.6-1.115,5.8-5.06,5.866-3.652.064-6.145-1.788-6.543-5.343a67.737,67.737,0,0,1,.388-15.714,53.023,53.023,0,0,0-2.186-23.656c-2.07-6.073-6.912-8.783-12.205-3.028-1.6,1.737-3.171,3.5-4.676,5.317-5.032,6.078-10.048,6.815-16.394,2.051-3.65-2.739-6.953-5.93-10.546-8.749-5.021-3.939-11.225-5.834-16.14-2.475-4.246,2.9-4.656,7.533-5.67,11.849-2.026,8.634.564,16.976,1.92,25.391a51.346,51.346,0,0,1,.636,5.89c0.1,2.322-.212,4.715-2.8,5.53-2.938.926-5.182-.641-6.692-2.995-0.986-1.536-1.015-3.437-1.074-5.313-0.284-8.955.78-17.93-.692-26.875-1.724-10.473-5.812-12.291-13.34-13.377-5.154-.743-10.428-0.362-14.583,3.651-0.243,1.97-3.5,2.547-2.378,5.145-2.739,4.491-2.161,9.674-3.024,14.555-0.363,2.057-.276,4.659-2.751,5.149-2.849.564-4.12-1.893-4.849-4.123a65.473,65.473,0,0,1-1.943-8.318c-0.5-2.65-.419-6.731-3.605-6.353-3.28.386-2.593,4.538-2.388,7.256,0.473,6.283,2.272,12.433,1.967,18.811-0.112,2.347-.4,4.6-3.18,5.168a5.356,5.356,0,0,1-6.278-2.884,12.926,12.926,0,0,1-1.338-7.963q1.27-8.93,2.068-17.924c0.639-7.344-6.646-14.922-15.371-11.053-7.841,3.477-15.115,7.846-22.444,12.138a52.452,52.452,0,0,1-10.955,4.625,12.213,12.213,0,0,1-11.578-2.218c-1.88-1.44-3.761-2.884-5.712-4.22-4.866-3.332-9.437-1.954-11.608,3.517-1.255,3.167-1.988,6.543-3.738,9.509-2.347,3.979-4.949,6.371-9.959,2.025-3.506-3.041-5.544-7.357-9.2-10.289-2.581-2.074-5.072-4.433-8.63-2.832-3.611,1.623-5.424,4.816-5.773,8.667-0.84,9.256.119,8.4,1.819,17.506a61.164,61.164,0,0,1,1.167,13.352c-0.158,4.578-1.895,7.041-5.411,7.328-3.938.321-7.131-2.31-7.882-6.544-1.306-7.358-.042-4.675.366-12.005,0.418-7.493,1.028-14.971-.356-22.44-0.677-3.657-2.541-6.369-6.114-7.373-3.431-.963-6.407.4-9.021,2.735-4.5,4.013-7.474,9.4-12.36,13.1-5.361,4.055-8.786,4.013-13.279-.957-1.665-1.844-3.063-3.916-5.331-5.147a8.619,8.619,0,0,0-11.83,3.354c-1.871,3.2-2.124,6.763-2.315,10.308-0.435,8.118,1.16,6.032,2.627,13.945a29.823,29.823,0,0,1,.48,6.693c-0.187,4.578-2.8,7.382-6.807,7.438-3.569.049-6.381-3.379-6.732-7.764-0.509-6.363,1.588-2.4,2.023-8.635,0.818-11.709.267-23.087-8.823-32.094A18.05,18.05,0,0,0,161.9,47.1a5.129,5.129,0,0,1-1.714-.848,7.854,7.854,0,0,1-1.925-.362c-3.248-.951-6.742-1.888-10.425-0.556-2.437.882-3.377,2.019-3.283,4.492,0.308,8.155,2.375,16.045,3.523,24.073,0.446,3.125.751,6.273,1,9.42,0.288,3.6-1.115,5.8-5.06,5.867-3.652.065-6.145-1.789-6.543-5.343a67.778,67.778,0,0,1,.388-15.713,53.03,53.03,0,0,0-2.186-23.658c-2.07-6.072-6.912-8.783-12.2-3.027-1.6,1.738-3.171,3.5-4.675,5.318-5.033,6.077-10.049,6.813-16.395,2.05-3.65-2.737-6.953-5.929-10.546-8.748-5.021-3.94-11.225-5.835-16.14-2.476-4.246,2.9-4.656,7.532-5.67,11.849-2.026,8.634.564,16.976,1.92,25.392a51.3,51.3,0,0,1,.636,5.89c0.1,2.321-.212,4.715-2.8,5.529-2.938.925-5.183-.641-6.693-3-0.986-1.535-1.014-3.437-1.074-5.313-0.284-8.956.78-17.93-.692-26.874C59.614,40.589,55.526,38.771,48,37.685c-5.153-.744-10.428-0.363-14.582,3.65-0.243,1.97-3.5,2.547-2.379,5.147-2.739,4.49-2.16,9.673-3.023,14.554-0.363,2.058-.276,4.66-2.751,5.149-2.849.563-4.12-1.893-4.849-4.123a65.541,65.541,0,0,1-1.942-8.318c-0.5-2.65-.419-6.731-3.605-6.354-3.28.387-2.593,4.538-2.388,7.257,0.473,6.284,2.272,12.433,1.967,18.81-0.112,2.347-.4,4.6-3.18,5.169a5.354,5.354,0,0,1-6.278-2.884,12.918,12.918,0,0,1-1.338-7.963q1.27-8.929,2.068-17.925A11.523,11.523,0,0,0,0,39.069V1.081Q78.99,1.086,157.981,1a13.64,13.64,0,0,1,1.541.068c0.621-.7,1.676-0.846,3.3-0.843q87.056,0.114,174.112.056,93.8,0,187.6-.074a6.443,6.443,0,0,1,2.889.435A6.073,6.073,0,0,1,530.156.23q87.056,0.114,174.112.056,93.8,0,187.6-.074c0.384,0,.735.007,1.059,0.027,0.193-.006.392-0.009,0.6-0.009q87.057,0.114,174.112.056,93.795,0,187.6-.074a12.387,12.387,0,0,1,1.73.1,5.364,5.364,0,0,1,2.93-.528q87.06,0.112,174.11.055,93.795,0,187.6-.074a13.512,13.512,0,0,1,1.54.068c0.62-.7,1.67-0.846,3.29-0.843q87.06,0.114,174.12.056,59.715,0,119.44-.011V36.591Z"/></svg>';
} elseif ( $separator_type == 'big_triangle_right_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="92" viewBox="0 0 1920 92" preserveAspectRatio="none"><path d="M1920,7L1476,91,0,21V0H1920V7Z"/></svg>';
} elseif ( $separator_type == 'big_triangle_left_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="92" viewBox="0 0 1920 92" preserveAspectRatio="none"><path d="M1920,7L1476,91,0,21V0H1920V7Z"/></svg>';
} elseif ( $separator_type == 'curve_inside_center_svg_separator' ) {
  echo '<svg class="footer-separator-svg footer-separator-svg__' . esc_attr( $separator_type ) . '" xmlns="http://www.w3.org/2000/svg" version="1.0" width="100%" fill="' . $separator_shape_background . '" height="72" viewBox="0 0 1920 72" preserveAspectRatio="none"><path d="M1920,0c0,39.765-429.81,72-960,72S0,39.764,0,0H1920Z"/></svg>';
}