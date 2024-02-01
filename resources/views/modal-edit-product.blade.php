<div class="modal right fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="Choose Payment"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal_title" class="modal-title">Редактирование товара</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST" id="myForm2">
                    @csrf
                    @method('PATCH')
                    <div class="form-group form-element-number ">
                        <label for="count" class="control-label ">
                            Артикул
                            <span class="form-element-required">*</span>
                        </label>
                        <input autocomplete="off" class="form-control" type="text" name="article" value="{{ $product->article }}" required @if(auth()->user()?->role != 'admin') disabled @endif>
                    </div>
                    <div class="form-group form-element-number ">
                        <label for="count" class="control-label ">
                            Название
                        </label>
                        <input autocomplete="off" class="form-control" type="text" name="name" value="{{ $product->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="product_id">Статус:</label>
                        <select id="product_id" name="status" class='form-control'>
                            <option value="available" @if($product->status === 'available') selected @endif>Доступен</option>
                            <option value="unavailable" @if($product->status === 'unavailable') selected @endif>Не доступен</option>
                        </select>
                    </div>

                    <a class="btn-link" onclick="addAttributeFields('additionalAttributes')">Добавить атрибуты</a>

                    <!-- Поля для атрибутов будут добавлены здесь -->

                    <div id="additionalAttributes">
                        @if($product->data)
                            @foreach(json_decode($product->data) as $key => $value)
                                <div class="d-flex mt-2">
                                    <input type="text" name="attribute_name[]" value="{{ $key }}" placeholder="Имя атрибута" class="form-control">
                                    <input type="text" name="attribute_value[]" value="{{ $value }}" placeholder="Значение атрибута" class="form-control mx-1" required="">
                                    <button type="button" class="btn btn-danger mx-1"
                                            onclick="removeAttributeFields(this.parentNode)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="text-left">
                    <button type="submit" form="myForm2" class="btn btn-primary" data-dismiss="modal">
                        Сохранить
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

