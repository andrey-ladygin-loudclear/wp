(function ($) {
    var chksIndexed = $('.search_keys_index');
    var chksMetas = $('.search_keys_meta');
    var submitBtn = $('.submit-button-form');
    var searchValue = $('.searching-for-value');

    //Check for other checkboxes in the same category
    //If there is any checkbox checked, return true
    //Because other category boxes should be in disabled mode
    function checkForAnyChecked(toCheck){
        var isExist = false;
        toCheck.each(function(){
            if(this.checked) {
                isExist = true;
            }
        });
        return isExist;
    }
    //If the Checkboxes are avaiable in the admin panael
    //Toggle and apply the disable feature for the check box categoreis
    if(chksMetas.length > 0 && chksIndexed.length > 0) {

        chksMetas.each(function(){
            $(this).on('click', function(e){
                var isChecked = this.checked;
                if(!isChecked && checkForAnyChecked(chksMetas)) {
                    isChecked = true;
                }
                chksIndexed.each(function(){
                    $(this).prop('disabled', isChecked);
                });
            });
        });
        chksIndexed.each(function(){
            $(this).on('click', function(e){
                var isChecked = this.checked;
                if(!isChecked && checkForAnyChecked(chksIndexed)) {
                    isChecked = true;
                }
                chksMetas.each(function(){
                    $(this).prop('disabled', isChecked);
                });
            });
        });

        submitBtn.on('click', function() {
            var msg = '';
            if(searchValue.val() != '' && (!checkForAnyChecked(chksMetas) && !checkForAnyChecked(chksIndexed))) {
                msg = 'Column(s)' + "\n";
            }

            if(msg != '') {
                var error = "Please Fill the following field(s)." + "\n";
                    error += msg;
                alert(error);
                return false;
            }

            return true;
        });
    }
    //griffith settings page
    if ($('.toplevel_page_griffith_settings').length) {
        $('.new-row-button').click(function () {
            //new row
            var ul = $(this).prev();
            var newFieldRow = ul.find('li:last-child').clone();
            newFieldRow.find('input,textarea').val('');

            addFieldRowRemoveButtons(ul);

            //update attributes based on keys
            var key = newFieldRow.attr('data-index');
            if (key) {
                key++;
                newFieldRow.attr('data-index', key);
                newFieldRow.find(':attrStartsWith(data-keyreplace-)').each(function () {
                    var element = $(this);
                    $.each(this.attributes, function (i, attr) {
                        if (attr.name.indexOf('data-keyreplace') >= 0) {
                            var attrName = attr.name.replace('data-keyreplace-', '');
                            var attrValue = attr.value.replace('##index##', key);
                            element.attr(attrName, attrValue);
                        }
                    });
                });
                newFieldRow.find('.key').text(key + 1);
            }
            ul.append(newFieldRow);
            newFieldRow.find('.accordion-content').slideToggle();

            return false;
        });

        function addFieldRowRemoveButtons(parent) {
            //remove buttons
            parent.find('.field-row-remove-button').remove();
            parent.find('li').append('<button class="field-row-remove-button button">Delete</button>');
        }

        $('#griffith-settings').on('click', '.field-row-remove-button', function () {
            if ($(this).parent().parent().find('li').length > 1) {
                $(this).parent().remove();
            }
            return false;
        });

        var dynamicFields = $('.dynamic-fields');
        addFieldRowRemoveButtons(dynamicFields);
    }

    //show font icons
    $('.post-type-icon td.column-slug').each(function () {
        $(this).addClass('icon-' + $(this).text());
    });

    //hide unnecessary item/links for client
    if (jQuery('a[href=admin\\.php\\?page\\=itsec]').length <= 0) {
        jQuery('.post-type-icon .add-new-h2,.hide-if-no-customize,.frm_form_nav').remove();
        jQuery('#menu-appearance > a').attr('href', jQuery('#menu-appearance > ul li a:first-child').attr('href'));
    }


}(jQuery));

jQuery.extend(jQuery.expr[':'], {
    attrStartsWith: function (el, _, b) {
        for (var i = 0, atts = el.attributes, n = atts.length; i < n; i++) {
            if (atts[i].nodeName.indexOf(b[3]) === 0) {
                return true;
            }
        }

        return false;
    }
});
