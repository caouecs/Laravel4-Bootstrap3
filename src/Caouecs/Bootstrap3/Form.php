<?php namespace Caouecs\Bootstrap3;

use Caouecs\Bootstrap3\Helpers;
use Request;

class Form extends \Illuminate\Support\Facades\Form {

    /**
     * Display input for form-group
     *
     * @access public
     * @param string $type Type of input
     * @param string $name Name of input
     * @param string $title Title of input
     * @param mixed $value Value of input
     * @param ExceptionError $errors
     * @param array $attributes
     * @param string $help Help message
     * @return string
     */
    static public function input_group($type, $name, $title, $value = null, $errors = null, $attributes = array(), $help = null)
    {
        $txt = '<div class="form-group';
        if (!is_null($errors) && $errors->has($name))
            $txt .= ' has-error';
        $txt .= '" for="'.$name.'">';

        $txt .= Form::label($name, $title, array("class" => "col-md-2 control-label"));

        $txt .= '<div class="col-md-10">';

        $attributes = Helpers::addClass($attributes, "form-control");

        $txt .= Form::input($type, $name, Request::old($name) ? Request::old($name) : $value, $attributes);

        if (!empty($help))
            $txt .= '<span class="help-block">'.$help.'</span>';

        if (!is_null($errors) && $errors->has($name))
            $txt .= '<span class="text-danger">'.$errors->first($name).'</span>';

        $txt .= '</div></div>';

        return $txt;
    }

    /**
     * Display input for form-group for multi-language
     *
     * @access public
     * @param array $languages List of languages
     * @param string $type Type of input
     * @param string $name Name of input
     * @param string $title Title of input
     * @param mixed $value Value of input
     * @param ExceptionError $errors
     * @param array $attributes
     * @param string $help Help message
     * @return string
     */
    static public function input_multi_language_group($languages, $type, $name, $title, $value = null, $errors = null, $attributes = array(), $help = null)
    {
        $txt = '<div class="form-group';
        if (!is_null($errors) && $errors->has($name))
            $txt .= ' has-error';
        $txt .= '" for="'.$name.'">';

        $txt .= Form::label($name, $title, array("class" => "col-md-2 control-label"));

        $txt .= '<div class="col-md-10">';

        if (!empty($help))
            $txt .= '<span class="help-block">'.$help.'</span>';

        $attributes = Helpers::addClass($attributes, "form-control");

        foreach ($languages as $key => $val) {

            $value_tmp = Request::old($name."[".$val['id']."]") ? Request::old($name."[".$val['id']."]") : null;

            if (empty($value_tmp))
                $value_tmp = isset($value[$val['id']][$name]) ? $value[$val['id']][$name] : null;

            $txt .= '<div class="pull-left">'.$val['title'].'</div>';
            
            $txt .= Form::input($type, $name."[".$val['id']."]", $value_tmp, $attributes);
            if (!is_null($errors) && $errors->has($name."[".$val['id']."]"))
                $txt .= '<span class="text-danger">'.$errors->first($name."[".$val['id']."]").'</span>';
        }

        $txt .= '</div></div>';

        return $txt;
    }

    /**
     * Display textarea for form-group
     *
     * @access public
     * @param string $name Name of textarea
     * @param string $title Title of textarea
     * @param mixed $value Value of textarea
     * @param ExceptionError $errors
     * @param array $attributes
     * @param string $help Help message
     * @return string
     */
    static public function textarea_group($name, $title, $value = null, $errors = null, $attributes = array(), $help = null)
    {
        $txt = '<div class="form-group';
        if (!is_null($errors) && $errors->has($name))
            $txt .= ' has-error';
        $txt .= '" for="'.$name.'">';

        $txt .= Form::label($name, $title, array("class" => "col-md-2 control-label"));

        $txt .= '<div class="col-md-10">';

        $attributes = Helpers::addClass($attributes, "form-control");
        $attributes['rows'] = 5;

        $txt .= Form::textarea($name, Request::old($name) ? Request::old($name) : $value, $attributes);

        if (!empty($help))
            $txt .= '<span class="help-block">'.$help.'</span>';

        if (!is_null($errors) && $errors->has($name))
            $txt .= '<span class="text-danger">'.$errors->first($name).'</span>';

        $txt .= '</div></div>';

        return $txt;
    }

    /**
     * Display textarea for form-group
     *
     * @access public
     * @param string $name Name of textarea
     * @param string $title Title of textarea
     * @param mixed $value Value of textarea
     * @param ExceptionError $errors
     * @param array $attributes
     * @param string $help Help message
     * @return string
     */
    static public function textarea_line($name, $title, $value = null, $errors = null, $attributes = array(), $help = null)
    {
        $txt = '<div style="margin-bottom:20px" ';
        if (!is_null($errors) && $errors->has($name))
            $txt .= 'class="has-error"';
        $txt .= ' for="'.$name.'">';

        $txt .= Form::label($name, $title);


        $attributes = Helpers::addClass($attributes, "form-control");
        $attributes['rows'] = 5;

        $txt .= Form::textarea($name, Request::old($name) ? Request::old($name) : $value, $attributes);

        if (!empty($help))
            $txt .= '<span class="help-block">'.$help.'</span>';

        if (!is_null($errors) && $errors->has($name))
            $txt .= '<span class="text-danger">'.$errors->first($name).'</span>';

        $txt .= '</div>';

        return $txt;
    }

