        $('#createTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var group = button.data('group');
            $(this).find('input#group').val(group);
        })

        $('#editGroup').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var groupName = button.data('name');
            var group = button.data('group');
            $(this).find('.modal-body input').val(groupName);
            $(this).find('.modal-content form').attr('action', '/groups/' + group);
        })

         $('#editTask').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var taskName = button.data('name');
            var task = button.data('group');
            $(this).find('.modal-body input').val(taskName);
            $(this).find('.modal-content form').attr('action', '/tasks/' + task);
        })
