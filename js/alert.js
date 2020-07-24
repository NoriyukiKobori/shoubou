jQuery(document).ready(function(){
    jQuery(function($){
        jQuery('#delete-button').on('click',function(){
            if(!confirm('ほんとうに削除しますか？')){
                return false;
            }else{
                
            }
        });    
    });
})

