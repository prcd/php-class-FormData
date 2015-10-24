<?php

// variable parameters can all be found in $p

$h1[] = '<select';
$h1[] = ' class="form-control"';

if ($p['id'] !== NULL)
	$h1[] = ' id="'.htmlspecialchars($p['id']).'"';

$h1[] = ' name="'.htmlspecialchars($p['name']).'"';

if ($p['required'] == '1')
	$h1[] = ' required="required"';

$h1[] = '>';

foreach ($p['option'] as $a) {
	$k = $a[0];
	$v = $a[1];
	
	if ($k == '_disabled')
	{
		$opt[] = '<option disabled="disabled">'.htmlspecialchars($v).'</option>';
	}
	else
	{
		if ($p['value'] != '' && $p['value'] == $k)
		{
			$selected = ' selected="selected"';
			$optionSelected = true;
		}
		else
		{
			$selected = '';
		}
		$opt[] = '<option value="'.htmlspecialchars($k).'"'.$selected.'>'.htmlspecialchars($v).'</option>';
	}
}
if (!$optionSelected) {
	$h2[] = '<option selected="selected" value="">Please choose...</option>';
	$h2[] = '<option disabled="disabled"></option>';
}
$h2[] = implode('', $opt);


$html[] = implode('',$h1).implode('',$h2).'</select>';
