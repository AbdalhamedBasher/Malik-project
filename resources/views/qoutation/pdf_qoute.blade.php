@foreach ($line as $item)
<div class="card mt-1 card-detail border-0">
    <div class="card-header" style="background-color: #433483a3 ; color:aliceblue">
        {{ $item->name }}
    </div>




@foreach ($item->child_lines as $children)
<div class="card-body border-2">

    <div class="table-responsive">
        <div class="">

            <input type="checkbox" class="lines" name="lines[]" value="{{ $children->id }}"
                id="">
            <label class="" for="">
                {{ $children->name }}

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

    <tbody class="line_data" id="{{ $children->id }}">

        <tr>
            <td class="counter">

            </td>

            <td style="text-align: center">
                <select class="form-control products  w-full" id="{{ $children->id }}"
                    name="item[{{ $children->id }}][]">
                    <option selected value=""> </option>
                    @foreach ($children->item_lines as $product)
                        <option value="{{ $product->id }}"
                            data-price="{{ $product->price }}">
                            {{ $product->name . ' ' . $product->type_data->name }}
                            <span
                                id="{{ $product->id }}">{{ $product->price }}</span>
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="" class="product-price" readonly
                    id="{{ $children->id }}">
            </td>
            <td style="text-align: center">

                <select class="form-control select2" id="{{ $children->id }}"
                    name="unit[{{ $children->id }}][]">
                    <option selected value=""> </option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td style="text-align: center">

                <input type="text" name="factor_price[{{ $children->id }}][]"
                    class="border border-1 factor_price" readonly
                    id="{{ $children->id }}">
            </td>
            <td style="text-align: center">

                <input type="text" name="qty[{{ $children->id }}][]"
                    class="border border-1 qty" id="{{ $children->id }}"
                    value="0">
            </td>
            <td style="text-align: center">

                <input type="text" name="simetot[{{ $children->id }}][]" readonly
                    id="{{ $children->id }}" value="0"
                    class="border border-1 simetot">
            </td>
            <td style="text-align: center">

                <input type="text" name="material[{{ $children->id }}][]"
                    id="{{ $children->id }}" value="0"
                    class="border border-1 material">
            </td>
            <td style="text-align: center">

                <input type="text" name="material_acc[{{ $children->id }}][]"
                    value="0" id="{{ $children->id }}"
                    class="border border-1 material_acc">
            </td>
            <td style="text-align: center">

                <input type="text" name="material_other[{{ $children->id }}][]"
                    value="0" id="{{ $children->id }}"
                    class="border border-1 material_other">
            </td>
            <td style="text-align: center">

                <input type="text" name="tot_material[{{ $children->id }}][]"
                    id="{{ $children->id }}" value="0" readonly
                    class="border border-1 tot_material">
            </td>
            <td style="text-align: center">

                <input type="text" name="tot_material[{{ $children->id }}][]"
                    id="{{ $children->id }}" readonly
                    class=" border border-1 all_material px-4" value="0">
            </td>
            <td style="text-align: center">

                <input type="text" name="labour[{{ $children->id }}][]"
                    id="{{ $children->id }}" value="0"
                    class="border border-1 labour">
            </td>


            <td style="text-align: center">

                <input type="text" name="labour_other[{{ $children->id }}][]"
                    id="{{ $children->id }}" value="0"
                    class=" border border-1 labour_other">
            </td>
            <td style="text-align: center">


                <input type="text" name="worker_tot[{{ $children->id }}][]"
                    id="" class=" border border-1 tot_labour" value="0"
                    readonly>
            </td>
            <td style="text-align: center">


                <input type="text" name="worker_tot[{{ $children->id }}][]"
                    id="{{ $children->id }}" value="0"
                    class=" border border-1 all_labour px-4" readonly>
            </td>
            <td style="text-align: center">

                <input type="text" id="{{ $children->id }}" value="0"
                    class=" border border-1 all_tot" readonly>

            </td>

        </tr>



    </tbody>
</table>
@endforeach
@endforeach
