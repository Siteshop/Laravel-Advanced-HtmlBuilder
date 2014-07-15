<?php namespace Siteshop\Html;

class FormBuilder extends \Illuminate\Html\FormBuilder
{
	protected $errors;


	/**
	 * Open up a new HTML form.
	 *
	 * @param  array   $options
	 * @return string
	 */
	public function open(array $options = array())
	{
		$this->setErrors($options['errors']);
		unset($options['errors']);

		return parent::open($options);
	}

	/**
	 * Create a text input field.
	 *
	 * @param  string  $name
	 * @param  string  $value
	 * @param  array   $options
	 * @return string
	 */
	public function text($name, $value = null, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		if ( ! isset($options['class'])) $options['class'] = 'form-control';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = parent::text($name, $value, $options);

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create a password input field.
	 *
	 * @param  string  $name
	 * @param  array   $options
	 * @return string
	 */
	public function password($name, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		if ( ! isset($options['class'])) $options['class'] = 'form-control';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = parent::password($name, $options);

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create an e-mail input field.
	 *
	 * @param  string  $name
	 * @param  string  $value
	 * @param  array   $options
	 * @return string
	 */
	public function email($name, $value = null, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		if ( ! isset($options['class'])) $options['class'] = 'form-control';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = parent::email($name, $value, $options);

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create a url input field.
	 *
	 * @param  string  $name
	 * @param  string  $value
	 * @param  array   $options
	 * @return string
	 */
	public function url($name, $value = null, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		if ( ! isset($options['class'])) $options['class'] = 'form-control';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = parent::url($name, $value, $options);

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create a textarea input field.
	 *
	 * @param  string  $name
	 * @param  string  $value
	 * @param  array   $options
	 * @return string
	 */
	public function textarea($name, $value = null, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		if ( ! isset($options['class'])) $options['class'] = 'form-control';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = parent::textarea($name, $value, $options);

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create a select box field.
	 *
	 * @param  string  $name
	 * @param  array   $list
	 * @param  string  $selected
	 * @param  array   $options
	 * @return string
	 */
	public function select($name, $list = array(), $selected = null, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		//if ( ! isset($options['class'])) $options['class'] = 'select';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = parent::select($name, $list, $selected, $options);

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create a radio group field.
	 *
	 * @param  string  $name
	 * @param  array   $list
	 * @param  string  $selected
	 * @param  array   $options
	 * @return string
	 */
	public function radios($name, $list = array(), $checked = null, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		//if ( ! isset($options['class'])) $options['class'] = 'select';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = '';

		foreach($list as $k => $v){
			$input .= '<label class="checkbox-inline">' . parent::radio($name, $k, ($checked !== null && $checked == $k && parent::getValueAttribute($name) === null ? true : null)) . '&nbsp; ' . $v . '</label>';
		}

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create a form label element.
	 *
	 * @param  string  $name
	 * @param  string  $value
	 * @param  array   $options
	 * @return string
	 */
	public function label($name, $value = null, $options = array())
	{
		$this->labels[] = $name;

		$options = $this->html->attributes($options);

		$value = $this->formatLabel($name, $value);

		return '<label for="'.$name.'"'.$options.'>'.$value.'</label>';
	}

	/**
	 * Create a file input field.
	 *
	 * @param  string  $name
	 * @param  array   $options
	 * @return string
	 */
	public function file($name, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		if ( ! isset($options['class'])) $options['class'] = 'form-control';

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = parent::file($name, $options);

		return $this->wrapFields($name, $input, $options);
	}


	public function star($name, $options = array())
	{
		if ( ! isset($options['name'])) $options['name'] = $name;

		if ( ! isset($options['label'])) $options['label'] = null;

		if ( ! isset($options['id'])) $options['id'] = $name;

		$input = '<div class="label-right"><div class="star" data-score="' . $this->getValueAttribute($name) . '" data-name="' . $name . '"></div></div>';

		return $this->wrapFields($name, $input, $options);
	}

	/**
	 * Create error notification.
	 *
	 * @param  string $name
	 * @return string
	 */
	public function errorsFor($name, $label)
	{
		return str_replace(['[]', '.0', $name], ['', '', strtolower($label)], $this->errors->first($name, '<span class="alert-msg"><i class="icon-remove-sign"></i> :message</span>'));
	}

	/**
	 * Create error notification.
	 *
	 * @param  string $name
	 * @return string
	 */
	public function detailsFor($details)
	{
		return '<span class="alert-msg alert-details"><i class="icon-info-sign"></i> ' . e($details) . '</span>';
	}

	/**
	 * Create wrapper for fields.
	 *
	 * @param  string $name    Field name
	 * @param  string $field   Output form parent caller function
	 * @param  array  $options Options passed from parent caller function
	 * @return string
	 */
	private function wrapFields($name, $field, $options)
	{
		$error_field = (isset($options['error_field']) ? $options['error_field'] : $name);

		$out  = '<div class="field-box'. ($this->errors->first($error_field) ? ' error has-error' : '') . (isset($options['wrapperClass']) ? ' ' . $options['wrapperClass'] : '') . '">' . "\n";

		if($options['label'] != 'disabled')
		{
			$out .= '	' . $this->label($name, $options['label'], ['class' => 'control-label']) . "\n";
		}

		$out .= '	' . $field . "\n";

		if(!isset($options['showErrors']) || $options['showErrors'] != 'disabled')
		{
			$out .= '	' . $this->errorsFor($error_field, $options['label']) . "\n";
		}

		if(isset($options['details']))
		{
			$out .= '	' . $this->detailsFor($options['details']) . "\n";
		}

		$out .= '</div>' . "\n\n";

		return $out;
	}

	/**
	 * Set errors.
	 *
	 * @param MessageBag $errors
	 */
	public function setErrors($errors)
	{
		$this->errors = $errors;
	}
}