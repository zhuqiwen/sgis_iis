$('.wizard-card').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'nextSelector': '.btn-next',
    'previousSelector': '.btn-previous',

    onInit : function(tab, navigation, index){

        //check number of tabs and fill the entire row
        var $total = navigation.find('li').length;
        $width = 100/$total;

        $display_width = $(document).width();

        console.log($total);

        if($display_width < 600 && $total > 3){
            $width = 50;
        }

        navigation.find('li').css('width',$width + '%');

    },
    onNext: function(tab, navigation, index){
        // if(index == 1){
        //     return validateFirstStep();
        // } else if(index == 2){
        //     return validateSecondStep();
        // } else if(index == 3){
        //     return validateThirdStep();
        // } //etc.

    },
    onTabClick : function(tab, navigation, index){
        // Disable the posibility to click on tabs
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;

        var wizard = navigation.closest('.wizard-card');

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
            $(wizard).find('.btn-next').hide();
            $(wizard).find('.btn-finish').show();
        } else {
            $(wizard).find('.btn-next').show();
            $(wizard).find('.btn-finish').hide();
        }
    }
});
