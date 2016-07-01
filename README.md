Unlimited Number Input - Yii2 widget
====================================
This is drop-in replacement for input form element. By default input with type=number is rendered to allow numeric values only.
"Unlimited" checkbox is rendered above the input which hides the input and sets it's value to unlimited one (which is -1 by default)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Add to your `composer.json` file

```json
"repositories": [
    {
        "url": "https://github.com/WondersLabCorporation/yii2-unlimited-number-input-widget.git",
        "type": "git"
    }
]
```
and run

```
composer require WondersLabCorporation/yii2-unlimited-number-input-widget:"dev-master"
```


Usage
------------

```php
echo \WondersLabCorporation\UnlimitedNumberInputWidget::widget([
        // Override default Asset bundle if needed
        'asset' => \CustomAssetBundle
        // Provide model and attribute, or name and value as in any other Input Widget
        'model' => $model,
        'attribute' => 'number_field',
        // Define your own unlimitedValue in case you need it (-1 is used by default)
        'unlimitedValue' => 100,
        // Override checkbox options to set custom Label for example
        'checkboxOptions' => ['label' => 'Mu custom Unlimited label'],
        // Set your custom Input options. e.g. override default type=number
        'options' => ['type' => 'text']
    ]
);
```

```php
echo $form->field($model, 'number_field')->widget(\WondersLabCorporation\UnlimitedNumberInputWidget::className(), [
    'options' => ['id' => 'my-custom-id'],
    'unlimitedValue' => -3,
]);
```