function initUnlimitedCheckbox(checkboxSelector, inputSelector, unlimitedValue) {
    $(checkboxSelector).on('change', function(){
        if($(this).prop('checked')) {
            $(inputSelector).addClass('hidden').val(unlimitedValue);
        } else {
            $(inputSelector).removeClass('hidden').val('');
        }
    }).trigger('change');
}