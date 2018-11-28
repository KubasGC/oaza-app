<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat risus iaculis, dignissim lacus venenatis, tincidunt augue. Cras congue, ligula ut imperdiet porta, sem massa rutrum ex, quis hendrerit elit tellus in turpis. Proin hendrerit turpis at est bibendum egestas. Maecenas id lacus turpis. Aliquam tempor non ante a consequat. Morbi hendrerit magna sit amet mauris vulputate porttitor. Ut eu ex sit amet dolor aliquet sodales. Donec sollicitudin lacus at mi sollicitudin dignissim. Maecenas scelerisque consequat interdum. Vestibulum vitae neque eget quam vestibulum placerat. Nunc nec nisl eget massa facilisis semper sit amet ut metus. Nam lacus metus, commodo sit amet elementum nec, euismod vel libero.Quisque iaculis tempor libero, eget aliquet ligula. Vivamus id turpis at elit rhoncus posuere quis feugiat libero. Aenean imperdiet massa et turpis fringilla, vel iaculis elit tempus. Maecenas euismod eu lacus nec finibus. Nullam fermentum est a semper condimentum. Etiam in finibus sem. Pellentesque velit dolor, tristique vitae justo eu, consequat sollicitudin urna. Donec facilisis ut eros eget semper. Duis viverra ornare auctor. Proin porta, nibh sed molestie finibus, dolor augue viverra nunc, vitae faucibus nunc turpis ut turpis. Quisque commodo nisl quam, non posuere ante lacinia ac. Donec sit amet dictum est. Aenean mollis faucibus porta. Donec id sagittis purus, luctus tempor mi. Morbi et lobortis diam.
EOD;
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
