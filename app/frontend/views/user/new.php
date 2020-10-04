<form id="new_user" action="<?= base_url('user/new_user'); ?>" method="post">
    <fieldset>
        <legend>Tao tai khoan</legend>
        <div>
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="text-center mt-3">
            <input type="submit" value="Send" class="btn btn-primary">
        </div>

    </fieldset>
</form>
<script type="text/javascript">
$(document).ready(function() {
    //     $("#new_user").submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: "POST",
    //             url: '<?= base_url('user/new_user'); ?>',
    //             dataType: 'JSON',
    //             data: $(this).serialize(),
    //             success: function(response) {
    //                 console.log(response.status);
    //                 if (response.status == API_SUCCESS) {
    //                     window.location.reload();
    //                 } else {
    //                     alert(response.message);
    //                 }
    //             },
    //             error: function(response) {
    //                 location.reload();
    //             }
    //         })

    //     })
})
</script>