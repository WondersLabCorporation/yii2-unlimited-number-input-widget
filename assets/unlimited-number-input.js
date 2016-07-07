function initUnlimitedCheckbox(options) {
    $(options.checkboxSelector).on('change', function(){
        if($(this).prop('checked')) {
            $(options.inputSelector).addClass('hidden').val(options.unlimitedValue);
        } else {
            $(options.inputSelector).removeClass('hidden').val(options.emptyValue);
        }
        // Triggering input change to allow JS validators do their job
        $(options.inputSelector).trigger('change');
    });
}