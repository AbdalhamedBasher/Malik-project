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

            <tbody class="line_data" id="{{ $batch->id }}">

<input type="submit" value="{{ $batch->id }}"
class=" btn btn-primary btn-line col-sm-2" id="{{ $batch->id }}">
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>

</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total border border-1" readonly>
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total_material border border-1" readonly>
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total_labour border border-1" readonly>
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip">total_profit {{ $batch->id }}</label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total_profit border border-1" readonly value="0">
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>

</div>
@else
<input type="submit" value="{{ $batch->id }}"
class=" btn btn-primary btn-line col-sm-2" id="{{ $batch->id }}">
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>

</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total border border-1" readonly>
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total_material border border-1" readonly>
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total_labour border border-1" readonly>
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip">total_profit {{ $batch->id }}</label>
<input type="text" name="total[]" id="{{ $batch->id }}"
class="total_profit border border-1" readonly value="0">
</div>
<div class="form-group col-md-2 justify-center">
<label for="inputZip"> &emsp14; </label>

</div>





            </tbody>
        </table>

</div>
