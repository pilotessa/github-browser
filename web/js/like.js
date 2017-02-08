jQuery.fn.extend({
    like: function () {
        function update(item) {
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
            update(this);
            return false;
        });

        return this.each(function () {
            update(this);
        });
    }
});
