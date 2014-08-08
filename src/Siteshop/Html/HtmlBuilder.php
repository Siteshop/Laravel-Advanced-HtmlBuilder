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

	/**
	 *   Generate image link
	 *
	 *   @param     string    $link_url         Link URL
	 *   @param     string    $image_url        Image URL
	 *   @param     string    $title            Image alt
	 *   @param     array     $link_options     Link attributes
	 *   @param     array     $image_options    Image attributes
	 *
	 *   @return    string
	 */
	public function imageLink($link_url, $image_url, $title, $link_options = [], $image_options = [], $secure)
	{
		$link = HTML::link($link_url, '{image}', $options['image'], $secure);
		$image = HTML::image($image_url, $title, $image_options);

		return str_replace('{image}', $image, $link);
	}
}