    /**
     * Display textarea for form-group for multi language
     *
     * @access public
     * @param array $languages List of languages
     * @param string $name Name of textarea
     * @param string $title Title of textarea
     * @param mixed $value Value of textarea
     * @param ExceptionError $errors
     * @param array $attributes
     * @param string $help Help message
     * @return string
     */
    static public function textarea_multi_language_group($languages, $name, $title, $value = null, $errors = null, $attributes = array(), $help = null)
    {
        $txt = '<div class="form-group';
        if (!is_null($errors) && $errors->has($name))
            $txt .= ' has-error';
        $txt .= '" for="'.$name.'">';

        $txt .= Form::label($name, $title, array("class" => "col-md-2 control-label"));

        $txt .= '<div class="col-md-10">';

        if (!empty($help))
            $txt .= '<span class="help-block">'.$help.'</span>';

        $attributes = Helpers::addClass($attributes, "form-control");
        $attributes['rows'] = 5;

        foreach ($languages as $key => $val) {

            $value_tmp = Request::old($name."[".$val['id']."]") ? Request::old($name."[".$val['id']."]") : null;

            if (empty($value_tmp))
                $value_tmp = isset($value[$val['id']][$name]) ? $value[$val['id']][$name] : null;

            $txt .= '<div>'.$val['title'].'</div>';

            $txt .= Form::textarea($name."[".$val['id']."]", $value_tmp, $attributes);

            if (!is_null($errors) && $errors->has($name."[".$val['id']."]"))
                $txt .= '<span class="text-danger">'.$errors->first($name."[".$val['id']."]").'</span>';
        }

        $txt .= '</div></div>';

        return $txt;
    }

    /**
     * Display select for form-group
     *
     * @access public
     * @param string $name Name of select
     * @param string $title Title of select
     * @param array $list List of values
     * @param mixed $value Value of select
     * @param ExceptionError $errors
     * @param array $attributes
     * @param string $help Help message
     * @return string
     */
    static public function select_group($name, $title, $list, $value = null, $errors = null, $attributes = array(), $help = null)
    {
        $txt = '<div class="form-group';
        if (!is_null($errors) && $errors->has($name))
            $txt .= ' has-error';
        $txt .= '" for="'.$name.'">
            <label  class="col-md-2 control-label" for="'.$name.'">'.$title.'</label>
            <div class="col-md-10">';

        $attributes = Helpers::addClass($attributes, "form-control");

        $txt .= Form::select($name, $list, Request::old($name) ? Request::old($name) : $value, $attributes);

        if (!empty($help))
            $txt .= '<span class="help-block">'.$help.'</span>';

        if (!is_null($errors) && $errors->has($name))
            $txt .= '<span class="text-danger">'.$errors->first($name).'</span>';

        $txt .= '</div></div>';

        return $txt;
    }

    /**
     * Display checkbox for form-group
     *
     * @access public
     * @param string $name Name of checkbox
     * @param string $title Title of checkbox
     * @param mixed $value Value if checked
     * @param mixed $input Value by input
     * @param ExceptionError $errors
     * @param array $attributes
     * @return string
     */
    static public function checkbox_group($name, $title, $value = 1, $input = 0, $errors = null, $attributes = array(), $help = null)
    {
        $txt = '<div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                      <div class="checkbox">
                        <label>';
        
        $input = Request::old($name) ? Request::old($name) : $input;

        if ($input == $value)
            $checked = true;
        else
            $checked = false;

        $txt .= Form::checkbox($name, $value, $checked, $attributes);

        $txt .= ' '.$title.'</label>';

        if (!is_null($errors) && $errors->has($name))
            $txt .= '<span class="text-danger">'.$errors->first($name).'</span>';

        $txt .= '     </div>
                    </div>
                  </div>';

        return $txt;
    }

    /**
     * Display submit with cancel for form-group
     *
     * @access public
     * @param array $options
     * @param array $attributes
     * @return string
     */
    static public function submit_group($options = array(), $attributes = array())
    {
        $txt = '<div class="form-group">
            <div class="col-md-offset-2 col-md-10">';

        $attributes = Helpers::addClass($attributes, "btn btn-primary");

        $options['submit_title'] = isset($options['submit_title']) ? $options['submit_title'] : trans('form.submit');

        $txt .= Form::submit($options['submit_title'], $attributes);
        
        if (isset($options['cancel_url'])) {
            $txt .= ' <a href="'.$options['cancel_url'].'">'.trans('form.cancel').'</a>';
        }

        $txt .= '</div>
        </div>';

        return $txt;
    }
}