<div id="start_point">
    <a href="#">click me</a>
</div>

<div id="area_to_be_reloaded">

</div>


<script src="/js/test/jquery-2.2.4.min.js"></script>

<script>
    $(document).ready(function(){
        $(function(){
            $("a").click(function (e) {
                e.preventDefault();
                console.log("jo");
                var get_url = '/test_ajax';
                $.ajax({
                    type: 'GET',
                    url: get_url,
                    success: function (returned_data) {
                        console.log('success');
                        console.log(returned_data);
                    }

                });
            });
        });
    });
</script>