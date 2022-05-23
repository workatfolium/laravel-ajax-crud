$(document).ready(function() {
    function loadTable() {
        var url = '{{ route("users.load-table") }}';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                $("#table-data").html(data.putit);
            },
            error: function(error) {
                alert('error')
            }
        });
        return false;
    }
    loadTable();
    jQuery(document).off().on('click', '#save-button', function(e) {
        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        if (fname == "" || lname == "") {
            $("#error-message").html("All fields are required.").slideDown();
            $("#success-message").slideUp();
        } else {
            var url = '{{ route("users.store-data") }}';
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    "first_name": fname,
                    "last_name": lname
                },
                success: function(data) {
                    loadTable();
                    $("#addForm").trigger("reset");
                    $("#success-message").html("Data Inserted Successfully.").slideDown();
                    $("#error-message").slideUp();
                },
                error: function(error) {
                    $("#error-message").html("Can't Save Record.").slideDown();
                    $("#success-message").slideUp();
                }
            });
            return false;
        }
    });
    jQuery(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        if (confirm("Do you really want to delete this record ?")) {
            var studentId = $(this).data("id");
            var element = this;
            var url = '{{ route("users.delete-data") }}';
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    "id": studentId
                },
                success: function(data) {
                    if (data == 1) {
                        $(element).closest("tr").fadeOut();
                    } else {
                        $("#error-message").html("Can't Delete Record.").slideDown();
                        $("#success-message").slideUp();
                    }
                }
            });
        }
    });
    jQuery(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();
        $("#modal").show();
        var studentId = $(this).data("eid");
        var url = '{{ route("users.load-update-form") }}';
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "id": studentId
            },
            success: function(data) {
                $("#modal-form table").html(data.success);
            }
        });
    });
    //Hide Modal Box
    $("#close-btn").on("click", function() {
        $("#modal").hide();
    });
    jQuery(document).on('click', '#edit-submit', function(e) {
        e.preventDefault();
        var stuId = $("#edit-id").val();
        var fname = $("#edit-fname").val();
        var lname = $("#edit-lname").val();
        var url = '{{ route("users.update-data") }}';
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "id": stuId,
                "first_name": fname,
                "last_name": lname,
            },
            success: function(data) {
                if (data == 1) {
                    $("#modal").hide();
                    loadTable();
                }
            }
        });
    });
    jQuery(document).on('keyup', '#search', function(e) {
        e.preventDefault();
        var search_term = $(this).val();
        var url = '{{ route("users.search-data") }}';
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                "search": search_term,
            },
            success: function(data) {
                $("#table-data").html(data.success);
            }
        });
    });
});