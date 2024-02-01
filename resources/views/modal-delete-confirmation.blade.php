<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <b>Удалить товар ?</b>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Удалить</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function() {
        $('#deleteConfirmationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var url = button.data('url');
            console.log(url);

            $('#delete').on('click', function () {
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    success: function (response) {
                        $.toast({
                            type: 'success',
                            title: 'Запись успешно удалена',
                            content: 'Запись удалена',
                            delay: 5000
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    },
                    error: function (error) {
                        console.error('Ошибка при отправке данных на сервер:', error);
                    },
                });
            });
        });
    });
</script>
