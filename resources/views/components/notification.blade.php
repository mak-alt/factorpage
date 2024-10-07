@script
<script>
    window.addEventListener('notification:default', event => {
        if(event.detail.length > 0){
            event.detail.forEach(element => {
                $notification({text:element.message, variant:'error',position:'center-top'});
            });
        }
    });
</script>
@endscript