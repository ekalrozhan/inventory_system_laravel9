@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Purchase Page </h4><br><br>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Date</label>
                                    <input class="form-control example-date-input" type="date"  id="date" name="date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Purchase No</label>
                                    <input class="form-control example-date-input" type="text"  id="purchase_no" name="purchase_no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Supplier Name</label>
                                    <select name="supplier_id" class="form-select" id="supplier_id" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    @foreach($supplier as $supp)
                                                    <option value="{{ $supp->id }}"> {{ $supp->name }}</option>
                                                    @endforeach
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label" style="margin-top:20px;">Category Name</label>
                                    <select name="category_id" class="form-select"  id="category_id" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                   
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label" style="margin-top:20px;">Product Name</label>
                                    <select name="product_id" class="form-select" id="product_id"
                                    aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                   
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label" style="margin-top:63px;"></label>
                                    <input type="submit" class="btn btn-secondary btn-rounded waves-effect waves-light" value="Add More">
                                </div>
                            </div>
                        </div>     <!-- end row -->

                    </div> <!-- end card body -->

                     <!-- ------------------------ -->
                    <div class="card-body">
                       <form action="" method="">
                        @csrf
                        <table class="table-sm table-bordered" width=100% style="border-color: #ddd;">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>PSC/KG</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="addRow" class="addRow">

                            </tbody>

                            <tbody>
                                <tr>
                                    <td colspan="5"></td>
                                    <td>
                                        <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;">
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="storeButton">Purchase Store</button>
                        </div>
                       </form>
                    </div> <!-- end card-body -->
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>


<script src="text/x-handlebars-template" id="document-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
    
    <input type="hidden" name="date[]" value="@{{ date }}">
    <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">
    <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">

    <td>
        <input type="hidden" name="category_id[]" value="@{{ category_id }}">
        @{{ category_name }}
    </td>
    <td>
        <input type="hidden" name="product_id[]" value="@{{ product_id }}">
        @{{ product_name }}
    </td>
    <td>
        <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="">
        
    </td>
    <td>
        <input type="number" min="1" class="form-control unit_price text-right" name="unit_price[]" value="">
      
    </td>
    <td>
        <input type="text" min="1" class="form-control" name="description[]">
      
    </td>
    <td>
        <input type="number" min="1" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly>
      
    </td>
    <td>
        <input type="number" min="1" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly>
      
    </td>
    <td>
        <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
    </td>
</tr>

</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change', '#supplier_id', function(){
            var supplier_id = $(this).val();
            $.ajax({
                url: "{{ route('get-category') }}",
                type: "GET",
                data: {supplier_id: supplier_id},
                success: function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data, function(key, v){
                        html += '<option value="  '+v.category_id+' ">'+v.category.name+'</option>';
                    });
                    $('#category_id').html(html);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change', '#category_id', function(){
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('get-product') }}",
                type: "GET",
                data: {category_id: category_id},
                success: function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data, function(key, v){
                        html += '<option value="  '+v.id+' ">'+v.name+'</option>';
                    });
                    $('#product_id').html(html);
                }
            })
        });
    });
</script>





@endsection