jQuery.fn.extend({
    like: function () {
        function send(item) {
            var $item = $(item);
            $.ajax({
                url: $item.attr("href"),
                data: $item.data(),
                success: function (response) {
                    $item.replaceWith(response);
                }
            });
        }

        $(document).on("click", this.selector, function () {
            send(this);
            return false;
        });

        return this.each(function () {
            send(this);
        });
    }
});
