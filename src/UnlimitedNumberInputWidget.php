<?php

namespace WondersLabCorporation\UnlimitedNumber;

use Yii;
use yii\helpers\Html;

/**
 * @inheritdoc
 * Render "Unlimited" checkbox and an input to set value otherwise
 */
class UnlimitedNumberInputWidget extends \yii\widgets\InputWidget
{
    /**
     * @var string Asset bundle class name
     */
    public $asset = '\WondersLabCorporation\UnlimitedNumber\Asset';

    /**
     * @var mixed Unlimited value
     */
    public $unlimitedValue = -1;

    /**
     * @var string Unlimited checkbox options
     */
    public $checkboxOptions = [];

    public function init()
    {
        parent::init();
        // Generate checkbox input name if none provided
        if (!isset($this->checkboxOptions['id'])) {
            $this->checkboxOptions['id'] = 'unlimited_checkbox' . $this->getId();
        }

        // Set checkbox label if none provided
        if (!isset($this->checkboxOptions['label'])) {
            $this->checkboxOptions['label'] = Yii::t('app', 'Unlimited');
        }

        // Set form-control class by default
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'form-control';
        }

        // Set Number input type by default
        if (!isset($this->options['type'])) {
            $this->options['type'] = 'number';
        }
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();

        $result = Html::tag(
            'div',
            Html::checkbox('unlimited_checkbox', $this->isUnlimited(), $this->checkboxOptions),
            ['class' => 'unlimited-checkbox-wrapper']
        );

        if ($this->hasModel()) {
            $result .= Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $result .= Html::textInput($this->name, $this->value, $this->options);
        }

        return $result;
    }

    /**
     * @return mixed current $model value or $value whichever is provided
     */
    protected function getCurrentValue()
    {
        if ($this->hasModel()) {
            return $this->model->{$this->attribute};
        }
        return $this->value;
    }

    /**
     * @return bool whether current value is unlimited or not
     */
    protected function isUnlimited()
    {
        return $this->getCurrentValue() === $this->unlimitedValue;
    }

    /**
     * Register client script
     */
    protected function registerClientScript()
    {
        $view = $this->getView();
        $assetClass = $this->asset;
        call_user_func([$assetClass, 'register'], $view);
        $view->registerJs("initUnlimitedCheckbox('#{$this->checkboxOptions['id']}', '#{$this->options['id']}', '{$this->unlimitedValue}');");
    }

}
