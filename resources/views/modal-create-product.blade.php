<div class="modal right fade" id="modal_create_product" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 id="modal_title" class="modal-title">Создание товара</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="POST" id="myForm">
                    @csrf
                    <div class="form-group form-element-number ">
                        <label for="count" class="control-label ">
                            Артикул
                            <span class="form-element-required">*</span>
                        </label>
                        <input autocomplete="off" class="form-control" type="text" name="article" value="" required>
                    </div>
                    <div class="form-group form-element-number ">
                        <label for="count" class="control-label ">
                            Название
                        </label>
                        <input autocomplete="off" class="form-control" type="text" name="name" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="product_id">Статус:</label>
                        <select id="product_id" name="status" class='form-control'>
                            <option value="available" selected>Доступен</option>
                            <option value="unavailable">Не доступен</option>
                        </select>
                    </div>

                    <a class="btn-link" onclick="addAttributeFields('additionalAttributes2')">Добавить атрибуты</a>

                    <!-- Поля для атрибутов будут добавлены здесь -->

                    <div id="additionalAttributes2"></div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="text-left">
                    <button type="submit" form="myForm" class="btn btn-primary" data-dismiss="modal">
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


