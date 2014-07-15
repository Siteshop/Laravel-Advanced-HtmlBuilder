<?php namespace Siteshop\Html;

class HtmlBuilder extends \Illuminate\Html\HtmlBuilder
{
	public function link($url, $title = null, $attributes = array(), $secure = null)
	{
		$link = parent::link($url, $title, $attributes, $secure);

		return $this->parseElement($link);
	}

	private function parseElement($input)
	{
		$callback = function($matches)
		{
			return '<i class="fa ' . $matches[1] . '"></i>';
		};

		return preg_replace_callback('#\{i\.([^}]+)\}#iU', $callback, $input);
	}
}