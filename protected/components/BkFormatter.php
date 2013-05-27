<?php

/**
 * A custom formatter class.
 *
 * @author Ashar Fuadi <fushar@gmail.com>
 */
class BkFormatter extends CFormatter
{
	/**
	 * Formats a set of input field that consists of label, input, and error message.
	 * @param  CActiveForm $form the form
	 * @param  string $type the input field method
	 * @param  CModel $model the model
	 * @param  string $attribute the attribute
	 * @param  string $icon the icon
	 * @param  array $htmlOptions the HTML option values
	 * @param  array $otherOptions otherOptions
	 * @return string the HTML of the set of the input field
	 */
	public function formatInputField($form, $type, $model, $attribute, $icon, $htmlOptions = array(), $otherOptions = array())
	{
		return '<tr>
				<td>
					<div class="control-group attribute-' . $attribute . '">
						<i class="icon ' . $icon . '"></i> ' . $form->labelEx($model, $attribute, array('class' => 'control-label')) . '
					</div>
				</td>
				<td>
					<div class="control-group attribute-' . $attribute . '">' .
						@$otherOptions['beforeInput'] . 
						(isset($otherOptions['data']) ?
							$form->$type($model, $attribute, $otherOptions['data'], $htmlOptions) : 
							$form->$type($model, $attribute, $htmlOptions)) . 
						@$otherOptions['afterInput'] .
						(isset($otherOptions['hint']) ?
							'<span class="hint">' . $otherOptions['hint'] . '</span>' :
							'').
						$form->error($model, $attribute, array('inputContainer' => '.attribute-' . $attribute)) . '
					</div>
				</td>
			</tr>';
	}

	/**
	 * Formats a long text so that it gets wrapped at column 27 no matter what, using <br> tag.
	 * @param  string $value the long text
	 * @return string the resulting formatted text.
	 */
	public function formatText($value)
	{
		return wordwrap(CHtml::encode($value), 27, '<br />', true);
	}

	/**
	 * Formats a long text so that it gets wrapped at column 75 no matter what, using "\n" character.
	 * @param  string $value the long text
	 * @return string the resulting formatted text.
	 */
	public function formatNtext($value)
	{
		return wordwrap($value, 75, "\n", true);
	}
}