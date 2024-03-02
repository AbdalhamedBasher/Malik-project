<div class="card-body border-2">

    <div class="table-responsive">
        <div class="">

            <input type="checkbox" class="lines" name="lines[]" value="{{ $batch->id }}"
                id="" checked>
            <label class="" for="">


            </label>
        </div>

        <table class="overflow-x-scroll" style="text-align: center">
            <thead class=" overflow-x-scroll bg-blue-50">
                <tr class=" border border-1 overflow-x-scroll">
                    <th class=" border border-1 ">
                        #
                    </th>


                    <th style="text-align: center">
                        اسم المادة/Product Name
                    </th>
                    <th style="text-align: center">
                        الوحدات/Unit
                    </th>
                    <th style="text-align: center">
                        سعر الوحدة/Product*factor
                    </th>
                    <th style="text-align: center">
                        الكمية/Qty
                    </th>
                    <th style="text-align: center">
                        المجموع/Sale Price</th>
                    <th style="text-align: center">
                        المواد المساعدة/Material Price
                    </th>
                    <th style="text-align: center">
                        د-المواد/Decoration Product
                    </th>
                    <th style="text-align: center">
                        -غير ذلك المواد/Other Material
                    </th>
                    <th style="text-align: center">
                        المجموع المواد/Material Total</th>
                    <th style="text-align: center">
                        المجموع المواد/الكلي /Material Per Qty</th>

                    <th style="text-align: center">
                        الايادي العاملة/Labour</th>

                    <th style="text-align: center">
                        غير ذلك- الايادي /Other Labour</th>
                    <th style="text-align: center">
                        المجموع العمالة Labour Total</th>
                    <th style="text-align: center">
                        الايادي العاملة/الكلي/Total Labour Per Qty</th>
                    <th style="text-align: center">
                        مجموع التكلفة الكلية/All Total </th>
                    <th> &nbsp;</th>


                </tr>
            </thead>

            <tbody class="line_data" id="{{ $batch->lines->id}}">

                <tr id="{{ $batch->lines->id }}">
                    <td class="counter">
                        {{ $batch->lines->id}}
                    </td>

                    <td style="text-align: center">

                        @if ($batch->item_lines)
                            <select class="form-control products  w-full"
                                id="{{ $batch->lines->id}}" name="item[{{ $batch->lines->id}}][]">
                                <option selected value=""> </option>

                                @foreach ($batch->item_lines as $product)
                                    <option value="{{ $product->id }}"
                                        data-price="{{ $product->price }}">
                                        {{ $product->name }}
                                        <span
                                            id="{{ $product->id }}">{{ $product->price }}</span>
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        <input type="hidden" name="" class="product-price" readonly
                            id="{{ $batch->lines->id}}">
                    </td>
                    <td style="text-align: center">

                        <select class="form-control select2" id="{{ $batch->lines->id}}"
                            name="unit[{{ $batch->lines->id}}][]">
                            <option selected value=""> </option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="factor_price[{{ $batch->lines->id}}][]"
                            class="border border-1 factor_price" readonly
                            id="{{ $batch->lines->id}}">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="qty[{{ $batch->lines->id}}][]"
                            class="border border-1 qty" id="{{ $batch->lines->id}}"
                            value="0">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="product_factor[{{ $batch->lines->id}}][]"
                            readonly id="{{ $batch->lines->id}}" value="0"
                            class="border border-1 simetot">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="material[{{ $batch->lines->id}}][]"
                            id="{{ $batch->lines->id}}" value="0"
                            class="border border-1 material">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="material_acc[{{ $batch->lines->id}}][]"
                            value="0" id="{{ $batch->lines->id}}"
                            class="border border-1 material_acc">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="material_other[{{ $batch->lines->id}}][]"
                            value="0" id="{{ $batch->lines->id}}"
                            class="border border-1 material_other">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="tot_material[{{ $batch->lines->id}}][]"
                            id="{{ $batch->lines->id}}" value="0" readonly
                            class="border border-1 tot_material">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="total_material[{{ $batch->lines->id}}][]"
                            id="{{ $batch->lines->id}}" readonly
                            class=" border border-1 all_material px-4" value="0">
                    </td>
                    <td style="text-align: center">

                        <input type="text" name="labour[{{ $batch->lines->id}}][]"
                            id="{{ $batch->lines->id}}" value="0"
                            class="border border-1 labour">
                    </td>


                    <td style="text-align: center">

                        <input type="text" name="labour_other[{{ $batch->lines->id}}][]"
                            id="{{ $batch->lines->id}}" value="0"
                            class=" border border-1 labour_other">
                    </td>
                    <td style="text-align: center">


                        <input type="text" name="worker_tot[{{ $batch->lines->id}}][]"
                            id="" class=" border border-1 tot_labour" value="0"
                            readonly>
                    </td>
                    <td style="text-align: center">


                        <input type="text" name="total_labour[{{ $batch->lines->id}}][]"
                            id="{{ $batch->lines->id}}" value="0"
                            class=" border border-1 all_labour px-4" readonly>
                    </td>
                    <td style="text-align: center">

                        <input type="text" id="{{ $batch->lines->id}}" value="0"
                            class=" border border-1 all_tot" readonly>

                    </td>

                </tr>



            </tbody>
        </table>
        <input type="submit" value="{{ $batch->lines->id}}"
            class=" btn btn-primary btn-line col-sm-2" id="{{ $batch->lines->id}}">
    </div>
    <div class="form-group col-md-2 justify-center">
        <label for="inputZip"> &emsp14; </label>

    </div>
    <div class="form-group col-md-2 justify-center">
        <label for="inputZip"> &emsp14; </label>
        <input type="text" name="total[]" id="{{ $batch->lines->id}}"
            class="total border border-1" readonly>
    </div>
    <div class="form-group col-md-2 justify-center">
        <label for="inputZip"> &emsp14; </label>
        <input type="text" name="total[]" id="{{ $batch->lines->id}}"
            class="total_material border border-1" readonly>
    </div>
    <div class="form-group col-md-2 justify-center">
        <label for="inputZip"> &emsp14; </label>
        <input type="text" name="total[]" id="{{ $batch->lines->id}}"
            class="total_labour border border-1" readonly>
    </div>
    <div class="form-group col-md-2 justify-center">
        <label for="inputZip">total_profit {{ $batch->lines->id}}</label>
        <input type="text" name="total[]" id="{{ $batch->lines->id}}"
            class="total_profit border border-1" readonly value="0">
    </div>
    <div class="form-group col-md-2 justify-center">
        <label for="inputZip"> &emsp14; </label>

    </div>
</div>
